<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rt.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_rt2.php') ;?>
        <!-- END MENU -->
		
		<!-- HOME -->
        <div class="col-md-9">
		<div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<strong>Data Sarana dan Prasarana RT <?php echo $rt;?> | RW <?php echo $rw;?></strong></h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($jumlah_perekonomian) == 0){
                        echo "<h4 class='text-info'>Belum ada data sarana masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
						 foreach($jumlah_perekonomian as $pend){
                        echo "
                         <table class='table table-striped table-hover'>
                        <thead>
                          </thead>
                          <tbody>";
                       
					    echo 
						  "<tr>"
                          .
						    "<td>"."Sarana Perekonomian"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>
                                <a href='edit_sarana_perekonomian/".$pend->id_perekonomian."' class='btn btn-warning btn-sm' onclick='return confirm(\"Edit Sarana Perekonomian?\")'><span class='glyphicon glyphicon-edit'></span></a>

                             </td>"
                            .
							"</tr>";
					   
                          echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Pasar"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->pasar."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
						  
						   echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Wartel / Warnet"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->wartel_warnet."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
						  
						  echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Warung Kelontong"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->warung_kelontong."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
						  
						    echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Toko Material"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->toko_material."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
						  
						    echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Alfamart / Indomart"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->indomart."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
						  
						   echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Rumah Kost / Kontrakan"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->rumah_kost."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
						  
						   echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Rumah Makan"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->rumah_makan."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
                        }
                        echo "
                          </tbody>
                        </table>";
                      }
                      ?>
                  </div>
            </div>
           
		  <!-- <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Ketua RT</h3>
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
                        <table class='table table-striped table-hover display' id='example'>
                        <thead>
                            <tr>
                              <th>Nama</th>
                              <th>RT/RW</th>
                              <th>Detail</th>
                            </tr>
                          </thead>
                          <tbody>";
                        foreach($penduduk as $pend){
                          $usia = date_diff(date_create(), date_create($pend->tanggal_input));
                          echo 
                          "<tr>"
                          .
                            "<td>".$pend->user_nama."</td>".
                            "<td>&nbsp;&nbsp;&nbsp;".$pend->rt."/".$pend->rw."</td>".
                            "<td>&nbsp;&nbsp;
                              <a href='lihat_detail1/".$pend->user_id."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a></td>"
                          .
                          "</tr>";
                        }
                        echo "
                          </tbody>
                        </table>";
                      }
                      ?>
                  </div>
            </div>-->
        </div>
        <!-- END HOME -->
		
		 <div class="col-md-9">
            
        </div>
        
</div>
</body>