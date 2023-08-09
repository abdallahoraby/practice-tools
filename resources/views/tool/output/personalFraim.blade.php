<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personality Test</title>
    <style>
        body{
            height: 100vh;
            overflow: hidden;
        }
        embed{
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <embed frameborder="0" scrolling="no" style="border:0px" src="{{ asset("assets/personal/" . request()->res . ".pdf#toolbar=0") }}"/>
</body>

</html>
