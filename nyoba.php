<html>
<head>
<title>Upload page</title>
</head>
<body>
<?php
//KONEKSI..
$host='localhost';
$username='root';
$password='1234';
$database='db_sidapen';
mysql_connect($host,$username,$password);
mysql_select_db($database);
 
if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
 
//Script Upload File..
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }
 
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        $import="INSERT into tbl_t_penduduk (id_penduduk,id_kk,id_status_penduduk,nama,
		no_penduduk,agama,tmpt_lahir,tgl_lahir,rt,rw,jenis_kelamin,usia,gol_darah,pendidikan,
		status_pernikahan,status_sosial,pekerjaan,status_dalam_keluarga,tanggal_input,akte,
		usia_kawin_pertama,tempat_tinggal,tgl_kematian) values(NULL,'$data[0]','$data[1]','$data[2]','$data[3]',
		'$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]',
		'$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysql_query($import) or die(mysql_error()); //Melakukan Import
    }
 
    fclose($handle); //Menutup CSV file
    echo "<br><strong>Import data selesai.</strong>";
    
}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
 
<!-- Form Untuk Upload File CSV-->
   Silahkan masukan file csv yang ingin diupload<br />
   <form enctype='multipart/form-data' action='' method='post'>
    Cari CSV File anda:<br />
    <input type='file' name='filename' size='100'>
   <input type='submit' name='submit' value='Upload'></form>
 
<?php } mysql_close(); //Menutup koneksi SQL?>
</body>
</html><br><br><br>