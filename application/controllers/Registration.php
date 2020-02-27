<?php
namespace Application\Controllers;

use Application\Core\Controller;
use Application\Core\View;
use Application\Core\Route;
use Application\Models\User;
use Application\Models\Registration as RegistrationModel;
use Application\Validator\Validator;

class Registration extends Controller
{
    public function __construct()
    {
        $this->model = new RegistrationModel();
        $this->user_model = new User();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $data = (object) [];

        if ((!(empty($_SESSION['user']))) && (isset($_SESSION['user']))) {
            Route::redirect(HOME_URL);
        }

        if ((!(empty($_POST['registration-submit']))) && (isset($_POST['registration-submit']))) {
            if (
                (!(empty($_POST['name']))) && (isset($_POST['name'])) &&
                (!(empty($_POST['forename']))) && (isset($_POST['forename'])) &&
                (!(empty($_POST['email']))) && (isset($_POST['email'])) &&
                (!(empty($_POST['password']))) && (isset($_POST['password'])) &&
                (!(empty($_POST['confirm_password']))) && (isset($_POST['confirm_password']))
            ) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $forename = $_POST['forename'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                $fields_for_validator = [
                    [
                        'password',
                        $password,
                        'password',
                        6,
                        40,
                        (object) [
                            'value' => '/([a-z0-9]){6,}/i',
                            'error_message' => 'Пароль должены быть из цифр или латинских букв',
                        ],
                    ],
                    [
                        'confirm_password',
                        $confirm_password,
                        'password',
                        6,
                        40,
                        (object) [
                            'value' => '/([a-z0-9]){6,}/i',
                            'error_message' => 'Пароль должены быть из цифр или латинских букв',
                        ],
                    ],
                    [
                        'name',
                        $name,
                        'text',
                        2,
                        40,
                    ],
                    [
                        'forename',
                        $forename,
                        'text',
                        2,
                        40,
                    ],
                    [
                        'email',
                        $email,
                        'email',
                    ],
                ];

                $validator = new Validator($fields_for_validator);
                $reslt_of_validation = $validator-> checkHasFieldsError();

                $confirm_password_error = $validator->getFieldByName('confirm_password')->hasConfirmError($password);

                if ($reslt_of_validation || $confirm_password_error) {
                    $data->error_message = 'В полях допущены ошибки';
                } else {
                    $this->user_model->registration($name, $forename, $email, $password, $_POST['gender'], $_POST['birthday']);
                    Route::redirect(HOME_URL);
                }
            } else {
                $data->error_message = 'В полях допущены ошибки';
            }
        }

        $data->current_page = REGISTRATION_URL;
        $data->genders = $this->model->getGenders();
        $this->view->generate('registration.php', 'template.php', $data);
    }
}
