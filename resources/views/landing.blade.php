<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntellectHub — Belajar Lebih Cerdas, Berkembang Lebih Jauh</title>
    <meta name="description" content="Platform pembelajaran online terdepan di Indonesia. Kuasai skill baru dengan kurikulum dari para ahli industri.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { poppins: ['Poppins', 'sans-serif'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 9s ease-in-out infinite',
                        'count-up': 'fadeIn 0.5s ease forwards',
                    },
                    keyframes: {
                        float: { '0%,100%': { transform: 'translateY(0px)' }, '50%': { transform: 'translateY(-18px)' } },
                        fadeIn: { from: { opacity: 0, transform: 'translateY(12px)' }, to: { opacity: 1, transform: 'translateY(0)' } },
                    },
                    colors: {
                        navy: { DEFAULT: '#0f172a', 800: '#1e293b', 700: '#334155' },
                        brand: { DEFAULT: '#2563eb', light: '#3b82f6', dark: '#1d4ed8' },
                    },
                    backgroundImage: {
                        'hero-gradient': 'radial-gradient(ellipse 80% 60% at 50% -10%, rgba(219,234,254,0.6) 0%, transparent 70%)',
                    }
                }
            }
        }
    </script>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; }

        /* Reveal animation */
        .reveal { opacity: 0; transform: translateY(36px); transition: opacity 0.65s cubic-bezier(.16,1,.3,1), transform 0.65s cubic-bezier(.16,1,.3,1); }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }

        /* Floating mockup */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-18px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-slow { animation: float 9s ease-in-out infinite; }

        /* Progress bar animation */
        @keyframes growBar {
            from { width: 0; }
        }
        .progress-bar-fill { animation: growBar 1.4s ease forwards; }

        /* Gradient text */
        .text-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .text-gradient-cyan {
            background: linear-gradient(135deg, #0f172a 0%, #0ea5e9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Navbar scroll effect (Managed via JS classes now) */

        /* Bento card hover */
        .bento-card { transition: all 0.3s cubic-bezier(.16,1,.3,1); }
        .bento-card:hover { transform: translateY(-6px); border-color: #bfdbfe !important; }

        /* Pricing card hover */
        .pricing-card-free:hover { box-shadow: 0 20px 60px rgba(15,23,42,0.1); transform: translateY(-4px); }

        /* Hamburger open state */
        .hamburger-open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .hamburger-open span:nth-child(2) { opacity: 0; }
        .hamburger-open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
        .hamburger-bar { transition: all 0.3s ease; transform-origin: center; }
    </style>
</head>
<body class="bg-white text-navy font-poppins overflow-x-hidden">

{{-- ======== FLOATING NAVBAR ======== --}}
<nav id="navbar" class="fixed top-6 left-1/2 -translate-x-1/2 w-[90%] max-w-6xl z-[100] bg-white/70 backdrop-blur-xl border border-white/20 shadow-[0_8px_32px_0_rgba(31,38,135,0.07)] rounded-full transition-all duration-300 py-4 px-6 md:px-8">
    <div class="flex items-center justify-between w-full">
        {{-- Logo --}}
        <a href="#" class="flex items-center gap-2 text-xl font-bold tracking-tighter text-navy flex-shrink-0">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            IntellectHub
        </a>

        {{-- Desktop Nav Links --}}
        <ul class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
            <li><a href="#fitur" class="hover:text-blue-600 transition-colors duration-200">Fitur</a></li>
            <li><a href="#cara-kerja" class="hover:text-blue-600 transition-colors duration-200">Cara Kerja</a></li>
            <li><a href="#testimoni" class="hover:text-blue-600 transition-colors duration-200">Testimoni</a></li>
            <li><a href="#harga" class="hover:text-blue-600 transition-colors duration-200">Harga</a></li>
        </ul>

        {{-- Desktop Actions --}}
        <div class="hidden md:flex items-center gap-2">
            <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-semibold text-slate-900 hover:text-blue-600 transition-colors duration-200">Masuk</a>
            <a href="{{ route('register') }}" class="px-6 py-2 text-sm font-semibold text-white bg-blue-600 rounded-full shadow-lg shadow-blue-500/20 hover:bg-blue-700 hover:shadow-blue-500/30 transition-all duration-300">Daftar Gratis</a>
        </div>

        {{-- Hamburger --}}
        <button id="hamburger" class="md:hidden flex flex-col gap-[5px] p-2 focus:outline-none" aria-label="Toggle menu">
            <span class="hamburger-bar block w-5 h-0.5 bg-slate-800 rounded-full"></span>
            <span class="hamburger-bar block w-5 h-0.5 bg-slate-800 rounded-full"></span>
            <span class="hamburger-bar block w-5 h-0.5 bg-slate-800 rounded-full"></span>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden absolute top-[115%] left-0 right-0 bg-white/95 backdrop-blur-2xl border border-white/20 shadow-[0_8px_32px_0_rgba(31,38,135,0.07)] rounded-3xl px-6 py-6 transition-all duration-300">
        <ul class="flex flex-col gap-4 text-sm font-medium text-slate-600 mb-6 text-center">
            <li><a href="#fitur" class="hover:text-blue-600 block py-1">Fitur</a></li>
            <li><a href="#cara-kerja" class="hover:text-blue-600 block py-1">Cara Kerja</a></li>
            <li><a href="#testimoni" class="hover:text-blue-600 block py-1">Testimoni</a></li>
            <li><a href="#harga" class="hover:text-blue-600 block py-1">Harga</a></li>
        </ul>
        <div class="flex flex-col gap-3">
            <a href="{{ route('login') }}" class="text-center py-3 text-sm font-semibold text-slate-900 border border-slate-200 rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors">Masuk</a>
            <a href="{{ route('register') }}" class="text-center py-3 text-sm font-semibold text-white bg-blue-600 rounded-xl shadow-md shadow-blue-500/20 hover:bg-blue-700 transition-colors">Daftar Gratis</a>
        </div>
    </div>
</nav>

{{-- ======== HERO SECTION ======== --}}
<section class="bg-white relative overflow-hidden pt-28 pb-8 lg:pt-36 lg:pb-12 min-h-screen flex items-center">
    {{-- Micro-Dot Grid Pattern --}}
    <div class="absolute inset-0 bg-[radial-gradient(#cbd5e1_1px,transparent_1px)] [background-size:24px_24px] pointer-events-none -z-0 opacity-40"></div>

    {{-- Background blobs --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] bg-[#2563eb]/10 rounded-full blur-[120px] pointer-events-none -z-0"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-violet-100/30 rounded-full blur-[80px] pointer-events-none -z-0"></div>

    <style>
        @keyframes float-mockup {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        .animate-float-mockup {
            animation: float-mockup 6s ease-in-out infinite;
        }
    </style>

    <div class="container mx-auto px-4 md:px-8 relative z-10 max-w-7xl w-full">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center w-full">

            {{-- LEFT: Text --}}
            <div>
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 rounded-full px-4 py-1.5 text-xs font-semibold text-brand mb-4 reveal">
                    <i class="fas fa-bolt text-[10px]"></i> Platform Belajar #1 di Indonesia
                </div>

                <h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-[4.5rem] font-black tracking-tighter leading-[1.08] text-navy mb-4 reveal reveal-delay-1">
                    Kuasai <span class="bg-gradient-to-r from-navy to-blue-500 bg-clip-text text-transparent">Skill Baru.</span><br>
                    <span class="bg-gradient-to-r from-navy to-blue-500 bg-clip-text text-transparent">Raih Karir Impian.</span>
                </h1>

                <p class="text-base md:text-lg text-slate-500 leading-relaxed max-w-xl mb-6 reveal reveal-delay-2">
                    IntellectHub menghadirkan ribuan kursus berkualitas tinggi yang dirancang oleh para praktisi industri.
                    Belajar kapan saja, di mana saja, dan dapatkan sertifikat yang diakui.
                </p>

                <div class="flex flex-wrap gap-4 mb-8 reveal reveal-delay-3">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2.5 px-7 py-3.5 text-sm font-bold text-white bg-brand rounded-full shadow-xl shadow-blue-300/50 hover:bg-brand-dark hover:scale-105 hover:shadow-brand/40 transition-all duration-300">
                        Mulai Belajar <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                    <a href="#fitur" class="inline-flex items-center gap-2.5 px-7 py-3.5 text-sm font-bold text-navy rounded-full border-2 border-slate-200 hover:border-brand hover:text-brand hover:bg-slate-50 transition-all duration-300">
                        <i class="fas fa-play-circle text-base"></i> Lihat Fitur
                    </a>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 reveal reveal-delay-4" id="stats-section">
                    <div>
                        <p class="text-2xl md:text-3xl font-extrabold tracking-tight text-navy" data-target="20000" data-suffix="K+">0</p>
                        <p class="text-xs text-slate-400 font-medium mt-0.5">Pelajar Aktif</p>
                    </div>
                    <div>
                        <p class="text-2xl md:text-3xl font-extrabold tracking-tight text-navy" data-target="500" data-suffix="+">0</p>
                        <p class="text-xs text-slate-400 font-medium mt-0.5">Kursus Tersedia</p>
                    </div>
                    <div>
                        <p class="text-2xl md:text-3xl font-extrabold tracking-tight text-navy" data-target="98" data-suffix="%">0</p>
                        <p class="text-xs text-slate-400 font-medium mt-0.5">Tingkat Kepuasan</p>
                    </div>
                    <div>
                        <p class="text-2xl md:text-3xl font-extrabold tracking-tight text-navy" data-target="150" data-suffix="+">0</p>
                        <p class="text-xs text-slate-400 font-medium mt-0.5">Instruktur Ahli</p>
                    </div>
                </div>
            </div>


            {{-- RIGHT: SVG Illustration --}}
            <div class="relative flex items-center justify-center pb-4 lg:pb-0 reveal reveal-delay-2">
                {{-- Glow behind illustration --}}
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-[80%] h-[60%] bg-[#2563eb]/15 rounded-full blur-[80px]"></div>
                </div>

                {{-- Floating SVG --}}
                <div class="animate-float-mockup relative z-10 w-full max-w-lg">
                    <img src="{{ asset('image/low-code-development-animate.svg') }}"
                         alt="IntellectHub - Platform Belajar Online"
                         class="w-full h-auto drop-shadow-xl"
                         loading="eager">
                </div>
<style>svg#freepik_stories-low-code-development:not(.animated) .animable {opacity: 0;}svg#freepik_stories-low-code-development.animated #freepik--background-complete--inject-124 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomOut;animation-delay: 0s;}svg#freepik_stories-low-code-development.animated #freepik--Shadow--inject-124 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) fadeIn;animation-delay: 0s;}svg#freepik_stories-low-code-development.animated #freepik--Window--inject-124 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}svg#freepik_stories-low-code-development.animated #freepik--Image--inject-124 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideUp;animation-delay: 0s;}svg#freepik_stories-low-code-development.animated #freepik--Text--inject-124 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) fadeIn;animation-delay: 0s;}svg#freepik_stories-low-code-development.animated #freepik--Code--inject-124 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-low-code-development.animated #freepik--character-2--inject-124 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) slideLeft;animation-delay: 0s;}svg#freepik_stories-low-code-development.animated #freepik--character-1--inject-124 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}            @keyframes zoomOut {                0% {                    opacity: 0;                    transform: scale(1.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes fadeIn {                0% {                    opacity: 0;                }                100% {                    opacity: 1;                }            }                    @keyframes slideLeft {                0% {                    opacity: 0;                    transform: translateX(-30px);                }                100% {                    opacity: 1;                    transform: translateX(0);                }            }                    @keyframes slideUp {                0% {                    opacity: 0;                    transform: translateY(30px);                }                100% {                    opacity: 1;                    transform: inherit;                }            }                    @keyframes zoomIn {                0% {                    opacity: 0;                    transform: scale(0.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }        </style><g id="freepik--background-complete--inject-124" class="animable" style="transform-origin: 250px 228.23px;"><rect y="382.4" width="500" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 250px 382.525px;" id="el82190866y35" class="animable"></rect><rect x="416.78" y="398.49" width="33.12" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 433.34px 398.615px;" id="el097ha1ciyfz" class="animable"></rect><rect x="322.53" y="401.21" width="8.69" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 326.875px 401.335px;" id="elahe1qnm1zzm" class="animable"></rect><rect x="396.59" y="389.21" width="19.19" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 406.185px 389.335px;" id="elwc3uh8x6ylc" class="animable"></rect><rect x="52.46" y="390.89" width="43.19" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 74.055px 391.015px;" id="ela4r5arwvhe5" class="animable"></rect><rect x="104.56" y="390.89" width="6.33" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 107.725px 391.015px;" id="elp71nx0fprl" class="animable"></rect><rect x="131.47" y="395.11" width="93.68" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 178.31px 395.235px;" id="eldvkt95h3eec" class="animable"></rect><path d="M237,337.8H43.91a5.71,5.71,0,0,1-5.7-5.71V60.66A5.71,5.71,0,0,1,43.91,55H237a5.71,5.71,0,0,1,5.71,5.71V332.09A5.71,5.71,0,0,1,237,337.8ZM43.91,55.2a5.46,5.46,0,0,0-5.45,5.46V332.09a5.46,5.46,0,0,0,5.45,5.46H237a5.47,5.47,0,0,0,5.46-5.46V60.66A5.47,5.47,0,0,0,237,55.2Z" style="fill: rgb(235, 235, 235); transform-origin: 140.46px 196.4px;" id="eljd273dgxez" class="animable"></path><path d="M453.31,337.8H260.21a5.72,5.72,0,0,1-5.71-5.71V60.66A5.72,5.72,0,0,1,260.21,55h193.1A5.71,5.71,0,0,1,459,60.66V332.09A5.71,5.71,0,0,1,453.31,337.8ZM260.21,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46h193.1a5.47,5.47,0,0,0,5.46-5.46V60.66a5.47,5.47,0,0,0-5.46-5.46Z" style="fill: rgb(235, 235, 235); transform-origin: 356.75px 196.4px;" id="elf47hjeztp6o" class="animable"></path><rect x="89.41" y="102.39" width="71.25" height="241.71" style="fill: rgb(250, 250, 250); transform-origin: 125.035px 223.245px;" id="elkuaj5xwt26q" class="animable"></rect><polygon points="150.05 102.39 145.89 102.39 121.04 344.1 125.2 344.1 150.05 102.39" style="fill: rgb(245, 245, 245); transform-origin: 135.545px 223.245px;" id="el4pknny5f0ze" class="animable"></polygon><rect x="88.95" y="103.33" width="70.45" height="2.13" style="fill: rgb(224, 224, 224); transform-origin: 124.175px 104.395px;" id="elq46sgmi0m5" class="animable"></rect><rect x="88.95" y="341.99" width="70.45" height="4.56" style="fill: rgb(235, 235, 235); transform-origin: 124.175px 344.27px;" id="elicnz1r6drnn" class="animable"></rect><rect x="91.66" y="346.35" width="66.57" height="0.2" style="fill: rgb(235, 235, 235); transform-origin: 124.945px 346.45px;" id="el743igvfmbqb" class="animable"></rect><polygon points="91.66 103.33 158.23 103.33 158.23 346.35 162.22 346.35 162.22 100.34 87.67 100.34 87.67 346.35 91.66 346.35 91.66 103.33" style="fill: rgb(235, 235, 235); transform-origin: 124.945px 223.345px;" id="el9x8aekaadtg" class="animable"></polygon><rect x="168.7" y="102.39" width="71.25" height="241.71" style="fill: rgb(250, 250, 250); transform-origin: 204.325px 223.245px;" id="elcch9r6zp03s" class="animable"></rect><polygon points="220.19 102.39 197.47 102.39 172.62 344.1 195.33 344.1 220.19 102.39" style="fill: rgb(245, 245, 245); transform-origin: 196.405px 223.245px;" id="elfqd9nhrx144" class="animable"></polygon><rect x="168.24" y="103.33" width="72.45" height="2.13" style="fill: rgb(224, 224, 224); transform-origin: 204.465px 104.395px;" id="elzaxdzxzpev" class="animable"></rect><rect x="168.24" y="341.99" width="72.45" height="4.56" style="fill: rgb(235, 235, 235); transform-origin: 204.465px 344.27px;" id="elfok9nyszmcs" class="animable"></rect><rect x="170.95" y="346.35" width="66.57" height="0.2" style="fill: rgb(235, 235, 235); transform-origin: 204.235px 346.45px;" id="el6i8u8e81j7w" class="animable"></rect><polygon points="170.95 103.33 237.52 103.33 237.52 346.35 241.5 346.35 241.5 100.34 166.96 100.34 166.96 346.35 170.95 346.35 170.95 103.33" style="fill: rgb(235, 235, 235); transform-origin: 204.23px 223.345px;" id="el076v4yw48dbm" class="animable"></polygon><rect x="247.98" y="102.39" width="69.25" height="241.71" style="fill: rgb(250, 250, 250); transform-origin: 282.605px 223.245px;" id="el8sh3wzd1csw" class="animable"></rect><polygon points="287.22 102.39 283.06 102.39 258.21 344.1 262.37 344.1 287.22 102.39" style="fill: rgb(245, 245, 245); transform-origin: 272.715px 223.245px;" id="elndv3w7o7jkm" class="animable"></polygon><rect x="247.53" y="103.33" width="70.45" height="2.13" style="fill: rgb(224, 224, 224); transform-origin: 282.755px 104.395px;" id="el9i1lyd091xt" class="animable"></rect><rect x="247.53" y="341.99" width="70.45" height="4.56" style="fill: rgb(235, 235, 235); transform-origin: 282.755px 344.27px;" id="eluxfgdrt4tba" class="animable"></rect><rect x="250.24" y="346.35" width="66.57" height="0.2" style="fill: rgb(235, 235, 235); transform-origin: 283.525px 346.45px;" id="el3mpwrx2kqn7" class="animable"></rect><polygon points="250.24 103.33 316.8 103.33 316.8 346.35 320.79 346.35 320.79 100.34 246.25 100.34 246.25 346.35 250.24 346.35 250.24 103.33" style="fill: rgb(235, 235, 235); transform-origin: 283.52px 223.345px;" id="eltkm64fr6zi" class="animable"></polygon><rect x="327.27" y="102.39" width="71.25" height="241.71" style="fill: rgb(250, 250, 250); transform-origin: 362.895px 223.245px;" id="elppo2oass9ko" class="animable"></rect><polygon points="391.55 102.39 368.84 102.39 343.98 344.1 366.7 344.1 391.55 102.39" style="fill: rgb(245, 245, 245); transform-origin: 367.765px 223.245px;" id="elijp422sr9ep" class="animable"></polygon><rect x="326.82" y="103.33" width="70.45" height="2.13" style="fill: rgb(224, 224, 224); transform-origin: 362.045px 104.395px;" id="elz9g1qqew97l" class="animable"></rect><rect x="326.82" y="341.99" width="70.45" height="4.56" style="fill: rgb(235, 235, 235); transform-origin: 362.045px 344.27px;" id="elcreuyhy0d7p" class="animable"></rect><polygon points="329.52 103.33 396.09 103.33 396.09 346.35 400.08 346.35 400.08 100.34 325.54 100.34 325.54 346.35 329.52 346.35 329.52 103.33" style="fill: rgb(235, 235, 235); transform-origin: 362.81px 223.345px;" id="el9jadv6irmzd" class="animable"></polygon><rect x="329.52" y="346.35" width="66.57" height="0.2" style="fill: rgb(235, 235, 235); transform-origin: 362.805px 346.45px;" id="elq7zea6agm7r" class="animable"></rect><rect x="107.68" y="288.49" width="30.93" height="53.49" style="fill: rgb(235, 235, 235); transform-origin: 123.145px 315.235px;" id="elwx4qvpzvpw" class="animable"></rect><polygon points="132.68 281.01 132.68 294.43 130.24 294.43 116.06 294.43 113.62 294.43 113.62 281.01 132.68 281.01" style="fill: rgb(235, 235, 235); transform-origin: 123.15px 287.72px;" id="eltqhfooah5f" class="animable"></polygon><rect x="282.07" y="288.49" width="30.93" height="53.49" style="fill: rgb(235, 235, 235); transform-origin: 297.535px 315.235px;" id="elngbwzj69ch" class="animable"></rect><polygon points="307.07 281.01 307.07 294.43 304.63 294.43 290.45 294.43 288.01 294.43 288.01 281.01 307.07 281.01" style="fill: rgb(235, 235, 235); transform-origin: 297.54px 287.72px;" id="eltkqi4imrfs" class="animable"></polygon><rect x="334.43" y="307.97" width="27.71" height="34" style="fill: rgb(240, 240, 240); transform-origin: 348.285px 324.97px;" id="el9gblopzzzvo" class="animable"></rect><rect x="204.81" y="320.85" width="25.18" height="21.13" style="fill: rgb(240, 240, 240); transform-origin: 217.4px 331.415px;" id="el7fgbkkcvrj" class="animable"></rect><rect x="254.25" y="320.85" width="25.18" height="21.13" style="fill: rgb(240, 240, 240); transform-origin: 266.84px 331.415px;" id="elc1w0zlpxuko" class="animable"></rect><rect x="176.22" y="305.22" width="25.18" height="36.75" style="fill: rgb(240, 240, 240); transform-origin: 188.81px 323.595px;" id="elqm7tt8bm1op" class="animable"></rect><rect x="366.35" y="305.22" width="25.18" height="36.75" style="fill: rgb(240, 240, 240); transform-origin: 378.94px 323.595px;" id="elm6t8c70eyhl" class="animable"></rect><path d="M76.25,355.1s-5.06-11,.72-21.94,7.47-13.45,3.78-15.69-5.38,8.72-5.38,8.72a24.58,24.58,0,0,1-.54-15.41c2.56-7.88,4.17-20.72.67-22.09s-.67,16-3.71,21.94a51,51,0,0,1-3-12.93c-.42-6.33.24-16.44-2.53-19s-4.54-.8-1.82,13.17a146.18,146.18,0,0,1,2.7,25.32s-6-18.32-10-18.86-4,5.4-.58,10.55S66.65,323.21,67.74,328c0,0-6.59-13.79-12.53-9.56S60.38,331,65.32,334s8.38,21.87,8.38,21.87Z" style="fill: rgb(224, 224, 224); transform-origin: 68.1049px 316.791px;" id="el5k16g61e5fg" class="animable"></path><path d="M72.25,359.63s4.93-11.12-1-21.92-7.62-13.35-4-15.63,5.48,8.63,5.48,8.63,3-7.58.36-15.42-4.43-20.65-.94-22.08.86,16,4,21.88a51.34,51.34,0,0,0,2.82-13c.34-6.33-.44-16.43,2.3-19.06s4.53-.87,2,13.14a146.84,146.84,0,0,0-2.4,25.36s5.79-18.41,9.82-19,4.09,5.34.7,10.54-9.94,14.52-11,19.28c0,0,6.43-13.89,12.41-9.75s-5,12.63-9.92,15.71-8.12,22-8.12,22Z" style="fill: rgb(235, 235, 235); transform-origin: 79.9461px 321.157px;" id="el89j1beak229" class="animable"></path><polygon points="95 351.71 54.26 351.71 57.56 380.86 91.7 380.86 95 351.71" style="fill: rgb(235, 235, 235); transform-origin: 74.63px 366.285px;" id="elvonow5qa4l8" class="animable"></polygon><polygon points="386.32 380.86 414.29 380.86 417.3 350.24 383.3 350.24 386.32 380.86" style="fill: rgb(235, 235, 235); transform-origin: 400.3px 365.55px;" id="elpfvuphuobdt" class="animable"></polygon></g><g id="freepik--Shadow--inject-124" class="animable" style="transform-origin: 250px 416.24px;"><ellipse id="freepik--path--inject-124" cx="250" cy="416.24" rx="193.89" ry="11.32" style="fill: rgb(245, 245, 245); transform-origin: 250px 416.24px;" class="animable"></ellipse></g><g id="freepik--Window--inject-124" class="animable" style="transform-origin: 239.195px 246.34px;"><rect x="123.29" y="161.16" width="231.81" height="170.36" style="fill: rgb(64, 123, 255); transform-origin: 239.195px 246.34px;" id="elhxfos066qcs" class="animable"></rect><g id="elh1g6j7q4fkv"><rect x="123.29" y="161.16" width="231.81" height="170.36" style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 239.195px 246.34px;" class="animable"></rect></g><rect x="123.29" y="161.16" width="231.81" height="10.43" style="fill: rgb(64, 123, 255); transform-origin: 239.195px 166.375px;" id="elucw0qf2fab" class="animable"></rect></g><g id="freepik--Image--inject-124" class="animable" style="transform-origin: 274.45px 217.04px;"><rect x="225.75" y="181.27" width="93.46" height="66.61" style="fill: rgb(64, 123, 255); transform-origin: 272.48px 214.575px;" id="el2rp8oilp5u" class="animable"></rect><g id="el8pyqwjn3dw2"><rect x="225.75" y="181.27" width="93.47" height="66.61" style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 272.485px 214.575px;" class="animable"></rect></g><g id="elnlw2ep1lif"><rect x="227.13" y="193.5" width="90.7" height="52.99" style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 272.48px 219.995px;" class="animable"></rect></g><rect x="225.75" y="181.27" width="93.46" height="10.43" style="fill: rgb(64, 123, 255); transform-origin: 272.48px 186.485px;" id="elj64i37gyw5" class="animable"></rect><path d="M253.41,207.59a7,7,0,1,1-7-7A7,7,0,0,1,253.41,207.59Z" style="fill: rgb(255, 255, 255); transform-origin: 246.41px 207.59px;" id="eliss3q77xy3q" class="animable"></path></g><g id="freepik--Text--inject-124" class="animable" style="transform-origin: 292.13px 318.705px;"><rect x="247.81" y="286.57" width="93.46" height="66.61" style="fill: rgb(64, 123, 255); transform-origin: 294.54px 319.875px;" id="eli9dyf98goxs" class="animable"></rect><g id="elve25x22xopf"><rect x="247.81" y="286.57" width="93.46" height="66.61" style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 294.54px 319.875px;" class="animable"></rect></g><g id="eldvkp1glqmu"><rect x="249.19" y="298.8" width="90.7" height="52.99" style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 294.54px 325.295px;" class="animable"></rect></g><path d="M289.72,306.23l-7.19,21.68h-4.27l-5.36-16-5.45,16h-4.3L256,306.23h4.18l5.39,16.47,5.61-16.47h3.71l5.48,16.57,5.55-16.57Z" style="fill: rgb(38, 50, 56); transform-origin: 272.86px 317.07px;" id="elhm3ih1umpk" class="animable"></path><rect x="247.81" y="286.57" width="93.46" height="10.43" style="fill: rgb(64, 123, 255); transform-origin: 294.54px 291.785px;" id="el079y1y049cae" class="animable"></rect><rect x="293.99" y="306.73" width="39.13" height="1" style="fill: rgb(38, 50, 56); transform-origin: 313.555px 307.23px;" id="el71os68zfz3a" class="animable"></rect><rect x="293.99" y="311.88" width="39.13" height="1" style="fill: rgb(38, 50, 56); transform-origin: 313.555px 312.38px;" id="el9esz924xz4w" class="animable"></rect><rect x="293.99" y="317.03" width="39.13" height="1" style="fill: rgb(38, 50, 56); transform-origin: 313.555px 317.53px;" id="elovq9vzootz" class="animable"></rect><rect x="293.99" y="322.18" width="39.13" height="1" style="fill: rgb(38, 50, 56); transform-origin: 313.555px 322.68px;" id="elo7e0zedy4zq" class="animable"></rect><rect x="293.99" y="327.34" width="39.13" height="1" style="fill: rgb(38, 50, 56); transform-origin: 313.555px 327.84px;" id="elk4262ywhgie" class="animable"></rect><rect x="255.96" y="332.49" width="77.15" height="1" style="fill: rgb(38, 50, 56); transform-origin: 294.535px 332.99px;" id="el45zssneodmj" class="animable"></rect><rect x="255.96" y="337.64" width="77.15" height="1" style="fill: rgb(38, 50, 56); transform-origin: 294.535px 338.14px;" id="el0f8k6d9nzdue" class="animable"></rect><rect x="255.96" y="342.79" width="77.15" height="1" style="fill: rgb(38, 50, 56); transform-origin: 294.535px 343.29px;" id="el797d65k2pew" class="animable"></rect></g><g id="freepik--Code--inject-124" class="animable" style="transform-origin: 185.555px 278.68px;"><rect x="140.83" y="241.87" width="93.46" height="66.61" style="fill: rgb(64, 123, 255); transform-origin: 187.56px 275.175px;" id="elstmqvjpgrf" class="animable"></rect><g id="el43s2iv3fzqk"><rect x="140.83" y="241.87" width="93.46" height="66.61" style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 187.56px 275.175px;" class="animable"></rect></g><g id="elqix151em99"><rect x="142.21" y="254.1" width="90.7" height="52.99" style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 187.56px 280.595px;" class="animable"></rect></g><path d="M177.14,274.76l-14.42,5.39,14.42,5.39v4.34l-19.26-7.47v-4.52l19.26-7.47Z" style="fill: rgb(38, 50, 56); transform-origin: 167.51px 280.15px;" id="elvnaedqak6nd" class="animable"></path><path d="M192.34,259.59H197L183.23,299h-4.67Z" style="fill: rgb(38, 50, 56); transform-origin: 187.78px 279.295px;" id="eloa5q9yodqd9" class="animable"></path><path d="M217.28,277.89v4.52L198,289.88v-4.34l14.42-5.39L198,274.76v-4.34Z" style="fill: rgb(38, 50, 56); transform-origin: 207.64px 280.15px;" id="elxevvwym65f8" class="animable"></path><rect x="140.83" y="241.87" width="93.46" height="10.43" style="fill: rgb(64, 123, 255); transform-origin: 187.56px 247.085px;" id="el97fburxt2cs" class="animable"></rect></g><g id="freepik--character-2--inject-124" class="animable" style="transform-origin: 361.06px 287.705px;"><path d="M352.45,175.5c2.69,5,8.32,13.53,13.68,13.92,0,0,2.41,5.32-5.56,11.88-8.76,7.22-7.77-.9-7.77-.9,3.84-5.08.8-8.53-2.78-11.18Z" style="fill: rgb(228, 137, 123); transform-origin: 358.246px 189.896px;" id="elnjm5fd2lyjn" class="animable"></path><path d="M353,171c2.76,7,4.74,11,2.92,16.08-2.72,7.68-12.59,8.49-17.39,2.44-4.33-5.44-8.12-16-2.71-21.82A10.28,10.28,0,0,1,353,171Z" style="fill: rgb(228, 137, 123); transform-origin: 344.886px 178.947px;" id="ela6qbwxwudep" class="animable"></path><path d="M357.36,182.5c-1.43,3.27-14,5.22-17.5-3.37,0,0-6.53-1.6-9.53-6.48s-1.15-9,2.93-10.44c3.59-1.32,4.7.36,4.7.36s15.17-8.68,16.39-.81C364.61,163.75,359.16,178.43,357.36,182.5Z" style="fill: rgb(38, 50, 56); transform-origin: 344.635px 171.87px;" id="el83o08cmuoq5" class="animable"></path><path d="M368.46,189.91c-1-3-2.18-6.43-5.79-5.23-3.17,1-12.42,6.76-13.13,8.74a8.77,8.77,0,0,1,2.38,3.75Z" style="fill: rgb(64, 123, 255); transform-origin: 359px 190.802px;" id="elo7h6nxnqbq" class="animable"></path><path d="M402.3,246.24l-39.69,7.11C361,250,357.56,238,351,223.51c-1.77-3.93-3.78-8-6-12.2a155.12,155.12,0,0,0-8.31-13.64,105.48,105.48,0,0,1,12.67-3.84c5-1.12,20.67-7.12,25.27-7.57,6.08-.58,6.75,2.07,6.75,2.07S389.53,196.9,402.3,246.24Z" style="fill: rgb(38, 50, 56); transform-origin: 369.495px 219.764px;" id="elfquwkc6rl3u" class="animable"></path><path d="M348.73,205.71c4.55,8.51-9.54,21.71-9.54,21.71l-13.95-9.69a91.48,91.48,0,0,1,7.44-16C338.26,192.58,345.26,199.23,348.73,205.71Z" style="fill: rgb(38, 50, 56); transform-origin: 337.437px 212.332px;" id="elc4f2m3fylrr" class="animable"></path><g id="freepik--group--inject-124" class="animable" style="transform-origin: 370.157px 330.71px;"><path d="M406.81,408h9.55a.68.68,0,0,1,.67.54l1.55,7a1.18,1.18,0,0,1-1.15,1.4c-3.09-.05-5.34-.24-9.22-.24-2.39,0-9.6.25-12.9.25s-3.73-3.26-2.38-3.56c6.06-1.32,10.62-3.15,12.56-4.89A1.89,1.89,0,0,1,406.81,408Z" style="fill: rgb(38, 50, 56); transform-origin: 405.407px 412.475px;" id="el9bmxf4asnyh" class="animable"></path><path d="M336.31,407.75h9.55a.68.68,0,0,1,.67.54l1.55,7a1.18,1.18,0,0,1-1.15,1.4c-3.09-.05-5.34-.24-9.22-.24-2.39,0-9.6.25-12.9.25s-3.73-3.26-2.38-3.56c6.06-1.32,10.62-3.15,12.56-4.89A1.89,1.89,0,0,1,336.31,407.75Z" style="fill: rgb(38, 50, 56); transform-origin: 334.907px 412.225px;" id="eli3m6he23oft" class="animable"></path><path d="M334.91,402.47l11.6.38c-4.22-77.56-6.19-81.52,31.45-118.15.88,11.08,1.87,22.57,2.84,32.15.61,5.93.8,11.11,1.78,14.91,6.7,25.69,22.83,71.15,22.83,71.15l11.32.51s-14.17-62.31-15.63-82.62c-1.91-26.64,4.31-55.48.77-76.33l-39.54,6.71C326.47,303.66,319.9,315,334.91,402.47Z" style="fill: rgb(64, 123, 255); transform-origin: 372.054px 323.945px;" id="elh825inxn4aq" class="animable"></path></g></g><g id="freepik--character-1--inject-124" class="animable" style="transform-origin: 130.981px 353.192px;"><path d="M120.74,370.41l-31.48,3.88A66.48,66.48,0,0,0,88,364.45a108.05,108.05,0,0,0-3.85-13.58c-1.48-4.26-3.36-9.11-5.74-14.76a7.4,7.4,0,0,1,5.1-10.32c1.24-.27,2.54-.54,3.89-.78a103,103,0,0,1,14.3-1.76c1.57-.05,3.2-.05,4.77,0,5.65.09,10.56,6,11.42,11.51a95.2,95.2,0,0,1,1.63,12.83C120.05,353.84,120.38,360.05,120.74,370.41Z" style="fill: rgb(64, 123, 255); transform-origin: 99.2348px 348.751px;" id="elvyv600efylq" class="animable"></path><path d="M81.36,300.05c2.31,7.25,3.13,10.36,7.81,13.4,7,4.57,15.44.66,15.35-7-.09-6.91-3.85-17.62-11.81-19.12A9.75,9.75,0,0,0,81.36,300.05Z" style="fill: rgb(206, 122, 99); transform-origin: 92.6688px 301.247px;" id="elu5q79chfsb" class="animable"></path><path d="M120.74,370.41l4.78,8.38c12.81-3,53.88-9.25,58.93,4.84,6.27,17.51-39,31.47-64.1,32.33s-46.94-5.12-31.09-41.67Z" style="fill: rgb(38, 50, 56); transform-origin: 134.461px 393.223px;" id="elimbchoxdkrl" class="animable"></path><path d="M175.34,354.55l-6,27.39a2.06,2.06,0,0,1-2,1.55h-33a1.33,1.33,0,0,1-1.24-1.72l6-27.18a1.88,1.88,0,0,1,2-1.34h33C175,353.25,175.54,353.65,175.34,354.55Z" style="fill: rgb(38, 50, 56); transform-origin: 154.211px 368.365px;" id="elghszta0hbyn" class="animable"></path><path d="M86.42,308.79c1.82,4.45,4.38,12.69,1.77,16.12,0,0,4.28-1.19,14.23,3.39,2.21-4.17.07-5.15.07-5.15-5.38-.58-6-4.36-5.81-8Z" style="fill: rgb(206, 122, 99); transform-origin: 94.9203px 318.545px;" id="elzzdlhprk5g" class="animable"></path><path d="M81.06,326.83c-5.48,3.59-5.92,9.23-3.41,20.14,3.79,2.07,13.25-.05,13.25-.05S88.53,330,81.06,326.83Z" style="fill: rgb(64, 123, 255); transform-origin: 83.5405px 337.354px;" id="elbsaokwraw8j" class="animable"></path><path d="M84,304.1s4.61-5.85,1.62-12.54c0,0,9.21-6.49,15.72,2.81,0,0-1.28-9-11.28-8.39s-18.18,16.33-4.94,23.55Z" style="fill: rgb(38, 50, 56); transform-origin: 89.7839px 297.74px;" id="ell9dyrsl05ao" class="animable"></path></g></svg>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ======== LOGOS STRIP ======== --}}
<div class="bg-white border-y border-slate-100 py-10 overflow-hidden">
    <div class="container mx-auto px-4 md:px-8 text-center mb-8">
        <p class="text-xs font-bold text-slate-400 tracking-[0.15em] uppercase reveal">Dipercaya Lulusan yang Kini Bekerja di</p>
    </div>
    
    <style>
        @keyframes scrollMarquee { 
            0% { transform: translateX(0); } 
            100% { transform: translateX(-50%); } 
        }
        .animate-marquee { 
            display: flex; 
            width: max-content; 
            animation: scrollMarquee 35s linear infinite; 
        }
        .animate-marquee:hover { 
            animation-play-state: paused; 
        }
    </style>
    
    <div class="relative w-full reveal reveal-delay-1" style="-webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent); mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);">
        <div class="animate-marquee items-center">
            @php
            $brands = ['Google', 'Microsoft', 'Tokopedia', 'Gojek', 'Traveloka', 'Shopee', 'Apple', 'Meta', 'Netflix', 'Grab', 'BCA', 'Telkomsel'];
            // Diduplikasi untuk looping tak berhingga tanpa patah
            $marqueeBrands = array_merge($brands, $brands);
            @endphp
            @foreach($marqueeBrands as $brand)
            <span class="text-xl md:text-2xl font-extrabold text-slate-200 tracking-tight hover:text-brand transition-colors duration-300 cursor-default px-8 md:px-12">{{ $brand }}</span>
            @endforeach
        </div>
    </div>
</div>

{{-- ======== FEATURES BENTO ======== --}}
<section id="fitur" class="bg-slate-50 py-24">
    <div class="container mx-auto px-4 md:px-8 max-w-7xl">
        {{-- Section header --}}
        <p class="text-xs font-bold text-brand tracking-[0.18em] uppercase mb-3 reveal">Fitur Unggulan</p>
        <h2 class="text-4xl md:text-5xl font-extrabold tracking-tighter text-navy leading-[1.1] mb-4 reveal reveal-delay-1">
            Semua yang Kamu Butuhkan<br>Ada di Sini
        </h2>
        <p class="text-base text-slate-500 max-w-md leading-relaxed mb-14 reveal reveal-delay-2">
            Dari materi video berkualitas hingga sertifikat digital — kami menyediakan ekosistem belajar yang lengkap.
        </p>

        {{-- BENTO GRID --}}
        <div class="grid grid-cols-12 gap-5">

            {{-- Card 1: Kurikulum (col-8) --}}
            <div class="bento-card col-span-12 md:col-span-8 bg-white/90 backdrop-blur-sm border border-white/60 rounded-3xl p-8 shadow-xl shadow-blue-50 reveal">
                <div class="w-11 h-11 rounded-2xl bg-blue-50 flex items-center justify-center text-brand text-lg mb-5">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h3 class="text-2xl font-extrabold tracking-tight text-navy mb-3">Kurikulum Terstruktur &amp; Adaptif</h3>
                <p class="text-sm text-slate-500 leading-relaxed mb-5">
                    Setiap kursus dirancang dengan jalur belajar yang terstruktur. Sistem kami secara cerdas menyesuaikan
                    urutan materi berdasarkan <span class="text-brand font-semibold">kemajuan</span> dan <span class="text-brand font-semibold">gaya belajarmu</span>.
                </p>
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach(['Video HD','Latihan Interaktif'] as $tag)
                    <span class="text-xs font-semibold px-3 py-1.5 bg-slate-100 text-slate-600 rounded-full">{{ $tag }}</span>
                    @endforeach
                </div>
                {{-- Progress bars --}}
                <div class="bg-blue-50/60 rounded-2xl p-5 space-y-3">
                    @php
                    $bars = [
                        ['UI/UX Fundamentals', 90],
                        ['React Development', 65],
                        ['Data Science Basics', 42],
                    ];
                    @endphp
                    @foreach($bars as $bar)
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-medium text-slate-600 w-36 flex-shrink-0">{{ $bar[0] }}</span>
                        <div class="flex-1 h-1.5 bg-white rounded-full overflow-hidden">
                            <div class="h-full rounded-full progress-bar-fill bg-gradient-to-r from-brand to-violet-500" style="width:{{ $bar[1] }}%"></div>
                        </div>
                        <span class="text-xs font-bold text-brand w-8 text-right">{{ $bar[1] }}%</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Card 2: Sertifikat (col-4) --}}
            <div class="bento-card col-span-12 md:col-span-4 bg-white/90 backdrop-blur-sm border border-white/60 rounded-3xl p-8 shadow-xl shadow-blue-50 reveal reveal-delay-1">
                <div class="w-11 h-11 rounded-2xl bg-violet-50 flex items-center justify-center text-violet-500 text-lg mb-5">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="text-2xl font-extrabold tracking-tight text-navy mb-3">Sertifikat Resmi</h3>
                <p class="text-sm text-slate-500 leading-relaxed mb-5">
                    Dapatkan sertifikat digital bertanda tangan yang dapat
                    <span class="text-brand font-semibold">langsung dibagikan</span> ke <span class="text-brand font-semibold">LinkedIn</span>
                    dan diverifikasi <span class="text-brand font-semibold">oleh perusahaan</span>.
                </p>
                <div class="rounded-2xl bg-gradient-to-br from-navy to-blue-900 p-6 text-center text-white">
                    <div class="text-amber-400 text-3xl mb-2"><i class="fas fa-award"></i></div>
                    <p class="text-xs text-white/60 mb-1">Sertifikat Kelulusan</p>
                    <p class="text-sm font-bold">UI/UX Design Masterclass</p>
                </div>
            </div>

            {{-- Card 3: Kurikulum Update (col-4) --}}
            <div class="bento-card col-span-12 md:col-span-4 bg-white/90 backdrop-blur-sm border border-white/60 rounded-3xl p-8 shadow-xl shadow-blue-50 reveal">
                <div class="w-11 h-11 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-500 text-lg mb-5">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="text-2xl font-extrabold tracking-tight text-navy mb-3">Konten Terkini & Relevan</h3>
                <p class="text-sm text-slate-500 leading-relaxed mb-5">
                    Materi kami diperbarui secara berkala mengikuti perkembangan teknologi terbaru, sehingga apa yang kamu pelajari tidak akan ketinggalan zaman.
                </p>
                <div class="flex flex-wrap gap-2">
                    @foreach(['Update Berkala','Tren Industri','Materi Eksklusif'] as $tag)
                    <span class="text-xs font-semibold px-3 py-1.5 bg-slate-100 text-slate-600 rounded-full">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Card 4: Mobile (col-8) --}}
            <div class="bento-card col-span-12 md:col-span-8 bg-white/90 backdrop-blur-sm border border-white/60 rounded-3xl p-8 shadow-xl shadow-blue-50 reveal reveal-delay-1">
                <div class="w-11 h-11 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-500 text-lg mb-5">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="text-2xl font-extrabold tracking-tight text-navy mb-3">Belajar di Mana Saja, Kapan Saja</h3>
                <p class="text-sm text-slate-500 leading-relaxed mb-5">
                    Akses semua materi dari perangkat apapun — laptop, tablet, atau smartphone dengan dukungan sinkronisasi real-time.
                </p>
                <div class="flex flex-wrap gap-2">
                    @foreach(['iOS & Android','Sinkronisasi Real-time','Multi-device'] as $tag)
                    <span class="text-xs font-semibold px-3 py-1.5 bg-slate-100 text-slate-600 rounded-full">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ======== HOW IT WORKS ======== --}}
<section id="cara-kerja" class="bg-white py-24 relative overflow-hidden">
    {{-- Soft BG accent --}}
    <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_80%_50%_at_50%_100%,rgba(219,234,254,0.35),transparent)] pointer-events-none"></div>

    <div class="container mx-auto px-4 md:px-8 relative z-10">
        {{-- Header --}}
        <div class="text-center mb-16">
            <p class="text-xs font-bold text-brand tracking-[0.18em] uppercase mb-3 reveal">Cara Kerja</p>
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tighter text-navy leading-[1.1] reveal reveal-delay-1">
                Mulai Belajar dalam<br>
                <span class="bg-gradient-to-r from-blue-600 to-violet-500 bg-clip-text text-transparent">3 Langkah Mudah</span>
            </h2>
        </div>

        {{-- Cards with connector lines --}}
        <div class="relative max-w-5xl mx-auto">
            {{-- Connector Line (desktop only) --}}
            <div class="hidden md:block absolute top-[3.5rem] left-[calc(16.67%+1.5rem)] right-[calc(16.67%+1.5rem)] h-[2px] pointer-events-none z-0">
                <div class="w-full h-full bg-gradient-to-r from-blue-300 via-violet-400 to-teal-400 opacity-50 rounded-full" style="box-shadow: 0 0 12px 2px rgba(99,102,241,0.3);"></div>
                {{-- Animated glow dot --}}
                <div class="absolute top-1/2 -translate-y-1/2 w-3 h-3 rounded-full bg-violet-400 shadow-[0_0_10px_4px_rgba(167,139,250,0.6)]" style="animation: moveGlow 3s ease-in-out infinite; left: 0;"></div>
            </div>

            <style>
                @keyframes moveGlow {
                    0%   { left: 0; }
                    50%  { left: calc(100% - 12px); }
                    100% { left: 0; }
                }
            </style>

            <div class="grid md:grid-cols-3 gap-6 relative z-10">

                {{-- CARD 1 --}}
                <div class="reveal group">
                    <div class="relative bg-white/80 backdrop-blur-xl border border-blue-100 rounded-3xl p-8 shadow-xl shadow-blue-100/50 hover:shadow-2xl hover:shadow-blue-200/60 hover:-translate-y-2 transition-all duration-300 h-full flex flex-col">
                        {{-- Step number badge --}}
                        <div class="absolute -top-3 left-8 text-[11px] font-black tracking-widest text-blue-400 bg-blue-50 border border-blue-100 px-3 py-1 rounded-full">LANGKAH 1</div>
                        {{-- Icon --}}
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-sky-400 text-white text-2xl flex items-center justify-center mb-6 shadow-lg shadow-blue-300/40 mt-4">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        {{-- Content --}}
                        <h4 class="text-xl font-extrabold text-navy tracking-tight mb-3">Buat Akun Gratis</h4>
                        <p class="text-sm text-slate-500 leading-relaxed flex-1">
                            Daftar hanya dalam hitungan detik. Jelajahi berbagai modul pilihan dan mulai langkah pertamamu tanpa biaya langganan awal.
                        </p>
                        {{-- Bottom accent --}}
                        <div class="mt-6 h-1 w-16 rounded-full bg-gradient-to-r from-blue-400 to-sky-300 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>

                {{-- CARD 2 --}}
                <div class="reveal reveal-delay-1 group">
                    <div class="relative bg-white/80 backdrop-blur-xl border border-violet-100 rounded-3xl p-8 shadow-xl shadow-violet-100/50 hover:shadow-2xl hover:shadow-violet-200/60 hover:-translate-y-2 transition-all duration-300 h-full flex flex-col">
                        <div class="absolute -top-3 left-8 text-[11px] font-black tracking-widest text-violet-400 bg-violet-50 border border-violet-100 px-3 py-1 rounded-full">LANGKAH 2</div>
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-violet-500 to-purple-400 text-white text-2xl flex items-center justify-center mb-6 shadow-lg shadow-violet-300/40 mt-4">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h4 class="text-xl font-extrabold text-navy tracking-tight mb-3">Pilih Kursus Favoritmu</h4>
                        <p class="text-sm text-slate-500 leading-relaxed flex-1">
                            Temukan materi terstruktur yang dirancang khusus untuk kebutuhan industri saat ini. Belajar sesuai minat dan kecepatanmu sendiri.
                        </p>
                        <div class="mt-6 h-1 w-16 rounded-full bg-gradient-to-r from-violet-400 to-purple-300 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>

                {{-- CARD 3 --}}
                <div class="reveal reveal-delay-2 group">
                    <div class="relative bg-white/80 backdrop-blur-xl border border-teal-100 rounded-3xl p-8 shadow-xl shadow-teal-100/50 hover:shadow-2xl hover:shadow-teal-200/60 hover:-translate-y-2 transition-all duration-300 h-full flex flex-col">
                        <div class="absolute -top-3 left-8 text-[11px] font-black tracking-widest text-teal-500 bg-teal-50 border border-teal-100 px-3 py-1 rounded-full">LANGKAH 3</div>
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-teal-500 to-emerald-400 text-white text-2xl flex items-center justify-center mb-6 shadow-lg shadow-teal-300/40 mt-4">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h4 class="text-xl font-extrabold text-navy tracking-tight mb-3">Belajar & Raih Sertifikat</h4>
                        <p class="text-sm text-slate-500 leading-relaxed flex-1">
                            Selesaikan ujian akhir untuk memvalidasi kemampuanmu dan dapatkan sertifikat kompetensi sebagai bukti pencapaian belajarmu.
                        </p>
                        <div class="mt-6 h-1 w-16 rounded-full bg-gradient-to-r from-teal-400 to-emerald-300 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ======== TESTIMONIALS ======== --}}
<section id="testimoni" class="bg-white py-24 relative overflow-hidden">

    {{-- Subtle background tint --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_60%_at_50%_0%,rgba(219,234,254,0.35),transparent)] pointer-events-none"></div>

    {{-- Carousel Animation --}}
    <style>
        @keyframes scrollTestimonial {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .testimonial-track {
            display: flex;
            width: max-content;
            animation: scrollTestimonial 32s linear infinite;
        }
        .testimonial-track:hover {
            animation-play-state: paused;
        }
    </style>

    <div class="relative z-10">

        {{-- Section Header --}}
        <div class="text-center mb-14 container mx-auto px-4 md:px-8">
            <p class="text-xs font-bold text-blue-600 tracking-[0.18em] uppercase mb-3 reveal">Testimoni</p>
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tighter text-navy leading-[1.1] reveal reveal-delay-1">
                Mereka Sudah<br>Merasakannya
            </h2>
            <p class="text-base text-slate-500 max-w-lg mx-auto mt-4 leading-relaxed reveal reveal-delay-2">
                Lebih dari 20.000 pelajar telah membuktikan efektivitas platform kami dalam membangun karir impian.
            </p>
        </div>

        {{-- Infinite Scrolling Carousel --}}
        @php
        $testimonials = [
            [
                'name'       => 'Abdul Dudul',
                'title'      => 'Product Designer',
                'company'    => 'Tokopedia',
                'avatar'     => 'https://ui-avatars.com/api/?name=Abdul+Dudul&background=EFF6FF&color=2563EB&bold=true&size=128&font-size=0.38',
                'quote'      => 'Setelah selesai kursus UI/UX di IntellectHub, saya langsung diterima magang di startup tech terkemuka. Materinya sangat relevan dan instrukturnya responsif.',
                'logo_color' => '#00AA5B',
            ],
            [
                'name'       => 'Elnoah, K.Ip',
                'title'      => 'Frontend Developer',
                'company'    => 'Gojek',
                'avatar'     => 'https://ui-avatars.com/api/?name=Elnoah+Thinkpad&background=FFF0F3&color=E11D48&bold=true&size=128&font-size=0.38',
                'quote'      => 'Belajar React JS dari nol di sini sangat menyenangkan. Kurikulum terstruktur, video HD, dan materi yang selalu diperbarui sangat membantu pemahaman saya.',
                'logo_color' => '#00AA13',
            ],
            [
                'name'       => 'Benjamin Afifudin',
                'title'      => 'Data Analyst',
                'company'    => 'Traveloka',
                'avatar'     => 'https://ui-avatars.com/api/?name=Benjamin+Afifudin&background=EFF6FF&color=0284C7&bold=true&size=128&font-size=0.38',
                'quote'      => 'Sertifikat dari IntellectHub diakui oleh HRD perusahaan tempat saya apply. Platform terbaik yang pernah saya gunakan untuk belajar data science.',
                'logo_color' => '#0064D2',
            ],
            [
                'name'       => 'Okta PanJahitan',
                'title'      => 'Backend Engineer',
                'company'    => 'Shopee',
                'avatar'     => 'https://ui-avatars.com/api/?name=Okta+PanJahitan&background=FFF7ED&color=EA580C&bold=true&size=128&font-size=0.38',
                'quote'      => 'Saya berhasil beralih karir dari administrasi ke software engineer dalam 8 bulan belajar di IntellectHub. Roadmap-nya sangat jelas dan terstruktur.',
                'logo_color' => '#EE4D2D',
            ],
            [
                'name'       => 'Naren Malangjiwan',
                'title'      => 'UX Researcher',
                'company'    => 'Bukalapak',
                'avatar'     => 'https://ui-avatars.com/api/?name=Naren+Malangjiwan&background=F0FDF4&color=16A34A&bold=true&size=128&font-size=0.38',
                'quote'      => 'Instruktur di IntellectHub bukan hanya mengajar teori, tapi langsung praktek dengan studi kasus nyata dari industri. Sangat berdampak untuk karir saya.',
                'logo_color' => '#D9272E',
            ],
        ];
        // Duplikasi untuk seamless looping
        $carouselItems = array_merge($testimonials, $testimonials);
        @endphp

        {{-- Edge fade masks --}}
        <div class="relative" style="-webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent); mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);">
            <div class="testimonial-track py-4">
                @foreach($carouselItems as $t)
                <div class="flex-shrink-0 w-80 mx-3">
                    <div class="bg-white border border-slate-100 rounded-3xl p-6 h-full flex flex-col
                                shadow-[0_4px_24px_rgba(15,23,42,0.07)]
                                hover:shadow-[0_12px_40px_rgba(37,99,235,0.12)]
                                hover:border-blue-100 hover:-translate-y-1
                                transition-all duration-300 cursor-default">

                        {{-- Blue Stars --}}
                        <div class="flex gap-1 mb-4">
                            @for($s = 0; $s < 5; $s++)
                            <svg class="w-4 h-4" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" fill="#2563EB"/>
                            </svg>
                            @endfor
                        </div>

                        {{-- Quote --}}
                        <blockquote class="text-sm text-slate-600 leading-relaxed flex-1 mb-6">
                            "{{ $t['quote'] }}"
                        </blockquote>

                        {{-- Divider --}}
                        <div class="h-px bg-slate-100 mb-4"></div>

                        {{-- Author Row --}}
                        <div class="flex items-center gap-3">
                            <img src="{{ $t['avatar'] }}"
                                 alt="{{ $t['name'] }}"
                                 class="w-10 h-10 rounded-full object-cover border-2 border-slate-100 shadow-sm flex-shrink-0"
                                 loading="lazy">
                            <div class="min-w-0">
                                <p class="text-sm font-extrabold text-navy tracking-tight">{{ $t['name'] }}</p>
                                <div class="flex items-center gap-1 mt-0.5">
                                    <span class="text-xs text-slate-400 font-medium">{{ $t['title'] }} ·</span>
                                    <span class="text-xs font-bold" style="color: {{ $t['logo_color'] }}; filter: grayscale(100%); opacity: 0.65;">{{ $t['company'] }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

{{-- ======== PRICING ======== --}}
<section id="harga" class="bg-white py-24">
    <div class="container mx-auto px-4 md:px-8 max-w-7xl text-center">
        <p class="text-xs font-bold text-brand tracking-[0.18em] uppercase mb-3 reveal">Harga</p>
        <h2 class="text-4xl md:text-5xl font-extrabold tracking-tighter text-navy leading-[1.1] mb-16 reveal reveal-delay-1">
            Pilih Paket Langganan<br>
            <span class="text-lg md:text-xl font-medium text-slate-500 tracking-normal leading-normal mt-4 block">Investasi terbaik untuk masa depan karir coding Anda</span>
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 items-center max-w-7xl mx-auto">
            @php
            $allFeatures = [
                'Akses Semua Kursus',
                'Sertifikat Resmi',
                'Video HD',
                'Update Materi',
            ];
            @endphp

            {{-- 1 BULAN --}}
            <div class="bg-white border border-slate-100 rounded-3xl p-8 text-left transition-all duration-300 hover:shadow-2xl hover:border-blue-100 hover:-translate-y-2 reveal flex flex-col h-full justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-500 mb-4 uppercase tracking-wider">1 Bulan</h3>
                    <div class="flex items-end gap-1 mb-1">
                        <span class="text-3xl lg:text-4xl font-black tracking-tight text-navy">Rp <span class="price-count" data-price-target="1.5">0</span>jt</span>
                    </div>
                    <p class="text-xs font-semibold text-slate-400 mb-8">/ bulan</p>
                    <ul class="space-y-4 mb-8">
                        @foreach($allFeatures as $feat)
                        <li class="flex items-center gap-3 text-sm text-navy font-medium">
                            <i class="fas fa-check-circle text-brand text-base flex-shrink-0"></i>
                            {{ $feat }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="block text-center py-3.5 rounded-full border-2 border-slate-200 text-sm font-bold text-navy hover:border-brand hover:text-brand transition-all duration-200">Mulai Belajar</a>
            </div>

            {{-- 3 BULAN --}}
            <div class="bg-white border border-slate-100 rounded-3xl p-8 text-left transition-all duration-300 hover:shadow-2xl hover:border-blue-100 hover:-translate-y-2 reveal reveal-delay-1 flex flex-col h-full justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-500 mb-4 uppercase tracking-wider">3 Bulan</h3>
                    <div class="flex items-end gap-1 mb-1">
                        <span class="text-3xl lg:text-4xl font-black tracking-tight text-navy">Rp <span class="price-count" data-price-target="4.5">0</span>jt</span>
                    </div>
                    <p class="text-xs font-semibold text-slate-400 mb-8">Rp 1,5jt / bulan</p>
                    <ul class="space-y-4 mb-8">
                        @foreach($allFeatures as $feat)
                        <li class="flex items-center gap-3 text-sm text-navy font-medium">
                            <i class="fas fa-check-circle text-brand text-base flex-shrink-0"></i>
                            {{ $feat }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="block text-center py-3.5 rounded-full border-2 border-slate-200 text-sm font-bold text-navy hover:border-brand hover:text-brand transition-all duration-200">Pilih Paket</a>
            </div>

            {{-- 6 BULAN --}}
            <div class="relative bg-white border border-slate-100 rounded-3xl p-8 text-left transition-all duration-300 hover:shadow-2xl hover:border-blue-100 hover:-translate-y-2 reveal reveal-delay-2 flex flex-col h-full justify-between mt-4 md:mt-0">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-blue-100 border border-blue-200 text-brand text-xs font-bold px-4 py-1.5 rounded-full whitespace-nowrap">
                    Hemat 10%
                </div>
                <div>
                    <h3 class="text-sm font-bold text-slate-500 mb-4 mt-2 uppercase tracking-wider">6 Bulan</h3>
                    <div class="flex flex-col gap-1 mb-1">
                        <span class="text-sm text-slate-400 line-through -mb-2">Rp 9jt</span>
                        <div class="flex items-end gap-1">
                            <span class="text-3xl lg:text-4xl font-black tracking-tight text-brand">Rp <span class="price-count" data-price-target="8.1">0</span>jt</span>
                        </div>
                    </div>
                    <p class="text-xs font-semibold text-slate-400 mb-8">Rp 1,35jt / bulan</p>
                    <ul class="space-y-4 mb-8">
                        @foreach($allFeatures as $feat)
                        <li class="flex items-center gap-3 text-sm text-navy font-medium">
                            <i class="fas fa-check-circle text-brand text-base flex-shrink-0"></i>
                            {{ $feat }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="block text-center py-3.5 rounded-full bg-blue-50 text-sm font-bold text-brand hover:bg-blue-100 transition-all duration-200">Pilih Paket</a>
            </div>

            {{-- 12 BULAN (ANNUAL - BEST VALUE) --}}
            <div class="relative rounded-3xl p-[3px] bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-500 shadow-2xl shadow-indigo-500/30 lg:scale-105 z-10 transition-all duration-300 reveal reveal-delay-3 flex flex-col h-full mt-4 lg:mt-0">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-blue-500 to-purple-500 text-white text-xs font-bold px-5 py-1.5 rounded-full shadow-lg shadow-indigo-500/40 whitespace-nowrap">
                    Hemat 30% / Best Value
                </div>
                <div class="bg-white rounded-[21px] p-8 h-full flex flex-col justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-slate-500 mb-4 mt-2 uppercase tracking-wider">12 Bulan</h3>
                        <div class="flex flex-col gap-1 mb-1">
                            <span class="text-sm text-slate-400 line-through -mb-2">Rp 18jt</span>
                            <div class="flex items-end gap-1">
                                <span class="text-3xl lg:text-4xl font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Rp <span class="price-count" data-price-target="12.6">0</span>jt</span>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-slate-400 mb-8">Rp 1,05jt / bulan</p>
                        <ul class="space-y-4 mb-8">
                            @foreach($allFeatures as $feat)
                            <li class="flex items-center gap-3 text-sm text-navy font-bold">
                                <i class="fas fa-check-circle text-indigo-500 text-base flex-shrink-0"></i>
                                {{ $feat }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{ route('register') }}" class="block text-center py-3.5 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 text-sm font-bold text-white shadow-xl shadow-indigo-500/30 hover:opacity-90 hover:-translate-y-0.5 transition-all duration-200">
                        Pilih Paket
                    </a>
                </div>
            </div>

        </div>

        {{-- Footnote --}}
        <p class="text-sm text-slate-500 font-medium mt-14 mb-0 reveal">
            Semua fitur terbuka untuk semua paket. Pilih durasi yang paling sesuai dengan target belajarmu.
        </p>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const pObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseFloat(el.getAttribute('data-price-target'));
                    const duration = 1500;
                    const start = performance.now();

                    function updatePrice(now) {
                        const elapsed = Math.min((now - start) / duration, 1);
                        // Easing out cubic
                        const eased = 1 - Math.pow(1 - elapsed, 3);
                        const current = eased * target;

                        let formatted = current.toFixed(1).replace('.', ',');
                        if (formatted.endsWith(',0')) {
                            formatted = formatted.substring(0, formatted.length - 2);
                        }

                        el.textContent = formatted;

                        if (elapsed < 1) {
                            requestAnimationFrame(updatePrice);
                        } else {
                            let endFmt = target.toFixed(1).replace('.', ',');
                            if (endFmt.endsWith(',0')) endFmt = endFmt.substring(0, endFmt.length - 2);
                            el.textContent = endFmt;
                        }
                    }
                    requestAnimationFrame(updatePrice);
                    pObserver.unobserve(el);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.price-count').forEach(el => pObserver.observe(el));
    });
</script>

{{-- ======== CTA BANNER ======== --}}
<section class="bg-navy py-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand/20 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-violet-500/20 rounded-full blur-[80px] pointer-events-none"></div>
    <div class="container mx-auto px-4 md:px-8 text-center relative z-10 max-w-3xl">
        <h2 class="text-4xl md:text-5xl font-extrabold tracking-tighter text-white leading-[1.1] mb-5 reveal">
            Siap Memulai<br>Perjalanan Belajarmu?
        </h2>
        <p class="text-base text-white/60 leading-relaxed mb-10 reveal reveal-delay-1">
            Bergabunglah dengan lebih dari 20.000 pelajar aktif dan mulai kuasai skill yang dibutuhkan industri hari ini.
        </p>
        <div class="flex flex-wrap gap-4 justify-center reveal reveal-delay-2">
            <a href="{{ route('register') }}" class="px-8 py-3.5 rounded-full bg-white text-navy text-sm font-bold shadow-2xl hover:-translate-y-0.5 hover:shadow-white/20 transition-all duration-200">
                Daftar Gratis Sekarang
            </a>
            <a href="{{ route('login') }}" class="px-8 py-3.5 rounded-full border-2 border-white/20 text-white text-sm font-semibold hover:border-white/50 transition-all duration-200">
                Sudah punya akun? Masuk
            </a>
        </div>
    </div>
</section>

{{-- ======== FOOTER ======== --}}
<footer class="bg-navy border-t border-white/5 pt-16 pb-8">
    <div class="container mx-auto px-4 md:px-8">
        <div class="grid md:grid-cols-4 gap-10 mb-12">
            <div class="md:col-span-1">
                <a href="#" class="text-xl font-extrabold tracking-tight text-white mb-4 block">
                    Intellect<span class="text-brand">Hub</span>
                </a>
                <p class="text-sm text-white/40 leading-relaxed">Platform pembelajaran online terdepan di Indonesia. Belajar, berkembang, dan raih karir impianmu.</p>
            </div>
            @php
            $footerLinks = [
                'Platform' => ['Fitur'=>'#fitur','Harga'=>'#harga','Cara Kerja'=>'#cara-kerja','Kursus Populer'=>'#'],
                'Perusahaan' => ['Tentang Kami'=>'#','Blog'=>'#','Karir'=>'#','Press Kit'=>'#'],
                'Dukungan' => ['Pusat Bantuan'=>'#','Hubungi Kami'=>'#','Kebijakan Privasi'=>'#','Syarat & Ketentuan'=>'#'],
            ];
            @endphp
            @foreach($footerLinks as $title => $links)
            <div>
                <h5 class="text-xs font-bold text-white/80 uppercase tracking-[0.12em] mb-5">{{ $title }}</h5>
                <ul class="space-y-3">
                    @foreach($links as $label => $href)
                    <li><a href="{{ $href }}" class="text-sm text-white/40 hover:text-white/80 transition-colors duration-200">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="border-t border-white/8 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-white/30">© {{ date('Y') }} IntellectHub. All rights reserved.</p>
            <div class="flex gap-3">
                @php $socials = [['fa-instagram','Instagram'],['fa-twitter','Twitter'],['fa-linkedin-in','LinkedIn'],['fa-youtube','YouTube']]; @endphp
                @foreach($socials as $s)
                <a href="#" aria-label="{{ $s[1] }}" class="w-9 h-9 rounded-full border border-white/10 flex items-center justify-center text-white/40 hover:border-brand hover:text-brand transition-all duration-200 text-sm">
                    <i class="fab {{ $s[0] }}"></i>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>

{{-- ======== SCRIPTS ======== --}}
<script>
// --- Navbar scroll effect ---
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
        navbar.classList.remove('py-4');
        navbar.classList.add('py-2', 'bg-white/85');
    } else {
        navbar.classList.remove('py-2', 'bg-white/85');
        navbar.classList.add('py-4');
    }
}, { passive: true });

// --- Hamburger menu ---
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobileMenu');
hamburger.addEventListener('click', () => {
    const open = mobileMenu.classList.toggle('hidden') === false;
    hamburger.classList.toggle('hamburger-open', open);
});
// Close mobile menu on link click
mobileMenu.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        hamburger.classList.remove('hamburger-open');
    });
});

// --- Scroll Reveal (IntersectionObserver) ---
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            revealObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// --- Count-Up Animation ---
function animateCountUp(el) {
    const target = parseInt(el.dataset.target);
    const suffix = el.dataset.suffix || '';
    const duration = 1800;
    const start = performance.now();
    const isLarge = target >= 10000;

    function update(now) {
        const elapsed = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - elapsed, 3);
        const current = Math.floor(eased * target);

        if (isLarge) {
            el.textContent = Math.floor(current / 1000) + 'K+';
        } else {
            el.textContent = current + suffix;
        }

        if (elapsed < 1) requestAnimationFrame(update);
        else el.textContent = isLarge ? Math.floor(target / 1000) + 'K+' : target + suffix;
    }
    requestAnimationFrame(update);
}

const statsSection = document.getElementById('stats-section');
let statsAnimated = false;
const statsObserver = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting && !statsAnimated) {
        statsAnimated = true;
        document.querySelectorAll('[data-target]').forEach(el => animateCountUp(el));
        statsObserver.disconnect();
    }
}, { threshold: 0.5 });
if (statsSection) statsObserver.observe(statsSection);
</script>
</body>
</html>
