<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_lurah.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->
        <?php include('menu_lurah.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-certificate"></span>&nbsp;&nbsp;Data penduduk yang masuk hari ini</h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($penduduk_hari) == 0){
                        echo "<h4 class='text-info'>Belum ada data penduduk masuk.</h4>";
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
                              <th>Usia</th>
                              <th>RT/RW</th>
                              <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>";
                        foreach($penduduk_hari as $pend){
                          $usia = date_diff(date_create(), date_create($pend->tgl_lahir));
                          echo 
                          "<tr>"
                          .
                            "<td>".$pend->nama."</td>".
                            "<td>".$pend->status_dalam_keluarga."</td>".
                            "<td>".$pend->jenis_kelamin."</td>".
                            "<td>".$usia->format('%Y tahun')."</td>".
                            "<td>".$pend->rt."/".$pend->rw."</td>".
                            "<td>
                              <a href='home_lurah/lihat_detail/".$pend->id_penduduk."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a></td>"
                          .
                          "</tr>";
                        }
                        echo "
                          </tbody>
                        </table>";
                      }
                      ?>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>