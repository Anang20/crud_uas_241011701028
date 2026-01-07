    {{-- <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
        <style>
            body {
                background-color: #f8f9fa;
                background-image: url('../assets/image/bg-unpam-baru.jpg');
                background-size: cover;
                background-position: center;
            }

            .login-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 80vh;
            }

            .login-card {
                width: 100%;
                max-width: 400px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <div class="login-card">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }} 
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                        </form>

                        <div class="text-center">
                            <a href="{{ route('register') }}">Belum punya akun? daftar di sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html> --}}

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
        <body class="auth-page">

        <svg class="bg-svg-top" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#22c55e" fill-opacity="0.15"
                d="M0,96L48,128C96,160,192,224,288,234.7C384,245,480,203,576,170.7C672,139,768,117,864,128C960,139,1056,181,1152,176C1248,171,1344,117,1392,90.7L1440,64L1440,0L1392,0L1344,0L1248,0L1152,0L1056,0L960,0L864,0L768,0L672,0L576,0L480,0L384,0L288,0L192,0L96,0L48,0L0,0Z">
            </path>
        </svg>

        <svg class="bg-svg-bottom" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#16a34a" fill-opacity="0.12"
                d="M0,224L60,208C120,192,240,160,360,138.7C480,117,600,107,720,117.3C840,128,960,160,1080,181.3C1200,203,1320,213,1380,218.7L1440,224L1440,320L1380,320L1320,320L1200,320L1080,320L960,320L840,320L720,320L600,320L480,320L360,320L240,320L120,320L60,320L0,320Z">
            </path>
        </svg>

        <div class="auth-login-wrapper">
            <div class="auth-card">
                <div class="auth-header">
                    <i class="fas fa-lock"></i>
                    <h2>Masuk</h2>
                    <p>Gunakan akun Anda</p>
                </div>

                <div class="auth-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('login') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-user me-2"></i>Username</label>
                            <input type="text" name="username" placeholder="Masukkan username"
                                class="form-control @error('username') is-invalid @enderror">
                            @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-key me-2"></i>Password</label>
                            <input type="password" name="password" placeholder="contoh@gmail.com"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <button class="btn-auth">Login</button>
                    </form>
                </div>

                <div class="auth-footer">
                    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
                </div>
            </div>
        </div>
    </body>
</html>