<?php
// testando a funcao da classe de transacoes 
    require_once 'TransactionParser.php';

try{
    if($argc < 2){
        throw new Exception("Uso: php test_parser.php cb181049.rem");
    }

    $filePath = $argv[1];

    if(!file_exists($filePath)){
        throw new Exception("Erro: Arquivo '$filePath' não encontrado.");
    }

        
    // Abre o arquivo e lê a primeira linha (Header)
    $file = fopen($filePath, "r");
    if (!$file) {
        throw new Exception("Erro ao abrir o arquivo.");
    }


    $transactions = [];
    $lineNumber = 0;

    // Lê todas as linhas do arquivo
    while (($line = fgets($file)) !== false) {
        $lineNumber++;

        // Ignorar Header (começa com '0') e Trailer (começa com '9')
        if ($line[0] === '1') {
            echo "Lendo linha $lineNumber: " . trim($line) . "\n"; // <- Debug
            // Processa a linha de transação
            $transactions[] = TransactionParser::parse($line);
        }
    }

    fclose($file);

    if (empty($transactions)) {
        throw new Exception("Nenhuma transação encontrada no arquivo.");
    }

    // Converte o resultado para JSON formatado
    echo json_encode($transactions, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}