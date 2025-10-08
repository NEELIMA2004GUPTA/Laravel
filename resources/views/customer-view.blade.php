@include('layouts.nav')
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container"><br><br>
        <form action="" class="col-9">
            <div class="form-group">
              <input type="search" name="search" id="" class="form-control" placeholder="Search by name or email....." aria-describedby="helpId" value="{{$search}}">
            </div>
            <button class="btn btn-primary">Search</button>
            <a href="{{ url('/customer/view') }}" class="btn btn-secondary">Reset</a>
        </form>
        <br><a href="{{route('customer.create')}}"><button>Add</button></a><br><br>
        <a href="{{url('/customer/trash')}}"><button>Go To Trash</button></a><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>
                        @if($customer->gender=='M')
                        Male 
                        @elseif($customer->gender=='F')
                        Female 
                        @else
                        other 
                        @endif
                    </td>
                    <!-- <td>{{get_formatted_date($customer->DOB,"d-M-Y")}}</td> -->
                    <td>{{$customer->DOB}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->city}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                        @if($customer->status == "1")
                        Active 
                        @else 
                        Inactive
                        @endif
                    </td>
                    <td>
                       <div class="d-flex gap-2">
                        <a href="{{route('customer.delete',['id'=>$customer->customer_id])}}">
                            <button class="btn btn-danger">Trash</button>
                        </a>
                        <a href="{{route('customer.edit',['id'=>$customer->customer_id])}}">
                            <button class="btn btn-primary">Edit</button>                   
                        </a>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center mt-3">
            <div class="col-auto">
                {{ $customers->links()}}
            </div>
        </div>
      </div>
  </body>
</html>