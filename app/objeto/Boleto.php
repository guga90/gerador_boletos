<?php

class Boleto extends AbstractObjeto {

    private $lancamentoId;
    private $contaId;
    private $usuarioId;
    private $lancamentoDthemissao;
    private $lancamentoValor;
    private $lancamentoDemonstrativo;
    private $lancamentoStatus;
    private $lancamentoDtvenc;
    private $sacadoNomerazao;
    private $sacadoId;
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

    public function __construct($dados = null) {

        if (!empty($dados)) {
            $this->setData($dados);
        }
    }

    public function getBancoCodigo() {
        return $this->bancoCodigo;
    }

    public function setBancoCodigo($bancoCodigo) {
        $this->bancoCodigo = $bancoCodigo;
    }

    function getLancamentoId() {
        return $this->lancamentoId;
    }

    function getContaId() {
        return $this->contaId;
    }

    function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getContaMoeda() {
        return $this->contaMoeda;
    }

    public function setContaMoeda($contaMoeda) {
        $this->contaMoeda = $contaMoeda;
    }

    function getLancamentoDthemissao() {
        return $this->lancamentoDthemissao;
    }

    function getLancamentoValor() {
        return $this->lancamentoValor;
    }

    function getLancamentoDemonstrativo() {
        return $this->lancamentoDemonstrativo;
    }

    function getLancamentoStatus() {
        return $this->lancamentoStatus;
    }

    function getLancamentoDtvenc() {
        return $this->lancamentoDtvenc;
    }

    function getSacadoNomerazao() {
        return $this->sacadoNomerazao;
    }

    function getSacadoId() {
        return $this->sacadoId;
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

    function getSacadoTipopessoa() {
        return $this->sacadoTipopessoa;
    }

    function getSacadoCidade() {
        return $this->sacadoCidade;
    }

    function getCedenteId() {
        return $this->cedenteId;
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

    function getCedenteTipopessoa() {
        return $this->cedenteTipopessoa;
    }

    function getCedenteCidade() {
        return $this->cedenteCidade;
    }

    function getCedenteNomerazao() {
        return $this->cedenteNomerazao;
    }

    function getContaNome() {
        return $this->contaNome;
    }

    function getContaBanco() {
        return $this->contaBanco;
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

    function setLancamentoId($lancamentoId) {
        $this->lancamentoId = $lancamentoId;
    }

    function setContaId($contaId) {
        $this->contaId = $contaId;
    }

    function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    function setLancamentoDthemissao($lancamentoDthemissao) {
        $this->lancamentoDthemissao = $lancamentoDthemissao;
    }

    function setLancamentoValor($lancamentoValor) {
        $this->lancamentoValor = $lancamentoValor;
    }

    function setLancamentoDemonstrativo($lancamentoDemonstrativo) {
        $this->lancamentoDemonstrativo = $lancamentoDemonstrativo;
    }

    function setLancamentoStatus($lancamentoStatus) {
        $this->lancamentoStatus = $lancamentoStatus;
    }

    function setLancamentoDtvenc($lancamentoDtvenc) {
        $this->lancamentoDtvenc = $lancamentoDtvenc;
    }

    function setSacadoNomerazao($sacadoNomerazao) {
        $this->sacadoNomerazao = $sacadoNomerazao;
    }

    function setSacadoId($sacadoId) {
        $this->sacadoId = $sacadoId;
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

    function setSacadoTipopessoa($sacadoTipopessoa) {
        $this->sacadoTipopessoa = $sacadoTipopessoa;
    }

    function setSacadoCidade($sacadoCidade) {
        $this->sacadoCidade = $sacadoCidade;
    }

    function setCedenteId($cedenteId) {
        $this->cedenteId = $cedenteId;
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

    function setCedenteTipopessoa($cedenteTipopessoa) {
        $this->cedenteTipopessoa = $cedenteTipopessoa;
    }

    function setCedenteCidade($cedenteCidade) {
        $this->cedenteCidade = $cedenteCidade;
    }

    function setCedenteNomerazao($cedenteNomerazao) {
        $this->cedenteNomerazao = $cedenteNomerazao;
    }

    function setContaNome($contaNome) {
        $this->contaNome = $contaNome;
    }

    function setContaBanco($contaBanco) {
        $this->contaBanco = $contaBanco;
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

}
