<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    <script src="{{ asset('js/reader.js') }}" defer></script>
</head>

<body>
    <x-navbar.nav-layout />
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <script>
        function previewImage(event) {
            const input = event.target;
            const container = document.querySelector('.image');
            const icon = document.getElementById('icon-container');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    container.style.backgroundImage = `url(${e.target.result})`;
                    container.style.backgroundSize = 'cover';
                    container.style.backgroundPosition = 'center';
                    icon.style.opacity = '0'; // Sembunyikan ikon SVG
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
