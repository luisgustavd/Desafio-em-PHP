<?php
//
require_once 'HeaderParser.php';
require_once 'TransactionParser.php';
require_once 'TrailerParser.php';
// classe principal
class CNAB400BradescoParser {
    private $filePath;
    private $data = [];

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function parse() {
        if (!file_exists($this->filePath)) {
            throw new Exception("Arquivo não encontrado.");
        }

        $file = fopen($this->filePath, "r");
        while (($line = fgets($file)) !== false) {
            $recordType = substr($line, 0, 1);
            switch ($recordType) {
                case '0':
                    $this->data['header'] = HeaderParser::parse($line);
                    break;
                case '1':
                    $this->data['transactions'][] = TransactionParser::parse($line);
                    break;
                case '9':
                    $this->data['trailer'] = TrailerParser::parse($line);
                    break;
            }
        }
        fclose($file);
    }

    public function getJSON() {
        return json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
