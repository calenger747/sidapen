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
				  <a href="<?php echo base_url();?>home_rt/import1" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Kependudukan
                  </a>
				   <a href="<?php echo base_url();?>home_rt/import3" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Kesehatan
                  </a>
				  <a href="<?php echo base_url();?>home_rt/import4" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data pemerintahan Kelurahan
                  </a>
				  <a href="<?php echo base_url();?>home_rt/import8" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Pendidikan
                  </a>
				  <a href="<?php echo base_url();?>home_rt/import6" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Peribadatan
                  </a>
				  <a href="<?php echo base_url();?>home_rt/import5" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Perekonomian
                  </a>
				  <a href="<?php echo base_url();?>home_rt/import2" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Fasilitas Olahraga
                  </a>
				  <a href="<?php echo base_url();?>home_rt/import7" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data Fasilitas Sosial
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