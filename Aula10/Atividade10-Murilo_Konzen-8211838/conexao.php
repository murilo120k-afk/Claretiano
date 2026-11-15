<?php
/* ==========================================================================
   Atividade de Laboratório 10 - Módulo de Conexão MySQL (conexao.php)
   Aluno(a): murilo konzen
   RA: 8211838
   ==========================================================================

   🟢 DESAFIO 1 (Aquecimento - Conexão com o Banco via mysqli):
   1. Crie as 4 variáveis de configuração do banco:

   2. Crie a variável $conexao chamando a função:

   3. Faça um if (!$conexao) que utilize o comando die() junto com

   4. Configure o charset para "utf8" usando mysqli_set_charset($conexao, "utf8");
   ========================================================================== */

mysqli_report(MYSQLI_REPORT_OFF);


// 1. Variáveis de configuração do banco
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "nome_do_banco";

// 2. Conexão com o banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// 3. Verificação da conexão
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// 4. Configuração do charset
mysqli_set_charset($conexao, "utf8");

?>


