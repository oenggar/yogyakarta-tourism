<?php
function formatangka($nilaiUang)
{
  $nilaiRupiah 	= "";
  $jumlahAngka 	= strlen($nilaiUang);
  while($jumlahAngka > 3)
  {
    $nilaiRupiah = "." . substr($nilaiUang,-3) . $nilaiRupiah;
    $sisaNilai = strlen($nilaiUang) - 3;
    $nilaiUang = substr($nilaiUang,0,$sisaNilai);
    $jumlahAngka = strlen($nilaiUang);
  }
 
  $nilaiRupiah = $nilaiUang . $nilaiRupiah . " pengunjung";
  return $nilaiRupiah;
}
?>