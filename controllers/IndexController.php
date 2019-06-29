<?php

class IndexController extends Controller
{

    public function index() {


        $array = ["test" => 'test'];
        $this->render("index", $array);
    }

    public function method() {

        $array = ["test" => 'test'];
        $this->render("test", $array);
    }


}