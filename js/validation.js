// старница с инициализацией валидации для клиента
const forms = document.querySelectorAll("form");

// Отображения ошибки под полем
const set_error = (input,message="empty") =>
{
    const error = document.querySelector(`#error-${input.getAttribute("id")}`);
    const form = document.querySelector(`#${input.getAttribute("id").split("-")[0]}`);
    const submit = document.querySelector(`#${input.getAttribute("id").split("-")[0]}-submit`);
    add_string_value_to_attribute(form,"has_error",input.getAttribute("id").split("-")[1]);
    if(error)
    {
       error.innerHTML=`${message}`;
    }
    
    $(`#${input.getAttribute("id")}`).removeClass("is-invalid").addClass("is-invalid");
    submit.setAttribute("disabled", "disabled");
};

// Скрытие ошибки под полем
const delete_error = (input) =>
{
    const form = document.querySelector(`#${input.getAttribute("id").split("-")[0]}`);
    remove_string_value_from_attribute(form,"has_error",input.getAttribute("id").split("-")[1]);
    const has_error = form.getAttribute("has_error");
    if(has_error.length == 0 )
    {
        const submit = document.querySelector(`#${input.getAttribute("id").split("-")[0]}-submit`);
        submit.removeAttribute("disabled");
    }
    $(`#${input.getAttribute("id")}`).removeClass( "is-invalid" );
};

// Проверка поля по всем правилам
const check_field_by_rules = (input,rules) =>
{
    delete_error(input);
    if(!input.value)
        {
            set_error(input,"Поле пустое, сначала заполните его");
        };
    for(let key in rules)
    {
        switch(key)
        {
            case"min_length":
                if(input.value.length < rules["min_length"]["value"])
                {

                    set_error(input,rules["min_length"]["error_message"]);
                }
            break;
            case"max_length":
                if(input.value.length > rules["max_length"]["value"])
                {
                    set_error(input,rules["max_length"]["error_message"]);
                }
            break;
            case"match":
                if(!input.value.match(rules["match"]["value"]))
                {
                    set_error(input,rules["match"]["error_message"]);
                }
            break;
        }
    }
};

// Навешивание обработчика проверки на поля
const handle_check_function = (e) =>
{
    const {target} = e;
    const form = document.querySelector(`#${target.getAttribute("id").split("-")[0]}`);
    const inputs = deep_search("input",form);
    const selects = deep_search("select",form);
    const textareas = deep_search("textarea",form);

    const fields = [...inputs, ...selects, ...textareas];

    for(let field of fields)
    {
        if((field.nodeType == 1) && (field.getAttribute("type") != "submit") && (field.getAttribute("visited") == "true"))
        {
            const {validation:type_of_validation} = field.dataset;
            try
            {
                switch(type_of_validation)
                {
                    case"name":
                        const {name:rules_name} = FORM_VALIDATION_RULES;
                        check_field_by_rules(field,rules_name);
                    break;
                    
                    case"forename":
                        const {forename:rules_forename} = FORM_VALIDATION_RULES;
                        check_field_by_rules(field,rules_forename);
                    break;
                    case"password":
                        const {password:rules_password} = FORM_VALIDATION_RULES;
                        check_field_by_rules(field,rules_password);
                    break;
                    case"confirm_password":
                        delete_error(field);
                        if(!field.value)
                        {
                            throw "Поле пустое, сначала заполните его";
                        }
                        const id_password = field.getAttribute("id").replace("confirm_password", "password");
                        const password = document.querySelector(`#${id_password}`);
                        if(password.value != field.value)
                        {
                            set_error(field,`Пароли не совпадают`);
                        }
                    break;
                    case"contain":
                        const {feedback:rules_feedback} = FORM_VALIDATION_RULES;
                        check_field_by_rules(field,rules_feedback);
                    break;
                    case"email":
                        const {email:rules_email} = FORM_VALIDATION_RULES;
                        check_field_by_rules(field,rules_email);
                    break;
                    case"captcha":
                    const {captcha:rules_captcha} = FORM_VALIDATION_RULES;
                    check_field_by_rules(field,rules_captcha);
                break;
                    default:;
                }
            }
            catch(e)
            {
                set_error(field,e);
            };
        }
    }

};

const add_visited_attribute = (e) =>
{
    const {target} = e;
    if(!target.getAttribute("visited"))
    {
        target.setAttribute("visited",true);
    }
}

const call_element_event_onchange = (e) =>
{
    const {target} = e;
    const event = new Event('change',{"bubbles":true});
    target.dispatchEvent(event);
}

// Навешивание обработчиков на формы
for(let form of forms)
{
    form.addEventListener("change",handle_check_function);
    form.addEventListener("blur",handle_check_function);

    const inputs = deep_search("input",form);
    const selects = deep_search("select",form);
    const textareas = deep_search("textarea",form);

    for(let input of inputs)
    {
        if(input.getAttribute("type") != "submit")
        {
            input.addEventListener("focus",add_visited_attribute);
            input.addEventListener("blur",call_element_event_onchange);
        }
    }

    for(let select of selects)
    {     
        if(select.getAttribute("type") != "submit")
        {
            select.addEventListener("focus",add_visited_attribute);
            select.addEventListener("blur",call_element_event_onchange);
        }   
    }

    for(let textarea of textareas)
    {
        if(textarea.getAttribute("type") != "submit")
        {
            textarea.addEventListener("focus",add_visited_attribute);
            textarea.addEventListener("blur",call_element_event_onchange);
        }
    }
}