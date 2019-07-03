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
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Imunisasi
                  </span>

                  <span class="pull-right">
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>admin/cetak_data_imunisasi/<?php echo $tgl_imunisasi;?>/<?php echo $rt;?>/<?php echo $rw;?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak PDF</a>

                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>admin/export2/<?php echo $tgl_imunisasi ;?>/<?php echo $rt;?>/<?php echo $rw;?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Excel</a>
                  </span>
                </div>
              </div>
              
              <div class="panel-body">
                <?php
                      if(count($penduduk) == 0)
                      {
                        echo "<h4 class='text-info'>Belum ada data penduduk yang masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
                        echo "
                        <table class='table table-striped table-hover display' id='example'>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Hub. Keluarga</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Usia</th>
                                <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                            ";
                        foreach($penduduk as $pend){
                          $usia = date_diff(date_create($tgl_imunisasi), date_create($pend->tgl_lahir));
                          if($usia->format('%Y tahun') <= '05 tahun'){
                          echo 
                          "<tr>"
                            .
                              "<td>".$pend->nama."</td>".
                              "<td>".$pend->status_dalam_keluarga."</td>".
                              "<td>".$pend->jenis_kelamin."</td>".
                              "<td>".$pend->tmpt_lahir."</td>".
                              "<td>".$pend->tgl_lahir."</td>".
                              "<td>".$usia->format('%Y tahun')."</td>".
                              "<td>
                                <a href='edit_penduduk/".$pend->id_penduduk."' class='btn btn-warning btn-sm' onclick='return confirm(\"Edit penduduk?\")'><span class='glyphicon glyphicon-edit'></span></a>

                                <a href='lihat_detail_penduduk/".$pend->id_penduduk."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a> 

                                <a href='hapus_data/".$pend->id_penduduk."' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data penduduk?\")'><span class='glyphicon glyphicon-remove'></span></a></td>"
                            .
                            "</tr>";
                          }
                        }
                        echo "</tbody>
                          </table>";
                      }
                      ?>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>