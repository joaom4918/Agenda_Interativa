<?php
$erros = [];
include("revisao3/conexao.php");
$conexao = novaconexao();
ini_set("display_errors",1);
if($_GET['codigo']){
    $sql="SELECT*FROM funcionario WHERE idfunc=?";
    $stmt=$conexao->prepare($sql);
    $stmt->bind_param("i",$_GET['codigo']);
    if($stmt->execute()){
        $resultado=$stmt->get_result();
        if($resultado->num_rows>0){
            $dados = $resultado->fetch_assoc();
        }
    
    }
}     

if(count($_POST)>0){
    $erros = []; 
    $dados=$_POST;

    if (!filter_input(INPUT_POST, 'nome')) {
        $erros['nome'] = "voce não digitou o nome do funcionario";
    }

    if (!filter_input(INPUT_POST, 'salario_hora')) {
        $erros['salario_hora'] = "voce não digitou o salario hora";
    }

    if (!filter_input(INPUT_POST, 'horas_trabalhadas')) {
        $erros['horas_trabalhadas'] = "voce não digitou o numero de horas trabalhadas";
    }

   
    $nome = $dados['nome'];
    $horas_trabalhadas = $dados['horas_trabalhadas'];
    $salario_hora = $dados['salario_hora'];
    $salario_bruto = $salario_hora * $horas_trabalhadas;
    $idfunc = $dados['idfunc'];

    $desconto_inss = ($salario_bruto * 0.08);
    $desconto_ir = ($salario_bruto * 0.11);
    $desconto_sindicato = ($salario_bruto * 0.05);
    $salario_liquido = ($salario_bruto - $desconto_inss - $desconto_ir);
    if (count($erros) == 0) {
        $alterar = "UPDATE funcionario SET nome=?, horas_trabalhadas=?, salario_hora=?, salario_bruto=?,salario_liquido=? WHERE idfunc=?";
        $stmt = $conexao->prepare($alterar);
        $params = [$nome, $horas_trabalhadas, $salario_hora, $salario_bruto, $salario_liquido, $idfunc];
        $stmt->bind_param("sidddi", ...$params);
        if ($stmt->execute()){
            unset($dados);
            header("Location:/exercicio.php?dir=lista_exercicios3&file=ex21");
            
        }
    }
}
