<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Katalog Template')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #050505;
            background-image: 
                radial-gradient(at 0% 0%, hsla(153,95%,30%,0.35) 0px, transparent 50%),
                radial-gradient(at 100% 0%, hsla(153,95%,30%,0.1) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(153,95%,30%,0.3) 0px, transparent 50%),
                radial-gradient(at 0% 100%, hsla(153,95%,30%,0.1) 0px, transparent 50%);
            background-attachment: fixed;
            color: #e5e7eb; /* Gray-200 */
            min-height: 100vh;
        }

        /* Scrollbar Customization */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #050505; 
        }
        ::-webkit-scrollbar-thumb {
            background: #1f2937; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #10B981; 
        }

        .glass-nav {
            background: rgba(5, 5, 5, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            border-color: rgba(16, 185, 129, 0.2);
            box-shadow: 0 8px 32px 0 rgba(16, 185, 129, 0.1);
        }

        .gradient-text {
            background: linear-gradient(135deg, #fff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gradient-text-green {
            background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            transition: all 0.3s ease;
            color: white;
            font-weight: 500;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .input-dark {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }
        .input-dark:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #10B981;
            outline: none;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="antialiased">

    @yield('content')

</body>
</html>
