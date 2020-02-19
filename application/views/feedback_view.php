<form method="post" class="form">
<div class="form-group">

<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Имя пользователя:</span>
    <input type="text" class="form-control" placeholder="Ваше имя" aria-describedby="basic-addon1" data-validation="name" name="name">
</div>
<div class="alert alert-danger" role="alert" id="name-error" class="input-error"></div>

<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Email пользователя:</span>
    <input type="text" class="form-control" placeholder="Ваша почта" aria-describedby="basic-addon1" data-validation="email" name="email">
</div>
<div class="alert alert-danger" role="alert" id="email-error" class="input-error"></div>

<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Отзыв:</span>
    <input type="text" class="form-control" placeholder="Отзыв, все очень круто" aria-describedby="basic-addon1" data-validation="feedback" name="feedback">
</div>
<div class="alert alert-danger" role="alert" id="feedback-error" class="input-error"></div>

<div class="btn-wrapper">
<input type="submit" class="btn btn-default" name="feedback-submit" value="Оставить отзыв"/>
</div>

</div>
</form>