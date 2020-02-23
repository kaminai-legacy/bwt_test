<?php if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) ): ?>
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
        <input type="submit" class="btn btn-primary" name="feedback-submit" id="feedback-submit" value="Отправить отзыв"/>
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