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
                <div class="panel-title clearfix">
                  <span class="pull-left">
                    <span class="glyphicon glyphicon-certificate"></span>&nbsp;&nbsp;Upload data
                  </span>
					
                </div>
              </div>
                  <div class="panel-body">
                     <center><h2>Upload Data KTP, KK dan Akte</h2></center>
					 <hr>
					 <b><h4><br><br><br><br>
					 <form action="#" method="post">
					 
					 <p>No. Identitas &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp &nbsp &nbsp &nbsp <input type="text" placeholder="Ini harus diisi"/>
					 <br><br><br>
					 <p>Nama &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : &nbsp &nbsp &nbsp &nbsp  <input type="text" placeholder="Ini harus diisi"/>
					 <br><br><br>
					 <p>Upload KTP &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <input type="file" name="data_upload" />
					 <br><textarea></textarea><br>
					 <p>Upload KK &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <input type="file" name="data_upload" />
					 <br><textarea></textarea><br>
					 <p>Upload Akte &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <input type="file" name="data_upload" />
					 <br><textarea></textarea><br><br>
					 <input type="reset" name="reset" value="Kosongkan Form">&nbsp <input type="submit" name="submit" value="Masukkan Form">
					 </h4></b></form><br>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>