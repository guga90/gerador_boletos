<?php

/**
 * @primary usuario_id
 * @table usuario
 */
class Usuario extends AbstractObjeto {

    public $usuarioId;
    private $usuarioNome;
    private $usuarioCpf;
    private $usuarioTelefone;
    private $usuarioDtnasc;
    private $usuarioCep;
    private $usuarioLogradouro;
    private $usuarioSenha;
    private $usuarioStatus;
    private $usuarioSetor;
    private $usuarioEstado;
    private $usuarioCidade;

    public function __construct($dados = null) {

        if (!empty($dados)) {
            $this->setData($dados);
        }
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getUsuarioNome() {
        return $this->usuarioNome;
    }

    public function getUsuarioCpf() {
        return $this->usuarioCpf;
    }

    public function getUsuarioTelefone() {
        return $this->usuarioTelefone;
    }

    public function getUsuarioDtnasc() {
        return $this->usuarioDtnasc;
    }

    public function getUsuarioCep() {
        return $this->usuarioCep;
    }

    public function getUsuarioLogradouro() {
        return $this->usuarioLogradouro;
    }

    public function getUsuarioSenha() {
        return sha1($this->usuarioSenha);
    }

    public function getUsuarioStatus() {
        return $this->usuarioStatus;
    }

    public function getUsuarioSetor() {
        return $this->usuarioSetor;
    }

    public function getUsuarioEstado() {
        return $this->usuarioEstado;
    }

    public function getUsuarioCidade() {
        return $this->usuarioCidade;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setUsuarioNome($usuarioNome) {
        $this->usuarioNome = $usuarioNome;
    }

    public function setUsuarioCpf($usuarioCpf) {
        $this->usuarioCpf = $usuarioCpf;
    }

    public function setUsuarioTelefone($usuarioTelefone) {
        $this->usuarioTelefone = $usuarioTelefone;
    }

    public function setUsuarioDtnasc($usuarioDtnasc) {
        $this->usuarioDtnasc = $usuarioDtnasc;
    }

    public function setUsuarioCep($usuarioCep) {
        $this->usuarioCep = $usuarioCep;
    }

    public function setUsuarioLogradouro($usuarioLogradouro) {
        $this->usuarioLogradouro = $usuarioLogradouro;
    }

    public function setUsuarioSenha($usuarioSenha) {
        $this->usuarioSenha = $usuarioSenha;
    }

    public function setUsuarioStatus($usuarioStatus) {
        $this->usuarioStatus = $usuarioStatus;
    }

    public function setUsuarioSetor($usuarioSetor) {
        $this->usuarioSetor = $usuarioSetor;
    }

    public function setUsuarioEstado($usuarioEstado) {
        $this->usuarioEstado = $usuarioEstado;
    }

    public function setUsuarioCidade($usuarioCidade) {
        $this->usuarioCidade = $usuarioCidade;
    }

}
