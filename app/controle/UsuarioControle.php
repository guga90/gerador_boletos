<?php

class UsuarioControle extends AbstractControle {

    private $usuarioPersistencia;

    public function init() {
        $this->usuarioPersistencia = new UsuarioPersistencia();
    }

    public function indexAction() {
        $this->usuarios = $this->usuarioPersistencia->listar(new Usuario());
    }

    public function salvarAction($params) {

        $this->setNoRender = true;

        try {

            $dataNasc = new Guga_Date($params['usuario_dtnasc']);
            $params['usuario_dtnasc'] = $dataNasc->format('Y-m-d');

            $usuario = new Usuario($params);
            $this->usuarioPersistencia->persistir($usuario);
            $retorno = array('tipo' => 'Sucesso', 'msg' => 'Relizado com sucesso.');
            
        } catch (Exception $e) {
            $retorno = array('tipo' => 'Erro', 'msg' => 'Erro: ' . $e->getMessage());
        }

        echo json_encode($retorno);
    }

    public function novoAction($params) {

        $usuario = new Usuario();

        if (!empty($params['id'])) {
            $usuario = $this->usuarioPersistencia->consultar(new Usuario(), $params['id']);
            $dataNasc = new Guga_Date($usuario->getUsuarioDtnasc());
            $usuario->setUsuarioDtnasc($dataNasc->format('d/m/Y'));
        }

        $this->usuario = $usuario;
    }

}
