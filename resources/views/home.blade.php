<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome,{{$name ?? "user"}} {{time()}} {{date('d-m-Y')}}</h1>
    <h2>{{$demo}}</h2>
    <h2>{!!$demo!!}</h2>
    @if($name != "")
        {{"Name is not empty"}}
    @endif
</body>
</html>