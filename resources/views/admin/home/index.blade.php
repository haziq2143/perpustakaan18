<x-app-layout>
    <div class="md:p-4 ">
        <a href="/export" class="px-4 py-3 bg-primary text-accent font-semibold rounded-md ">Cetak Data Loan</a>
        <div class="mt-10 grid md:grid-cols-3 grid-cols-2 md:gap-4 gap-1 mb-4">
            <div class=" h-24 rounded bg-primary ">
                <p class="text-sm text-accent p-2 font-semibold">Users</p>
                <h1 class="text-xl text-accent font-bold flex justify-center items-center"><img
                        src="{{ asset('images/user-svgrepo-com.svg') }}" alt="" class="w-7 pe-1">
                    {{ $user }}</h1>
            </div>
            <div class="h-24 rounded bg-primary ">
                <p class="text-sm text-accent p-2 font-semibold">Books</p>
                <h1 class="text-xl text-accent font-bold flex justify-center items-center"><img
                        src="{{ asset('images/book-svgrepo-com.svg') }}" alt="" class="w-7 pe-1">
                    {{ $book }}</h1>
            </div>


        </div>
        <div class="flex items-center justify-center h-48 mb-4">
            <div style="width: 80%; margin: auto;">
                <canvas id="barChart"></canvas>
            </div>
        </div>

    </div>



    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'Peminjam',
                    data: @json($totals),
                    backgroundColor: '#1C5F33',
                    borderColor: '#1C5F33',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</x-app-layout>
