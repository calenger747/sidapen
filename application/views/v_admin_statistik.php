<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_admin.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_admin.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="panel-title clearfix">
                  <span class="pull-left">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Statistik
                  </span>

                  <span class="pull-right">
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>admin/cetak_data_penduduk_hari/<?php echo $jml;?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak PDF</a>
					<a class="btn btn-primary btn-xs" href="<?php echo base_url();?>admin/data_statistik/<?php echo $jml ;?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Excel</a>
                  </span>
                </div>
              </div>
                  <div class="panel-body">
                      <div class="panel panel-default">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jml;?></span>
                            Jumlah Penduduk
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jml_sementara;?></span>
                            Jumlah Penduduk Sementara
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jumlah_kk;?></span>
                            Jumlah Kepala Keluarga
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jml_rt;?></span>
                            Jumlah RT
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jml_lurah;?></span>
                            Jumlah Kelurahan
                          </li>
                        </ul>
                      </div>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>