<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <!-- CSS utama -->
    <style>
        /* Kontainer utama halaman 404 */
        .notfound-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #dcfce7 0%, #22c55e 100%);
            position: relative;
            overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-404 {
            background: rgba(255,255,255,0.95);
            padding: 2.5rem;
            border-radius: 2rem;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            max-width: 600px;
            position: relative;
            z-index: 1;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .svg-container {
            margin: 0 auto 2rem;
            width: 160px;
            height: 160px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .error-code {
            font-size: 6rem;
            font-weight: 900;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        .error-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .btn-home {
            display: inline-block;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(34,197,94,0.4);
            transition: all 0.3s ease;
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(34,197,94,0.6);
            text-decoration: none;
            color: white;
        }

        .stars {
            position: absolute;
            inset: 0;
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
            0%,100% { opacity: 0.3; }
            50% { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="notfound-container">
        <div class="stars" id="stars"></div>

        <div class="container-404">
            <div class="svg-container">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <radialGradient id="planetGradient" cx="35%" cy="35%">
                            <stop offset="0%" stop-color="#22c55e"/>
                            <stop offset="100%" stop-color="#16a34a"/>
                        </radialGradient>
                        <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
                            <feDropShadow dx="2" dy="2" stdDeviation="3" flood-opacity="0.3"/>
                        </filter>
                    </defs>
                    <circle cx="100" cy="100" r="80" fill="url(#planetGradient)" filter="url(#shadow)"/>
                    <ellipse cx="100" cy="100" rx="95" ry="25" fill="none" stroke="#16a34a" stroke-width="3" opacity="0.6"/>
                    <!-- Mata dan mulut sedih -->
                    <circle cx="80" cy="85" r="6" fill="white"/>
                    <circle cx="80" cy="85" r="3" fill="#333"/>
                    <circle cx="120" cy="85" r="6" fill="white"/>
                    <circle cx="120" cy="85" r="3" fill="#333"/>
                    <path d="M 85 115 Q 100 105 115 115" stroke="#333" stroke-width="2" fill="none" stroke-linecap="round"/>
                </svg>
            </div>

            <div class="error-code">404</div>
            <div class="error-title">Oops! Halaman Tidak Ditemukan</div>
            <p class="error-message">
                Maaf, halaman yang Anda cari tidak tersedia.
            </p>
            <a href="{{ route('dashboard') }}" class="btn-home">Kembali ke Dashboard</a>
        </div>
    </div>

    <script>
        // Bintang acak
        const starsContainer = document.getElementById('stars');
        const numberOfStars = 50;
        for(let i=0;i<numberOfStars;i++){
            const star = document.createElement('div');
            star.className='star';
            star.style.left = Math.random()*100 + '%';
            star.style.top = Math.random()*100 + '%';
            star.style.width = (Math.random()*2+1)+'px';
            star.style.height = star.style.width;
            star.style.animationDelay = Math.random()*3+'s';
            starsContainer.appendChild(star);
        }
    </script>
</body>
</html>
