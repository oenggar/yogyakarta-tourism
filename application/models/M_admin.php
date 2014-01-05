<?php
class M_admin extends CI_Model{
	var $gallerypath;
	var $gallery_path_url;

	public function construct(){
		parent::_construct();
		$this->gallerypath = realpath(APPPATH . '../system/gambar');
		$this->gallery_path_url = base_url().'system/gambar/';
		$this->load->helper(array('form', 'url'));
	}
	
//fungsi untuk otentikasi login
	function cek_login() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('tbl_admin');
		return $query->result();
		}
	
	function level_checking($username){
	$q=$this->db->query("SELECT level 
						FROM tbl_admin
						WHERE username='".$username."'");
	return $q;
	}

//fungsi untuk menajemen obyek wisata
	function manajemen_obyek_wisata(){
	$q=$this->db->query("SELECT * FROM tbl_obyek_wisata");
	return $q;
	}
	
//fungsi untuk manajemen menu
	function manajemen_menu(){
	$q=$this->db->query("SELECT * FROM tbl_menu");
	return $q;
	}

//fungsi untuk menajemen bulan
	function manajemen_bulan(){
	$q=$this->db->query("SELECT * FROM tbl_bulan");
	return $q;
	}

//fungsi untuk menambah obyek wisata baru
	function tambah_bulan(){
		$bulan = $this->input->post('bulan');
		$data = array(
			'nama_bulan' => $bulan
			);
		$this->db->insert('tbl_bulan', $data);
		$id_bulan2=$this->db->insert_id();
		$query=$this->db->query("SELECT * FROM tbl_obyek_wisata");
		foreach ($query->result() as $row){
		$data2 = array(
			'id_obyek_wisata' => $row->id_obyek_wisata,
			'id_bulan' => $id_bulan2
			);
		$this->db->insert('tbl_retribusi', $data2);
		}
	}

//fungsi untuk ganti password	
	function password_lama(){
	$q=$this->db->query("SELECT password FROM tbl_admin
						WHERE username='admin'");
	return $q;
	}
	
	function target_ganti_password($password1,$password2){
			$data = array(
				'password' => $password2
				);
			$this->db->where('username', 'admin');
			$this->db->update('tbl_admin', $data);
		}

//fungsi untuk mengedit bulan
	function edit_bulan($id_bulan){
	$q=$this->db->query("SELECT * FROM tbl_bulan 
						WHERE id_bulan=".$id_bulan."");
	return $q;
	}
	
	function select_bulan($id_bulan){
		return $this->db->get_where('tbl_bulan', array('id_bulan' => $id_bulan))->row();
	}

	function target_edit_bulan($id_bulan){
			$bulan = $this->input->post('bulan');
			$data = array(
				'nama_bulan' => $bulan
				);
			$this->db->where('id_bulan', $id_bulan);
			$this->db->update('tbl_bulan', $data);
		}
	
	function delete_bulan($id_bulan){
		$this->db->where('id_bulan', $id_bulan);
		$this->db->delete('tbl_bulan');
	}
	
//fungsi untuk mengetahui nama obyek wisata atau souvenir
	function nama_obwis_souvenir($nama,$tabel,$nama_id,$id){
		$q=$this->db->query("SELECT ".$nama." FROM ".$tabel."
							 WHERE ".$nama_id."=".$id."");
		return $q;
	}
		
//fungsi untuk menambah obyek wisata baru
	function do_upload(){
		$config['upload_path'] = './gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data2 = $this->upload->data();
			$config2['source_image']		= $data2['full_path'];
			$config2['new_image'] 			= './gambar/thumbnails/'.$_FILES['userfile']['name'];
			$config2['maintain_ratio'] 		= TRUE;
			$config2['width']	 			= 180;
			$config2['height']				= 120;
			$this->load->library('image_lib', $config2); 
			$this->image_lib->resize();
		}
		$nama_obyek_wisata = $this->input->post('nama_obyek_wisata');
		$htm = $this->input->post('htm');
		$deskripsi = $this->input->post('deskripsi');
		$userfile = $_FILES['userfile']['name'];
		$data = array(
			'nama_obyek_wisata' => $nama_obyek_wisata,
			'htm' => $htm,
			'deskripsi' => $deskripsi,
			'gambar' => $userfile
			);
		$this->db->insert('tbl_obyek_wisata', $data);
		$id_obyek_wisata2=$this->db->insert_id();
		$query=$this->db->query("SELECT * FROM tbl_bulan");
		foreach ($query->result() as $row){
		$data = array(
			'id_obyek_wisata' => $id_obyek_wisata2,
			'id_bulan' => $row->id_bulan
			);
		$this->db->insert('tbl_retribusi', $data);
		}
	}
	
//fungsi untuk mengedit obyek wisata
	function edit_obyek_wisata($id_obyek_wisata){
	$q=$this->db->query("SELECT * FROM tbl_obyek_wisata 
						WHERE id_obyek_wisata=".$id_obyek_wisata."");
	return $q;
	}
	
	function select($id_obyek_wisata){
		return $this->db->get_where('tbl_obyek_wisata', array('id_obyek_wisata' => $id_obyek_wisata))->row();
	}
	
	function target_edit_obyek_wisata($id_obyek_wisata){
	$userfile = $_FILES['userfile']['name'];
		if(!empty($userfile)){
		$config['upload_path'] = './gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data2 = $this->upload->data();
			$config2['source_image']		= $data2['full_path'];
			$config2['new_image'] 			= './gambar/thumbnails/'.$_FILES['userfile']['name'];
			$config2['maintain_ratio'] 		= TRUE;
			$config2['width']	 			= 180;
			$config2['height']				= 120;
			$this->load->library('image_lib', $config2); 
			$this->image_lib->resize();
			$nama_obyek_wisata = $this->input->post('nama_obyek_wisata');
			$deskripsi = $this->input->post('deskripsi');
			$htm = $this->input->post('htm');
			$userfile = $_FILES['userfile']['name'];
			$data = array(
				'nama_obyek_wisata' => $nama_obyek_wisata,
				'htm' => $htm,
				'deskripsi'=>$deskripsi,
				'gambar' => $userfile
				);
			$this->db->where('id_obyek_wisata', $id_obyek_wisata);
			$this->db->update('tbl_obyek_wisata', $data);
		}
		}else{
		$nama_obyek_wisata = $this->input->post('nama_obyek_wisata');
		$deskripsi = $this->input->post('deskripsi');
			$htm = $this->input->post('htm');
			$data = array(
				'nama_obyek_wisata' => $nama_obyek_wisata,
				'htm' => $htm,
				'deskripsi'=>$deskripsi
				);
			$this->db->where('id_obyek_wisata', $id_obyek_wisata);
			$this->db->update('tbl_obyek_wisata', $data);
		}
		}
		
//fungsi untuk menghapus obyek wisata
	function delete_obyek_wisata($id_obyek_wisata){
		$this->db->where('id_obyek_wisata', $id_obyek_wisata);
		$this->db->delete('tbl_obyek_wisata');
	}
	
//fungsi untuk menajemen souvenir
	function manajemen_souvenir(){
	$q=$this->db->query("SELECT * FROM tbl_souvenir");
	return $q;
	}
	
//fungsi untuk menambah obyek wisata baru
	function do_upload_souvenir(){
		$config['upload_path'] = './gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data2 = $this->upload->data();
			$config2['source_image']		= $data2['full_path'];
			$config2['new_image'] 			= './gambar/thumbnails/'.$_FILES['userfile']['name'];
			$config2['maintain_ratio'] 		= TRUE;
			$config2['width']	 			= 180;
			$config2['height']				= 120;
			$this->load->library('image_lib', $config2); 
			$this->image_lib->resize();
		}
		$nama_souvenir = $this->input->post('nama_souvenir');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
		$userfile = $_FILES['userfile']['name'];
		$data = array(
			'nama_souvenir' => $nama_souvenir,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'gambar' => $userfile
			);
		$this->db->insert('tbl_souvenir', $data);
	}

//fungsi untuk mengedit souvenir
	function edit_souvenir($id_souvenir){
	$q=$this->db->query("SELECT * FROM tbl_souvenir 
						WHERE id_souvenir=".$id_souvenir."");
	return $q;
	}
	
	function select_souvenir($id_souvenir){
		return $this->db->get_where('tbl_souvenir', array('id_souvenir' => $id_souvenir))->row();
	}
	
	function target_edit_souvenir($id_souvenir){
	$userfile = $_FILES['userfile']['name'];
		if(!empty($userfile)){
		$config['upload_path'] = './gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data2 = $this->upload->data();
			$config2['source_image']		= $data2['full_path'];
			$config2['new_image'] 			= './gambar/thumbnails/'.$_FILES['userfile']['name'];
			$config2['maintain_ratio'] 		= TRUE;
			$config2['width']	 			= 180;
			$config2['height']				= 120;
			$this->load->library('image_lib', $config2); 
			$this->image_lib->resize();
			$nama_souvenir = $this->input->post('nama_souvenir');
			$harga = $this->input->post('harga');
			$deskripsi = $this->input->post('deskripsi');
			$userfile = $_FILES['userfile']['name'];
			$data = array(
				'nama_souvenir' => $nama_souvenir,
				'harga' => $harga,
				'deskripsi'=>$deskripsi,
				'gambar' => $userfile
				);
			$this->db->where('id_souvenir', $id_souvenir);
			$this->db->update('tbl_souvenir', $data);
		}
		}else{
		$nama_souvenir = $this->input->post('nama_souvenir');
			$harga = $this->input->post('harga');
			$deskripsi = $this->input->post('deskripsi');
			$data = array(
				'nama_souvenir' => $nama_souvenir,
				'harga' => $harga,
				'deskripsi'=>$deskripsi
				);
			$this->db->where('id_souvenir', $id_souvenir);
			$this->db->update('tbl_souvenir', $data);
		}
		}
		
		//fungsi untuk menghapus obyek wisata
	function delete_souvenir($id_souvenir){
		$this->db->where('id_souvenir', $id_souvenir);
		$this->db->delete('tbl_souvenir');
	}
//fungsi untuk mengedit menu
	function edit_isi_menu($id_menu){
	$q=$this->db->query("SELECT * FROM tbl_menu 
						WHERE id_menu=".$id_menu."");
	return $q;
	}
	
	function select_isi_menu($id_menu){
		return $this->db->get_where('tbl_menu', array('id_menu' => $id_menu))->row();
	}
	
//fungsi untuk target isi menu		
	function target_edit_isi_menu($id_menu){
			$deskripsi = $this->input->post('deskripsi');
			$data = array(
				'deskripsi'=>$deskripsi,
				);
			$this->db->where('id_menu', $id_menu);
			$this->db->update('tbl_menu', $data);
		}
		
//RETRIBUSI
	function daftar_retribusi($id_obyek_wisata){
	$q=$this->db->query("SELECT obw.id_obyek_wisata AS id_obyek_wisata,
								obw.nama_obyek_wisata AS nama_obyek_wisata,
								bul.id_bulan AS id_bulan,
								bul.nama_bulan AS nama_bulan,
								ret.retribusi AS retribusi
						 FROM tbl_bulan bul,
							  tbl_retribusi ret,
							  tbl_obyek_wisata obw
						 WHERE ret.id_obyek_wisata=obw.id_obyek_wisata AND
							   ret.id_bulan=bul.id_bulan AND
							   ret.id_obyek_wisata=".$id_obyek_wisata." 
						 ORDER BY ret.id_bulan DESC");
	return $q;
	}
	
	function retribusi_bulan($id_obyek_wisata,$id_bulan){
	$q=$this->db->query("SELECT obw.id_obyek_wisata AS id_obyek_wisata,
								obw.nama_obyek_wisata AS nama_obyek_wisata,
								bul.id_bulan AS id_bulan,
								bul.nama_bulan AS nama_bulan,
								ret.retribusi AS retribusi
						 FROM tbl_bulan bul,
							  tbl_retribusi ret,
							  tbl_obyek_wisata obw
						 WHERE ret.id_obyek_wisata=obw.id_obyek_wisata AND
							   ret.id_bulan=bul.id_bulan AND
							   ret.id_obyek_wisata=".$id_obyek_wisata." AND
							   ret.id_bulan=".$id_bulan."
						 ORDER BY ret.id_bulan");
	return $q;
	}
	
	function update_retribusi($id_obyek_wisata,$id_bulan){
			$retribusi = $this->input->post('retribusi');
			$data = array(
				'retribusi'=>$retribusi,
				);
			$this->db->where('id_obyek_wisata', $id_obyek_wisata);
			$this->db->where('id_bulan', $id_bulan);
			$this->db->update('tbl_retribusi', $data);	
			}
			
}
?>