<?php

class RemessaControle extends AbstractControle {

    private $remessaPersistencia;

    public function init() {
        $this->remessaPersistencia = new RemessaPersistencia();
    }

    public function indexAction() {
        $cedentePersistencia = new CedentePersistencia();
        $this->cedentes = $cedentePersistencia->listarAtivos();
    }

    public function executarAction($param) {

        $remessa = new Remessa();
        $remessa = $this->remessaPersistencia->consultarRemessa($param['conta_id']);
        $lancamentos = $this->remessaPersistencia->listarLancamentos($param['conta_id'], $param['data_inicial'], $param['data_final']);

        foreach ($lancamentos as $lancamento) {
            $remessa->addLancamentos($lancamento);
        }

        $this->gerarTxt($remessa);
    }

    public function gerarTxt(Remessa $remessa) {


        $cedenteCpfcnpj = str_replace(array('.', '-'), '', $remessa->getCedenteCpfcnpj());

        $arrLinhas = array();
        $arrLinhas[] = str_pad($remessa->getBancoCodigo(), 3, '0', STR_PAD_LEFT) .
                '0000' .
                '0' .
                str_repeat(' ', 9) .
                (strlen($cedenteCpfcnpj) == 11 ? '1' : '2') .
                str_pad($cedenteCpfcnpj, 14, '0', STR_PAD_LEFT) .
                str_repeat(' ', 20) .
                '0' .
                str_pad($remessa->getContaAgencia(), 4, '0', STR_PAD_LEFT) .
                str_repeat(' ', 1) .
                str_repeat('0', 7) .
                str_pad($remessa->getContaNumero(), 5, '0', STR_PAD_LEFT) .
                str_repeat(' ', 1) .
                str_pad($remessa->getContaNumerodigito(), 1, '0', STR_PAD_LEFT) .
                str_pad($remessa->getCedenteNomerazao(), 30, ' ', STR_PAD_RIGHT) .
                str_pad($remessa->getBancoNome(), 30, ' ', STR_PAD_RIGHT) .
                str_repeat(' ', 10) .
                str_repeat('1', 1) .
                date('dmYHis') .
                str_repeat('0', 6) .
                '040' .
                str_repeat('0', 5) .
                str_repeat(' ', 54) .
                str_repeat('0', 3) .
                str_repeat(' ', 12);

        $arrLinhas[] = str_pad($remessa->getBancoCodigo(), 3, '0', STR_PAD_LEFT) .
                '0000' .
                '0' .
                'R' .
                '01' .
                str_repeat('0', 2) .
                '030' .
                str_repeat(' ', 1) .
                (strlen($cedenteCpfcnpj) == 11 ? '1' : '2') .
                str_pad($cedenteCpfcnpj, 15, '0', STR_PAD_LEFT) .
                str_repeat(' ', 20) .
                '0' .
                str_pad($remessa->getContaAgencia(), 4, '0', STR_PAD_LEFT) .
                str_repeat(' ', 1) .
                str_repeat('0', 7) .
                str_pad($remessa->getContaNumero(), 5, '0', STR_PAD_LEFT) .
                str_repeat(' ', 1) .
                str_pad($remessa->getContaNumerodigito(), 1, '0', STR_PAD_LEFT) .
                str_pad($remessa->getCedenteNomerazao(), 30, ' ', STR_PAD_RIGHT) .
                str_repeat(' ', 80) .
                str_repeat('0', 8) . //numero sequencial do arquivo de retorno
                date('dmY') . //data de gravacao 
                '00000000' . //data de credito 
                str_repeat(' ', 33);


        $seqRegistro = 1;
        foreach ($remessa->getLancamentos() as $lancamento) {

            $davNossoNumero = $this->modulo_10(
                    str_pad($remessa->getContaAgencia(), 4, '0', STR_PAD_LEFT) .
                    str_pad($remessa->getContaNumero(), 5, '0', STR_PAD_LEFT) .
                    str_pad($remessa->getContaCarteira(), 3, '0', STR_PAD_LEFT) .
                    str_pad($lancamento->getLancamentoId(), 8, '0', STR_PAD_LEFT));

            $dataVencimento = new Guga_Date($lancamento->getLancamentoDtvenc());
            $dataEmissao = new Guga_Date($lancamento->getLancamentoDthemissao());


            $arrLinhas[] = str_pad($remessa->getBancoCodigo(), 3, '0', STR_PAD_LEFT) .
                    '0001' . //Conferir
                    '3' .
                    str_pad($seqRegistro, 5, '0', STR_PAD_LEFT) .
                    'P' .
                    str_repeat(' ', 1) .
                    '01' . //Remessa
                    str_repeat('0', 1) .
                    str_repeat('0', 1) .
                    str_pad($remessa->getContaAgencia(), 4, '0', STR_PAD_LEFT) .
                    str_repeat(' ', 1) .
                    str_repeat('0', 7) .
                    str_pad($remessa->getContaNumero(), 5, '0', STR_PAD_LEFT) .
                    str_repeat(' ', 1) .
                    str_pad($remessa->getContaNumerodigito(), 1, '0', STR_PAD_LEFT) .
                    str_pad($remessa->getContaCarteira(), 3, '0', STR_PAD_LEFT) .
                    str_pad($lancamento->getLancamentoId(), 8, '0', STR_PAD_LEFT) .
                    $davNossoNumero .
                    str_repeat(' ', 8) .
                    str_repeat('0', 5) .
                    str_pad($lancamento->getLancamentoId(), 10, '0', STR_PAD_LEFT) .
                    str_repeat(' ', 5) .
                    $dataVencimento->format('dmY') .
                    str_pad(number_format($lancamento->getLancamentoValor(), 2, '', ''), 15, '0', STR_PAD_LEFT) .
                    str_repeat('0', 5) .
                    str_repeat('0', 1) .
                    '01' .
                    'N' .
                    $dataEmissao->format('dmY') .
                    str_repeat('0', 1) .
                    $dataVencimento->format('dmY') .
                    str_repeat('0', 15) .
                    str_repeat('0', 1) .
                    str_repeat('0', 8) . //Data primeiro desconto
                    str_repeat('0', 15) . //Valor para primeiro desconto
                    str_repeat('0', 15) . //Valor IOF
                    str_repeat('0', 15) . //Valor abatimento                    
                    str_repeat('', 25) . //De uso da empresa
                    '2' . //Se deve protestar dias úteis
                    str_pad($remessa->getContaDiasprotesto(), 2, '0', STR_PAD_LEFT) .
                    '2' . //Baixa em 365 dias
                    '00' .
                    str_repeat('0', 13) .
                    str_repeat(' ', 1);
            
            $seqRegistro++;
        }


        Guga_Debug::dump($arrLinhas);
        exit;


        // $remessa->
    }

    private function modulo_10($num) {
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

    public function listarContasCedenteAction($params) {

        $this->setNoRender = true;
        $json = false;

        $contaPersistencia = new ContaPersistencia();
        if (!empty($params['cedente_id'])) {
            $contas = $contaPersistencia->listarDeCedenteAtivas($params['cedente_id']);
            if (!empty($contas)) {
                $json[] = array('id' => '', 'label' => '');
                foreach ($contas as $conta) {
                    $json[] = array('id' => $conta->getContaId(), 'label' => $conta->getContaNome());
                }
            }
        }
        echo json_encode($json);
    }

}
