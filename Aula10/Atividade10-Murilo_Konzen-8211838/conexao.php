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

$servidor = "localhost";
$usuario  = "root";
$senha    = "root";
$banco    = "cadastro";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8");

?>


