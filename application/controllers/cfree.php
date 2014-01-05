<?php
class Cfree extends CI_Controller{

	function index(){
	$this->load->model('M_free');
	$query_home = $this->M_free->deskripsi_menu(1);
	$data['deskripsi_menu'] = $query_home->row();
	$data['jenis'] = "home";
	$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
	$this->load->view('free/bg_header', $data);
	$this->load->view('free/selamatdatang', $data);
	$this->load->view('free/bg_right', $data);
	$this->load->view('free/bg_footer', $data);
	}
	
	function menu($id_menu){
	if ($id_menu==1){
	$this->load->model('M_free');
	$query_menu = $this->M_free->deskripsi_menu(1);
	$data['deskripsi_menu'] = $query_menu->row();
	$data['jenis'] = "home";
	$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
	$this->load->view('free/bg_header', $data);
	$this->load->view('free/selamatdatang', $data);
	$this->load->view('free/bg_right', $data);
	$this->load->view('free/bg_footer', $data);
	}elseif($id_menu==2){
	$this->load->model('M_free');
	$query_menu = $this->M_free->deskripsi_menu(2);
	$data['deskripsi_menu'] = $query_menu->row();
	$data['jenis'] = "about";
	$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
	$this->load->view('free/bg_header', $data);
	$this->load->view('free/selamatdatang', $data);
	$this->load->view('free/bg_right', $data);
	$this->load->view('free/bg_footer', $data);
	}else{
	$this->load->model('M_free');
	$query_menu = $this->M_free->deskripsi_menu(3);
	$data['deskripsi_menu'] = $query_menu->row();
	$data['jenis'] = "contact";
	$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
	$this->load->view('free/bg_header', $data);
	$this->load->view('free/selamatdatang', $data);
	$this->load->view('free/bg_right', $data);
	$this->load->view('free/bg_footer', $data);
	}
	}
	
//fungsi untuk obyek wisata	
	function obyek_wisata($id = NULL){
	$this->load->model('M_free');
	$this->load->library('pagination');
	$config['base_url'] = base_url().'index.php/cfree/obyek_wisata/';
	$config['total_rows'] = $this->db->count_all('tbl_obyek_wisata');
	$config['per_page'] = 2;
	$config['num_links'] = 20;
	$this->pagination->initialize($config);
	$data['jenis'] = 'tbl_obyek_wisata';
	$data['hasil'] =
	$this->db->get('tbl_obyek_wisata', $config['per_page'], $this->uri->segment(3),$this->db->order_by("nama_obyek_wisata"));
	$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
	$this->load->view('free/bg_header', $data);
	$this->load->view('free/obyekwisata', $data);
	$this->load->view('free/bg_right', $data);
	$this->load->view('free/bg_footer', $data);
	}
	
	function view_obyek_wisata($id_obyek_wisata){
	$this->load->model('M_free');
		$query = $this->M_free->view_obyek_wisata($id_obyek_wisata);
		$data['ambilisi'] = $query->row();
		$data['jenis'] = 'obyek wisata';
		$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
		$this->load->view('free/bg_header', $data);
		$this->load->view('free/view_obyekwisata', $data);
		$this->load->view('free/bg_right', $data);
		$this->load->view('free/bg_footer', $data);
	}

	
//fungsi untuk souvenir	
	function souvenir($id = NULL){
	$this->load->model('M_free');
	$this->load->library('pagination');
	$config['base_url'] = base_url().'index.php/cfree/souvenir/';
	$config['total_rows'] = $this->db->count_all('tbl_souvenir');
	$config['per_page'] = 5;
	$config['num_links'] = 20;
	$this->pagination->initialize($config);
	$data['jenis'] = 'tbl_souvenir';
	$data['hasil'] =
	$this->db->get('tbl_souvenir', $config['per_page'], $this->uri->segment(3),$this->db->order_by("nama_souvenir"));
	$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
	$this->load->view('free/bg_header', $data);
	$this->load->view('free/souvenir', $data);
	$this->load->view('free/bg_right', $data);
	$this->load->view('free/bg_footer', $data);
	}
	
	function view_souvenir($id_souvenir){
	$this->load->model('M_free');
		$query = $this->M_free->view_souvenir($id_souvenir);
		$data['ambilisi'] = $query->row();
		$data['jenis'] = 'souvenir';
		$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
		$this->load->view('free/bg_header', $data);
		$this->load->view('free/view_souvenir', $data);
		$this->load->view('free/bg_right', $data);
		$this->load->view('free/bg_footer', $data);
	}
	
		
//fungsi untuk obyek wisata	
	function retribusi($id = NULL){
	$this->load->model('M_free');
	$this->load->library('pagination');
	$config['base_url'] = base_url().'index.php/cfree/retribusi/';
	$config['total_rows'] = $this->db->count_all('tbl_obyek_wisata');
	$config['per_page'] = 2;
	$config['num_links'] = 20;
	$this->pagination->initialize($config);
	$data['jenis'] = 'retribusi';
	$data['hasil'] =
	$this->db->get('tbl_obyek_wisata', $config['per_page'], $this->uri->segment(3),$this->db->order_by("nama_obyek_wisata"));
	$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
	$this->load->view('free/bg_header', $data);
	$this->load->view('free/retribusi', $data);
	$this->load->view('free/bg_right', $data);
	$this->load->view('free/bg_footer', $data);	}
	
	function view_retribusi($id_obyek_wisata){
	$this->load->model('M_free');
	$data['view'] = $this->M_free->view_retribusi($id_obyek_wisata);
	$query_obyek_wisata = $this->M_free->lihat_obyek_wisata($id_obyek_wisata);
	$data['ambilobwis'] = $query_obyek_wisata->row();
	$data['daftar_retribusi']=$this->M_free->daftar_retribusi($id_obyek_wisata);
	$data['jenis'] = 'retribusi';
	$query_about=$this->M_free->deskripsi_menu(3);
	$r_about = $query_about->row();
	$data['about'] = $r_about->deskripsi;
	$this->load->view('free/bg_header_graph', $data);
	$this->load->view('free/view_retribusi', $data);
	$this->load->view('free/bg_right', $data);
	$this->load->view('free/bg_footer', $data);
	}

	
}
?>