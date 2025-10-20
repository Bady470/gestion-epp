<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Iniciar Sesión - SENA EPP</title>
    <style>
        :root {
            --green: #39A935;
            --green-dark: #2d8a2b;
            --gold: #FFD700;
            --bg: linear-gradient(135deg, #39A935 0%, #2d8a2b 50%, #1f6b1e 100%);
            --card-bg: #ffffff;
            --muted: #e0e0e0;
            --shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
            font-family: "Segoe UI", Arial, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html,
        body {
            height: 100%
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            padding: 20px;
            -webkit-font-smoothing: antialiased;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1000px;
            display: flex;
            border-radius: 28px;
            overflow: hidden;
            background: var(--card-bg);
            box-shadow: var(--shadow);
            min-height: 600px;
        }

        /* Left illustration */
        .illustration-side {
            flex: 1;
            padding: 56px 40px;
            background: linear-gradient(135deg, #2d8a2b 0%, #39A935 100%);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 46px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2)
        }

        .logo-text {
            font-weight: 800;
            font-size: 28px;
            margin-top: 18px
        }

        .logo-sub {
            opacity: 0.9;
            font-size: 14px;
            margin-top: 6px
        }

        /* Worker illustration simplified */
        .worker-illustration {
            width: 260px;
            height: 260px;
            margin-top: 28px;
            position: relative
        }

        .worker-head {
            width: 86px;
            height: 86px;
            background: #ffcc99;
            border-radius: 50%;
            margin: 0 auto;
            position: relative;
            top: 10px
        }

        .helmet {
            width: 106px;
            height: 56px;
            background: var(--gold);
            border-radius: 40px 40px 0 0;
            margin: 0 auto;
            position: relative;
            top: -28px
        }

        /* Form side */
        .form-side {
            flex: 1;
            padding: 56px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center
        }

        .form-title {
            font-size: 32px;
            color: #333;
            font-weight: 700;
            margin-bottom: 6px
        }

        .form-sub {
            color: #666;
            margin-bottom: 20px
        }

        /* Tabs as simple links */
        .tabs {
            display: flex;
            gap: 20px;
            margin-bottom: 28px;
            justify-content: center;
            border-bottom: 2px solid #eee;
            
        }

        .tab {
            padding: 10px 0;
            font-weight: 700;
            color: #999;
            cursor: pointer;
            text-decoration: none;
        }

        .tab.active {
            color: var(--green);
            border-bottom: 3px solid var(--green);
            padding-bottom: 7px
        }

        /* Form */
        .form {
            max-width: 520px
        }

        .form-group {
            margin-bottom: 18px
        }

        .label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #333;
            font-size: 14px
        }

        .input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 2px solid #e6e6e6;
            font-size: 15px;
            outline: none
        }

        .input:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 6px rgba(57, 169, 53, 0.06)
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px
        }

        .forgot {
            margin-bottom: 18px;
            text-align: right
        }

        .forgot a {
            color: var(--green);
            text-decoration: none;
            font-weight: 700
        }

        .submit {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: none;
            background: var(--green);
            color: white;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(57, 169, 53, 0.22)
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #999;
            font-size: 14px
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee
        }

        .divider::before {
            margin-right: 12px
        }

        .divider::after {
            margin-left: 12px
        }

        .socials {
            display: flex;
            gap: 12px
        }

        .social {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #e6e6e6;
            background: white;
            cursor: pointer;
            font-weight: 700
        }

        /* Footer nav between screens */
        .bottom-note {
            margin-top: 16px;
            font-size: 14px;
            color: #666
        }

        .bottom-note a {
            color: var(--green);
            font-weight: 700;
            text-decoration: none
        }

        /* Responsive */
        @media(max-width:900px) {
            .container {
                flex-direction: column;
                min-height: unset
            }

            .illustration-side {
                padding: 36px
            }

            .form-side {
                padding: 36px
            }
        }
    </style>
</head>

<body>
    <main class="container" role="main" aria-label="Iniciar sesión SENA EPP">
        <!-- Illustration -->
        <section class="illustration-side" aria-hidden="true">
            <div class="logo">🛡️</div>
            <div class="logo-text">SENA EPP</div>
            <div class="logo-sub">Sistema de Protección Personal</div>

            <div class="worker-illustration" aria-hidden="true">
                <div class="worker-head"></div>
                <div class="helmet"></div>
            </div>
        </section>

        <!-- Form -->
        <section class="form-side" aria-label="Formulario iniciar sesión">
            <div>
                <h1 class="form-title">Bienvenido</h1>
                <p class="form-sub">Accede a tu cuenta</p>

                <nav class="tabs" aria-label="Navegación de acceso">
                    <a class="tab active" href="#" aria-current="page">Iniciar Sesión</a>
                </nav>

                <form class="form" id="loginForm" novalidate>
                    <div class="form-group">
                        <label class="label" for="email">Correo electrónico</label>
                        <input id="email" class="input" type="email" placeholder="tu@email.com" required>
                    </div>

                    <div class="form-group">
                        <label class="label" for="password">Contraseña</label>
                        <input id="password" class="input" type="password" placeholder="••••••••" required>
                    </div>

                    <div class="checkbox-row">
                        <input id="remember" type="checkbox">
                        <label for="remember">Recordarme</label>
                    </div>

                    <div class="forgot"><a href="#" onclick="alert('Función recuperar contraseña no implementada');return false">¿Olvidaste tu contraseña?</a></div>

                    <button type="submit" class="submit">Iniciar Sesión</button>
                </form>
            </div>
        </section>
    </main>

    <script>
        // Simple client-side handler (demo)
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value.trim();
            const pass = document.getElementById('password').value;
            if (!email || !pass) {
                alert('Completa todos los campos');
                return;
            }
            // Demo: show values (remove in production)
            alert('Intento de inicio de sesión con: ' + email);
            // Aquí iría petición fetch() al backend
        });
    </script>
</body>

</html>