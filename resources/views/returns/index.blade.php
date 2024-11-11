<x-app-layout>
    @if (session('failed'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "",
            });
            {{ session()->forget('stock') }}
        </script>
    @endif
    <div class="w-full">
        <h1 class="text-primary font-bold text-4xl text-center ">Pengembalian Buku</h1>
        <form action="/returns" method="POST">
            @csrf
            <div id="readerBook" class="md:w-1/3 w-full mx-auto mt-3"></div>
            <div class="w-full lg:w-1/2 mx-auto mt-4 flex justify-around">
                <input type="text" id="code" name="code_book"
                    class="lg:w-2/3 w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none "
                    placeholder="Code Book...">
                <button type="button" class="w-1/3 bg-primary text-accent font-semibold rounded-lg  px-3 py-2 ms-2"
                    id="scanButton" onclick="startScanBook()">Mulai Scan</button>
            </div>
            <div id="readerUser" class="md:w-1/3 w-full mx-auto mt-3"></div>
            <div class="w-full lg:w-1/2 mx-auto mt-10 flex justify-between">
                <input type="password" id="code_user" name="code_unique"
                    class="lg:w-2/3 w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none "
                    placeholder="Code User...">
                <button type="button" class="w-1/3 bg-primary text-accent font-semibold rounded-lg  px-4 py-3 ms-2"
                    id="scanButtonUser" onclick="startScanUser()">Mulai Scan</button>
            </div>
            <div class="md:w-1/2 w-full mt-10 mx-auto ">
                <button type="submit"
                    class="px-4 py-3  md:px-5 md:py-3 bg-primary text-accent font-bold rounded-lg ">Kembalikan</button>
            </div>
        </form>

    </div>
</x-app-layout>
