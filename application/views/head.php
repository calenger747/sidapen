<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title ;?></title>
        <link href="<?php echo base_url();?>berkas/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>berkas/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>berkas/css/datepicker.css" rel="stylesheet">
        <link href="<?php echo base_url();?>berkas/css/jquery.dataTables.css" rel="stylesheet">
        <script src="<?php echo base_url();?>berkas/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/datepicker.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/form-dinamis.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/jquery.dataTables.js" type="text/javascript"></script>

        <!-- SCRIPT HIDDEN INPUT TANGGAL PEMILU -->
		<script type="text/javascript">
		$(document).ready(function(){
			$("#flip").click(function(){
				$("#panel").slideToggle("fast");
			});
		});
		</script>

        <!-- SCRIPT HIDDEN INPUT TANGGAL IMUNISASI -->
        <script type="text/javascript">
        $(document).ready(function(){
            $("#flip-imun").click(function(){
                $("#panel-imun").slideToggle("fast");
            });
        });
        </script>

        <!-- FLIP MENU SEARCH ADMIN -->
        <script type="text/javascript">
        $(document).ready(function(){
            $("#flip-admin").click(function(){
                $("#panel-admin").slideToggle("fast");
            });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#flip-admin-a").click(function(){
                $("#panel-admin-a").slideToggle("fast");
            });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#flip-admin-s").click(function(){
                $("#panel-admin-s").slideToggle("fast");
            });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#flip-admin-s1").click(function(){
                $("#panel-admin-s1").slideToggle("fast");
            });
        });
        </script>
        <!-- END FLIP MENU SEARCH ADMIN -->

        <!-- FLIP MENU ADMIN -->
        <script type="text/javascript">
        $(document).ready(function(){
            $(".flipp").click(function(){
                $(".panell").slideToggle("fast");
            });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $(".flipp2").click(function(){
                $(".panell2").slideToggle("fast");
            });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $(".flipp3").click(function(){
                $(".panell3").slideToggle("fast");
            });
        });
        </script>
        <!-- END FLIP MENU ADMIN -->

        <!-- DATATABLES -->
        <script>
        $(document).ready(function() {
            $('#example').dataTable( {
                "order": [[ 3, "asc" ]]
            });
        });
        </script>
    </head>