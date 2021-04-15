<?php

function getDateAsDateTime($date){
    return is_string($date) ? new  DateTime($date):$date;
}

function FimDeSemana($date){
    $inputDate=getDateAsDateTime($date);
    return $inputDate->format('N') >=6;
}

// comparando se uma data é menor que a outra 
function isBefore($date1,$date2){
    $inputDate1=getDateAsDateTime($date1);
    $inputDate2=getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;

}
// verificando proximo dia 
function getNextDay($date){
    $inputDate=getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;

}

// somando intervalo de horas trabalhadas 
function SomaIntervalo($intervalo1, $intervalo2){
$date=new DateTime('00:00:00');
$date->add($intervalo1);
$date->add($intervalo2);
return (new DateTime('00:00:00'))->diff($date);
}


// subtraindo intervalo de horas trabalhadas
function SubtrairIntervalo($intervalo1, $intervalo2){
    $date=new DateTime('00:00:00');
    $date->add($intervalo1);
    $date->sub($intervalo2);
    return (new DateTime('00:00:00'))->diff($date);
}

// DateTimeImutable ou seja esse formato de data/hora não é passivel de ser mudado
function getDateFromInterval($intervalo){
    return new DateTimeImmutable($intervalo->format('%H:%i:%s'));
}

function getDateFromString($str){

    return DateTimeImmutable::createFromFormat('H:i:s',$str);
}


function getPrimeiroDiaDoMes($date){
    $time=getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date("Y-m-1",$time));
}


function getUltimoDiaDoMes($date){
    $time=getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date("Y-m-t",$time));
}


function getSecondsFromDateInterval($intervalo){
    $d1=new DateTimeImmutable;
    $d2=$d1->add($intervalo);
    return $d2->getTimestamp() - $d1->getTimestamp();
}

// dia de trabalho no passado
function isPastWorkDay($date){
    return !FimDeSemana($date) && isBefore($date,new DateTime());
}

// dividindo a quantidade de segundos por 3600 
function getTimeStringFromSeconds($segundos){
    $h=intdiv($segundos,3600);
    $m=intdiv($segundos % 3600, 60);
    $s=$segundos -($h*3600)- ($m*60);

    return sprintf('%02d:%02d:%02d',$h,$m,$s);
}

function formatDateWithLocale($date,$pattern){
    $time=getDateAsDateTime($date)->getTimestamp();
    return strftime($pattern,$time); 

}
