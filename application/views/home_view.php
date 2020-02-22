
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

                
<div class="container">
    <div class="row justify-content-center">
        <h5> Добро пожаловать</h5>
    </div>
    <div class="row justify-content-center">
        <p>BWT test - это перспективный проект</p>
    </div>
    <div class="row justify-content-between">
        <div class="col-md-3 mb-3 article">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Мы сайт погоды</h5>
                    <p class="card-text">Здесь вы можете просмотреть погоду в Запорожье на текущий момент</p>
                    <div class="row justify-content-center">
                        <a href=<?= WEATHER_URL?> class="btn btn-primary">
                            Погода
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3 article">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Нам важно ваше мнение</h5>
                    <p class="card-text"> Не скупитесь на отзывы, они помогают нам становится лучше, ведь мы внимательно просматриваем каждый и берем все сказаное во внимание</p>
                    <div class="row justify-content-center">
                        <a href=<?= FEEDBACK_URL?> class="btn btn-primary">
                            Отзывы
                        </a>     
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
