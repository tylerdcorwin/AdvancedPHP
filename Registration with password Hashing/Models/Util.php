<?php

/**
 * Description of util
 *
 * @author GFORTI
 */
class Util {
    
    
    /**
    * A method to check if a Post request has been made.
    *    
    * @return boolean
    */
   public function isPostRequest() {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
   }
   
   /**
    * Generate link.
    * @param string $page target page
    * @param array $params page parameters
    * 
    * @return string
    */
    public function createLink($page, array $params = array()) {        
        return $page . '?' .http_build_query($params);
    }
    
    /**
    * Redirect to the given page.
    * @param type $page target page
    * @param array $params page parameters
    * 
    * @return void
    */
    public function redirect($page, array $params = array()) {
        header('Location: ' . $this->createLink($page, $params));
        die();
    }
    
    /**
    * Get all values from a post form.
    * 
    * @return array
    */
    public function getPostValues() {
        return filter_input_array(INPUT_POST);
    }

    
    /**
     * Get value of the URL param.
     * 
     * @return string
     */
    public function getUrlParam($name) {
        return filter_input(INPUT_GET, $name);
    }
    
}
