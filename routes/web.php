<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Patient;
Route::view('/', 'welcome')->name('filupp');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Route::post('/patient/store', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'date_of_birth' => 'required|date',
        'birth_place' => 'nullable|string|max:255',
        'age_year' => 'nullable|integer|max:20',
        'age_month' => 'nullable|integer|max:12',
        'height' => 'nullable|integer|min:10|max:500',
        'weight' => 'nullable|integer|min:1|max:500',
        'type_of_vaccine' => 'nullable|string|max:255',
        'parent_age' => 'integer|min:14|max:100',
        'permanent_address' => 'required|string|max:255',
        'parents_name' => 'required|string|max:255',
         'parents_number' => 'digits_between:10,12',
        'gender' => 'required|string|in:Male,Female,Other',
    ]);
    
    $patient = Patient::where('name', $request->name)
        ->where('date_of_birth', $request->date_of_birth)
        ->first();

    if ($patient) {
        // Update existing patient record
        $patient->update($request->only([
            'birth_place', 'height', 'weight', 'age_year', 'age_month', 'type_of_vaccine',
            'parent_age', 'permanent_address', 'parents_name', 'parents_number', 'gender',
        ]));
        return redirect('/')->with('success', 'Patient record updated successfully!');
    } else {
        // Create a new record if no existing patient is found
        Patient::create($request->only([
            'name', 'date_of_birth', 'birth_place', 'height', 'weight', 'age_year', 'age_month', 'type_of_vaccine',
            'parent_age', 'permanent_address', 'parents_name', 'parents_number', 'gender',
        ]));
        return redirect('/')->with('success', 'Patient recorded successfully!');
    }
});
require __DIR__.'/auth.php';
