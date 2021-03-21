<?php 

##horas trabalhadas 

class WorkingHours extends Model{

    protected static $nome_tabela = 'working_hours'; 
    protected static $colunas = [
        'id',
        'user_id',
        'work_date',
        'time1',
        'time2',
        'time3',
        'time4',
        'worked_time',
    ];    
    
    /*esse metodo vai carregar a jornada de trabalho apartir do usuario e apartir da data mais precisamente 
    apartir do id do usuario */
   public static function loadFromUserAndDate($userId,$workDate){
    $registro=self::getOne(['user_id'=>$userId,'work_date'=>$workDate]);

    if(!$registro){
        $registro= new WorkingHours([
            'user_id'=>$userId,
            'work_date'=>$workDate,
            'worked_time'=>0
        ]);
    }
    return $registro;
   }
}
