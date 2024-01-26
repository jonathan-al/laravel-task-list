<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade Template</title>
</head>
<body>
    @isset($name)
        <div>Hello {{ $name }} I'm blade template</div>
    @endisset
</body>
</html>