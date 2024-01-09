function email_validation(e)
{
    const emailRegex = /^[a-zA-Z0-9._-]+@(hotmail|gmail)\.[a-zA-Z]{2,4}$/;
    const value_email = e.currentTarget.value;
    const messageValid = document.querySelector(".messageValid");
    if(value_email.match(emailRegex))
    {
        
        console.log("hy");
        
        messageValid.classList.remove("text-danger");
        messageValid.innerHTML = "the email is validate";
        messageValid.classList.add("text-success");
    
    }else
    {
        console.log("hy1");
        messageValid.classList.remove("text-success");
        messageValid.classList.add("text-danger");
        messageValid.innerHTML = "the email is not validate";
        document.querySelector(".btn_submit").disabled = true;
    }
}
function pass_validation(e)
{
    const passwordRegex = /^[a-zA-Z0-9!@#$%^&*()_+]{8,16}$/;
    const value_password = e.currentTarget.value;
    const messageValid = document.querySelector(".messageValid");
    if(value_password.match(passwordRegex))
    {
        console.log("hy2");
        messageValid.classList.remove("text-danger");
        messageValid.innerHTML = "the email and password is validate";
        messageValid.classList.add("text-success");
        document.querySelector(".btn_submit").disabled = false;
    
    }else
    {
        console.log("hy3");
        messageValid.classList.remove("text-success");
        messageValid.classList.add("text-danger");
        messageValid.innerHTML = "the password is not validate";
        document.querySelector(".btn_submit").disabled = true;
    }
}