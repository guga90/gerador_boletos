<?php

class SacadoControle extends AbstractControle {

    private $sacadoPersistencia;

    public function init() {
        $this->sacadoPersistencia = new SacadoPersistencia();
    }

    public function indexAction() {
        $this->sacados = $this->sacadoPersistencia->listar(new Sacado());
    }

    public function salvarAction($params) {

        $this->setNoRender = true;

        try {

            $sacado = new Sacado($params);
            $this->sacadoPersistencia->persistir($sacado);
            $retorno = array('tipo' => 'Sucesso', 'msg' => 'Relizado com sucesso.');
            
        } catch (Exception $e) {
            $retorno = array('tipo' => 'Erro', 'msg' => 'Erro: ' . $e->getMessage());
        }

        echo json_encode($retorno);
    }

    public function novoAction($params) {

        $sacado = new Sacado();

        if (!empty($params['id'])) {
            $sacado = $this->sacadoPersistencia->consultar(new Sacado(), $params['id']);
        }

        $this->sacado = $sacado;
    }

}
