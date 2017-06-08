<?php

/**
 *
 * @author 001131100
 */
interface IMessage {

    //put your code here
    public function addMessage($key, $msg);
    public function removeMessage($key);
    public function getAllMessages();
}
