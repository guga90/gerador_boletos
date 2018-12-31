<?php

$boleto = new Boleto();
$boleto = $this->boleto;

// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>         |
// | Desenvolvimento Boleto Santander-Banespa : Fabio R. Lenharo                |
// +----------------------------------------------------------------------------+
// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//
// DADOS DO BOLETO PARA O SEU CLIENTE
$dataVenc = new Guga_Date($boleto->getLancamentoDtvenc());
$taxa_boleto = 0;
$valor_cobrado = $boleto->getLancamentoValor(); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".", $valor_cobrado);
$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = $boleto->getLancamentoId();  // Nosso numero - REGRA: Máximo de 8 caracteres!
$dadosboleto["numero_documento"] = str_pad($boleto->getLancamentoId(), 4, '0', STR_PAD_LEFT); // Num do pedido ou nosso numero


$dadosboleto["data_vencimento"] = $dataVenc->format('d/m/Y'); // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto;  // Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $boleto->getSacadoNomerazao();
$dadosboleto["endereco1"] = $boleto->getSacadoLogradouro();
$dadosboleto["endereco2"] = $boleto->getSacadoCidade() . ' - ' . $boleto->getSacadoEstado() . ' - CEP: ' . $boleto->getSacadoCep(); //Cidade - Estado -  CEP: 00000-000
// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = nl2br($boleto->getLancamentoDemonstrativo()); // "Pagamento de Compra na Loja Nonononono";
$dadosboleto["demonstrativo2"] = ''; //"Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ " . number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = ''; //"BoletoPhp - http://www.boletophp.com.br";

$dadosboleto["instrucoes1"] = nl2br($boleto->getContaObscaixa()); //"- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"] = ''; //"- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"] = ''; //"- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"] = ''; //"&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "001";
$dadosboleto["valor_unitario"] = $valor_cobrado;
$dadosboleto["aceite"] = "N";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DM";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //
// DADOS PERSONALIZADOS - SANTANDER BANESPA
$dadosboleto["codigo_cliente"] = $boleto->getContaNumero();; // Código do Cliente (PSK) (Somente 7 digitos)
$dadosboleto["ponto_venda"] = $boleto->getContaAgencia(); // Ponto de Venda = Agencia
$dadosboleto["carteira"] = $boleto->getContaCarteira();;  // Cobrança Simples - SEM Registro
$dadosboleto["carteira_descricao"] = "COBRANÇA SIMPLES - CSR";  // Descrição da Carteira

// SEUS DADOS
$dadosboleto["identificacao"] = ''; //"BoletoPhp - Código Aberto de Sistema de Boletos";
$dadosboleto["cpf_cnpj"] = $boleto->getCedenteCpfcnpj();
$dadosboleto["endereco"] = $boleto->getCedenteLogradouro();
$dadosboleto["cidade_uf"] = $boleto->getCedenteCidade() . ' / ' . $boleto->getCedenteEstado(); //"Cidade / Estado";
$dadosboleto["cedente"] = $boleto->getCedenteNomerazao();
?>

<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// | 																	                                    |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>         |
// | Desenvolvimento Boleto Santander-Banespa : Fabio R. Lenharo		            |
// +----------------------------------------------------------------------------+

$codigobanco = $boleto->getBancoCodigo(); //Antigamente era 353
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = $boleto->getContaMoeda();;
$fixo = "9";   // Numero fixo para a posição 05-05
$ios = "0";   // IOS - somente para Seguradoras (Se 7% informar 7, limitado 9%)
// Demais clientes usar 0 (zero)
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"], 10, 0, "valor");
//Modalidade Carteira
$carteira = $dadosboleto["carteira"];
//codigocedente deve possuir 7 caracteres
$codigocliente = formata_numero($dadosboleto["codigo_cliente"], 7, 0);

//nosso número (sem dv) é 11 digitos
$nnum = formata_numero($dadosboleto["nosso_numero"], 7, 0);
//dv do nosso número
$dv_nosso_numero = modulo_11($nnum, 9, 0);
// nosso número (com dvs) são 13 digitos
$nossonumero = "00000" . $nnum . $dv_nosso_numero;

$vencimento = $dadosboleto["data_vencimento"];

$vencjuliano = dataJuliano($vencimento);

// 43 numeros para o calculo do digito verificador do codigo de barras
$barra = "$codigobanco$nummoeda$fator_vencimento$valor$fixo$codigocliente$nossonumero$ios$carteira";

//$barra = "$codigobanco$nummoeda$fixo$codigocliente$nossonumero$ios$carteira";
$dv = digitoVerificador_barra($barra);
// Numero para o codigo de barras com 44 digitos
$linha = substr($barra, 0, 4) . $dv . substr($barra, 4);

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;

function dataJuliano($data) {
    $dia = (int) substr($data, 1, 2);
    $mes = (int) substr($data, 3, 2);
    $ano = (int) substr($data, 6, 4);
    $dataf = strtotime("$ano/$mes/$dia");
    $datai = strtotime(($ano - 1) . '/12/31');
    $dias = (int) (($dataf - $datai) / (60 * 60 * 24));
    return str_pad($dias, 3, '0', STR_PAD_LEFT) . substr($data, 9, 4);
}

function digitoVerificador_nossonumero($numero) {
    $resto2 = modulo_11($numero, 9, 1);
    $digito = 11 - $resto2;
    if ($digito == 10 || $digito == 11) {
        $dv = 0;
    } else {
        $dv = $digito;
    }
    return $dv;
}

function digitoVerificador_barra($numero) {
    $resto2 = modulo_11($numero, 9, 1);
    if ($resto2 == 0 || $resto2 == 1 || $resto2 == 10) {
        $dv = 1;
    } else {
        $dv = 11 - $resto2;
    }
    return $dv;
}

// FUNÇÕES
// Algumas foram retiradas do Projeto PhpBoleto e modificadas para atender as particularidades de cada banco

function formata_numero($numero, $loop, $insert, $tipo = "geral") {
    if ($tipo == "geral") {
        $numero = str_replace(",", "", $numero);
        while (strlen($numero) < $loop) {
            $numero = $insert . $numero;
        }
    }
    if ($tipo == "valor") {
        /*
          retira as virgulas
          formata o numero
          preenche com zeros
         */
        $numero = str_replace(",", "", $numero);
        while (strlen($numero) < $loop) {
            $numero = $insert . $numero;
        }
    }
    if ($tipo == "convenio") {
        while (strlen($numero) < $loop) {
            $numero = $numero . $insert;
        }
    }
    return $numero;
}

function fbarcode($valor, $baseUrl) {

    $fino = 1;
    $largo = 3;
    $altura = 50;

    $barcodes[0] = "00110";
    $barcodes[1] = "10001";
    $barcodes[2] = "01001";
    $barcodes[3] = "11000";
    $barcodes[4] = "00101";
    $barcodes[5] = "10100";
    $barcodes[6] = "01100";
    $barcodes[7] = "00011";
    $barcodes[8] = "10010";
    $barcodes[9] = "01010";
    for ($f1 = 9; $f1 >= 0; $f1--) {
        for ($f2 = 9; $f2 >= 0; $f2--) {
            $f = ($f1 * 10) + $f2;
            $texto = "";
            for ($i = 1; $i < 6; $i++) {
                $texto .= substr($barcodes[$f1], ($i - 1), 1) . substr($barcodes[$f2], ($i - 1), 1);
            }
            $barcodes[$f] = $texto;
        }
    }


//Desenho da barra
//Guarda inicial
    ?><img src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/p.png" width=<?php echo $fino ?> height=<?php echo $altura ?> border=0><img 
        src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/b.png" width=<?php echo $fino ?> height=<?php echo $altura ?> border=0><img 
        src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/p.png" width=<?php echo $fino ?> height=<?php echo $altura ?> border=0><img 
        src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/b.png" width=<?php echo $fino ?> height=<?php echo $altura ?> border=0><img 
        <?php
        $texto = $valor;
        if ((strlen($texto) % 2) <> 0) {
            $texto = "0" . $texto;
        }

// Draw dos dados
        while (strlen($texto) > 0) {
            $i = round(esquerda($texto, 2));
            $texto = direita($texto, strlen($texto) - 2);
            $f = $barcodes[$i];
            for ($i = 1; $i < 11; $i+=2) {
                if (substr($f, ($i - 1), 1) == "0") {
                    $f1 = $fino;
                } else {
                    $f1 = $largo;
                }
                ?>
                src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/p.png" width=<?php echo $f1 ?> height=<?php echo $altura ?> border=0><img 
                <?php
                if (substr($f, $i, 1) == "0") {
                    $f2 = $fino;
                } else {
                    $f2 = $largo;
                }
                ?>
                src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/b.png" width=<?php echo $f2 ?> height=<?php echo $altura ?> border=0><img 
                <?php
            }
        }

// Draw guarda final
        ?>
        src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/p.png" width=<?php echo $largo ?> height=<?php echo $altura ?> border=0><img 
        src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/b.png" width=<?php echo $fino ?> height=<?php echo $altura ?> border=0><img 
        src="<?php echo $baseUrl ?>/library/Includes/boletophp/imagens/p.png" width=<?php echo 1 ?> height=<?php echo $altura ?> border=0> 
        <?php
    }

//Fim da função

    function esquerda($entra, $comp) {
        return substr($entra, 0, $comp);
    }

    function direita($entra, $comp) {
        return substr($entra, strlen($entra) - $comp, $comp);
    }

    function fator_vencimento($data) {
        $data = explode("/", $data);
        $ano = $data[2];
        $mes = $data[1];
        $dia = $data[0];
        return(abs((_dateToDays("1997", "10", "07")) - (_dateToDays($ano, $mes, $dia))));
    }

    function _dateToDays($year, $month, $day) {
        $century = substr($year, 0, 2);
        $year = substr($year, 2, 2);
        if ($month > 2) {
            $month -= 3;
        } else {
            $month += 9;
            if ($year) {
                $year--;
            } else {
                $year = 99;
                $century --;
            }
        }
        return ( floor(( 146097 * $century) / 4) +
                floor(( 1461 * $year) / 4) +
                floor(( 153 * $month + 2) / 5) +
                $day + 1721119);
    }

    function modulo_10($num) {
        $numtotal10 = 0;
        $fator = 2;

        // Separacao dos numeros
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num, $i - 1, 1);
            // Efetua multiplicacao do numero pelo (falor 10)
            // 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Itaú
            $temp = $numeros[$i] * $fator;
            $temp0 = 0;
            foreach (preg_split('//', $temp, -1, PREG_SPLIT_NO_EMPTY) as $k => $v) {
                $temp0+=$v;
            }
            $parcial10[$i] = $temp0; //$numeros[$i] * $fator;
            // monta sequencia para soma dos digitos no (modulo 10)
            $numtotal10 += $parcial10[$i];
            if ($fator == 2) {
                $fator = 1;
            } else {
                $fator = 2; // intercala fator de multiplicacao (modulo 10)
            }
        }

        // várias linhas removidas, vide função original
        // Calculo do modulo 10
        $resto = $numtotal10 % 10;
        $digito = 10 - $resto;
        if ($resto == 0) {
            $digito = 0;
        }

        return $digito;
    }

    function modulo_11($num, $base = 9, $r = 0) {
        /**
         *   Autor:
         *           Pablo Costa <pablo@users.sourceforge.net>
         *
         *   Função:
         *    Calculo do Modulo 11 para geracao do digito verificador 
         *    de boletos bancarios conforme documentos obtidos 
         *    da Febraban - www.febraban.org.br 
         *
         *   Entrada:
         *     $num: string numérica para a qual se deseja calcularo digito verificador;
         *     $base: valor maximo de multiplicacao [2-$base]
         *     $r: quando especificado um devolve somente o resto
         *
         *   Saída:
         *     Retorna o Digito verificador.
         *
         *   Observações:
         *     - Script desenvolvido sem nenhum reaproveitamento de código pré existente.
         *     - Assume-se que a verificação do formato das variáveis de entrada é feita antes da execução deste script.
         */
        $soma = 0;
        $fator = 2;

        /* Separacao dos numeros */
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num, $i - 1, 1);
            // Efetua multiplicacao do numero pelo falor
            $parcial[$i] = $numeros[$i] * $fator;
            // Soma dos digitos
            $soma += $parcial[$i];
            if ($fator == $base) {
                // restaura fator de multiplicacao para 2 
                $fator = 1;
            }
            $fator++;
        }

        /* Calculo do modulo 11 */
        if ($r == 0) {
            $soma *= 10;
            $digito = $soma % 11;
            if ($digito == 10) {
                $digito = 0;
            }
            return $digito;
        } elseif ($r == 1) {
            $resto = $soma % 11;
            return $resto;
        }
    }

    function modulo_11_invertido($num) {  // Calculo de Modulo 11 "Invertido" (com pesos de 9 a 2  e não de 2 a 9)
        $ftini = 2;
        $fator = $ftfim = 9;
        $soma = 0;

        for ($i = strlen($num); $i > 0; $i--) {
            $soma += substr($num, $i - 1, 1) * $fator;
            if (--$fator < $ftini)
                $fator = $ftfim;
        }

        $digito = $soma % 11;

        if ($digito > 9)
            $digito = 0;

        return $digito;
    }

    function monta_linha_digitavel($codigo) {
        // Posição 	Conteúdo
        // 1 a 3    Número do banco
        // 4        Código da Moeda - 9 para Real ou 8 - outras moedas
        // 5        Fixo "9'
        // 6 a 9    PSK - codigo cliente (4 primeiros digitos)
        // 10 a 12  Restante do PSK (3 digitos)
        // 13 a 19  7 primeiros digitos do Nosso Numero
        // 20 a 25  Restante do Nosso numero (8 digitos) - total 13 (incluindo digito verificador)
        // 26 a 26  IOS
        // 27 a 29  Tipo Modalidade Carteira
        // 30 a 30  Dígito verificador do código de barras
        // 31 a 34  Fator de vencimento (qtdade de dias desde 07/10/1997 até a data de vencimento)
        // 35 a 44  Valor do título
        // 1. Primeiro Grupo - composto pelo código do banco, código da moéda, Valor Fixo "9"
        // e 4 primeiros digitos do PSK (codigo do cliente) e DV (modulo10) deste campo
        $campo1 = substr($codigo, 0, 3) . substr($codigo, 3, 1) . substr($codigo, 19, 1) . substr($codigo, 20, 4);
        $campo1 = $campo1 . modulo_10($campo1);
        $campo1 = substr($campo1, 0, 5) . '.' . substr($campo1, 5);



        // 2. Segundo Grupo - composto pelas 3 últimas posiçoes do PSK e 7 primeiros dígitos do Nosso Número
        // e DV (modulo10) deste campo
        $campo2 = substr($codigo, 24, 10);
        $campo2 = $campo2 . modulo_10($campo2);
        $campo2 = substr($campo2, 0, 5) . '.' . substr($campo2, 5);


        // 3. Terceiro Grupo - Composto por : Restante do Nosso Numero (6 digitos), IOS, Modalidade da Carteira
        // e DV (modulo10) deste campo
        $campo3 = substr($codigo, 34, 10);
        $campo3 = $campo3 . modulo_10($campo3);
        $campo3 = substr($campo3, 0, 5) . '.' . substr($campo3, 5);



        // 4. Campo - digito verificador do codigo de barras
        $campo4 = substr($codigo, 4, 1);



        // 5. Campo composto pelo fator vencimento e valor nominal do documento, sem
        // indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
        // tratar de valor zerado, a representacao deve ser 0000000000 (dez zeros).
        $campo5 = substr($codigo, 5, 4) . substr($codigo, 9, 10);

        return "$campo1 $campo2 $campo3 $campo4 $campo5";
    }

    function geraCodigoBanco($numero) {
        $parte1 = substr($numero, 0, 3);
        $parte2 = modulo_11($parte1);
        return $parte1 . "-" . $parte2;
    }
    ?>

<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa				        |
// | 																	                                    |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Santander-Banespa : Fabio R. Lenharo		      |
// +----------------------------------------------------------------------+
?>

<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<HTML>
    <HEAD>
        <TITLE><?php echo $dadosboleto["identificacao"]; ?></TITLE>
        <META http-equiv=Content-Type content=text/html charset=ISO-8859-1>
        <meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licença GPL" />
        <style type=text/css>
            <!--.cp {  font: bold 10px Arial; color: black}
            <!--.ti {  font: 9px Arial, Helvetica, sans-serif}
            <!--.ld { font: bold 15px Arial; color: #000000}
            <!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
            <!--.cn { FONT: 9px Arial; COLOR: black }
            <!--.bc { font: bold 20px Arial; color: #000000 }
            <!--.ld2 { font: bold 12px Arial; color: #000000 }
            --></style> 
    </head>

    <BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0>
        <table width=666 cellspacing=0 cellpadding=0 border=0><tr><td valign=top class=cp><DIV ALIGN="CENTER">Instruções 
                        de Impressão</DIV></TD></TR><TR><TD valign=top class=cp><DIV ALIGN="left">
                        <p>
                        <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (Não use modo econômico).<br>
                        <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do formulário.<br>
                        <li>Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.<br>
                        <li>Caso não apareça o código de barras no final, clique em F5 para atualizar esta tela.
                        <li>Caso tenha problemas ao imprimir, copie a seqüencia numérica abaixo e pague no caixa eletrônico ou no internet banking:<br><br>
                            <span class="ld2">
                                &nbsp;&nbsp;&nbsp;&nbsp;Linha Digitável: &nbsp;<?php echo $dadosboleto["linha_digitavel"] ?><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $dadosboleto["valor_boleto"] ?><br>
                            </span>
                    </DIV></td></tr></table><br><table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD class=ct width=666><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/6.png" width=665 border=0></TD></TR><TR><TD class=ct width=666><div align=right><b class=cp>Recibo 
                                do Sacado</b></div></TD></tr></tbody></table><table width=666 cellspacing=5 cellpadding=0 border=0><tr><td width=41></TD></tr></table>
        <!--table width=666 cellspacing=5 cellpadding=0 border=0 align=Default>
            <tr>
                <td width=41><IMG src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logo_empresa.png"></td>
                <td class=ti width=455><?php echo $dadosboleto["identificacao"]; ?> <?php echo isset($dadosboleto["cpf_cnpj"]) ? "<br>" . $dadosboleto["cpf_cnpj"] : '' ?><br>
        <?php echo $dadosboleto["endereco"]; ?><br>
        <?php echo $dadosboleto["cidade_uf"]; ?><br>
                </td>
                <td align=RIGHT width=150 class=ti>&nbsp;</td>
            </tr>
        </table>
        <BR--><table cellspacing=0 cellpadding=0 width=666 border=0><tr><td class=cp width=150> 
                    <span class="campo"><IMG 
                            src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logosantander.jpg" width="140" height="37"
                            border=0></span></td>
                <td width=3 valign=bottom><img height=22 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/3.png" width=2 border=0></td><td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $dadosboleto["codigo_banco_com_dv"] ?></font></div></td><td width=3 valign=bottom><img height=22 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/3.png" width=2 border=0></td><td class=ld align=right width=453 valign=bottom><span class=ld> 
                        <span class="campotitulo">
                            <?php echo $dadosboleto["linha_digitavel"] ?>
                        </span></span></td>
            </tr><tbody><tr><td colspan=5><img height=2 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=666 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=298 height=13>Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=126 height=13>Agência/Código 
                        do Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=34 height=13>Espécie</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=53 height=13>Quantidade</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=120 height=13>Nosso 
                        número</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=298 height=12> 
                        <span class="campo"><?php echo $dadosboleto["cedente"]; ?></span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=126 height=12> 
                        <span class="campo">
                            <?php
                            $tmp2 = $dadosboleto["codigo_cliente"];
                            $tmp2 = substr($tmp2, 0, strlen($tmp2) - 1) . '-' . substr($tmp2, strlen($tmp2) - 1, 1);
                            ?>

                            <?php echo $dadosboleto["ponto_venda"] . " <img src='imagens/b.png' width=10 height=1> " . $tmp2 ?>
                        </span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=34 height=12><span class="campo">
                            <?php echo $dadosboleto["especie"] ?>
                        </span> 
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=53 height=12><span class="campo">
                            <?php echo $dadosboleto["quantidade"] ?>
                        </span> 
                    </td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=120 height=12> 
                        <span class="campo">
                            <?php
                            $tmp = $dadosboleto["nosso_numero"];
                            $tmp = substr($tmp, 0, strlen($tmp) - 1) . '-' . substr($tmp, strlen($tmp) - 1, 1);
                            print $tmp;
                            ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=298 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=298 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=126 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=126 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=34 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=34 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=53 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=53 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=120 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=120 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top colspan=3 height=13>Número 
                        do documento</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=132 height=13>CPF/CNPJ</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=134 height=13>Vencimento</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>Valor 
                        documento</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top colspan=3 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["numero_documento"] ?>
                        </span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=132 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["cpf_cnpj"] ?>
                        </span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=134 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["data_vencimento"] ?>
                        </span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["valor_boleto"] ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=72 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=72 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=132 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=132 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=134 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=134 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=113 height=13>(-) 
                        Desconto / Abatimentos</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=112 height=13>(-) 
                        Outras deduções</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=113 height=13>(+) 
                        Mora / Multa</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=113 height=13>(+) 
                        Outros acréscimos</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
                        Valor cobrado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=112 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=112 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=112 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=659 height=13>Sacado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=659 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["sacado"] ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=659 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=659 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct  width=7 height=12></td><td class=ct  width=564 >Demonstrativo</td><td class=ct  width=7 height=12></td><td class=ct  width=88 >Autenticação 
                        mecânica</td></tr><tr><td  width=7 ></td><td class=cp width=564 >
                        <span class="campo">
                            <?php echo $dadosboleto["demonstrativo1"] ?><br>
                            <?php echo $dadosboleto["demonstrativo2"] ?><br>
                            <?php echo $dadosboleto["demonstrativo3"] ?><br>
                        </span>
                    </td><td  width=7 ></td><td  width=88 ></td></tr></tbody></table><table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td width=7></td><td  width=500 class=cp> 
                        <br><br><br> 
                    </td><td width=159></td></tr></tbody></table><table cellspacing=0 cellpadding=0 width=666 border=0><tr><td class=ct width=666></td></tr><tbody><tr><td class=ct width=666> 
                        <div align=right>Corte na linha pontilhada</div></td></tr><tr><td class=ct width=666><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/6.png" width=665 border=0></td></tr></tbody></table><br><table cellspacing=0 cellpadding=0 width=666 border=0><tr><td class=cp width=150> 
                    <span class="campo"><IMG 
                            src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logosantander.jpg" width="140" height="37"
                            border=0></span></td>
                <td width=3 valign=bottom><img height=22 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/3.png" width=2 border=0></td><td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $dadosboleto["codigo_banco_com_dv"] ?></font></div></td><td width=3 valign=bottom><img height=22 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/3.png" width=2 border=0></td><td class=ld align=right width=453 valign=bottom><span class=ld> 
                        <span class="campotitulo">
                            <?php echo $dadosboleto["linha_digitavel"] ?>
                        </span></span></td>
            </tr><tbody><tr><td colspan=5><img height=2 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=666 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=472 height=13>Local 
                        de pagamento</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>Vencimento</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=472 height=12>Pagável 
                        em qualquer Banco até o vencimento</td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["data_vencimento"] ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=472 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=472 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=472 height=13>Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>Ponto Venda / Ident. 
                        cedente</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=472 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["cedente"] ?>
                        </span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
                        <span class="campo">
                            <?php
                            $tmp2 = $dadosboleto["codigo_cliente"];
                            $tmp2 = substr($tmp2, 0, strlen($tmp2) - 1) . '-' . substr($tmp2, strlen($tmp2) - 1, 1);
                            ?>

                            <?php echo $dadosboleto["ponto_venda"] . " <img src='imagens/b.png' width=10 height=1> " . $tmp2 ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=472 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=472 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13> 
                        <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=113 height=13>Data 
                        do documento</td><td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=153 height=13>N<u>o</u> 
            documento</td><td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=62 height=13>Espécie 
            doc.</td><td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=34 height=13>Aceite</td><td class=ct valign=top width=7 height=13> 
            <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=82 height=13>Data 
            processamento</td><td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>Nosso 
            número</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=113 height=12><div align=left> 
                <span class="campo">
                    <?php echo $dadosboleto["data_documento"] ?>
                </span></div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=153 height=12> 
            <span class="campo">
                <?php echo $dadosboleto["numero_documento"] ?>
            </span></td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=62 height=12><div align=left><span class="campo">
                    <?php echo $dadosboleto["especie_doc"] ?>
                </span> 
            </div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=34 height=12><div align=left><span class="campo">
                    <?php echo $dadosboleto["aceite"] ?>
                </span> 
            </div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=82 height=12><div align=left> 
                <span class="campo">
                    <?php echo $dadosboleto["data_processamento"] ?>
                </span></div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
            <span class="campo">
                <?php echo $tmp; ?>
            </span></td>
    </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1> 
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=153 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=153 border=0></td><td valign=top width=7 height=1> 
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=62 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=62 border=0></td><td valign=top width=7 height=1> 
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=34 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=34 border=0></td><td valign=top width=7 height=1> 
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=82 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=82 border=0></td><td valign=top width=7 height=1> 
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1> 
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr> 
            <td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top COLSPAN="5" height=13> Carteira</td><td class=ct valign=top height=13 width=7>
                <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=53 height=13>Espécie</td><td class=ct valign=top height=13 width=7> 
                <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=123 height=13>Quantidade</td><td class=ct valign=top height=13 width=7> 
                <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=72 height=13> 
                Valor Documento</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
                Valor documento</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td valign=top class=cp height=12 COLSPAN="5"><div align=left>
                </div>    
                <div align=left> <span class="campo">
                        <?php echo $dadosboleto["carteira_descricao"] ?>
                    </span></div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=53><div align=left><span class="campo">
                        <?php echo $dadosboleto["especie"] ?>
                    </span> 
                </div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=123><span class="campo">
                    <?php echo $dadosboleto["quantidade"] ?>
                </span> 
            </td>
            <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=72> 
                <span class="campo">
                    <?php echo $dadosboleto["valor_unitario"] ?>
                </span></td>
            <td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
                <span class="campo">
                    <?php echo $dadosboleto["valor_boleto"] ?>
                </span></td>
        </tr><tr><td valign=top width=7 height=1> <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=75 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=31 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=31 border=0></td><td valign=top width=7 height=1> 
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=83 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=83 border=0></td><td valign=top width=7 height=1> 
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=53 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=53 border=0></td><td valign=top width=7 height=1> 
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=123 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=123 border=0></td><td valign=top width=7 height=1> 
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=72 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=72 border=0></td><td valign=top width=7 height=1> 
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody> 
</table><table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody> 
                        <tr> <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr> 
                            <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr> 
                            <td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=1 border=0></td></tr></tbody></table></td><td valign=top width=468 rowspan=5><font class=ct>Instruções 
                (Texto de responsabilidade do cedente)</font><br><br><span class=cp> <FONT class=campo>
                    <?php echo $dadosboleto["instrucoes1"]; ?><br>
                    <?php echo $dadosboleto["instrucoes2"]; ?><br>
                    <?php echo $dadosboleto["instrucoes3"]; ?><br>
                    <?php echo $dadosboleto["instrucoes4"]; ?></FONT><br><br> 
                </span></td>
            <td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(-) 
                                Desconto / Abatimentos</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr> 
                            <td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10> 
                <table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td valign=top width=7 height=1> 
                                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=1 border=0></td></tr></tbody></table></td><td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(-) 
                                Outras deduções</td></tr><tr><td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10> 
                <table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=13> 
                                <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=1 border=0></td></tr></tbody></table></td><td align=right width=188> 
                <table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(+) 
                                Mora / Multa</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr> 
                            <td valign=top width=7 height=1> <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1> 
                                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr> 
                            <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=1 border=0></td></tr></tbody></table></td><td align=right width=188> 
                <table cellspacing=0 cellpadding=0 border=0><tbody><tr> <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(+) 
                                Outros acréscimos</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr></tbody></table></td><td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
                                Valor cobrado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr></tbody> 
                </table></td></tr></tbody></table><table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td valign=top width=666 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=666 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=659 height=13>Sacado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=659 height=12><span class="campo">
                    <?php echo $dadosboleto["sacado"] ?>
                </span> 
            </td>
        </tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=659 height=12><span class="campo">
                    <?php echo $dadosboleto["endereco1"] ?>
                </span> 
            </td>
        </tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=472 height=13> 
                <span class="campo">
                    <?php echo $dadosboleto["endereco2"] ?>
                </span></td>
            <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>Cód. 
                baixa</td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=472 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=472 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 border=0 width=666><TBODY><TR><TD class=ct  width=7 height=12></TD><TD class=ct  width=409 >Sacador/Avalista</TD><TD class=ct  width=250 ><div align=right>Autenticação 
                    mecânica - <b class=cp>Ficha de Compensação</b></div></TD></TR><TR><TD class=ct  colspan=3 ></TD></tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 width=666 border=0><TBODY><TR><TD vAlign=bottom align=left height=50><?php fbarcode($dadosboleto["codigo_barras"], $this->baseUrl); ?> 
            </TD>
        </tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 width=666 border=0><TR><TD class=ct width=666></TD></TR><TBODY><TR><TD class=ct width=666><div align=right>Corte 
                    na linha pontilhada</div></TD></TR><TR><TD class=ct width=666><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/6.png" width=665 border=0></TD></tr></tbody></table>
</BODY></HTML>

