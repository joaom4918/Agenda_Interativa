<?php

session_start();
validarSessao(true);


$exception=null;
$userData=[];

if(count($_POST)===0 && isset($_GET['update'])){
$user=User::getOne(['id'=>$_GET['update']]);
$userData=$user->getValues();
$userData['password']=null;
}elseif(count($_POST)>0 ){ 
    try{
        $dbUser= new User($_POST);
        // se o dbuser que é o usuario que vai ser mandado pro banco tiver um id ele faz update se não ele faz um insert 
        if($dbUser->id){
            $dbUser->update();
            addSuccessMsg('Usuario alterado com sucesso');
            header("Location:usuarios.php");
            exit();
        }else{
            $dbUser->insert();
            addSuccessMsg('Usuario cadastrado com sucesso');
        }
      
        $_POST=[];
    }catch(Exception $e){
        $exception=$e;
    }finally{
        $userData=$_POST;
    }
}

loadTemplateView("save_user", $userData + ["exception"=>$exception]);
