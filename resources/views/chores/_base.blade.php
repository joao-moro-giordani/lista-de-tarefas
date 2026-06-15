<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tarefas') - Sistema de Gerenciamento</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #2c3e50;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav h1 {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        nav a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        nav a:hover {
            opacity: 0.9;
            text-decoration: underline;
        }

        ul {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        main {
            flex: 1;
            padding: 3rem 0;
        }

        .alert {
            padding: 1.2rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            animation: slideDown 0.4s ease;
            border-left: 4px solid;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left-color: #28a745;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border-left-color: #dc3545;
        }

        footer {
            background-color: #1a1a2e;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            ul {
                gap: 1rem;
                font-size: 0.9rem;
            }

            nav h1 {
                font-size: 1.3rem;
            }

            main {
                padding: 1.5rem 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <h1>
                    <a href="{{ route('chores.index') }}" style="color: white; text-decoration: none;">📋 Tarefas</a>
                </h1>
                <ul>
                    <li><a href="{{ route('chores.index') }}">Minhas Tarefas</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @if (session('mensagem'))
                <div class="alert alert-success">
                    ✓ {{ session('mensagem') }}
                </div>
            @endif

            @if (session('erro'))
                <div class="alert alert-error">
                    ✗ {{ session('erro') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Sistema de Gerenciamento de Tarefas. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
