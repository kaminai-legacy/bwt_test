
	<form class="form" method="post">

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

</form>