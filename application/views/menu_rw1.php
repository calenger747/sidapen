<?php $rw = $this->session->userdata('rw'); ?>
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
                  <a href="<?php echo base_url();?>home_rw" class="list-group-item">
                    <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Beranda
                  </a>

                 <!-- <a href="<?php echo base_url();?>home_rw/grafik_penduduk/<?php echo $rw;?>" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Grafik Penduduk RW <?php echo $rw;?>
                  </a>
				  
				  <a id="flip-admin" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Grafik Penduduk / RT
                  </a>

                  <div id="panel-admin" class="form-group disnone">
                  <br/>
                  <form action="<?php echo base_url();?>home_rw/grafik_penduduk1" method="get">
                    <div class="input-group">
                      <center><label class="control-label">masukkan RT</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rt" placeholder="00" required>
                        
                      </div>
                    </div>

					<span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button> </center>
                      </span>
					
                  </form>
                  </div>

                  <a href="<?php echo base_url();?>home_rw/data_kk" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Kepala Keluarga
                  </a>
                    
                  <a href="<?php echo base_url();?>home_rw/data_penduduk" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Penduduk
                  </a>

                  <a href="<?php echo base_url();?>home_rw/data_penduduk_sementara" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Penduduk Sementara
                  </a>-->
				  
				   <a id="flip-admin" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data Statistik / RT
                  </a>

                  <div id="panel-admin" class="form-group disnone" align ="center">
                  <br/>
                  <form action="<?php echo base_url();?>home_rw/export_datastatistik_rt" method="get">
                    <div class="input-group">
                      <center><label class="control-label">masukkan RT</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rt" placeholder="00" required>
                      </div>
                    </div>
						
					<span class="input-group-btn">
                      <center><button class="btn btn-primary" type="submit">Cetak Excel</button></center>
                      </span>
					
                  </form>
				  <br/>
                  <form action="<?php echo base_url();?>home_rw/cetak_data_statistik_rt" method="get">
                    <div class="input-group">
                      <center><label class="control-label">masukkan RT</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rt" placeholder="00" required>
                      </div>
                    </div>
						
					<span class="input-group-btn">
                      <center><button class="btn btn-primary" type="submit">Cetak PDF</button></center>
                      </span>
					
                  </form>
                  </div>
				  
				   <a href="<?php echo base_url();?>home_rw/data_statistik1" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;Statistik Penduduk RW <?php echo $rw;?>
                  </a>
				  
				  <a id="flip-admin-a" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Statistik Penduduk / RT
                  </a>

                  <div id="panel-admin-a" class="form-group disnone" align ="center">
                  <br/>
                  <form action="<?php echo base_url();?>home_rw/data_statistik2" method="get">
                    <div class="input-group">
                      <center><label class="control-label">masukkan RT</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rt" placeholder="00" required>
                      </div>
                    </div>
						
					<span class="input-group-btn">
                      <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button></center>
                      </span>
					
                  </form>
                  </div>
				  
                </div>
              </div>
			   <div id="container" style="min-width: 10px; height: 10px; margin:  auto"></div>
					<div class="container">
						<button class="btn btn-sm btn-info" onclick="window.location='<?php echo base_url();?>home_rw'">&larr; kembali ke halaman sebelumnya</button>
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
                    <form action="<?php echo base_url();?>home_rw/cari_rtrw" method="post">
                      <div class="input-group">
                        <input class="form-control" placeholder="ketik nomor RT" type="text" name="rt">
                        <input class="form-control" placeholder="ketik nomor RW" type="text" name="rw">
                      </div>
                        <center><button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;cari</button></center>
                    </form>
                  </div>
                </ul>
              </div>
            </div>
-->

    </div>
  </div>
</div>