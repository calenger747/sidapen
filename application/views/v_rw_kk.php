<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rw.php');?>

<div style="margin-top: 80px;">
        <!-- MENU -->

        <?php include('menu_rw.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
            <div class="panel panel-warning">
              <div class="panel-heading">
               <div class="panel-title clearfix">
                  <span class="pull-left">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Kepala Keluarga
                  </span>

                  <span class="pull-right">
					<a class="btn btn-primary btn-xs" href="<?php echo base_url();?>home_rw/export_datakk" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data Excel</a>
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>home_rw/cetak_data_kk" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data PDF</a>
                  </span>
                </div>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($kk) == 0){
                        echo "<h4 class='text-info'>Belum ada data penduduk yang masuk.</h4>";
                      }
                      else
                      {
                          $no =1;
                          echo "
                          <table class='table table-striped table-hover display' id='example'>
                          <thead>
                              <tr>
								<th>No. KK</th>
                                <th>Nama</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Jalan</th>
                                <th>Komplek</th>
                                <th>RT</th>
                                <th>&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                          ";
                          foreach($kk as $pend){
                            echo 
                            "<tr>"
                            . "<td>".$pend->kki."</td>".
                              "<td>".$pend->kk_nama."</td>".
                              "<td>".$pend->kk_kec."</td>".
                              "<td>".$pend->kk_kel."</td>".
                              "<td>".$pend->kk_jalan."</td>".
                              "<td>".$pend->kk_komplek."</td>".
                              "<td>".$pend->kk_rt."</td>".
                              "<td>
                              <a href='lihat_detail_kk/".$pend->id_kk."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a>

                              <a href='cetak_kk/".$pend->id_kk."' class='btn btn-primary btn-sm' target='_blank'><span class='glyphicon glyphicon-print'></span></a></td>"
                            .
                            "</tr>";
                          }
                          echo 
                            "</tbody>
                            </table>";
                        }
                      ?>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>