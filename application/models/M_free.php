<?php
class M_free extends CI_Model{

public function __construct()
    {
        parent::__construct();
    }
	
	function deskripsi_menu($id_menu){
	$q=$this->db->query("SELECT *
						 FROM tbl_menu
						 WHERE id_menu=".$id_menu." LIMIT 1");
	return $q;
	}
	
	function obyek_wisata($limit, $start){
	$this->db->limit($limit, $start);
    return $this->db->get('tbl_obyek_wisata')->result();
	}
	
	function view_obyek_wisata($id_obyek_wisata){
	$q=$this->db->query("SELECT *
						 FROM tbl_obyek_wisata
						 WHERE id_obyek_wisata=".$id_obyek_wisata." LIMIT 1");
	return $q;
	}
	
	function souvenir($limit, $start){
	$this->db->limit($limit, $start);
    return $this->db->get('tbl_souvenir')->result();
	}
	
	function view_souvenir($id_souvenir){
	$q=$this->db->query("SELECT *
						 FROM tbl_souvenir
						 WHERE id_souvenir=".$id_souvenir." LIMIT 1");
	return $q;
	}
	
	function lihat_obyek_wisata($id_obyek_wisata){
	$q=$this->db->query("SELECT nama_obyek_wisata, gambar
						 FROM tbl_obyek_wisata
						 WHERE id_obyek_wisata=".$id_obyek_wisata."");
	return $q;
	}
	
	function view_retribusi($id_obyek_wisata){
	$row=$this->db->count_all_results("tbl_bulan");
	$offset=$row-4;
	$q=$this->db->query("SELECT obw.nama_obyek_wisata AS nama_obyek_wisata,
								obw.gambar AS gambar,
								bln.id_bulan AS id_bulan,
								bln.nama_bulan AS nama_bulan,
								ret.retribusi AS retribusi
						 FROM tbl_obyek_wisata obw, 
							  tbl_bulan bln,
							  tbl_retribusi ret
						 WHERE ret.id_obyek_wisata=obw.id_obyek_wisata AND
							   ret.id_bulan=bln.id_bulan AND
								obw.id_obyek_wisata=".$id_obyek_wisata." 
						ORDER BY ret.id_bulan asc LIMIT ".$offset.",4");
	return $q;
	}
	
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

}
?>