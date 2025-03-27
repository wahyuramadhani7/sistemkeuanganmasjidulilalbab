<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Masjid UlilAlbaab</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Reset dan Font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f4f6f9;
            line-height: 1.6;
            color: #333;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Navbar */
        .navbar {
            background-color: #28a745;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .navbar-brand {
            color: white;
            font-weight: 600;
            font-size: 1.2em;
            text-decoration: none;
        }
        .navbar-menu {
            display: flex;
            align-items: center;
        }
        .navbar-menu a, .navbar-menu button {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .navbar-menu a:hover, .navbar-menu button:hover {
            background-color: rgba(255,255,255,0.2);
        }
        .navbar-menu button {
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        /* Card */
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 20px;
        }

        /* Form */
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #28a745;
            font-weight: 500;
        }
        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        .form-group input:focus, 
        .form-group select:focus {
            border-color: #28a745;
            outline: none;
        }

        /* Button */
        .btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #218838;
        }

        /* Table */
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        table th {
            background-color: #f8f9fa;
            color: #28a745;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                align-items: center;
            }
            .navbar-menu {
                margin-top: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            .navbar-menu a, 
            .navbar-menu button {
                margin: 5px;
            }
        }

        /* Utility */
        .text-center {
            text-align: center;
        }
        .mt-3 {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    @if(auth()->check())
    <div class="navbar">
        <div class="navbar-content">
            <a href="/finances" class="navbar-brand">Sistem Masjid</a>
            <div class="navbar-menu">
                <a href="/finances">Keuangan</a>
                <a href="/finances/summary">Ringkasan Keuangan</a>
                <a href="/zakats">Zakat</a>
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="container">
        @yield('content')
    </div>
</body>
</html>