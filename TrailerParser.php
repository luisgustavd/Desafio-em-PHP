<?php

class TrailerParser {
    public static function parse($line) {
        // Verifica se é um trailer válido (começando com "9")
        if ($line[0] !== '9') {
            throw new Exception("Linha inválida para Trailer.");
        }

        return [
            "codigo_registro" => trim(substr($line, 0, 1)),   // Sempre "9"
            "numero_total_registros" => (int) trim(substr($line, 394, 6)), // Últimos 6 caracteres
        ];
    }
}
