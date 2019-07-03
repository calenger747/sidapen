<?php $rw = $this->session->userdata('rw'); ?>
<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rw.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_rw2.php') ;?>
        <!-- END MENU -->
		
		<!-- HOME -->
        <div class="col-md-9">
		<div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<strong>Data Sarana dan Prasarana | RW <?php echo $rw;?></strong></h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($jumlah_olahraga) == 0){
                        echo "<h4 class='text-info'>Belum ada data sarana masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
						 foreach($jumlah_olahraga as $pend){
                        echo "
                         <table class='table table-striped table-hover'>
                        <thead>
                          </thead>
                          <tbody>";
                       
					   echo 
						  "<tr>"
                          .
						    "<td>&nbsp;&nbsp;"."Sarana Olahraga"."&nbsp;"."RT"."&nbsp;".$pend->rt."&nbsp;"."/"."&nbsp;"."RW"."&nbsp;".$pend->rw."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".

							"</tr>";
					   
                          echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Lapangan Bola"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->lapangan_bola."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Lapangan Basket"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->lapangan_basket."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Lapangan Volly"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->lapangan_volly."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Lapangan Badminton"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->lapangan_badminton."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Lapangan Futsal"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->lapangan_futsal."</td>".
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
					  
					    <?php
								 $total= 0;
								 $total1= 0;
								 $total2= 0;
								 $total3= 0;
								 $total4= 0;
								$ambildata = mysql_query("select * from sarana_olahraga WHERE rw='$rw' ");

								while ($tampilkan = mysql_fetch_array($ambildata)){
								$lapangan_bola = $tampilkan['lapangan_bola'];
								$total+=$lapangan_bola;
								
								$lapangan_basket = $tampilkan['lapangan_basket'];
								$total1+=$lapangan_basket;
								
								$lapangan_badminton = $tampilkan['lapangan_badminton'];
								$total2+=$lapangan_badminton;
								
								$lapangan_volly = $tampilkan['lapangan_volly'];
								$total3+=$lapangan_volly;
								
								$lapangan_futsal = $tampilkan['lapangan_futsal'];
								$total4+=$lapangan_futsal;
								}
								?>
					   <li class="list-group-item">
					    <h4><b>Total Sarana Olahraga | RW <?php echo $rw;?></b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Lapangan Bola</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total;?></span>&nbsp;&nbsp;Lapangan Bola</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Lapangan Basket</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total1;?></span>&nbsp;&nbsp;Lapangan Basket</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Lapangan Volly</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total3;?></span>&nbsp;&nbsp;Lapangan Volly</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Lapangan Badminton</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total2;?></span>&nbsp;&nbsp;Lapangan Badminton</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Lapangan Futsal</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total4;?></span>&nbsp;&nbsp;Lapangan Futsal</td>
							</tr>
						</table>
						</li>
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