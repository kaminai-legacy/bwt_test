
	<!-- <form class="form" method="post">

<div class="form-group">

    <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Имя пользователя:</span>
    <input type="text" class="form-control" placeholder="Ваше имя" aria-describedby="basic-addon1" data-validation="name" name="name">
    </div>
    <div class="alert alert-danger" role="alert" id="name-error" class="input-error"></div>

    <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Фамилия пользователя:</span>
    <input type="text" class="form-control" placeholder="Ваша фамилия" aria-describedby="basic-addon1" data-validation="forename" name="forename">

    </div>
    <div class="alert alert-danger" role="alert" id="forename-error" class="input-error"></div>

    <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Email пользователя:</span>
    <input type="text" class="form-control" placeholder="Ваша почта" aria-describedby="basic-addon1" data-validation="email" name="email">
    
    </div>
    <div class="alert alert-danger" role="alert" id="email-error" class="input-error"></div>

    <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Пол пользователя:</span>
        <select id="company" class="form-control" data-validation="gender" name="gender">
        <option value="male">male</option>
        <option value="female">female</option>
        <option value="" checked>не выбрано</option>
        </select> 	
    </div>
    <div class="alert alert-danger" role="alert" id="gender-error" class="input-error"></div>


    <div class="input-group">
        <label for="inputDate">День рождения пользователя:</label>
        <span><input type="date" class="form-control"  data-validation="birthday" name="birthday"></span>
        <div class="alert alert-danger" role="alert" id="birthday-error" class="input-error"></div>
    </div>

</div>

<div class="btn-wrapper">
<input type="submit" class="btn btn-default" name="feedback-submit" value="Оставить отзыв"/>
</div>

</form> -->



<form class="form" method="post">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Имя пользователя</label>
            <input type="text" class="form-control" id="validationServer01" placeholder="Имя" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="validationServer01">Фамилия пользователя</label>
            <input type="text" class="form-control" id="validationServer01" placeholder="Фамилия" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Email пользователя</label>
            <input type="email" class="form-control" id="validationServer01" placeholder="Email" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="validationServer09">Пол пользователя</label>
            <select id="company" class="form-control" data-validation="gender" name="gender" value="0"  id="validationServer09">
                <option value="0" selected>не выбрано</option>
                <option value="male">male</option>
                <option value="female">female</option>
            </select> 
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please provide a valid gender.
            </div>	
        </div>

        <div class="col-md-3 mb-3">
            <label for="validationServer01">День рождения</label>
            <input type="date" class="form-control" id="validationServer01" placeholder="Email" value="" name="birthday" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback"  id="birthday-error">
                Please choose a username.
            </div>
        </div>
    </div>


  
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Пароль</label>
            <input type="password" class="form-control" id="validationServer01" placeholder="пароль" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="validationServer01">Подтверждение пароля</label>
            <input type="password" class="form-control" id="validationServer01" placeholder="пароль" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
    </div>
    <div class="btn-wrapper">
        <input type="submit" class="btn btn-primary" name="feedback-submit" value="Оставить отзыв"/>
    </div>
</form>