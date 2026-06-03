/* ==========================================================================
   MATERI RESPONSI — AMIKOM EVENT HUB v2.0
   Interactive Application Logic (Pure JavaScript)
   Features: Dark Mode, Scroll Progress, Chapter Transitions, Quizzes,
             MVC Simulator, Route Matcher, Artisan Terminal, Search
   ========================================================================== */

document.addEventListener('DOMContentLoaded', function () {

  // ─── DOM REFERENCES ───────────────────────────────────────────────
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebar-overlay');
  const menuBtn = document.getElementById('btn-menu');
  const searchInput = document.getElementById('search-input');
  const searchResults = document.getElementById('search-results');
  const themeToggle = document.getElementById('theme-toggle');
  const scrollProgressBar = document.getElementById('scroll-progress');

  const chapters = document.querySelectorAll('.chapter');
  const sidebarLinks = document.querySelectorAll('.sidebar-link[data-chapter], .sidebar-link[data-tool]');
  const progressFill = document.getElementById('progress-fill');
  const progressText = document.getElementById('progress-text');

  const TOTAL_CHAPTERS = 14;
  let currentView = 'chapter-1';
  const completedSteps = new Set([0]);

  // ─── DARK MODE ────────────────────────────────────────────────────
  function initTheme() {
    const saved = localStorage.getItem('theme');
    if (saved) {
      document.documentElement.setAttribute('data-theme', saved);
    } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.documentElement.setAttribute('data-theme', 'dark');
    } else {
      document.documentElement.setAttribute('data-theme', 'light');
    }
  }

  function toggleTheme() {
    const current = document.documentElement.getAttribute('data-theme');
    const next = current === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', next);
    localStorage.setItem('theme', next);
  }

  initTheme();
  if (themeToggle) themeToggle.addEventListener('click', toggleTheme);

  // ─── SCROLL PROGRESS ─────────────────────────────────────────────
  function updateScrollProgress() {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
    document.documentElement.style.setProperty('--scroll-progress', progress + '%');
  }

  window.addEventListener('scroll', updateScrollProgress, { passive: true });
  updateScrollProgress();

  // ─── VIEW NAVIGATION ─────────────────────────────────────────────
  function showView(targetId, index) {
    chapters.forEach(c => c.classList.remove('active'));
    sidebarLinks.forEach(l => l.classList.remove('active'));

    const activeContent = document.getElementById(targetId);
    if (activeContent) {
      activeContent.classList.add('active');
    }

    let activeLink;
    if (index !== null && index !== undefined) {
      activeLink = document.querySelector(`.sidebar-link[data-chapter="${index}"]`);
      completedSteps.add(index);
      updateProgress();
    } else {
      const toolName = targetId.replace('tool-', '');
      activeLink = document.querySelector(`.sidebar-link[data-tool="${toolName}"]`);
    }

    if (activeLink) activeLink.classList.add('active');

    window.scrollTo({ top: 0, behavior: 'smooth' });
    closeSidebar();

    try {
      localStorage.setItem('currentView', targetId);
      localStorage.setItem('completedSteps', JSON.stringify([...completedSteps]));
    } catch (e) {}
  }

  // Bind Sidebar Links
  sidebarLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      if (this.dataset.chapter !== undefined) {
        const idx = parseInt(this.dataset.chapter);
        showView('chapter-' + (idx + 1), idx);
      } else if (this.dataset.tool !== undefined) {
        showView('tool-' + this.dataset.tool);
      }
    });
  });

  // Bind Nav Buttons
  document.querySelectorAll('.nav-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      const targetIdx = parseInt(this.dataset.target);
      if (!isNaN(targetIdx)) {
        showView('chapter-' + (targetIdx + 1), targetIdx);
      }
    });
  });

  // Progress Bar
  function updateProgress() {
    const pct = Math.round((completedSteps.size / TOTAL_CHAPTERS) * 100);
    if (progressFill) progressFill.style.width = pct + '%';
    if (progressText) progressText.textContent = completedSteps.size + ' / ' + TOTAL_CHAPTERS + ' bab dibaca';
  }

  // Mobile Menu
  function openSidebar() {
    sidebar.classList.add('open');
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden';
  }

  function closeSidebar() {
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
    document.body.style.overflow = '';
  }

  if (menuBtn) menuBtn.addEventListener('click', openSidebar);
  if (overlay) overlay.addEventListener('click', closeSidebar);

  // ─── SEARCH ENGINE ────────────────────────────────────────────────
  const searchIndex = [];
  chapters.forEach(chapter => {
    const title = chapter.querySelector('.chapter-title')?.textContent || '';
    const chNum = chapter.querySelector('.chapter-num')?.textContent || '';
    const label = chNum ? `${chNum} — ${title}` : title;

    const textEls = chapter.querySelectorAll('p, li, pre code, h2, h3, .step-title');
    textEls.forEach(el => {
      const txt = el.textContent.trim();
      if (txt.length > 15) {
        searchIndex.push({ targetId: chapter.id, label, text: txt });
      }
    });
  });

  let searchDebounce = null;
  if (searchInput) {
    searchInput.addEventListener('input', function () {
      clearTimeout(searchDebounce);
      searchDebounce = setTimeout(() => executeSearch(this.value), 150);
    });

    document.addEventListener('click', function (e) {
      if (!searchResults.contains(e.target) && e.target !== searchInput) {
        searchResults.classList.remove('show');
      }
    });
  }

  function executeSearch(query) {
    query = query.trim().toLowerCase();
    if (query.length < 2) {
      searchResults.classList.remove('show');
      return;
    }

    const matches = searchIndex.filter(item =>
      item.text.toLowerCase().includes(query)
    ).slice(0, 12);

    if (matches.length === 0) {
      searchResults.innerHTML = `<div class="search-no-result">Tidak ada hasil untuk "${escapeHtml(query)}"</div>`;
    } else {
      searchResults.innerHTML = matches.map(m => {
        const idx = m.text.toLowerCase().indexOf(query);
        const start = Math.max(0, idx - 30);
        const end = Math.min(m.text.length, idx + query.length + 50);
        let snippet = m.text.substring(start, end);
        if (start > 0) snippet = '...' + snippet;
        if (end < m.text.length) snippet += '...';

        const escaped = escapeHtml(snippet);
        const highlighted = escaped.replace(
          new RegExp('(' + escapeRegExp(escapeHtml(query)) + ')', 'gi'),
          '<span class="search-highlight">$1</span>'
        );

        return `<div class="search-result-item" data-target="${m.targetId}">
          <div class="search-result-chapter">${escapeHtml(m.label)}</div>
          <div class="search-result-text">${highlighted}</div>
        </div>`;
      }).join('');

      searchResults.querySelectorAll('.search-result-item').forEach(item => {
        item.addEventListener('click', function () {
          const tid = this.dataset.target;
          if (tid.startsWith('chapter-')) {
            const n = parseInt(tid.replace('chapter-', '')) - 1;
            showView(tid, n);
          } else {
            showView(tid);
          }
          searchResults.classList.remove('show');
          searchInput.value = '';
        });
      });
    }
    searchResults.classList.add('show');
  }

  // ─── INTERACTIVE QUIZZES ──────────────────────────────────────────
  const quizAnswers = {
    q1:   { correct: 'c', exp: 'Betul! Logika penyimpanan file upload ditulis di Controller.' },
    q2:   { correct: 'c', exp: 'Tepat! APP_DEBUG=true akan membocorkan stack trace, query SQL, dan environment rahasia ke publik.' },
    q3:   { correct: 'c', exp: 'Benar! php artisan migrate:fresh --seed membersihkan tabel lalu menjalankan ulang migration dan seeder.' },
    q4:   { correct: 'a', exp: 'Benar! Konvensi accessor: get[NamaKolom]Attribute dengan camelCase.' },
    q5:   { correct: 'c', exp: 'Betul! Format named route: admin.categories (group name + route name).' },
    q6:   { correct: 'b', exp: 'Tepat! Rule exists:categories,id memastikan foreign key yang dikirim user terdaftar di database.' },
    q7:   { correct: 'b', exp: 'Tepat! Method spoofing memodifikasi request agar dikenali router sebagai DELETE.' },
    q8:   { correct: 'b', exp: 'Benar! Menghapus file fisik penting untuk efisiensi penyimpanan server.' },
    q9:   { correct: 'b', exp: 'Benar! PostgreSQL bersifat case-sensitive untuk LIKE, sehingga butuh ILIKE.' },
    q10:  { correct: 'a', exp: 'Tepat! Str::startsWith() mengecek awalan string untuk membedakan URL internet vs file lokal.' },
    q11:  { correct: 'b', exp: 'Benar! bcrypt() menghasilkan hash satu arah yang aman untuk authentication.' },
    q12:  { correct: 'a', exp: 'Hebat! Concurrency::run() menjalankan tugas secara paralel untuk mempercepat eksekusi.' },
    q13:  { correct: 'b', exp: 'Tepat! enctype="multipart/form-data" mengubah encoding agar browser mengirim data biner (file) ke server. Tanpa ini, file tidak akan terkirim.' },
    q13b: { correct: 'a', exp: 'Benar! URL yang berawalan http berarti file ada di internet/CDN luar, bukan di server kita. Kita hanya bisa menghapus file lokal yang ada di public/ folder.' },
    q14:  { correct: 'b', exp: 'Tepat! Helper asset() menghasilkan URL lengkap yang mengarah ke folder public/ project, misalnya http://localhost:8000/uploads/partners/logo.png.' },
    q14b: { correct: 'a', exp: 'Benar! Class "group" di Tailwind CSS menandai elemen sebagai parent. Child elements bisa merespons hover parent via class group-hover:*, memungkinkan efek hover yang meluas ke seluruh card.' }
  };

  document.querySelectorAll('.check-quiz-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      const container = this.closest('.quiz-interactive');
      const quizId = container.dataset.quizId;
      const selected = container.querySelector('input[type="radio"]:checked');
      const feedback = container.querySelector('.quiz-feedback');

      if (!selected) {
        feedback.style.display = 'block';
        feedback.style.backgroundColor = 'var(--alert-danger-bg)';
        feedback.style.color = 'var(--alert-danger-text)';
        feedback.textContent = 'Harap pilih salah satu jawaban terlebih dahulu!';
        return;
      }

      const answer = selected.value;
      const data = quizAnswers[quizId];
      if (!data) return;

      feedback.style.display = 'block';
      if (answer === data.correct) {
        feedback.style.backgroundColor = 'var(--alert-success-bg)';
        feedback.style.color = 'var(--alert-success-text)';
        feedback.innerHTML = `<strong>✓ Benar!</strong> ${data.exp}`;
      } else {
        feedback.style.backgroundColor = 'var(--alert-danger-bg)';
        feedback.style.color = 'var(--alert-danger-text)';
        feedback.innerHTML = `<strong>✗ Salah!</strong> Silakan baca materi kembali dan coba lagi.`;
      }
    });
  });

  // ─── SCHEMA EXPLORER ──────────────────────────────────────────────
  const schemaData = {
    categories: {
      title: 'Skema Tabel: categories',
      html: `<ul>
        <li><code>id</code> (BIGINT UNSIGNED, Primary Key, Auto Increment)</li>
        <li><code>name</code> (VARCHAR(255), Nama kategori)</li>
        <li><code>slug</code> (VARCHAR(255), Unique Index, URL-friendly)</li>
        <li><code>created_at</code> & <code>updated_at</code> (TIMESTAMP)</li>
      </ul>`
    },
    events: {
      title: 'Skema Tabel: events',
      html: `<ul>
        <li><code>id</code> (BIGINT UNSIGNED, Primary Key)</li>
        <li><code>category_id</code> (FK → categories.id, ON DELETE CASCADE)</li>
        <li><code>title</code> (VARCHAR(255))</li>
        <li><code>slug</code> (VARCHAR(255), Unique)</li>
        <li><code>description</code> (TEXT, nullable)</li>
        <li><code>date</code> (DATETIME)</li>
        <li><code>location</code> (VARCHAR(255))</li>
        <li><code>price</code> (INT, 0 = gratis)</li>
        <li><code>stock</code> (INT, kuota tiket)</li>
        <li><code>poster_path</code> (VARCHAR(255), nullable)</li>
      </ul>`
    },
    partners: {
      title: 'Skema Tabel: partners',
      html: `<ul>
        <li><code>id</code> (BIGINT UNSIGNED, Primary Key)</li>
        <li><code>name</code> (VARCHAR(255), INDEX — di-index untuk performa search)</li>
        <li><code>logo_url</code> (VARCHAR(255) — path lokal <em>atau</em> URL internet)</li>
        <li><code>created_at</code> & <code>updated_at</code> (TIMESTAMP)</li>
      </ul>
      <p style="margin-top:8px;"><strong>Catatan:</strong> Tabel ini tidak memiliki foreign key karena partner berdiri independen tanpa relasi ke tabel lain.</p>`
    }
  };

  document.querySelectorAll('[data-schema-explorer]').forEach(card => {
    card.addEventListener('click', function () {
      const target = this.dataset.schemaExplorer;
      const data = schemaData[target];
      const box = document.getElementById('schema-details-box');
      const title = document.getElementById('schema-title');
      const content = document.getElementById('schema-content');

      if (data && box) {
        title.textContent = data.title;
        content.innerHTML = data.html;
        box.style.display = 'block';
        box.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }
    });
  });

  // ─── MVC SIMULATOR ────────────────────────────────────────────────
  const mvcSimulations = {
    'homepage': {
      title: 'Request: GET / (Menampilkan Beranda)',
      steps: [
        { dest: 'Router (web.php)', details: 'Mencocokkan rute GET "/" → HomeController@index.' },
        { dest: 'Controller (HomeController)', details: 'Menjalankan index(), memanggil Event::with("category") dan Partner::latest().' },
        { dest: 'Model & DB', details: 'Query SELECT ke tabel events (JOIN categories) dan partners.' },
        { dest: 'View (welcome.blade.php)', details: 'Merender HTML, menyisipkan data events & partners.' }
      ]
    },
    'event-detail': {
      title: 'Request: GET /event-detail/jazz-night',
      steps: [
        { dest: 'Router (web.php)', details: 'Mencocokkan "/event-detail/{slug}" → EventController@show.' },
        { dest: 'Controller (EventController)', details: 'Query: Event::where("slug", "jazz-night")->firstOrFail()' },
        { dest: 'Model & DB', details: 'Pencarian di tabel events. Jika kosong → abort(404).' },
        { dest: 'View (event-detail.blade.php)', details: 'Merender detail event dengan Accessor format tanggal/harga.' }
      ]
    },
    'store-category': {
      title: 'Request: POST /admin/categories (Simpan Kategori)',
      steps: [
        { dest: 'Router (web.php)', details: 'POST "/admin/categories" → cek CSRF → CategoryController@store.' },
        { dest: 'Controller', details: 'Validasi name & slug. Jika valid → Category::create($validated).' },
        { dest: 'Model & DB', details: 'INSERT INTO categories. Return response sukses.' },
        { dest: 'Redirect Response', details: 'Redirect ke daftar kategori + Flash Session alert sukses.' }
      ]
    },
    'get-home': {
      title: 'Sandbox: GET / (Homepage)',
      steps: [
        { dest: '1. Browser Request', details: 'User mengakses http://localhost:8000/' },
        { dest: '2. web.php Match', details: 'Route::get("/", [HomeController::class, "index"])' },
        { dest: '3. HomeController@index()', details: 'Event::with("category") + Partner::latest()->get()' },
        { dest: '4. Render welcome.blade.php', details: '@foreach loop untuk events dan partners.' }
      ]
    },
    'get-detail': {
      title: 'Sandbox: GET /event-detail/cyber-security',
      steps: [
        { dest: '1. Browser Request', details: 'Rute dinamis dengan parameter slug.' },
        { dest: '2. web.php Match', details: 'Parameter {slug} dipassing ke controller.' },
        { dest: '3. EventController@show()', details: 'Event::where("slug", $slug)->firstOrFail()' },
        { dest: '4. Output', details: 'Render detail event atau 404 page.' }
      ]
    },
    'post-partner': {
      title: 'Sandbox: POST /admin/partners (Tambah Partner)',
      steps: [
        { dest: '1. Form Submit', details: 'Form dikirim dengan @csrf dan enctype="multipart/form-data"' },
        { dest: '2. Validation', details: 'Cek rule: logo (max:2048, mimes:png,jpg) dan nama partner.' },
        { dest: '3. File Processing', details: 'File logo dipindah ke public/uploads/partners/ via move().' },
        { dest: '4. Database Insert', details: 'Partner::create() simpan name + logo_url ke tabel partners.' }
      ]
    }
  };

  // Chapter 1 simulator buttons
  document.querySelectorAll('.sim-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      runMvcSimulator(this.dataset.route, 'mvc-flow-view');
    });
  });

  // Sandbox simulator buttons
  document.querySelectorAll('.sim-sandbox-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      runMvcSimulator(this.dataset.sim, 'visualizer-steps', 'visualizer-status');
    });
  });

  function runMvcSimulator(type, containerId, statusId) {
    const data = mvcSimulations[type];
    const container = document.getElementById(containerId);
    const statusEl = statusId ? document.getElementById(statusId) : null;

    if (!data || !container) return;

    if (statusEl) {
      statusEl.textContent = 'Memproses...';
      statusEl.style.color = 'var(--accent)';
    }

    container.innerHTML = `<h4 style="margin-top:0; color:var(--text-heading);">${data.title}</h4>
      <div style="display:flex; flex-direction:column; gap:10px; margin-top:12px;" id="sim-steps-list"></div>`;

    const list = container.querySelector('#sim-steps-list');
    let delay = 0;

    data.steps.forEach((step, idx) => {
      setTimeout(() => {
        const div = document.createElement('div');
        div.style.cssText = 'padding:12px;border:1px solid var(--border);border-radius:10px;background:var(--bg-card);opacity:0;transform:translateY(8px);transition:all 0.3s ease;';
        div.innerHTML = `<span style="font-weight:700;color:var(--accent);font-family:var(--font-mono);font-size:11px;">[Langkah ${idx + 1}] ${step.dest}</span>
          <p style="margin-bottom:0;margin-top:4px;font-size:12.5px;">${step.details}</p>`;
        list.appendChild(div);
        requestAnimationFrame(() => {
          div.style.opacity = '1';
          div.style.transform = 'translateY(0)';
        });

        if (idx === data.steps.length - 1 && statusEl) {
          statusEl.textContent = 'Selesai!';
          statusEl.style.color = 'var(--alert-success-text)';
        }
      }, delay);
      delay += 600;
    });
  }

  // ─── LIVE ROUTE MATCHER ───────────────────────────────────────────
  const registeredRoutes = [
    { method: 'GET', pattern: /^\/$/, controller: 'HomeController@index', name: 'home', param: 'Tidak Ada' },
    { method: 'GET', pattern: /^\/katalog$/, controller: 'EventController@katalog', name: 'katalog', param: 'Tidak Ada' },
    { method: 'GET', pattern: /^\/event-detail\/([a-zA-Z0-9\-]+)$/, controller: 'EventController@show', name: 'event-detail', param: 'slug = $1' },
    { method: 'GET', pattern: /^\/checkout\/([a-zA-Z0-9\-]+)$/, controller: 'EventController@checkout', name: 'checkout', param: 'slug = $1' },
    { method: 'GET', pattern: /^\/admin$/, controller: 'AdminController@dashboard', name: 'admin.dashboard', param: 'Tidak Ada' },
    { method: 'GET', pattern: /^\/admin\/events$/, controller: 'AdminController@events', name: 'admin.events', param: 'Tidak Ada' },
    { method: 'GET', pattern: /^\/admin\/events\/create$/, controller: 'AdminController@createEvent', name: 'admin.events.create', param: 'Tidak Ada' },
    { method: 'POST', pattern: /^\/admin\/events$/, controller: 'AdminController@storeEvent', name: 'admin.events.store', param: 'Tidak Ada' },
    { method: 'GET', pattern: /^\/admin\/categories$/, controller: 'CategoryController@index', name: 'admin.categories', param: 'Tidak Ada' },
    { method: 'POST', pattern: /^\/admin\/categories$/, controller: 'CategoryController@store', name: 'admin.categories.store', param: 'Tidak Ada' },
    { method: 'GET', pattern: /^\/admin\/categories\/([0-9]+)\/edit$/, controller: 'CategoryController@edit', name: 'admin.categories.edit', param: 'id = $1' },
    { method: 'PUT', pattern: /^\/admin\/categories\/([0-9]+)$/, controller: 'CategoryController@update', name: 'admin.categories.update', param: 'id = $1' },
    { method: 'DELETE', pattern: /^\/admin\/categories\/([0-9]+)$/, controller: 'CategoryController@destroy', name: 'admin.categories.destroy', param: 'id = $1' },
    // Partner routes
    { method: 'GET', pattern: /^\/admin\/partners$/, controller: 'PartnerController@index', name: 'admin.partners', param: 'Tidak Ada' },
    { method: 'GET', pattern: /^\/admin\/partners\/create$/, controller: 'PartnerController@create', name: 'admin.partners.create', param: 'Tidak Ada' },
    { method: 'POST', pattern: /^\/admin\/partners$/, controller: 'PartnerController@store', name: 'admin.partners.store', param: 'Tidak Ada' },
    { method: 'GET', pattern: /^\/admin\/partners\/([0-9]+)\/edit$/, controller: 'PartnerController@edit', name: 'admin.partners.edit', param: 'id = $1' },
    { method: 'PUT', pattern: /^\/admin\/partners\/([0-9]+)$/, controller: 'PartnerController@update', name: 'admin.partners.update', param: 'id = $1' },
    { method: 'DELETE', pattern: /^\/admin\/partners\/([0-9]+)$/, controller: 'PartnerController@destroy', name: 'admin.partners.destroy', param: 'id = $1' }
  ];

  function matchRoute(uri, resultBoxId, methodId, controllerId, nameId, paramId) {
    uri = uri.trim();
    if (!uri.startsWith('/')) uri = '/' + uri;

    const resultBox = document.getElementById(resultBoxId);
    const methodEl = document.getElementById(methodId);
    const controllerEl = document.getElementById(controllerId);
    const nameEl = document.getElementById(nameId);
    const paramEl = document.getElementById(paramId);

    let found = null;
    let matchGroup = null;

    for (const r of registeredRoutes) {
      const match = uri.match(r.pattern);
      if (match) { found = r; matchGroup = match; break; }
    }

    if (resultBox) resultBox.style.display = 'block';

    if (found) {
      const status = resultBox.querySelector('#matcher-result-status');
      if (status) {
        status.textContent = '✓ Rute COCOK! (Route Matched)';
        status.style.color = 'var(--alert-success-text)';
      }
      resultBox.style.borderColor = 'var(--accent)';

      let paramVal = found.param;
      if (matchGroup && matchGroup[1]) paramVal = found.param.replace('$1', matchGroup[1]);

      if (methodEl) methodEl.textContent = found.method;
      if (controllerEl) controllerEl.textContent = found.controller;
      if (nameEl) nameEl.textContent = found.name;
      if (paramEl) paramEl.textContent = paramVal;
    } else {
      const status = resultBox.querySelector('#matcher-result-status');
      if (status) {
        status.textContent = '✗ Error 404: Rute tidak terdaftar!';
        status.style.color = 'var(--alert-danger-text)';
      }
      resultBox.style.borderColor = 'var(--alert-danger-border)';

      if (methodEl) methodEl.textContent = '-';
      if (controllerEl) controllerEl.textContent = '-';
      if (nameEl) nameEl.textContent = '-';
      if (paramEl) paramEl.textContent = '-';
    }
  }

  // Inline route matcher (Bab 5)
  const inlineRouteBtn = document.getElementById('live-route-btn');
  if (inlineRouteBtn) {
    inlineRouteBtn.addEventListener('click', function () {
      const val = document.getElementById('live-route-input').value;
      const res = document.getElementById('live-route-result');
      const uri = val.trim().startsWith('/') ? val.trim() : '/' + val.trim();
      let matched = null;
      for (const r of registeredRoutes) {
        if (uri.match(r.pattern)) { matched = r; break; }
      }
      res.style.display = 'block';
      if (matched) {
        res.innerHTML = `<strong style="color:var(--alert-success-text);">✓ Rute ditemukan!</strong><br>Method: <code style="color:var(--accent);">${matched.method}</code> | Controller: <code>${matched.controller}</code> | Name: <code>${matched.name}</code>`;
      } else {
        res.innerHTML = `<strong style="color:var(--alert-danger-text);">✗ Error 404!</strong> Rute "${escapeHtml(uri)}" tidak cocok dengan konfigurasi web.php.`;
      }
    });
  }

  // Sandbox route matcher
  const sandboxRouteBtn = document.getElementById('sandbox-route-btn');
  if (sandboxRouteBtn) {
    sandboxRouteBtn.addEventListener('click', function () {
      const val = document.getElementById('sandbox-route-input').value;
      matchRoute(val, 'sandbox-route-result-box', 'route-res-method', 'route-res-controller', 'route-res-name', 'route-res-param');
    });
  }

  // ─── ARTISAN TERMINAL SIMULATOR ───────────────────────────────────
  const green = '#3fb950';
  const muted = '#6e7681';
  const accent = '#79c0ff';
  const cyan = '#56d4dd';
  const rose = '#f85149';

  const artisanCommands = {
    'migrate': `azfa@amikom-eventhub:~$ php artisan migrate

<span style="color:${green};">INFO</span>  Running migrations.

  <span style="color:${muted};">2026_04_24_002646_create_categories_table</span> ........................ <span style="color:${green};">12ms DONE</span>
  <span style="color:${muted};">2026_04_24_002702_create_events_table</span> ............................ <span style="color:${green};">24ms DONE</span>
  <span style="color:${muted};">2026_05_21_153406_create_partners_table</span> .......................... <span style="color:${green};">10ms DONE</span>
  <span style="color:${muted};">2026_04_24_002714_create_transactions_table</span> ...................... <span style="color:${green};">18ms DONE</span>

Database migration completed successfully!`,

    'fresh': `azfa@amikom-eventhub:~$ php artisan migrate:fresh --seed

<span style="color:${green};">INFO</span>  Dropping all tables.

<span style="color:${green};">INFO</span>  Running migrations.

  <span style="color:${muted};">2026_04_24_002646_create_categories_table</span> ........................ <span style="color:${green};">9ms DONE</span>
  <span style="color:${muted};">2026_04_24_002702_create_events_table</span> ............................ <span style="color:${green};">15ms DONE</span>
  <span style="color:${muted};">2026_05_21_153406_create_partners_table</span> .......................... <span style="color:${green};">8ms DONE</span>
  <span style="color:${muted};">2026_04_24_002714_create_transactions_table</span> ...................... <span style="color:${green};">14ms DONE</span>

<span style="color:${green};">INFO</span>  Seeding database.

  <span style="color:${muted};">DatabaseSeeder</span> ................................................... <span style="color:${green};">42ms DONE</span>

Database tables rebuilt and seeded successfully!`,

    'routes': `azfa@amikom-eventhub:~$ php artisan route:list

  <span style="color:${accent};">GET|HEAD</span>   / ............................................... <span style="color:${muted};">home › HomeController@index</span>
  <span style="color:${accent};">GET|HEAD</span>   /katalog ........................................ <span style="color:${muted};">katalog › EventController@katalog</span>
  <span style="color:${accent};">GET|HEAD</span>   /event-detail/{slug} ............................ <span style="color:${muted};">event-detail › EventController@show</span>
  <span style="color:${accent};">GET|HEAD</span>   /admin .......................................... <span style="color:${muted};">admin.dashboard › AdminController@dashboard</span>
  <span style="color:${accent};">GET|HEAD</span>   /admin/categories ............................... <span style="color:${muted};">admin.categories › CategoryController@index</span>
  <span style="color:${green};">POST</span>       /admin/categories ............................... <span style="color:${muted};">admin.categories.store › CategoryController@store</span>
  <span style="color:${cyan};">PUT</span>        /admin/categories/{category} .................... <span style="color:${muted};">admin.categories.update</span>
  <span style="color:${rose};">DELETE</span>     /admin/categories/{category} .................... <span style="color:${muted};">admin.categories.destroy</span>
  <span style="color:${accent};">GET|HEAD</span>   /admin/partners ................................. <span style="color:${muted};">admin.partners › PartnerController@index</span>
  <span style="color:${accent};">GET|HEAD</span>   /admin/partners/create .......................... <span style="color:${muted};">admin.partners.create › PartnerController@create</span>
  <span style="color:${green};">POST</span>       /admin/partners ................................. <span style="color:${muted};">admin.partners.store › PartnerController@store</span>
  <span style="color:${accent};">GET|HEAD</span>   /admin/partners/{partner}/edit .................. <span style="color:${muted};">admin.partners.edit › PartnerController@edit</span>
  <span style="color:${cyan};">PUT</span>        /admin/partners/{partner} ...................... <span style="color:${muted};">admin.partners.update</span>
  <span style="color:${rose};">DELETE</span>     /admin/partners/{partner} ...................... <span style="color:${muted};">admin.partners.destroy</span>`,

    'key': `azfa@amikom-eventhub:~$ php artisan key:generate

<span style="color:${green};">INFO</span>  Application key [base64:JmxMUDhVTEpxeEkyNnAyOGk4cWc5MXp5T1o3c25t...] set successfully.`,

    'make-partner': `azfa@amikom-eventhub:~$ php artisan make:model Partner -mfsc

<span style="color:${green};">INFO</span>  Model [app/Models/Partner.php] created successfully.
<span style="color:${green};">INFO</span>  Migration [database/migrations/2026_05_21_153406_create_partners_table.php] created successfully.
<span style="color:${green};">INFO</span>  Factory [database/factories/PartnerFactory.php] created successfully.
<span style="color:${green};">INFO</span>  Seeder [database/seeders/PartnerSeeder.php] created successfully.
<span style="color:${green};">INFO</span>  Controller [app/Http/Controllers/PartnerController.php] created successfully.

5 files generated in one command!`
  };

  document.querySelectorAll('.terminal-cmd-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      const cmd = this.dataset.cmd;
      const termBody = document.getElementById('terminal-body');
      if (termBody && artisanCommands[cmd]) {
        termBody.innerHTML = `<div>${artisanCommands[cmd]}</div>
          <div style="margin-top:12px;">azfa@amikom-eventhub:~$ <span class="blink" style="border-right: 2px solid #c9d1d9; padding-right:1px;"></span></div>`;
        termBody.scrollTop = termBody.scrollHeight;
      }
    });
  });

  // ─── KEYBOARD SHORTCUTS ───────────────────────────────────────────
  document.addEventListener('keydown', function (e) {
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
      e.preventDefault();
      if (searchInput) searchInput.focus();
    }
    if (e.key === 'Escape') {
      if (searchResults) searchResults.classList.remove('show');
      if (searchInput) searchInput.blur();
      closeSidebar();
    }
  });

  // ─── UTILITIES ────────────────────────────────────────────────────
  function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
  }

  function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  }

  // Quiz toggle fallback
  document.querySelectorAll('.quiz-toggle').forEach(toggle => {
    toggle.addEventListener('click', function () {
      this.closest('.quiz').classList.toggle('open');
    });
  });

  // ─── STATE RESTORATION ────────────────────────────────────────────
  try {
    const savedView = localStorage.getItem('currentView');
    const savedSteps = localStorage.getItem('completedSteps');
    if (savedSteps) {
      JSON.parse(savedSteps).forEach(i => completedSteps.add(i));
    }
    if (savedView) {
      if (savedView.startsWith('chapter-')) {
        const chNum = parseInt(savedView.replace('chapter-', '')) - 1;
        showView(savedView, chNum);
      } else {
        showView(savedView);
      }
    } else {
      showView('chapter-1', 0);
    }
  } catch (e) {
    showView('chapter-1', 0);
  }

  updateProgress();
});
