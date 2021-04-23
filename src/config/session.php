<?php 

function validarSessao($validarAdmin=false){
    $user=$_SESSION['user'];
    if(!isset($user)){
        header('Location:loginController.php');
        exit();
    }elseif($validarAdmin && !$user->is_admin){
        addErrorMsg("Acesso negado");
        header('Location:day_records.php');
        exit();
    }
}
?>