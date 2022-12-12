<?php
session_start();
if(!$_SESSION['usuario']){
header("Location:login.php");
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/comun.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="../assets/css/template.css"> 
  

    <title>Ponto eletronico</title>
</head>
<body class="hide-sidebar">

    <header class="header">
        <div class="logo">
        <i class="icofont-attachment"></i>

            <span class="font-weight-bold bg-success text-white">Agenda Diaria</span>
        
        </div>

        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>

        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
            <span id="usuario"><?= $_SESSION['usuario'] ?></span> 
                <img class="avatar" src="<?= "http://www.gravatar.com/avatar.php?gravatar_id="
                                                . md5(strtolower(trim($_SESSION['user']->email))) ?>" alt="user">
                <span class="ml-3">
                    <?= $_SESSION['user']->name ?>

                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    
                       
                    
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout mr-2"></i>
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
   <?php include("menu.php") ?>
<?php include("rodape.php") ?>
<script src="assets/js/app.js"></script>
</body>

</html>
