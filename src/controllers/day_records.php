<?php
// registro de batimento durante o dia
session_start();
validarSessao();
loadModel('WorkingHours');
$date = (new DateTime())->getTimestamp();
$user=$_SESSION['user'];
$records=WorkingHours::loadFromUserAndDate($user->id,date('Y-m-d'));

$hoje=strftime('%d de %B de %Y',$date);
loadTemplateView('day_records', [
'hoje' =>$hoje,
'records'=>$records

]);
?>