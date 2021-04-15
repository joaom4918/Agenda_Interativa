<?php
session_start();
validarSessao();

$data_atual = new DateTime();
$user = $_SESSION['user'];

$users=null;
$userSelecionadoId=$user->id;

if($user->is_admin){
$users=User::getAll();
$userSelecionadoId=$_POST['user']? $_POST['user']:$user->id;
}

$perildoSelecionado=$_POST['perildo']? $_POST['perildo']:$data_atual->format('Y-m');
$perildos=[];


for($anosDiff=2; $anosDiff <=2 ; $anosDiff++){
    $ano=date('Y')-$anosDiff;
        for($mes=12; $mes >=1;$mes--){
            $date=new DateTime("{$ano}-{$mes}-1");
            $perildos[$date->format('Y-m')]=strftime('%B de %Y',$date->getTimestamp());
        }
    }
$registros = WorkingHours::getRelatorioMensal($userSelecionadoId, $perildoSelecionado);

$relatorio = [];
$workday = 0;
$somaTempoTrabalho = 0;
$ultimoDia = getUltimoDiaDoMes($perildoSelecionado)->format('d');

/* enquanto dia for  menor igual  ao ultimo dia do mes   eu percorro  todos os dias 
e apartir desse laço  vai acontecer as consolidações jogando dentro de report
*/

for ($dia = 1; $dia <= $ultimoDia; $dia++) {
    $date =  $data_atual->format('Y-m') . '-' . sprintf('%02d', $dia);
    $registro = $registros[$date];
    /* se a data não estiver no fim de semana  e estiver no pasasado siginifica
 que é um dia valido de trabalho */
    if (isPastWorkDay($date)) $workday++;

    if ($registro) {
        $somaTempoTrabalho += $registro->worked_time;
        array_push($relatorio, $registro);
    } else {
        array_push($relatorio, new WorkingHours([
            'work_date' => $date,
            'worked_time' => 0
        ]));
    }
}

$tempoEstimado = $workday * DAILY_TIME;
$balanco = getTimeStringFromSeconds(abs($somaTempoTrabalho - $tempoEstimado));
$sinal = ($somaTempoTrabalho >= $tempoEstimado) ? '+' : '-';




loadTemplateView("relatorio_mensal", [
    'relatorio' => $relatorio,
    'somaTempoTrabalho' => getTimeStringFromSeconds($somaTempoTrabalho),
    'balanco' => "{$sinal}{$balanco}",
    'perildos'=>$perildos,
    'perildoSelecionado'=>$perildoSelecionado, 
    'users'=>$users,
    'userSelecionadoId'=>$userSelecionadoId
]);
