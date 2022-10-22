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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/comun.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
  

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
    <aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="day_records.php"><i class="icofont-ui-check mr-2">inserir atividade</i></a>

            </li>

            <li class="nav-item">
                <a href="relatorio_mensal.php"><i class="icofont-ui-calendar mr-2">Conferir atividades diarias</i></a>

            </li>

            <?php if($user->is_admin):?>
            <li class="nav-item">
                <a href="relatorio_gerencial.php"><i class="icofont-chart-histogram mr-2">Relatorio Gerencial</i></a>

            </li>
            <li class="nav-item">
                <a href="usuarios.php"><i class="icofont-users mr-2">Usuarios</i></a>

            </li>

            <?php endif ?>
        </ul>
    </nav>


</aside>
<footer class="rodape">
    <span>Jm Produções</span>
    <span><i class="icofont-video-clapper"></i></span>
    <span>LTDA</span>
</footer>
<script src="assets/js/app.js"></script>
</body>

</html>
