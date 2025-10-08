@include('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{url('/')}}/register" method='post'>
        @csrf
        <h1>Registration</h1>
        <x-input type="text" name="name" label="Please enter your name"></x-input><br><br>
        <x-input type="text" name="email" label="Please enter your email"></x-input><br><br>
        <x-input type="password" name="password" label="Please enter your password"></x-input><br><br>
        <x-input type="password" name="password_confirmation" label="Please enter your password again"></x-input><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>