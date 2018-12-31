<?php

/**
 * @primary lancamento_id
 * @table lancamento
 */
class Lancamento extends AbstractObjeto {

    private $lancamentoId;
    private $sacadoId;
    private $contaId;
    private $bancoNome;
    private $bancoCodigo;
    private $cedenteId;
    private $usuarioId;
    private $lancamentoDthemissao;
    private $lancamentoValor;
    private $lancamentoDemonstrativo;
    private $lancamentoStatus;
    private $lancamentoDtvenc;
    private $cedenteNomerazao;
    private $sacadoNomerazao;

    public function __construct($dados = null) {

        if (!empty($dados)) {
            $this->setData($dados);
        }
    }

    function getCedenteNomerazao() {
        return $this->cedenteNomerazao;
    }

    function getSacadoNomerazao() {
        return $this->sacadoNomerazao;
    }

    function setCedenteNomerazao($cedenteNomerazao) {
        $this->cedenteNomerazao = $cedenteNomerazao;
    }

    function setSacadoNomerazao($sacadoNomerazao) {
        $this->sacadoNomerazao = $sacadoNomerazao;
    }

    public function getLancamentoId() {
        return $this->lancamentoId;
    }

    public function getSacadoId() {
        return $this->sacadoId;
    }

    public function getCedenteId() {
        return $this->cedenteId;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getLancamentoDthemissao() {
        return $this->lancamentoDthemissao;
    }

    public function getLancamentoValor() {
        return $this->lancamentoValor;
    }

    public function getLancamentoDemonstrativo() {
        return $this->lancamentoDemonstrativo;
    }

    public function getLancamentoStatus() {
        return $this->lancamentoStatus;
    }

    public function getLancamentoDtvenc() {
        return $this->lancamentoDtvenc;
    }

    public function setLancamentoId($lancamentoId) {
        $this->lancamentoId = $lancamentoId;
    }

    public function setSacadoId($sacadoId) {
        $this->sacadoId = $sacadoId;
    }

    public function setCedenteId($cedenteId) {
        $this->cedenteId = $cedenteId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setLancamentoDthemissao($lancamentoDthemissao) {
        $this->lancamentoDthemissao = $lancamentoDthemissao;
    }

    public function setLancamentoValor($lancamentoValor) {
        $this->lancamentoValor = $lancamentoValor;
    }

    public function setLancamentoDemonstrativo($lancamentoDemonstrativo) {
        $this->lancamentoDemonstrativo = $lancamentoDemonstrativo;
    }

    public function setLancamentoStatus($lancamentoStatus) {
        $this->lancamentoStatus = $lancamentoStatus;
    }

    public function setLancamentoDtvenc($lancamentoDtvenc) {
        $this->lancamentoDtvenc = $lancamentoDtvenc;
    }

    public function getContaId() {
        return $this->contaId;
    }

    public function setContaId($contaId) {
        $this->contaId = $contaId;
    }

    function getBancoCodigo() {
        return $this->bancoCodigo;
    }

    function setBancoCodigo($bancoCodigo) {
        $this->bancoCodigo = $bancoCodigo;
    }

    function getBancoNome() {
        return $this->bancoNome;
    }

    function setBancoNome($bancoNome) {
        $this->bancoNome = $bancoNome;
    }

}
