<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Edugate | 404</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --edu-green: #00A651;
            --edu-red: #ED1C24;
            --ink: #101318;
            --muted: #6c7685;
            --card: #ffffff;
            --bg: #f6f8fb;
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            font-family: "Rubik", system-ui, -apple-system, Segoe UI, Roboto, Arial;
            color: var(--ink);
            background:
                radial-gradient(1200px 700px at -10% -10%, rgba(237, 28, 36, .08) 0, transparent 60%),
                radial-gradient(1200px 700px at 110% 110%, rgba(0, 166, 81, .10) 0, transparent 60%),
                var(--bg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrap {
            width: min(1080px, 96vw);
            background: var(--card);
            border-radius: 20px;
            box-shadow: 0 18px 60px rgba(16, 19, 24, .12);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1.2fr;
        }

        @media (max-width: 980px) {
            .wrap {
                grid-template-columns: 1fr;
            }

            .left {
                display: none;
            }
        }

        .left {
            background:
                linear-gradient(165deg, rgba(0, 166, 81, .14), rgba(0, 166, 81, .06));
            padding: 28px 28px 0;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            letter-spacing: .6px;
        }

        .brand .cube {
            width: 44px;
            height: 44px;
            position: relative;
            display: grid;
            place-items: center;
        }

        .brand .cube::before {
            content: "";
            position: absolute;
            top: -6px;
            left: 3px;
            right: 3px;
            height: 14px;
            background: var(--edu-red);
            transform: skewX(-15deg);
            border-radius: 3px;
            box-shadow: 0 6px 0 0 rgba(237, 28, 36, .25) inset;
        }

        .brand .cube::after {
            content: "";
            position: absolute;
            inset: 6px 4px 4px;
            background: var(--edu-green);
            border-radius: 6px;
            box-shadow: inset 0 0 0 8px rgba(0, 0, 0, .06);
            -webkit-mask:
                radial-gradient(12px 10px at 50% 26%, transparent 98%, #000 99%) top / 100% 34% no-repeat,
                linear-gradient(#000 0 0) center/ 72% 18% no-repeat,
                radial-gradient(12px 10px at 50% 74%, transparent 98%, #000 99%) bottom / 100% 34% no-repeat,
                linear-gradient(#000 0 0) left/ 28% 100% no-repeat;
            mask:
                radial-gradient(12px 10px at 50% 26%, transparent 98%, #000 99%) top / 100% 34% no-repeat,
                linear-gradient(#000 0 0) center/ 72% 18% no-repeat,
                radial-gradient(12px 10px at 50% 74%, transparent 98%, #000 99%) bottom / 100% 34% no-repeat,
                linear-gradient(#000 0 0) left/ 28% 100% no-repeat;
        }

        .brand .text {
            font-size: 20px
        }

        .hat {
            position: relative;
            margin: 30px auto 10px;
            width: min(420px, 86%);
            aspect-ratio: 16/10;
            filter: drop-shadow(0 18px 24px rgba(16, 19, 24, .16));
        }

        .hat svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .credit {
            color: var(--muted);
            font-size: 13px;
            padding: 0 6px 20px;
            text-align: center
        }

        .right {
            padding: 48px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center
        }

        .code {
            font-weight: 800;
            font-size: clamp(56px, 9vw, 104px);
            line-height: .9;
            letter-spacing: -2px;
            background: linear-gradient(180deg, var(--edu-red) 0, #ff6b73 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 6px 0 rgba(237, 28, 36, .12);
            margin: 0 0 8px;
        }

        h1 {
            margin: .2rem 0 1rem;
            font-size: clamp(22px, 2.6vw, 34px);
        }

        p.lead {
            margin: 0 0 1.25rem;
            color: var(--muted);
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 10px
        }

        .btn {
            --bg: var(--edu-green);
            --bg-h: #078a4d;
            --fg: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 12px;
            border: 2px solid var(--bg);
            background: var(--bg);
            color: var(--fg);
            font-weight: 700;
            text-decoration: none;
            transition: .2s ease;
        }

        .btn:hover {
            background: var(--bg-h);
            border-color: var(--bg-h)
        }

        .btn.secondary {
            --bg: #e9eef3;
            --bg-h: #dde6ee;
            --fg: #1c2129;
            border-color: transparent;
            text-decoration: none;
        }

        .btn.secondary:hover {
            background: var(--bg-h)
        }

        .tips {
            margin-top: 18px;
            font-size: 13.5px;
            color: var(--muted)
        }

        .arabic {
            margin-top: 6px;
            color: #728094
        }
    </style>
</head>

<body>

    <main class="wrap" role="main" aria-labelledby="error-title">
        <aside class="left">
            <div class="brand">
                <span class="cube" aria-hidden="true"></span>
                <span class="text">EDUGATE</span>
            </div>

            <div class="hat" aria-hidden="true">
                <svg viewBox="0 0 640 400" xmlns="http://www.w3.org/2000/svg">

                    <polygon points="40,120 320,30 600,120 320,205" fill="var(--edu-red)" />

                    <rect x="500" y="120" width="16" height="110" rx="8" fill="var(--edu-red)" />
                    <circle cx="508" cy="255" r="28" fill="var(--edu-red)" />

                    <rect x="90" y="210" width="280" height="150" rx="18" fill="var(--edu-green)" />
                    <rect x="130" y="245" width="200" height="24" rx="8" fill="#ffffff22" />
                    <rect x="130" y="290" width="200" height="24" rx="8" fill="#ffffff22" />
                </svg>
            </div>

            <div class="credit">Inspired by Edugate brand colors</div>
        </aside>
        <section class="right">
            <div class="code" aria-label="404">404</div>
            <h1 id="error-title">Page not found</h1>
            <p class="lead">The page you’re looking for doesn’t exist, was moved, or is temporarily unavailable.</p>

            <div class="actions">
                <a href="{{ url('/') }}" class="btn" aria-label="Back to Home">⟵ Back to Home</a>
                <a href="javascript:history.back()" class="btn secondary" aria-label="Go Back">Go Back</a>
            </div>

            <div class="tips">If you think this is a mistake, please contact the site administrator.</div>
        </section>
    </main>

</body>

</html>