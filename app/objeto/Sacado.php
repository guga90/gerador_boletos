<?php

/**
 * @primary sacado_id
 * @table sacado
 */
class Sacado extends AbstractObjeto {

    private $sacadoId;
    private $sacadoNomerazao;
    private $sacadoCpfcnpj;
    private $sacadoTelefone;
    private $sacadoEmail;
    private $sacadoCep;
    private $sacadoLogradouro;
    private $sacadoStatus;
    private $sacadoSetor;
    private $sacadoEstado;
    private $sacadoTipopessoa;
    private $sacadoCidade;

    public function __construct($dados = null) {

        if (!empty($dados)) {
            $this->setData($dados);
        }
    }

    function getSacadoId() {
        return $this->sacadoId;
    }

    function getSacadoNomerazao() {
        return $this->sacadoNomerazao;
    }

    function getSacadoCpfcnpj() {
        return $this->sacadoCpfcnpj;
    }

    function getSacadoTelefone() {
        return $this->sacadoTelefone;
    }

    function getSacadoEmail() {
        return $this->sacadoEmail;
    }

    function getSacadoCep() {
        return $this->sacadoCep;
    }

    function getSacadoLogradouro() {
        return $this->sacadoLogradouro;
    }

    function getSacadoStatus() {
        return $this->sacadoStatus;
    }

    function getSacadoSetor() {
        return $this->sacadoSetor;
    }

    function getSacadoEstado() {
        return $this->sacadoEstado;
    }

    function getSacadoCidade() {
        return $this->sacadoCidade;
    }

    function setSacadoId($sacadoId) {
        $this->sacadoId = $sacadoId;
    }

    function setSacadoNomerazao($sacadoNomerazao) {
        $this->sacadoNomerazao = $sacadoNomerazao;
    }

    function setSacadoCpfcnpj($sacadoCpfcnpj) {
        $this->sacadoCpfcnpj = $sacadoCpfcnpj;
    }

    function setSacadoTelefone($sacadoTelefone) {
        $this->sacadoTelefone = $sacadoTelefone;
    }

    function setSacadoEmail($sacadoEmail) {
        $this->sacadoEmail = $sacadoEmail;
    }

    function setSacadoCep($sacadoCep) {
        $this->sacadoCep = $sacadoCep;
    }

    function setSacadoLogradouro($sacadoLogradouro) {
        $this->sacadoLogradouro = $sacadoLogradouro;
    }

    function setSacadoStatus($sacadoStatus) {
        $this->sacadoStatus = $sacadoStatus;
    }

    function setSacadoSetor($sacadoSetor) {
        $this->sacadoSetor = $sacadoSetor;
    }

    function setSacadoEstado($sacadoEstado) {
        $this->sacadoEstado = $sacadoEstado;
    }

    function setSacadoCidade($sacadoCidade) {
        $this->sacadoCidade = $sacadoCidade;
    }

    public function getSacadoTipopessoa() {
        return $this->sacadoTipopessoa;
    }

    public function setSacadoTipopessoa($sacadoTipopessoa) {
        $this->sacadoTipopessoa = $sacadoTipopessoa;
    }

}
