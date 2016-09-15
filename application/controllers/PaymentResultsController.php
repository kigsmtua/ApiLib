<?php
Namespace Cellulant\CARD_GATEWAY\Controllers;
use  Cellulant\CARD_GATEWAY\Utilities\BeepLogger as logger;

/**
 * Description of PaymentRequestsContoller
 * @author wekesa
 */
class PaymentResultsContoller {

    /**
     ** log class  
     **/
    private $log


	function __construct(){

       $this->log = new logger();
   
   }

}
