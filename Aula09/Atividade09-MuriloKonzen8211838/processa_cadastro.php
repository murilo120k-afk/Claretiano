<?php
/* ==========================================================================
   Atividade de Laboratório 09 - O Primeiro Back-End da Editora Br@sil
   Aluno(a): Murilo Vicenzo Peixoto Konzen
   RA: 8211838
   ==========================================================================

   INSTRUÇÕES PARA O ALUNO (FAÇA AQUI NO TOPO DO ARQUIVO):

   🟢 PASSO 1 (Aquecimento - Superglobal $_POST e Variáveis):
   Crie 5 variáveis em PHP (lembre-se do cifrão $ e do ponto e vírgula ;)
   para receber os campos enviados pelo formulário 'cadastro.html':
   - $nome      -> deve receber $_POST['nome_assinante']
   - $email     -> deve receber $_POST['email_assinante']
   - $cidade    -> deve receber $_POST['cidade_assinante']
   - $plano     -> deve receber $_POST['plano_escolhido']
   - $pagamento -> deve receber $_POST['forma_pagamento']

   Crie também a variável $dataRegistro usando a função date("d/m/Y").

   🟡 PASSO 2 (Aplicação - Concatenação com Ponto):
   Crie uma variável chamada $resumoEntrega que junte (concatene com o ponto .)
   o nome do assinante, a cidade e o e-mail em uma única frase.
   Exemplo: "O assinante " . $nome . " receberá a revista em " . $cidade . "."

   🔴 PASSO 3 (Desafio Extra - Protocolo Dinâmico):
   Crie uma variável chamada $protocolo que concatene a sigla "BR-",
   o ano atual usando date("Y") e um número sorteado usando rand(1000, 9999).

   ========================================================================== */

// ESCREVA SEU CÓDIGO PHP ABAIXO DESTA LINHA:

$nome = $_POST['nome_assinante'];
$email = $_POST['email_assinante']; 
$cidade = $_POST['cidade_assinante'];
$plano = $_POST['plano_escolhido'];
$pagamento = $_POST['forma_pagamento'];
$dataRegistro = date("d/m/Y");
$resumoEntrega = "O assinante " . $nome . " receberá a revista em " . $cidade . ".";
$protocolo = "BR-" . date("Y") . "-" . rand(1000, 9999);



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovante de Assinatura - Editora Br@sil</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <div id="conteudo">
        <h2>Comprovante de Assinatura - Editora Br@sil</h2>
        <hr>

        <div class="protocolo-destaque">
            Protocolo de Atendimento: <?php echo $protocolo; ?> 
        </div>

        
        <div class="comprovante-box">
            <p><strong>Prezado(a):</strong> <?php echo $nome; ?></p>
            <p><strong>E-mail Cadastrado:</strong> <?php echo $email; ?></p>
            <p><strong>Cidade de Entrega:</strong> <?php echo $cidade; ?></p>
            <p><strong>Plano Contratado:</strong> <?php echo $plano; ?></p>
            <p><strong>Forma de Pagamento:</strong> <?php echo $pagamento; ?></p>
            <p><strong>Data de Processamento:</strong> <?php echo $dataRegistro; ?></p>
        </div>

        <div class="aviso-sucesso">
            <strong>Resumo do Pedido:</strong><br>
            <em><?php echo $resumoEntrega; ?></em>
        </div>

        <a href="cadastro.html" class="botao botao-voltar">&larr; Voltar ao formulário</a>
    </div>

</body>
</html>
