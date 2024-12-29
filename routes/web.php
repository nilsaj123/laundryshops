<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Patient;
Route::view('/', 'welcome')->name('filupp');

Route::post('Customer/store', function (Request $request) {


    $request->validate([
        'name' => 'required|string|max:255',
      'email' => 'required|email|unique:customers,email|max:255', 
        'phone_number' => 'required|numeric',
        'permanent_address' => 'required|string|max:255',
        'clothes_type' => 'required|string|max:255',
    
    ]);
    
    $customer = Customer::where('name', $request->name)
       
        ->first();

    if ($customer) {
        // Update existing patient record
        $customer->update($request->only([
           'permanent_address', 'name', 'phone_number', 'email',  'clothes_type',
        ]));
        return redirect('/')->with('success', 'updated!');
    } else {
        // Create a new record if no existing patient is found
        Customer::create($request->only([
            'permanent_address', 'name', 'phone_number', 'email',  'clothes_type',
             
        ]));
        return redirect('/')->with('success', ' Submitted!');
    }
});
require __DIR__.'/auth.php';
