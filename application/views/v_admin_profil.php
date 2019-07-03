<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_admin.php');?>

<div style="margin: 80px auto 0;">
        <!-- HOME -->
       
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;Detail User</h3>
              </div>
                  <div class="panel-body">
                    <table class="table table-striped table-hover ">
                      <tbody>
                      <?php 
                      foreach($profil as $p){
                        echo 
                        "
                        <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td>".$p->user_nama."</td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td>:</td>
                          <td>".$p->user_name."</td>
                        </tr>
                        ";
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>

<a onclick="window.history.back()" class="btn btn-primary navbar-fixed-bottom"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;kembali ke halaman sebelumnya</a>
</body>