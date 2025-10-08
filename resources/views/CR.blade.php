<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/')}}/customer" method="post">
        @csrf 
        <h1>Customer Registration</h1>
        <x-input type="text" name="name" label="Name:"></x-input>
        <x-input type="text" name="email" label="Email:"></x-input>
        <x-input type="password" name="password" label="Password:"></x-input>
        <x-input type="password" name="password_confirmation" label="Confirm Password:"></x-input>
        <x-input type="text" name="country" label="Country:"></x-input>
        <x-input type="text" name="city" label="City:"></x-input>
        <x-input type="textarea" name="address" label="Address:"></x-input>
        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="">Select Gender</option>
            <option value="male" {{ old('gender')=='male'?'selected':'' }}>Male</option>
            <option value="female" {{ old('gender')=='female'?'selected':'' }}>Female</option>
            <option value="other" {{ old('gender')=='other'?'selected':'' }}>Other</option>
        </select>
        <x-input type="date" name="dob" label="Date of Birth:"></x-input>
        <button type="submit">Submit</button>
    </form>
</body>
</html>