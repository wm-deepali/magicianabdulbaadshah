<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Magician Badshah Theme Party Planner')
    </title>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans Devanagari', system-ui, sans-serif;
        }

        .listing-card {
            transition: all 0.3s;
        }

        .listing-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        .tail-text {
            color: #0f766e;
        }


        .section-title {
            border-bottom: 3px solid #dc2626;
            padding-bottom: 0.5rem;
            color: #dc2626;
        }

        .warning-box {
            background-color: #fef2f2;
            border-left: 6px solid #dc2626;
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin: 1.5rem 0;
        }
    </style>

</head>

<body class="bg-gray-50 text-gray-800">

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

</body>

</html>