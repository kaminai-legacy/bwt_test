<form class="form" method="post" id="registration">
    <div class="form-row justify-content-md-center">
        <p>Уже зарегистрирован тогда тебе сюда<a class="p-2 text-dark bolder" href=<?= AUTHORIZATION_URL?>>Авторизация</a></p>
    </div>

    <div class="form-row justify-content-md-center">
        <div class="col-md-4     mb-3">
            <label for="registration-name">Имя пользователя</label>
            <input type="text" class="form-control" id="registration-name" placeholder="Имя"  value="" data-validation="name" name="name" required>
            <div class="invalid-feedback" id="error-registration-name">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="registration-forename">Фамилия пользователя</label>
            <input type="text" class="form-control" id="registration-forename" placeholder="Фамилия" value="" data-validation="forename" name="forename" required>
            <div class="invalid-feedback" id="error-registration-forename">
                Please choose a username.
            </div>
        </div>
    </div>

    <div class="form-row justify-content-md-center">
        <div class="col-md-4 mb-3">
            <label for="registration-email">Email пользователя</label>
            <input type="email" class="form-control" id="registration-email" placeholder="Email" value="" data-validation="email" name="email" required>
            <div class="invalid-feedback" id="error-registration-email">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <label for="registration-gender">Пол пользователя</label>
            <select class="form-control" data-validation="gender" id="registration-gender" name="gender" data-validation="gender" name="gender">
                <?
                    foreach($data->genders as $id=>$value)
                    {
                        ?>
                            <option 
                                value=<?=$value["id"]?> 
                                <? if($value["name"] == "не выбран"){echo "selected";}?>
                            >
                                <?=$value["name"]?>
                            </option>
                        <?
                    }
                ?>
            </select> 
            <div class="invalid-feedback" id="error-registration-gender">
                Please provide a valid gender.
            </div>	
        </div>

        <div class="col-md-2 mb-3">
            <label for="registration-birthday">День рождения</label>
            <input type="date" class="form-control" id="registration-birthday" value="" name="birthday" data-validation="birthday" name="birthday">
            <div class="invalid-feedback"  id="error-registration-birthday">
                Please choose a username.
            </div>
        </div>
    </div>


  
    <div class="form-row justify-content-md-center">
        <div class="col-md-4 mb-3">
            <label for="registration-password">Пароль</label>
            <input type="password" class="form-control" id="registration-password" placeholder="пароль" data-validation="password" name="password" value="" required>
            <div class="invalid-feedback" id="error-registration-password">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="registration-confirm_pass">Подтверждение пароля</label>
            <input type="password" class="form-control" id="registration-confirm_pass" placeholder="пароль" data-validation="confirm_pass" name="confirm_pass" value="" required>
            <div class="invalid-feedback" id="error-registration-confirm_pass">
                Please choose a username.
            </div>
        </div>
    </div>
    <div class="btn-wrapper">
        <input type="submit" class="btn btn-primary" id="registration-submit" name="registration-submit" value="Зарегистрироваться"/>
    </div>
</form>