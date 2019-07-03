<?php
  $rt = $this->session->userdata('rt');
  $rw = $this->session->userdata('rw');
  $total = count($jumlah);
  $total_hari = count($jumlah_hari);
?>

<div class="col-md-3">
<div class="panel panel-warning">
  <div class="panel-heading flippp">
    <h3 class="panel-title"><span class="glyphicon glyphicon-align-justify"></span>&nbsp;&nbsp;Menu</h3>
  </div>
  <div class="panel-body panelll">
            <div class="panel panel-info">
              <div class="panel-heading flipp cursor">
                <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home&nbsp;&nbsp;<b class="caret"></b></h3>
              </div>
              <div class="panel-body panell">
                <div class="list-group">
                  <a href="<?php echo base_url();?>home_rt" class="list-group-item">
                    <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Beranda
                  </a>

                  <a id="flip" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data Pemilu
                  </a>

                  <div id="panel" class="form-group disnone">
                  <br/>
                  <center><label class="control-label">masukkan tanggal pemilu</label></center>
                  <form action="<?php echo base_url();?>home_rt/pemilu" method="post">
                    <div class="input-group">
                      <input class="form-control" type="text" name="tgl_pemilu" placeholder="Format: 2015-12-12" required>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
                      </span>
                    </div>
                  </form>
                  </div>

                  <a id="flip-imun" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data Balita
                  </a>

                  <div id="panel-imun" class="form-group disnone">
                  <br/>
                  <center><label class="control-label">masukkan tanggal perkiraan</label></center>
                  <form action="<?php echo base_url();?>home_rt/imunisasi" method="post">
                    <div class="input-group">
                      <input class="form-control" type="text" name="tgl_imunisasi" placeholder="Format: 2015-12-12" required>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
                      </span>
                    </div>
                  </form>
                  </div>

                  <a href="<?php echo base_url();?>home_rt/grafik_penduduk" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Grafik Penduduk
                  </a>

                  <a href="<?php echo base_url();?>home_rt/kepala_keluarga_rt" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Kepala Keluarga
                  </a>

                  <a href="<?php echo base_url();?>home_rt/data_penduduk_rt" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Penduduk
                  </a>
				<!--<a href="<?php echo base_url();?>home_rt/view_foto" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Lihat KTP/KK/Akte
                  </a>-->
                  <a href="<?php echo base_url();?>home_rt/data_penduduk_rt_sementara" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Penduduk Sementara
                  </a>
                    
                  <a href="<?php echo base_url();?>home_rt/input_data" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data
                  </a>
				  
                 <a href="<?php echo base_url();?>home_rt/import1" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Excel
                  </a>
				
				<!--<a href="<?php echo base_url();?>home_rt/foto" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input foto KTP/KK/Akte
                  </a>-->
				 <a href="<?php echo base_url();?>home_rt/data_statistik1" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Statistik
                  </a>
				  
				    <a href="<?php echo base_url();?>home_rt/data_statistik2" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Sarana dan Prasarana
                  </a>
				  
				 <!--<a id="flip-admin-a" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Excel
                  </a>

                  <div id="panel-admin-a" class="form-group disnone">
                  <br/>
                  <form action="import.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                      <center><label class="control-label">File</label></center>
                      <div class="col-md-12">
                        <input type="file" name="datague"/>
                      </div>
                    </div>

                    <br/>

                    
                    <div class="input-group">
        
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" name="import" value="Import"><span class="glyphicon glyphicon-arrow-right"></span></button>
                      </span>
                    </div>
                  </form>
                  </div>-->
				  
				</div>
              </div>
            </div>

            <div class="panel panel-info">
              <div class="panel-heading flipp2 cursor">
                <h3 class="panel-title"><span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Jumlah Data&nbsp;&nbsp;<b class="caret"></b></h3>
              </div>
              <div class="panel-body panell2">
                <ul class="list-group">
                  <li class="list-group-item">
                    <span class="badge"><?php echo $total_hari;?></span>
                    <span class="glyphicon glyphicon-circle-arrow-down"></span>&nbsp;&nbsp;Hari Ini
                  </li>
                  <li class="list-group-item">
                    <span class="badge">
                    <?php echo $total;?>
                    </span>
                    <span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Penduduk
                  </li>
                  <li class="list-group-item">
                    <span class="badge">
                    <?php echo $total_sementara;?>
                    </span>
                    <span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Penduduk Sementara
                  </li>
                  <li class="list-group-item">
                    <span class="badge">
                    <?php echo $jumlah_kk;?>
                    </span>
                    <span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;Kepala Keluarga
                  </li>
                </ul>
              </div>
            </div>

            <!--
            <div class="panel panel-info">
              <div class="panel-heading flipp3 cursor">
                <h3 class="panel-title"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Pencarian Data&nbsp;&nbsp;<b class="caret"></b></h3>
              </div>
              <div class="panel-body panell3 disnone">
                <ul class="list-group">
                  <div class="form-group">
                  <form action="<?php echo base_url();?>home_rt/cari_penduduk" method="post">
                    <div class="input-group">
                      <input class="form-control" type="text" name="cari" placeholder="ketik nama penduduk" required>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></button>
                      </span>
                    </div>
                  </form>
                  </div>
                </ul>
              </div>
            </div>
            -->
    </div>
  </div>
</div>