<?php
Namespace Cellulant\CARD_GATEWAY\System;
use Cellulant\CARD_GATEWAY\config;
Use Opis\Database\Database as ODatabase;
Use Opis\Database\Connection;


/**
 ** instantiate database connection uses opis library
 ** (http://www.opis.io/database)
 ** @author John Kiragu <john.kiragu@cellulant.com>
 ** @author Victor Wekesa <victor.wekesa@cellulant.com>
 **/
class Database{
  
     function __construct(){
       $conn = Connection::create('mysql:host='.Config::Dbhost.';dbname='.Config::dbUserName, Config::appDbUser, Config::appDbPass)
              ->option(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ)
              ->option(PDO::ATTR_STRINGIFY_FETCHES, false)
              ->persistent()
              ->logQueries();
        $dbConn = new ODatabase($conn);
        return $dbConn;
     }
}


