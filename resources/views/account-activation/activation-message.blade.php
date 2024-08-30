<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation</title>

    <style>
        body{
            padding:0;
            margin:0;
        }
        .container{
            background-color: rgb(15, 15, 15);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        h1,h6{
            color: silver;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1> {{ $message }}! </h1>
        <h6>click <a href="https://www.top100filmes.com.br">here</a> to go to Top100filmes</h6>
    </div>

</body>
</html>
