<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

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

    <div class="auth-register-wrapper">
        <div class="auth-card">

            <!-- HEADER -->
            <div class="auth-header">
                <i class="fas fa-user-plus"></i>
                <h2>Daftar Akun</h2>
                <p>Buat akun baru untuk melanjutkan</p>
            </div>

            <div class="auth-body">

                @if (session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-circle-exclamation me-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-circle-check me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user me-2"></i>Nama Lengkap
                            </label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan nama lengkap"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-at me-2"></i>Username
                            </label>
                            <input
                                type="text"
                                name="username"
                                value="{{ old('username') }}"
                                class="form-control @error('username') is-invalid @enderror"
                                placeholder="Masukkan username"
                                required
                            >
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-envelope me-2"></i>Email
                            </label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="email@contoh.com"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user-shield me-2"></i>Role
                            </label>
                            <select
                                name="role"
                                class="form-control @error('role') is-invalid @enderror"
                                required
                            >
                                <option value="">-- Pilih Role --</option>
                                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-key me-2"></i>Password
                            </label>
                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Minimal 8 karakter"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-key me-2"></i>Konfirmasi Password
                            </label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Ulangi password"
                                required
                            >
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn-auth">
                        <i class="fas fa-user-plus me-2"></i>Register
                    </button>
                </form>
            </div>

            <div class="auth-footer">
                <p>Sudah punya akun?
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>

        </div>
    </div>

    </body>
</html>