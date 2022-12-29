<?php include("../base.php"); ?>

<?php

include("./conexao.php");
$conexao = novaconexao();

$registros = [];

$select = "SELECT idatv,descricao,horario,data from atividade";
$resultado = $conexao->query($select);
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
}
?>

<table class="table table-bodered table-hover table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Descricao</th>
        <th>Horario</th>
        <th>Data</th>
    </thead>

    <tbody>

        <?php foreach($registros as $registro): ?>
            <tr>
               <td><?=$registro['idatv'] ?></td> 
               <td> <?=$registro['descricao']?></td>
               <td> <?=$registro['horario'] ?></td>
               <td> <?=$registro['data'] ?></td>
               
            </tr>
        <?php endforeach ?>
    </tbody>

</table>