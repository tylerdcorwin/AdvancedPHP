<?php

include_once './autoload.php';

/*
 * The Rest server is sort of like the page is hosting the API
 * When a user calls the page (By url(HTTP), CURL, JavaScript etc.), the server(this Page) will handle the request.
 */
$restServer = new RestServer();


try {

    $restServer->setStatus(200);

    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    $id = $restServer->getId();
    $serverData = $restServer->getServerData();

    //using advanced variablees
    //need to build a resource using a class name
    //ucwords makes the first letter capitalized
    $resourceUCName = ucwords($resource);
    $resourceClassName = $resourceUCName . 'Resource';

    try {

        $resourceData = new $resourceClassName();
    } catch (InvalidArgumentException $e) {
        throw new InvalidArgumentException($resourceClassName . ' Resource Not Found');
    }

    if ('GET' === $verb) {  

        if (NULL === $id) {

            $restServer->setData($resourceData->getAll());
        } else {

            $restServer->setData($resourceData->get($id));
        }
    }

    if ('POST' === $verb) {


        if ($resourceData->post($serverData)) {
            $restServer->setMessage($resourceUCName. ' Added');
            $restServer->setStatus(201);
        } else {
            throw new Exception($resourceUCName.' could not be added');
        }
    }


    if ('PUT' === $verb) {                      

        if (NULL === $id) {
            throw new InvalidArgumentException($resourceUCName . ' ID ' . $id . ' was not found');
        } else if ($resourceData->put($serverData)) {
            $restServer->setMessage($resourceUCName. ' Updated');
            $restServer->setStatus(201);
        } else {
            throw new Exception($resourceUCName.' could not be Updated');
        }
    }
    
    if ('DELETE' === $verb) {
         if (NULL === $id) {
            throw new InvalidArgumentException($resourceUCName . ' ID ' . $id . ' was not found');
        } else if ($resourceData->delete($id)) {
            $restServer->setMessage($resourceUCName. ' Deleted');
            $restServer->setStatus(201);
        } else {
            throw new Exception($resourceUCName.' could not be Deleted');
        }
    }
}

/* 400 exeception means user sent something wrong */
catch (InvalidArgumentException $e) {
    $restServer->setStatus(400);
    $restServer->setErrors($e->getMessage());
    /* 500 exeception means something is wrong in the program */
} catch (Exception $ex) {
    $restServer->setStatus(500);
    $restServer->setErrors($ex->getMessage());
}


echo $restServer->getReponse();
exit();
