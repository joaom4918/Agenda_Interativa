<?php 
session_start();
validarSessao();


// pegando o usuario e os batimentos do usuario naquele dia 
$user=$_SESSION['user'];
$records=WorkingHours::loadFromUserAndDate($user->id,date('Y-m-d'));



// pegando a hora atual  depois fazendo o batimento e gerando as mensagens pro usuario
try{
    $hora_atual = strftime('%H:%M:%S',time());
    if($_POST['pontoForcado']){
        $hora_atual=$_POST['pontoForcado'];
    }
    $records->BaterPonto($hora_atual);
    addSuccessMsg('Ponto inserido com Sucesso');
}catch( AppException $e){
 addErrorMsg($e->getMessage());
}
// o redirecionamento pra esse day records não é para uma view e sim para um controller
header('Location:day_records.php');
?>