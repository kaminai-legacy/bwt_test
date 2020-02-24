// Параметры валидации для клиента
const FORM_VALIDATION_RULES = 
{
    "email":
    {
        "min_length":
        {
            "value":3,
            "error_message":"Поле имеет длину меньше 3 симолов",
        },
        "max_length":
        {
            "value":40,
            "error_message":"Поле имеет длину больше 3 симолов",
        },
        "match":
        {
            "value":/([-\.a-z0-9])*?@([a-z])+?([-\.a-z0-9])*?\.??([-\.a-z0-9])*/ig,
            "error_message":"Не подходящий email",
        },
    },
    "name":
    {
        "min_length":
        {
            "value":3,
            "error_message":"Поле имеет длину меньше 3 симолов",
        },
        "max_length":
        {
            "value":40,
            "error_message":"Поле имеет длину больше 40 симолов",
        },
    },
    "forename":
    {
        "min_length":
        {
            "value":3,
            "error_message":"Поле имеет длину меньше 3 симолов",
        },
        "max_length":
        {
            "value":40,
            "error_message":"Поле имеет длину больше 40 симолов",
        },
    },
    "feedback":
    {
        
    },
    "captcha":
    {
        
    },
    "password":
    {
        "min_length":
        {
            "value":6,
            "error_message":"Поле имеет длину меньше 6 симолов",
        },
        "max_length":
        {
            "value":40,
            "error_message":"Поле имеет длину больше 40 симолов",
        },
        "match":
        {
            "value":/^([a-z0-9]){6,}$/ig,
            "error_message":"Пароль должены быть из цифры или латинские буквы",
        },
    },
};