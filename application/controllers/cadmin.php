<?php
Class Cadmin extends CI_Controller {
	var $user="";

	
	function _construct(){
		parent::_construct();
		session_start();
	}
	
	function index(){
	$this->load->view("login");
		}
		
	function user_checking(){
	$this->load->model("M_admin");
	$data['username']=$this->input->post('username');
	$data['password']=$this->input->post('password');
	$data['hasil']=$this->M_admin->cek_login();
	if ($data['hasil']==null)
	$answer="no";
	else
	$answer="yes";
	return $answer;
	}
		
	//fungsi untuk otentikasi login
	function login_auth(){
	$answer=$this->user_checking();
	if ($answer=="yes") {
	$data['username'] = $this->input->post('username');
	$q=$this->M_admin->level_checking($data['username']);
	$level=$q->row();
	$data["jenis"]="Home";
	$session_content = array('username' => $data['username'], 'login' => TRUE, 'level'=>$level);
	$this->session->set_userdata($session_content);//continue later
	$data["username"]=$this->session->userdata('username');
	$this->load->view('admin',$data);
	}else{
	$this->load->view('gagal_login');//continue later
	}
	}
	
	function home(){
	$data["jenis"]="Home";
	$data["username"]=$this->session->userdata('username');
	$this->load->view('admin',$data);
	}
	
	function ganti_password() {
		if ($this->session->userdata('login') == TRUE) {
			$data["username"]=$this->session->userdata('username');
			$data["jenis"]="ganti password";
			$this->load->view('admin',$data);
		}
		else {
			redirect('cadmin');
		}
	}
	
	function target_ganti_password() {
		if ($this->session->userdata('login') == TRUE) {
			$passwordlama=md5($this->input->post('passwordlama'));
			$password1=md5($this->input->post('password1'));
			$password2=md5($this->input->post('password2'));
			$this->load->model("M_admin");
			$query_pass=$this->M_admin->password_lama();
			$r_pass=$query_pass->row();
			if(($password1==$password2)&&($passwordlama==$r_pass->password)){
			$this->M_admin->target_ganti_password($password1,$password2);
			$this->home();
			}elseif(($password1!=$password2)||($passwordlama!=$r_pass->password)){
			echo $r_pass->password."<br>".$passwordlama."<br>".$password1."<br>".$password2;
			}
		}
		else {
			redirect('cadmin');
		}
	}

	//fungsi untuk manajemen menu
	function manajemen_menu(){
	if ($this->session->userdata('login') == TRUE) {
	$this->load->model("M_admin");
	$data['daftar_menu']=$this->M_admin->manajemen_menu();
	$data['jenis'] = 'menu';
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}
	
	//fungsi untuk mengedit obyek wisata
	function edit_isi_menu($id = null) {
		if ($this->session->userdata('login') == TRUE) {
			if($_POST == NULL) {
				$this->load->model('M_admin');
				$data['hasil'] = $this->M_admin->select_isi_menu($id);
				$data['jenis'] = 'edit menu';
				$this->load->view('admin', $data);
			}
			else {
				$this->load->model('M_admin');
				$this->M_admin->target_edit_isi_menu($id);
				redirect('cadmin/manajemen_menu');
			}
		}
		else {
			redirect('cadmin');
		}
	}
	
	//fungsi untuk manajemen obyek wisata
	function manajemen_obyek_wisata(){
	if ($this->session->userdata('login') == TRUE) {
	$this->load->model("M_admin");
	$data['obyek_wisata']=$this->M_admin->manajemen_obyek_wisata(6,0);
	$this->load->library('pagination');
	$config['base_url'] = base_url().'index.php/cadmin/manajemen_obyek_wisata/';
	$config['total_rows'] = $this->db->count_all('tbl_obyek_wisata');
	$config['per_page'] = 10;
	$config['num_links'] = 20;
	$this->pagination->initialize($config);
	$data['jenis'] = 'obyek wisata';
	$data['hasil'] =
	$this->db->get('tbl_obyek_wisata', $config['per_page'], $this->uri->segment(3));
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}

//fungsi untuk menambah obyek wisata
	function tambah_obyek_wisata(){
	if ($this->session->userdata('login') == TRUE) {
			if ($this->input->post('submit')) {
				$this->load->model('M_admin');
				$this->M_admin->do_upload();
				redirect('cadmin/manajemen_obyek_wisata');
			}
	$data['jenis'] = 'tambah obyek wisata';
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}

//fungsi untuk mengedit obyek wisata
	function edit_obyek_wisata($id = null) {
		if ($this->session->userdata('login') == TRUE) {
			if($_POST == NULL) {
				$this->load->model('M_admin');
				$data['hasil'] = $this->M_admin->select($id);
				$data['jenis'] = 'edit obyek wisata';
				$this->load->view('admin', $data);
			}
			else {
				$this->load->model('M_admin');
				$this->M_admin->target_edit_obyek_wisata($id);
				redirect('cadmin/manajemen_obyek_wisata');
			}
		}
		else {
			redirect('cadmin');
		}
	}

//fungsi untuk menghapus obyek wisata	
	function delete_obyek_wisata($id = null) {
		if ($this->session->userdata('login') == TRUE) {
			$this->load->model('M_admin');
			$this->M_admin->delete_obyek_wisata($id);
			redirect('cadmin/manajemen_obyek_wisata');
		}
		else {
			redirect('cadmin');
		}
	}

	//  <----SOUVENIR---->>
	
//fungsi untuk manajemen souvenir
	function manajemen_souvenir(){
	if ($this->session->userdata('login') == TRUE) {
	$this->load->model("M_admin");
	$data['souvenir']=$this->M_admin->manajemen_souvenir();
	$this->load->library('pagination');
	$config['base_url'] = base_url().'index.php/cadmin/manajemen_souvenir/';
	$config['total_rows'] = $this->db->count_all('tbl_souvenir');
	$config['per_page'] = 10;
	$config['num_links'] = 20;
	$this->pagination->initialize($config);
	$data['jenis'] = 'souvenir';
	$data['hasil'] =
	$this->db->get('tbl_souvenir', $config['per_page'], $this->uri->segment(3));
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}	
	
//fungsi untuk menambah obyek wisata
	function tambah_souvenir(){
	if ($this->session->userdata('login') == TRUE) {
			if ($this->input->post('submit')) {
				$this->load->model('M_admin');
				$this->M_admin->do_upload_souvenir();
				redirect('cadmin/manajemen_souvenir');
			}
	$data['jenis'] = 'tambah souvenir';
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}

//fungsi untuk mengedit souvenir
	function edit_souvenir($id = null) {
		if ($this->session->userdata('login') == TRUE) {
			if($_POST == NULL) {
				$this->load->model('M_admin');
				$data['hasil'] = $this->M_admin->select_souvenir($id);
				$data['jenis'] = 'edit souvenir';
				$this->load->view('admin', $data);
			}
			else {
				$this->load->model('M_admin');
				$this->M_admin->target_edit_souvenir($id);
				redirect('cadmin/manajemen_souvenir');
			}
		}
		else {
			redirect('cadmin');
		}
	}
	
	//fungsi untuk menghapus obyek wisata	
	function delete_souvenir($id = null) {
		if ($this->session->userdata('login') == TRUE) {
			$this->load->model('M_admin');
			$this->M_admin->delete_souvenir($id);
			redirect('cadmin/manajemen_souvenir');
		}
		else {
			redirect('cadmin');
		}
	}
	
//-----BULAN------
//fungsi untuk manajemen data bulan
	function manajemen_bulan(){
	if ($this->session->userdata('login') == TRUE) {
	$this->load->model("M_admin");
	$data['bulan']=$this->M_admin->manajemen_bulan(6,0);
	$this->load->library('pagination');
	$config['base_url'] = base_url().'index.php/cadmin/manajemen_bulan/';
	$config['total_rows'] = $this->db->count_all('tbl_bulan');
	$config['per_page'] = 2;
	$config['num_links'] = 20;
	$this->pagination->initialize($config);
	$data['jenis'] = 'bulan';
	$data['hasil'] =
	$this->db->get('tbl_bulan', $config['per_page'], $this->uri->segment(3),$this->db->order_by("id_bulan","desc"));
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}
	
//fungsi untuk menambah bulan
	function tambah_bulan(){
	if ($this->session->userdata('login') == TRUE) {
			if ($this->input->post('submit')) {
				$this->load->model('M_admin');
				$this->M_admin->tambah_bulan();
				redirect('cadmin/manajemen_bulan');
			}
	$data['jenis'] = 'tambah bulan';
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}
	
//fungsi untuk mengedit bulan
	function edit_bulan($id = null) {
		if ($this->session->userdata('login') == TRUE) {
			if($_POST == NULL) {
				$this->load->model('M_admin');
				$data['hasil'] = $this->M_admin->select_bulan($id);
				$data['jenis'] = 'edit bulan';
				$this->load->view('admin', $data);
			}
			else {
				$this->load->model('M_admin');
				$this->M_admin->target_edit_bulan($id);
				redirect('cadmin/manajemen_bulan');
			}
		}
		else {
			redirect('cadmin');
		}
	}
	
	function delete_bulan($id = null) {
		if ($this->session->userdata('login') == TRUE) {
			$this->load->model('M_admin');
			$this->M_admin->delete_bulan($id);
			redirect('cadmin/manajemen_bulan');
		}
		else {
			redirect('cadmin');
		}
	}
	
//RETRIBUSI
	function manajemen_retribusi(){
	if ($this->session->userdata('login') == TRUE) {
	$this->load->model("M_admin");
	$data['obyek_wisata']=$this->M_admin->manajemen_obyek_wisata(6,0);
	$this->load->library('pagination');
	$config['base_url'] = base_url().'index.php/cadmin/manajemen_retribusi/';
	$config['total_rows'] = $this->db->count_all('tbl_obyek_wisata');
	$config['per_page'] = 10;
	$config['num_links'] = 20;
	$this->pagination->initialize($config);
	$data['jenis'] = 'retribusi';
	$data['hasil'] =
	$this->db->get('tbl_obyek_wisata', $config['per_page'], $this->uri->segment(3));
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}

//fungsi untuk daftar retribusi
	function daftar_retribusi($id_obyek_wisata){
	if ($this->session->userdata('login') == TRUE) {
	$this->load->model("M_admin");
	$data['retribusi_per_bulan']=$this->M_admin->daftar_retribusi($id_obyek_wisata);
	$query_name=$this->M_admin->nama_obwis_souvenir('nama_obyek_wisata','tbl_obyek_wisata','id_obyek_wisata',$id_obyek_wisata);
	$r_query_name=$query_name->row();
	$data['nama_obyek_wisata']=$r_query_name->nama_obyek_wisata;
	$data['jenis'] = 'daftar retribusi';
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}
	
//function untuk input retribusi
	function input_retribusi($id_obyek_wisata,$id_bulan){
	if ($this->session->userdata('login') == TRUE) {
	$id_obyek_wisata = $this->uri->segment(3);
	$id_bulan = $this->uri->segment(4);
	$this->load->model("M_admin");
	$data['retribusi_bulan'] = $this->M_admin->retribusi_bulan($id_obyek_wisata,$id_bulan);
	$data['jenis'] = 'input retribusi';
	$this->load->view('admin', $data);
	}else{
	redirect('cadmin');
	}
	}
	
	function update_retribusi($id_obyek_wisata,$id_bulan){
	if ($this->session->userdata('login') == TRUE) {
	$id_obyek_wisata = $this->uri->segment(3);
	$id_bulan = $this->uri->segment(4);
	$this->load->model("M_admin");
	$data['update_retribusi'] = $this->M_admin->update_retribusi($id_obyek_wisata,$id_bulan);
	redirect('cadmin/daftar_retribusi/'.$id_obyek_wisata);
	}else{
	redirect('cadmin');
	}
	}
	
	function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
}
?>