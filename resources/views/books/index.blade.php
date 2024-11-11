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

    <div class="flex justify-end mb-4">
        <a href="/books/create" class="px-4 py-3 bg-primary hover:bg-emerald-700 text-accent font-bold rounded-lg">Tambah
            Buku</a>
    </div>
    <div class="w-full md:flex md:flex-wrap justify-center">
        @foreach ($books as $book)
            <div class=" shadow-custom md:w-2/5 w-full h-60 flex md:mx-10  my-4">
                <div class="w-1/3">
                    <img src="{{ asset($book->image) }}" alt="" class="h-full">
                </div>
                <div class="w-2/3 p-3">
                    <h3 class="text-lg font-semibold text-slate-700">Tanggal Post:
                        {{ $book->created_at->format('Y-m-d') }}</h3>
                    <h2 class="text-2xl font-bold text-primary">{{ $book->title }}</h2>
                    <h4 class="text-md font-medium text-slate-700">Penulis: <span
                            class="text-emerald-700">{{ $book->author }}</span>
                    </h4>
                    <h4 class="pt-5 text-md font-thin text-black">Jumlah Halaman: {{ $book->pages }}</h4>
                    <h4 class="text-md font-thin text-black">Stok: {{ $book->stock }}</h4>
                    <h4 class="text-md font-thin text-black">Nomor Rak: {{ $book->shelf_number }}</h4>
                    <h4 class="text-md font-thin text-black">Kode Buku: {{ $book->code_book }}</h4>
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
                </div>
            </div>
        @endforeach
    </div>


</x-app-layout>
