<?php

/**
 *
 * @author GFORTI
 */

//similar to crud
//get = read/select
//post = create
//put = update
//delete = delete
interface IRestModel {
    //put your code here
    function getAll();
    function get($id); 
    function post($serverData);
    //could be via $id
    function put($serverData);
    function delete($serverData);
}
