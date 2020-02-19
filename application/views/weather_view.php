<div class="jumbotron">
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
</div>