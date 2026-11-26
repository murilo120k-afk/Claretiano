<?php
/* ==========================================================================
   Atividade de Laboratório 11 - Persistência no MySQL (INSERT) + Senha
   Aluno(a): [Murilo Konzen]
   RA: [8211838]
   ==========================================================================

   INSTRUÇÕES PARA O ALUNO:

   1. Inclua o arquivo "conexao.php" usando require_once "conexao.php";
   2. Receba via $_POST os campos 'nome_assinante', 'email_assinante' e 'plano_escolhido',
      e crie a variável $dataCadastro = date("Y-m-d");
   3. Valide se algum campo está vazio com if (empty($nome) || empty($email) || empty($plano)).

   🟢 DESAFIO 1 (Aquecimento - Geração Automática de Senha):
   - Extraia as 3 primeiras letras do $nome usando substr($nome, 0, 3)
   - Extraia as 3 primeiras letras do $email usando substr($email, 0, 3)
   - Junte as duas partes com "26" e converta tudo para minúsculo usando strtolower(),
     salvando na variável $senhaGerada.

   🟡 DESAFIO 2 (Aplicação - Verificação de Duplicidade com SELECT e mysqli_num_rows):
   - Monte a consulta: $sqlVerifica = "SELECT id FROM assinantes WHERE email = '$email'";
   - Execute com $resultadoVerifica = mysqli_query($conexao, $sqlVerifica);
   - Verifique com if (mysqli_num_rows($resultadoVerifica) > 0): se for maior que 0,
     exiba o aviso laranja de que o e-mail já possui assinatura cadastrada!

   🔴 DESAFIO 3 (Desafio Final - Gravação com INSERT INTO e Comprovante):
   - No bloco else (quando o e-mail ainda não existe), monte o comando:
     $sqlInsert = "INSERT INTO assinantes (nome, email, senha, plano, data_cadastro) VALUES (...)";
   - Execute com if (mysqli_query($conexao, $sqlInsert)) e exiba o comprovante HTML abaixo
     mostrando o Nome, Plano, E-mail (Login) e a $senhaGerada!
   ========================================================================== */

// ESCREVA SEU CÓDIGO PHP ABAIXO DESTA LINHA:

require_once "conexao.php";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

$nome = $_POST['nome_assinante'] ?? '';
$email = $_POST['email_assinante'] ?? '';
$plano = $_POST['plano_escolhido'] ?? '';
$dataCadastro = date("Y-m-d");

if (empty($nome) || empty($email) || empty($plano)) {
    echo "Preencha todos os campos obrigatórios.";
    exit;
}

$parteNome = substr($nome, 0, 3);
$parteEmail = substr($email, 0, 3);

$senhaGerada = strtolower($parteNome . $parteEmail . "26");

$email = mysqli_real_escape_string($conexao, $email);

$sqlVerifica = "SELECT id FROM assinantes WHERE email = '$email'";
$resultadoVerifica = mysqli_query($conexao, $sqlVerifica);

if ($resultadoVerifica === false) {
    echo "Não foi possível verificar o cadastro. Tente novamente.";
    exit;
}

if (mysqli_num_rows($resultadoVerifica) > 0) {
    echo '<p role="alert" style="color: #9a4100; background-color: #fff3e0;
              padding: 16px; border-left: 4px solid #ef6c00;">
              Este e-mail já possui uma assinatura cadastrada!
          </p>';
    exit;
}
else {
    $sqlInsert = "INSERT INTO assinantes
        (nome, email, senha, plano, data_cadastro)
        VALUES
        ('$nome', '$email', '$senhaGerada', '$plano', '$dataCadastro')";

    if (mysqli_query($conexao, $sqlInsert)) {
        echo "<h1>Assinatura cadastrada com sucesso!</h1>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>Plano:</strong> $plano</p>";
        echo "<p><strong>E-mail (Login):</strong> $email</p>";
        echo "<p><strong>Senha:</strong> $senhaGerada</p>";
    } else {
        echo "Erro ao cadastrar a assinatura.";
    }
}

?>
