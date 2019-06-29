<?php
/**
 * Singeleton base de donnée
 */

include_once __DIR__."/../config.php"; // configuration mysql
class DB
{
    private static $_instance;
    public static function getConnexion()
    {
        if(!self::$_instance)
        {
            try
            {
                self::$_instance = new PDO("mysql:host=".DB_SERVEUR.";dbname=".DB_NOM, DB_LOGIN, DB_PASSWORD);
                self::$_instance->setAttribute(PDO::ATTR_PERSISTENT, true); # Connexions persistantes ne sont pas fermer à la fin du script(cache)
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # gestion d'erreur
                self::$_instance->exec("SET CHARACTER SET utf8"); // problème virgule
            }
            catch(PDOException $e)
            {
                die("Erreur de connexion " . $e->getMessage() . "<br/>");
            }
        }
        return self::$_instance;
    }

    private function __construct()
    {

    }


}