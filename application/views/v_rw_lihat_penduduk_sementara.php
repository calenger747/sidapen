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
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Penduduk Sementara
                  </span>

                  <span class="pull-right">
					<a class="btn btn-primary btn-xs" href="<?php echo base_url();?>home_rw/export_datapenduduk_sementara" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data Excel</a>
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>home_rw/cetak_data_penduduk_sementara" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data PDF</a>
                  </span>
                </div>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($penduduk) == 0){
                        echo "<h4 class='text-info'>Belum ada data penduduk masuk.</h4>";
                      }
                      else
                      {
                          $no = 1;
                        echo "
                        <table class='table table-striped table-hover' id='example'>
                          <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Usia</th>
                                <th>RT/RW</th>
                                <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                            ";
                        foreach($penduduk as $pend){
                          $usia = date_diff(date_create(), date_create($pend->tgl_lahir));
                          echo 
                          "<tr>"
                          .
                              "<td>".$pend->nama."</td>".
                              "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pend->jenis_kelamin."</td>".
                              "<td>&nbsp;&nbsp;&nbsp;".$pend->tgl_lahir."</td>".
                              "<td>&nbsp;&nbsp;&nbsp;".$usia->format('%Y tahun')."</td>".
                              "<td>&nbsp;&nbsp;&nbsp;".$pend->rt.'/'.$pend->rw."</td>".
                            "<td>

                              <a href='lihat_detail/".$pend->id_penduduk."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a></td>"
                          .
                          "</tr>";
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