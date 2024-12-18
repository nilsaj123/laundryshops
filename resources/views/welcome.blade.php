<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <div class="bg-gray-900  dark:bg-black dark:text-white/50 ">

        <div class="relative min-h-screen flex flex-col lg:px-64 px-9">

            <main class="bg-gray-900">



                <div class="p-12 lg:mt-12 w-full text-4xl text-center justify-center">
                    <span class="text-white font-bold w-full">Infants and Children Vaccination</span>
                    <span class="text-yellow-700 font-bold w-full">Management System</span>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                @if (session('success'))
                <script>
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "  {{ session('success') }}",
                        showConfirmButton: false,
                        timer: 2500
                    });
                </script>

      
        @endif

        <form method="POST" action="/patient/store" class="p-9 bg-black rounded-md w-full">
            @csrf
            <h2 class="text-2xl font-semibold mb-4 text-center text-yellow-300">Patient Fill-Up Form</h2>
            <div class="mb-4">
                <label for="name" class="block font-medium text-yellow-300">Full Name</label>
                <input type="text" id="name" name="name" class="w-full border rounded p-2 bg-gray-800 text-white" placeholder="first-name, last-name" value="{{ old('name') }}" required>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="date_of_birth" class="block font-medium text-yellow-300">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" class="w-full border rounded p-2 bg-gray-800 text-yellow-100" value="{{ old('date_of_birth') }}" required>
                @error('date_of_birth') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="birth_place" class="block font-medium text-yellow-300">Birth Place</label>
                <input type="text" id="birth_place" name="birth_place" class="w-full border rounded p-2 bg-gray-800 text-white" value="{{ old('birth_place') }}">
                @error('birth_place') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="age_year" class="block font-medium text-yellow-300">Age (Years)</label>
                    <input type="number" id="age_year" name="age_year" class="w-full border rounded p-2 bg-gray-800 text-white"value="{{ old('age_year') }}">
                    @error('age_year') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="age_month" class="block font-medium text-yellow-300">Age (Months)</label>
                    <input type="number" id="age_month" name="age_month" class="w-full border rounded p-2 bg-gray-800 text-white"value="{{ old('age_month') }}">
                    @error('age_month') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="height" class="block font-medium text-yellow-300">Height (cm)</label>
                <input type="number" id="height" name="height" class="w-full border rounded p-2 bg-gray-800 text-white" value="{{ old('height') }}">
                @error('height') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="weight" class="block font-medium text-yellow-300">Weight (kg)</label>
                <input type="number" id="weight" name="weight" class="w-full border rounded p-2 bg-gray-800 text-white"value="{{ old('weight') }}">
                @error('weight') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="Type_of_vaccine" class="block font-medium text-yellow-300">Vaccine types</label>
                <select id="Type_of_vaccine" name="type_of_vaccine" class="w-full border rounded p-2 bg-gray-800 text-yellow-100" value="{{ old('type_of_vaccine') }}" required>
                    <option value="">Select Vaccine Type</option>
                    <option value="BGG">BGG</option>
                    <option value="HEPATITIS B">HEPATITIS B</option>
                    <option value="PENTAVALENT">PENTAVALENT</option>
                    <option value="ORAL POLIO">ORAL POLIO</option>
                    <option value="PCV">PCV</option>
                    <option value="INACTIVE POLIO">INACTIVE POLIO</option>
                    <option value="MMR">MMR</option>
                

                </select>
                @error('gender') <span class="text-red-500 text-yellow-300">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="gender" class="block font-medium text-yellow-300">Gender</label>
                <select id="gender" name="gender" class="w-full border rounded p-2 bg-gray-800 text-yellow-100" value="{{ old('gender') }}"required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                </select>
                @error('gender') <span class="text-red-500 text-yellow-300">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="permanent_address" class="block font-medium text-yellow-300">Permanent Address</label>
                <input type="text" id="permanent_address" name="permanent_address" class="w-full border rounded p-2 bg-gray-800 text-white" value="{{ old('permanent_address') }}" placeholder="Purok, sitio, barangay">
                @error('permanent_address') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="parents_name" class="block font-medium text-yellow-300">Parent's/guardian's/ Name</label>
                <input type="text" id="parents_name" name="parents_name" class="w-full border rounded p-2 bg-gray-800 text-white "value="{{ old('parents_name') }}">
                @error('parents_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="grid lg:grid-cols-2 lg:gap-5">
                <div class="mb-4">
                    <label for="parent_age" class="block font-medium text-yellow-300">Parent's/Guardian's Age</label>
                    <input type="number" id="parent_age" name="parent_age" class="w-full border rounded p-2 bg-gray-800 text-white"value="{{ old('parent_age')}}">
                    @error('parent_age') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="parents_no" class="block font-medium text-yellow-300">Parent's/Guardian's/ Contact Number</label>
                    <input type="number" id="parents_number" name="parents_number" class="w-full border rounded p-2 bg-gray-800 text-white"value="{{ old('parents_number') }}">
                    @error('parents_number') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <button type="submit" class="w-full rounded-sm bg-yellow-500 text-white p-2 rounded">Submit</button>
        </form>

    </div>
    </main>
    </div>
    </div>
    </div>
</body>

</html>