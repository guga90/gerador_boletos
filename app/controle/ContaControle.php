<?php

class ContaControle extends AbstractControle {

    private $contaPersistencia;

    public function init() {
        $this->contaPersistencia = new ContaPersistencia();
    }

    public function indexAction() {
        $this->contas = $this->contaPersistencia->listarComCedenteAtivo(new Conta());
    }

    public function salvarAction($params) {

        $this->setNoRender = true;

        try {

            $conta = new Conta($params);            
            $this->contaPersistencia->persistir($conta);
            $retorno = array('tipo' => 'Sucesso', 'msg' => 'Relizado com sucesso.');
        } catch (Exception $e) {
            $retorno = array('tipo' => 'Erro', 'msg' => 'Erro: ' . $e->getMessage());
        }

        echo json_encode($retorno);
    }

    public function novoAction($params) {

        $cedentePersistencia = new CedentePersistencia();
        $bancoPersistencia = new BancoPersistencia();
        $this->cedentes = $cedentePersistencia->listarAtivos();
        $this->bancos = $bancoPersistencia->listar(new Banco());
        $conta = new Conta();

        if (!empty($params['id'])) {
            $conta = $this->contaPersistencia->consultarComCedente($params['id']);
        }

        $this->conta = $conta;
    }

}
