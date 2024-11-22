<x-app-layout>
    <div class="w-full">
        <h1 class="text-4xl font-bold mb-5 text-center text-primary">Your Profile</h1>
    </div>
    <div class="w-full md:flex md:justify-center">
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold mb-1 text-center text-primary">{{ $user->name }}</h1>
            <h1 class="text-md mb-10 text-center">{{ $user->email }}</h1>
        </div>

        <div class="mx-auto text-center flex justify-center md:w-1/2">
            {{ $qr }}
        </div>
    </div>

</x-app-layout>
