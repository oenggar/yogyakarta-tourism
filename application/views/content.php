<?php switch($jenis){
	case "Home";
		include("selamatdatang.php");
		break;
	case "obyek wisata";
		include("obyek_wisata.php");
		break;
	case "tambah obyek wisata";
		include("tambah_obyek_wisata.php");
		break;
	case "edit obyek wisata";
		include("edit_obyek_wisata.php");
		break;
	case "souvenir";
		include("souvenir.php");
		break;
	case "tambah souvenir";
		include("tambah_souvenir.php");
		break;
	case "edit souvenir";
		include("edit_souvenir.php");
		break;
	case "menu";
		include("menu.php");
		break;
	case "edit menu";
		include("edit_menu.php");
		break;
	case "bulan";
		include("bulan.php");
		break;
	case "tambah bulan";
		include("tambah_bulan.php");
		break;
	case "edit bulan";
		include("edit_bulan.php");
		break;
	case "tambah_artikel";
		include("admin/tambah_artikel.php");
		break;
	case "retribusi";
		include("retribusi.php");
		break;
	case "daftar retribusi";
		include("daftar_retribusi.php");
		break;
	case "input retribusi";
		include("input_retribusi.php");
		break;
	case "ganti password";
		include("ganti_password.php");
		break;
	case "password salah";
		include("password_salah.php");
		break;
	case "edit_galeri";
		include("admin/galeri/edit_galeri.php");
		break;
	case "manajemen_iklan";
		include("admin/iklan/manajemen_iklan.php");
		break;
	case "tambah_iklan";
		include("admin/iklan/tambah_iklan.php");
		break;
	case "edit_iklan";
		include("admin/iklan/edit_iklan.php");
		break;
	}
	?>