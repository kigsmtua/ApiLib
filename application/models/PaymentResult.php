<?php
Namespace Cellulant\CARD_GATEWAY\Model;
use Cellulant\CARD_GATEWAY\System\Database as db;
/**
 *
 * @author wekesa
 */
class PaymentResult extends Model{
    

    private $db;

    function __construct(){

       $this->db = new db();

    }
}
