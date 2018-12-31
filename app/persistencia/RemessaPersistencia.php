<?php

class RemessaPersistencia extends AbstractPersistencia {

    public function consultarRemessa($conta) {

        return $this->fetchRow(("SELECT "
                        . "* "
                        . "FROM conta "
                        . "INNER JOIN cedente ON cedente.cedente_id = conta.cedente_id "
                        . "INNER JOIN banco ON banco.banco_id = conta.banco_id "
                        . "WHERE conta_id = " . $conta), new Remessa());
    }

    public function listarLancamentos($conta, $dtIni, $dtFim) {

        $dtFim = new Guga_Date($dtFim);
        $dtIni = new Guga_Date($dtIni);

        $sql = "SELECT "
                . "* "
                . "FROM lancamento "
                . "WHERE conta_id = " . $conta
                ;//. " AND lancamento_dthemissao BETWEEN '" . $dtIni->format('Y-m-d') . "' AND '" . $dtFim->format('Y-m-d') . "'";

        return $this->fetchAll($sql, new Lancamento());
    }

}
