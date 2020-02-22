const forms = document.querySelectorAll("form");

const set_error = (input,message="empty") =>
{
    const error = document.querySelector(`#error-${input.getAttribute("id")}`);
    const form = document.querySelector(`#${input.getAttribute("id").split("-")[0]}`);
    add_string_value_to_attribute(form,"has_error",input.getAttribute("id").split("-")[1]);
    const submit = document.querySelector(`#${input.getAttribute("id").split("-")[0]}-submit`);
    if(error)
    {
        error.innerHTML=`${message}`;
    }
    $(`#${input.getAttribute("id")}`).removeClass( "is-invalid").addClass( "is-invalid");
    submit.setAttribute("disabled", "disabled");
};

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

const check_field_by_rules = (input,rules) =>
{
    for(let key in rules)
    {
        switch(key)
        {
            case"min_length":
                if(input.value.length < rules["min_length"])
                {
                    set_error(input,`Использовано меньше ${rules["min_length"]} символов`);
                    throw `Использовано меньше ${rules["min_length"]} символов`;
                }
            break;
            case"max_length":
                if(input.value.length > rules["max_length"])
                {
                    set_error(input,`Использовано больше ${rules["max_length"]} символов`);
                    throw `Использовано больше ${rules["max_length"]} символов`;
                }
            break;
            case"match":
                if(!input.value.match(rules["match"]))
                {

                    set_error(input, `несовпадение шаблона`);
                    throw `несовпадение шаблона`;
                }
            break;
        }
    }
};

const handle_check_function = (e) =>
{
    const {target} = e;
    const {validation:type_of_validation} = target.dataset;
    try
    {
        if(!target.value)
        {
            throw "Поле пустое, сначала заполните его";
        };
        delete_error(target);
        switch(type_of_validation)
        {
            case"name":
                const {name:rules_name} = FORM_VALIDATION_RULES;
                check_field_by_rules(target,rules_name);
            break;
            
            case"forename":
                const {forename:rules_forename} = FORM_VALIDATION_RULES;
                check_field_by_rules(target,rules_forename);
            break;
            case"password":
                const {password:rules_password} = FORM_VALIDATION_RULES;
                check_field_by_rules(target,rules_password);
            break;
            case"confirm_pass":
                const id_password = target.getAttribute("id").replace("confirm_pass", "password");
                const password = document.querySelector(`#${id_password}`);
                if(password.value != target.value)
                {
                    set_error(target,`Пароли не совпадают`);
                }
            break;
            case"feedback":
                const {feedback:rules_feedback} = FORM_VALIDATION_RULES;
                check_field_by_rules(target,rules_feedback);
            break;
            case"email":
                const {email:rules_email} = FORM_VALIDATION_RULES;
                check_field_by_rules(target,rules_email);
            break;
            default:;
        }
    }
    catch(e)
    {
        set_error(target,e);
    };
};


const add_validation_on_form_element = (element) =>
{
    if((element.nodeType == 1) && (element.getAttribute("type") != "submit"))
       {
        set_error(element);
        delete_error(element);
        element.addEventListener("focus",(e)=>
        {
            const {target} = e;
            delete_error(target);
        })

        element.addEventListener("change",handle_check_function);
        element.addEventListener("blur",handle_check_function);
       }
}

for(let form of forms)
{
    const inputs = deep_search("input",form);

    const selects = deep_search("select",form);

    const textareas = deep_search("textarea",form);

    for(let input of inputs)
    {
       
        add_validation_on_form_element(input);

    }

    for(let select of selects)
    {
        if(select.nodeType == 1)
        {
            add_validation_on_form_element(select);
        }
    }

    for(let textarea of textareas)
    {
        if(textarea.nodeType == 1)
        {
            add_validation_on_form_element(textarea);
        }
    }
}