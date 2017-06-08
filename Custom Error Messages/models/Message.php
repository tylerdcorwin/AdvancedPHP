<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author 001131100
 */
class Message implements IMessage {
    
    protected $messages = [];
    
    
    public function addMessage($key, $msg) {
        $this->messages[$key] = $msg;
    }

    public function getAllMessages() {
        return $this->messages;
    }

    public function removeMessage($key) {
        if(array_key_exists($key, $this->messages)){
        unset($this->messages[$key]);                  
        }
        else 
        {
            throw new Exception('This did not remove the correct '. $key );
        }
        
        
    }

    
}
