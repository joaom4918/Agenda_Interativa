<main class="content">

  <div class="content-title mb-4">

    <i class="icon icofont-calendar text-dark mr-2"></i>

    <div>
      <h1>Relatorio Mensal</h1>
      <h2>Acompanhando seu saldo de horas</h2>
    </div>
  </div>

  <div>
    <form class="mb-4" action="#" method="POST">

      <div class="input-group">
      <?php if ($user->is_admin):  ?>
        <select name="user" class="form-control" placeholder="selecione o usuario">
          <?php

          foreach ($users as $user) {
            $selected=$user->id === $userSelecionadoId ? 'selected' : ''; 
            echo "<option value='{$user->id}' {$selected}>{$user->name}</option>";
          }
          ?>
        </select>
        <?php endif  ?>
        <select name="perildo" class="form-control ml-3" placeholder="selecione o perildo">
          <?php

          foreach ($perildos as $key => $mes) {
            //se o periodo selecionado foi aquele que foi passado
            $selected=$key === $perildoSelecionado ? 'selected' : ''; 
            echo "<option value='{$key}' {$selected}>{$mes}</option>";
          }
          ?>
        </select>

        <button class="btn btn-primary ml-2">
        <i class="icofont-search"></i>
        </button>
      </div>
    </form>
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-dark">
        <th>Dia</th>
        <th>Entrada 1</th>
        <th>Saida 1</th>
        <th>Entrada 2</th>
        <th>Saida 2</th>
        <th>Saldo</th>
      </thead>
      <tbody>

        <?php foreach ($relatorio as $registro) : ?>
          <tr>
            <td><?= formatDateWithLocale($registro->work_date, '%A, %d de %B de %Y ') ?> </td>
            <td><?= $registro->time1 ?></td>
            <td><?= $registro->time2 ?></td>
            <td><?= $registro->time3 ?></td>
            <td><?= $registro->time4 ?></td>
            <td><?= $registro->getBalance() ?></td>
          </tr>
        <?php endforeach ?>
        <tr class="bg-primary text-white">
          <td> Horas Trabalhadas </td>
          <td colspan="3"><?= $somaTempoTrabalho ?></td>
          <td>Saldo Mensal</td>
          <td><?= $balanco ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>