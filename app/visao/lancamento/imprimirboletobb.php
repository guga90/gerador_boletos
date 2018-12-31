<?php
$boleto = new Boleto();
$boleto = $this->boleto;


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
// +--------------------------------------------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>              		             				|
// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo / Rog�rio Dias Pereira|
// +--------------------------------------------------------------------------------------------------------+
// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//
// DADOS DO BOLETO PARA O SEU CLIENTE
$dataVenc = new Guga_Date($boleto->getLancamentoDtvenc());
$taxa_boleto = 0;
$valor_cobrado = $boleto->getLancamentoValor(); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".", $valor_cobrado);
$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = str_pad($boleto->getLancamentoId(), 5, '0', STR_PAD_LEFT);  // Nosso numero - REGRA: M�ximo de 8 caracteres!
$dadosboleto["numero_documento"] = str_pad($boleto->getLancamentoId(), 4, '0', STR_PAD_LEFT); // Num do pedido ou nosso numero


$dadosboleto["data_vencimento"] = $dataVenc->format('d/m/Y'); // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto;  // Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $boleto->getSacadoNomerazao();
$dadosboleto["endereco1"] = $boleto->getSacadoLogradouro();
$dadosboleto["endereco2"] = $boleto->getSacadoCidade() . ' - ' . $boleto->getSacadoEstado() . ' - CEP: ' . $boleto->getSacadoCep(); //Cidade - Estado -  CEP: 00000-000
// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = nl2br($boleto->getLancamentoDemonstrativo()); // "Pagamento de Compra na Loja Nonononono";
$dadosboleto["demonstrativo2"] = ''; //"Mensalidade referente a nonon nonooon nononon<br>Taxa banc�ria - R$ " . number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = ''; //"BoletoPhp - http://www.boletophp.com.br";

$dadosboleto["instrucoes1"] = nl2br($boleto->getContaObscaixa()); //"- Sr. Caixa, cobrar multa de 2% ap�s o vencimento";
$dadosboleto["instrucoes2"] = ''; //"- Receber at� 10 dias ap�s o vencimento";
$dadosboleto["instrucoes3"] = ''; //"- Em caso de d�vidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"] = ''; //"&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";
// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "001";
$dadosboleto["valor_unitario"] = $valor_cobrado;
$dadosboleto["aceite"] = "N";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DM";

// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //
// DADOS DA SUA CONTA - BANCO DO BRASIL
$dadosboleto["agencia"] = $boleto->getContaAgencia();// Num da agencia, sem digito
$dadosboleto["conta"] = $boleto->getContaNumero();  // Num da conta, sem digito
// DADOS PERSONALIZADOS - BANCO DO BRASIL
$dadosboleto["convenio"] = $boleto->getContaConvenio();  // Num do conv�nio - REGRA: 6 ou 7 ou 8 d�gitos
$dadosboleto["contrato"] = $boleto->getContaContrato(); // Num do seu contrato
$dadosboleto["carteira"] = $boleto->getContaCarteira();
$dadosboleto["variacao_carteira"] = "-019";  // Varia��o da Carteira, com tra�o (opcional)
// TIPO DO BOLETO
$dadosboleto["formatacao_convenio"] = strlen($boleto->getContaConvenio()); // REGRA: 8 p/ Conv�nio c/ 8 d�gitos, 7 p/ Conv�nio c/ 7 d�gitos, ou 6 se Conv�nio c/ 6 d�gitos
$dadosboleto["formatacao_nosso_numero"] = strlen($dadosboleto["nosso_numero"]) <= 5 ? "1" : "2"; // REGRA: Usado apenas p/ Conv�nio c/ 6 d�gitos: informe 1 se for NossoN�mero de at� 5 d�gitos ou 2 para op��o de at� 17 d�gitos

/*
  #################################################
  DESENVOLVIDO PARA CARTEIRA 18

  - Carteira 18 com Convenio de 8 digitos
  Nosso n�mero: pode ser at� 9 d�gitos

  - Carteira 18 com Convenio de 7 digitos
  Nosso n�mero: pode ser at� 10 d�gitos

  - Carteira 18 com Convenio de 6 digitos
  Nosso n�mero:
  de 1 a 99999 para op��o de at� 5 d�gitos
  de 1 a 99999999999999999 para op��o de at� 17 d�gitos

  #################################################
 */


// SEUS DADOS
$dadosboleto["identificacao"] = ''; //"BoletoPhp - C�digo Aberto de Sistema de Boletos";
$dadosboleto["cpf_cnpj"] = $boleto->getCedenteCpfcnpj();
$dadosboleto["endereco"] = $boleto->getCedenteLogradouro();
$dadosboleto["cidade_uf"] = $boleto->getCedenteCidade() . ' / ' . $boleto->getCedenteEstado(); //"Cidade / Estado";
$dadosboleto["cedente"] = $boleto->getCedenteNomerazao();
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
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +-------------------------------------------------------------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>              					                               |
// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo / Rog�rio Dias Pereira / Romeu Medeiros|
// +-------------------------------------------------------------------------------------------------------------------------+

$codigobanco = $boleto->getBancoCodigo(); //"001";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = $boleto->getContaMoeda(); //"9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"], 10, 0, "valor");
//agencia � sempre 4 digitos
$agencia = formata_numero($dadosboleto["agencia"], 4, 0);
//conta � sempre 8 digitos
$conta = formata_numero($dadosboleto["conta"], 8, 0);
//carteira 18
$carteira = $dadosboleto["carteira"];
//agencia e conta
$agencia_codigo = $agencia . "-" . modulo_11($agencia) . " / " . $conta . "-" . modulo_11($conta);
//Zeros: usado quando convenio de 7 digitos
$livre_zeros = '000000';

// Carteira 18 com Conv�nio de 8 d�gitos
if ($dadosboleto["formatacao_convenio"] == "8") {
    $convenio = formata_numero($dadosboleto["convenio"], 8, 0, "convenio");
    // Nosso n�mero de at� 9 d�gitos
    $nossonumero = formata_numero($dadosboleto["nosso_numero"], 9, 0);
    $dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira");
    $linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira";
    //montando o nosso numero que aparecer� no boleto
    $nossonumero = $convenio . $nossonumero . "-" . modulo_11($convenio . $nossonumero);
}

// Carteira 18 com Conv�nio de 7 d�gitos
if ($dadosboleto["formatacao_convenio"] == "7") {
    $convenio = formata_numero($dadosboleto["convenio"], 7, 0, "convenio");
    // Nosso n�mero de at� 10 d�gitos
    $nossonumero = formata_numero($dadosboleto["nosso_numero"], 10, 0);
    $dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira");
    $linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira";
    $nossonumero = $convenio . $nossonumero;
    //N�o existe DV na composi��o do nosso-n�mero para conv�nios de sete posi��es
}

// Carteira 18 com Conv�nio de 6 d�gitos
if ($dadosboleto["formatacao_convenio"] == "6") {
    $convenio = formata_numero($dadosboleto["convenio"], 6, 0, "convenio");

    if ($dadosboleto["formatacao_nosso_numero"] == "1") {

        // Nosso n�mero de at� 5 d�gitos
        $nossonumero = formata_numero($dadosboleto["nosso_numero"], 5, 0);
        $dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira");
        $linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira";
        //montando o nosso numero que aparecer� no boleto
        $nossonumero = $convenio . $nossonumero . "-" . modulo_11($convenio . $nossonumero);
    }

    if ($dadosboleto["formatacao_nosso_numero"] == "2") {

        // Nosso n�mero de at� 17 d�gitos
        $nservico = "21";
        $nossonumero = formata_numero($dadosboleto["nosso_numero"], 17, 0);
        $dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$nservico");
        $linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$nservico";
    }
}

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $agencia_codigo;
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;

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

    /*
      #################################################
      FUN��O DO M�DULO 10 RETIRADA DO PHPBOLETO

      ESTA FUN��O PEGA O D�GITO VERIFICADOR DO PRIMEIRO, SEGUNDO
      E TERCEIRO CAMPOS DA LINHA DIGIT�VEL
      #################################################
     */

    function modulo_10($num) {
        $numtotal10 = 0;
        $fator = 2;

        for ($i = strlen($num); $i > 0; $i--) {
            $numeros[$i] = substr($num, $i - 1, 1);
            $parcial10[$i] = $numeros[$i] * $fator;
            $numtotal10 .= $parcial10[$i];
            if ($fator == 2) {
                $fator = 1;
            } else {
                $fator = 2;
            }
        }

        $soma = 0;
        for ($i = strlen($numtotal10); $i > 0; $i--) {
            $numeros[$i] = substr($numtotal10, $i - 1, 1);
            $soma += $numeros[$i];
        }
        $resto = $soma % 10;
        $digito = 10 - $resto;
        if ($resto == 0) {
            $digito = 0;
        }

        return $digito;
    }

    /*
      #################################################
      FUN��O DO M�DULO 11 RETIRADA DO PHPBOLETO

      MODIFIQUEI ALGUMAS COISAS...

      ESTA FUN��O PEGA O D�GITO VERIFICADOR:

      NOSSONUMERO
      AGENCIA
      CONTA
      CAMPO 4 DA LINHA DIGIT�VEL
      #################################################
     */

    function modulo_11($num, $base = 9, $r = 0) {
        $soma = 0;
        $fator = 2;
        for ($i = strlen($num); $i > 0; $i--) {
            $numeros[$i] = substr($num, $i - 1, 1);
            $parcial[$i] = $numeros[$i] * $fator;
            $soma += $parcial[$i];
            if ($fator == $base) {
                $fator = 1;
            }
            $fator++;
        }
        if ($r == 0) {
            $soma *= 10;
            $digito = $soma % 11;

            //corrigido
            if ($digito == 10) {
                $digito = "X";
            }

            /*
              alterado por mim, Daniel Schultz

              Vamos explicar:

              O m�dulo 11 s� gera os digitos verificadores do nossonumero,
              agencia, conta e digito verificador com codigo de barras (aquele que fica sozinho e triste na linha digit�vel)
              s� que � foi um rolo...pq ele nao podia resultar em 0, e o pessoal do phpboleto se esqueceu disso...

              No BB, os d�gitos verificadores podem ser X ou 0 (zero) para agencia, conta e nosso numero,
              mas nunca pode ser X ou 0 (zero) para a linha digit�vel, justamente por ser totalmente num�rica.

              Quando passamos os dados para a fun��o, fica assim:

              Agencia = sempre 4 digitos
              Conta = at� 8 d�gitos
              Nosso n�mero = de 1 a 17 digitos

              A unica vari�vel que passa 17 digitos � a da linha digitada, justamente por ter 43 caracteres

              Entao vamos definir ai embaixo o seguinte...

              se (strlen($num) == 43) { n�o deixar dar digito X ou 0 }
             */

            if (strlen($num) == "43") {
                //ent�o estamos checando a linha digit�vel
                if ($digito == "0" or $digito == "X" or $digito > 9) {
                    $digito = 1;
                }
            }
            return $digito;
        } elseif ($r == 1) {
            $resto = $soma % 11;
            return $resto;
        }
    }

    /*
      Montagem da linha digit�vel - Fun��o tirada do PHPBoleto
      N�o mudei nada
     */

    function monta_linha_digitavel($linha) {
        // Posi��o 	Conte�do
        // 1 a 3    N�mero do banco
        // 4        C�digo da Moeda - 9 para Real
        // 5        Digito verificador do C�digo de Barras
        // 6 a 19   Valor (12 inteiros e 2 decimais)
        // 20 a 44  Campo Livre definido por cada banco
        // 1. Campo - composto pelo c�digo do banco, c�digo da mo�da, as cinco primeiras posi��es
        // do campo livre e DV (modulo10) deste campo
        $p1 = substr($linha, 0, 4);
        $p2 = substr($linha, 19, 5);
        $p3 = modulo_10("$p1$p2");
        $p4 = "$p1$p2$p3";
        $p5 = substr($p4, 0, 5);
        $p6 = substr($p4, 5);
        $campo1 = "$p5.$p6";

        // 2. Campo - composto pelas posi�oes 6 a 15 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1 = substr($linha, 24, 10);
        $p2 = modulo_10($p1);
        $p3 = "$p1$p2";
        $p4 = substr($p3, 0, 5);
        $p5 = substr($p3, 5);
        $campo2 = "$p4.$p5";

        // 3. Campo composto pelas posicoes 16 a 25 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1 = substr($linha, 34, 10);
        $p2 = modulo_10($p1);
        $p3 = "$p1$p2";
        $p4 = substr($p3, 0, 5);
        $p5 = substr($p3, 5);
        $campo3 = "$p4.$p5";

        // 4. Campo - digito verificador do codigo de barras
        $campo4 = substr($linha, 4, 1);

        // 5. Campo composto pelo valor nominal pelo valor nominal do documento, sem
        // indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
        // tratar de valor zerado, a representacao deve ser 000 (tres zeros).
        $campo5 = substr($linha, 5, 14);

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
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+
// +---------------------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>              |
// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo|
// +---------------------------------------------------------------------------------+
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title><?php echo $dadosboleto["identificacao"]; ?></title>
        <META http-equiv=Content-Type content=text/html charset=ISO-8859-1>
        <meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licen�a GPL" />

        <style type="text/css">
            <!--
            .ti {font: 9px Arial, Helvetica, sans-serif}
            -->
        </style>
    </HEAD>
    <BODY>
        <STYLE>

            @media screen,print {

                /* *** TIPOGRAFIA BASICA *** */

                * {
                    font-family: Arial;
                    font-size: 12px;
                    margin: 0;
                    padding: 0;
                }

                .notice {
                    color: red;
                }


                /* *** LINHAS GERAIS *** */

                #container {
                    width: 666px;
                    margin: 0px auto;
                    padding-bottom: 30px;
                }

                #instructions {
                    margin: 0;
                    padding: 0 0 20px 0;
                }

                #boleto {
                    width: 666px;
                    margin: 0;
                    padding: 0;
                }


                /* *** CABECALHO *** */

                #instr_header {
                    background: url('<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logo_empresa.png') no-repeat top left;
                    padding-left: 160px;
                    height: 65px;
                }

                #instr_header h1 {
                    font-size: 16px;
                    margin: 5px 0px;
                }

                #instr_header address {
                    font-style: normal;
                }

                #instr_content {

                }

                #instr_content h2 {
                    font-size: 10px;
                    font-weight: bold;
                }

                #instr_content p {
                    font-size: 10px;
                    margin: 4px 0px;
                }

                #instr_content ol {
                    font-size: 10px;
                    margin: 5px 0;
                }

                #instr_content ol li {
                    font-size: 10px;
                    text-indent: 10px;
                    margin: 2px 0px;
                    list-style-position: inside;
                }

                #instr_content ol li p {
                    font-size: 10px;
                    padding-bottom: 4px;
                }


                /* *** BOLETO *** */

                #boleto .cut {
                    width: 666px;
                    margin: 0px auto;
                    border-bottom: 1px navy dashed;
                }

                #boleto .cut p {
                    margin: 0 0 5px 0;
                    padding: 0px;
                    font-family: 'Arial Narrow';
                    font-size: 9px;
                    color: navy;
                }

                table.header {
                    width: 666px;
                    height: 38px;
                    margin-top: 20px;
                    margin-bottom: 10px;
                    border-bottom: 2px navy solid;

                }


                table.header div.field_cod_banco {
                    width: 46px;
                    height: 19px;
                    margin-left: 5px;
                    padding-top: 3px;
                    text-align: center;
                    font-size: 14px;
                    font-weight: bold;
                    color: navy;
                    border-right: 2px solid navy;
                    border-left: 2px solid navy;
                }

                table.header td.linha_digitavel {
                    width: 464px;
                    text-align: right;
                    font: bold 15px Arial; 
                    color: navy
                }

                table.line {
                    margin-bottom: 3px;
                    padding-bottom: 1px;
                    border-bottom: 1px black solid;
                }

                table.line tr.titulos td {
                    height: 13px;
                    font-family: 'Arial Narrow';
                    font-size: 9px;
                    color: navy;
                    border-left: 5px #ffe000 solid;
                    padding-left: 2px;
                }

                table.line tr.campos td {
                    height: 12px;
                    font-size: 10px;
                    color: black;
                    border-left: 5px #ffe000 solid;
                    padding-left: 2px;
                }

                table.line td p {
                    font-size: 10px;
                }


                table.line tr.campos td.ag_cod_cedente,
                table.line tr.campos td.nosso_numero,
                table.line tr.campos td.valor_doc,
                table.line tr.campos td.vencimento2,
                table.line tr.campos td.ag_cod_cedente2,
                table.line tr.campos td.nosso_numero2,
                table.line tr.campos td.xvalor,
                table.line tr.campos td.valor_doc2
                {
                    text-align: right;
                }

                table.line tr.campos td.especie,
                table.line tr.campos td.qtd,
                table.line tr.campos td.vencimento,
                table.line tr.campos td.especie_doc,
                table.line tr.campos td.aceite,
                table.line tr.campos td.carteira,
                table.line tr.campos td.especie2,
                table.line tr.campos td.qtd2
                {
                    text-align: center;
                }

                table.line td.last_line {
                    vertical-align: top;
                    height: 25px;
                }

                table.line td.last_line table.line {
                    margin-bottom: -5px;
                    border: 0 white none;
                }

                td.last_line table.line td.instrucoes {
                    border-left: 0 white none;
                    padding-left: 5px;
                    padding-bottom: 0;
                    margin-bottom: 0;
                    height: 20px;
                    vertical-align: top;
                }

                table.line td.cedente {
                    width: 298px;
                }

                table.line td.valor_cobrado2 {
                    padding-bottom: 0;
                    margin-bottom: 0;
                }


                table.line td.ag_cod_cedente {
                    width: 126px;
                }

                table.line td.especie {
                    width: 35px;
                }

                table.line td.qtd {
                    width: 53px;
                }

                table.line td.nosso_numero {
                    /* width: 120px; */
                    width: 115px;
                    padding-right: 5px;
                }

                table.line td.num_doc {
                    width: 113px;
                }

                table.line td.contrato {
                    width: 72px;
                }

                table.line td.cpf_cei_cnpj {
                    width: 132px;
                }

                table.line td.vencimento {
                    width: 134px;
                }

                table.line td.valor_doc {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.desconto {
                    width: 113px;
                }

                table.line td.outras_deducoes {
                    width: 112px;
                }

                table.line td.mora_multa {
                    width: 113px;
                }

                table.line td.outros_acrescimos {
                    width: 113px;
                }

                table.line td.valor_cobrado {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                    background-color: #ffc ;
                }

                table.line td.sacado {
                    width: 659px;
                }

                table.line td.local_pagto {
                    width: 472px;
                }

                table.line td.vencimento2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                    background-color: #ffc;
                }

                table.line td.cedente2 {
                    width: 472px;
                }

                table.line td.ag_cod_cedente2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.data_doc {
                    width: 93px;
                }

                table.line td.num_doc2 {
                    width: 173px;
                }

                table.line td.especie_doc {
                    width: 72px;
                }

                table.line td.aceite {
                    width: 34px;
                }

                table.line td.data_process {
                    width: 72px;
                }

                table.line td.nosso_numero2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.reservado {
                    width: 93px;
                    background-color: #ffc;
                }

                table.line td.carteira {
                    width: 93px;
                }

                table.line td.especie2 {
                    width: 53px;
                }

                table.line td.qtd2 {
                    width: 133px;
                }

                table.line td.xvalor {
                    /* width: 72px; */
                    width: 67px;
                    padding-right: 5px;
                }

                table.line td.valor_doc2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }
                table.line td.instrucoes {
                    width: 475px;
                }

                table.line td.desconto2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.outras_deducoes2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.mora_multa2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.outros_acrescimos2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                }

                table.line td.valor_cobrado2 {
                    /* width: 180px; */
                    width: 175px;
                    padding-right: 5px;
                    background-color: #ffc ;
                }

                table.line td.sacado2 {
                    width: 659px;
                }

                table.line td.sacador_avalista {
                    width: 659px;
                }

                table.line tr.campos td.sacador_avalista {
                    width: 472px;
                }

                table.line td.cod_baixa {
                    color: navy;
                    width: 180px;
                }

                div.footer {
                    margin-bottom: 30px;
                }

                div.footer p {
                    width: 88px;
                    margin: 0;
                    padding: 0;
                    padding-left: 525px;
                    font-family: 'Arial Narro';
                    font-size: 9px;
                    color: navy;
                }


                div.barcode {
                    width: 666px;
                    margin-bottom: 20px;
                }

            }



            @media print {

                #instructions {
                    height: 1px;
                    visibility: hidden;
                    overflow: hidden;
                }

            }

        </STYLE>

    </head>
<body>

    <div id="container">
        <!--
                <div id="instr_header">
                    <h1><?php echo $dadosboleto["identificacao"]; ?> <?php echo isset($dadosboleto["cpf_cnpj"]) ? $dadosboleto["cpf_cnpj"] : '' ?></h1>
                    <address><?php echo $dadosboleto["endereco"]; ?><br></address>
                    <address><?php echo $dadosboleto["cidade_uf"]; ?></address>
                </div>	-->

        <div id="">
            <!--
              Use no lugar do <div id=""> caso queira imprimir sem o logotipo e instru��es
              <div id="instructions">
            -->

            <div id="instr_content">
                <p>
                    O pagamento deste boleto tamb&eacute;m poder&aacute; ser efetuado 
                    nos terminais de Auto-Atendimento BB.
                </p>

                <h2>Instru&ccedil;&otilde;es</h2>
                <ol>
                    <li>
                        Imprima em impressora jato de tinta (ink jet) ou laser, em 
                        qualidade normal ou alta. N&atilde;o use modo econ&ocirc;mico. 
                        <p class="notice">Por favor, configure margens esquerda e direita
                            para 17mm.</p>
                    </li>
                    <li>
                        Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens
                        m&iacute;nimas &agrave; esquerda e &agrave; direita do 
                        formul&aacute;rio.
                    </li>
                    <li>
                        Corte na linha indicada. N&atilde;o rasure, risque, fure ou dobre 
                        a regi&atilde;o onde se encontra o c&oacute;digo de barras
                    </li>
                </ol>
            </div>	<!-- id="instr_content" -->
        </div>	<!-- id="instructions" -->

        <div id="boleto">
            <div class="cut">
                <p>Corte na linha pontilhada</p>
            </div>
            <table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD class=ct width=666><div align=right><b class=cp>Recibo
                                    do Sacado</b></div></TD></tr></tbody></table>
            <table class="header" border=0 cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td width=150><IMG SRC="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logobb.jpg"></td>
                        <td width=50>
                            <div class="field_cod_banco"><?php echo $dadosboleto["codigo_banco_com_dv"] ?></div>
                        </td>
                        <td class="linha_digitavel"><?php echo $dadosboleto["linha_digitavel"] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="cedente">Cedente</TD>
                        <td class="ag_cod_cedente">Ag&ecirc;ncia / C&oacute;digo do Cedente</td>
                        <td class="especie">Esp&eacute;cie</TD>
                        <td class="qtd">Quantidade</TD>
                        <td class="nosso_numero">Nosso n&uacute;mero</td>
                    </tr>

                    <tr class="campos">
                        <td class="cedente"><?php echo $dadosboleto["cedente"]; ?>&nbsp;</td>
                        <td class="ag_cod_cedente"><?php echo $dadosboleto["agencia_codigo"] ?> &nbsp;</td>
                        <td class="especie"><?php echo $dadosboleto["especie"] ?>&nbsp;</td>
                        <TD class="qtd"><?php echo $dadosboleto["quantidade"] ?>&nbsp;</td>
                        <TD class="nosso_numero"><?php echo $dadosboleto["nosso_numero"] ?>&nbsp;</td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellPadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="num_doc">N&uacute;mero do documento</td>
                        <td class="contrato">Contrato</TD>
                        <td class="cpf_cei_cnpj">CPF/CEI/CNPJ</TD>
                        <td class="vencmento">Vencimento</TD>
                        <td class="valor_doc">Valor documento</TD>
                    </tr>
                    <tr class="campos">
                        <td class="num_doc"><?php echo $dadosboleto["numero_documento"] ?></td>
                        <td class="contrato"><?php echo $dadosboleto["contrato"] ?></td>
                        <td class="cpf_cei_cnpj"><?php echo $dadosboleto["cpf_cnpj"] ?></td>
                        <td class="vencimento"><?php echo $dadosboleto["data_vencimento"] ?></td>
                        <td class="valor_doc"><?php echo $dadosboleto["valor_boleto"] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellPadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="desconto">(-) Desconto / Abatimento</td>
                        <td class="outras_deducoes">(-) Outras dedu&ccedil;&otilde;es</td>
                        <td class="mora_multa">(+) Mora / Multa</td>
                        <td class="outros_acrescimos">(+) Outros acr&eacute;scimos</td>
                        <td class="valor_cobrado">(=) Valor cobrado</td>
                    </tr>
                    <tr class="campos">
                        <td class="desconto">&nbsp;</td>
                        <td class="outras_deducoes">&nbsp;</td>
                        <td class="mora_multa">&nbsp;</td>
                        <td class="outros_acrescimos">&nbsp;</td>
                        <td class="valor_cobrado">&nbsp;</td>
                    </tr>
                </tbody>
            </table>


            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="sacado">Sacado</td>
                    </tr>
                    <tr class="campos">
                        <td class="sacado"><?php echo $dadosboleto["sacado"] ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="footer">
                <p>Autentica&ccedil;&atilde;o mec&acirc;nica</p>
            </div>



            <div class="cut">
                <p>Corte na linha pontilhada</p>
            </div>


            <table class="header" border=0 cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td width=150><IMG SRC="<?php echo $this->baseUrl ?>/library/Includes/boletophp/imagens/logobb.jpg"></td>
                        <td width=50>
                            <div class="field_cod_banco"><?php echo $dadosboleto["codigo_banco_com_dv"] ?></div>
                        </td>
                        <td class="linha_digitavel"><?php echo $dadosboleto["linha_digitavel"] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="local_pagto">Local de pagamento</td>
                        <td class="vencimento2">Vencimento</td>
                    </tr>
                    <tr class="campos">
                        <td class="local_pagto">QUALQUER BANCO AT&Eacute; O VENCIMENTO</td>
                        <td class="vencimento2"><?php echo $dadosboleto["data_vencimento"] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="cedente2">Cedente</td>
                        <td class="ag_cod_cedente2">Ag&ecirc;ncia/C&oacute;digo cedente</td>
                    </tr>
                    <tr class="campos">
                        <td class="cedente2"><?php echo $dadosboleto["cedente"] ?></td>
                        <td class="ag_cod_cedente2"><?php echo $dadosboleto["agencia_codigo"] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="data_doc">Data do documento</td>
                        <td class="num_doc2">No. documento</td>
                        <td class="especie_doc">Esp&eacute;cie doc.</td>
                        <td class="aceite">Aceite</td>
                        <td class="data_process">Data process.</td>
                        <td class="nosso_numero2">Nosso n&uacute;mero</td>
                    </tr>
                    <tr class="campos">
                        <td class="data_doc"><?php echo $dadosboleto["data_documento"] ?></td>
                        <td class="num_doc2"><?php echo $dadosboleto["numero_documento"] ?></td>
                        <td class="especie_doc"><?php echo $dadosboleto["especie_doc"] ?></td>
                        <td class="aceite"><?php echo $dadosboleto["aceite"] ?></td>
                        <td class="data_process"><?php echo $dadosboleto["data_processamento"] ?></td>
                        <td class="nosso_numero2"><?php echo $dadosboleto["nosso_numero"] ?></td>
                    </tr>
                </tbody>
            </table>

            <table class="line" cellspacing="0" cellPadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="reservado">Uso do  banco</td>
                        <td class="carteira">Carteira</td>
                        <td class="especie2">Esp�cie</td>
                        <td class="qtd2">Quantidade</td>
                        <td class="xvalor">x Valor</td>
                        <td class="valor_doc2">(=) Valor documento</td>
                    </tr>
                    <tr class="campos">
                        <td class="reservado">&nbsp;</td>
                        <td class="carteira"><?php echo $dadosboleto["carteira"] ?> <?php echo isset($dadosboleto["variacao_carteira"]) ? $dadosboleto["variacao_carteira"] : '&nbsp;' ?></td>
                        <td class="especie2"><?php echo $dadosboleto["especie"] ?></td>
                        <td class="qtd2"><?php echo $dadosboleto["quantidade"] ?></td>
                        <td class="xvalor"><?php echo $dadosboleto["valor_unitario"] ?></td>
                        <td class="valor_doc2"><?php echo $dadosboleto["valor_boleto"] ?></td>
                    </tr>
                </tbody>
            </table>


            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr><td class="last_line" rowspan="6">
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="instrucoes">
                                            Instru&ccedil;&otilde;es (Texto de responsabilidade do cedente)
                                        </td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="instrucoes" rowspan="5">
                                            <p><?php echo $dadosboleto["demonstrativo1"]; ?></p>		
                                            <p><?php echo $dadosboleto["demonstrativo2"]; ?></p>
                                            <p><?php echo $dadosboleto["demonstrativo3"]; ?></p>
                                            <p><?php echo $dadosboleto["instrucoes1"]; ?></p>
                                            <p><?php echo $dadosboleto["instrucoes2"]; ?></p>
                                            <p><?php echo $dadosboleto["instrucoes3"]; ?></p>
                                            <p><?php echo $dadosboleto["instrucoes4"]; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td>
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="desconto2">(-) Desconto / Abatimento</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="desconto2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td>
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="outras_deducoes2">(-) Outras dedu&ccedil;&otilde;es</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="outras_deducoes2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td>
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="mora_multa2">(+) Mora / Multa</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="mora_multa2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td>
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="outros_acrescimos2">(+) Outros Acr&eacute;scimos</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="outros_acrescimos2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>

                    <tr><td class="last_line">
                            <table class="line" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="titulos">
                                        <td class="valor_cobrado2">(=) Valor cobrado</td>
                                    </tr>
                                    <tr class="campos">
                                        <td class="valor_cobrado2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr>
                </tbody>
            </table>


            <table class="line" cellspacing="0" cellPadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="sacado2">Sacado</td>
                    </tr>
                    <tr class="campos">
                        <td class="sacado2">
                            <p><?php echo $dadosboleto["sacado"] ?></p>
                            <p><?php echo $dadosboleto["endereco1"] ?></p>
                            <p><?php echo $dadosboleto["endereco2"] ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>		

            <table class="line" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr class="titulos">
                        <td class="sacador_avalista" colspan="2">Sacador/Avalista</td>
                    </tr>
                    <tr class="campos">
                        <td class="sacador_avalista">&nbsp;</td>
                        <td class="cod_baixa">C&oacute;d. baixa</td>
                    </tr>
                </tbody>
            </table>		
            <table cellspacing=0 cellpadding=0 width=666 border=0><TBODY><TR><TD width=666 align=right ><font style="font-size: 10px;">Autentica&ccedil;&atilde;o mec&acirc;nica - Ficha de Compensa��o</font></TD></tr></tbody></table>
            <div class="barcode">
                <p><?php fbarcode($dadosboleto["codigo_barras"], $this->baseUrl); ?></p>
            </div>
            <div class="cut">
                <p>Corte na linha pontilhada</p>
            </div>

        </div>

    </div>

</body>

</html>

