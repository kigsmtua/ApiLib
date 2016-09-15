<?php
Namespace Cellulant\CARD_GATEWAY\Config;

/**
 ** Application configs 
 ** @author John Kiragu   <john.kiragu@cellulant.com>
 ** @author Victor Wekesa <victor.wekesa@cellulant.com>
 **/
class Config{

    ///Database Configs
    const DbHost = 'localhost';
    const DbUser = "root";
    const DbPass = "mysql";
    const DbName = "card_processor";


    const error   = 'Logs/error.log';
    const info    = 'Logs/info.log';
    const debug   = 'Logs/debug.log';
    const tat     = 'Logs/tat.log';
    const sequel  = 'Logs/sql.log';
}




