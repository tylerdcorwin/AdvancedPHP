<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validation
 *
 * @author Tyler Corwin
 */
class Validation {
    public function isValidEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
            return true;
        }
        return false;
    }
}
