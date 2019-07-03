<div class="col-md-3">
<div class="panel panel-warning">
  <div class="panel-heading flippp">
    <h3 class="panel-title"><span class="glyphicon glyphicon-align-justify"></span>&nbsp;&nbsp;Menu</h3>
  </div>
  <div class="panel-body panelll">
            <div class="panel panel-info">
              <div class="panel-heading flipp cursor">
                <h3 class="panel-title">
                <span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home&nbsp;&nbsp;<b class="caret"></b>
                </h3>
              </div>
              <div class="panel-body panell">
                <div class="list-group">
                  <a href="<?php echo base_url();?>admin" class="list-group-item">
                    <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Beranda
                  </a>

                  <a id="flip-admin" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data Pemilu
                  </a>

                  <div id="panel-admin" class="form-group disnone">
                  <br/>
                  <form action="<?php echo base_url();?>admin/pemilu" method="get">
                    <div class="input-group">
                      <center><label class="control-label">masukkan RT/RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rt" placeholder="00" required>
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>

                    <br/>

                    <center><label class="control-label">masukkan tanggal pemilu</label></center>
                    <div class="input-group">
                      <input class="form-control" type="text" name="tgl_pemilu" placeholder="Format: 2015-12-12" required>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
                      </span>
                    </div>
                  </form>
                  </div>

                  <a id="flip-admin-a" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data Balita
                  </a>

                  <div id="panel-admin-a" class="form-group disnone">
                  <br/>
                  <form action="<?php echo base_url();?>admin/imunisasi" method="get">
                    <div class="input-group">
                      <center><label class="control-label">masukkan RT/RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rt" placeholder="00" required>
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
                    </div>

                    <br/>

                    <center><label class="control-label">masukkan tanggal perkiraan</label></center>
                    <div class="input-group">
                      <input class="form-control" type="text" name="tgl_imunisasi" placeholder="Format: 2015-12-12" required>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
                      </span>
                    </div>
                  </form>
                  </div>

                  <a id="flip-imun" class="list-group-item cursor">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Grafik Penduduk
                  </a>

                  <div id="panel-imun" class="form-group disnone">
                    <br/>
                  <form action="<?php echo base_url();?>admin/grafik_penduduk" method="get">
                    <div class="input-group">
					  <center><label class="control-label">Berdasarkan RT/RW</label></center>
                      <center><label class="control-label">masukkan RT/RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rt" placeholder="00" required>
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>

                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
                      </span>
                    </div>
                  </form>
				  <br/>
				   <form action="<?php echo base_url();?>admin/grafik_penduduk1" method="get">
                    <div class="input-group">
					  <center><label class="control-label">Berdasarkan RW</label></center>
                      <center><label class="control-label">masukkan RW</label></center>
                      <div class="col-md-12">
                        <input class="form-control" type="text" name="rw" placeholder="00" required>
                      </div>
					</div>
                      <span class="input-group-btn">
                        <center><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button></center>
                      </span>
                  
                  </form>
				  
                  </div>

                  <a href="<?php echo base_url();?>admin/data_kk" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Kepala Keluarga
                  </a>

                  <a href="<?php echo base_url();?>admin/data_penduduk" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Penduduk
                  </a>

                  <a href="<?php echo base_url();?>admin/data_penduduk_sementara" class="list-group-item">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Penduduk Sementara
                  </a>

                  <a href="<?php echo base_url();?>admin/data_statistik" class="list-group-item">
                    <span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Statistik
                  </a>

                  <a href="<?php echo base_url();?>admin/input_data" class="list-group-item">
                    <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data
                  </a>
                </div>
              </div>
            </div>

            <div class="panel panel-info">
              <div class="panel-heading flipp2 cursor">
                <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User&nbsp;&nbsp;<b class="caret"></b></h3>
              </div>
              <div class="panel-body panell2 ">
                <div class="list-group">
                  <a href="<?php echo base_url();?>admin/tambah_rt" class="list-group-item">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah User RT
                  </a>

                  <a href="<?php echo base_url();?>admin/tambah_rw" class="list-group-item">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah User RW
                  </a>

                  <a href="<?php echo base_url();?>admin/tambah_lurah" class="list-group-item">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah User Lurah
                  </a>

                  <a href="<?php echo base_url();?>admin/lihat_rt" class="list-group-item">
                    <span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;Lihat User RT
                  </a>

                  <a href="<?php echo base_url();?>admin/lihat_rw" class="list-group-item">
                    <span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;Lihat User RW
                  </a>

                  <a href="<?php echo base_url();?>admin/lihat_lurah" class="list-group-item">
                    <span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;Lihat User Lurah
                  </a>
                </div>
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
                    <a id="flip-admin-s" class="list-group-item" style="cursor:pointer">
                    <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;Berdasarkan Nama
                    </a>

                    <div id="panel-admin-s" class="form-group" style="display:none">
                    <form action="<?php echo base_url();?>admin/cari_penduduk" method="post">
                      <div class="input-group">
                        <input class="form-control" type="text" name="cari" placeholder="ketik nama penduduk" required>
                        <span class="input-group-btn">
                          <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></button>
                        </span>
                      </div>
                    </form>
                    </div>

                    <a id="flip-admin-s1" class="list-group-item" style="cursor:pointer">
                    <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp;Berdasarkan RT/RW
                    </a>

                    <div id="panel-admin-s1" class="form-group" style="display:none">
                      <form action="<?php echo base_url();?>admin/cari_rtrw" method="post">
                      <div class="input-group">
                        <input class="form-control" placeholder="ketik nomor RT" type="text" name="rt">
                        <input class="form-control" placeholder="ketik nomor RW" type="text" name="rw">
                      </div>
                        <center><button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;cari</button></center>
                    </form>
                    </div>
                  </div>
                </ul>
              </div>
            </div>
-->

  </div>
</div>
</div>