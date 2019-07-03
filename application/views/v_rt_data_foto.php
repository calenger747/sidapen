<?php include('head.php');?>
<?php include('appvars.php');?>
<?php include('connectvars.php');?>

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
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Penduduk <?php echo 'RT '.$rt.' RW '.$rw;?>
                  </span>

                  <!--<span class="pull-right">
					<a class="btn btn-primary btn-xs" href="<?php echo base_url();?>home_rt/export_datapenduduk" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data Excel</a>
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>home_rt/cetak_data_penduduk" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data PDF</a>
                  </span>-->
                </div>
              </div>
                  <div class="panel-body">
 <?php
 
  require_once('appvars.php');
  require_once('connectvars.php');
  
  echo'<h2>Data Penduduk</h2>';

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM tbl_upload WHERE no_penduduk >= '0' ORDER BY nama ASC";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML 
  echo '<table width="80%" cellpadding="2" cellspacing="2">';
  $i = 1;
  while ($row = mysqli_fetch_array($data)) { 
    // Display the score data
    if ($i == 0) {
      echo '<tr><td colspan="2" class="topscoreheader"><h1>Anggota Yang Sudah Terdaftar</h1></td></tr>';
    } else {
    $bgcol = ($i % 2 == 0) ? "#f0f0f0" : "#d0d0d0";
    echo '<tr bgcolor="'.$bgcol.'" >';
    if (is_file(GW_UPLOADPATH . $row['foto_ktp']) && filesize(GW_UPLOADPATH . $row['foto_ktp']) > 0 ||
	is_file(GW_UPLOADPATH . $row['foto_akta']) && filesize(GW_UPLOADPATH . $row['foto_akta']) > 0 ||
	is_file(GW_UPLOADPATH . $row['foto_kk']) && filesize(GW_UPLOADPATH . $row['foto_kk']) > 0) {
      echo '<td align="center"><img src="../' . GW_UPLOADPATH . $row['foto_ktp'] . '" alt="Foto KTP" width="200" /></td>';
	  echo '<td align="center"><img src="../' . GW_UPLOADPATH . $row['foto_akta'] . '" alt="Foto AKTA" width="200" /></td>';
	  echo '<td align="center"><img src="../' . GW_UPLOADPATH . $row['foto_kk'] . '" alt="Foto KK" width="200" /></td>';    
    }
	 
    else {
      echo '<td align="center"><img src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" width="200" /></td>';
    }

    echo '<td width="65%"  align="center" valign="top" style="padding-left : 20px">';
    echo '<span class="NIM"><h3>No. Penduduk : <br>' . $row['no_penduduk'] . '</h3></span>';
    echo '<strong>Nama:</strong><br> ' . $row['nama'] . '<br /></td>';
    echo '</tr>';
    }
    $i++;
  }
  echo '</table>';

  mysqli_close($dbc);
?>      
				<!--<img src="../images/2.png"></img>-->
					

                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>