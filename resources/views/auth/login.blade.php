<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edugate | Login</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand-red:#ed1c24;     /* من اللوجو */
      --brand-green:#0aa74f;   /* من اللوجو */
      --ink:#1a1f2b;
      --muted:#6b7280;
      --card:#ffffff;
      --bg:#f7f8fa;
      --ring: rgba(13,167,79,.25);
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:"Cairo",system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,"Apple Color Emoji","Segoe UI Emoji";
      background:
        radial-gradient(1200px 600px at 90% -10%, var(--brand-red) 0%, transparent 60%),
        radial-gradient(900px 500px at -10% 100%, var(--brand-green) 0%, transparent 60%),
        var(--bg);
      color:var(--ink);
    }

    .wrap{
      min-height:100%;
      display:flex;align-items:center;justify-content:center;
      padding:32px 16px;
    }

    .card{
      width:100%; max-width: 980px;
      background:var(--card);
      border-radius:22px;
      box-shadow: 0 10px 30px rgba(0,0,0,.06);
      overflow:hidden;
      display:grid;
      grid-template-columns: 1.1fr .9fr;
    }
    @media (max-width: 940px){ .card{ grid-template-columns:1fr; } }

    .brand-side{
      position:relative;
      padding:40px 40px 56px;
      background:linear-gradient(135deg, rgba(13,167,79,.08), rgba(237,28,36,.08));
    }
    .brand-side .logo{
      display:flex; align-items:center; gap:14px;
      margin-bottom:28px;
    }
    .brand-side .logo img{ height:46px; width:auto; }
    .brand-name{
      font-weight:800; letter-spacing:.5px; font-size:22px;
    }
    .brand-copy{
      color:var(--muted); line-height:1.7; margin-top:12px;
    }
    .badge-pill{
      display:inline-block;
      background:rgba(237,28,36,.12);
      color:var(--brand-red);
      border:1px solid rgba(237,28,36,.25);
      padding:6px 12px; border-radius:999px; font-weight:700; font-size:12px;
    }

    .form-side{ padding:40px; }
    @media (max-width: 940px){ .form-side{ padding:28px; } }

    h1{ margin:0 0 18px; font-size:24px; }
    .subtitle{ color:var(--muted); margin-bottom:28px; }

    .alert{
      background:#fef3f2; color:#b42318; border:1px solid #fee4e2;
      padding:10px 12px; border-radius:10px; font-size:14px; margin-bottom:16px;
    }

    .field{ margin-bottom:16px; }
    label{ display:block; font-weight:700; margin:0 0 6px; }
    .input{
      width:100%; padding:14px 14px;
      border:1px solid #e5e7eb; border-radius:12px; outline:0;
      background:#fff; font-size:15px;
      transition:.18s border-color,.18s box-shadow;
    }
    .input:focus{
      border-color:var(--brand-green);
      box-shadow:0 0 0 4px var(--ring);
    }

    .btn{
      display:inline-flex; align-items:center; justify-content:center;
      width:100%; gap:10px;
      padding:14px 16px; border-radius:12px; border:none; cursor:pointer;
      font-weight:800; letter-spacing:.2px; font-size:15px;
      background:linear-gradient(90deg, var(--brand-green), #13b165);
      color:#fff;
      transition:transform .06s ease, filter .2s ease;
    }
    .btn:hover{ filter:brightness(1.05); }
    .btn:active{ transform:translateY(1px); }

    .footer-note{ color:var(--muted); font-size:12px; margin-top:14px; text-align:center; }
    .credit{
      text-align:center; color:#9aa3af; font-size:12px; margin-top:26px;
    }

    /* little accent bar */
    .accent{
      position:absolute; inset:0;
      pointer-events:none;
    }
    .accent::after{
      content:"";
      position:absolute; left:0; top:0; bottom:0; width:6px;
      background:linear-gradient(180deg, var(--brand-green), var(--brand-red));
      opacity:.55;
    }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <!-- Left / Brand -->
      <div class="brand-side">
        <div class="accent"></div>

        <div class="logo">
          <!-- حط اللوجو بتاعك هنا -->
          <img src="{{ asset('assets/images/logo/3.png') }}" alt="Edugate">
          <div class="brand-name">EDUGATE</div>
        </div>

        Dashboard

        <p class="brand-copy">
          Welcome back! Please sign in with your work email and password to access the dashboard.
        </p>

      </div>

      <!-- Right / Form -->
      <div class="form-side">
        @if (Session::has('flash_message'))
          <div class="alert">{{ Session::get('flash_message') }}</div>
        @endif

        <h1>Login</h1>
        <div class="subtitle">Use your email and password.</div>

        <form method="POST" action="{{ route('login') }}" novalidate>
          @csrf

          <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="input @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="name@company.com" autocomplete="email" autofocus>
            @error('email')
              <div class="alert" style="margin-top:8px">{{ $message }}</div>
            @enderror
          </div>

          <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="input @error('password') is-invalid @enderror"
                   placeholder="••••••••" autocomplete="current-password">
            @error('password')
              <div class="alert" style="margin-top:8px">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn">Log in</button>

        </form>

        <div class="credit">© 2021 EDUGATE. All rights reserved.</div>
      </div>
    </div>
  </div>
</body>
</html>
