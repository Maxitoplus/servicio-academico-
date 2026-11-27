<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sistema Escolar V.1')</title>

    <style>
        :root {
            --bg: #f4f6f8;
            --surface: #fff;
            --text: #1b2733;
            --line: #d5dce3;
            --brand: #1f5f8b;
            --brand-ink: #fff;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg: #10161c;
                --surface: #18222b;
                --text: #e6edf3;
                --line: #2c3a47;
                --brand: #5aa9dc;
                --brand-ink: #08141d;
            }
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font: 16px/1.5 "Segoe UI", sans-serif;
        }

        main {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 16px;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 24px;
            width: min(440px, 100%);
            display: grid;
            gap: 16px;
        }

        h1 {
            margin: 0;
            font-size: 1.5rem;
            text-align: center;
        }

        p {
            margin: 0;
        }

        form, label {
            display: grid;
            gap: 12px;
        }

        input {
            width: 100%;
            min-height: 44px;
            padding: 10px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: var(--bg);
            color: var(--text);
            font: inherit;
        }

        .btn {
            min-height: 44px;
            padding: 10px 18px;
            border: 0;
            border-radius: 8px;
            background: var(--brand);
            color: var(--brand-ink);
            font: inherit;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .secondary {
            background: var(--bg);
            color: var(--text);
            border: 1px solid var(--line);
        }

        .error {
            color: #b3261e;
            background: rgba(179,38,30,.1);
            padding: 12px;
            border-radius: 8px;
        }

        .qr {
            background: white;
            padding: 16px;
            width: fit-content;
            margin: auto;
            border-radius: 8px;
        }

        .qr svg {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .codes {
            background: var(--bg);
            padding: 16px;
            border-radius: 8px;
            font-family: monospace;
            overflow-wrap: anywhere;
        }
    </style>
</head>
<body>

<main>
    <article class="card">

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @yield('content')

    </article>
</main>

</body>
</html>
