<?php

class LancamentoControle extends AbstractControle {

    private $lancamentoPersistencia;

    public function init() {
        $this->lancamentoPersistencia = new LancamentoPersistencia();
    }

    public function indexAction() {
        $this->lancamentos = $this->lancamentoPersistencia->listarComCedenteSacado(new Lancamento());
    }

    public function salvarAction($params) {

        $this->setNoRender = true;

        try {

            $lancamento = new Lancamento($params);
            $lancamento->setUsuarioId($_SESSION["usuario"]->getUsuarioId());
            $lancamento->setLancamentoDthemissao(date('Y-m-d H:i:s'));
            $dataVenc = new Guga_Date($params['lancamento_dtvenc']);
            $lancamento->setLancamentoDtvenc($dataVenc->format('Y-m-d'));
            $valor = $params["lancamento_valor"];
            $lancamento->setLancamentoValor(str_replace(',', '.', str_replace(array('R$ ', '.'), '', $valor)));
            $this->lancamentoPersistencia->persistir($lancamento);
            $retorno = array('tipo' => 'Sucesso', 'msg' => 'Relizado com sucesso.');
        } catch (Exception $e) {
            $retorno = array('tipo' => 'Erro', 'msg' => 'Erro: ' . $e->getMessage());
        }

        echo json_encode($retorno);
    }

    public function novoAction($params) {

        $cedentePersistencia = new CedentePersistencia();
        $this->cedentes = $cedentePersistencia->listarAtivos();

        $sacadoPersistencia = new SacadoPersistencia();
        $this->sacados = $sacadoPersistencia->listarAtivos();

        $lancamento = new Lancamento();
        $this->contas = array();

        if (!empty($params['id'])) {
            $lancamento = $this->lancamentoPersistencia->consultar(new Lancamento(), $params['id']);
            $contaPersistencia = new ContaPersistencia();
            $this->contas = $contaPersistencia->listarDeCedenteAtivas($lancamento->getCedenteId());
        }

        $this->lancamento = $lancamento;
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

    public function imprimirboletoitauAction($params) {

        $this->layout = 'branco';

        $this->boleto = new Boleto();
        $this->boleto = $this->lancamentoPersistencia->consultarEmitirBoleto($params['cod']);
    }

    public function imprimirboletobbAction($params) {

        $this->layout = 'branco';

        $this->boleto = new Boleto();
        $this->boleto = $this->lancamentoPersistencia->consultarEmitirBoleto($params['cod']);
    }

    public function imprimirboletocefAction($params) {

        $this->layout = 'branco';

        $this->boleto = new Boleto();
        $this->boleto = $this->lancamentoPersistencia->consultarEmitirBoleto($params['cod']);
    }

    public function imprimirboletobradescoAction($params) {

        $this->layout = 'branco';

        $this->boleto = new Boleto();
        $this->boleto = $this->lancamentoPersistencia->consultarEmitirBoleto($params['cod']);
    }

    public function imprimirboletosantanderAction($params) {

        $this->layout = 'branco';

        $this->boleto = new Boleto();
        $this->boleto = $this->lancamentoPersistencia->consultarEmitirBoleto($params['cod']);
    }

}
