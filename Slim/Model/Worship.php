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

            if ($this->church->count() == 0){


                echo "<h1>Database is empty!</h1><br/>";
                echo "<strong>To try:</strong><br/>";
                echo "curl -i -X POST -H 'Content-Type: application/json' -d '{\"campaign\": \"Natal 2015\", \"pr_name\": \"Ari\", \"mp3_link\": \"http://webservicelayer.com/audios/ari_natal_2015.mp3\", \"yt_link\": \"https://www.youtube.com/embed/aJzh0u1DcMk\" }' http://webservicelayer.com/addWorship";
                echo "<br/><br/><br/>";

            }

            $results = $this->church->find();
            foreach ($results as $result) {

//                $res = var_export($result);
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

        //curl -i -X POST -H 'Content-Type: application/json' -d '{"campaign": "Natal 2015", "pr_name": "Ariovaldo", "mp3_link": "http://webservicelayer.com/audios/ari_natal_2015.mp3", "yt_link": "https://www.youtube.com/embed/aJzh0u1DcMk" }' http://webservicelayer.com/addWorship

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

        // curl -i -X PUT -H 'Content-Type: application/json' -d '{"_id": "54f37889479ed0ad188b4567", "campaign": "Natal 2015", "pr_name": "Ari Palmeiras", "mp3_link": "http://webservicelayer.com/audios/ari_natal_2015.mp3", "yt_link": "https://www.youtube.com/embed/aJzh0u1DcMk" }' http://webservicelayer.com/updateWorship

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

        // curl -i -X DELETE -H 'Content-Type: application/json' -d '{"_id": "54f3822d479ed0b0188b4567"}' http://webservicelayer.com/deleteWorship

        \Slim\Slim::getInstance()->response()->header('Content-Type', 'application/json;charset=utf-8');
        $request = \Slim\Slim::getInstance()->request();
        $church = json_decode($request->getBody());
        \Libs\Log::mongo($church);

        $row = $this->church->findOne(array('_id' => new \MongoId($church->_id)));

        $result = $this->church->remove(array('_id'  => $row['_id']));

        echo json_encode($result);

    }

}
