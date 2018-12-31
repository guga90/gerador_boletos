<?php

class LoginControle extends AbstractControle {

    public $msgAlerta = '';

    public function init() {
        
    }

    public function indexAction() {

        $this->msgAlerta = empty($_SESSION['msg_alerta']) ? '' : $_SESSION['msg_alerta'];
        unset($_SESSION['msg_alerta']);
    }

    public function logoutAction() {
        session_destroy();
        header('Location:../login/index');
    }

    public function logarAction($param) {

        $usuarioPersistencia = new UsuarioPersistencia();
        $sql = "select * from usuario where usuario_cpf = '" . $param['usuario_cpf'] . "' and usuario_senha = '" . sha1($param['usuario_senha']) . "'";
        $usuario = $usuarioPersistencia->fetchRow($sql, new Usuario());

        if (!empty($usuario)) {

            Guga_Auth::setControlesPermissao(array(
                'index', 
                'cedente', 
                'conta', 
                'sacado', 
                'lancamento', 
                'remessa', 
                'usuario'));
            
            Guga_Auth::setUsuario($usuario);

            header('Location:../index/index');
        } else {
            $_SESSION['msg_alerta'] = 'Dados inválidos para o acesso!';
            header('Location:../login/index');
        }
    }

}
