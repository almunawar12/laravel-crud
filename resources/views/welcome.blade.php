<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            /* Mengatur agar html dan body memiliki tinggi penuh */
            margin: 0;
        }

        body {
            background: linear-gradient(to bottom, #6a11cb, #2575fc);
            /* Gradasi warna background */
            color: #fff;
            font-family: 'Arial', sans-serif;
            min-height: 100%;
            /* Pastikan body setinggi mungkin */
            display: flex;
            flex-direction: column;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
            flex: 1;
            /* Agar div hero mengambil ruang kosong */
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.5rem;
            margin: 20px 0;
        }

        .btn-custom {
            background-color: #ff6b6b;
            border: none;
            padding: 15px 30px;
            font-size: 1rem;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #ee5253;
            color: #fff;
            transform: scale(1.1);
        }

        footer {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
        }

        footer a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="hero">
        <h1>Selamat Datang di Aplikasi Laravel</h1>
        <p>Manajemen Produk Sederhana dengan Laravel</p>
        <a href="{{ route('products.index') }}" class="btn btn-custom">Kelola Produk</a>
    </div>

    <footer>
        <p>Made with ❤️ by <a href="https://laravel.com/" target="_blank">Laravel Developer</a></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>