<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('layouts.customer');
    }
    public function save(Request $request)
    {
    $this->validate($request, [
        'name'=>'required',
        'phone'=>'required',
        'address'=>'required'
     ]);


    customer::create([
        'name'=>$request->name,
        'phone'=>$request->phone,
        'address'=>$request->address,

    ]);
    }
    public function customerList(){
        $customer=customer::all();
        return $customer;
    }
    public function edit($id){
        $customer=customer::find($id);
       // dd($date);
        return view('layouts.edit',['customer' => $customer]);
    }
    public function update(Request $request,$id){
        customer::find($id)->update($request->all());
        return  "Update Done";
    }
    public function delete($id){
            customer::find($id)->delete();
            return "Deleted";
    }
}
