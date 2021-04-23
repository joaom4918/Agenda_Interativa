<?php 

session_start();
validarSessao(true);

$activeUsersCount=User::getActiveUsersCount();
$ausenteUsers=WorkingHours:: getAusenteUser();
$anoMes=(new DateTime())->format('Y-m');
$segundos=WorkingHours::getHorasTrabalhadasNoMes($anoMes);
$horasNoMes=explode(':',getTimeStringFromSeconds($segundos))[0];

loadTemplateView("relatorio_gerencial", [
    'activeUsersCount'=>$activeUsersCount,
    'ausenteUsers'=> $ausenteUsers,
    'horasNoMes'=>$horasNoMes
]);


?>