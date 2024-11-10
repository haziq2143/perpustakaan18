<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    <script src="{{ asset('js/reader.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        let html5QrcodeScanner;
        let isScanningBook = false;
        let isScanningUser = false;
        const code = document.getElementById('code')
        const userCode = document.getElementById('code_user')
        const result = document.getElementById('result')

        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            if (isScanningBook) {
                code.value = decodedText
                isScanningBook = true
                Swal.fire({
                    title: "Good job!",
                    text: "Scan Berhasil!!",
                    icon: "success"
                });
            } else if (isScanningUser) {
                userCode.value = decodedText
                result.innerHTML = "scan Berhasil"
                Swal.fire({
                    title: "Good job!",
                    text: "Scan Berhasil!!",
                    icon: "success"
                });

            }
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        function startScanBook() {

            const scanButton = document.getElementById('scanButton');
            const readerBook = document.getElementById('readerBook');

            if (!isScanningBook) {
                readerBook.style.display = "block";
                html5QrcodeScanner = new Html5QrcodeScanner(
                    "readerBook", {
                        fps: 10,
                        qrbox: {
                            width: 250,
                            height: 250
                        }
                    },
                    false
                );

                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
                scanButton.innerText = "Berhenti Scan QR Code";
                isScanningBook = true;
            } else {
                html5QrcodeScanner.clear().then(() => {
                    readerBook.style.display = "none";
                    scanButton.innerText = "Mulai Scan";
                    isScanningBook = false;
                }).catch(err => {
                    console.error("Failed to clear scanner:", err);
                });
            }
        }

        function startScanUser() {

            const scanButton = document.getElementById('scanButtonUser');
            const readerUser = document.getElementById('readerUser');

            if (!isScanningUser) {
                readerUser.style.display = "block";
                html5QrcodeScanner = new Html5QrcodeScanner(
                    "readerUser", {
                        fps: 10,
                        qrbox: {
                            width: 250,
                            height: 250
                        }
                    },
                    false
                );

                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
                scanButton.innerText = "Berhenti Scan QR Code";
                isScanningUser = true;
            } else {
                html5QrcodeScanner.clear().then(() => {
                    readerUser.style.display = "none";
                    scanButton.innerText = "Mulai Scan";
                    isScanningUser = false;
                }).catch(err => {
                    console.error("Failed to clear scanner:", err);
                });
            }
        }
    </script>
</body>

</html>
