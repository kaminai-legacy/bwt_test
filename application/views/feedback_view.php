<?php if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) ): ?>
    <?foreach($data->contain as $key=>$value):?>
        <div class="container">
            <div class="<?
                    if($_SESSION["user"]["id"]==$value["user_id"])
                    {
                        echo 'row justify-content-end';
                    }   
                    else
                    {
                        echo 'row justify-content-start';
                    }       
                ?>"
                >
                <div class="col-sm-10">
                    <div class="panel panel-default <?if($_SESSION["user"]["id"]==$value["user_id"])
                    {
                        echo 'itself-feedback';
                    }   
                    else
                    {
                        echo '';
                    }       
                ?>" 
                >
                        <div class="panel-heading">
                            <?php if ($_SESSION["user"]["id"]==$value["user_id"]): ?>
                                <strong>
                                    <?="Вы"?>
                                </strong>
                            <?php else: ?>
                                <strong>
                                    <?= $value["name"]?>
                                </strong>
                                <span class="text-muted">
                                    (<?= $value["email"]?>)
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="panel-body">
                            <?= $value["text"]?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?endforeach;?>
<div class="container">
    <div class="row justify-content-center">
        <nav aria-label="Page navigation example" style="display: inline-flex;">
            <ul class="pagination" style="display: inline-flex;">
                <li class="page-item <?if($data->current_page-1 <= 0){ echo "disabled";}?>">
                    <a class="page-link" href=<?=$data->current_page-1?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?for($i = $data->fist_page_for_pagination; $i <= $data->last_page_for_pagination; $i++):?>
                    <li class="page-item <?if($data->current_page == $i){ echo "disabled";}?> <?if($data->current_page == $i){ echo "active";}?>">
                        <a 
                        class="page-link"  
                        style="<?if($data->current_page == $i){ echo "color: #fff;background-color: #007bff;border-color: #007bff;";}?>" 
                        href=<?= $i?>>
                            <?= $i?>
                        </a>
                    </li>
                <?endfor;?>
                <li class="page-item <?if($data->current_page+1 > $data->last_page_for_pagination){ echo "disabled";}?>">
                    <a class="page-link" href=<?=$data->current_page+1?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<hr/>
<form method="post" class="form" id="feedback">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="feedback-name">Имя пользователя</label>
            <input type="text" class="form-control" id="feedback-name" placeholder="Имя" value="" data-validation="name" name="name" required>
            <div class="invalid-feedback" id="error-feedback-name">
                Some text
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="feedback-email">Email пользователя</label>
            <input type="email" class="form-control" id="feedback-email" placeholder="Email" value="" data-validation="email" name="email" required>
            <div class="invalid-feedback" id="error-feedback-email">
                Some text
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label for="feedback-contain">Отзыв</label>
            <textarea type="text" class="form-control" id="feedback-contain" placeholder="Отзыв, все очень круто" value="" data-validation="contain" name="contain" required></textarea>
            <div class="invalid-feedback" id="error-feedback-contain">
                Some text   
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">    
                <img src="/captcha/captcha.php" style="border:1px solid black;"/>
        </div>
        <div class="row justify-content-center top-margin">
            <div class="col-md-3 mb-3">
                <input type="text" class="form-control" id="feedback-captcha" placeholder="Текст с картинки выше" value="" data-validation="captcha" name="captcha" required>
                <div class="invalid-feedback" id="error-feedback-captcha">
                    Some text   
                </div>
            </div>
        </div>
    </div>

    <div class="btn-wrapper">
        <input type="submit" class="btn btn-primary" name="feedback-submit" id="feedback-submit" value="Оставить отзыв"/>
        <?php if ( ( !( empty($data->error_message) ) ) &&  ( isset($data->error_message) ) ): ?>
            <br/>
            <div class="alert alert-danger top-margin" role="alert">
                <?=$data->error_message?>
            </div>
        <?php endif; ?>
    </div>
</div>
</form>
<?php else: ?>
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Для просмотра этой страницы, вы должны <a class="p-2 bolder dark-blue" href=<?= AUTHORIZATION_URL?>>Авторизоватся</a>
            </h4>
        </div>
    </div>
<?php endif; ?>