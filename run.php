<?php

require_once 'CNAB400bradesco.php';

try {
    if ($argc < 2) {
        throw new Exception("Uso: php run.php cb181049.rem");
    }

    $filePath = $argv[1];
    $parser = new CNAB400BradescoParser($filePath);
    $parser->parse();

    $jsonOutput = $parser->getJSON();
    
    // Salva o JSON no mesmo diretório do arquivo original
    $outputPath = pathinfo($filePath, PATHINFO_FILENAME) . ".json";
    file_put_contents($outputPath, $jsonOutput);

    echo "Arquivo JSON gerado com sucesso: $outputPath\n";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
