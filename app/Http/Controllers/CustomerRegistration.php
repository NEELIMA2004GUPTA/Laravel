<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerRegistration extends Controller
{
    public function index(){
        return view('CR');
    }

    public function store(Request $request){
        // p($request->all());
        // die;

        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
        'country' => 'required|string',
        'city' => 'required|string',
        'address' => 'required|string',
        'gender' => 'required|in:male,female,other',
        'dob' => 'required|date',
        ]);

        $genderMap = [
        'male' => 'M',
        'female' => 'F',
        'other' => 'O',
        ];
        // insert query
        Customers::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'country' => $request->country,
        'city' => $request->city,
        'address' => $request->address,
        'gender' =>$genderMap[$request->gender],
        'DOB' => $request->dob,
        ]);

        return redirect('/customer/view');
    }

    public function view(){
        $customers=Customers::all();
        $data=compact('customers');
        return view('customer-view')->with($data);
    }

    public function trash(){
        $customers=Customers::onlyTrashed()->get();
        $data=compact('customers');
        return view('customer-trash')->with($data);
    }

    public function delete($id){
        $customers=Customers::find($id);
        if(!is_null($customers)){
            $customers->delete();
        }
        return redirect('customer/view');
    }

    public function forceDelete($id){
        $customers=Customers::withTrashed()->find($id);
        if(!is_null($customers)){
            $customers->forceDelete();
        }
        return redirect()->back();
    }

    public function restore($id){
        $customers=Customers::withTrashed()->find($id);
        if(!is_null($customers)){
            $customers->restore();
        }
        return redirect('customer/view');
    }


   public function edit($id)
{
    $customer = Customers::find($id);

    if (is_null($customer)) {
        return redirect('/customer/view')->with('error', 'Customer not found!');
    }

    
    return view('customer-edit', compact('customer'));
}

public function update(Request $request, $id)
{
    $customer = Customers::find($id);

    if (is_null($customer)) {
        return redirect('/customer/view')->with('error', 'Customer not found!');
    }

    $customer->update([
        'name' => $request->name,
        'email' => $request->email,
        'country' => $request->country,
        'city' => $request->city,
        'address' => $request->address,
        'gender' => $request->gender,
        'DOB' => $request->dob,
    ]);

    return redirect('/customer/view')->with('success', 'Customer updated successfully!');
}
}