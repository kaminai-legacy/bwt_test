<form class="form" method="post">
    <div class="form-row justify-content-md-center">
        <p>Уже зарегистрирован тогда тебе сюда<a class="p-2 text-dark bolder" href=<?= AUTHORIZATION_URL?>>Авторизация</a></p>
    </div>

    <div class="form-row justify-content-md-center">
        <div class="col-md-4     mb-3">
            <label for="validationServer01">Имя пользователя</label>
            <input type="text" class="form-control" id="validationServer01" placeholder="Имя"  value="" data-validation="name" name="name" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationServer01">Фамилия пользователя</label>
            <input type="text" class="form-control" id="validationServer01" placeholder="Фамилия" value="" data-validation="forename" name="forename" required>
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
            <label for="validationServer01">Email пользователя</label>
            <input type="email" class="form-control" id="validationServer01" placeholder="Email" value="" data-validation="email" name="email" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <label for="validationServer09">Пол пользователя</label>
            <select id="company" class="form-control" data-validation="gender" name="gender" data-validation="gender" name="gender"  id="validationServer09">
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


                <!-- <option value="0" selected>не выбрано</option>
                <option value="male">male</option>
                <option value="female">female</option> -->
            </select> 
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a valid gender.
            </div>	
        </div>

        <div class="col-md-2 mb-3">
            <label for="validationServer01">День рождения</label>
            <input type="date" class="form-control" id="validationServer01" value="" name="birthday" data-validation="birthday" name="birthday">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback"  id="birthday-error">
                Please choose a username.
            </div>
        </div>
    </div>


  
    <div class="form-row justify-content-md-center">
        <div class="col-md-4 mb-3">
            <label for="validationServer01">Пароль</label>
            <input type="password" class="form-control" id="validationServer01" placeholder="пароль" data-validation="password" name="password" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationServer01">Подтверждение пароля</label>
            <input type="password" class="form-control" id="validationServer01" placeholder="пароль" data-validation="confirm_password" name="confirm_password" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
    </div>
    <div class="btn-wrapper">
        <input type="submit" class="btn btn-primary" name="registration-submit" value="Зарегистрироваться"/>
    </div>
</form>