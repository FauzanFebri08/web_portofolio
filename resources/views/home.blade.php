<!DOCTYPE html>
<html lang="id" data-bs-theme="dark"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio {{ $user->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: var(--bs-body-bg); 
            color: var(--bs-body-color); 
            transition: background-color 0.3s, color 0.3s;
        }
        /* Custom styling sesuai tema aktif */
        [data-bs-theme="dark"] .navbar-custom { background-color: #020617; border-bottom: 1px solid #334155; }
        [data-bs-theme="light"] .navbar-custom { background-color: rgba(255, 255, 255, 0.9); border-bottom: 1px solid #e2e8f0; }
        
        [data-bs-theme="dark"] .card-custom { background-color: #020617; border: 1px solid #1e293b; color: #f1f5f9; }
        [data-bs-theme="light"] .card-custom { background-color: #ffffff; border: 1px solid #e2e8f0; color: #1e293b; }
        
        .main-content-wrapper {
            background-color: var(--bs-tertiary-bg);
            transition: background-color 0.3s;
        }
        
        .navbar-custom { backdrop-filter: blur(8px); }
        .hero-section { min-height: calc(100vh - 56px); }
        .avatar-img { width: 150px; height: 150px; object-fit: cover; border: 4px solid #6366f1; box-shadow: 0 10px 25px rgba(99, 102, 241, 0.15); }
    </style>
    <script>
        const savedTheme = localStorage.getItem('theme') || 'dark';
        document.documentElement.setAttribute('data-bs-theme', savedTheme);
    </script>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarNav">

    <nav class="navbar navbar-expand-md sticky-top navbar-custom" id="navbarNav">
        <div class="container">
            <a class="navbar-brand fw-bold text-body" href="#home">PORTOFOLIO</a>
            <button class="navbar-toggler text-body border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                    <li class="nav-item"><a class="nav-link text-body px-3" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-body px-3" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link text-body px-3" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link text-body px-3" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link text-body px-3" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link text-body px-3" href="#contact">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    <button class="btn btn-link text-body p-2 border-0" id="themeToggle" type="button">
                        <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section d-flex align-items-center justify-content-center text-center px-3">
        <div class="container" style="max-width: 720px;">
            <div class="mb-4">
                <img class="rounded-circle avatar-img" 
                    src="{{ $user->profile && $user->profile->avatar ? asset('storage/' . basename($user->profile->avatar)) : asset('images/default-avatar.png') }}" alt="Foto {{ $user->name }}"
                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=6366f1&color=fff&size=150'">
            </div>
            <h1><span style="color: #818cf8;">{{ $user->name }}</span></h1>
            <p class="lead text-secondary mx-auto mb-4" style="max-width: 600px;">
                {{ $user->profile->description ?? 'Web Developer yang siap membangun aplikasi web impian Anda.' }}
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#projects" class="btn text-white px-4 py-2" style="background-color: #4f46e5;">Lihat Project</a>
                <a href="#about" class="btn btn-outline-secondary px-4 py-2 text-body">Mengenal Saya</a>
            </div>
        </div>
    </header>
    
    <div class="main-content-wrapper text-body">
        
        <section id="about" class="py-5">
            <div class="container py-4" style="max-width: 900px;">
                <h2 class="h3 fw-bold mb-4 border-bottom border-2 pb-2 d-inline-block" style="border-color: #6366f1 !important;">Tentang Saya</h2>
                
                <div class="card card-custom p-4 rounded-3 text-secondary mb-4">
                    <p class="mb-0 lh-base">{{ $user->profile->description ?? '-' }}</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card card-custom h-100 p-4 rounded-3">
                            <h3 class="h5 fw-semibold mb-2" style="color: #818cf8;">Visi Profesional</h3>
                            <p class="text-secondary small lh-base mb-0">{{ $user->profile->professional_vision ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-custom h-100 p-4 rounded-3">
                            <h3 class="h5 fw-semibold mb-2" style="color: #818cf8;">Misi</h3>
                            <p class="text-secondary small lh-base mb-0">{{ $user->profile->mission ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 p-3 rounded-3 card-custom d-flex flex-column flex-sm-row justify-content-center gap-4 text-muted small text-center">
                    <div><i class="bi bi-geo-alt-fill me-1" style="color: #6366f1;"></i> Lokasi: {{ $user->profile->location ?? '-' }}</div>
                    <div><i class="bi bi-calendar-event-fill me-1" style="color: #6366f1;"></i> Tanggal Lahir: {{ isset($user->profile->date_of_birth) ? date('d M Y', strtotime($user->profile->date_of_birth)) : '-' }}</div>
                </div>
            </div>
        </section>
        
        <section id="skills" class="py-5">
            <div class="container py-4" style="max-width: 900px;">
                <h2 class="h3 fw-bold mb-4 border-bottom border-2 pb-2 d-inline-block" style="border-color: #6366f1 !important;">Skills</h2>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
                    @foreach($user->skills as $skill)
                        <div class="col">
                            <div class="card card-custom p-3 text-center h-100">
                                <div class="fw-bold">{{ $skill->skill_name }}</div>
                                <div class="small mt-1 text-capitalize" style="color: #818cf8;">{{ $skill->proficiency_level }}</div>
                                <div class="mt-2">
                                    <span class="badge bg-secondary-subtle text-body border px-2 py-1" style="font-size: 10px;">{{ $skill->category }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="projects" class="py-5">
            <div class="container py-4" style="max-width: 900px;">
                <h2 class="h3 fw-bold mb-4 border-bottom border-2 pb-2 d-inline-block" style="border-color: #6366f1 !important;">Projects</h2>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach($user->projects as $project)
                        <div class="col">
                            <div class="card card-custom h-100 d-flex flex-column justify-between rounded-3 overflow-hidden">
                                
                                @if($project->thumbnail)
                                    @php
                                        $cleanThumbnail = basename($project->thumbnail);
                                    @endphp
                                    <img src="{{ asset('storage/' . $cleanThumbnail) }}" class="card-img-top" alt="Thumbnail Project" style="height: 180px; object-fit: cover; border-bottom: 1px solid #1e293b;" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=500&q=80';">
                                @else
                                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=500&q=80" class="card-img-top" alt="Default Thumbnail" style="height: 180px; object-fit: cover; border-bottom: 1px solid #1e293b;">
                                @endif
                                
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-uppercase fw-bold" style="color: #818cf8; font-size: 10px;">{{ $project->project_type }}</span>
                                        @if($project->is_ongoing)
                                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5" style="font-size: 9px;">Ongoing</span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2 py-0.5" style="font-size: 9px;">Selesai</span>
                                        @endif
                                    </div>
                                    <h3 class="h5 fw-bold mb-1">{{ $project->project_title }}</h3>
                                    <div class="text-muted mb-2" style="font-size: 11px;">
                                        <span><i class="bi bi-briefcase me-1"></i> Role: {{ $project->role ?? '-' }}</span>
                                        <span class="ms-3"><i class="bi bi-person-workspace me-1"></i> Client: {{ $project->client_name ?? '-' }}</span>
                                    </div>
                                    <div class="text-secondary mb-2" style="font-size: 11px;">
                                        <i class="bi bi-calendar3 me-1"></i> {{ date('M Y', strtotime($project->start_date)) }} - {{ $project->is_ongoing ? 'Sekarang' : date('M Y', strtotime($project->end_date)) }}
                                    </div>
                                    <p class="text-secondary small lh-base card-text mb-3">{{ $project->description }}</p>
                                    <div class="text-muted font-monospace" style="font-size: 11px;">Tech Stack: <span style="color: #818cf8;">{{ $project->technologies }}</span></div>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-0 d-flex gap-2">
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" class="btn btn-sm btn-dark flex-grow-1" style="font-size: 12px; background-color: #1e293b;"><i class="bi bi-github me-1"></i> GitHub</a>
                                    @endif
                                    @if($project->project_url)
                                        <a href="{{ $project->project_url }}" target="_blank" class="btn btn-sm text-white flex-grow-1" style="font-size: 12px; background-color: #4f46e5;"><i class="bi bi-box-arrow-up-right me-1"></i> Live Demo</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="experience" class="py-5">
            <div class="container py-4" style="max-width: 900px;">
                <h2 class="h3 fw-bold mb-4 border-bottom border-2 pb-2 d-inline-block" style="border-color: #6366f1 !important;">Experience</h2>
                <div class="d-flex flex-column gap-4">
                    @foreach($user->experiences as $exp)
                        <div class="card card-custom p-4 rounded-3">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-2">
                                <div>
                                    <h3 class="h5 fw-bold mb-1">{{ $exp->position_title }}</h3>
                                    <div class="fw-medium small" style="color: #818cf8;">{{ $exp->organization_name }}</div>
                                    <p class="text-secondary small lh-base mt-3 mb-0">{{ $exp->description }}</p>
                                </div>
                                <div class="badge bg-dark text-secondary px-3 py-2 rounded-pill small align-self-start align-self-md-auto">
                                    {{ date('M Y', strtotime($exp->start_date)) }} - {{ $exp->is_curent ? 'Sekarang' : date('M Y', strtotime($exp->end_date)) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="contact" class="py-5 pb-5">
            <div class="container py-4 text-center" style="max-width: 600px;">
                <h2 class="h3 fw-bold mb-3 border-bottom border-2 pb-2 d-inline-block" style="border-color: #6366f1 !important;">Contact Me</h2>
                <p class="text-secondary small lh-base mb-4">Punya pertanyaan atau proyek menarik? Silakan hubungi saya secara langsung melalui kontak di bawah ini.</p>
                
                <div class="row g-3 justify-content-center">
                    @if($user->contacts)
                        @foreach($user->contacts->where('is_public', true)->where('contact_type', '!=', 'linkedin') as $contact)
                            <div class="col-md-9 text-start">
                                <div class="d-flex align-items-center gap-3 p-3 rounded-3 card-custom">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle text-white" style="width: 45px; height: 45px; background-color: #1e293b; flex-shrink: 0;">
                                        @if($contact->contact_type == 'email') <i class="bi bi-envelope-fill" style="color: #818cf8; font-size: 1.2rem;"></i>
                                        @elseif($contact->contact_type == 'whatsapp') <i class="bi bi-whatsapp" style="color: #25d366; font-size: 1.2rem;"></i>
                                        @else <i class="bi bi-link-45deg" style="color: #818cf8; font-size: 1.2rem;"></i> @endif
                                    </div>
                                    <div>
                                        <div class="text-secondary text-uppercase fw-bold" style="font-size: 10px;">{{ $contact->contact_type }}</div>
                                        <a href="{{ $contact->contact_value }}" target="_blank" class="text-body text-decoration-none fw-medium">
                                            {{ str_replace(['https://', 'mailto:', 'wa.me/'], '', $contact->contact_value) }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        
        function updateIcon(theme) {
            if (theme === 'dark') { 
                themeIcon.className = 'bi bi-moon-stars-fill text-warning'; 
            } else { 
                themeIcon.className = 'bi bi-sun-fill text-danger'; 
            }
        }
        
        updateIcon(document.documentElement.getAttribute('data-bs-theme'));
        
        toggleBtn.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });
    </script>
</body>
</html>