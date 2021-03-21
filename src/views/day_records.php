<main class="content">

    <div class="content-title mb-4">

        <i class="icon icofont-check-alt text-success mr-2"></i>

        <div>
            <h1>Registrar Ponto</h1>
            <h2>Mantenha seu ponto consistente</h2>
        </div>
    </div>

<?php include(TEMPLATE_PATH ."/messages.php" ); ?>
    <div class="card">
        <div class="card-header">
            <h3><?= $hoje ?></h3>
            <p class="mb-0">batimentos efetuados hoje</p>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 1: <?=$records->time1 ?? '---' ?></span>
                <span class="record">Saida 1: <?=$records->time2 ?? '---' ?></span>
            </div>
            <div class="d-flex m-5 justify-content-around">
                <span  class="record">Entrada 2: <?=$records->time3 ?? '---' ?></span>
                <span  class="record">Saida 2: <?=$records->time4 ?? '---' ?></span>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-center">

            <a href="#" class="btn btn-success btn-lg">
            <i class="icofont-check mr-1"></i>
            Bater o ponto
            </a>
        </div>
    </div>

    
</main>