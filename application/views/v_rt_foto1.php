<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rt.php');?>

<div style="margin-top: 80px;">
        <!-- MENU -->

        <?php include('menu_rt.php') ;?>
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
  // Define database connection constants
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'db_sidapen');
?>
					<?php
  // Define application constants
  define('GW_UPLOADPATH', 'images/');
  define('GW_MAXFILESIZE', 32768000);      // 32 KB
?>
					
					<?php
					

  if (isset($_POST['submit'])) {
    // Grab the score data from the POST
    $no_penduduk = $_POST['no_penduduk'];
	$name = $_POST['name'];
    $screenshot = $_FILES['screenshot']['name'];
    $screenshot_type = $_FILES['screenshot']['type'];
    $screenshot_size = $_FILES['screenshot']['size']; 
	
	$screenshot1 = $_FILES['screenshot1']['name'];
    $screenshot_type1 = $_FILES['screenshot1']['type'];
    $screenshot_size1 = $_FILES['screenshot1']['size']; 
	
	$screenshot2 = $_FILES['screenshot2']['name'];
    $screenshot_type2 = $_FILES['screenshot2']['type'];
    $screenshot_size2 = $_FILES['screenshot2']['size']; 
	
	 if (!empty($no_penduduk) && !empty($name) && !empty($screenshot) && !empty($screenshot1) && !empty($screenshot2)) {
      if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') 
		  || ($screenshot_type == 'image/png') || ($screenshot_type1 == 'image/gif') || ($screenshot_type1 == 'image/jpeg')
		  || ($screenshot_type1 == 'image/pjpeg') || ($screenshot_type1 == 'image/png') || ($screenshot_type2 == 'image/gif') 
		  || ($screenshot_type2 == 'image/jpeg') || ($screenshot_type2 == 'image/pjpeg') || ($screenshot_type2 == 'image/png'))
          && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE) && ($screenshot_size1 > 0) && ($screenshot_size1 <= GW_MAXFILESIZE)
		  && ($screenshot_size2 > 0) && ($screenshot_size2 <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot']['error'] == 0 && $_FILES['screenshot1']['error'] == 0 && $_FILES['screenshot2']['error'] == 0) {
          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $screenshot. $screenshot1. $screenshot2;
          if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
            // Write the data to the database
            $query = "INSERT INTO tbl_upload (no_penduduk,nama,foto_ktp,foto_kk,foto_akta) VALUES ('$no_penduduk', '$name', '$screenshot','$screenshot1','$screenshot2')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Terima Kasih Telah Mengisi Data Dengan Benar.</p>';
            echo '<p><strong>No_penduduk:</strong> ' . $no_penduduk . '<br />';
			echo '<p><strong>Nama:</strong> ' . $name . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="KTP Success" /></p>';
			echo '<img src="' . GW_UPLOADPATH . $screenshot1 . '" alt="KK Success" /></p>';
			echo '<img src="' . GW_UPLOADPATH . $screenshot2 . '" alt="AKTA Success" /></p>';
            

            // Clear the score data to clear the form
            $no_penduduk = "";
			$name = "";
            $screenshot = "";
			$screenshot1 = "";
			$screenshot2 = "";
            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">Gambar Harus Berformat GIF, JPEG, atau PNG dan Tidak Melebihi Kapasitas ' . (GW_MAXFILESIZE / 1024) . ' KB.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
	   @unlink($_FILES['screenshot1']['tmp_name']);
	    @unlink($_FILES['screenshot2']['tmp_name']);
    }
	
	 if (!empty($no_penduduk) && !empty($name) && !empty($screenshot) && !empty($screenshot1)) {
      if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') 
		  || ($screenshot_type == 'image/png') || ($screenshot_type1 == 'image/gif') || ($screenshot_type1 == 'image/jpeg')
		  || ($screenshot_type1 == 'image/pjpeg') || ($screenshot_type1 == 'image/png'))
          && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE) && ($screenshot_size1 > 0) && ($screenshot_size1 <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot']['error'] == 0 && $_FILES['screenshot1']['error'] == 0) {
          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $screenshot. $screenshot1;
          if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
            // Write the data to the database
            $query = "INSERT INTO tbl_upload (no_penduduk,nama,foto_ktp,foto_kk) VALUES ('$no_penduduk', '$name', '$screenshot','$screenshot1')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Terima Kasih Telah Mengisi Data Dengan Benar.</p>';
            echo '<p><strong>No_penduduk:</strong> ' . $no_penduduk . '<br />';
			echo '<p><strong>Nama:</strong> ' . $name . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="KTP Success" /></p>';
			echo '<img src="' . GW_UPLOADPATH . $screenshot1 . '" alt="KK Success" /></p>';
         

            // Clear the score data to clear the form
            $no_penduduk = "";
			$name = "";
            $screenshot = "";
			$screenshot1 = "";
            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">Gambar Harus Berformat GIF, JPEG, atau PNG dan Tidak Melebihi Kapasitas ' . (GW_MAXFILESIZE / 1024) . ' KB.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
	   @unlink($_FILES['screenshot1']['tmp_name']);
    }
	
	if (!empty($no_penduduk) && !empty($name) && !empty($screenshot) && !empty($screenshot2)) {
      if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') 
		  || ($screenshot_type == 'image/png') || ($screenshot_type2 == 'image/gif') || ($screenshot_type2 == 'image/jpeg')
		  || ($screenshot_type2 == 'image/pjpeg') || ($screenshot_type2 == 'image/png'))
          && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE) && ($screenshot_size2 > 0) && ($screenshot_size2 <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot']['error'] == 0 && $_FILES['screenshot2']['error'] == 0) {
          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $screenshot. $screenshot1;
          if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
            // Write the data to the database
            $query = "INSERT INTO tbl_upload (no_penduduk,nama,foto_ktp,foto_akta) VALUES ('$no_penduduk', '$name', '$screenshot','$screenshot2')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Terima Kasih Telah Mengisi Data Dengan Benar.</p>';
            echo '<p><strong>No_penduduk:</strong> ' . $no_penduduk . '<br />';
			echo '<p><strong>Nama:</strong> ' . $name . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="KTP Success" /></p>';
			echo '<img src="' . GW_UPLOADPATH . $screenshot2 . '" alt="AKTA Success" /></p>';
       

            // Clear the score data to clear the form
            $no_penduduk = "";
			$name = "";
            $screenshot = "";
			$screenshot2 = "";
            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">Gambar Harus Berformat GIF, JPEG, atau PNG dan Tidak Melebihi Kapasitas ' . (GW_MAXFILESIZE / 1024) . ' KB.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
	   @unlink($_FILES['screenshot2']['tmp_name']);
    }
	
	if (!empty($no_penduduk) && !empty($name) && !empty($screenshot1) && !empty($screenshot2)) {
      if ((($screenshot_type1 == 'image/gif') || ($screenshot_type1 == 'image/jpeg') || ($screenshot_type1 == 'image/pjpeg') 
		  || ($screenshot_type1 == 'image/png') || ($screenshot_type2 == 'image/gif') || ($screenshot_type2 == 'image/jpeg')
		  || ($screenshot_type2 == 'image/pjpeg') || ($screenshot_type2 == 'image/png'))
          && ($screenshot_size1 > 0) && ($screenshot_size1 <= GW_MAXFILESIZE) && ($screenshot_size2 > 0) && ($screenshot_size2 <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot1']['error'] == 0 && $_FILES['screenshot2']['error'] == 0) {
          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $screenshot1. $screenshot1;
          if (move_uploaded_file($_FILES['screenshot1']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
            // Write the data to the database
            $query = "INSERT INTO tbl_upload (no_penduduk,nama,foto_kk,foto_akta) VALUES ('$no_penduduk', '$name', '$screenshot1','$screenshot2')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Terima Kasih Telah Mengisi Data Dengan Benar.</p>';
            echo '<p><strong>No_penduduk:</strong> ' . $no_penduduk . '<br />';
			echo '<p><strong>Nama:</strong> ' . $name . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot1 . '" alt="KK Success" /></p>';
			echo '<img src="' . GW_UPLOADPATH . $screenshot2 . '" alt="AKTA Success" /></p>';
           

            // Clear the score data to clear the form
            $no_penduduk = "";
			$name = "";
            $screenshot1 = "";
			$screenshot2 = "";
            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">Gambar Harus Berformat GIF, JPEG, atau PNG dan Tidak Melebihi Kapasitas ' . (GW_MAXFILESIZE / 1024) . ' KB.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot1']['tmp_name']);
	   @unlink($_FILES['screenshot2']['tmp_name']);
    }
	
	if (!empty($no_penduduk) && !empty($name) && !empty($screenshot)) {
      if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
        && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot']['error'] == 0) {
          // Move the file to the target upload folder
          $target1 = GW_UPLOADPATH . $screenshot;
          if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target1)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
            // Write the data to the database
            $query = "INSERT INTO tbl_upload (no_penduduk,nama,foto_ktp) VALUES ('$no_penduduk', '$name', '$screenshot')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Terima Kasih Telah Mengisi Data Dengan Benar.</p>';
            echo '<p><strong>No_penduduk:</strong> ' . $no_penduduk . '<br />';
			echo '<p><strong>Nama:</strong> ' . $name . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="KTP Success" /></p>';
         

            // Clear the score data to clear the form
            $no_penduduk = "";
			$name = "";
            $screenshot = "";
            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">Gambar Harus Berformat GIF, JPEG, atau PNG dan Tidak Melebihi Kapasitas ' . (GW_MAXFILESIZE / 1024) . ' KB.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
    }
	
	
	if (!empty($no_penduduk) && !empty($name) && !empty($screenshot1)) {
      if ((($screenshot_type1 == 'image/gif') || ($screenshot_type1 == 'image/jpeg') || ($screenshot_type1 == 'image/pjpeg') || ($screenshot_type1 == 'image/png'))
        && ($screenshot_size1 > 0) && ($screenshot_size1 <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot1']['error'] == 0) {
          // Move the file to the target upload folder
          $target2 = GW_UPLOADPATH . $screenshot1;
          if (move_uploaded_file($_FILES['screenshot1']['tmp_name'], $target2)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
            // Write the data to the database
            $query = "INSERT INTO tbl_upload (no_penduduk,nama,foto_kk) VALUES ('$no_penduduk', '$name','$screenshot1')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Terima Kasih Telah Mengisi Data Dengan Benar.</p>';
            echo '<p><strong>No_penduduk:</strong> ' . $no_penduduk . '<br />';
			echo '<p><strong>Nama:</strong> ' . $name . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot1 . '" alt="KK Success" /></p>';
         

            // Clear the score data to clear the form
            $no_penduduk = "";
			$name = "";
            $screenshot1 = "";
            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">Gambar Harus Berformat GIF, JPEG, atau PNG dan Tidak Melebihi Kapasitas ' . (GW_MAXFILESIZE / 1024) . ' KB.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot1']['tmp_name']);
    }
	 
	
	if (!empty($no_penduduk) && !empty($name) && !empty($screenshot2)) {
      if ((($screenshot_type2 == 'image/gif') || ($screenshot_type2 == 'image/jpeg') || ($screenshot_type2 == 'image/pjpeg') || ($screenshot_type2 == 'image/png'))
        && ($screenshot_size2 > 0) && ($screenshot_size2 <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot2']['error'] == 0) {
          // Move the file to the target upload folder
          $target3 = GW_UPLOADPATH . $screenshot2;
          if (move_uploaded_file($_FILES['screenshot2']['tmp_name'], $target3)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
            // Write the data to the database
            $query = "INSERT INTO tbl_upload (no_penduduk,nama,foto_akta) VALUES ('$no_penduduk', '$name','$screenshot2')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Terima Kasih Telah Mengisi Data Dengan Benar.</p>';
            echo '<p><strong>No_penduduk:</strong> ' . $no_penduduk . '<br />';
			echo '<p><strong>Nama:</strong> ' . $name . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot2 . '" alt="AKTE Success" /></p>';
       

            // Clear the score data to clear the form
            $no_penduduk = "";
			$name = "";
            $screenshot2 = "";
            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">Gambar Harus Berformat GIF, JPEG, atau PNG dan Tidak Melebihi Kapasitas ' . (GW_MAXFILESIZE / 1024) . ' KB.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot2']['tmp_name']);
    }

  }
?>
<center><h2>Upload Data KTP, KK dan Akte</h2></center>
					 <hr>
					 <b><br>
<h4>Data harus berdasarkan dengan data kependudukan</h4><br>
  <form enctype="multipart/form-data" method="post" action="">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
    <label for="no_penduduk">No_Identitas	&nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp &nbsp &nbsp &nbsp </label> 
    <input type="number" id="no_penduduk" name="no_penduduk" value="<?php if (!empty($no_penduduk)) echo $no_penduduk; ?>" /><h5> 
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <font color= "red" >*harus angka</font></h5>
    
	<label for="name">Nama &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp &nbsp &nbsp &nbsp </label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
	 <br>
	<label for="screenshot">Upload Foto KTP &nbsp :</label>
    <input type="file" id="screenshot" name="screenshot" />
	<br>
	<label for="screenshot1">Upload Foto KK &nbsp  &nbsp :</label>
    <input type="file" id="screenshot1" name="screenshot1" />
	<br>
	<label for="screenshot2">Upload Foto Akte  &nbsp :</label>
    <input type="file" id="screenshot2" name="screenshot2" />
    <hr />
    <input type="reset" name="reset" value="Kosongkan Form">&nbsp <input type="submit" value="Masukkan Data" name="submit" />
  </form>
  <br><br>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>