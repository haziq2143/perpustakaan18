<x-app-layout>
    @if (session('loan'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "Peminjaman Berhasil!",
                icon: "success"
            });
        </script>
    @elseif (session('book'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "Buku Berhasil Ditambahkan!",
                icon: "success"
            });
        </script>
    @elseif (session('success'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "Buku Berhasil Dikembalikan!",
                icon: "success"
            });
        </script>
    @endif
    <div class="h-30 w-full my-5">
        <h1 class="md:text-3xl text-2xl font-bold text-primary  ">Buku
            Perpustakaan</h1>
        <hr class="mt-5 border-t-1 border-gray-300">
    </div>
    <form class="max-w-md mx-auto mb-5" action="/books/search" method="GET">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" name="search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-primary rounded-lg bg-gray-50 focus:ring-primary focus:border-primary "
                placeholder="Search Books..." />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-600 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
        </div>
    </form>
    @if (Auth::user()->role == 'admin')
        <div class="flex justify-end mb-4">
            <a href="/books/create"
                class="px-4 py-3 bg-primary hover:bg-emerald-700 text-accent font-bold rounded-lg">Tambah
                Buku</a>
        </div>
    @endif
    <div class="w-full md:flex md:flex-wrap justify-center gap-10">

        @foreach ($books as $book)
            <div class=" shadow-custom md:w-1/3 w-full h-60 md:h-auto flex my-4 md:my-0  animate-fade-in">
                <div class="lg:w-1/3 w-1/4">
                    <img src="{{ asset($book->image) }}" alt="" class="h-full">
                </div>
                <div class="lG:w-2/3 w-3/4 p-3">
                    <h3 class="lg:text-lg text-md font-semibold text-slate-700">Tanggal Post:
                        {{ $book->created_at->format('Y-m-d') }}</h3>
                    <a href="/books/{{ $book->title }}"
                        class="lg:text-2xl text-xl font-bold text-primary hover:text-green-700">{{ $book->title }}</a>
                    <h4 class="lg:text-md text-sm font-medium text-slate-700">Penulis: <span
                            class="text-emerald-700">{{ $book->author }}</span>
                    </h4>
                    <h4 class="pt-5 lg:text-md text-sm font-thin text-black">Jumlah Halaman: {{ $book->pages }}</h4>
                    <h4 class="lg:text-md text-sm font-thin text-black">Stok: {{ $book->stock }}</h4>
                    <h4 class="lg:text-md text-sm font-thin text-black">Nomor Rak: {{ $book->shelf_number }}</h4>
                    <h4 class="lg:text-md text-sm font-thin text-black">Kode Buku: {{ $book->code_book }}</h4>
                    @if (Auth::user()->role == 'admin')
                        <div class="flex justify-end text-sm">
                            <p>
                                <a href="/books/{{ $book->id }}/edit"
                                    class="text-yellow-500 hover:text-yellow-300">Edit</a> |
                            <form action="/books/{{ $book->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                            </form>
                            </p>

                        </div>
                    @endif
                </div>
            </div>
        @endforeach

    </div>


</x-app-layout>
