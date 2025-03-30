<?php

class TransactionParser {
    public static function parse($line) {
        return [
            'id_registro' => trim(substr($line, 0, 1)),
            'agencia_debito' => trim(substr($line, 1, 5)),
            'dig_agencia_debito' => trim(substr($line, 6, 1)),
            'razao_cc' => trim(substr($line, 7, 5)),
            'conta_corrente' => trim(substr($line, 12, 7)),
            'dig_cc' => trim(substr($line, 19, 1)),
            'id_emp_beneficiaria' => trim(substr($line, 20, 17)),
            'num_controle_participante' => trim(substr($line, 37, 25)),
            'cod_banco' => trim(substr($line, 62, 3)), # Nº do Banco Bradesco "237" ou qualquer outro codigo
            'multa' => trim(substr($line, 65, 1)), # campo para identificar multas nas cobrancas
            'perc_multa' => trim(substr($line, 66, 4)), # percentual de multa na cobranca ~ 
            'id_titulo' => trim(substr($line, 70, 11)),
            'dig_auto_conf' => trim(substr($line, 81, 1)),
            'desc_bonificacao' => trim(substr($line, 82, 10)),
            'cond_emissao' => trim(substr($line, 92, 1)),
            'id_cond_boleto_deb' => trim(substr($line, 93, 1)),
            'brancos1' => trim(substr($line, 94, 10)),
            'ind_rateio_credito' => trim(substr($line, 104, 1)),
            'end_aviso_credito' => trim(substr($line, 105, 1)),
            'quant_pagamentos' => trim(substr($line, 106, 2)),
            'id_ocorrencia' => trim(substr($line, 108, 2)),
            'num_documento' => trim(substr($line, 110, 10)),
            'data_vencimento_titulo' => trim(substr($line, 120, 6)),
            'valor_titulo' => trim(substr($line, 126, 13)),
            'banco_encarregado' => trim(substr($line, 139, 3)),
            'agc_depositaria' => trim(substr($line, 142, 5)),
            'espec_titulo' => trim(substr($line, 147, 2)),
            'identificacao' => trim(substr($line, 149, 1)), 
            'data_emissao_titulo' => trim(substr($line, 150, 6)),
            'primeira_instrucao' => trim(substr($line, 156, 2)),
            'segunda_instrucao' => trim(substr($line, 158, 2)),
            'valor_cobrado_por_atraso' => trim(substr($line, 160, 13)),
            'data_p_concessao' => trim(substr($line, 173, 6)),
            'valor_desconto' => trim(substr($line, 179, 13)),
            'valor_iof' => trim(substr($line, 192, 13)),
            'valor_abatimento' => trim(substr($line, 205, 13)),
            'id_tipo_insc' => trim(substr($line, 218, 2)),
            'numero_inscricao' => trim(substr($line, 220, 14)),
            'nome_pagador' => trim(substr($line, 234, 40)),
            'endereco' => trim(substr($line, 274, 40)),
            'primeira_mensagem' => trim(substr($line, 314, 12)),
            'CEP' => trim(substr($line, 326, 6)),
            'sufixo_CEP' => trim(substr($line, 332, 3)),
            'segunda_mensagem' => trim(substr($line, 335, 60)),
            'num_sequencial' => trim(substr($line, 395, 6))
        ];
    }
}
