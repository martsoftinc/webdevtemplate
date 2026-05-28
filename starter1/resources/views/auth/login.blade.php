<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login - Bedency Group</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <style>
    * { font-family: 'DM Sans', sans-serif; }
    body { 
      background: linear-gradient(135deg, #0f1117 0%, #1a1d2e 100%);
      min-height: 100vh;
    }
    
    .login-card {
      background: rgba(19, 21, 31, 0.95);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(59, 91, 219, 0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    
    .input-field {
      background: #0f1117;
      border: 1px solid #1e2130;
      transition: all 0.3s ease;
    }
    
    .input-field:focus {
      border-color: #3b5bdb;
      box-shadow: 0 0 0 3px rgba(59, 91, 219, 0.1);
      outline: none;
    }
    
    .btn-login {
      background: linear-gradient(135deg, #3b5bdb 0%, #5a7de0 100%);
      transition: all 0.3s ease;
    }
    
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(59, 91, 219, 0.3);
    }
    
    .error-message {
      animation: shake 0.5s ease-in-out;
    }
    
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      75% { transform: translateX(5px); }
    }
    
    .bg-pattern {
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233b5bdb' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    .remember-checkbox {
      accent-color: #3b5bdb;
    }
    
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .fade-in {
      animation: fadeIn 0.6s ease-out;
    }
  </style>
</head>
<body class="flex items-center justify-center p-4">
  
  <div class="absolute inset-0 bg-pattern pointer-events-none"></div>
  
  <div class="w-full max-w-md fade-in">
    <!-- Logo/Brand -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg mb-4">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
      </div>
      <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
      <p class="text-gray-400 text-sm">Sign in to access the admin dashboard</p>
    </div>
    
    <!-- Login Card -->
    <div class="login-card rounded-2xl p-8 shadow-xl">
      
      <!-- Error Messages -->
      @if(session('error'))
        <div class="error-message mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-sm flex items-start gap-3">
          <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <span>{{ session('error') }}</span>
        </div>
      @endif
      
      @if($errors->any())
        <div class="error-message mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-sm flex items-start gap-3">
          <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <!-- Login Form -->
      <form method="POST" action="" class="space-y-5">
        @csrf
        
        <!-- Email Field -->
        <div>
          <label class="block text-gray-300 text-sm font-medium mb-2">Email Address</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
              </svg>
            </div>
            <input type="email" 
                   name="email" 
                   value="{{ old('email') }}"
                   required
                   class="input-field w-full pl-10 pr-4 py-3 rounded-lg text-gray-300 placeholder-gray-600 focus:outline-none"
                   placeholder="admin@bedency.com">
          </div>
        </div>
        
        <!-- Password Field -->
        <div>
          <label class="block text-gray-300 text-sm font-medium mb-2">Password</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6-4h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4V6a4 4 0 00-8 0v4h8z"/>
              </svg>
            </div>
            <input type="password" 
                   name="password" 
                   id="password"
                   required
                   class="input-field w-full pl-10 pr-12 py-3 rounded-lg text-gray-300 placeholder-gray-600 focus:outline-none"
                   placeholder="••••••••">
            <button type="button" 
                    onclick="togglePassword()" 
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-300">
              <svg id="eye-icon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </button>
          </div>
        </div>
        
        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" 
                   name="remember" 
                   class="remember-checkbox w-4 h-4 rounded"
                   {{ old('remember') ? 'checked' : '' }}>
            <span class="text-gray-400 text-sm">Remember me</span>
          </label>
          <a href="/forgot-password" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">
            Forgot password?
          </a>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" 
                class="btn-login w-full py-3 rounded-lg text-white font-semibold transition-all">
          Sign In
        </button>
        
        
      </form>
    </div>
    
    <!-- Back to Home Link -->
    <div class="text-center mt-6">
      <a href=" " class="text-gray-500 text-sm hover:text-gray-300 transition-colors inline-flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Homepage
      </a>
    </div>
  </div>
  
  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eye-icon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
      } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
      }
    }
  </script>
</body>
</html>