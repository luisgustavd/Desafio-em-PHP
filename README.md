
#### DESAFIO EM PHP
# O seguinte desafio é fazer a separação de dados em categorias/tipos de um arquivo texto em formato CNAB400(Centro Nacional de Automação Bancária).

# Depois de interpretar todas as informações do arquivo cb181049.rem, é necessário dividir as suas informações e categorizar em um arquivo .json. 

# O objetivo é migrar os dados desse arquivo texto CNAB400 para um banco de dados e assim, por exemplo, fazer análise de dados de transações bancárias entre empresas e clientes.

# A solução proposta foi construir 4 algoritmos/classes para extrair informações do arquivo texto, divindo em: 
# 1ªlinha(Header ou Cabeçalho): onde temos os caracteres da cobrança (HeaderParser.php);
# 2ªlinha em diante: onde se encontra as transações/documentos bancários entre a empresa e os clientes(TransactionParser.php);
# Última linha: onde se tem uma linha começando com "9" para representar o número de arquivos registrados dentro do arquivo-texto(TrailerParser.php). 

# No algoritmo *CNAB400bradesco.php* se organiza todas as classes e funcoes utilizadas, e no algoritmo *run.php* temos a classe final para rodar qualquer <nome_do_arquivo>.rem nos formatos das cobranças do Banco Bradesco. 


