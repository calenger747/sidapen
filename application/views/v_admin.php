<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_admin.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_admin.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <!--
        <div class="col-md-4">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-certificate"></span>&nbsp;&nbsp;Data User (Lurah) masuk hari ini</h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($lurah) == 0){
                        echo "<h4 class='text-info'>Belum ada data user (lurah) masuk.</h4>";
                      }else{
                        $no = 1;
                        echo "<table class='table table-striped table-hover display'>";
                        foreach($lurah as $l){
                          echo 
                          "<thead>
                              <tr>
                                <th>No.</th>
                                <th>Nama Kelurahan</th>
                              </tr>
                            </thead>
                            <tbody>
                          <tr>"
                          .
                            "<td>".$no++."."."</td>".
                            "<td>".$l->user_nama."</td>"
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

        <div class="col-md-4">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-certificate"></span>&nbsp;&nbsp;Data User (RT) masuk hari ini</h3>
              </div>
                  <div class="panel-body">
                      
                        <?php
                      if(count($rt) == 0){
                        echo "<h4 class='text-info'>Belum ada data user (rt) masuk.</h4>";
                      }else{
                        $no = 1;
                        echo "<table class=table table-striped table-hover'>";
                        foreach($rt as $r){
                          echo 
                          "<thead>
                              <tr>
                                <th>No.</th>
                                <th>Nama Ketua RT</th>
                                <th>RT/RW</th>
                              </tr>
                            </thead>
                            <tbody>
                          <tr>"
                          .
                            "<td>".$no++."."."</td>".
                            "<td>".$r->user_nama."</td>".
                            "<td>".$r->rt.'/'.$r->rw."</td>"
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
        -->
        
        <div class="col-md-9">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="panel-title clearfix">
                  <span class="pull-left">
                    <span class="glyphicon glyphicon-certificate"></span>&nbsp;&nbsp;Data penduduk yang masuk hari ini
                  </span>

                  <?php
                  if(count($penduduk_hari) != 0){
                  echo 
                  '<span class="pull-right">
                    <a class="btn btn-primary btn-xs" href="'.base_url().'admin/cetak_data_penduduk_hari" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Data</a>
                  </span>';
                  }
                  ?>
                </div>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($penduduk_hari) == 0){
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
                                <th>Hub. Keluarga</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Usia</th>
                                <th>RT/RW</th>
                                <th>&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                          ";
                          foreach($penduduk_hari as $pend){
                            $usia = date_diff(date_create(), date_create($pend->tgl_lahir));
                            echo 
                            "<tr>"
                            .
                              "<td>".$pend->nama."</td>".
                              "<td>".$pend->status_dalam_keluarga."</td>".
                              "<td>".$pend->jenis_kelamin."</td>".
                              "<td>".$pend->tgl_lahir."</td>".
                              "<td>".$usia->format('%Y tahun')."</td>".
                              "<td>".$pend->rt.'/'.$pend->rw."</td>".
                              "<td>
                                <a href='admin/edit_penduduk/".$pend->id_penduduk."' class='btn btn-warning btn-sm' onclick='return confirm(\"Edit penduduk?\")'><span class='glyphicon glyphicon-edit'></span></a>

                                <a href='admin/lihat_detail_penduduk/".$pend->id_penduduk."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a> 

                                <a href='admin/hapus_data/".$pend->id_penduduk."' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data penduduk?\")'><span class='glyphicon glyphicon-remove'></span></a></td>"
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