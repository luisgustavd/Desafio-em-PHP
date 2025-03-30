<?php
// testando as funcao da classe cabecalho
require_once 'HeaderParser.php';

try {
    // Nome do arquivo .rem (pode ser passado como argumento na execução)
    if ($argc < 2) {
        throw new Exception("Uso: php test_header.php cb181049.rem");
    }

    $filePath = $argv[1];

    // Verifica se o arquivo existe
    if (!file_exists($filePath)) {
        throw new Exception("Erro: Arquivo '$filePath' não encontrado.");
    }

    // Abre o arquivo e lê a primeira linha (Header)
    $file = fopen($filePath, "r");
    if (!$file) {
        throw new Exception("Erro ao abrir o arquivo.");
    }

    $headerLine = fgets($file); // Lê a primeira linha
    fclose($file);

    if (!$headerLine) {
        throw new Exception("Erro: Arquivo vazio ou sem header válido.");
    }

    // Processa a linha com o HeaderParser
    $headerData = HeaderParser::parse($headerLine);

    // Converte o resultado para JSON formatado
    echo json_encode($headerData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
