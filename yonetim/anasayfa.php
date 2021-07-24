<?php
require_once '../util/connect.php';
session_start();

if(@$_SESSION["girisKontrol"]!=1) {
   
    header("Location: index.php?info=nosession");
}
    
    @$kllnc=$_SESSION["kullanici_adi"];                   
    @$yetki=$_SESSION["yetki"];                   
?>

<?php 
$cocuklarQuery = $db->query("SELECT * FROM cocuk WHERE yetkili_kullanici = '{$_SESSION ["kullanici_id"]}'");


$cocuklar = array();
while ($cocuk = $cocuklarQuery->fetch(PDO::FETCH_ASSOC)) {
    array_push($cocuklar,$cocuk);
}
$cocukSayisi = sizeof($cocuklar);

?>
<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yönetim Paneli</title>


    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.v3.3.7.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    
    <div id="wrapper">

        
        <!-- Navigation -->
        <?php
         require_once 'inc_menu.php';
        ?>
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hoşgeldin <?php echo "$kllnc"; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
            <?php if($yetki>0)  
                        { ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                <i class="fab fa-wpforms fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $cocukSayisi ?></div>
                                    <div>Çocuklar</div>
                                </div>
                            </div>
                        </div>
                        <a href="kayit.php">
                            <div class="panel-footer">
                                <span class="pull-left">Detaylar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php }
                
                if($yetki>1)
                    { ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $kllnc_sayi ?></div>
                                    <div>Kullanıcılar</div>
                                </div>
                            </div>
                        </div>                    
                        <a href="kllnclar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Detaylar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $kllnc_sayi ?></div>
                                    <div>Kullanıcılar</div>
                                </div>
                            </div>
                        </div>                    
                        <a href="kllnclar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Detaylar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php  } ?>
            </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

    <script src="../js/bootstrap.v3.3.7.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
