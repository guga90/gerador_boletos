<?php

class LancamentoPersistencia extends AbstractPersistencia {

    public function listarComCedenteSacado() {

        return $this->fetchAll(("SELECT "
                . "lancamento.*, "
                . "cedente.cedente_nomerazao, "
                . "sacado.sacado_nomerazao, "
                . "banco.banco_nome, "
                . "banco.banco_codigo "
                . "FROM lancamento "
                . "INNER JOIN cedente ON cedente.cedente_id = lancamento.cedente_id "
                . "INNER JOIN conta ON conta.conta_id = lancamento.conta_id "
                . "INNER JOIN banco ON banco.banco_id = conta.banco_id "
                . "INNER JOIN sacado ON sacado.sacado_id = lancamento.sacado_id "), new Lancamento());
    }
    
    public function consultarEmitirBoleto($cod) {

        return $this->fetchRow(("SELECT "
                . "* "
                . "FROM lancamento "
                . "INNER JOIN cedente ON cedente.cedente_id = lancamento.cedente_id "
                . "INNER JOIN sacado ON sacado.sacado_id = lancamento.cedente_id "
                . "INNER JOIN conta ON conta.conta_id = lancamento.conta_id "
                . "INNER JOIN banco ON banco.banco_id = conta.banco_id "
                . "WHERE md5(lancamento_id) = '" . $cod . "'"), new Boleto());
    }
}
