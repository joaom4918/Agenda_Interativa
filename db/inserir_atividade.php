<?php include("../base.php"); ?>

<?php 
include("./conexao.php");
$conexao=novaconexao();


if(count($_POST)>0){
    $erros=[];
    if(!filter_input(INPUT_POST,'descricao')){
        $erros['descricao']="voce não colocou nenhuma atividade";
    }

    if(!filter_input(INPUT_POST,'data')){
        $erros['data']="voce não digitou a data";
    }

    if(!filter_input(INPUT_POST,'horario')){
        $erros['horario']="voce não digitou o horario";
    }

    $descricao=$_POST['descricao'];
    $data=$_POST['data'];
    $horario=$_POST['horario'];
    if(count($erros)==0){
        $inserir="INSERT INTO atividade (descricao,data,horario) VALUES(?,?,?)";
        $stmt=$conexao->prepare($inserir);
        $params=[$descricao,$data,$horario];
        $stmt->bind_param("sss",...$params);
        if($stmt->execute()){
            unset($_POST);
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
        <input type="text" class="form-control <?=$erros['descricao']?'is-invalid':'' ?>" name="descricao" placeholder="atividade diaria "><br>
        <div class="invalid-feedback">
            <?=$erros['descricao'] ?>
        </div>
        <label for="data">Data</label><br>
        <input type="date" class="form-control<?=$erros['data']?'is-invalid':'' ?>" name="data" placeholder="data"><br>
        <div class="invalid-feedback">
        <?=$erros['data'] ?>
        </div>

        <label for="horario">Horario</label>
        <input type="time" class="form-control <?=$erros['horario']?'is-invalid':'' ?>" name="horario" placeholder="digite o horario">
        <div class="invalid-feedback">
        <?=$erros['horario'] ?>
        </div>

        <br>
        <button class="btn btn-primary">salvar atividade</button>

    </form>
</body>

</html>