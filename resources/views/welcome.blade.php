<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(to right, #0d6efd, #6ea8fe);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #fff;
        overflow-x: hidden;
    }

    .card-custom {
        border-radius: 20px;
        background-color: #ffffff;
        color: #333;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        animation: fadeIn 1s ease;
    }

    .btn-custom {
        transition: 0.3s ease;
    }

    .btn-custom:hover {
        transform: scale(1.05);
    }

    .illustration {
        width: 200px;
        margin-bottom: 20px;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card text-center p-5 card-custom">

                    <img src="{{ asset('images/klinikgambar.png') }}" alt="Illustration" class="illustration mx-auto"
                        alt="Illustration" class="illustration mx-auto">

                    <h1 class="h3 fw-bold text-primary mb-3">Selamat Datang di <span
                            class="text-decoration-underline">Sistem Informasi Klinik</span></h1>

                    <p class="text-muted mb-4">
                        Kelola data klinik, pendaftaran pasien, tindakan medis, hingga laporan dengan lebih cepat dan
                        efisien.
                    </p>

                    @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 btn-custom">Login</a>
                    @endguest

                    @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg px-4 btn-custom">Masuk ke
                        Dashboard</a>
                    @endauth

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>