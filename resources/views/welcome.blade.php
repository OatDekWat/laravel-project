<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยินดีต้อนรับ</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .bg {
            background-image: url('{{ asset('img/welcome_img.jpg') }}');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .bg::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            /* background: rgba(255,255,255,0.5); */
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .btn {
            background-color: #00a336;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 42px;
            margin: 4px 2px;
            margin-top: 700px; /* ขยับเฉพาะด้านบน */
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.2s ease; /* ทำให้ปุ่มสามารถยุบและเด้ง */
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.5); /* เพิ่มเงาสีขาว */
        }

        /* เมื่อกดปุ่ม */
        .btn:active {
            transform: scale(0.9); /* ยุบปุ่มลง */
        }

        /* เพิ่มแอนิเมชันเด้ง */
        .btn-bounce {
            animation: bounce 0.4s ease;
        }

        @keyframes bounce {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(0.9); /* ยุบลง */
            }
        }
    </style>
</head>
<body>
    <div class="bg">
        {{-- <img src="{{ asset('img/welcome_img.jpg') }}" alt="Logo" width="10"  class="d-inline-block align-text-top" style="margin: 0; padding: 0;  margin-top: -21px;"> --}}
        <div class="content">
    
            <a href="{{ route('login') }}" class="btn">เข้าสู่ระบบ</a>
        </div>
    </div>
</body>
</html>

            {{-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}