<div class="container">
    <div class="row justify-content-center">
        <h5> Добро пожаловать</h5>
    </div>
    <div class="row justify-content-center">
        <p>BWT test - это перспективный проект</p>
    </div>
    <div class="row justify-content-center">
        <div class="card main_weather_forecast"></div>
    </div>
    <div class="row justify-content-between">
        <div class="col-md-3 mb-3 article sized-element">
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
        <div class="col-md-3 mb-3 article sized-element">
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
