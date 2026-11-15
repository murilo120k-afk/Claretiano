<?php
/* ==========================================================================
   Atividade de Laboratório 10 - Validação com if/else (processa_cadastro.php)
   Aluno(a): [murilo konzen]
   RA: [8211838]
   ==========================================================================

   🟡 DESAFIO 2 (Aplicação - require_once, $_POST e Validação com empty):
   1. Inclua o arquivo "conexao.php" usando require_once "conexao.php";
   2. Capture os 3 campos do formulário via $_POST:
      - $nome  ($_POST['nome_assinante'])
      - $email ($_POST['email_assinante'])
      - $plano ($_POST['plano_escolhido'])
   3. Crie uma estrutura condicional if (empty($nome) || empty($email) || empty($plano)):
      - Se algum campo estiver vazio, exiba uma mensagem de erro em vermelho com echo
        e um link <a href="cadastro.html">Voltar</a>.
      - Senão (else), exiba os dados do assinante confirmando que a conexão com o
        banco 'editora_brasil' foi estabelecida com sucesso!

   🔴 DESAFIO 3 (Desafio Extra - Decisão com elseif por Plano):
   Dentro do bloco else (quando tudo foi preenchido), use um if / elseif / else
   para verificar qual foi o $plano escolhido e exibir o brinde do assinante:
   - Se for "Revista Semestral" -> Brinde: "Marcador de Página"
   - Se for "Revista Anual"     -> Brinde: "Ecobag da Editora Br@sil"
   - Senão (Plano Digital VIP)  -> Brinde: "Acesso VIP ao Acervo + Ecobag"
   ========================================================================== */

// ESCREVA SEU CÓDIGO PHP ABAIXO DESTA LINHA:


require_once "conexao.php";

$nome  = $_POST['nome_assinante'] ?? '';
$email = $_POST['email_assinante'] ?? '';
$plano = $_POST['plano_escolhido'] ?? '';

if (empty($nome) || empty($email) || empty($plano)) {
    echo '<p style="color: red;">Erro: preencha todos os campos.</p>';
    echo '<a href="cadastro.html">Voltar</a>';
} else {
    echo '<h2>Cadastro do assinante</h2>';
    echo '<p>Nome: ' . htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p>E-mail: ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p>Plano: ' . htmlspecialchars($plano, ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p>Conexão com o banco de dados "editora_brasil" estabelecida com sucesso!</p>';

    if ($plano === "Revista Semestral") {
        $brinde = "Marcador de Página";
    } elseif ($plano === "Revista Anual") {
        $brinde = "Ecobag da Editora Br@sil";
    } else {
        $brinde = "Acesso VIP ao Acervo + Ecobag";
    }

    echo '<p>Brinde: ' . htmlspecialchars($brinde, ENT_QUOTES, 'UTF-8') . '</p>';
}

?>




