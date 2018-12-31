<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF: Elizeu Alcantara                         |
// +----------------------------------------------------------------------+
// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//
// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 5;
$taxa_boleto = 2.95;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias  OU  informe data: "13/04/2006"  OU  informe "" se Contra Apresentacao;
$valor_cobrado = "2950,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".", $valor_cobrado);
$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

$dadosboleto["inicio_nosso_numero"] = "24";  // 24 - Padr�o da Caixa Economica Federal
$dadosboleto["nosso_numero"] = "19525086";  // Nosso numero sem o DV - REGRA: M�ximo de 8 caracteres!
$dadosboleto["numero_documento"] = "27.030195.10"; // Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto;  // Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula
// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "Nome do seu Cliente";
$dadosboleto["endereco1"] = "Endere�o do seu Cliente";
$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja Nonononono";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa banc�ria - R$ " . number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";

// INSTRU��ES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% ap�s o vencimento";
$dadosboleto["instrucoes2"] = "- Receber at� 10 dias ap�s o vencimento";
$dadosboleto["instrucoes3"] = "- Em caso de d�vidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //
// DADOS DA SUA CONTA - CEF
$dadosboleto["agencia"] = "1565"; // Num da agencia, sem digito
$dadosboleto["conta"] = "13877";  // Num da conta, sem digito
$dadosboleto["conta_dv"] = "4";  // Digito do Num da conta
// DADOS PERSONALIZADOS - CEF
$dadosboleto["conta_cedente"] = "87000000414"; // ContaCedente do Cliente, sem digito (Somente N�meros)
$dadosboleto["conta_cedente_dv"] = "3"; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = "SR";  // C�digo da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)
// SEUS DADOS
$dadosboleto["identificacao"] = "BoletoPhp - C�digo Aberto de Sistema de Boletos";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "Coloque o endere�o da sua empresa aqui";
$dadosboleto["cidade_uf"] = "Cidade / Estado";
$dadosboleto["cedente"] = "Coloque a Raz�o Social da sua empresa aqui";
?>

<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				        |
// | 														                                   			  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF: Elizeu Alcantara                         |
// +----------------------------------------------------------------------+


$codigobanco = "104";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"], 10, 0, "valor");
//agencia � 4 digitos
$agencia = formata_numero($dadosboleto["agencia"], 4, 0);
//conta � 5 digitos
$conta = formata_numero($dadosboleto["conta"], 5, 0);
//dv da conta
$conta_dv = formata_numero($dadosboleto["conta_dv"], 1, 0);
//carteira � 2 caracteres
$carteira = $dadosboleto["carteira"];

//conta cedente (sem dv) com 6 digitos
$conta_cedente = formata_numero($dadosboleto["conta_cedente"], 6, 0);
//dv da conta cedente
$conta_cedente_dv = modulo_10($conta_cedente);

//nosso n�mero (sem dv) � 17 digitos
$nossonumero = $dadosboleto["inicio_nosso_numero"] . formata_numero($dadosboleto["nosso_numero"], 15, 0);
$sequenciaNossoNumero = sequenciaNossoNumero($nossonumero);

// Campo livre
$livre = rand(1, 9);

// 44 numeros para o calculo do digito verificador do codigo de barras
$dv = digitoVerificador_barra("$codigobanco$nummoeda$fator_vencimento$valor$conta_cedente$conta_cedente_dv$sequenciaNossoNumero$livre", 9, 0);
// Numero para o codigo de barras com 44 digitos
$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$conta_cedente$conta_cedente_dv$sequenciaNossoNumero$livre";

$agencia_codigo = $agencia . " / " . $conta_cedente . "-" . $conta_cedente_dv;

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $agencia_codigo;
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;

function sequenciaNossoNumero($nossoNumero) {
    $constante1 = substr($nossoNumero, 0, 1);
    $constante2 = substr($nossoNumero, 1, 1);

    $sequencia1 = substr($nossoNumero, 2, 3);
    $sequencia2 = substr($nossoNumero, 5, 3);
    $sequencia3 = substr($nossoNumero, 8, 9);

    return $sequencia1 . $constante1 . $sequencia2 . $constante2 . $sequencia3;
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

// FUN��ES
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

//Fim da fun��o

    function esquerda($entra, $comp) {
        return substr($entra, 0, $comp);
    }

    function direita($entra, $comp) {
        return substr($entra, strlen($entra) - $comp, $comp);
    }

    function fator_vencimento($data) {
        if ($data != "") {
            $data = explode("/", $data);
            $ano = $data[2];
            $mes = $data[1];
            $dia = $data[0];
            return(abs((_dateToDays("1997", "10", "07")) - (_dateToDays($ano, $mes, $dia))));
        } else {
            return "0000";
        }
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

        // v�rias linhas removidas, vide fun��o original
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
         *   Fun��o:
         *    Calculo do Modulo 11 para geracao do digito verificador
         *    de boletos bancarios conforme documentos obtidos
         *    da Febraban - www.febraban.org.br
         *
         *   Entrada:
         *     $num: string num�rica para a qual se deseja calcularo digito verificador;
         *     $base: valor maximo de multiplicacao [2-$base]
         *     $r: quando especificado um devolve somente o resto
         *
         *   Sa�da:
         *     Retorna o Digito verificador.
         *
         *   Observa��es:
         *     - Script desenvolvido sem nenhum reaproveitamento de c�digo pr� existente.
         *     - Assume-se que a verifica��o do formato das vari�veis de entrada � feita antes da execu��o deste script.
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

    function monta_linha_digitavel($codigo) {

        // Posi��o 	Conte�do
        // 1 a 3    N�mero do banco
        // 4        C�digo da Moeda - 9 para Real
        // 5        Digito verificador do C�digo de Barras
        // 6 a 9   Fator de Vencimento
        // 10 a 19 Valor (8 inteiros e 2 decimais)
        // 20 a 44 Campo Livre definido por cada banco (25 caracteres)
        // 1. Campo - composto pelo c�digo do banco, c�digo da mo�da, as cinco primeiras posi��es
        // do campo livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 0, 4);
        $p2 = substr($codigo, 19, 5);
        $p3 = modulo_10("$p1$p2");
        $p4 = "$p1$p2$p3";
        $p5 = substr($p4, 0, 5);
        $p6 = substr($p4, 5);
        $campo1 = "$p5.$p6";

        // 2. Campo - composto pelas posi�oes 6 a 15 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 24, 10);
        $p2 = modulo_10($p1);
        $p3 = "$p1$p2";
        $p4 = substr($p3, 0, 5);
        $p5 = substr($p3, 5);
        $campo2 = "$p4.$p5";

        // 3. Campo composto pelas posicoes 16 a 25 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 34, 10);
        $p2 = modulo_10($p1);
        $p3 = "$p1$p2";
        $p4 = substr($p3, 0, 5);
        $p5 = substr($p3, 5);
        $campo3 = "$p4.$p5";

        // 4. Campo - digito verificador do codigo de barras
        $campo4 = substr($codigo, 4, 1);

        // 5. Campo composto pelo fator vencimento e valor nominal do documento, sem
        // indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
        // tratar de valor zerado, a representacao deve ser 000 (tres zeros).
        $p1 = substr($codigo, 5, 4);
        $p2 = substr($codigo, 9, 10);
        $campo5 = "$p1$p2";

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
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				        |
// | 														                                   			  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF: Elizeu Alcantara                         |
// +----------------------------------------------------------------------+
?>

<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<HTML>
    <HEAD>
        <TITLE><?php echo $dadosboleto["identificacao"]; ?></TITLE>
        <META http-equiv=Content-Type content=text/html charset=ISO-8859-1>
        <meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licen�a GPL" />
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
        <table width=666 cellspacing=0 cellpadding=0 border=0><tr><td valign=top class=cp><DIV ALIGN="CENTER">Instru��es 
                        de Impress�o</DIV></TD></TR><TR><TD valign=top class=cp><DIV ALIGN="left">
                        <p>
                        <li>Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta (N�o use modo econ�mico).<br>
                        <li>Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens m�nimas � esquerda e � direita do formul�rio.<br>
                        <li>Corte na linha indicada. N�o rasure, risque, fure ou dobre a regi�o onde se encontra o c�digo de barras.<br>
                        <li>Caso n�o apare�a o c�digo de barras no final, clique em F5 para atualizar esta tela.
                        <li>Caso tenha problemas ao imprimir, copie a seq�encia num�rica abaixo e pague no caixa eletr�nico ou no internet banking:<br><br>
                            <span class="ld2">
                                &nbsp;&nbsp;&nbsp;&nbsp;Linha Digit�vel: &nbsp;<?php echo $dadosboleto["linha_digitavel"] ?><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;Valor: &nbsp;&nbsp;R$ <?php echo $dadosboleto["valor_boleto"] ?><br>
                            </span>
                    </DIV></td></tr></table><br><table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD class=ct width=666><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/6.png" width=665 border=0></TD></TR><TR><TD class=ct width=666><div align=right><b class=cp>Recibo 
                                do Sacado</b></div></TD></tr></tbody></table><table width=666 cellspacing=5 cellpadding=0 border=0><tr><td width=41></TD></tr></table>
        <table width=666 cellspacing=5 cellpadding=0 border=0 align=Default>
            <tr>
                <td width=41><IMG src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logo_empresa.png"></td>
                <td class=ti width=455><?php echo $dadosboleto["identificacao"]; ?> <?php echo isset($dadosboleto["cpf_cnpj"]) ? "<br>" . $dadosboleto["cpf_cnpj"] : '' ?><br>
                    <?php echo $dadosboleto["endereco"]; ?><br>
                    <?php echo $dadosboleto["cidade_uf"]; ?><br>
                </td>
                <td align=RIGHT width=150 class=ti>&nbsp;</td>
            </tr>
        </table>
        <BR><table cellspacing=0 cellpadding=0 width=666 border=0><tr><td class=cp width=150> 
                    <span class="campo"><IMG 
                            src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logocaixa.jpg" width="150" height="40" 
                            border=0></span></td>
                <td width=3 valign=bottom><img height=22 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/3.png" width=2 border=0></td><td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $dadosboleto["codigo_banco_com_dv"] ?></font></div></td><td width=3 valign=bottom><img height=22 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/3.png" width=2 border=0></td><td class=ld align=right width=453 valign=bottom><span class=ld> 
                        <span class="campotitulo">
                            <?php echo $dadosboleto["linha_digitavel"] ?>
                        </span></span></td>
            </tr><tbody><tr><td colspan=5><img height=2 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=666 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=268 height=13>Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=156 height=13>Ag�ncia/C�digo
                        do Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=34 height=13>Esp�cie</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=53 height=13>Quantidade</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=120 height=13>Nosso 
                        n�mero</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=268 height=12>
                        <span class="campo"><?php echo $dadosboleto["cedente"]; ?></span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=156 height=12>
                        <span class="campo">
                            <?php echo $dadosboleto["agencia_codigo"] ?>
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
                            <?php echo $dadosboleto["nosso_numero"] ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=268 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=268 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=156 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=156 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=34 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=34 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=53 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=53 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=120 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=120 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top colspan=3 height=13>N�mero
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
                            <?php echo ($data_venc != "") ? $dadosboleto["data_vencimento"] : "Contra Apresenta��o" ?>
                        </span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["valor_boleto"] ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=72 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=72 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=132 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=132 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=134 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=134 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=113 height=13>(-) 
                        Desconto / Abatimentos</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=112 height=13>(-) 
                        Outras dedu��es</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=113 height=13>(+) 
                        Mora / Multa</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=113 height=13>(+) 
                        Outros acr�scimos</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
                        Valor cobrado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=112 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=112 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=112 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=659 height=13>Sacado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=659 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["sacado"] ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=659 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=659 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct  width=7 height=12></td><td class=ct  width=564 >Demonstrativo</td><td class=ct  width=7 height=12></td><td class=ct  width=88 >Autentica��o 
                        mec�nica</td></tr><tr><td  width=7 ></td><td class=cp width=564 >
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
                            src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logocaixa.jpg" width="150" height="40" 
                            border=0></span></td>
                <td width=3 valign=bottom><img height=22 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/3.png" width=2 border=0></td><td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $dadosboleto["codigo_banco_com_dv"] ?></font></div></td><td width=3 valign=bottom><img height=22 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/3.png" width=2 border=0></td><td class=ld align=right width=453 valign=bottom><span class=ld> 
                        <span class="campotitulo">
                            <?php echo $dadosboleto["linha_digitavel"] ?>
                        </span></span></td>
            </tr><tbody><tr><td colspan=5><img height=2 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=666 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=472 height=13>Local 
                        de pagamento</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>Vencimento</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=472 height=12>Pag�vel 
                        em qualquer Banco at� o vencimento</td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
                        <span class="campo">
                            <?php echo ($data_venc != "") ? $dadosboleto["data_vencimento"] : "Contra Apresenta��o" ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=472 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=472 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=472 height=13>Cedente</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>Ag�ncia/C�digo 
                        cedente</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=472 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["cedente"] ?>
                        </span></td>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
                        <span class="campo">
                            <?php echo $dadosboleto["agencia_codigo"] ?>
                        </span></td>
                </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=472 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=472 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13> 
                        <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=113 height=13>Data 
                        do documento</td><td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=133 height=13>N<u>o</u>
            documento</td><td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=62 height=13>Esp�cie
            doc.</td><td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=34 height=13>Aceite</td><td class=ct valign=top width=7 height=13> 
            <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=102 height=13>Data
            processamento</td><td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>Nosso
            n�mero</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=113 height=12><div align=left> 
                <span class="campo">
                    <?php echo $dadosboleto["data_documento"] ?>
                </span></div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top width=133 height=12>
            <span class="campo">
                <?php echo $dadosboleto["numero_documento"] ?>
            </span></td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=62 height=12><div align=left><span class="campo">
                    <?php echo $dadosboleto["especie_doc"] ?>
                </span> 
            </div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=34 height=12><div align=left><span class="campo">
                    <?php echo $dadosboleto["aceite"] ?>
                </span> 
            </div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=102 height=12><div align=left>
                <span class="campo">
                    <?php echo $dadosboleto["data_processamento"] ?>
                </span></div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12>
            <span class="campo">
                <?php echo $dadosboleto["nosso_numero"] ?>
            </span></td>
    </tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=113 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=113 border=0></td><td valign=top width=7 height=1> 
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=133 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=133 border=0></td><td valign=top width=7 height=1>
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=62 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=62 border=0></td><td valign=top width=7 height=1>
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=34 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=34 border=0></td><td valign=top width=7 height=1> 
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=102 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=102 border=0></td><td valign=top width=7 height=1>
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1>
            <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><table cellspacing=0 cellpadding=0 border=0><tbody><tr>
            <td class=ct valign=top width=7 height=13> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top COLSPAN="3" height=13>Uso 
                do banco</td><td class=ct valign=top height=13 width=7> <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=83 height=13>Carteira</td><td class=ct valign=top height=13 width=7> 
                <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=43 height=13>Esp�cie</td><td class=ct valign=top height=13 width=7>
                <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=103 height=13>Quantidade</td><td class=ct valign=top height=13 width=7>
                <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=102 height=13>
                Valor Documento</td><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
                Valor documento</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td valign=top class=cp height=12 COLSPAN="3"><div align=left> 
                </div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=83> 
                <div align=left> <span class="campo">
                        <?php echo $dadosboleto["carteira"] ?>
                    </span></div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=43><div align=left><span class="campo">
                        <?php echo $dadosboleto["especie"] ?>
                    </span> 
                </div></td><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=103><span class="campo">
                    <?php echo $dadosboleto["quantidade"] ?>
                </span> 
            </td>
            <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top  width=102>
                <span class="campo">
                    <?php echo $dadosboleto["valor_unitario"] ?>
                </span></td>
            <td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12> 
                <span class="campo">
                    <?php echo $dadosboleto["valor_boleto"] ?>
                </span></td>
        </tr><tr><td valign=top width=7 height=1> <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=75 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=31 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=31 border=0></td><td valign=top width=7 height=1> 
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=83 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=83 border=0></td><td valign=top width=7 height=1> 
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=43 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=43 border=0></td><td valign=top width=7 height=1>
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=103 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=103 border=0></td><td valign=top width=7 height=1>
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=102 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=102 border=0></td><td valign=top width=7 height=1>
                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody> 
</table><table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody> 
                        <tr> <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr> 
                            <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr> 
                            <td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=1 border=0></td></tr></tbody></table></td><td valign=top width=468 rowspan=5><font class=ct>Instru��es 
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
                                Outras dedu��es</td></tr><tr><td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10> 
                <table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=13> 
                                <img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=1 border=0></td></tr></tbody></table></td><td align=right width=188> 
                <table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(+) 
                                Mora / Multa</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr> 
                            <td valign=top width=7 height=1> <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1> 
                                <img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr> 
                            <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=1 border=0></td></tr></tbody></table></td><td align=right width=188> 
                <table cellspacing=0 cellpadding=0 border=0><tbody><tr> <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(+) 
                                Outros acr�scimos</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table></td></tr><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td></tr></tbody></table></td><td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>(=) 
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
            <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/1.png" width=1 border=0></td><td class=ct valign=top width=180 height=13>C�d. 
                baixa</td></tr><tr><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=472 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=472 border=0></td><td valign=top width=7 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=7 border=0></td><td valign=top width=180 height=1><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/2.png" width=180 border=0></td></tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 border=0 width=666><TBODY><TR><TD class=ct  width=7 height=12></TD><TD class=ct  width=409 >Sacador/Avalista</TD><TD class=ct  width=250 ><div align=right>Autentica��o 
                    mec�nica - <b class=cp>Ficha de Compensa��o</b></div></TD></TR><TR><TD class=ct  colspan=3 ></TD></tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 width=666 border=0><TBODY><TR><TD vAlign=bottom align=left height=50><?php fbarcode($dadosboleto["codigo_barras"], $this->baseUrl); ?> 
            </TD>
        </tr></tbody></table><TABLE cellSpacing=0 cellPadding=0 width=666 border=0><TR><TD class=ct width=666></TD></TR><TBODY><TR><TD class=ct width=666><div align=right>Corte 
                    na linha pontilhada</div></TD></TR><TR><TD class=ct width=666><img height=1 src="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/6.png" width=665 border=0></TD></tr></tbody></table>
</BODY></HTML>

