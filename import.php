<?php
include ("koneksi.php");
require_once ('excel/reader.php');
		$data = new Spreadsheet_Excel_Reader("kudeta.xls");
		$data->setOutputEncoding('CP1251');
		
		$fileexcel = $_FILES['datague']['name'];
		$data->read($fileexcel);
			
			for($x=2; $x <= count($data->sheets[0]["cells"]); $x++){
			$nama = $data->sheets[0]["cells"][$x][2];
			$no_pend = $data->sheets[0]["cells"][$x][3];
			$tmpt_lahir = $data->sheets[0]["cells"][$x][4];
			$tgl_lahir = $data->sheets[0]["cells"][$x][5];
			$rt = $data->sheets[0]["cells"][$x][6];
			$rw = $data->sheets[0]["cells"][$x][7];
			$simpan = mysql_query("INSERT INTO tbl_t_penduduk (nama,no_penduduk,tmpt_lahir,tgl_lahir,rt,rw) VALUES ('$nama', '$no_pend', '$tmpt_lahir', '$tgl_lahir', '$rt', '$rw')");
			
			if(!$simpan){
                echo "Data Ke ".$x." Gagal disimpan";
            }
        }
		echo "<script> alert('Data Berhasil di simpan'); history.go(-1);</script>";
?>