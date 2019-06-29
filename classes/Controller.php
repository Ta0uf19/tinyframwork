<?php

class Controller
{

    /**
     * Rendre une page web
     */
    public function render($view, $params = []) {

        $file =  (__DIR__ . "/../views/$view.php");

        if (file_exists($file)) {
            extract($params); // array to vars
            include($file);
        }
        else {
            echo "ERROR view : ". $view;
        }

    }
}