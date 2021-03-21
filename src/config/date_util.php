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
?>