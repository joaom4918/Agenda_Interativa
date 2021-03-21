<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/comun.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
 
    <title>Ponto eletronico</title>
</head>
    <form class="form-login" action="#" method="POST">

        <div class="login-card card">

            <div class="card-header">
                <i class="icofont-travelling mr-2"></i>

                <span class="font-weight-bold bg-success text-white">Entrada</span>
                <span class="font-weight-bold">&</span>
                <span class="font-weight-bold  bg-danger text-white">Saida</span>
                <i class="icofont-runner-alt-1 ml-2"></i>
            </div> 
            <div class="card-body">

                <?php include(TEMPLATE_PATH . '/messages.php') ?>

                <div class="form-group">

                    <label for="email">email</label>
                    <input type="email" name="email" id="email" placeholder="digite seu email" class="form-control <?= $errors['email']?'is-invalid':''  ?>" value="<?= $email = isset($_POST['email']) ? $_POST['email'] : "" ?>" autofocus>

                    <div class="invalid-feedback">
                      <?= $errors['email']?> 
                    </div>
                </div>



                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="digite sua senha" class="form-control  <?= $errors['password']? 'is-invalid':''  ?>">
                    <div class="invalid-feedback">
                    <?= $errors['password'] ?> 
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary btn-lg">entrar</button>
                </div>


            </div>


    </form>

