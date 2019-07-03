<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rt.php');?>

 <?php
  mysqli_connect('localhost','k0762615_cidapen','Lrcom123!@#','k0762615_cidapen');?>
<div style="margin-top: 80px;">
        <!-- MENU -->

        <?php include('menu_rt3.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="panel-title clearfix">
                  <span class="pull-left">
                    <span class="glyphicon glyphicon-certificate"></span>&nbsp;&nbsp;Upload data
                  </span>
					
                </div>
              </div>
                  <div class="panel-body">
				  
				 
	<?php			 
				  if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
 
//Script Upload File..
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
        
    }
 
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        $import="INSERT into sarana_kesehatan (id_kesehatan,puskesmas,posyandu,praktek_bidan,rt,rw) 
		values (NULL,'$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysql_query($import) or die(mysql_error()); //Melakukan Import
    }
 
    fclose($handle); //Menutup CSV file
    echo "<br><strong>Import data selesai.</strong>";
    
}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
                      <h3><font face='arial'>Silahkan masukan file csv Sarana Kesehatan<br /></h3>
					  <hr>
						<form enctype='multipart/form-data' action='' method='post'>
							<h4>bentuk format penulisan excel dan di simpan dalam bentuk csv.</h4>
							<img src="<?php echo base_url();?>berkas/img/kesehatan.png" width ="50%" height="25%"></img>
	
							<h3><br>Cari CSV File anda:</font></h3><br />
	
							<input type='file' name='filename' size='10000'>
								<br>
									<br>
										<input type="reset" name="reset" value="Batal"> &nbsp <input type='submit' name='submit' value='Import'></form>
 
<?php } mysql_close(); //Menutup koneksi SQL?>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
     </div> 
</body>