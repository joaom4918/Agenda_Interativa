<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="day_records.php"><i class="icofont-ui-check mr-2">Registrar Ponto</i></a>

            </li>

            <li class="nav-item">
                <a href="relatorio_mensal.php"><i class="icofont-ui-calendar mr-2">Relatorio Mensal</i></a>

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

    <div class="sidebar-widgets">

    <div class="division1 my-3">
        <div class="sidebar-widget">
            <i class="icon icofont-hour-glass text-light"></i>

            <div class="info">
                <span class="main text-light" <?= $activeClock =='workedInterval' ? 'active-clock':'' ?>>
                    <?=$workedInterval ?>
                </span>
                <span class="label text-light">Horas Trabalhadas</span>
            </div>
        </div>
    </div>

        <div class="division2 my-3">
            <div class="sidebar-widget">
                <i class="icon icofont-ui-alarm text-danger"></i>

                <div class="info">
                    <span class="main text-danger" <?= $activeClock =='exitTime' ? 'active-clock':'' ?>>
                        <?=$exitTime ?>
                    </span>
                    <span class="label text-light">Hora de Saida</span>
                </div>
            </div>

        </div>

        <div class="division2 my-3">
            <div class="sidebar-widget">
            <i class="icon icofont-wall-clock text-light"></i>

                <div class="info">
                    <span class="main text-danger" <?= $activeClock =='exitTime' ? 'active-clock':'' ?> >
                        <?=date('h:i') ?>
                    </span>
                    <span class="label text-light">Hora Atual</span>
                </div>
            </div>

        </div>
    </div>
</aside>