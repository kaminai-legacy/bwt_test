<?php
namespace Application\Controllers;

use Application\Core\Controller;
use Application\Core\View;
use Application\Core\Route;
use Application\Models\User;

class Logout extends Controller
{
    public function __construct()
    {
        $this->user_model = new User();
    }

    public function actionIndex()
    {
        $this->user_model->logout();
        Route::redirect(HOME_URL);
    }
}
