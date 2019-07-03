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
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Kepala Keluarga
                  </span>

                  <?php
                  if(count($kk) != 0){
                  echo 
                  '<span class="pull-right">
                    <a class="btn btn-primary btn-xs" href="'.base_url().'admin/cetak_data_kk" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data</a>
                  </span>';
                  }
                  ?>
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
                                <th>Nama</th>
                                <th>KKI</th>
                                <th>Jalan</th>
                                <th>&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                          ";
                          foreach($kk as $pend){
                            echo 
                            "<tr>"
                            .
                              "<td>".$pend->kk_nama."</td>".
                              "<td>".$pend->kki."</td>".
                              "<td>".$pend->kk_jalan."</td>".
                              "<td>
                                <a href='edit_kk/".$pend->id_kk."' class='btn btn-warning btn-sm' onclick='return confirm(\"Edit penduduk?\")'><span class='glyphicon glyphicon-edit'></span></a>

                                <a href='lihat_detail_kk/".$pend->id_kk."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a> 

                                <a href='hapus_data_kk/".$pend->id_kk."' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data kepala keluarga?\")'><span class='glyphicon glyphicon-remove'></span></a>

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