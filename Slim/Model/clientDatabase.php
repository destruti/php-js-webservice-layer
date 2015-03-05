<?php

namespace Slim\Model;

use \Libs\Log as log;

class clientDatabase
{

    private $db;
    private $collection;
    private $content;
    private $instance;

    public function __construct() {

        $m = new \MongoClient();
        $this->db = $m->selectDB('test');

        $this->instance = \Slim\Slim::getInstance();

        $request = $this->instance->request();

        $this->content = json_decode($request->getBody(), true);

        if (is_array($this->content)) {
            $this->content = $this->content[0];
        }

        if ($this->content['hashClient'] == '') {
            $this->content['hashClient'] = 'church';
        }

        if ($this->content['hashClient'] == 'wsl_website') {

            // log::mongo($request->headers->Host );
            // log::mongo($request->headers->Origin );
            // log::mongo($request->headers->Referer );

            $acceptableList = array(
                "http://webservicelayer.dev/examples/wsl_website/",
                "http://webservicelayer.com/examples/wsl_website/",
                "http://webservicelayer.dev/",
                "http://webservicelayer.com/",
            );

            if (in_array($request->headers->Referer, $acceptableList)) {
                log::mongo('Call from '.$request->headers->Referer.' is not acceptable. Please contact WSL Admin!');
                throw new \Exception('Call from '.$request->headers->Referer.' is not acceptable. Please contact WSL Admin!');
            }

        }


        if ($this->content == null) {
            throw new \Exception('We dont see any parameters!');
        }

        $this->collection = $this->db->selectCollection($this->content['hashClient']);

    }

    public function setContent()
    {

        $updateContent = array();
        foreach ($this->content as $key => $value) {

            if ('_method' == $key) {

            } else
            if ('_id' == $key) {

            } else {
                $updateContent[$key] = $value;
            }

        }

        $updateContent["updated"] = new \MongoDate();

        return $updateContent;

    }

    public function setJsonResponse()
    {
        $this->instance->response()->header('Access-Control-Allow-Origin: *');
        $this->instance->response()->header('Content-Type', 'application/json;charset=utf-8');
    }

    public function readerProject()
    {
        echo '<div>';
            echo '<div style="text-align: right;"><a href="https://github.com/limaedu/webservicelayer" target="_blank"><img src="http://webservicelayer.com/img/github.jpg" /></a></div>';
            echo '<div style="text-align: left; "><a href="https://webservicelayer.com" target="_blank"><img src="http://webservicelayer.com/img/logo_WSL.png" style="width: 100px;" /><a/></div>';
        echo '</div>';
    }

    public function removeOne($_id)
    {
        $row = $this->collection->findOne(array('_id' => new \MongoId($_id)));
        $this->collection->remove(array('_id'  => $row['_id']));
        $this->instance->redirect('/');
    }

    public function viewClientDatabase($_id)
    {

        $this->readerProject();

        $result = $this->collection->findOne(array('_id' => new \MongoId($_id)));


        echo '<br/><br/><a href="/">GoBack!<a/><br/><br/><br/><center>';

        foreach ($result as $key => $value) {

            if ($key == '_id') {
                echo 'Id -> <a href="/clientDatabase/'.$value.'">'.$value.'</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/removeOne/'.$value.'">(Remove)</a> <br/>';
            } else {
                echo $key . ' -> ' . $value . '<br/>';
            }
        }

        echo '</center><br/><br/><br/>';

    }

    public function getAllClientDatabases()
    {

        try {

            echo '<div style="text-align: right"><a href="https://github.com/limaedu/webservicelayer" target="_blank"><img src="http://webservicelayer.com/img/github.jpg" /></a></div>';
            echo '<div style="text-align: left"><a href="https://webservicelayer.com" target="_blank"><img src="http://webservicelayer.com/img/logo_WSL.png" style="width: 100px;" /><a/></div>';

            if ($this->collection->count() == 0){


                echo "<br/><h1>Database is empty!</h1><br/>";
                echo "<strong>You must just add, with curl method:</strong><br/>";
                echo "curl -i -X POST -H 'Content-Type: application/json' -d '{\"campaign\": \"Natal 2015\", \"pr_name\": \"Ari\", \"mp3_link\": \"http://webservicelayer.info/audios/ari_natal_2015.mp3\", \"yt_link\": \"https://www.youtube.info/embed/aJzh0u1DcMk\" }' http://webservicelayer.info/addclientDatabase";
                echo "<br/><br/><br/>";

            } else {

                echo '<br/><center><a href="/remove">Remove All _Ids<a/></center><br/><br/>';

            }

            $results = $this->collection->find();
            foreach ($results as $result) {

                foreach ($result as $key => $value) {

                    if ($key == '_id') {
                        echo 'Id -> <a href="/clientDatabase/'.$value.'">'.$value.'</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/removeOne/'.$value.'">(Remove)</a> <br/>';
                    } else {
                        echo $key . ' -> ' . $value . '<br/>';
                    }
                }

                echo '<br/><br/><br/>';

            }

        } catch (\Exception $e) {

            log::error('DB Church Error: ' . $e->getMessage());
            throw new \Exception('DB Church Error: ' . $e->getMessage());
        }

    }

    public function view()
    {
        $this->setJsonResponse();

        log::mongo('view');

        $response = array();
        $results = $this->collection->find();
        foreach ($results as $result) {
            $response[] = $result;
        }
        echo json_encode($response);
    }

    public function addClientDatabase()
    {

        $this->setJsonResponse();

        $content = $this->setContent();
        $content["created"] = new \MongoDate();

        $result = $this->collection->insert($content);
        log::mongo($result);

        echo json_encode($result);
    }


    public function updateClientDatabase()
    {

        $this->setJsonResponse();

        $updateContent = $this->setContent();
        log::mongo($updateContent);

        $row = $this->collection->findOne(array('_id' => new \MongoId($this->content['_id'])));

        $result = $this->collection->update(
            array('_id'  => $row['_id']),
            array('$set' => $updateContent)
        );

        echo json_encode($result);

    }

    public function deleteClientDatabase()
    {

        $this->setJsonResponse();

        $content = $this->setContent();

        $row = $this->collection->findOne(array('_id' => new \MongoId($this->content['_id'])));

        $result = $this->collection->remove(array('_id'  => $row['_id']));

        echo json_encode($result);

    }

    public function remove()
    {
        $this->collection->remove();
        $this->instance->redirect('/');
    }

}