<form method="post" class="form" id="authorization">
    <div class="form-row justify-content-md-center">
        <p>Ещё не зарегистрирован тогда тебе сюда<a class="p-2 bolder dark-blue" href=<?= REGISTRATION_URL?>>Регистрация</a></p>
    </div>
    <div class="form-row justify-content-md-center">
        <div class="col-md-4 mb-3">
            <label for="authorization-email">Email пользователя</label>
            <input type="email" class="form-control" id="authorization-email" placeholder="Email" value="" data-validation="email" name="email" required>
            <div class="invalid-feedback" id="error-authorization-email">
                Some error
            </div>
        </div>
    </div>
    <div class="form-row justify-content-md-center">
        <div class="col-md-4 mb-3">
            <label for="authorization-password">Пароль пользователя</label>
            <input type="password" class="form-control" id="authorization-password" placeholder="пароль" value="" data-validation="password" name="password" required>
            <div class="invalid-feedback" id="error-authorization-password">
                Some error
            </div>
        </div>
      </div>
    <div class="btn-wrapper">
        <input type="submit" class="btn btn-primary" id="authorization-submit" name="authorization-submit" value="Авторизоваться"/>
        <?php if ((!(empty($data->error_message))) && (isset($data->error_message))): ?>
            <br/>
            <div class="alert alert-danger top-margin" role="alert">
                <?=$data->error_message?>
            </div>
        <?php endif; ?>
    </div>
</form>