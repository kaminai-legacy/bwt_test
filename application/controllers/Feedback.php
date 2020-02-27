<?php
namespace Application\Controllers;

use Application\Core\Controller;
use Application\Core\View;
use Application\Core\Route;
use Application\Models\Feedback as FeedbackModel;
use Application\Captcha\Captcha;
use Application\Validator\Validator;

class Feedback extends Controller
{
    public function __construct()
    {
        $this->model = new FeedbackModel();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $data = (object)[];
        $data->current_page = FEEDBACK_URL;

        if ((!(empty($_POST["feedback-submit"]))) && (isset($_POST["feedback-submit"]))) {
            if (
                (!(empty($_POST["name"]))) && (isset($_POST["name"])) &&
                (!(empty($_POST["email"]))) && (isset($_POST["email"])) &&
                (!(empty($_POST["contain"]))) && (isset($_POST["contain"])) &&
                (!(empty($_POST["captcha"]))) && (isset($_POST["captcha"]))
            ) {
                $email = $_POST["email"];
                $name = $_POST["name"];
                $contain = $_POST["contain"];
                $captcha = $_POST["captcha"];

                $fields_for_validator = [
                    [
                        "name",
                        $name,
                        "text",
                        2,
                        40
                    ],
                    [
                        "contain",
                        $contain,
                        "text",
                        4,
                        40
                    ],
                    [
                        "email",
                        $email,
                        "email"
                    ]
                ];

                $validator = new Validator($fields_for_validator);
                $reslt_of_validation = $validator->checkHasFieldsError();

                if ($reslt_of_validation) {
                    $data->error_message = "В полях допущены ошибки";
                } else {
                    if (!Captcha::check($captcha)) {
                        $data->error_message = "Капча введена неправильно";
                    } else {
                        $this->model->sendFeedback($name, $email, $contain);
                        Route::redirect(FEEDBACK_LIST_URL);
                    }
                }
            } else {
                $data->error_message = "В полях допущены ошибки";
            }
        }

        $data->captcha_source = Captcha::html('style="border:1px solid black;"');
        $this->view->generate('feedback.php', 'template.php', $data);
    }

    public function actionList($page=1)
    {
        $data = (object)[];
        
        $data->current_page = FEEDBACK_LIST_URL;
        $data->current_page = $page;

        if ((!(empty($_SESSION["user"]))) &&  (isset($_SESSION["user"]))) {
            $number_of_pages = $this->model->getCount();

            $expected_fist_page_for_pagination = $data->current_page-floor(NUMBER_FEEDBACKS_FOR_PAGINATION / 2);

            if ($expected_fist_page_for_pagination <= 0) {
                $data->fist_page_for_pagination = 1;
            } else {
                $data->fist_page_for_pagination = $expected_fist_page_for_pagination;
            }

            if ($number_of_pages >= NUMBER_FEEDBACKS_FOR_PAGINATION) {
                $data->last_page_for_pagination = $data->fist_page_for_pagination + NUMBER_FEEDBACKS_FOR_PAGINATION - 1;
                while ($data->last_page_for_pagination > $number_of_pages) {
                    $data->last_page_for_pagination--;
                    $data->fist_page_for_pagination--;
                }
            } else {
                $data->last_page_for_pagination = $data->fist_page_for_pagination + $number_of_pages - 1;
            }

            $data->contain=$this->model->pagin($page);
        }

        $this->view->generate('feedback_list.php', 'template.php', $data);
    }
}
