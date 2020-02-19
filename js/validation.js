const forms = document.querySelectorAll("form");


const set_error = (input,message="empty") =>
{
    const error = document.querySelector(`#${input.getAttribute("name")}-error`);
    console.log(error,`#${input.getAttribute("name")}-error`);
    if(error)
    {
        error.style.display="block";
        error.innerHTML=`${message}`;
    }
};

const delete_error = (input) =>
{
    const error = document.querySelector(`#${input.getAttribute("name")}-error`);
    console.log(error,`#${input.getAttribute("name")}-error`);
    if(error)
    {
        error.style.display="none";
    }
};

const add_validation_on_form_element = (element) =>
{
    console.log(element.getAttribute("type"));
    if((element.nodeType == 1) && (element.getAttribute("type") != "submit"))
       {
        set_error(element);
        delete_error(element);
        element.addEventListener("focus",(e)=>
        {
            const {target} = e;
            delete_error(target);
           // console.log("delete_error");
        })

        element.addEventListener("change",(e)=>
        {
            const {target} = e;
            const {validation:type_of_validation} = target.dataset;
            console.log("change");
            try
            {
                if(!target.value)
                {
                    throw "Required";
                };

                switch(type_of_validation)
                {
                    case"name":
                    case"forename":break;
                    case"password":break;
                    case"confirm_password":break;
                    case"email":break;
                    default:
                }
                delete_error(target);
            }
            catch(e)
            {
                set_error(target,e);
            };
        })
       }
}

for(let form of forms)
{
    const inputs = deep_search("input",form);

    const selects = deep_search("select",form);

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
}