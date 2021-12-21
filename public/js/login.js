const form = document.querySelector("#login-form");

form.addEventListener('submit', function (e) {
    e.preventDefault();
    //name=Agnieszka&surname=Kowalska&email=a.kowalska%40codecool.com
    // const data = `email=${this.email.value}&password=${this.email.value}`;
    const data = {
        "email": this.email.value,
        "password": this.password.value
    }

    console.log(data);
    login(data);
});

function login(data) {
    fetch("/loginHome",
        {
            // mode: 'no-cors',
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(function (response) {
            // console.log(response.status)
            if(response.status == 200){
                window.location.href = "/home"
            }
        });
}
