<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    // public function show($id)
    // {
    //     // $customer = Customer::find($id);
    //     // if (!$customer) {
    //     //     //abort(404);
    //     //     //return response(status:404);
    //     //     //return response('Customer not found', 404);
    //     //     return response()->json(['message' => 'Customer not found'], 404);
    //     // }
    //     // return $customer;

    //     return Customer::findOrFail($id);
    // }

    public function show(Customer $customer)
    {
        return $customer;
    }
}
