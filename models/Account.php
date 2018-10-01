<?php

use Base\Account as BaseAccount;

/**
 * Skeleton subclass for representing a row from the 'Account' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Account extends BaseAccount
{
	function setPasswordHash($password){
                $hash = PHPassLib\Hash\BCrypt::hash($password, array ('rounds' => 16));
                parent::setPasswordHash($hash); 
        }
        function login ($password){
                
                if(PHPassLib\Hash\BCrypt::verify($password, parent::getPasswordHash())){
                        return true;
                }
                else{
                        return false;
                }        
        }
}
