<!DOCTYPE HTML>
<html>
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
            text: 'Grafik Penduduk'
        },
        subtitle: {
            text: 'RW <?php echo $rw;?>'
        },
        xAxis: {
            categories: [
                'Penduduk',
                'Penduduk Sementara',
                'Kepala Keluarga',
                'Pria',
                'Wanita',
                'Kawin',
                'Belum Kawin',
                'Balita',
				'Anak di atas 5 tahun',
                '17 tahun ke atas',
                '60 tahun ke atas'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (orang)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} orang</b></td></tr>',
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
                <?php echo $jumlah;?>, 
                <?php echo $total_sementara;?>, 
                <?php echo $jumlah_kk;?>, 
                <?php echo $total_pria1;?>, 
                <?php echo $total_wanita1;?>, 
                <?php echo $total_kawin1;?>, 
                <?php echo $total_belum_kawin1;?>,
                <?php 
                $data = array();
                foreach($jumlah3 as $j){
                    $usia = date_diff(date_create(), date_create($j->tgl_lahir));
                    if($usia->format('%Y') <= '05'){
                       $data[] = $j->id_status_penduduk;
                    }
                }

                echo count($data);
                ;?>,
				<?php 
                $data4 = array();
                foreach($jumlah3 as $j4){
                    $usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
                    if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
                       $data4[] = $j4->id_status_penduduk;
                    }
                }

                echo count($data4);
                ;?>,
                <?php 
                $data2 = array();
                foreach($jumlah3 as $j2){
                    $usia2 = date_diff(date_create(), date_create($j2->tgl_lahir));
                    if(($usia2->format('%Y') >= '17') AND ($usia2->format('%Y') <= '59')){
                       $data2[] = $j2->id_status_penduduk;
                    }
                }

                echo count($data2);
                ;?>,
                <?php 
                $data3 = array();
                foreach($jumlah3 as $j3){
                    $usia3 = date_diff(date_create(), date_create($j3->tgl_lahir));
                    if($usia3->format('%Y') >= '60'){
                       $data3[] = $j3->id_status_penduduk;
                    }
                }

                echo count($data3);
                ;?>
            ]
        }]
    });
});
		</script>
	</head>
	<body>
 <script src="<?php echo base_url();?>berkas/js/highcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/exporting.js" type="text/javascript"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div class="container">
    <button class="btn btn-sm btn-info" onclick="window.location='<?php echo base_url();?>admin'">&larr; kembali ke halaman sebelumnya</button>
</div>
	</body>
</html>