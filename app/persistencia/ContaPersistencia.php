<?php

class ContaPersistencia extends AbstractPersistencia {

    public function consultarComCedente($id) {

        return $this->fetchRow(("SELECT conta.*, cedente.cedente_id  "
                . "FROM conta "
                . "INNER JOIN cedente ON cedente.cedente_id = conta.cedente_id "
                . "WHERE conta_id = " . $id), new Conta());
    }

    public function listarComCedenteAtivo() {

        return $this->fetchAll(("SELECT conta.*, "
                . "cedente.cedente_id, "
                . "cedente.cedente_nomerazao, "
                . "banco.banco_codigo, "
                . "banco.banco_nome "
                . "FROM conta "
                . "INNER JOIN cedente ON cedente.cedente_id = conta.cedente_id "
                . "INNER JOIN banco ON banco.banco_id = conta.banco_id "
                . "WHERE cedente_status = 'A'"), new Conta());
    }
    
    public function listarDeCedenteAtivas($cedenteId) {

        return $this->fetchAll(("SELECT * FROM conta WHERE cedente_id = " . $cedenteId . " AND conta_status = 'A'"), new Conta());
    }

}
