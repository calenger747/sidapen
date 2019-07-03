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
                <h3 class="panel-title"><span class="glyphicon glyphicon-search"></span></span>&nbsp;&nbsp;Hasil Pencarian Data: <em><?php if(($rt && $rw) != ''){echo 'RT '.$rt.' RW'.$rw;}elseif($rt!=''){echo 'RT '.$rt;}elseif($rw!=''){echo ' RW '.$rw;}?></em></h3>
              </div>
                  <div class="panel-body">
                    <table class="table table-striped table-hover ">
                      <?php
                      if(count($hasil) == 0){
                        echo "<h4 class='text-info'>Hasil pencarian tidak ditemukan.</h4>";
                      }
                      else
                      {
                        $no = 1;
                        echo "<thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Usia</th>
                              <th>RT/RW</th>
                            </tr>
                          </thead>
                          <tbody>";
                        foreach($hasil as $h){
                          echo 
                          "<tr>"
                          .
                            "<td>".$no++."."."</td>".
                            "<td>".$h->nama."</td>".
                            "<td>".$h->jenis_kelamin."</td>".
                            "<td>".$h->usia."</td>".
                            "<td>".$h->rt."/".$h->rw."</td>".
                            "<td><a href='lihat_detail/".$h->id_penduduk."' class='btn btn-info btn-sm'>Lihat Detail</a></td>"
                          .
                          "</tr>";
                        }
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>