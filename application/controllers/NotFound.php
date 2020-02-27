<?php
namespace Application\Controllers;

use Application\Core\Controller;

class NotFound extends Controller
{
    public function actionIndex()
    {
        $this->view->generate('not_found.php', 'template.php');
    }
}
