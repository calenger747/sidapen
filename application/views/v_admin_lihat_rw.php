<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_admin.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_admin.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
        <?php
        if($this->session->flashdata('pesan') != ''){
            echo '
                <div class="alert alert-dismissable alert-info">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  '.$this->session->flashdata('pesan').'
                </div>
            ';
        }
        ?>
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;Lihat User &raquo; RW</h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($rw) == 0){
                        echo "<h4 class='text-info'>Belum ada data user (rw) masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
                        echo 
                        "<table class='table table-striped table-hover display' id='example'>
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama RW</th>
                              <th>RW</th>
                              <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>";

                        foreach($rw as $r){
                          echo 
                          "<tr>"
                          .
                            "<td>".$no++."."."</td>".
                            "<td>".$r->user_nama."</td>".
                            "<td>".$r->rw."</td>".
                            "<td>

                            <a href='edit_rw/".$r->user_id."' class='btn btn-warning btn-sm' onclick='return confirm(\"Edit user?\")'><span class='glyphicon glyphicon-edit'></span></a>

                            <a href='lihat_detail_rw/".$r->user_id."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a> 

                            <a href='hapus_rw/".$r->user_id."' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus user?\")'><span class='glyphicon glyphicon-remove'></span></a></td>"
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