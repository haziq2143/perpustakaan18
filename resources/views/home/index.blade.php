 <x-app-layout>

     <div class="w-full h-80 ">
         <div class="w-full h-full text-center p-5 flex justify-center items-center"
             style="background-image: url({{ asset('images/login.png') }}); background-size: cover;)">
             <div class="">
                 <h1 class="text-accent font-bold text-4xl">Perpustakaan Khaziq</h1>
                 <p class="text-slate-100 mb-5  text-md">Ciptakan suasana membaca yang nyaman di perpustakaan kami</p>
                 <a href="/books" class="px-3 py-2 mt-5  bg-accent rounded-md text-slate-800 font-bold">Get Started</a>
             </div>
         </div>
     </div>

     <div class="w-full mt-12">
         <h1 class="text-2xl font-semibold text-primary">Perpustakaan Khaziq</h1>
         <p class="ms-4 text-lg">Perpustakaan Khaziq adalah pusat pengetahuan yang menyediakan buku, jurnal, dan bahan
             digital
             untuk
             mendukung pembelajaran serta pengembangan diri.</p>

     </div>

     <div class="w-full md:flex md:justify-center mt-14 md:gap-20 ">
         <div class="circle w-32 h-32 mt-14 mx-auto md:mx-0">
             <div class="border-4 flex justify-center border-primary p-10  rounded-full">
                 <h1 class="text-3xl font-semibold text-primary">{{ $countBooks }}</h1>
             </div>
             <p class="text-center text-xl mt-2 font-bold ">Novel</p>
         </div>
         <div class="circle w-32 h-32 mt-14 mx-auto md:mx-0">
             <div class="border-4 flex justify-center border-primary p-10  rounded-full">
                 <h1 class="text-3xl font-semibold text-primary">{{ $countUsers }}</h1>
             </div>
             <p class="text-center text-xl mt-2 font-bold ">Users</p>
         </div>
         <div class="circle w-32 h-32 mt-14 mx-auto md:mx-0">
             <div class="border-4 flex justify-center border-primary p-10  rounded-full">
                 <h1 class="text-3xl font-semibold text-primary">{{ $countLoans }}</h1>
             </div>
             <p class="text-center text-xl mt-2 font-bold ">Loans Books</p>
         </div>
     </div>

     <div class="w-full h-full mt-20 bg-primary p-10">
         <h1 class="text-center text-2xl font-semibold text-accent mb-5">Buku Paling Banyak Dipinjam</h1>
         <div class="w-full flex justify-center ">
             @foreach ($topBooks as $tBook)
                 <div class="w-1/3 md:w-40 h-full bg-white p-5 me-3 md:me-10 rounded-md">
                     <img src="{{ asset($tBook->image) }}" alt="" class="w-32 mx-auto">
                     <p class="text-primary text-xl font-semibold text-center">{{ $tBook->title }}</p>
                 </div>
             @endforeach
         </div>
     </div>

     <footer class="p-5 w-full text-center bg-primary mt-20">
         <p class="text-accent">Hak Cipta©2024 Muhammad Haziq Firdaus</p>
     </footer>
 </x-app-layout>
