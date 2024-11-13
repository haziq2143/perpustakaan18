<x-app-layout>

    <div class="w-full">
        <h1 class="text-primary font-bold text-4xl text-center mb-10">Denda Buku</h1>
        <form action="/fines/{{ $fine->id }}" method="POST" class="w-full mx-auto">
            @csrf


            <h3 class=" text-2xl  ">Buku: <span class="font-bold text-primary">{{ $fine->loan->book->title }}</span>
            </h3>
            <div class="md:flex md:justify-between">
                <h3 class=" text-2xl ">Tanggal Pengembalian Normal:
                    <span class="font-semibold text-primary">{{ $fine->loan->due_date }}</span>
                </h3>
                <h3 class=" text-2xl  ">Tanggal Pengembalian:
                    <span class="text-red-500 font-semibold">{{ $fine->loan->return_date }}</span>
                </h3>
            </div>
            <div class="md:flex md:justify-between">

                <h3 class=" text-2xl  ">Telat:
                    <span class="text-red-500 font-bold">{{ $daysDifference }} Hari</span>
                </h3>


                <h3 class=" text-2xl  ">Denda: <span class="text-red-500 font-bold">Rp.{{ $fine->amount }}</span>
                </h3>
            </div>
            <div class="w-full mt-10 flex justify-end">
                <button type="submit"
                    class="px-4 py-3  md:px-5 md:py-3 bg-primary text-accent font-bold rounded-lg ">Bayar</button>
            </div>
        </form>

    </div>
</x-app-layout>
