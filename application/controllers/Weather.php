<?php
namespace Application\Controllers;

use Application\Core\Controller;
use Application\Core\View;
use Application\Models\Weather as WeatherModel;

class Weather extends Controller
{
    public function __construct()
    {
        $this->model = new WeatherModel();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $this->$data = (object)[];
        $this->$data->current_page = WEATHER_URL;
        $this->$data->weather = $this->model->getWeather()["response"];
        $this->view->generate('weather.php', 'template.php', $this->$data);
    }
}
