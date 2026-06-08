<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login — Bedency Group</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Fraunces:ital,wght@0,300;0,400;0,600;1,300;1,400&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'DM Sans', sans-serif; }

    /* ── Theme ── */
    :root[data-theme="dark"] {
      --bg:          #0c0e18;
      --surface:     #13151f;
      --surface2:    #1a1d2e;
      --border:      #1e2130;
      --border-focus:#3b5bdb;
      --text:        #f1f3fa;
      --text-sub:    #8892b0;
      --text-muted:  #4a5270;
      --accent:      #3b5bdb;
      --accent-light:#7899f6;
      --accent-glow: rgba(59,91,219,0.25);
      --input-bg:    #0f1117;
      --btn-text:    #ffffff;
      --geo-color:   rgba(59,91,219,0.07);
      --error-bg:    rgba(239,68,68,0.08);
      --error-border: rgba(239,68,68,0.2);
      --error-text:  #f87171;
    }
    :root[data-theme="light"] {
      --bg:          #f0f2fa;
      --surface:     #ffffff;
      --surface2:    #f4f6fb;
      --border:      #dde1f0;
      --border-focus:#3b5bdb;
      --text:        #111827;
      --text-sub:    #4b5563;
      --text-muted:  #9ca3af;
      --accent:      #3b5bdb;
      --accent-light:#6480e8;
      --accent-glow: rgba(59,91,219,0.12);
      --input-bg:    #f8f9fd;
      --btn-text:    #ffffff;
      --geo-color:   rgba(59,91,219,0.05);
      --error-bg:    rgba(239,68,68,0.08);
      --error-border: rgba(239,68,68,0.2);
      --error-text:  #dc2626;
    }

    html, body { height: 100%; }

    body {
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
      transition: background 0.4s, color 0.4s;
    }

    /* ── Geometric background ── */
    .bg-geo {
      position: fixed; inset: 0; pointer-events: none; z-index: 0;
      overflow: hidden;
    }
    .geo-circle {
      position: absolute;
      border-radius: 50%;
      border: 1px solid var(--geo-color);
      transition: border-color 0.4s;
    }
    .geo-c1 { width: 600px; height: 600px; top: -200px; right: -150px; }
    .geo-c2 { width: 400px; height: 400px; top: -80px;  right: 50px; }
    .geo-c3 { width: 800px; height: 800px; bottom: -350px; left: -200px; }
    .geo-c4 { width: 300px; height: 300px; bottom: 80px; left: 40px; }
    .geo-dot {
      position: absolute;
      width: 4px; height: 4px;
      background: var(--accent);
      border-radius: 50%;
      opacity: 0.5;
    }
    .dot1 { top: 18%; right: 22%; }
    .dot2 { top: 42%; right: 8%; }
    .dot3 { bottom: 25%; left: 18%; }
    .dot4 { top: 70%; left: 35%; }

    .blob {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      opacity: 0.12;
      transition: opacity 0.4s;
    }
    [data-theme="light"] .blob { opacity: 0.07; }
    .blob1 { width: 400px; height: 400px; background: #3b5bdb; top: -80px; right: -60px; }
    .blob2 { width: 300px; height: 300px; background: #6480e8; bottom: -60px; left: -40px; }

    /* ── Card ── */
    .card {
      position: relative; z-index: 1;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 44px 40px;
      width: 100%;
      max-width: 420px;
      transition: background 0.4s, border-color 0.4s;
      animation: slideUp 0.55s cubic-bezier(0.22,1,0.36,1) both;
    }
    @media (max-width: 480px) {
      .card { padding: 32px 22px; margin: 16px; border-radius: 16px; }
    }

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* Admin badge */
    .admin-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 4px 12px 4px 6px;
      margin-bottom: 20px;
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      color: var(--accent-light);
    }
    .admin-badge-dot {
      width: 6px; height: 6px;
      background: var(--accent);
      border-radius: 50%;
      box-shadow: 0 0 6px var(--accent);
    }

    /* Typography */
    .heading {
      font-family: 'Fraunces', Georgia, serif;
      font-size: 26px;
      font-weight: 400;
      color: var(--text);
      line-height: 1.2;
      letter-spacing: -0.3px;
      margin-bottom: 6px;
    }
    .subheading {
      font-size: 13.5px;
      color: var(--text-sub);
      margin-bottom: 32px;
      line-height: 1.5;
    }

    /* Form fields */
    .field { margin-bottom: 18px; }
    .field label {
      display: block;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      color: var(--text-sub);
      margin-bottom: 7px;
    }
    .field-label-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 7px;
    }
    .field-label-row label { margin-bottom: 0; }
    .field-label-row a {
      font-size: 11.5px;
      font-weight: 600;
      color: var(--accent-light);
      text-decoration: none;
      letter-spacing: 0.02em;
      transition: opacity 0.2s;
    }
    .field-label-row a:hover { opacity: 0.75; }

    .input-wrap { position: relative; }
    .input-icon {
      position: absolute;
      left: 13px; top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      pointer-events: none;
      transition: color 0.2s;
    }
    .field input[type="email"],
    .field input[type="password"],
    .field input[type="text"] {
      width: 100%;
      background: var(--input-bg);
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: 11px 13px 11px 40px;
      font-size: 14px;
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s, background 0.3s;
    }
    .field input:focus {
      border-color: var(--border-focus);
      box-shadow: 0 0 0 3px var(--accent-glow);
    }
    .field input::placeholder { color: var(--text-muted); }
    .field input.has-right-icon { padding-right: 42px; }

    .input-icon-right {
      position: absolute;
      right: 13px; top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      cursor: pointer;
      background: none;
      border: none;
      padding: 0;
      display: flex;
      align-items: center;
      transition: color 0.2s;
    }
    .input-icon-right:hover { color: var(--text-sub); }

    /* Remember row */
    .remember-row {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 22px;
    }
    .remember-row input[type="checkbox"] {
      width: 15px;
      height: 15px;
      accent-color: var(--accent);
      cursor: pointer;
      flex-shrink: 0;
    }
    .remember-row label {
      font-size: 13px;
      color: var(--text-sub);
      cursor: pointer;
      user-select: none;
    }

    /* Button */
    .btn-primary {
      width: 100%;
      background: var(--accent);
      color: var(--btn-text);
      border: none;
      border-radius: 10px;
      padding: 13px;
      font-size: 14px;
      font-weight: 600;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      letter-spacing: 0.02em;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 16px var(--accent-glow);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .btn-primary:hover {
      background: #2f4dbf;
      transform: translateY(-1px);
      box-shadow: 0 6px 22px var(--accent-glow);
    }
    .btn-primary:active { transform: translateY(0); }

    /* Divider */
    .divider {
      display: flex; align-items: center; gap: 12px;
      margin: 24px 0;
      color: var(--text-muted);
      font-size: 12px;
    }
    .divider::before, .divider::after {
      content: ''; flex: 1; height: 1px; background: var(--border);
    }

    /* Back link */
    .back-link {
      text-align: center;
      font-size: 13px;
      color: var(--text-sub);
    }
    .back-link a {
      color: var(--accent-light);
      text-decoration: none;
      font-weight: 600;
      transition: opacity 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .back-link a:hover { opacity: 0.75; }

    /* Alert boxes */
    .alert-box {
      border-radius: 12px;
      padding: 12px 16px;
      margin-bottom: 24px;
      display: flex;
      gap: 12px;
      align-items: flex-start;
      font-size: 13px;
    }
    .alert-error {
      background: var(--error-bg);
      border: 1px solid var(--error-border);
      color: var(--error-text);
    }
    .alert-icon { flex-shrink: 0; margin-top: 1px; }

    /* Theme toggle */
    .theme-btn {
      position: fixed;
      top: 20px; right: 20px;
      z-index: 10;
      width: 38px; height: 38px;
      border-radius: 10px;
      background: var(--surface);
      border: 1px solid var(--border);
      color: var(--text-sub);
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      transition: background 0.3s, border-color 0.3s, color 0.2s;
    }
    .theme-btn:hover { color: var(--text); }

    [data-theme="dark"]  .icon-sun  { display: block; }
    [data-theme="dark"]  .icon-moon { display: none; }
    [data-theme="light"] .icon-sun  { display: none; }
    [data-theme="light"] .icon-moon { display: block; }

    .shake-animation {
      animation: shake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
    }
    @keyframes shake {
      10%, 90% { transform: translateX(-1px); }
      20%, 80% { transform: translateX(2px); }
      30%, 50%, 70% { transform: translateX(-3px); }
      40%, 60% { transform: translateX(3px); }
    }
  </style>
</head>
<body>

  <!-- Geometric background -->
  <div class="bg-geo">
    <div class="blob blob1"></div>
    <div class="blob blob2"></div>
    <div class="geo-circle geo-c1"></div>
    <div class="geo-circle geo-c2"></div>
    <div class="geo-circle geo-c3"></div>
    <div class="geo-circle geo-c4"></div>
    <div class="geo-dot dot1"></div>
    <div class="geo-dot dot2"></div>
    <div class="geo-dot dot3"></div>
    <div class="geo-dot dot4"></div>
  </div>

  <!-- Theme toggle -->
  <button class="theme-btn" onclick="toggleTheme()" title="Toggle theme" aria-label="Theme switch">
    <svg class="icon-sun w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
    <svg class="icon-moon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
  </button>

  <!-- Card -->
  <div class="card" id="login-card">

    <!-- Admin badge -->
    <div class="admin-badge">
      <span class="admin-badge-dot"></span>
      Admin Portal
    </div>

    <h1 class="heading">Welcome back</h1>
    <p class="subheading">Sign in to access the Bedency Group dashboard</p>

    <!-- Error: session -->
    @if(session('error'))
    <div class="alert-box alert-error">
      <svg class="alert-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      <span>{{ session('error') }}</span>
    </div>
    @endif

    <!-- Error: validation -->
    @if($errors->any())
    <div class="alert-box alert-error">
      <svg class="alert-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      <ul style="list-style: disc; padding-left: 14px;">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Login form -->
    <form method="POST" action="{{route('login')}}" id="logins-form">
      @csrf

      <!-- Email -->
      <div class="field">
        <label for="login-email">Email address</label>
        <div class="input-wrap">
          <span class="input-icon">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </span>
          <input
            type="email"
            id="login-email"
            name="email"
            value="{{ old('email') }}"
            placeholder="admin@bedency.com"
            autocomplete="email"
            required
          />
        </div>
      </div>

      <!-- Password -->
      <div class="field">
        <div class="field-label-row">
          <label for="login-password">Password</label>
          <a href="/forgot-password">Forgot password?</a>
        </div>
        <div class="input-wrap">
          <span class="input-icon">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
          </span>
          <input
            type="password"
            id="login-password"
            name="password"
            placeholder="••••••••"
            autocomplete="current-password"
            class="has-right-icon"
            required
          />
          <button type="button" class="input-icon-right" onclick="togglePassword()" aria-label="Toggle password visibility">
            <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
          </button>
        </div>
      </div>

      <!-- Remember me -->
      <div class="remember-row">
        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/>
        <label for="remember">Keep me signed in</label>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
        Sign in
      </button>
    </form>

    <!-- Divider + back link -->
    <div class="divider">or</div>
    <div class="back-link">
      <a href="/">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to homepage
      </a>
    </div>

  </div>

  <script>
    // Theme persistence
    function toggleTheme() {
      const root = document.documentElement;
      const newTheme = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      root.setAttribute('data-theme', newTheme);
      localStorage.setItem('bg-theme', newTheme);
    }
    const savedTheme = localStorage.getItem('bg-theme');
    if (savedTheme) document.documentElement.setAttribute('data-theme', savedTheme);

    // Password toggle
    function togglePassword() {
      const input = document.getElementById('login-password');
      const icon  = document.getElementById('eye-icon');
      const isPassword = input.type === 'password';
      input.type = isPassword ? 'text' : 'password';
      icon.innerHTML = isPassword
        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>'
        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
    }

    // Shake on validation errors (when page loads with errors)
    @if($errors->any() || session('error'))
    document.addEventListener('DOMContentLoaded', () => {
      const card = document.getElementById('login-card');
      card.classList.add('shake-animation');
      setTimeout(() => card.classList.remove('shake-animation'), 500);
    });
    @endif
  </script>
</body>
</html>