<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rt.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->
        <?php include('menu_rt.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-search"></span></span>&nbsp;&nbsp;Hasil Pencarian Data: <em><?php echo $cari;?></em></h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($hasil) == 0){
                        echo "<h4 class='text-info'>Hasil pencarian tidak ditemukan.</h4>";
                      }
                      else
                      {
                        $no = 1;
                        echo "
                        <table class='table table-striped table-hover'>
                        <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Usia</th>
                            </tr>
                          </thead>
                          <tbody>";
                        foreach($hasil as $h){
                          $usia = date_diff(date_create(), date_create($h->tgl_lahir));
                          echo 
                          "<tr>"
                          .
                            "<td>".$no++."."."</td>".
                            "<td>".$h->nama."</td>".
                            "<td>".$h->jenis_kelamin."</td>".
                            "<td>".$usia->format('%y tahun')."</td>".
                            "<td><a href='edit_penduduk/".$h->id_penduduk."' class='btn btn-warning btn-sm' onclick='return confirm(\"Edit penduduk?\")'><span class='glyphicon glyphicon-edit'></span>&nbsp;&nbsp;Edit</a> <a href='lihat_detail/".$h->id_penduduk."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span>&nbsp;&nbsp;Lihat Detail</a> <a href='hapus_penduduk/".$h->id_penduduk."' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data penduduk?\")'><span class='glyphicon glyphicon-remove'></span>&nbsp;&nbsp;Hapus</a></td>"
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