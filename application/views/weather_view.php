<!-- <div class="jumbotron">
    <div class="weather-container">
        <h1>Погода в Запорожье</h1>
        <h3>
            <?
            $date = date_parse_from_format("Y-m-d H:i:s",$data->weather["date"]["local"]);
            echo "За " . $date["day"] . " " . LIST_OF_MONTHS[$date["month"]-1] . " cостоянием на  " . $date["hour"] . ":00";
            ?>
        </h3>
        <div class="weather-parameters">
            <div class="weather-column">
                <div class="weather-parameter weather-temperature">
                    <?="Температура воздуха " . $data->weather["temperature"]["air"]["C"] . "°"?>
                </div>
                <div class="weather-parameter weather-temperature_by_feeling">
                    <?="Чувствуется как " . $data->weather["temperature"]["comfort"]["C"] . "°"?>  
                </div>
                <div class="weather-parameter weather-pressure">
                    <?="Давление воздуха составляет " . $data->weather["pressure"]["mm_hg_atm"] . "мм ртутного столба"?>   
                </div>
            </div>
            <div class="weather-column">
                <div class="weather-parameter weather-humidity">
                    <?="Влажность " . $data->weather["humidity"]["percent"] . "%"?>       
                </div>
                <div class="weather-parameter weather-wind">
                    <?="Ветер " . $data->weather["wind"]["speed"]["m_s"] . "м/с"?>
                </div>
                <div class="weather-parameter weather-description">
                    <?="Общее описание " . $data->weather["description"]["full"]?>
                </div>
            
            </div>
            <div class="weather-column">
            <img class="weather-icon weather-parameter" src=<?="/img/new/" . $data->weather["icon"] . ".svg"?>>
            </div>  
        </div>
    </div>
</div> -->

<div class="jumbotron">
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
            <div class="weather-column">
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
                  
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                       
                            <img class="" style="width: 15rem;" src=<?="/img/weather_icon/" . $data->weather["icon"] . ".svg"?>>   
                            <div class="weather-parameter weather-description">
                            <?=$data->weather["temperature"]["air"]["C"] . "°C " . $data->weather["description"]["full"]?>
                            </div>
                      
                    </div>
                </div>

                <!-- <img class="weather-icon weather-parameter" src=<?="/img/new/" . $data->weather["icon"] . ".svg"?>> -->
            </div>  
        </div>
    </p>
    <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
</div>