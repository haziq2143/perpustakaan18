<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>

</head>

<body class="font-poppins">

    <main class="w-full h-svh flex justify-center items-center ">
        <div class="w-[75%] h-[85%] bg-white shadow-custom mx-auto my-auto flex">
            <div class="lg:w-1/2 lg:flex hidden justify-center items-center"
                style="background-image: url({{ asset('images/signUp.png') }}); background-size: cover;">
                <div class="max-w-full">
                    <p class="text-4xl font-bold text-accent">Jadilah Bagian Dari Kami</p>

                </div>
            </div>
            <div class="lg:w-1/2 w-full mt-10 mx-auto">
                <h2 class="text-center py-10 lg:text-3xl text-2xl font-semibold text-primary">Sign-Up</h2>
                <form action="" class="mx-14 ">
                    <label for="name" class="text-xl font-medium text-primary block">Name</label>
                    <input type="text" id="name"
                        class="lg:w-[90%] w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none "
                        placeholder="Your Name...">
                    <label for="email" class="text-xl font-medium text-primary mt-5 block">Email</label>
                    <input type="text" id="email"
                        class="lg:w-[90%] w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none "
                        placeholder="Your Email...">
                    <label for="password" class="text-xl font-medium text-primary mt-5 block">Password</label>
                    <input type="password" id="password"
                        class="lg:w-[90%] w-full text-primary lg:text-xl text-lg  border border-primary px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none "
                        placeholder="Your Email...">

                    <button
                        class="lg:w-[90%] w-full px-2 lg:py-4 py-3 text-accent font-bold lg:text-xl text-lg bg-primary lg:hover:bg-emerald-700 rounded-md mt-5">Sign-Up</button>
                    <p class="text-sm mt-2">Already have account? <a href="/" class="text-primary">Sign-In</a>
                        Now</p>
                </form>
            </div>
        </div>
    </main>

</body>

</html>
