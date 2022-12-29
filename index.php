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
<?php include("menu.php") ?>
<?php include("rodape.php") ?>
<script src="assets/js/app.js"></script>
</body>

</html>
