const registerForm = document.querySelector("#register-form");
const nameInput = registerForm.querySelector('#register-form>input[name=\"name\"]');
const emailInput = registerForm.querySelector('#register-form>input[name="email"]');
const passwordInput = registerForm.querySelector('#register-form>input[name="password"]');
const confirmedPasswordInput = registerForm.querySelector('input[name="confirmedPassword"]');
const messages = document.querySelector('.signup .messages');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

async function isEmailFree(email){

    const data = {'email': email};

    const res = await fetch("/isEmailTaken",{
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    return res.status === 200;
}

function arePasswordsTheSame(password, confirmedPassword){
    return password === confirmedPassword;
}

function isPasswordSafe(){
    const passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    return passwordInput.value.match(passw);
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail () {
    setTimeout(async function () {
        const condition = await isEmailFree(emailInput.value);
        markValidation(emailInput, isEmail(emailInput.value)&&condition);
    }, 1000);
}

function validateName(){
    setTimeout(function () {
        markValidation(nameInput, nameInput.value);
    }, 1000);
}

function validatePassword(){
    setTimeout(function () {
        const condition = isPasswordSafe();

        markValidation(passwordInput, condition);
    }, 1000);
}

function validatePasswords() {
    setTimeout(function () {
        const condition = arePasswordsTheSame(
            confirmedPasswordInput.value,
            confirmedPasswordInput.previousElementSibling.value
        );

        markValidation(confirmedPasswordInput, condition);
    }, 1000);
}

passwordInput.addEventListener('keyup', validatePassword);
emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePasswords);
nameInput.addEventListener('keyup', validateName);

registerForm.addEventListener('submit', async function (e) {
    e.preventDefault();

    const condition = await isEmailFree(emailInput.value)
    console.log(condition);
    if (!condition) {
        messages.innerHTML = "This email is already taken";
        return false;
    }

    if (!isPasswordSafe()) {
        messages.innerHTML = "The password should consist of at least one big letter, one small letter and a number";
        return false;
    }

    if (!arePasswordsTheSame(passwordInput.value, confirmedPasswordInput.value)) {
        messages.innerHTML = "Passwords aren't matching";
        return false;
    }

    if (!nameInput.value) {
        messages.innerHTML = "You forgot to enter Your Name";
        return false;
    }

    if (!isEmail(emailInput.value)) {
        messages.innerHTML = "Your email isn't correct";
        return false;
    }

    if (typeof nameInput === 'undefined' ||
        typeof emailInput === 'undefined' ||
        typeof passwordInput === 'undefined' ||
        typeof confirmedPasswordInput === 'undefined'
    ) {
        messages.innerHTML = "Please fill all of the boxes with correct data";
        return false;
    }

    const data = {
        "name": this.name.value,
        "email": this.email.value,
        "password": this.password.value,
    }
    register(data);
});

function register(data){

    fetch("/register",
        {
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(function (response) {
            if(response.status === 200){
                messages.style.color = "green";
                messages.innerHTML = "Welcome to the team! <br> You'll be redirected";
                window.setTimeout(function (){
                    window.location.href = "/information";
                }, 3000);
            }
            else {
                messages.innerHTML = "Something went wrong...";
            }
        });
}

