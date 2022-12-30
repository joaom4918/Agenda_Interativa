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

<?php include("cabecalho.php") ?>
<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="./db/inserir_atividade.php"><i class="icofont-ui-check mr-2">inserir atividade</i></a>

            </li>

            <li class="nav-item">
                <a href="./db/conferir_atividades.php"><i class="icofont-ui-calendar mr-2">Conferir atividades diarias</i></a>

            </li>

           
        </ul>
    </nav>

</aside>
 
<div class="conteudo">
    <h1>bem vindo a agenda interativa</h1>
    <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8YWdlbmRhfGVufDB8fDB8fA%3D%3D&w=1000&q=80" width="500" height="500">
</div>
<?php include("rodape.php") ?>
<script src="assets/js/app.js"></script>
</body>

</html>
