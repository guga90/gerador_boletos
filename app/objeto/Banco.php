<?php

/**
 * @primary banco_id
 * @table banco
 */
class Banco extends AbstractObjeto {

    private $bancoId;
    private $bancoNome;
    private $bancoCodigo;

    public function __construct($dados = null) {

        if (!empty($dados)) {
            $this->setData($dados);
        }
    }

    function getBancoId() {
        return $this->bancoId;
    }

    function getBancoNome() {
        return $this->bancoNome;
    }

    function getBancoCodigo() {
        return $this->bancoCodigo;
    }

    function setBancoId($bancoId) {
        $this->bancoId = $bancoId;
    }

    function setBancoNome($bancoNome) {
        $this->bancoNome = $bancoNome;
    }

    function setBancoCodigo($bancoCodigo) {
        $this->bancoCodigo = $bancoCodigo;
    }

}
