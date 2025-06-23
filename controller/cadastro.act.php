<?php 
require("../model/connect.php");
extract($_POST);
extract($_FILES);
$destino ="";
@session_start();


$_SESSION['nome_tentativa'] = $nome;
$_SESSION['sobrenome_tentativa'] = $sobrenome;
$_SESSION['data_tentativa'] = $dataNascimento;
$_SESSION['cpf_tentativa'] = $cpf;
$_SESSION['telefone_tentativa'] = $telefone;
$_SESSION['email_tentativa'] = $email;
$_SESSION['senha_tentativa'] = $senha;
$_SESSION['cep_tentativa'] = $cep;
$_SESSION['rua_tentativa'] = $rua;
$_SESSION['complemento_tentativa'] = $complemento;
$_SESSION['bairro_tentativa'] = $bairro;
$_SESSION['cidade_tentativa'] = $cidade;
$_SESSION['estado_tentativa'] = $estado;
$_SESSION['numero_tentativa'] = $numero;
$_SESSION['situacao_tentativa'] = $situacao;


$cpf_limpo = preg_replace('/\D/', '', $cpf);

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

$data = $dataNascimento;

// Converte a string para DateTime com verificação
$objData = DateTime::createFromFormat('d/m/Y', $data);

if ($objData && $objData->format('d/m/Y') === $data) {
    $dataFormatada = $objData->format('Y-d-m'); // Para salvar no banco

    // Validação de maioridade
    $hoje = new DateTime();
    $idade = $objData->diff($hoje)->y;

    if ($idade < 18) {
        $_SESSION['msg'] = "Somente é permitido o cadastro de maiores de 18 anos";
        $_SESSION['alertMsg'] = "Tente novamente";
        $_SESSION['alertIcon'] = 'error';
        $destino = "../view/cadastro.php";
        header("Location:$destino");
        exit;
    }

    // A data é válida e o usuário tem 18 anos ou mais
    // Aqui você pode seguir com o cadastro, usando $dataFormatada
} else {
    $_SESSION['msg'] = "Data de nascimento inválida";
    $_SESSION['alertMsg'] = "Tente novamente";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/cadastro.php";
    header("Location:$destino");
    exit;
}

  
  $email = trim($email);

  if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/\.com(\.br)?$/', $email)) {
      echo "Email válido";
  } else {
      $_SESSION['msg'] = "Email inválido";
      $_SESSION['alertMsg'] = "Tente novamente";
      $_SESSION['alertIcon'] = 'error';
      $destino = "../view/cadastro.php";
      header("Location:$destino");
      exit;
  }
 

if(validaCPF($cpf_limpo)){

    if($foto['size'] > 0){
         $dir = "../fotoUsuarios/" .md5(time()) . ".jpg";
    }else{
        $dir = "";
    }
  
$busca = mysqli_query($con, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf'");

$buscaTelefone = mysqli_query($con, "SELECT * FROM `usuario` WHERE `telefone` = '$telefone'");

if($busca->num_rows == 0){

if($buscaTelefone->num_rows==0){
    $senha = password_hash($senha,PASSWORD_DEFAULT);
    
    $nome = $nome . " " . $sobrenome; 
    if(mysqli_query($con, "INSERT INTO usuario (nome,dataNascimento, cpf, telefone,email, senha, caminhoFoto,cep,rua, numero, bairro,cidade,estado,complemento,nivel,ip,dataCadastro,status, situacao) 
                            VALUES('$nome','$dataFormatada','$cpf' ,'$telefone','$email','$senha', '$dir','$cep','$rua','$numero', '$bairro','$cidade','$estado','$complemento',1,'$ip',now(),1, '$situacao');")){
        if($foto['size'] > 0){
            move_uploaded_file($foto['tmp_name'],$dir);;
        }
  
      
        $_SESSION['msg'] = "Cadastro realizado!";
        $_SESSION['alertMsg'] = "Cadastro realizado com sucesso!";
        $_SESSION['alertIcon'] = 'success';
        $destino = "../view/login.php";
        
    } else {
        $_SESSION['msg'] = "Erro!";
        $_SESSION['alertMsg'] = "Erro ao cadastrar usuario!";
        $_SESSION['alertIcon'] = 'error';
        $destino = "../view/cadastro.php";
    }   
}else{
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "Telefone já cadastrado!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/cadastro.php"; 
}

  
}else {
    $_SESSION['msg'] = "Erro!";
    $_SESSION['alertMsg'] = "CPF já cadastrado!";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/cadastro.php";
   
}
}else{
    $_SESSION['msg'] = "CPF inválido!";
    $_SESSION['alertMsg'] = "O CPF informado não é válido.";
    $_SESSION['alertIcon'] = 'error';
    $destino = "../view/cadastro.php";
}


header("Location:$destino");

?>
