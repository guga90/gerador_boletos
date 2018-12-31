
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Boleto</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Boleto">
        <meta name="author" content="Gustavo N. Mendanha">       


        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/bower_components/morrisjs/morris.css" rel="stylesheet">

        <link href="<?php echo $this->baseUrl ?>/public/scripts/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">

        <link href="<?php echo $this->baseUrl ?>/public/scripts/jquery-ui-1.11.4.custom/jquery-ui.theme.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="<?php echo $this->baseUrl ?>/public/styles/geral.css" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script src="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo $this->baseUrl ?>/public/scripts/startbootstrap-sb-admin-2-1.0.7/dist/js/sb-admin-2.js"></script>        

        <script src="<?php echo $this->baseUrl ?>/public/scripts/jquery-ui-1.11.4.custom/jquery-ui.js"></script>


        <!--script src="<?php echo $this->baseUrl ?>/public/scripts/jquery.iframe-transport.js"></script-->

        <script src="<?php echo $this->baseUrl ?>/public/scripts/validate.js"></script>

        <script src="<?php echo $this->baseUrl ?>/public/scripts/maskedinput.js"></script>
        <script src="<?php echo $this->baseUrl ?>/public/scripts/geral.js"></script>

    </head>
    <body>
        <div id="wrapper">
            <?php
            if (file_exists($this->_conteudo)) {
                require_once $this->_conteudo;
            }
            ?>            
        </div>
        <div id="msg"></div>
        <div class="modal-loading"></div>
        <script type="text/javascript">
            var baseUrl = '<?php echo $this->baseUrl ?>';
        </script>
    </body>
</html>