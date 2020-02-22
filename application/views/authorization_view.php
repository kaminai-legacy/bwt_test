<form method="post" class="form">
    <div class="form-row justify-content-md-center">
        <p>Ещё не зарегистрирован тогда тебе сюда<a class="p-2 text-dark bolder" href=<?= REGISTRATION_URL?>>Регистрация</a></p>
    </div>
<div class="form-row justify-content-md-center">
        <div class="col-md-4 mb-3">
            <label for="validationServer01">Email пользователя</label>
            <input type="email" class="form-control" id="validationServer01" placeholder="Email" value="" data-validation="email" name="email" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
</div>
<div class="form-row justify-content-md-center">
        <div class="col-md-4 mb-3">
            <label for="validationServer01">Пароль пользователя</label>
            <input type="password" class="form-control" id="validationServer01" placeholder="пароль" value="" data-validation="password" name="password" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
</div>

<div class="btn-wrapper">
        <input type="submit" class="btn btn-primary" name="authorization-submit" value="Авторизоваться"/>
    </div>

</div>
</form>