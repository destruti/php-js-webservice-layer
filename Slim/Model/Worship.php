<?php

namespace Slim\Model;

class Worship
{

    private $church;

    public function __construct() {

        $m = new \MongoClient();
        $db = $m->selectDB('test');
        $this->church = $db->selectCollection('church');

    }

    public function viewWorship($_id)
    {
        $result = $this->church->findOne(array('_id' => new \MongoId($_id)));

        echo '<br/><center><a href="https://github.com/limaedu/webservicelayer" target="_blank">See on Github<a/></center><br/><br/>';
        echo '<br/><center><a href="/remove">Remove All<a/></center><br/><br/>';

        foreach ($result as $key => $value) {

            if ($key == '_id') {

                echo 'Id -> <a href="/worship/'.$value.'">'.$value.'</a><br/>';


            } else {
                echo $key . ' -> ' . $value . '<br/>';
            }
        }

        echo '<br/><br/><br/>';

    }

    public function getAllWorships()
    {

        try {

            echo '<br/><center><a href="https://github.com/limaedu/webservicelayer" target="_blank">See on Github<a/></center><br/><br/>';

            if ($this->church->count() == 0){


                echo "<h1>Database is empty!</h1><br/>";
                echo "<strong>You must just add, with curl method:</strong><br/>";
                echo "curl -i -X POST -H 'Content-Type: application/json' -d '{\"campaign\": \"Natal 2015\", \"pr_name\": \"Ari\", \"mp3_link\": \"http://webservicelayer.info/audios/ari_natal_2015.mp3\", \"yt_link\": \"https://www.youtube.info/embed/aJzh0u1DcMk\" }' http://webservicelayer.info/addWorship";
                echo "<br/><br/><br/>";

            } else {

                echo '<br/><center><a href="/remove">Remove All<a/></center><br/><br/>';

            }

            $results = $this->church->find();
            foreach ($results as $result) {

                foreach ($result as $key => $value) {

                    if ($key == '_id') {
                        echo 'Id -> <a href="/worship/'.$value.'">'.$value.'</a><br/>';
                    } else {
                        echo $key . ' -> ' . $value . '<br/>';
                    }
                }

                echo '<br/><br/><br/>';

            }

        } catch (\Exception $e) {

            \Libs\Log::error('DB Church Error: ' . $e->getMessage());
            throw new \Exception('DB Church Error: ' . $e->getMessage());
        }

    }

    public function addWorship()
    {

        //curl -i -X POST -H 'Content-Type: application/json' -d '{"campaign": "Natal 2015", "pr_name": "Ariovaldo", "mp3_link": "http://webservicelayer.info/audios/ari_natal_2015.mp3", "yt_link": "https://www.youtube.info/embed/aJzh0u1DcMk" }' http://webservicelayer.info/addWorship

        \Slim\Slim::getInstance()->response()->header('Content-Type', 'application/json;charset=utf-8');
        $request = \Slim\Slim::getInstance()->request();
        $church = json_decode($request->getBody());
        \Libs\Log::mongo($church);

        $content = array(
            "created"  => new \MongoDate(),
            "updated"  => new \MongoDate(),
            "campaign" => $church->campaign,
            "pr_name"  => $church->pr_name,
            "mp3_link" => $church->mp3_link,
            "yt_link"  => $church->yt_link
        );

        $result = $this->church->insert($content);
        \Libs\Log::mongo($result);

        echo json_encode($result);
    }


    public function updateWorship()
    {

        // curl -i -X PUT -H 'Content-Type: application/json' -d '{"_id": "54f37889479ed0ad188b4567", "campaign": "Natal 2015", "pr_name": "Ari Palmeiras", "mp3_link": "http://webservicelayer.info/audios/ari_natal_2015.mp3", "yt_link": "https://www.youtube.info/embed/aJzh0u1DcMk" }' http://webservicelayer.info/updateWorship

        \Slim\Slim::getInstance()->response()->header('Content-Type', 'application/json;charset=utf-8');
        $request = \Slim\Slim::getInstance()->request();
        $church = json_decode($request->getBody());
        \Libs\Log::mongo($church);

        $updateContent = array(
            "updated"  => new \MongoDate(),
            "campaign" => $church->campaign,
            "pr_name"  => $church->pr_name,
            "mp3_link" => $church->mp3_link,
            "yt_link"  => $church->yt_link
        );

        $row = $this->church->findOne(array('_id' => new \MongoId($church->_id)));

        $result = $this->church->update(
            array('_id'  => $row['_id']),
            array('$set' => $updateContent)
        );

        echo json_encode($result);

    }

    public function deleteWorship()
    {

        \Slim\Slim::getInstance()->response()->header('Content-Type', 'application/json;charset=utf-8');
        $request = \Slim\Slim::getInstance()->request();
        $church = json_decode($request->getBody());
        \Libs\Log::mongo($church);

        $row = $this->church->findOne(array('_id' => new \MongoId($church->_id)));

        $result = $this->church->remove(array('_id'  => $row['_id']));

        echo json_encode($result);

    }

    public function remove()
    {
        $this->church->remove();
        \Slim\Slim::getInstance()->redirect('/');
    }

}
