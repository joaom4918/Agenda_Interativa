<main class="content">

    <div class="content-title mb-4">

        <i class="icon icofont-user mr-2"></i>

        <div>
            <h1>Cadastro de Usuario</h1>
            <h2>Adicione novos usuarios ao Sistema</h2>
        </div>
    </div>

    <?php include(TEMPLATE_PATH . "/messages.php") ?>

    <form action="#" method="post">

        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">nome</label>
                <input type="text" id="name" name="name" placeholder="digite o name de usuario"
                class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>" value="<?= $name ?>">
                <div class="invalid-feedback">
                    <?= $errors['name'] ?>
                </div>
            </div>


            <div class="form-group col-md-6">
                <label for="email">email</label>
                <input type="email" id="email" name="email" placeholder="Informe um email" class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>" value="<?= $email ?>">
                <div class="invalid-feedback">
                    <?= $errors['email'] ?>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">senha</label>
                <input type="password" id="password" name="password" placeholder="digite senha " class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?= $errors['password'] ?>
                </div>
            </div>


            <div class="form-group col-md-6">
                <label for="confirm_password">Confirmar senha</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme senha " class="form-control <?= $errors['confirm_password'] ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?= $errors['confirm_password'] ?>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Data de Admissão</label>
                <input type="date" id="start_date" name="start_date" class="form-control<?= $errors['start_date'] ? 'is-invalid' : '' ?>" value="<?= $start_date ?>" required>
                <div class="invalid-feedback">
                    <?= $errors['start_date'] ?>
                </div>
            </div>


            <div class="form-group col-md-6">
                <label for="end_date">Data de Desligamento</label>
                <input type="date" id="end_date" name="end_date" class="form-control<?= $errors['end_date'] ? 'is-invalid' : '' ?>" value="<?= $end_date ?>"> 
                <div class="invalid-feedback">
                    <?= $errors['end_date'] ?>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="is_admin">Admin?</label>
                <input type="checkbox" id="is_admin" name="is_admin" class="form-control<?= $errors['is_admin'] ? 'is-invalid' : '' ?>" <?= $is_admin ? 'checked' : '' ?>>
                <div class="invalid-feedback">
                    <?= $errors['is_admin'] ?>
                </div>
            </div>
        </div>


        <div>
            <button class="btn btn-primary btn-lg ">
                <i class="icofont-diskette">salvar</i>
            </button>
            <a class="btn btn-secondary btn-lg" href="/usuarios.php">cancelar</a>
        </div>
    </form>
</main>