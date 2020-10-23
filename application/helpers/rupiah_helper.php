<?php
function rupiah2($angka){
	$hasil_rupiah = "Rp " . number_format($angka, 1, ",", ".");
	return $hasil_rupiah;
}
?>