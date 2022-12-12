<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="db/inserir_atividade.php"><i class="icofont-ui-check mr-2">inserir atividade</i></a>

            </li>

            <li class="nav-item">
                <a href="relatorio_mensal.php"><i class="icofont-ui-calendar mr-2">Conferir atividades diarias</i></a>

            </li>

            <?php if($user->is_admin):?>
            <li class="nav-item">
                <a href="relatorio_gerencial.php"><i class="icofont-chart-histogram mr-2">Relatorio Gerencial</i></a>

            </li>
            <li class="nav-item">
                <a href="usuarios.php"><i class="icofont-users mr-2">Usuarios</i></a>

            </li>

            <?php endif ?>
        </ul>
    </nav>


</aside>