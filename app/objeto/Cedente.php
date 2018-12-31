<?php

/**
 * @primary cedente_id
 * @table cedente
 */
class Cedente extends AbstractObjeto {

    private $cedenteId;
    private $cedenteNomerazao;
    private $cedenteCpfcnpj;
    private $cedenteTelefone;
    private $cedenteEmail;
    private $cedenteCep;
    private $cedenteLogradouro;
    private $cedenteStatus;
    private $cedenteSetor;
    private $cedenteEstado;
    private $cedenteTipopessoa;
    private $cedenteCidade;

    public function __construct($dados = null) {

        if (!empty($dados)) {
            $this->setData($dados);
        }
    }

    function getCedenteId() {
        return $this->cedenteId;
    }

    function getCedenteNomerazao() {
        return $this->cedenteNomerazao;
    }

    function getCedenteCpfcnpj() {
        return $this->cedenteCpfcnpj;
    }

    function getCedenteTelefone() {
        return $this->cedenteTelefone;
    }

    function getCedenteEmail() {
        return $this->cedenteEmail;
    }

    function getCedenteCep() {
        return $this->cedenteCep;
    }

    function getCedenteLogradouro() {
        return $this->cedenteLogradouro;
    }

    function getCedenteStatus() {
        return $this->cedenteStatus;
    }

    function getCedenteSetor() {
        return $this->cedenteSetor;
    }

    function getCedenteEstado() {
        return $this->cedenteEstado;
    }

    function getCedenteCidade() {
        return $this->cedenteCidade;
    }

    function setCedenteId($cedenteId) {
        $this->cedenteId = $cedenteId;
    }

    function setCedenteNomerazao($cedenteNomerazao) {
        $this->cedenteNomerazao = $cedenteNomerazao;
    }

    function setCedenteCpfcnpj($cedenteCpfcnpj) {
        $this->cedenteCpfcnpj = $cedenteCpfcnpj;
    }

    function setCedenteTelefone($cedenteTelefone) {
        $this->cedenteTelefone = $cedenteTelefone;
    }

    function setCedenteEmail($cedenteEmail) {
        $this->cedenteEmail = $cedenteEmail;
    }

    function setCedenteCep($cedenteCep) {
        $this->cedenteCep = $cedenteCep;
    }

    function setCedenteLogradouro($cedenteLogradouro) {
        $this->cedenteLogradouro = $cedenteLogradouro;
    }

    function setCedenteStatus($cedenteStatus) {
        $this->cedenteStatus = $cedenteStatus;
    }

    function setCedenteSetor($cedenteSetor) {
        $this->cedenteSetor = $cedenteSetor;
    }

    function setCedenteEstado($cedenteEstado) {
        $this->cedenteEstado = $cedenteEstado;
    }

    function setCedenteCidade($cedenteCidade) {
        $this->cedenteCidade = $cedenteCidade;
    }

    public function getCedenteTipopessoa() {
        return $this->cedenteTipopessoa;
    }

    public function setCedenteTipopessoa($cedenteTipopessoa) {
        $this->cedenteTipopessoa = $cedenteTipopessoa;
    }

}
