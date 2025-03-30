<?php
    class HeaderParser {
        public static function parse($line){
            return[
                'id_registro' => trim(substr($line, 0, 1)),
                'id_remessa' => trim(substr($line, 1, 1)),
                'literal_remessa' => trim(substr($line, 2, 7)),
                'codigo_servico' => trim(substr($line, 9, 2)),
                'literal_servico' => trim(substr($line, 11, 15)),
                'codigo_empresa' => trim(substr($line, 26, 20)),
                'nome_empresa' => trim(substr($line, 46, 30)),
                'codigo_banco' => trim(substr($line, 76, 3)),
                'nome_banco' => trim(substr($line, 79, 15)),
                'data_gravacao' => trim(substr($line, 94, 6)),
                'branco1' => trim(substr($line, 100, 8)),
                'id_sistema' => trim(substr($line, 108, 2)),
                'numero_sequencial' => trim(substr($line, 110, 7)),
                'branco2' => trim(substr($line, 117, 277)),
                'nseq_um_a_um' => trim(substr($line, 394, 6))
            ];
        }
    }
?>