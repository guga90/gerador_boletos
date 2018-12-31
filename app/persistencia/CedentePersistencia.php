<?php

class CedentePersistencia extends AbstractPersistencia {

    public function listarAtivos() {

        return $this->fetchAll("SELECT * FROM cedente WHERE cedente_status = 'A'", new Cedente());
    }

}
