<?php

class Model extends DB
{

    protected $connexion;
    public function __construct()
    {
        $this->connexion = DB::getConnexion();
    }

}