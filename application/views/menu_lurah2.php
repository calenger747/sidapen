<?php $rw = $this->input->get('rw'); ?>
<div class="col-md-3">
<div class="panel panel-warning">
  <div class="panel-heading flippp">
    <h3 class="panel-title"><span class="glyphicon glyphicon-align-justify"></span>&nbsp;&nbsp;Menu</h3>
  </div>
  <div class="panel-body panelll">
            <div class="panel panel-info">
              <div class="panel-heading flipp cursor">
                <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Sarana dan Prasarana&nbsp;&nbsp;<b class="caret"></b></h3>
              </div>
              <div class="panel-body panell">
                <div class="list-group">
                  <a href="<?php echo base_url();?>home_lurah" class="list-group-item">
                    <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Beranda
                  </a>
				  <a id="flip-imun" class="list-group-item cursor">
                  <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Sarana dan Prasarana / RW
                  </a>

                  <div align = "center">
				  <div id="panel-imun" class="form-group disnone">
                     <br/>
                  <form action="<?php echo base_url();?>home_lurah/data_statistik_kesehatan" method="get">
                    <div class="input-group">
					<center><label class="control-label">Kesehatan</label></center>
                      <center><label class="control-label">masukkan RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>
						
					  <div class="input-group">
                      <span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button> </center>
                      </span>
                    </div>
					
                  </form>
				   <br/>
                  <form action="<?php echo base_url();?>home_lurah/data_statistik_pemkel" method="get">
                    <div class="input-group">
					<center><label class="control-label">pemerintahan Kelurahan</label></center>
                      <center><label class="control-label">masukkan RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>
						
					  <div class="input-group">
                      <span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button> </center>
                      </span>
                    </div>
					
                  </form>
				   <br/>
                   <form action="<?php echo base_url();?>home_lurah/data_statistik_pendidikan" method="get">
                    <div class="input-group">
					<center><label class="control-label">Pendidikan</label></center>
                      <center><label class="control-label">masukkan RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>
						
					  <div class="input-group">
                      <span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button> </center>
                      </span>
                    </div>
					
                  </form>
				  <br/>
				  <form action="<?php echo base_url();?>home_lurah/data_statistik_peribadatan" method="get">
                    <div class="input-group">
					<center><label class="control-label">Peribadatan</label></center>
                      <center><label class="control-label">masukkan RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>
						
					  <div class="input-group">
                      <span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button> </center>
                      </span>
                    </div>
					
                  </form>
				  <br/>
				  <form action="<?php echo base_url();?>home_lurah/data_statistik_perekonomian" method="get">
                    <div class="input-group">
					<center><label class="control-label">Perekonomian</label></center>
                      <center><label class="control-label">masukkan RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>
						
					  <div class="input-group">
                      <span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button> </center>
                      </span>
                    </div>
					
                  </form>
				  <br/>
				  <form action="<?php echo base_url();?>home_lurah/data_statistik_olahraga" method="get">
                    <div class="input-group">
					<center><label class="control-label">Fasilitas Olahraga</label></center>
                      <center><label class="control-label">masukkan RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>
						
					  <div class="input-group">
                      <span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button> </center>
                      </span>
                    </div>
					
                  </form>
				  <br/>
				  <form action="<?php echo base_url();?>home_lurah/data_statistik_sosial" method="get">
                    <div class="input-group">
					<center><label class="control-label">Fasilitas Sosial</label></center>
                      <center><label class="control-label">masukkan RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>
						
					  <div class="input-group">
                      <span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button> </center>
                      </span>
                    </div>
					
                  </form>
                  </div>
				  </div>
				   <a href="<?php echo base_url();?>home_lurah/data_statistik_total" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Kesehatan
                  </a>
				  <a href="<?php echo base_url();?>home_lurah/data_statistik_total1" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;pemerintahan Kelurahan
                  </a>
				  <a href="<?php echo base_url();?>home_lurah/data_statistik_total2" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Pendidikan
                  </a>
				  <a href="<?php echo base_url();?>home_lurah/data_statistik_total3" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Peribadatan
                  </a>
				  <a href="<?php echo base_url();?>home_lurah/data_statistik_total4" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Perekonomian
                  </a>
				  <a href="<?php echo base_url();?>home_lurah/data_statistik_total5" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Fasilitas Olahraga
                  </a>
				  <a href="<?php echo base_url();?>home_lurah/data_statistik_total6" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Fasilitas Sosial
                  </a>
                </div>
              </div>
			   <div id="container" style="min-width: 10px; height: 10px; margin:  auto"></div>
					<div class="container">
						<button class="btn btn-sm btn-info" onclick="window.location='<?php echo base_url();?>home_lurah'">&larr; kembali ke halaman sebelumnya</button>
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
                    <form action="<?php echo base_url();?>home_lurah/cari_rtrw" method="post">
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