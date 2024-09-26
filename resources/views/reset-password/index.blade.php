<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
          body{
            margin:0;
            padding:0;
        }
        h1{
            color: silver;
            text-align: center;
            @media screen and (max-width: 1000px) {
                font-size: 1.5rem;
            }
        }
        .container{
            display: flex;
            flex-direction: column;
            background-color: rgb(0, 25, 25);
            height: 100vh;
            overflow-y: hidden;
            align-items: center;
            justify-content: space-evenly;
            width:100%;
            color: silver;
        }
        .legend,label{
            color: silver;
            font-size: 1rem;
        }
        .errors-div {
            color:red;
        }
        .div-logo{
            width:35%;
            height: fit-content;

            @media screen and (max-width: 1000px) {
                width:90%;
                height: fit-content;
            }
        }
        #link-to-site{
            display: none;
        }
        fieldset{
            display: flex;
            flex-direction: column;
            width:40%;
            @media screen and (max-width: 1000px) {
                width:90%;
            }
        }
        form{
            width:99%;
            height: fit-content;
            display: flex;
            justify-content: center;
            gap:2rem;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
            @media screen and (max-width: 1000px) {
                width:95%;
            }
        }
        input{
            margin:0.5rem auto;
            padding:1.1rem;
            width: 90%;
            @media screen and (max-width: 1000px) {
                width:90%;
            }
        }
        #submit-button{
            padding:1rem;
            width:30%;
            border-radius: 6px;
            background-color: rgb(100, 150, 255);
            color:white;
            font-weight: bold;
            font-size: 0.9rem;
            letter-spacing: 0.07rem;
            @media screen and (max-width: 1000px) {
                width:95%;
            }
        }
        #submit-button:hover{
                cursor: pointer;
        }
        #logo{
            height: 100%;
            border-radius: 8px;
            @media screen and (max-width: 1000px) {
                width:100%;
                height: auto;
            }
        }

    </style>
    <title>Password Reset</title>
</head>
<body>
    <div class="container" id="container">
        <div class="div-logo">
            <img id="logo" src="https://www.top100filmes.com.br/assets/TCFLogoSiteNovo.svg" alt="LogoTCF"/>
        </div>
        <form method="POST" action="#" id="reset-form">
            @csrf
            <fieldset class="fieldset">
                <legend class="legend"> Redefinição: </legend>
                <label for="password">Digite sua nova senha</label>
                <input class="input-password" type="password" name="password" id="password">
                <label for="password-confirmation">Confirme sua senha</label>
                <input class="input-password" type="password" name="password-confirmation" id="password-confirmation">
            </fieldset>

            <button id="submit-button" type="submit">Enviar</button>

            <div class="errors-div" id="errors-div">
            </div>
        </form>
        <a href="https://www.top100filmes.com.br" id="link-to-site">Click here to go the website</a>
    </div>
    <script>
        const form = document.querySelector("#reset-form");

        form.addEventListener("submit", (event) => {
            event.preventDefault();


            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);
            const email= params.get('email');
            const token= params.get('token');
            const password = document.querySelector('#password').value;
            const passwordConfirmation = document.querySelector('#password-confirmation').value;
            const apiUrl = `http://localhost:8000/api/auth-password-reset?token=${token}&email=${email}`;


            const formData = new FormData();

            formData.append('email', email);
            formData.append('token', token);
            formData.append('password', password);
            formData.append('password_confirmation', passwordConfirmation);

            fetch(apiUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                },
            })
            .then(response => {

                return response.json();
            })
            .then(data => {
                const errorsDiv = document.querySelector('#errors-div');
                errorsDiv.innerHTML = '';

                if (data.errors) {
                    for (const [field, messages] of Object.entries(data.errors)) {
                        messages.forEach(message => {
                            // Create a new paragraph for each message and append to the errorsDiv
                            const errorElement = document.createElement('p');
                            errorElement.textContent = message;
                            errorsDiv.appendChild(errorElement);
                    });}
                } else {
                    const form = document.querySelector("#reset-form");
                    const h1 =  document.createElement("h1");
                    h1.textContent = "Password reset successfully!";
                    form.innerHTML = '';
                    form.appendChild(h1);
                    const link = document.querySelector("#link-to-site")
                    link.style.display="block";
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
        });
    </script>
</body>
</html>
