@include('layouts.nav')

<!doctype html>
<html lang="en">
<head>
    <title>Edit Customer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Customer</h2>
    <form action="{{ route('customer.update', ['id' => $customer->customer_id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-2">
            <label>Name</label>
            <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Email</label>
            <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Country</label>
            <input type="text" name="country" value="{{ $customer->country }}" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>City</label>
            <input type="text" name="city" value="{{ $customer->city }}" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
        </div>

        <div class="form-group mb-2">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="M" {{ $customer->gender == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ $customer->gender == 'F' ? 'selected' : '' }}>Female</option>
                <option value="O" {{ $customer->gender == 'O' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" value="{{ $customer->DOB }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('/customer/view') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
