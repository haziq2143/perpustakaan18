<x-app-layout>
    <div class="w-full ">
        <div class="md:w-[60%] w-full mx-auto">
            <form action="/books" method="post" enctype="multipart/form-data">
                @csrf
                <div class="image w-full h-60 bg-primary rounded-lg mb-5">
                    <label for="image" class="flex justify-center pt-20" id="icon-container">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-24">
                            <path
                                d="M13 4H8.8C7.11984 4 6.27976 4 5.63803 4.32698C5.07354 4.6146 4.6146 5.07354 4.32698 5.63803C4 6.27976 4 7.11984 4 8.8V15.2C4 16.8802 4 17.7202 4.32698 18.362C4.6146 18.9265 5.07354 19.3854 5.63803 19.673C6.27976 20 7.11984 20 8.8 20H15.2C16.8802 20 17.7202 20 18.362 19.673C18.9265 19.3854 19.3854 18.9265 19.673 18.362C20 17.7202 20 16.8802 20 15.2V11"
                                stroke="#FFD966" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M4 16L8.29289 11.7071C8.68342 11.3166 9.31658 11.3166 9.70711 11.7071L13 15M13 15L15.7929 12.2071C16.1834 11.8166 16.8166 11.8166 17.2071 12.2071L20 15M13 15L15.25 17.25"
                                stroke="#FFD966" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M18.5 3V5.5M18.5 8V5.5M18.5 5.5H16M18.5 5.5H21" stroke="#FFD966" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </label>
                    <input type="file" name="image" id="image" class="hidden" accept="image/*"
                        onchange="previewImage(event)">
                </div>
                <input type="text" id="title" name="title"
                    class=" w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none mb-5
                    "
                    placeholder="Judul Buku...">

                <div class="md:flex md:mb-5">
                    <input type="text" id="author" name="author"
                        class="lg:w-[50%] w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none md:me-2 mb-5 md:mb-0"
                        placeholder="Penulis Buku...">
                    <select name="category_id" id=""
                        class="lg:w-[50%] w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none md:ms-2 mb-5 md:mb-0">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" class="">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:flex md:mb-5">
                    <input type="number" id="pages" name="pages"
                        class="lg:w-1/3 w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none md:me-2 mb-5 md:mb-0"
                        placeholder="Jumlah Halaman...">
                    <input type="text" id="stock" name="stock"
                        class="lg:w-1/3 w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none md:me-2 mb-5 md:mb-0"
                        placeholder="Jumlah Stok...">
                    <input type="text" id="shelf_number" name="shelf_number"
                        class="lg:w-1/3 w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none md:me-2 mb-5 md:mb-0"
                        placeholder="Nomor Rak Buku..">
                </div>
                <textarea name="description" id="" rows="10"
                    class="w-full text-primary lg:text-xl text-lg  border border-primary  px-2 py-3 rounded-md focus:ring-1 focus:ring-primary focus:outline-none md:me-2 mb-5 md:mb-0"
                    placeholder="Deskripsi Buku Ini..."></textarea>
                <button class="px-4 w py-3 bg-primary text-accent font-bold rounded-lg">Tambah
                    Buku</button>
            </form>
        </div>

    </div>
</x-app-layout>
