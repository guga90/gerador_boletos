<?php

class CedenteControle extends AbstractControle {

    private $cedentePersistencia;

    public function init() {
        $this->cedentePersistencia = new CedentePersistencia();
    }

    public function indexAction() {
        $this->cedentes = $this->cedentePersistencia->listar(new Cedente());
    }

    public function salvarAction($params) {

        $this->setNoRender = true;

        try {

            $cedente = new Cedente($params);
            $this->cedentePersistencia->persistir($cedente);
            $retorno = array('tipo' => 'Sucesso', 'msg' => 'Relizado com sucesso.');
            
        } catch (Exception $e) {
            $retorno = array('tipo' => 'Erro', 'msg' => 'Erro: ' . $e->getMessage());
        }

        echo json_encode($retorno);
    }

    public function novoAction($params) {

        $cedente = new Cedente();

        if (!empty($params['id'])) {
            $cedente = $this->cedentePersistencia->consultar(new Cedente(), $params['id']);
        }

        $this->cedente = $cedente;
    }

}
