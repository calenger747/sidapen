<?php
  $rt = $this->session->userdata('rt');
  $rw = $this->session->userdata('rw');
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
				</div>
              </div>
			   <div id="container" style="min-width: 10px; height: 10px; margin:  auto"></div>
					<div class="container">
						<button class="btn btn-sm btn-info" onclick="window.location='<?php echo base_url();?>home_rt'">&larr; kembali ke halaman sebelumnya</button>
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