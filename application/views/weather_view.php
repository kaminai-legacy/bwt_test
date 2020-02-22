<div class="jumbotron without-bg">
    <h1 class="display-4">Погода в Запорожье</h1>
    <p class="lead">
        <h4>
                <?
                $date = date_parse_from_format("Y-m-d H:i:s",$data->weather["date"]["local"]);
                echo "За " . $date["day"] . " " . LIST_OF_MONTHS[$date["month"]-1] . " cостоянием на  " . $date["hour"] . ":00";
                ?>
        </h4>  
    </p>
    <hr class="my-4">
    <p>
        <div class="weather-parameters">
            <div class="weather-column wether-another-parameters">
                    <div class="weather-parameter weather-pressure">
                        <?="Давление : " . $data->weather["pressure"]["mm_hg_atm"] . "мм"?>   
                    </div>
                    <div class="weather-parameter weather-humidity">
                        <?="Влажность " . $data->weather["humidity"]["percent"] . "%"?>       
                    </div>
                    <div class="weather-parameter weather-wind">
                        <?="Ветер " . $data->weather["wind"]["speed"]["m_s"] . "м/с"?>
                    </div>
                </div>
                <div class="weather-column">

                <div class="card card-weather" style="width: 18rem;">
                    <div class="card-body">
                        <img class="" style="width: 15rem;" src=<?="/img/weather_icon/" . $data->weather["icon"] . ".svg"?>>   
                        <div class="weather-parameter weather-description">
                            <?=$data->weather["temperature"]["air"]["C"] . "°C " . $data->weather["description"]["full"]?>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </p>
</div>