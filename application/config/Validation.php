<?php
Namespace Cellulant\CARD_GATEWAY\Config; 

/**
 ** validation rules 
 ** loads all the validation rules
 ** @author john.kiragu@cellulant.com
 ** (should be in a model ideally )
 **/
class Validation{

  
   public $rules = array(){
    	'postPaymentRequest' => array(
 
             'required' => array(
            
             ),

         ),
    	'postPaymentResult'  => array(
 
            'required' => array(
            
            ),
            'string'=>array(

            ),
    	 ),

    };

}




