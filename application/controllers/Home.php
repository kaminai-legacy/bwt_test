<?php
namespace Application\Controllers;

use Application\Core\Controller;

class Home extends Controller
{
    public function actionIndex()
    {
        $data = (object)[];
        $data->current_page = HOME_URL;
        $this->view->generate('home.php', 'template.php', $data);
    }
}
