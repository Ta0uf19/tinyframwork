<?php

/**
 * Taoufik Tribki
 * Class Route
 */
class Route {


    public static $routes = array();

    /**
     * Ajouter la route dans notre tableau routes.
     * @param $page
     * @param $controller
     */
    public static function set($page, $controller) {


        $args = explode("@", $controller);

        $controller = $args[0];
        $method = isset($args[1]) ? $args[1] : 'index'; // méthode par defaut à appeler;

        if($page == 'index' || $page == 'index.php') $page = '';
        // ajouter la route dans le tableau
        array_push(self::$routes, compact('page','controller', 'method'));
    }


    /**
     * Lorsque l'utilisateur arrive sur la page, on recherche la route correspondante
     */

    public static function run() {

        $found = false;

        $url = $_GET['url'];

        if($url == 'index.php' || $url == 'index') $url = '';

        // Chercher la route
        foreach(self::$routes as $key => $route)
        {

            if(strtolower($route['page']) === strtolower($url)) {

                $controller = $route['controller'];
                $method = $route['method'];

                $filename = __DIR__."/../controllers/$controller.php";

                /**
                 * Appel method
                 */

                if(file_exists($filename)) {

                    $in = new $controller();
                    $in->$method();
                }
                $found = true;
            }
        }
        // search files in assets folder

        if(!$found) echo " ERROR 404";
    }


}