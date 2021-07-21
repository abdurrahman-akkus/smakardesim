<?php 
session_start();
@$yetki=$_SESSION["yetki"]; 
?>
<head>
  <link rel="shortcut icon" href="../images/smaKardesimLogo.svg" />
</head>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header" style="width:250px;display:flex;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand m-auto" href="anasayfa.php" style="margin-top: -10px;">
                <img style="width:45px;display: inline-block;" src="../images/smaKardesimLogo.svg" alt="SMA Kardeşim"></a>
            </div>
            <!-- /.navbar-header -->
                        
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="far fa-user fa-fw"></i>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                         if($yetki>2)  
                        { ?>
                        <li><a href="kllnclar.php"><i class="fa fa-user fa-fw"></i> Kullanıcılar</a>
                        </li>
                        
                        <li class="divider"></li>
                        <?php } ?>
                        <li><a href="cikis.php "><i class="fa fa-sign-out fa-fw"></i> Çıkış</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="anasayfa.php"><i class="fas fa-tachometer-alt"></i> Anasayfa</a>
                        </li>
                        <?php if($yetki>1)  
                        { ?>
                        <li>
                            <a href="kayit.php"><i class="fab fa-wpforms"></i> Çocuklar</a>
                        </li>
                        
                        <?php }
                         if($yetki>2)  
                        { ?>
                        <li>
                            <a href="kllnclar.php"><i class="fas fa-user-tie"></i> Kullanıcılar</a>
                        </li>
                        
                        <?php } ?>
                    </ul>
                    <div id="check_list"></div>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        <style>
        li.dropdown.show {
            display: inline-block !important;
        }
        </style>