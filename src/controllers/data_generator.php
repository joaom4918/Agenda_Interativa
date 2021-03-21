<?php 
 loadModel('WorkingHours');

Database::executeSQL('DELETE From working_hours');
Database::executeSQL('DELETE From users WHERE id > 5');

function getDayTemplateByodds($regularRate,$extraRate,$lazyRate){

    $regularDiaTemplate=[
        'time1'=>'08:00:00',
        'time2'=>'12:00:00',
        'time3'=>'13:00:00',
        'time4'=>'17:00:00',
        'horas_trabalhadas'=> DAILY_TIME
    ];
    
    $horaExtraTemplate=[
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'horas_trabalhadas' => DAILY_TIME + 3600
    ];
    // funcionario saiu 1 hora mais cedo
    $lazyDayTemplate=[
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'horas_trabalhadas' => DAILY_TIME + 1800
    ];
    
    $value=rand(0,100);

    if($value <= $regularRate){
        return $regularDiaTemplate;
    }elseif($value <= $regularRate +$extraRate){
        return $horaExtraTemplate;
    }else{
        return $lazyDayTemplate;
    }
}

function populateWorkingHours($userId,$initialDate,$regularRate,$extraRate,$lazyRate)
{
    $data_atual= $initialDate;
    $ontem= new DateTime();
    $ontem->modify('-1day');
    $colunas =['user_id'=>$userId, 'work_date'=>$data_atual];
    // esse while é só pras datas anteriores de hoje 
    while(isBefore($data_atual,$ontem)){
        if(!FimDeSemana($data_atual)){
            $template=getDayTemplateByodds($regularRate,$extraRate,$lazyRate);
            $colunas=array_merge($colunas,$template);
            $workingHours=new WorkingHours($colunas);
            $workingHours->insert();

        }

        $data_atual=getNextDay($data_atual)->format('Y-m-d');
        $colunas['work_date']=$data_atual;
    }
}

populateWorkingHours(1,date('Y-m-1'),70,20,10); 
populateWorkingHours(2,date('Y-m-1'),70,20,10); 

echo ("tudo certo");



?>