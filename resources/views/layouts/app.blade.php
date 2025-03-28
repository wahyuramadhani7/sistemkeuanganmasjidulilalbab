<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Masjid UlilAlbaab</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Variabel warna Muhammadiyah (biru) */
        :root {
            --primary-color: #0066b3;    /* Biru Muhammadiyah utama */
            --secondary-color: #004d99;  /* Biru Muhammadiyah lebih tua */
            --accent-color: #ffd700;     /* Aksen kuning emas */
            --light-color: #f8f9fa;      /* Abu pucat */
            --dark-color: #2c3e50;       /* Biru gelap */
            --bg-color: #f4f6f9;         /* Background abu muda */
            --shadow-color: rgba(0, 102, 179, 0.2); /* Bayangan biru */
        }

        /* Reset dan Font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: var(--bg-color);
            background-image: url('https://i.pinimg.com/originals/0f/88/3e/0f883e6f5db348671c1e26a7dfd2e5f3.jpg');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            line-height: 1.6;
            color: var(--dark-color);
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.85);
            z-index: -1;
        }

        /* Container dengan animasi */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 25px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.6s forwards 0.3s;
        }
        
        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Navbar dengan animasi dan dekorasi */
        .navbar {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 15px var(--shadow-color);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .navbar::after {
            content: "";
            position: absolute;
            bottom: -7px;
            left: 0;
            width: 100%;
            height: 7px;
            background-image: 
                linear-gradient(135deg, transparent 25%, rgba(255, 255, 255, 0.05) 25%), 
                linear-gradient(225deg, transparent 25%, rgba(255, 255, 255, 0.05) 25%);
            background-size: 20px 20px;
        }
        
        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .navbar-brand {
            color: white;
            font-weight: 600;
            font-size: 1.3em;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }
        
        .navbar-brand:hover {
            transform: scale(1.05);
        }
        
        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        
        .navbar-menu {
            display: flex;
            align-items: center;
        }
        
        .navbar-menu a, 
        .navbar-menu button {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 8px 18px;
            border-radius: 30px;
            transition: all 0.3s ease;
            min-width: 110px;
            text-align: center;
            display: inline-block;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .navbar-menu a::before, 
        .navbar-menu button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            z-index: -1;
        }
        
        .navbar-menu a:hover::before, 
        .navbar-menu button:hover::before {
            left: 0;
        }
        
        .navbar-menu a:hover, 
        .navbar-menu button:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        
        .navbar-menu button {
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }
        
        /* Styling untuk tombol aktif */
        .navbar-menu a.active {
            background-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-menu a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40%;
            height: 3px;
            background-color: var(--accent-color);
            border-radius: 3px;
        }

        /* Card dengan animasi dan dekorasi islami */
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            border-top: 4px solid var(--primary-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.12);
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            background-image: url('https://i.pinimg.com/originals/eb/33/53/eb33531854558338fc15eac8a6327953.png');
            background-size: contain;
            background-repeat: no-repeat;
            opacity: 0.05;
            transform: rotate(30deg);
            transition: transform 0.5s ease;
        }
        
        .card:hover::before {
            transform: rotate(45deg) scale(1.2);
        }
        
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding-bottom: 15px;
        }
        
        .card-header h2 {
            margin: 0;
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.4em;
        }
        
        .card-header i {
            color: var(--primary-color);
            font-size: 1.5em;
            margin-right: 10px;
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--primary-color);
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .form-group input, 
        .form-group select, 
        .form-group textarea {
            width: 100%;
            padding: 12px 15px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-group i {
            position: absolute;
            left: 15px;
            top: 43px;
            color: #aaa;
            transition: color 0.3s ease;
        }
        
        .form-group input:focus, 
        .form-group select:focus, 
        .form-group textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--shadow-color);
            outline: none;
        }
        
        .form-group input:focus + i, 
        .form-group select:focus + i, 
        .form-group textarea:focus + i {
            color: var(--primary-color);
        }
        
        .form-group:focus-within label {
            color: var(--accent-color);
        }

        /* Button */
        .btn {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            z-index: 1;
            display: inline-block;
            box-shadow: 0 4px 10px var(--shadow-color);
        }
        
        .btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
            z-index: -1;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px var(--shadow-color);
        }
        
        .btn:hover::after {
            left: 100%;
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .btn i {
            margin-right: 8px;
        }

        /* Table */
        .table-responsive {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            overflow: hidden;
        }
        
        table th, table td {
            border: 1px solid #eee;
            padding: 14px;
            text-align: left;
        }
        
        table th {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            font-weight: 500;
        }
        
        table tr {
            transition: background-color 0.3s ease;
        }
        
        table tr:nth-child(even) {
            background-color: rgba(0, 102, 179, 0.03);
        }
        
        table tr:hover {
            background-color: rgba(0, 102, 179, 0.07);
        }
        
        table td {
            border-bottom: 1px solid #eee;
            position: relative;
        }
        
        table td::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 1px;
            width: 0;
            background-color: var(--primary-color);
            transition: width 0.5s ease;
        }
        
        table tr:hover td::after {
            width: 100%;
        }

        /* Footer dengan animasi dan dekorasi islami */
        .footer {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px 0;
            margin-top: 40px;
            position: relative;
            box-shadow: 0 -4px 15px var(--shadow-color);
        }
        
        .footer::before {
            content: "";
            position: absolute;
            top: -7px;
            left: 0;
            width: 100%;
            height: 7px;
            background-image: 
                linear-gradient(135deg, transparent 25%, rgba(255, 255, 255, 0.05) 25%), 
                linear-gradient(225deg, transparent 25%, rgba(255, 255, 255, 0.05) 25%);
            background-size: 20px 20px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding: 0 20px;
            position: relative;
        }
        
        .footer-content::before {
            content: "۝";
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
            color: rgba(255, 255, 255, 0.8);
            background-color: var(--primary-color);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .footer-content p {
            margin: 0;
            font-size: 1em;
            font-weight: 500;
            letter-spacing: 1px;
            position: relative;
        }
        
        .footer-logo {
            margin-bottom: 10px;
            display: block;
            opacity: 0.9;
        }
        
        .footer-content ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 15px 0;
        }
        
        .footer-content ul li {
            margin: 0 10px;
        }
        
        .footer-content ul li a {
            color: white;
            font-size: 1.2em;
            transition: all 0.3s ease;
        }
        
        .footer-content ul li a:hover {
            color: var(--accent-color);
            transform: translateY(-3px);
            display: inline-block;
        }
        
        .footer-bottom {
            margin-top: 15px;
            font-size: 0.9em;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Animasi */
        @keyframes fadeIn {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }
        
        .animated-icon {
            animation: float 3s ease-in-out infinite;
            display: inline-block;
        }
        
        /* Alert Box */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            animation: fadeUp 0.5s ease-out;
        }
        
        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border-left: 4px solid #28a745;
            color: #1e7e34;
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border-left: 4px solid #dc3545;
            color: #bd2130;
        }
        
        .alert-warning {
            background-color: rgba(255, 193, 7, 0.1);
            border-left: 4px solid #ffc107;
            color: #d39e00;
        }
        
        .alert-info {
            background-color: rgba(23, 162, 184, 0.1);
            border-left: 4px solid #17a2b8;
            color: #117a8b;
        }
        
        .alert i {
            margin-right: 10px;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 0.75em;
            font-weight: 500;
            border-radius: 20px;
            text-transform: uppercase;
        }
        
        .badge-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .badge-secondary {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .badge-accent {
            background-color: var(--accent-color);
            color: white;
        }

        /* Responsif */
        @media (max-width: 992px) {
            .container {
                padding: 15px;
            }
            
            .navbar-content {
                padding: 10px 15px;
            }
        }
        
        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                align-items: center;
            }
            
            .navbar-brand {
                margin-bottom: 10px;
            }
            
            .navbar-menu {
                margin-top: 10px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .navbar-menu a, 
            .navbar-menu button {
                margin: 5px;
                min-width: 90px;
                font-size: 0.9em;
            }
            
            .card {
                padding: 20px;
            }
            
            .form-group label {
                font-size: 0.9em;
            }
            
            table th, table td {
                padding: 10px;
                font-size: 0.9em;
            }
        }
        
        @media (max-width: 576px) {
            .navbar-menu a, 
            .navbar-menu button {
                min-width: 80px;
                font-size: 0.85em;
                padding: 6px 12px;
            }
            
            .card-header h2 {
                font-size: 1.2em;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
            
            .footer-content ul {
                flex-wrap: wrap;
            }
            
            .footer-content ul li {
                margin: 5px;
            }
        }

        /* Utility */
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        .mt-1 {
            margin-top: 0.25rem;
        }
        
        .mt-2 {
            margin-top: 0.5rem;
        }
        
        .mt-3 {
            margin-top: 1rem;
        }
        
        .mt-4 {
            margin-top: 1.5rem;
        }
        
        .mt-5 {
            margin-top: 2rem;
        }
        
        .mb-1 {
            margin-bottom: 0.25rem;
        }
        
        .mb-2 {
            margin-bottom: 0.5rem;
        }
        
        .mb-3 {
            margin-bottom: 1rem;
        }
        
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        
        .mb-5 {
            margin-bottom: 2rem;
        }
        
        .p-1 {
            padding: 0.25rem;
        }
        
        .p-2 {
            padding: 0.5rem;
        }
        
        .p-3 {
            padding: 1rem;
        }
        
        .p-4 {
            padding: 1.5rem;
        }
        
        .p-5 {
            padding: 2rem;
        }
        
        .flex {
            display: flex;
        }
        
        .flex-between {
            justify-content: space-between;
        }
        
        .flex-center {
            justify-content: center;
            align-items: center;
        }
        
        .text-primary {
            color: var(--primary-color);
        }
        
        .text-secondary {
            color: var(--secondary-color);
        }
        
        .text-accent {
            color: var(--accent-color);
        }
        
        .text-muted {
            color: #6c757d;
        }
        
        .text-white {
            color: white;
        }
        
        .fw-bold {
            font-weight: 600;
        }
        
        .rounded {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    @if(auth()->check())
    <div class="navbar">
        <div class="navbar-content">
            <a href="/finances" class="navbar-brand">
                <i class="fas fa-mosque"></i> Sistem Masjid Ulil Albab
            </a>
            <div class="navbar-menu">
                <a href="/finances">
                    <i class="fas fa-coins"></i> Keuangan
                </a>
                <a href="/finances/summary">
                    <i class="fas fa-chart-line"></i> Ringkasan
                </a>
                <a href="/zakats">
                    <i class="fas fa-hand-holding-usd"></i> Zakat
                </a>
                <a href="/qurbans">
                    <i class="fas fa-sheep"></i> Qurban
                </a>
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="footer">
        <div class="footer-content">
            <img src="/images/bismillah.png" alt="Bismillah" class="footer-logo" width="120">
            <p><span class="animated-icon">۞</span> Masjid Ulil Albaab <span class="animated-icon">۞</span></p>
            <ul>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i></a></li>
            </ul>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Masjid Ulil Albaab. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript untuk mendeteksi halaman aktif dan animasi tambahan -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Deteksi halaman aktif
            const navLinks = document.querySelectorAll('.navbar-menu a');
            const currentPath = window.location.pathname;

            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === currentPath || (href !== '/' && currentPath.startsWith(href))) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
            
            // Animasi untuk cards saat scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>