<?php

class IndexController extends Controller
{

    public function index() {


        $array = ["test" => 'test from controller'];
        $this->render("index", $array);
    }

    public function method() {

        $array = ["test" => 'test'];
        $this->render("test", $array);
    }


}