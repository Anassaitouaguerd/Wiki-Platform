
/*================== VALIDATION DE FORM LOGIN =======================*/
/*===================================================================*/
const form = document.getElementById('form');
const _token = document.getElementById('_token');
const email = document.getElementById('email');
const password = document.getElementById('password');

form.addEventListener('submit', e => {
  e.preventDefault();
  if (validateInputs_login())
  {
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const _tokenValue = _token.value;
    const data = {
      email: emailValue,
      password: passwordValue,
      token: _tokenValue
    };
    const req = new XMLHttpRequest();
    req.open("POST","login_controller");
    req.setRequestHeader("Content-type","Application/json");
    req.send(JSON.stringify(data));
    req.onreadystatechange = () =>{
      if(req.status === 200 && req.readyState === 4)
      {
        const res = JSON.parse(req.responseText);
        if(res === "OK")
        {
          window.location = '/'; 
        }
        else if(res === "false")
        {
          window.location = 'login';
        }
      }
    }
  }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = (email) => {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs_login = () => {
    let countError = [0 , 0];
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();


    if(emailValue === '') {
        setError(email, 'Email is required');
        countError[0] = 0;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
        countError[0] = 0;
    } else {
        setSuccess(email);
        countError[0] = 1;
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
        countError[1] = 0;
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.');
        countError[1] = 0;
    } else {
        setSuccess(password);
        countError[1] = 1 ;
    }
    if(countError.toString() == [1,1].toString())
    {
      return true ;

    }else{
      return false;
    }

};