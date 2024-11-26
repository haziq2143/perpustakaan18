<h1>Halo, {{ $user->name }}!</h1>
<p>Buku yang Anda pinjam, <strong>{{ $book->title }}</strong>, harus dikembalikan pada
    <strong>{{ $loan->return_date }}</strong>.</p>
<p>Jangan lupa mengembalikannya tepat waktu untuk menghindari denda.</p>
