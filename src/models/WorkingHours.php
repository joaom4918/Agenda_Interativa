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

   public function getNextTime(){
       if(!$this->time1) return 'time1';
       if(!$this->time2) return 'time2';
       if(!$this->time3) return 'time3';
       if(!$this->time4) return 'time4';
       return null;

       
   }

   public function getActiveClock(){
       $nextTime=$this->getNextTime();

       if($nextTime =='time1' || $nextTime =='time3'){
        return 'exitTime';
       }elseif($nextTime=='time2' || $nextTime=='time4'){
           return 'workedInterval';
       }else{
           return null;
       }
   }

   public function BaterPonto($time){

    $timeColum=$this->getNextTime(); 

    if(!$timeColum){
        throw  new AppException('voce ja fez os 4 batimentos do dia ');
    }

    $this->$timeColum =$time;
    $this->worked_time=getSecondsFromDateInterval($this->getWorkedInterval());
    // se o id estiver setado ira fazer um update se não estiver setado vai fazer um insert
    if($this->id){
        $this->update();
    }else{
        $this->insert();
    }
   }

   #P=perioldo T=tempo  
   function getWorkedInterval(){
       [$t1,$t2,$t3,$t4]=$this->getTimes();

       $parte1=new DateInterval('PT0S');
       $parte2=new DateInterval('PT0S');

       if($t1) $parte1=$t1->diff(new DateTime);
       if($t2) $parte1=$t1->diff($t2);
       if($t3) $parte2=$t3->diff(new DateTime);
       if($t4) $parte2=$t3->diff($t4);

       return SomaIntervalo($parte1,$parte2);
   }

   function getExitTime(){
    [$t1,,,$t4]=$this->getTimes();
    $diaTrabalho=DateInterval::createFromDateString('8 hours');

    // se o primeiro ponto ja estiver sido batido ele ira adicionar a hora atual mais 8
    if(!$t1){
        return(new DateTimeImmutable())->add($diaTrabalho);
    }elseif($t4){
        return $t4;
    }else{
       $total= SomaIntervalo($diaTrabalho,$this->getIntervaloLanche());
       return $t1->add($total);

    }

   }

   function getBalance(){
       if(!$this->time1 && !isPastWorkDay($this->work_date)) return '-';
       if(!$this->worked_time == DAILY_TIME) return '-';
        $balanco=$this->worked_time - DAILY_TIME;

        $balancoString=getTimeStringFromSeconds(abs($balanco));
        $sinal=$this->worked_time >= DAILY_TIME ? '+' : '-';
        return "{$sinal}{$balancoString}";
   }
   

   public static function getRelatorioMensal($userId,$date){

    $registros=[];
    $startDate=getPrimeiroDiaDoMes($date)->format('Y-m-d');
    $endDate=getUltimoDiaDoMes($date)->format('Y-m-d');

    $resultado=static::getResultSetFromSelect([
     "user_id"=>$userId,
     "raw"=>"work_date between  '{$startDate}' AND '{$endDate}'"
    ]); 

    if($resultado){
        while($row= $resultado->fetch_assoc()){
            $registros[$row['work_date']] =new  WorkingHours($row);
        }
    }

    return $registros;
   }
    private function getTimes(){
       $times=[];

       /* se time1 estiver setado sera adicionado ao array times  a string convertidapro formato de getDateFromString 
       se não times sera adicionado um valor nulo*/
       $this->time1 ? array_push($times,getDateFromString($this->time1)):array_push($times,null);
       $this->time2 ? array_push($times,getDateFromString($this->time2)):array_push($times,null);
       $this->time3 ? array_push($times,getDateFromString($this->time3)):array_push($times,null);
       $this->time4 ? array_push($times,getDateFromString($this->time4)):array_push($times,null);


       return $times;
   }


   public function getIntervaloLanche(){
       [,$t2,$t3,]=$this->getTimes();
       $intervalo_lanche=new  DateInterval('PT0S');

       if($t2)$intervalo_lanche=$t2->diff(new DateTime());
       if($t3) $intervalo_lanche=$t2->diff($t3);

       return $intervalo_lanche;
   }
}
