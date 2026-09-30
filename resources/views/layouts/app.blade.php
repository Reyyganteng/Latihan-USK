<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Katalog UMKM Siswa SMK')
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }

        .navbar {
            background: #172033;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .hero {
            background: linear-gradient(135deg,
                    #172033,
                    #304a70);
            color: white;
            padding: 100px 0;
        }

        .product-card {
            height: 100%;
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        .product-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .price {
            font-weight: bold;
            color: #172033;
        }

        footer {
            margin-top: 80px;
            background: #172033;
            color: white;
            padding: 25px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                Katalog UMKM Siswa SMK
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            Katalog
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">
                            Admin
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>


    @yield('content')


    <footer class="text-center">
        <div class="container">
            Katalog UMKM Siswa SMK
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
