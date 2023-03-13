<?php

namespace App\Service;

class Pushall
{
    private $id;
    private $apiKey;

    protected $url = "https://pushall.ru/api.php";

    public function __construct($apiKey, $id)
    {
        $this->apiKey = $apiKey;
        $this->id = $id;
    }

    public function send($title, $text)
    {
        $data = [
            "type" => "self",
            "id" => $this->id,
            "key" => $this->apiKey,
            "text" => $text,
            "title" => $title,
        ];

        $client = new \GuzzleHttp\Client(['base_uri' => $this->url]);



//        curl_setopt_array($ch = curl_init(), [
//            CURLOPT_URL => $this->url,
//            CURLOPT_POSTFIELDS => $data,
//            CURLOPT_RETURNTRANSFER => true
//        ]);
//        $result = curl_exec($ch); //получить ответ или ошибку
//        curl_close($ch);

        return $client->post('', ['form_params' => $data]);
    }
}
