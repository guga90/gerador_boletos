<?php

class SacadoPersistencia extends AbstractPersistencia {

    public function listarAtivos() {

        return $this->fetchAll("SELECT * FROM sacado WHERE sacado_status = 'A'", new Sacado());
    }

}
