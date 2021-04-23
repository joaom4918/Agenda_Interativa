<?php
session_start();
validarSessao(true);

$exception=null;
if(isset($_GET['delete'])){

    try{

        User::deleteById($_GET['delete']);
        addSuccessMsg("usuario foi excluido com sucesso");

    }catch(Exception $e){

        if(stripos($e->getMessage(),' FOREIGN KEY')){
            addErrorMsg('não é possivel excluir usuario com registros de ponto');
        }else{
            $exception=$e;
        }
       

    }

}
$users=User::getAll();

foreach($users as $user){
$user->start_date=(new DateTime($user->start_date))->format('d/m/Y');
if($user->end_date){
    $user->end_date=(new DateTime($user->end_date))->format('d/m/Y');
}

}
loadTemplateView("usuarios", ['users'=>$users,'exception'=>$exception ]);
