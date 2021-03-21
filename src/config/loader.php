<?php

// o objetivo do loader é criar algumas  funçoes que ira ajudar a carregar algumas classes 

function loadModel($modelPath)
{
   require_once(MODEL_PATH . "/{$modelPath}.php");
}


function loadView($viewName, $params = array())
{

   if (count($params) > 0) {

      foreach ($params as $key => $value) {
         // se a variavel for valida  ou seja maior que zero sera criado uma variavel com o nome da string passada e sera associada ao valor
         if (strlen($key) > 0) {
            ${$key} = $value;
         }
      }
   }
   require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView($viewName, $params = array())
{   
   if (count($params) > 0) {

      foreach ($params as $key => $value) {
         // se a variavel for valida  ou seja maior que zero sera criado uma variavel com o nome da string passada e sera associada ao valor
         if (strlen($key) > 0) {
            ${$key} = $value;
         }
      }

   
   }


   require_once(TEMPLATE_PATH . "/header.php"); 
   require_once(TEMPLATE_PATH . "/esquerda.php"); 
   require_once(VIEW_PATH . "/{$viewName}.php"); 
   require_once(TEMPLATE_PATH . "/rodape.php");  

   function renderTitulo($titulo,$subtitulo,$icon=null){
         require_once (TEMPLATE_PATH."/titulo.php");
   }
  


}
