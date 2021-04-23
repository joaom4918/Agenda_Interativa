<main class="content">
    <div class="content-title mb-4">

        <i class="icon icofont-chart-histogram mr-2"></i>

        <div>
            <h1>Relatorio Gerencial</h1>
            <h2>Resumo das horas trabalhadas dos funcionarios</h2>
        </div>
    </div>

    <div class="summary-boxes">

        <div class="summary-box bg-primary">
            <i class="icon icofont-users"></i>
            <p class="title">QTDE Funcionarios</p>
            <p class="value"><?= $activeUsersCount ?></p>
        </div>
        <div class="summary-box bg-danger">
            <i class="icon icofont-invisible"></i>
            <p class="title">Faltas</p>
            <p class="value"><?= count($ausenteUsers) ?></p>
        </div>
        <div class="summary-box bg-success">
            <i class="icon icofont-clock-time"></i>
            <p class="title">Horas no mes</p>
            <p class="value"><?= $horasNoMes ?></p>
        </div>
    </div>




    <?php if (count($ausenteUsers) > 0) : ?>
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title"> Faltas do dia</h4>
                <p class="card-category mb-0">Relação de Funcionarios que Não Baterão Ponto</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>Nome</th>
                    </thead>
                    <tbody>
                        <?php foreach ($ausenteUsers as $nome) : ?>

                            <tr>
                                <td><?= $nome ?></td>
                            </tr>
                        <?php endforeach  ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif ?>
 
</main>