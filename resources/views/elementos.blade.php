<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catálogo EPP - SENA</title>
    <style>
        :root {
            --green: #39A935;
            --green-dark: #2d8a2b;
            --gold: #FFD700;
            --bg: #ffffffff;
            --card-radius: 20px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg);
            color: #333;
            -webkit-font-smoothing: antialiased;
        }

        /* Header */
        .header {
            background: white;
            padding: 15px 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 22px;
        }
        .img_logo{
            height: 65px;
            width: 70px;
        }

        .header-title {
            font-size: 18px;
            color: #222;
        }

        .user-icon {
            width: 40px;
            height: 40px;   
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: transform .25s, box-shadow .25s;
        }

        .user-icon:hover {
            transform: scale(1.06);
            box-shadow: 0 6px 14px rgba(57, 169, 53, 0.2);
        }

        /* Banner */
        .banner {
            background: linear-gradient(135deg, var(--green) 0%, #2c8b2a 50%, #1f6b1e 100%);
            padding: 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .banner::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
            border-radius: 50%;
        }

        .banner-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 2;
        }

        .banner-text {
            flex: 1;
            min-width: 0;
        }

        .badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 14px;
            border: 1px solid rgba(255, 255, 255, 1);
            margin-bottom: 12px;
        }

        .banner-title {
            font-size: 42px;
            margin-bottom: 10px;
            line-height: 1.05;
            font-weight: 800;
        }

        .banner-title .highlight {
            color: var(--gold);
        }

        .banner-subtitle {
            font-size: 18px;
            margin-bottom: 18px;
            opacity: 0.95;
        }

        .search-container {
            display: flex;
            gap: 10px;
            max-width: 500px;
        }

        .search-box {
            position: relative;
            width: 100%;
        }

        .search-input {
            width: 100%;
            padding: 14px 54px 14px 18px;
            font-size: 16px;
            border-radius: 50px;
            border: none;
            outline: none;
            background: white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
            transition: box-shadow .25s, transform .25s;
        }

        .search-input:focus {
            box-shadow: 0 8px 30px rgba(255, 215, 0, 0.18);
            transform: translateY(-2px);
        }

        .search-button {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #ffffffff;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner-illustration {
            width: 200px;
            height: 200px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-18px);
            }
        }

        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 36px;
        }

        /* GRID: equal height cards */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 28px;
            /* Important: make row tracks stretch so cards can be equal height */
            grid-auto-rows: 1fr;
            align-items: stretch;
        }

        /* CARD layout: make each card a column flex so footer can stick to bottom */
        .product-card {
            background: white;
            border-radius: var(--card-radius);
            overflow: hidden;
            box-shadow: 0 6px 40px rgba(0, 0, 0, 0.20);
            transition: transform .35s ease, box-shadow .35s ease;
            cursor: pointer;
            position: relative;

            display: flex;
            flex-direction: column;
            /* <-- crucial */
            height: 100%;
            /* ensure grid row fills available space */
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
        }

        .product-image-container {
            padding: 24px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background-image: url(/public/img/santa-marta.png);
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform .25s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.04);
        }

        .quick-view {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            opacity: 0;
            transition: opacity .2s, transform .2s;
        }

        .product-card:hover .quick-view {
            opacity: 1;
            transform: scale(1.02);
        }

        .quick-view:hover {
            background: var(--green);
            color: white;
            transform: scale(1.08);
        }

        /* Product info: allow it to grow and push footer down */
        .product-info {
            padding: 22px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
            /* <-- lets this area grow so footer stays at bottom */
            min-height: 0;
            /* prevents overflow in flex children */
        }

        .product-title {
            font-size: 18px;
            font-weight: 700;
            color: #222;
            line-height: 1.25;
        }

        .product-description {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
            /* allow description to wrap but not squash layout */
            max-height: 4.6em;
            /* roughly 3 lines */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-specs {
            margin-bottom: 6px;
        }

        .spec-title {
            font-size: 12px;
            font-weight: 700;
            color: var(--green);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .spec-content {
            font-size: 13px;
            color: #555;
            line-height: 1.4;
        }

        /* Footer always at bottom */
        .product-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 14px;
            border-top: 1px solid #f0f0f0;
            margin-top: auto;
            /* <-- pushes footer to bottom si product-info crece */
            gap: 12px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f8f9fa;
            padding: 6px;
            border-radius: 25px;
        }

        .quantity-btn {
            width: 34px;
            height: 34px;
            border: none;
            background: white;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            font-weight: 700;
            color: var(--green);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        }

        .quantity-btn:hover {
            background: var(--green);
            color: white;
            transform: scale(1.06);
        }

        .quantity-display {
            width: 36px;
            text-align: center;
            font-weight: 700;
            color: #333;
        }

        .add-button {
            background: var(--green);
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 22px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 6px 16px rgba(57, 169, 53, 0.18);
        }

        .add-button:hover {
            background: var(--green-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(57, 169, 53, 0.22);
        }

        /* small screens */
        @media (max-width: 992px) {
            .banner-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 18px;
            }

            .banner-title {
                font-size: 34px;
            }
        }

        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: 1fr;
                grid-auto-rows: auto;
            }

            /* single column on phones */
            .product-image-container {
                height: 200px;
            }

            .banner {
                padding: 28px;
            }

            .main-content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="logo-section">
            <div class="logo"><img src="/public/img/logonegro.png" alt="logo" class="img_logo"></div>
            <div class="header-title">Elementos de Protección Personal</div>
        </div>
        <div class="user-icon"><img src="/public/img/Vector (1).svg" alt="icon"></div>
    </div>

    <!-- Banner -->
    <div class="banner">
        <div class="banner-content">
            <div class="banner-text">
                <div class="badge">SEGURIDAD LABORAL</div>
                <h1 class="banner-title">Tu Seguridad es<br>Nuestra <span class="highlight">Prioridad</span></h1>
                <p class="banner-subtitle">Usa siempre tus EPP - Protege tu vida y tu futuro</p>
                <div class="search-container">
                    <div class="search-box">
                        <input type="text" class="search-input" placeholder="Buscar equipos de protección...">
                        <button class="search-button"><img src="/public/img/Search.png" alt="buscar"></button>
                    </div>
                </div>
            </div>
            <div class="banner-illustration" aria-hidden="true">
                <div class="worker">
                    <div class="worker-head">
                        <div class="helmet"></div>
                    </div>
                    <div class="worker-body">
                        <div class="vest"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="main-content">
        <div class="products-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-image-container">
                    <div class="quick-view">👁️</div>
                    <svg class="product-image" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustración casco">
                        <ellipse cx="100" cy="160" rx="60" ry="10" fill="#ddd" />
                        <path d="M70 80 Q100 60 130 80 L130 120 Q100 140 70 120 Z" fill="#FFD700" />
                        <rect x="65" y="75" width="70" height="8" rx="4" fill="#FFC700" />
                        <circle cx="85" cy="95" r="8" fill="#333" />
                        <circle cx="115" cy="95" r="8" fill="#333" />
                        <path d="M75 120 L85 135 L100 125 L115 135 L125 120" fill="none" stroke="#666" stroke-width="3" />
                    </svg>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Casco de seguridad tipo 2</h3>
                    <p class="product-description">Casco de alta resistencia con sistema de ajuste de cremallera y absorción de impactos.</p>
                    <div class="product-specs">
                        <div class="spec-title">Propiedades</div>
                        <div class="spec-content">Protege contra golpes, caída de objetos y descargas eléctricas</div>
                    </div>
                    <div class="product-specs">
                        <div class="spec-title">Materiales</div>
                        <div class="spec-content">Polietileno de alta densidad (PEAD), suspensión textil</div>
                    </div>

                    <div class="product-footer">
                        <div class="quantity-controls">
                            <button class="quantity-btn">−</button>
                            <span class="quantity-display">1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                        <button class="add-button">Agregar</button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-image-container">
                    <div class="quick-view">👁️</div>
                    <svg class="product-image" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustración careta">
                        <ellipse cx="100" cy="170" rx="40" ry="8" fill="#ddd" />
                        <rect x="40" y="60" width="15" height="100" rx="7" fill="#FFD700" />
                        <rect x="145" y="60" width="15" height="100" rx="7" fill="#FFD700" />
                        <path d="M55 70 Q100 50 145 70 L145 80 Q100 100 55 80 Z" fill="#666" />
                        <circle cx="100" cy="75" r="15" fill="#333" />
                    </svg>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Careta con visor</h3>
                    <p class="product-description">Protección facial completa con visor transparente resistente a impactos y proyecciones.</p>
                    <div class="product-specs">
                        <div class="spec-title">Propiedades</div>
                        <div class="spec-content">Protege rostro contra salpicaduras, partículas y proyecciones</div>
                    </div>
                    <div class="product-specs">
                        <div class="spec-title">Materiales</div>
                        <div class="spec-content">Visor policarbonato, soporte ABS</div>
                    </div>

                    <div class="product-footer">
                        <div class="quantity-controls">
                            <button class="quantity-btn">−</button>
                            <span class="quantity-display">1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                        <button class="add-button">Agregar</button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-image-container">
                    <div class="quick-view">👁️</div>
                    <svg class="product-image" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustración protectores auditivos">
                        <ellipse cx="100" cy="170" rx="50" ry="10" fill="#ddd" />
                        <path d="M60 80 Q60 60 80 60 L120 60 Q140 60 140 80 L140 120 Q140 140 120 140 L80 140 Q60 140 60 120 Z" fill="#333" />
                        <rect x="50" y="70" width="20" height="60" rx="10" fill="#FFD700" />
                        <rect x="130" y="70" width="20" height="60" rx="10" fill="#FFD700" />
                        <circle cx="85" cy="90" r="15" fill="#FFD700" opacity="0.3" />
                        <circle cx="115" cy="90" r="15" fill="#FFD700" opacity="0.3" />
                        <path d="M70 85 Q100 75 130 85" fill="none" stroke="#FFD700" stroke-width="3" />
                    </svg>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Protectores auditivos tipo copa</h3>
                    <p class="product-description">Protección auditiva de alto rendimiento con almohadillas suaves para uso prolongado.</p>
                    <div class="product-specs">
                        <div class="spec-title">Propiedades</div>
                        <div class="spec-content">Reduce hasta 27dB, protección contra ruido excesivo</div>
                    </div>
                    <div class="product-specs">
                        <div class="spec-title">Materiales</div>
                        <div class="spec-content">Copas ABS, almohadillas espuma viscoelástica</div>
                    </div>

                    <div class="product-footer">
                        <div class="quantity-controls">
                            <button class="quantity-btn">−</button>
                            <span class="quantity-display">1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                        <button class="add-button">Agregar</button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card">
                <div class="product-image-container">
                    <div class="quick-view">👁️</div>
                    <svg class="product-image" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustración chaleco">
                        <ellipse cx="100" cy="170" rx="55" ry="10" fill="#ddd" />
                        <path d="M60 60 L80 140 L120 140 L140 60 Z" fill="#FFD700" />
                        <rect x="65" y="80" width="70" height="12" fill="#39A935" />
                        <rect x="65" y="110" width="70" height="12" fill="#39A935" />
                        <path d="M80 60 Q100 50 120 60" fill="#FFD700" />
                    </svg>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Chaleco reflectivo</h3>
                    <p class="product-description">Chaleco de alta visibilidad con bandas reflectivas para trabajos en condiciones de baja iluminación.</p>
                    <div class="product-specs">
                        <div class="spec-title">Propiedades</div>
                        <div class="spec-content">Garantiza alta visibilidad, cómodo y liviano</div>
                    </div>
                    <div class="product-specs">
                        <div class="spec-title">Materiales</div>
                        <div class="spec-content">Poliéster, cintas reflectivas</div>
                    </div>

                    <div class="product-footer">
                        <div class="quantity-controls">
                            <button class="quantity-btn">−</button>
                            <span class="quantity-display">1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                        <button class="add-button">Agregar</button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="product-card">
                <div class="product-image-container">
                    <div class="quick-view">👁️</div>
                    <svg class="product-image" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustración casco 2">
                        <ellipse cx="100" cy="165" rx="60" ry="10" fill="#ddd" />
                        <path d="M70 85 Q100 65 130 85 L130 125 Q100 145 70 125 Z" fill="#FFD700" />
                        <rect x="65" y="80" width="70" height="10" rx="5" fill="#FFC700" />
                        <circle cx="85" cy="100" r="8" fill="#333" />
                        <circle cx="115" cy="100" r="8" fill="#333" />
                        <path d="M75 125 L85 140 L100 130 L115 140 L125 125" fill="none" stroke="#666" stroke-width="3" />
                    </svg>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Casco de seguridad tipo 2</h3>
                    <p class="product-description">Protección craneal contra golpes, caída de objetos y riesgos eléctricos de alto voltaje.</p>
                    <div class="product-specs">
                        <div class="spec-title">Propiedades</div>
                        <div class="spec-content">Alta resistencia mecánica y dieléctrica</div>
                    </div>
                    <div class="product-specs">
                        <div class="spec-title">Materiales</div>
                        <div class="spec-content">Polietileno (PEAD), arnés textil ajustable</div>
                    </div>

                    <div class="product-footer">
                        <div class="quantity-controls">
                            <button class="quantity-btn">−</button>
                            <span class="quantity-display">1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                        <button class="add-button">Agregar</button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="product-card">
                <div class="product-image-container">
                    <div class="quick-view">👁️</div>
                    <img src="/public/img/santa-marta.png" alt="">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Casco de seguridad tipo 2</h3>
                    <p class="product-description">Protección de cabeza industrial con certificación para construcción y trabajos en altura.</p>
                    <div class="product-specs">
                        <div class="spec-title">Propiedades</div>
                        <div class="spec-content">Resistente a impactos, perforación y descargas</div>
                    </div>
                    <div class="product-specs">
                        <div class="spec-title">Materiales</div>
                        <div class="spec-content">Polietileno (PEAD), suspensión poliamida</div>
                    </div>

                    <div class="product-footer">
                        <div class="quantity-controls">
                            <button class="quantity-btn">−</button>
                            <span class="quantity-display">1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                        <button class="add-button">Agregar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>