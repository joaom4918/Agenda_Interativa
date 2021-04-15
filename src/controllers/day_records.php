<?php
// registro de batimento durante o dia
session_start();
validarSessao();

$date = (new DateTime())->getTimestamp();
$hoje=strftime('%d de %B de %Y',$date);
loadTemplateView('day_records', [
'hoje' =>$hoje,


]);
?>