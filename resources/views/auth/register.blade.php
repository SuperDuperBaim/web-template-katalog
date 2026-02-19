<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Modern Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #050505;
            background-image: 
                radial-gradient(at 0% 0%, hsla(153,95%,30%,0.4) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(153,95%,30%,0.35) 0px, transparent 50%);
            color: #ffffff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
        }

        .input-group input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #10B981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
            outline: none;
        }

        .modern-btn {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            transition: all 0.3s ease;
        }

        .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);
        }
        
        .glow-text {
            text-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
        }
    </style>
</head>
<body>

    <div class="glass-card w-full max-w-md p-8 rounded-2xl mx-4 my-8">
        <div class="text-center mb-6">
            <p class="text-emerald-500 font-medium mb-2 tracking-wider text-sm uppercase">Join Us</p>
            <h2 class="text-3xl font-bold tracking-tight glow-text">Create Account</h2>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="input-group">
                <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Full Name</label>
                <input type="text" name="name" id="name" required 
                    class="w-full px-4 py-3 rounded-xl placeholder-gray-600 focus:placeholder-gray-500"
                    placeholder="John Doe" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email Address</label>
                <input type="email" name="email" id="email" required 
                    class="w-full px-4 py-3 rounded-xl placeholder-gray-600 focus:placeholder-gray-500"
                    placeholder="name@example.com" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="password" class="block text-sm font-medium text-gray-400 mb-1">Password</label>
                <input type="password" name="password" id="password" required 
                    class="w-full px-4 py-3 rounded-xl placeholder-gray-600 focus:placeholder-gray-500"
                    placeholder="••••••••">
                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-400 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required 
                    class="w-full px-4 py-3 rounded-xl placeholder-gray-600 focus:placeholder-gray-500"
                    placeholder="••••••••">
            </div>

            <button type="submit" class="modern-btn w-full text-white font-semibold py-3.5 rounded-xl mt-2">
                Register
            </button>
        </form>
        
        <div class="mt-6 text-center space-y-2">
            <p class="text-xs text-gray-500">
                Already have an account? <a href="{{ route('login') }}" class="text-emerald-400 hover:text-emerald-300 transition-colors">Sign In</a>
            </p>
            <div>
                <a href="/" class="text-xs text-gray-600 hover:text-gray-400 transition-colors">Back to Home</a>
            </div>
        </div>
    </div>

</body>
</html>
