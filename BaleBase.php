<?php

namespace mamadali\bale;

use GuzzleHttp\Client;
use Yii;
use yii\base\Component;
use yii\helpers\Json;

class BaleBase extends Component
{

    /**
     * @return mixed|null
     */
    public function getInput(){
        return Json::decode(Yii::$app->request->getRawBody());
    }

    public function initializeOptions($options)
    {
        $is_resource = false;
        $multipart    = [];

        if (empty($options)) {
            return [];
        }

        //Reformat data array in multipart way if it contains a resource
        $attachments = ['photo', 'sticker', 'audio', 'document', 'video', 'voice', 'animation', 'video_note', 'thumb'];
        foreach ($options as $key => $item) {

            if (in_array($key, $attachments)) {
                if (file_exists($item)) {
                    $file = fopen($item, 'r');
                    $is_resource |= is_resource($file);
                    $multipart[] = ['name' => $key, 'contents' => $file];
                }
            }
            else{
                $multipart[] = ['name' => $key, 'contents' => $item];
            }
        }
        if ($is_resource) {
            return ['multipart' => $multipart];
        }

        return ['form_params' => $options];
    }


    public function send($method, $options){
        
        $client = new Client(['base_uri' => $this->apiUrl.$this->botToken.'/']);

        $request = $client->request('POST', $method, $this->initializeOptions($options));

        $response = Json::decode($request->getBody());
        return $response['ok'] == true ? $response : false;
    }
}