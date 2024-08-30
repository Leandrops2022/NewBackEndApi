<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation</title>
</head>
<body>
    <p>
        Greetings, {{ $userName }},
    </p>
    <p>
        you are receiving this email because you registered at Top100filmes recently.
    </p>
    <p>
        To have full access to all of our content, please activate your account by clicking <a href={{$activationLink}} >here!</a>
    </p>
</body>
</html>
