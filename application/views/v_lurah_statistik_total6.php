
<?php include('head.php');?>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo $title;?></title>
        <link href="<?php echo base_url();?>berkas/css/bootstrap.css" rel="stylesheet">
		<script src="<?php echo base_url();?>berkas/js/jquery.js" type="text/javascript"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Sarana Sosial'
        },
        subtitle: {
            text: 'Kelurahan'
        },
        xAxis: {
            categories: [
				'RW 01',
				'RW 02',
				'RW 03',
				'RW 04',
				'RW 05',
				'RW 06',
				'RW 07',
				'RW 08',
				'RW 09',
				'RW 10',
				'RW 11',
				'RW 12',
				'RW 13',
				'RW 14',
				'RW 15'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (Unit)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} unit</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
			<?php
								 $total= 0;
								 $total1= 0;
								 $total2= 0;
								 $total3= 0;
								 $total4= 0;
								 $total5= 0;
								$ambildata = mysql_query("select * from sarana_sosial  WHERE rw='05' ");

								while ($tampilkan = mysql_fetch_array($ambildata)){
								$pkk = $tampilkan['pkk'];
								$total+=$pkk;
								
								$karang_taruna = $tampilkan['karang_taruna'];
								$total1+=$karang_taruna;
								
								$lsm = $tampilkan['lsm'];
								$total2+=$lsm;
								
								$satgas_rt = $tampilkan['satgas_rt'];
								$total3+=$satgas_rt;
								
								$pos_kamling = $tampilkan['pos_kamling'];
								$total4+=$pos_kamling;
								
								$gerobak_sampah = $tampilkan['gerobak_sampah'];
								$total5+=$gerobak_sampah;
								
								$total6 = $total+$total1+$total2+$total3+$total4+$total5;
								}
								?>
								
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $total6;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>
              
            ]
        }]
    });
});

$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Diagram Sarana Sosial'
        },
        subtitle: {
            text: 'Kelurahan Range 100%'
        },
        xAxis: {
            categories: [
				'RW 05'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Presentase (%)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Presentase',
            data: [
			  <?php
								 $total= 0;
								 $total1= 0;
								 $total2= 0;
								 $total3= 0;
								 $total4= 0;
								 $total5= 0;
								$ambildata = mysql_query("select * from sarana_sosial ");

								while ($tampilkan = mysql_fetch_array($ambildata)){
								$pkk = $tampilkan['pkk'];
								$total+=$pkk;
								
								$karang_taruna = $tampilkan['karang_taruna'];
								$total1+=$karang_taruna;
								
								$lsm = $tampilkan['lsm'];
								$total2+=$lsm;
								
								$satgas_rt = $tampilkan['satgas_rt'];
								$total3+=$satgas_rt;
								
								$pos_kamling = $tampilkan['pos_kamling'];
								$total4+=$pos_kamling;
								
								$gerobak_sampah = $tampilkan['gerobak_sampah'];
								$total5+=$gerobak_sampah;
								
								$total6 = $total+$total1+$total2+$total3+$total4+$total5;
								}
								?>
								
				['PKK', <?php echo number_format((($total/$total6)*100),2);?>], 
			    ['Karang Taruna', <?php echo number_format((($total1/$total6)*100),2);?>],
			    ['LSM', <?php echo number_format((($total2/$total6)*100),2);?>],
				['Satgas RT', <?php echo number_format((($total3/$total6)*100),2);?>], 
			    ['Pos Kamling', <?php echo number_format((($total4/$total6)*100),2);?>],
			    ['Gerobak Sampah', <?php echo number_format((($total5/$total6)*100),2);?>]
              
            ]
        }]
    });
});
		</script>
	</head>
<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_lurah.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
		
            <div class="panel panel-warning">
			
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<strong>Data Sarana dan Prasarana | Kelurahan</strong></h3>
              </div>
                  <div class="panel-body">
                      
                     
					    <?php
								 $total= 0;
								 $total1= 0;
								 $total2= 0;
								 $total3= 0;
								 $total4= 0;
								 $total5= 0;
								$ambildata = mysql_query("select * from sarana_sosial ");

								while ($tampilkan = mysql_fetch_array($ambildata)){
								$pkk = $tampilkan['pkk'];
								$total+=$pkk;
								
								$karang_taruna = $tampilkan['karang_taruna'];
								$total1+=$karang_taruna;
								
								$lsm = $tampilkan['lsm'];
								$total2+=$lsm;
								
								$satgas_rt = $tampilkan['satgas_rt'];
								$total3+=$satgas_rt;
								
								$pos_kamling = $tampilkan['pos_kamling'];
								$total4+=$pos_kamling;
								
								$gerobak_sampah = $tampilkan['gerobak_sampah'];
								$total5+=$gerobak_sampah;
								}
								?>
					   <li class="list-group-item">
					    <h4><b>Total Sarana Sosial </b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah PKK</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total;?></span>&nbsp;&nbsp;PKK</td>
								<td rowspan ="6"><div id="container1" style="min-width: 180px; height: 230px; margin: 0 auto"></div></td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Karang Taruna</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total1;?></span>&nbsp;&nbsp;Karang Taruna</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah LSM</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total2;?></span>&nbsp;&nbsp;LSM</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Satgas RT</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total3;?></span>&nbsp;&nbsp;Satgas RT</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Pos Kamling</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total4;?></span>&nbsp;&nbsp;Pos Kamling</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Gerobak Sampah</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total5;?></span>&nbsp;&nbsp;Gerobak Sampah</td>
							</tr>
						</table>
						 <table class='table table-striped table-hover'>
							<tr>
							<td>
							<div id="container" style="min-width: 830px; height: 350px; margin: 0 auto"></div></td>
							</tr>
						</table>
						</li>
						
                  </div>
            </div>			
		  <!-- <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Ketua RT dan RW</h3>
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
        <?php include('menu_lurah2.php') ;?>
		<script src="<?php echo base_url();?>berkas/js/highcharts.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>berkas/js/exporting.js" type="text/javascript"></script>
</div>
</body>