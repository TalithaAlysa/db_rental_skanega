<html>
    <head>
        <title>Sistem Informasi Rental Kendaraan RPL Skanega</title>
        <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
        <script type="text/javascript" src="../asset/js/jquery.js"></script>
        <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
    </head>

    <body style="background: #f0f0f0">
        <?php
            session_start();
            if ($_SESSION['status'] != "login") {
                header("location:../index_user.php?pesan=belum_login");
            }
        ?>

        <nav class="navbar navbar-inverse" style="border-radius: 0px;">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-nav" aria-expanded="false">
                        <span class="sr-only"></span>
                    </button>
                    <a class="navbar-brand" href="index_user.php">Rental Kendaraan</a>
                </div>

                <div class="navbar navbar-collapse" id="menu-nav">
                    <ul class="nav navbar-nav">
                        
                        <li class="active">
                            <a href="index_user.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="user.php">
                                <i class="glyphicon glyphicon-plane"></i>
                                Pinjam
                            </a>
                        </li>

                        <li>
                            <a href="logout.php">
                                <i class="glyphicon glyphicon-log-out"></i>
                                Log Out
                            </a>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <p style="color:white; padding-top:15px;">
                                Halo, <b><?php echo $_SESSION['username']; ?></b>
                            </p>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </body>
</html>