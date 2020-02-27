<?php
namespace Application\Core;

use GuzzleHttp\Client;

class Model extends MyPdo
{
    public function __construct()
    {
        $this->Guzzle_client = new Client();
    }

    // Запрос на gismeteo api
    public function gismeteoRequest($query_url, $params=[])
    {
        $res = $this->Guzzle_client->request('GET', 'https://api.gismeteo.net/v2/weather/current/' . CITY_FOR_WEATHER_REQUEST, [
            'headers' => [
                'X-Gismeteo-Token' => '5c10e9ce8e02f6.83138424',
                'Accept-Encoding' => 'gzip',
            ],
            'query' => $params,
            'decode_content' => 'gzip',
        ]);

        return json_decode($res->getBody()->getContents(), true);
    }

    // Получения списка полов для формы регистрации
    public function getGenders()
    {
        $query ="SELECT * 
        FROM `genders`";
        $result = parent::dbSelectArray($query, "genders");
        return $result;
    }
}
