<?php
namespace Application\Controllers;

use Application\Core\Controller;
use Application\Core\View;
use Application\Core\Route;
use Application\Models\User;
use Application\Models\Authorization as AuthorizationModel;
use Application\Validator\Validator;

class Authorization extends Controller
{
    public function __construct()
    {
        $this->model = new AuthorizationModel();
        $this->user_model = new User();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $data = (object)[];

        if ((!(empty($_SESSION["user"]))) &&  (isset($_SESSION["user"]))) {
            Route::redirect(HOME_URL);
        }
        
        if ((!(empty($_POST["authorization-submit"]))) && (isset($_POST["authorization-submit"]))) {
            if (
                (!(empty($_POST["email"]))) && (isset($_POST["email"])) &&
                (!(empty($_POST["password"]))) && (isset($_POST["password"]))
            ) {
                $password = $_POST["password"];
                $email = $_POST["email"];

                $fields_for_validator = [
                    [
                        "password",
                        $password,
                        "password",
                        6,
                        40,
                        (object)[
                            "value"=>'/([a-z0-9]){6,}/i',
                            "error_message"=>"Пароль должены быть из цифр или латинских букв",
                        ]
                    ],
                    [
                        "email",
                        $email,
                        "email"
                    ]
                ];

                $validator = new Validator($fields_for_validator);
                $reslt_of_validation = $validator->hasFieldsError();

                if ($reslt_of_validation) {
                    $data->error_message = "В полях допущены ошибки";
                } else {
                    $this->user_model->authorization($email, $password);
                    Route::redirect(HOME_URL);
                }
            } else {
                $data->error_message = "В полях допущены ошибки";
            }
        }

        $data->current_page = AUTHORIZATION_URL;
        $this->view->generate('authorization.php', 'template.php', $data);
    }
}
