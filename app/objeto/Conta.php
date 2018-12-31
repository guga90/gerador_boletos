<?php

/**
 * @primary conta_id
 * @table conta
 */
class Conta extends AbstractObjeto {

    private $contaId;
    private $cedenteNomerazao;
    private $cedenteId;
    private $contaNome;
    private $contaNumerodigito;
    private $contaNumero;
    private $contaAgencia;
    private $contaAgenciadigito;
    private $contaCarteira;
    private $contaStatus;
    private $contaObscaixa;
    private $contaContrato;
    private $contaConvenio;
    private $bancoId;
    private $bancoCodigo;
    private $bancoNome;
    private $contaTaxajurosmes;
    private $contaTaxamulta;
    private $contaTaxadesconto;
    private $contaDiasprotesto;

    public function __construct($dados = null) {

        if (!empty($dados)) {
            $this->setData($dados);
        }
    }

    function getContaId() {
        return $this->contaId;
    }

    function getCedenteNomerazao() {
        return $this->cedenteNomerazao;
    }

    function getCedenteId() {
        return $this->cedenteId;
    }

    function getContaNome() {
        return $this->contaNome;
    }

    function getContaNumerodigito() {
        return $this->contaNumerodigito;
    }

    function getContaNumero() {
        return $this->contaNumero;
    }

    function getContaAgencia() {
        return $this->contaAgencia;
    }

    function getContaAgenciadigito() {
        return $this->contaAgenciadigito;
    }

    function getContaCarteira() {
        return $this->contaCarteira;
    }

    function getContaStatus() {
        return $this->contaStatus;
    }

    function getContaObscaixa() {
        return $this->contaObscaixa;
    }

    function getContaContrato() {
        return $this->contaContrato;
    }

    function getContaConvenio() {
        return $this->contaConvenio;
    }

    function getBancoId() {
        return $this->bancoId;
    }

    function getBancoNome() {
        return $this->bancoNome;
    }

    function getContaTaxajurosmes() {
        return $this->contaTaxajurosmes;
    }

    function getContaTaxamulta() {
        return $this->contaTaxamulta;
    }

    function getContaTaxadesconto() {
        return $this->contaTaxadesconto;
    }

    function getContaDiasprotesto() {
        return $this->contaDiasprotesto;
    }

    function setContaId($contaId) {
        $this->contaId = $contaId;
    }

    function setCedenteNomerazao($cedenteNomerazao) {
        $this->cedenteNomerazao = $cedenteNomerazao;
    }

    function setCedenteId($cedenteId) {
        $this->cedenteId = $cedenteId;
    }

    function setContaNome($contaNome) {
        $this->contaNome = $contaNome;
    }

    function setContaNumerodigito($contaNumerodigito) {
        $this->contaNumerodigito = $contaNumerodigito;
    }

    function setContaNumero($contaNumero) {
        $this->contaNumero = $contaNumero;
    }

    function setContaAgencia($contaAgencia) {
        $this->contaAgencia = $contaAgencia;
    }

    function setContaAgenciadigito($contaAgenciadigito) {
        $this->contaAgenciadigito = $contaAgenciadigito;
    }

    function setContaCarteira($contaCarteira) {
        $this->contaCarteira = $contaCarteira;
    }

    function setContaStatus($contaStatus) {
        $this->contaStatus = $contaStatus;
    }

    function setContaObscaixa($contaObscaixa) {
        $this->contaObscaixa = $contaObscaixa;
    }

    function setContaContrato($contaContrato) {
        $this->contaContrato = $contaContrato;
    }

    function setContaConvenio($contaConvenio) {
        $this->contaConvenio = $contaConvenio;
    }

    function setBancoId($bancoId) {
        $this->bancoId = $bancoId;
    }

    function setBancoNome($bancoNome) {
        $this->bancoNome = $bancoNome;
    }

    function setContaTaxajurosmes($contaTaxajurosmes) {
        $this->contaTaxajurosmes = $contaTaxajurosmes;
    }

    function setContaTaxamulta($contaTaxamulta) {
        $this->contaTaxamulta = $contaTaxamulta;
    }

    function setContaTaxadesconto($contaTaxadesconto) {
        $this->contaTaxadesconto = $contaTaxadesconto;
    }

    function setContaDiasprotesto($contaDiasprotesto) {
        $this->contaDiasprotesto = $contaDiasprotesto;
    }

    function getBancoCodigo() {
        return $this->bancoCodigo;
    }

    function setBancoCodigo($bancoCodigo) {
        $this->bancoCodigo = $bancoCodigo;
    }

}
