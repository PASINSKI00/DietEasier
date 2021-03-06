const loginForm = document.querySelector("#login-form");

loginForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const data = {
        "email": this.email.value,
        "password": this.password.value
    }
    login(data);
});

function login(data) {
    const messages = document.querySelector('.messages');

    fetch("/login",
        {
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(function (response) {
            if(response.status === 200){
                messages.style.color = "green";
                messages.innerHTML = "Welcome back!";
                window.setTimeout(function (){
                    if(window.location.pathname !== "/logout")
                        window.location.href =  window.location.pathname;
                    else
                        window.location.href = "/home";
                }, 3000);
            }
            else {
                messages.innerHTML = "Wrong email or password";
            }
        });
}

function openLogin() {
    hideLogins();
    document.getElementById("log-in").style.display = "flex";
    document.getElementById("overlay").style.display = "block";
    document.getElementById("log-in").style.opacity = '1';
}

function openSignUp() {
    hideLogins();
    document.getElementById("sign-up").style.display = "flex";
    document.getElementById("overlay").style.display = "block";
}

function hideLogins() {
    document.getElementById("log-in").style.display = "none";
    document.getElementById("sign-up").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

