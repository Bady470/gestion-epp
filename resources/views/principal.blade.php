<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Portal de Suministros EPP — HTML/CSS</title>
<style>
  :root{
    --width: 1200px;
    --bg: #f0f2f5;
    --green-1: #39B54A;
    --green-2: #2D9B3A;
    --accent: #FF6B6B;
    --muted: #e0e0e0;
    --card-grad-top: #ffffff;
    --card-grad-bottom: #f8f9fa;
    --shadow-1: 0 6px 18px rgba(0,0,0,0.08);
    --shadow-2: 0 2px 8px rgba(0,0,0,0.06);
    --radius: 12px;
    font-family: "Segoe UI", Arial, sans-serif;
  }

  /* Page wrapper - center like the SVG artboard */
  body{
    margin:0;
    background:var(--bg);
    display:flex;
    justify-content:center;
    padding:24px;
    -webkit-font-smoothing:antialiased;
    color:#333;
  }

  .canvas{
    width:100%;
    max-width:var(--width);
    background:transparent;
    position:relative;
    box-sizing:border-box;
  }

  /* Header */
  .header{
    height:80px;
    border-radius:8px;
    background:linear-gradient(90deg,var(--green-1) 0%, var(--green-2) 100%);
    display:flex;
    align-items:center;
    gap:18px;
    padding:0 20px;
    color:white;
    box-shadow: none;
  }
  .logo{
    width:50px;
    height:50px;
    border-radius:50%;
    background:rgba(255,255,255,0.95);
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--green-1);
    font-weight:700;
    flex-shrink:0;
    box-shadow: var(--shadow-2);
    position:relative;
  }
  .logo small{
    display:block;
    font-size:10px;
    line-height:1;
    margin-top:2px;
    color:var(--green-1);
    font-weight:700;
  }
  .title{
    font-size:22px;
    font-weight:600;
    margin-left:6px;
  }

  /* Login button group (right) */
  .header-actions{
    margin-left:auto;
    display:flex;
    align-items:center;
    gap:12px;
  }
  .login-btn{
    background: rgba(255,255,255,0.95);
    color: var(--green-1);
    border-radius:18px;
    padding:8px 14px;
    display:flex;
    gap:10px;
    align-items:center;
    box-shadow: var(--shadow-2);
    font-weight:600;
    cursor:pointer;
  }
  .login-btn .circle{
    width:24px;
    height:24px;
    border-radius:50%;
    background:var(--green-1);
    display:inline-flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:12px;
  }

  /* Main panel */
  .panel{
    margin-top:18px;
    background:white;
    border-radius:12px;
    box-shadow: var(--shadow-1);
    padding:18px;
    display:grid;
    grid-template-columns: 280px 1fr;
    gap:18px;
    min-height: 660px;
    box-sizing:border-box;
  }

  /* Sidebar */
  .sidebar{
    background:#f8f9fa;
    border-radius:12px;
    padding:18px;
    box-sizing:border-box;
    height:100%;
    display:flex;
    flex-direction:column;
    gap:14px;
  }

  .sidebar .programs-title{
    height:50px;
    background: linear-gradient(90deg,var(--green-1),var(--green-2));
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:700;
    box-shadow: var(--shadow-2);
    font-size:18px;
  }

  .menu{
    display:flex;
    flex-direction:column;
    gap:12px;
    margin-top:8px;
  }

  .menu .item{
    background:white;
    border-radius:8px;
    height:48px;
    display:flex;
    align-items:center;
    gap:12px;
    padding:8px 10px;
    box-shadow: var(--shadow-2);
  }
  .item .icon{
    width:28px; height:28px; border-radius:50%;
    background: rgba(57,181,74,0.12);
    display:inline-flex; align-items:center; justify-content:center;
    color:var(--green-1); flex-shrink:0;
    margin-left:6px;
  }
  .item .text{
    font-size:13px; color:#444; font-weight:600; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
  }

  /* Content area */
  .content{
    padding:6px 6px 20px 6px;
    display:flex;
    flex-direction:column;
    gap:12px;
  }

  .content .heading{
    display:flex;
    align-items:flex-end;
    justify-content:space-between;
    gap:12px;
  }
  .heading .texts{
    display:flex;
    flex-direction:column;
  }
  .heading h2{ margin:0; font-size:22px; font-weight:600; color:#333; }
  .heading p{ margin:0; color:#666; font-size:14px; }

  /* Search box */
  .search{
    display:flex;
    align-items:center;
    gap:10px;
  }
  .search .box{
    background:white;
    border-radius:20px;
    padding:10px 14px;
    display:flex;
    align-items:center;
    gap:10px;
    min-width:220px;
    border:1px solid #e9e9e9;
    box-shadow: var(--shadow-2);
  }
  .search input{
    border:0; outline:0; font-size:13px; color:#666; width:180px; background:transparent;
  }

  /* Cards grid: replicate the two-column cards of SVG */
  .cards {
    display:grid;
    grid-template-columns: repeat(2, minmax(0,1fr));
    gap:14px 20px;
    margin-top:6px;
  }

  .card{
    height:85px;
    border-radius:10px;
    background: linear-gradient(180deg,var(--card-grad-top), var(--card-grad-bottom));
    display:flex;
    align-items:center;
    gap:14px;
    padding:12px 14px;
    box-shadow: var(--shadow-2);
    border: 2px solid var(--muted);
    position:relative;
    overflow:hidden;
  }
  .card.active{
    border-color: var(--green-1);
    box-shadow: 0 10px 28px rgba(57,181,74,0.08);
  }
  .card .accent{
    width:4px;
    height:75px;
    border-radius:2px;
    background: var(--green-1);
    flex-shrink:0;
  }
  .card .info{
    display:flex;
    flex-direction:column;
    gap:6px;
    min-width:0;
  }
  .info .id{ font-weight:700; font-size:15px; color:#333; }
  .info .desc{ font-size:13px; color:#666; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }

  .card .status{
    margin-left:auto;
    display:flex;
    align-items:center;
    gap:8px;
  }
  .status .dot{
    width:36px;height:36px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;
    background:var(--muted);
    color:#777;
    flex-shrink:0;
  }
  .status svg{ width:16px;height:16px; }

  /* Page indicators & footer */
  .footer{
    margin-top:auto;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:12px;
    padding-top:8px;
  }
  .page-indicator{
    display:flex;
    gap:8px;
    align-items:center;
  }
  .dot-small{ width:10px; height:10px; border-radius:50%; background:var(--muted); }
  .dot-small.active{ background:var(--green-1); }

  .footer .info{ color:#999; font-size:13px; }

  /* Responsive */
  @media (max-width:1100px){
    .panel{ grid-template-columns: 1fr; }
    .sidebar{ order:2; width:100%; }
    .cards{ grid-template-columns: 1fr; }
  }
  @media (max-width:500px){
    .logo{ width:44px; height:44px; font-size:14px; }
    .title{ font-size:18px; }
    .card{ height:auto; padding:10px; flex-direction:column; align-items:flex-start; gap:8px; }
    .card .status{ margin-left:0; margin-top:8px; }
  }
</style>
</head>
<body>
  <div class="canvas" role="main" aria-label="Portal de Suministros EPP">
    <!-- Header -->
    <header class="header" role="banner" aria-hidden="false">
      <div style="display:flex;align-items:center;gap:12px;">
        <div class="logo" aria-hidden="true">
          <div style="font-size:16px;line-height:1">SENA</div>
          <small style="position:absolute;bottom:4px;left:0;right:0;text-align:center;font-weight:700;">EPP</small>
        </div>
        <div class="title">Portal de Suministros EPP</div>
      </div>

      <div class="header-actions" role="group" aria-label="Acciones de cabecera">
        <button class="login-btn" aria-label="Iniciar sesión">
          <span class="circle" aria-hidden="true">✓</span>
          <span>Iniciar Sesión</span>
        </button>
      </div>
    </header>

    <!-- Main Panel -->
    <section class="panel" aria-label="Panel principal">
      <!-- Sidebar -->
      <aside class="sidebar" aria-label="Barra lateral de programas">
        <div class="programs-title">Programas</div>

        <nav class="menu" aria-label="Lista de programas">
          <div class="item" title="Análisis y Desarrollo de Software">
            <div class="icon" aria-hidden="true">A</div>
            <div class="text">Análisis y Desarrollo de Software</div>
          </div>
          <div class="item" title="Coordinación en Sistemas Integrados">
            <div class="icon" aria-hidden="true" style="background:rgba(102,102,102,0.12);color:#666">C</div>
            <div class="text">Coordinación en Sistemas Integrados</div>
          </div>
          <div class="item" title="Gestión Contable">
            <div class="icon" aria-hidden="true" style="background:rgba(102,102,102,0.12);color:#666">G</div>
            <div class="text">Gestión Contable</div>
          </div>
          <div class="item" title="Producción de Multimedia">
            <div class="icon" aria-hidden="true" style="background:rgba(102,102,102,0.12);color:#666">M</div>
            <div class="text">Producción de Multimedia</div>
          </div>
          <div class="item" title="Confecciones">
            <div class="icon" aria-hidden="true" style="background:rgba(102,102,102,0.12);color:#666">CF</div>
            <div class="text">Confecciones</div>
          </div>
          <div class="item" title="Cocina">
            <div class="icon" aria-hidden="true" style="background:rgba(102,102,102,0.12);color:#666">CO</div>
            <div class="text">Cocina</div>
          </div>
        </nav>
      </aside>

      <!-- Content -->
      <main class="content" aria-label="Área de contenido">
        <div class="heading">
          <div class="texts">
            <h2>Fichas Disponibles</h2>
            <p>Selecciona una ficha para continuar</p>
          </div>

          <div class="search">
            <div class="box" role="search" aria-label="Buscar ficha">
              <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="#999" d="M9.5 3a6.5 6.5 0 1 1 0 13a6.5 6.5 0 0 1 0-13zm7.7 14.3l3.6 3.6l-1.4 1.4l-3.6-3.6"></path></svg>
              <input type="text" placeholder="Buscar ficha..." aria-label="Buscar ficha" />
            </div>
          </div>
        </div>

        <!-- Cards grid -->
        <div class="cards" role="list" aria-label="Lista de fichas">
          <!-- Row 1 -->
          <div class="card active" role="listitem" aria-label="Ficha 2930468">
            <div class="accent" style="background:var(--green-1)"></div>
            <div class="info">
              <div class="id">2930468</div>
              <div class="desc">Análisis y desarrollo de software</div>
            </div>
            <div class="status" aria-hidden="true">
              <div class="dot" title="Disponible">
                <!-- check mark -->
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12l3 3 8-8" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
            </div>
          </div>

          <div class="card" role="listitem" aria-label="Ficha 2820460">
            <div class="accent" style="background:#666"></div>
            <div class="info">
              <div class="id">2820460</div>
              <div class="desc">Análisis y desarrollo de software</div>
            </div>
            <div class="status">
              <div class="dot" title="No activa">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12l3 3 8-8" stroke="#999" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
            </div>
          </div>

          <!-- Row 2 -->
          <div class="card" role="listitem" aria-label="Ficha 2930445">
            <div class="accent" style="background:#666"></div>
            <div class="info">
              <div class="id">2930445</div>
              <div class="desc">Análisis y desarrollo de software</div>
            </div>
            <div class="status">
              <div class="dot"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12l3 3 8-8" stroke="#999" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
          </div>

          <div class="card" role="listitem" aria-label="Ficha 2788449">
            <div class="accent" style="background:#666"></div>
            <div class="info">
              <div class="id">2788449</div>
              <div class="desc">Análisis y desarrollo de software</div>
            </div>
            <div class="status">
              <div class="dot"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12l3 3 8-8" stroke="#999" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
          </div>

          <!-- Row 3 -->
          <div class="card" role="listitem" aria-label="Ficha Confecciones 1">
            <div class="accent" style="background:#FF6B6B"></div>
            <div class="info">
              <div class="id">29888468</div>
              <div class="desc">Confecciones</div>
            </div>
            <div class="status">
              <div class="dot"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12l3 3 8-8" stroke="#999" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
          </div>

          <div class="card" role="listitem" aria-label="Ficha Confecciones 2">
            <div class="accent" style="background:#FF6B6B"></div>
            <div class="info">
              <div class="id">29888468</div>
              <div class="desc">Confecciones</div>
            </div>
            <div class="status">
              <div class="dot"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12l3 3 8-8" stroke="#999" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
          </div>

          <!-- Row 4 -->
          <div class="card" role="listitem" aria-label="Ficha Confecciones 3">
            <div class="accent" style="background:#FF6B6B"></div>
            <div class="info">
              <div class="id">29888468</div>
              <div class="desc">Confecciones</div>
            </div>
            <div class="status">
              <div class="dot"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12l3 3 8-8" stroke="#999" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
          </div>

          <div class="card" role="listitem" aria-label="Ficha Confecciones 4">
            <div class="accent" style="background:#FF6B6B"></div>
            <div class="info">
              <div class="id">29888468</div>
              <div class="desc">Confecciones</div>
            </div>
            <div class="status">
              <div class="dot"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12l3 3 8-8" stroke="#999" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
          </div>
        </div>

        <!-- footer / pager -->
        <div class="footer" aria-label="Pie de página de fichas">
          <div class="page-indicator" aria-hidden="true">
            <div class="dot-small active" title="Página 1"></div>
            <div class="dot-small"></div>
            <div class="dot-small"></div>
          </div>
          <div class="info">Mostrando 8 de 24 fichas</div>
        </div>

      </main>
    </section>
  </div>
</body>
</html>
