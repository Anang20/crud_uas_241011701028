@section('title', 'Halaman Tidak Ditemukan')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }

        .stars {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        .container-404 {
            position: relative;
            z-index: 1;
            text-align: center;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            padding: 40px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .svg-container {
            margin: 0 auto 40px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .error-code {
            font-size: 120px;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 20px 0;
            line-height: 1;
            letter-spacing: -5px;
        }

        .error-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .error-message {
            font-size: 16px;
            color: #666;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .btn-home {
            display: inline-block;
            padding: 15px 45px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
            color: white;
            text-decoration: none;
        }

        .btn-home:active {
            transform: translateY(-1px);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .shape-1 {
            width: 100px;
            height: 100px;
            background: #667eea;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            top: -50px;
            right: -50px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 80px;
            height: 80px;
            background: #764ba2;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            bottom: -40px;
            left: -40px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(20px) rotate(10deg);
            }
        }

        @media (max-width: 576px) {
            .container-404 {
                padding: 40px 20px;
            }

            .error-code {
                font-size: 80px;
                letter-spacing: -3px;
            }

            .error-title {
                font-size: 24px;
            }

            .error-message {
                font-size: 14px;
            }

            .btn-home {
                padding: 12px 35px;
                font-size: 14px;
            }

            .svg-container {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="stars" id="stars"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <div class="container-404">
        <div class="svg-container">
            <svg viewBox="0 0 200 200" width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                <!-- Latar belakang planet -->
                <defs>
                    <radialGradient id="planetGradient" cx="35%" cy="35%">
                        <stop offset="0%" style="stop-color:#667eea;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#764ba2;stop-opacity:1" />
                    </radialGradient>
                    <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
                        <feDropShadow dx="2" dy="2" stdDeviation="3" flood-opacity="0.3"/>
                    </filter>
                </defs>

                <!-- Planet utama -->
                <circle cx="100" cy="100" r="80" fill="url(#planetGradient)" filter="url(#shadow)"/>

                <!-- Cincin planet -->
                <ellipse cx="100" cy="100" rx="95" ry="25" fill="none" stroke="#764ba2" stroke-width="3" opacity="0.6"/>

                <!-- Bintang satelit -->
                <g id="satellites" opacity="0.8">
                    <circle cx="30" cy="40" r="6" fill="#FFD700"/>
                    <circle cx="170" cy="50" r="5" fill="#FFD700"/>
                    <circle cx="40" cy="160" r="4" fill="#FFD700"/>
                </g>

                <!-- Wajah planet yang sedih (cute) -->
                <g id="face">
                    <!-- Mata kiri -->
                    <circle cx="80" cy="85" r="6" fill="white"/>
                    <circle cx="80" cy="85" r="3" fill="#333"/>
                    
                    <!-- Mata kanan -->
                    <circle cx="120" cy="85" r="6" fill="white"/>
                    <circle cx="120" cy="85" r="3" fill="#333"/>

                    <!-- Mulut sedih -->
                    <path d="M 85 115 Q 100 105 115 115" stroke="#333" stroke-width="2" fill="none" stroke-linecap="round"/>

                    <!-- Keringat -->
                    <circle cx="75" cy="110" r="2" fill="#667eea" opacity="0.7"/>
                    <circle cx="125" cy="110" r="2" fill="#667eea" opacity="0.7"/>
                </g>

                <!-- Bintang-bintang di sekitar -->
                <g id="stars" opacity="0.9">
                    <circle cx="20" cy="20" r="2" fill="#FFD700"/>
                    <circle cx="180" cy="30" r="1.5" fill="#FFD700"/>
                    <circle cx="25" cy="180" r="1.5" fill="#FFD700"/>
                    <circle cx="175" cy="170" r="2" fill="#FFD700"/>
                    <circle cx="150" cy="20" r="1" fill="#FFD700"/>
                    <circle cx="50" cy="180" r="1" fill="#FFD700"/>
                </g>
            </svg>
        </div>

        <div class="error-code">404</div>
        <div class="error-title">Oops! Halaman Tidak Ditemukan</div>
        <p class="error-message">
            Maaf, halaman yang Anda cari telah menghilang ke alam semesta. Mungkin sudah dipindahkan atau tidak pernah ada di sini.
        </p>

        <a href="{{ route('dashboard') }}" class="btn-home">
            Kembali ke Dashboard
        </a>
    </div>

    <script>
        // Buat bintang-bintang acak di latar belakang
        const starsContainer = document.getElementById('stars');
        const numberOfStars = 50;

        for (let i = 0; i < numberOfStars; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            star.style.left = Math.random() * 100 + '%';
            star.style.top = Math.random() * 100 + '%';
            star.style.animationDelay = Math.random() * 3 + 's';
            starsContainer.appendChild(star);
        }

        // Animasi teks saat hover
        document.querySelector('.error-code').addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05) rotate(-2deg)';
        });

        document.querySelector('.error-code').addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
