<main class="content">
    <div class="content-title mb-4">

        <i class="icon icofont-users mr-2"></i>

        <div>
            <h1>Cadastro de Usuarios</h1>
            <h2>Mantenha os Dados de usuarios atualizado</h2>
        </div>
       
    </div>
    <?php include(TEMPLATE_PATH."/messages.php") ?>

    <a class="btn btn-lg btn-success mb-3" href="save_user.php">novo usuario</a>

    <table class="table   table-bordered table-striped table-hover">

        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Admissão</th>
            <th>Data de Desligamento</th>
            <th>Açoes</th>
        </thead>

        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->start_date ?></td>
                    <td><?= $user->end_date ?></td>
                    <td>
                    <a class="btn btn-warning rounded-circle mr-2" href="save_user.php?update=<?=$user->id ?>"><i class="icofont-edit"></i></a>
                    <a class="btn btn-dark rounded-circle" href="?delete=<?=$user->id ?>"><i class="icofont-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>