
<?php

function novaconexao($banco="agenda"){

    $host="127.0.0.1:3306";
    $usuario="mysql";
    $senha="Palmeiras123";

    $conexao=mysqli_connect($host,$usuario,$senha,$banco);

    if($conexao->connect_error){
        die("Error".$conexao->connect_error); 
    }

    return $conexao; 
}


?>
