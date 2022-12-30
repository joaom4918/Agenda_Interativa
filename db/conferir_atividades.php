<?php include("base.php"); ?>


<?php

include("./conexao.php");
$conexao = novaconexao();



$registros = [];

if ($_GET['excluir']) {
    $excluir = "DELETE FROM atividade where idatv=?";
    $stmt = $conexao->prepare($excluir);
    $stmt->bind_param("i", $_GET['excluir']);
    $stmt->execute();
}

$select = "SELECT idatv,descricao,horario,data from atividade";
$resultado = $conexao->query($select);
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
} else {
    echo "Error" . $conexao->connect_error;
}


?>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Descricao</th>
        <th>Horario</th>
        <th>Data</th>
        <th>Marcar Atividades Cumpridas</th>
        <th>Opção</th>

    </thead>

    <tbody>

        <?php foreach ($registros as $registro) : ?>
            <tr>
                <td><?= $registro['idatv'] ?></td>
                <td> <?= $registro['descricao'] ?></td>
                <td> <?= $registro['horario'] ?></td>
                <td> <?= $registro['data'] ?></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Completo</label>
                    </div>
                </td>

                <td><a class="btn btn-danger" href="/db/conferir_atividades.php?excluir=<?= $registro['idatv'] ?>">excluir <i class="icofont-trash"></i></a>
                <a class="btn btn-primary" href="/db/alterar_atividade.php?alterar=<?= $registro['idatv'] ?>">alterar</a>
                   
                </td>

                


            </tr>
        <?php endforeach ?>
    </tbody>

</table>