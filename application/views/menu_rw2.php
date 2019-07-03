<?php $rw = $this->session->userdata('rw'); ?>
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
                  <a href="<?php echo base_url();?>home_rw" class="list-group-item">
                    <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Beranda
                  </a>
				   <a href="<?php echo base_url();?>home_rw/data_statistik_kesehatan" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Kesehatan
                  </a>
				  <a href="<?php echo base_url();?>home_rw/data_statistik_pemkel" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;pemerintahan Kelurahan
                  </a>
				  <a href="<?php echo base_url();?>home_rw/data_statistik_pendidikan" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Pendidikan
                  </a>
				  <a href="<?php echo base_url();?>home_rw/data_statistik_peribadatan" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Peribadatan
                  </a>
				  <a href="<?php echo base_url();?>home_rw/data_statistik_perekonomian" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Perekonomian
                  </a>
				  <a href="<?php echo base_url();?>home_rw/data_statistik_olahraga" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Fasilitas Olahraga
                  </a>
				  <a href="<?php echo base_url();?>home_rw/data_statistik_sosial" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Fasilitas Sosial
                  </a>
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