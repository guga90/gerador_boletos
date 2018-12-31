<?php

class Remessa extends AbstractObjeto {

    private $contaId;
    private $usuarioId;
    private $cedenteId;
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
    private $cedenteNomerazao;
    private $contaNome;
    private $contaBanco;
    private $contaMoeda;
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
    private $bancoNome;
    private $bancoCodigo;
    private $contaTaxajurosmes;
    private $contaTaxamulta;
    private $contaTaxadesconto;
    private $contaDiasprotesto;
    private $lancamentos = array();

    public function __construct($dados = null) {

        if (!empty($dados)) {
            $this->setData($dados);
        }
    }

    public function getContaId() {
        return $this->contaId;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getCedenteId() {
        return $this->cedenteId;
    }

    public function getCedenteCpfcnpj() {
        return $this->cedenteCpfcnpj;
    }

    public function getCedenteTelefone() {
        return $this->cedenteTelefone;
    }

    public function getCedenteEmail() {
        return $this->cedenteEmail;
    }

    public function getCedenteCep() {
        return $this->cedenteCep;
    }

    public function getCedenteLogradouro() {
        return $this->cedenteLogradouro;
    }

    public function getCedenteStatus() {
        return $this->cedenteStatus;
    }

    public function getCedenteSetor() {
        return $this->cedenteSetor;
    }

    public function getCedenteEstado() {
        return $this->cedenteEstado;
    }

    public function getCedenteTipopessoa() {
        return $this->cedenteTipopessoa;
    }

    public function getCedenteCidade() {
        return $this->cedenteCidade;
    }

    public function getCedenteNomerazao() {
        return $this->cedenteNomerazao;
    }

    public function getContaNome() {
        return $this->contaNome;
    }

    public function getContaBanco() {
        return $this->contaBanco;
    }

    public function getContaMoeda() {
        return $this->contaMoeda;
    }

    public function getContaNumerodigito() {
        return $this->contaNumerodigito;
    }

    public function getContaNumero() {
        return $this->contaNumero;
    }

    public function getContaAgencia() {
        return $this->contaAgencia;
    }

    public function getContaAgenciadigito() {
        return $this->contaAgenciadigito;
    }

    public function getContaCarteira() {
        return $this->contaCarteira;
    }

    public function getContaStatus() {
        return $this->contaStatus;
    }

    public function getContaObscaixa() {
        return $this->contaObscaixa;
    }

    public function getContaContrato() {
        return $this->contaContrato;
    }

    public function getContaConvenio() {
        return $this->contaConvenio;
    }

    public function getBancoId() {
        return $this->bancoId;
    }

    public function getBancoNome() {
        return $this->bancoNome;
    }

    public function getBancoCodigo() {
        return $this->bancoCodigo;
    }

    public function getContaTaxajurosmes() {
        return $this->contaTaxajurosmes;
    }

    public function getContaTaxamulta() {
        return $this->contaTaxamulta;
    }

    public function getContaTaxadesconto() {
        return $this->contaTaxadesconto;
    }

    public function getContaDiasprotesto() {
        return $this->contaDiasprotesto;
    }

    public function setContaId($contaId) {
        $this->contaId = $contaId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setCedenteId($cedenteId) {
        $this->cedenteId = $cedenteId;
    }

    public function setCedenteCpfcnpj($cedenteCpfcnpj) {
        $this->cedenteCpfcnpj = $cedenteCpfcnpj;
    }

    public function setCedenteTelefone($cedenteTelefone) {
        $this->cedenteTelefone = $cedenteTelefone;
    }

    public function setCedenteEmail($cedenteEmail) {
        $this->cedenteEmail = $cedenteEmail;
    }

    public function setCedenteCep($cedenteCep) {
        $this->cedenteCep = $cedenteCep;
    }

    public function setCedenteLogradouro($cedenteLogradouro) {
        $this->cedenteLogradouro = $cedenteLogradouro;
    }

    public function setCedenteStatus($cedenteStatus) {
        $this->cedenteStatus = $cedenteStatus;
    }

    public function setCedenteSetor($cedenteSetor) {
        $this->cedenteSetor = $cedenteSetor;
    }

    public function setCedenteEstado($cedenteEstado) {
        $this->cedenteEstado = $cedenteEstado;
    }

    public function setCedenteTipopessoa($cedenteTipopessoa) {
        $this->cedenteTipopessoa = $cedenteTipopessoa;
    }

    public function setCedenteCidade($cedenteCidade) {
        $this->cedenteCidade = $cedenteCidade;
    }

    public function setCedenteNomerazao($cedenteNomerazao) {
        $this->cedenteNomerazao = $cedenteNomerazao;
    }

    public function setContaNome($contaNome) {
        $this->contaNome = $contaNome;
    }

    public function setContaBanco($contaBanco) {
        $this->contaBanco = $contaBanco;
    }

    public function setContaMoeda($contaMoeda) {
        $this->contaMoeda = $contaMoeda;
    }

    public function setContaNumerodigito($contaNumerodigito) {
        $this->contaNumerodigito = $contaNumerodigito;
    }

    public function setContaNumero($contaNumero) {
        $this->contaNumero = $contaNumero;
    }

    public function setContaAgencia($contaAgencia) {
        $this->contaAgencia = $contaAgencia;
    }

    public function setContaAgenciadigito($contaAgenciadigito) {
        $this->contaAgenciadigito = $contaAgenciadigito;
    }

    public function setContaCarteira($contaCarteira) {
        $this->contaCarteira = $contaCarteira;
    }

    public function setContaStatus($contaStatus) {
        $this->contaStatus = $contaStatus;
    }

    public function setContaObscaixa($contaObscaixa) {
        $this->contaObscaixa = $contaObscaixa;
    }

    public function setContaContrato($contaContrato) {
        $this->contaContrato = $contaContrato;
    }

    public function setContaConvenio($contaConvenio) {
        $this->contaConvenio = $contaConvenio;
    }

    public function setBancoId($bancoId) {
        $this->bancoId = $bancoId;
    }

    public function setBancoNome($bancoNome) {
        $this->bancoNome = $bancoNome;
    }

    public function setBancoCodigo($bancoCodigo) {
        $this->bancoCodigo = $bancoCodigo;
    }

    public function setContaTaxajurosmes($contaTaxajurosmes) {
        $this->contaTaxajurosmes = $contaTaxajurosmes;
    }

    public function setContaTaxamulta($contaTaxamulta) {
        $this->contaTaxamulta = $contaTaxamulta;
    }

    public function setContaTaxadesconto($contaTaxadesconto) {
        $this->contaTaxadesconto = $contaTaxadesconto;
    }

    public function setContaDiasprotesto($contaDiasprotesto) {
        $this->contaDiasprotesto = $contaDiasprotesto;
    }

    /**
     * 
     * @return Lancamento[]
     */
    public function getLancamentos() {
        return $this->lancamentos;
    }

    public function setLancamentos($lancamentos) {
        $this->lancamentos = $lancamentos;
    }

    public function addLancamentos($lancamentos) {
        array_push($this->lancamentos, $lancamentos);
    }

}
