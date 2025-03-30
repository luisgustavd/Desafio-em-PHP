<?php
// testando a funcao da classe de trailer ou contador de arquivos
require_once 'TrailerParser.php';

try {
    if ($argc < 2) {
        throw new Exception("Uso: php test_trailer.php cb181049.rem");
    }

    $filePath = $argv[1];

    if (!file_exists($filePath)) {
        throw new Exception("Erro: Arquivo '$filePath' não encontrado.");
    }

    $file = fopen($filePath, "r");
    if (!$file) {
        throw new Exception("Erro ao abrir o arquivo.");
    }

    $lastLine = '';
    while (($line = fgets($file)) !== false) {
        $lastLine = $line;  // Guarda sempre a última linha lida
    }

    fclose($file);

    if (!$lastLine || $lastLine[0] !== '9') {
        throw new Exception("Trailer não encontrado no arquivo.");
    }

    $trailerData = TrailerParser::parse($lastLine);

    echo json_encode($trailerData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
