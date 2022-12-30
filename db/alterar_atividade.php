<?php include("base.php"); ?>

<?php 
include("./conexao.php");
$conexao=novaconexao();

if($_GET['alterar']){
    $sql="SELECT*FROM atividade WHERE idatv=?";
    $stmt=$conexao->prepare($sql);
    $stmt->bind_param("i",$_GET['alterar']);
    if($stmt->execute()){
        $resultado=$stmt->get_result();
        if($resultado->num_rows>0){
            $dados = $resultado->fetch_assoc();
        }
    
    }
}
if(count($_POST)>0){
    $erros=[];
    $dados=$_POST;
    if(!filter_input(INPUT_POST,'descricao')){
        $erros['descricao']="voce não colocou nenhuma atividade";
    }

    if(!filter_input(INPUT_POST,'data')){
        $erros['data']="voce não digitou a data";
    }

    if(!filter_input(INPUT_POST,'horario')){
        $erros['horario']="voce não digitou o horario";
    }

    $descricao=$dados['descricao'];
    $data=$dados['data'];
    $horario=$dados['horario'];
    $idatv=$dados['idatv'];
    if(count($erros)==0){
        $alterar="UPDATE descricao=? data=? horario=? FROM atividade where idatv";
        $stmt=$conexao->prepare($alterar);
        $params=[$descricao,$data,$horario,$idatv];
        $stmt->bind_param("sssi",...$params);
        if($stmt->execute()){
            unset($dados);
            header("Location:conferir_atividades.php");
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">
        <label for="descricao">Descrição</label>
        <input type="text"  value="<?=$dados['descricao']?>" class="form-control<?=$erros['descricao']?'is-invalid':'' ?>" name="descricao" placeholder="atividade diaria "><br>
        <div class="invalid-feedback">
            <?=$erros['descricao'] ?>
        </div>
        <label for="data">Data</label><br>
        <input type="date" value="<?=$dados['data']?>" class="form-control<?=$erros['data']?'is-invalid':'' ?>" name="data" placeholder="data"><br>
        <div class="invalid-feedback">
        <?=$erros['data'] ?>
        </div>

        <label for="horario">Horario</label>
        <input type="time" value="<?=$dados['horario']?>" class="form-control <?=$erros['horario']?'is-invalid':'' ?>" name="horario" placeholder="digite o horario">
        <div class="invalid-feedback">
        <?=$erros['horario'] ?>
        </div>

        <br>
        <button class="btn btn-primary">salvar atividade</button>

    </form>
</body>

</html>