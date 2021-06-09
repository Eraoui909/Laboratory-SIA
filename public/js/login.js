
var input = document.querySelectorAll('.validate-input .input100');
var form = document.querySelector('.validate-form');


form.addEventListener('submit', validateForm);

function  validateForm(e)
{
    "use strict";
    /*================================================================== [ Validate ]===================================================*/

    var check = true;

    for(var i=0; i<input.length; i++)
    {
        if(validate(input[i]) == false)
        {
            e.preventDefault();
            showValidate(input[i]);
            check = false;
        }
    }

    return check;

}

function validate (input)
{
    if(input.getAttribute('type') == 'email' || (input).getAttribute('name') == 'email')
    {
        if((input).value.trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null)
        {
            return false;
        }
    }
    else
    {
        if((input).value.trim() == '')
        {
            return false;
        }
    }
}

function showValidate(input) {
    var thisAlert = (input).parentElement;

    (thisAlert).classList.add('alert-validate');
}

function hideValidate(input) {
    var thisAlert = (input).parentElement;

    (thisAlert).classList.remove('alert-validate');
}

document.querySelectorAll('.validate-form .input100').forEach(function(item)
{
    item.addEventListener('focus', function()
    {
        hideValidate(item);
    });
});
