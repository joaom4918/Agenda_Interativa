<?php

include("conexao.php");
$conexao=novaconexao();
if(count($_POST)>0){
    
    $erros=[];
    $dados=$_POST;

    if(!filter_input(INPUT_POST,'nome')){
        $erros['nome']="voce não digitou seu nome";

    }

    if(!filter_input(INPUT_POST,'sobrenome')){
        $erros['sobrenome']="voce não digitou seu sobrenome";
    }

    if(!filter_input(INPUT_POST,'email')){
        $erros['email']="voce não digitou seu email";
    }

    if(!filter_input(INPUT_POST,'senha')){
        $erros['senha']="voce não digitou sua senha";
    }
    $nome=$dados['nome'];
    $sobrenome=$dados['sobrenome'];
    $email=$dados['email'];
    $senha=$dados['senha'];

    if(count($erros)==0){
   
        $inserir="INSERT INTO usuario(nome,sobrenome,email,senha) VALUES (?,?,?,?)";
        $stmt=$conexao->prepare($inserir);
        $params=[
            $nome,$sobrenome,$email,md5($senha)
        ];

        $stmt->bind_param("ssss",...$params);
        if($stmt->execute()){
            
            unset($dados);
        }
       

    }

}

?>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>


<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Nome</label>
                                                    <input class="form-control py-4 <?= $erros['nome'] ? 'is-invalid' : '' ?>" name="nome" id="inputFirstName" type="text" placeholder="Enter first name" />
                                                    <div class="invalid-feedback">
                                                        <?= $erros['nome'] ?>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Sobrenome</label>
                                                    <input class="form-control py-4 <?= $erros['sobrenome'] ? 'is-invalid' : '' ?>" name="sobrenome" id="inputLastName" type="text" placeholder="Enter last name" />
                                                    <div class="invalid-feedback">
                                                        <?= $erros['sobrenome'] ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4 <?= $erros['email'] ? 'is-invalid' : '' ?>" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            <div class="invalid-feedback">
                                                <?= $erros['email'] ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Senha</label>
                                                    <input class="form-control py-4 <?=$erros['senha']?'is-invalid':''?>" name="senha" id="inputPassword" type="password" placeholder="Enter password" />
                                                    <div class="invalid-feedback">
                                                        <?= $erros['senha'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary">Criar conta</button></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="../login">Ja possui uma conta? ir para o login</a></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>