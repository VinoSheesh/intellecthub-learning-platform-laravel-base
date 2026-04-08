<div class="font-poppins h-screen w-screen bg-slate-50 flex flex-col"
     x-data="{ sidebarOpen: false }">


    {{-- ══════════════════════════════════════════════════════════════
         TOP NAVIGATION BAR — Lesson X/Y + Title + Progress
         flex-shrink-0 → never compressed by flex-col parent.
         ══════════════════════════════════════════════════════════ --}}

    {{-- ── Mobile Top Bar ── --}}
    <header class="sm:hidden flex-shrink-0 bg-white border-b border-slate-200 z-30">
        <div class="flex items-center gap-2 h-14 px-3">
            <a href="{{ route('showcourse', $course->id) }}"
               class="flex-shrink-0 w-9 h-9 rounded-xl flex items-center justify-center
                      text-slate-500 active:bg-slate-100 transition-colors">
                <i class="fas fa-arrow-left text-sm"></i>
            </a>
            <div class="flex-1 min-w-0">
                @if($lesson)
                    @php
                        $mIdx = collect($lessons)->values()->search(fn($l) => (int)$l->id === (int)$lesson->id);
                    @endphp
                    <p class="text-[9px] text-indigo-500 font-extrabold uppercase tracking-widest leading-none mb-0.5">
                        {{ $course->category->name ?? 'Kursus' }} · Lesson {{ $mIdx + 1 }}/{{ $lessons->count() }}
                    </p>
                    <h1 class="text-sm font-extrabold text-slate-800 leading-tight truncate">{{ $lesson->title }}</h1>
                @else
                    <h1 class="text-sm font-extrabold text-slate-800 leading-tight truncate">{{ $course->title }}</h1>
                @endif
            </div>
            <button @click="sidebarOpen = true" type="button"
                    class="flex-shrink-0 w-9 h-9 rounded-xl flex items-center justify-center
                           text-slate-500 active:bg-slate-100 transition-colors">
                <i class="fas fa-list-ul text-sm"></i>
            </button>
        </div>
        @if($lesson)
            <div class="h-0.5 bg-slate-100">
                <div class="h-0.5 bg-blue-500 transition-all duration-700" style="width:{{ $progress }}%"></div>
            </div>
        @endif
    </header>

    {{-- ── Desktop Top Bar ── --}}
    <header class="hidden sm:flex flex-shrink-0 items-center bg-white border-b border-slate-200 z-30 shadow-sm"
            style="min-height:60px;">
        <a href="{{ route('showcourse', $course->id) }}"
           class="flex-shrink-0 w-14 h-[60px] flex items-center justify-center
                  text-slate-400 hover:text-blue-600 hover:bg-blue-50
                  border-r border-slate-100 transition-colors">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="flex-1 min-w-0 px-5 py-2.5">
            @if($lesson)
                @php
                    $dIdx = collect($lessons)->values()->search(fn($l) => (int)$l->id === (int)$lesson->id);
                @endphp
                <div class="flex items-center gap-2 mb-0.5">
                    <span class="inline-flex items-center gap-1 px-2 py-0.5
                                 bg-indigo-50 border border-indigo-100 rounded
                                 text-[10px] font-extrabold text-indigo-500 uppercase tracking-wider flex-shrink-0">
                        <i class="fas fa-book-open text-[8px]"></i>
                        Lesson {{ $dIdx + 1 }} / {{ $lessons->count() }}
                    </span>
                    <span class="text-xs text-slate-400 font-medium truncate">
                        {{ $course->category->name ?? '' }}
                        @if($course->category?->name) · @endif
                        {{ $course->title }}
                    </span>
                </div>
                <h1 class="text-base lg:text-lg font-extrabold text-slate-800 leading-tight truncate">
                    {{ $lesson->title }}
                </h1>
            @else
                <p class="text-xs text-slate-400 mb-0.5">{{ $course->category->name ?? '' }}</p>
                <h1 class="text-base font-extrabold text-slate-800 truncate">{{ $course->title }}</h1>
            @endif
        </div>
        <div class="flex-shrink-0 flex items-center gap-4 px-5 border-l border-slate-100">
            <div class="flex flex-col items-end gap-1.5">
                <span class="text-xs font-bold text-slate-600">{{ $progress }}% Selesai</span>
                <div class="w-28 lg:w-40 bg-slate-100 rounded-full h-1.5 overflow-hidden">
                    <div class="bg-blue-500 h-1.5 rounded-full transition-all duration-700"
                         style="width:{{ $progress }}%"></div>
                </div>
            </div>
            @if($progress >= 100)
                <a href="{{ route('certificate.download', $course->id) }}"
                   class="inline-flex items-center gap-2 px-3.5 py-2
                          bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold
                          rounded-xl shadow-sm hover:-translate-y-0.5 transition-all flex-shrink-0">
                    <i class="fas fa-award"></i> Sertifikat
                </a>
            @endif
        </div>
    </header>


    {{-- ══════════════════════════════════════════════════════════════
         MAIN BODY — Sidebar + Scrollable Content
         flex-1 min-h-0 → fills remaining height exactly.
         grid with minmax(0,1fr) → content column never blows out.
         ══════════════════════════════════════════════════════════ --}}
    <div class="flex-1 min-h-0 grid grid-cols-1 lg:grid-cols-[280px_minmax(0,1fr)]
                w-full min-w-0" style="overflow: clip;">

        {{-- Mobile overlay --}}
        <div x-show="sidebarOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/60 z-40 lg:hidden"
             @click.self="sidebarOpen = false"
             x-cloak></div>

        {{-- ── SIDEBAR —  Lesson List ── --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               class="fixed inset-y-0 left-0 z-50 w-72
                      lg:static lg:translate-x-0 lg:w-auto lg:z-auto
                      flex flex-col bg-white border-r border-slate-200
                      transition-transform duration-300 ease-in-out
                      shadow-2xl lg:shadow-none overflow-hidden">
            <div class="flex-shrink-0 flex items-center justify-between px-5 py-4 bg-slate-50 border-b border-slate-100">
                <div>
                    <h2 class="text-xs font-extrabold text-slate-600 uppercase tracking-wider">Daftar Lesson</h2>
                    <p class="text-xs text-slate-400 mt-0.5">{{ count($completedLessonIds) }}/{{ $lessons->count() }} selesai</p>
                </div>
                <button @click="sidebarOpen = false" type="button"
                        class="lg:hidden w-8 h-8 flex items-center justify-center rounded-lg
                               bg-white border border-slate-200 text-slate-400 hover:text-slate-700">
                    <i class="fas fa-times text-sm"></i>
                </button>
            </div>
            <nav class="flex-1 overflow-y-auto py-1.5">
                @foreach($lessons as $index => $item)
                    @php
                        $sDone   = in_array((int)$item->id, $completedLessonIds);
                        $sActive = $lesson && (int)$lesson->id === (int)$item->id;
                        $sLocked = !$isSubscribed;
                    @endphp
                    @if($sLocked)
                        <button type="button"
                                wire:key="sidebar-{{ $item->id }}"
                                onclick="alert('Langganan diperlukan untuk mengakses lesson ini.'); return false;"
                                @click="sidebarOpen = false"
                                class="group w-full text-left px-4 sm:px-5 py-3 flex items-start gap-3
                                       border-l-[3px] border-transparent opacity-50 cursor-not-allowed">
                    @else
                        <button type="button"
                                wire:key="sidebar-{{ $item->id }}"
                                wire:click="selectLesson({{ $item->id }})"
                                @click="sidebarOpen = false"
                                class="group w-full text-left px-4 sm:px-5 py-3 flex items-start gap-3
                                       border-l-[3px] transition-all duration-150 cursor-pointer
                                       {{ $sActive ? 'bg-blue-50 border-blue-500' : 'border-transparent hover:bg-slate-50' }}">
                    @endif
                        <div class="mt-0.5 flex-shrink-0 w-5 h-5 rounded-full flex items-center justify-center border text-[8px]
                                    {{ $sDone   ? 'bg-emerald-100 border-emerald-300 text-emerald-600'
                                     : ($sLocked ? 'bg-slate-100 border-slate-300 text-slate-400'
                                     : ($sActive ? 'bg-blue-100 border-blue-400 text-blue-600'
                                     : 'bg-white border-slate-300 text-slate-300 group-hover:border-blue-300')) }}">
                            @if($sLocked) <i class="fas fa-lock"></i>
                            @elseif($sDone) <i class="fas fa-check"></i>
                            @else <i class="fas fa-play ml-px"></i>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-[9px] font-extrabold tracking-widest uppercase text-slate-400 leading-none mb-0.5">
                                Lesson {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </p>
                            <p class="text-sm font-semibold leading-snug line-clamp-2
                                      {{ $sActive ? 'text-blue-700' : 'text-slate-700 group-hover:text-slate-900' }}">
                                {{ $item->title }}
                            </p>
                        </div>
                    </button>
                @endforeach
            </nav>
        </aside>

        {{-- ── CONTENT SECTION ── --}}
        <section class="min-w-0 overflow-y-auto overflow-x-hidden h-full bg-slate-50 relative">

            @if($showCompletionPage)
                {{-- ── Completion Page ── --}}
                <div class="min-h-full flex flex-col items-center justify-center text-center p-6 sm:p-12">
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-lg
                                p-10 sm:p-14 max-w-2xl w-full relative overflow-hidden">
                        <div class="absolute inset-0 pointer-events-none">
                            <div class="absolute -top-16 -right-16 w-48 h-48 bg-amber-300 rounded-full opacity-10 blur-[60px]"></div>
                            <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-blue-400 rounded-full opacity-10 blur-[60px]"></div>
                        </div>
                        <div class="w-24 h-24 bg-gradient-to-tr from-amber-100 to-amber-50 rounded-full flex items-center justify-center mx-auto mb-7 border border-amber-200/60 relative">
                            <i class="fas fa-trophy text-amber-500 text-4xl"></i>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 mb-4 tracking-tight leading-tight">
                            Selamat! Kursus Selesai <span class="inline-block animate-bounce ml-1">🎉</span>
                        </h2>
                        <p class="text-slate-500 mb-8 leading-relaxed max-w-md mx-auto text-sm sm:text-base">
                            Kamu telah berhasil menyelesaikan
                            <span class="font-bold text-slate-800">{{ $course->title }}</span>.
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                            <a href="{{ route('certificate.download', $course->id) }}"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                                      px-7 py-3.5 bg-amber-500 hover:bg-amber-600 text-white font-bold
                                      rounded-2xl text-sm transition-all shadow-md shadow-amber-200 hover:-translate-y-0.5">
                                <i class="fas fa-download"></i> Unduh Sertifikat
                            </a>
                            <a href="{{ route('dashboard') }}"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                                      px-7 py-3.5 bg-white text-slate-600 border border-slate-200
                                      font-bold rounded-2xl text-sm transition-all hover:bg-slate-50">
                                <i class="fas fa-home text-xs"></i> Dashboard
                            </a>
                        </div>
                    </div>
                </div>

            @elseif($lesson)
                @php
                    $cVals = collect($lessons)->values();
                    $cIdx  = $cVals->search(fn($l) => (int)$l->id === (int)$lesson->id);
                    $cDone = in_array((int)$lesson->id, $completedLessonIds);
                @endphp

                {{-- ── Lesson Content ── --}}
                <div class="w-full min-w-0 px-4 sm:px-6 lg:px-10 pt-6 pb-28"
                     wire:key="lesson-wrap-{{ $lesson->id }}">

                    {{-- Breadcrumb --}}
                    <div class="flex items-center gap-2 mb-5 flex-wrap">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1
                                     bg-indigo-50 border border-indigo-100 rounded-lg
                                     text-[10px] font-extrabold text-indigo-500 uppercase tracking-widest">
                            <i class="fas fa-layer-group text-[9px]"></i>
                            Lesson {{ $cIdx + 1 }} / {{ $lessons->count() }}
                        </span>
                        @if($cDone)
                            <span class="inline-flex items-center gap-1 px-2.5 py-1
                                         bg-emerald-50 border border-emerald-200 rounded-lg
                                         text-[10px] font-extrabold text-emerald-600 uppercase tracking-widest">
                                <i class="fas fa-check-circle text-[9px]"></i> Selesai
                            </span>
                        @endif
                    </div>

                    {{-- Mobile progress --}}
                    <div class="sm:hidden mb-5">
                        <div class="flex justify-between text-xs font-bold mb-1.5">
                            <span class="text-slate-500">Progress Kursus</span>
                            <span class="text-blue-600">{{ $progress }}%</span>
                        </div>
                        <div class="h-1.5 bg-slate-200 rounded-full overflow-hidden">
                            <div class="h-1.5 bg-blue-500 rounded-full transition-all duration-700" style="width:{{ $progress }}%"></div>
                        </div>
                    </div>

                    {{-- Prose content — maximum expansion --}}
                    <article class="prose prose-slate prose-lg max-w-none min-w-0
                                    text-slate-700 cp-prose">
                        {!! $lesson->content !!}
                    </article>
                </div>

            @else
                {{-- ── Empty State ── --}}
                <div class="min-h-full flex flex-col items-center justify-center text-center px-6 py-16">
                    <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center border border-slate-200 mb-4">
                        <i class="fas fa-folder-open text-2xl text-slate-300"></i>
                    </div>
                    <h3 class="text-base font-extrabold text-slate-700 mb-1">Kursus belum memiliki lesson</h3>
                    <p class="text-sm text-slate-400">Lesson akan segera hadir dari instruktur.</p>
                </div>
            @endif

        </section>
    </div>{{-- /grid --}}


    {{-- ══════════════════════════════════════════════════════════════
         STICKY BOTTOM ACTION BAR
         ──────────────────────────────────────────────────────────
         · flex-shrink-0 on the root flex-col → never pushed off screen
         · z-[9999] → above everything including sidebar overlay
         · pointer-events-auto on every button → click always registers
         · Unique wire:key on every interactive element
         ══════════════════════════════════════════════════════════ --}}
    @if($lesson && !$showCompletionPage)
        @php
            $bVals = collect($lessons)->values();
            $bIdx  = $bVals->search(fn($l) => (int)$l->id === (int)$lesson->id);
            $bNext = ($bIdx !== false) ? $bVals->get($bIdx + 1) : null;
            $bDone = in_array((int)$lesson->id, $completedLessonIds);
        @endphp

        <div class="flex-shrink-0 sticky bottom-0 z-[9999]
                    bg-white/95 backdrop-blur-md border-t border-slate-200
                    shadow-[0_-4px_24px_rgba(0,0,0,0.08)]"
             wire:key="action-bar-{{ $lesson->id }}"
             style="pointer-events: auto;">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 py-3 flex items-center gap-3">

                {{-- ✓ Mark Complete / Completed Badge --}}
                <div class="flex-1 min-w-0">
                    @if($bDone)
                        <div wire:key="done-badge-{{ $lesson->id }}"
                             class="w-full flex items-center justify-center gap-2 py-2.5 sm:py-3
                                    bg-emerald-50 text-emerald-600 border border-emerald-200
                                    rounded-xl font-bold text-sm pointer-events-none">
                            <i class="fas fa-check-circle"></i>
                            <span>Lesson Selesai</span>
                        </div>
                    @else
                        <button type="button"
                                wire:key="btn-complete-{{ $lesson->id }}"
                                wire:click="markComplete"
                                wire:loading.attr="disabled"
                                class="w-full flex items-center justify-center gap-2 py-2.5 sm:py-3
                                       bg-blue-600 hover:bg-blue-700 active:bg-blue-800
                                       text-white font-bold rounded-xl text-sm
                                       shadow-sm shadow-blue-200 transition-all
                                       disabled:opacity-60 disabled:cursor-not-allowed
                                       pointer-events-auto cursor-pointer relative">
                            <span wire:loading.remove wire:target="markComplete"
                                  class="flex items-center gap-2">
                                <i class="fas fa-check text-xs"></i> Tandai Selesai
                            </span>
                            <span wire:loading wire:target="markComplete"
                                  class="flex items-center gap-2">
                                <i class="fas fa-circle-notch fa-spin text-xs"></i> Menyimpan...
                            </span>
                        </button>
                    @endif
                </div>

                {{-- → Next Lesson / Dashboard --}}
                @if($bNext)
                    <button type="button"
                            wire:key="btn-next-{{ $bNext->id }}"
                            wire:click="selectLesson({{ $bNext->id }})"
                            wire:loading.attr="disabled"
                            wire:target="selectLesson({{ $bNext->id }})"
                            class="flex-1 min-w-0 flex items-center justify-center gap-2 py-2.5 sm:py-3
                                   bg-white hover:bg-slate-50 active:bg-slate-100
                                   text-slate-700 border border-slate-200
                                   rounded-xl font-bold text-sm shadow-sm transition-all
                                   disabled:opacity-60 disabled:cursor-not-allowed
                                   pointer-events-auto cursor-pointer relative group">
                        <span wire:loading.remove wire:target="selectLesson({{ $bNext->id }})"
                              class="flex items-center gap-2">
                            Lesson Selanjutnya
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </span>
                        <span wire:loading wire:target="selectLesson({{ $bNext->id }})"
                              class="flex items-center gap-2">
                            <i class="fas fa-circle-notch fa-spin text-xs"></i> Memuat...
                        </span>
                    </button>
                @else
                    <a href="{{ route('dashboard') }}"
                       wire:key="btn-dash"
                       class="flex-1 min-w-0 flex items-center justify-center gap-2 py-2.5 sm:py-3
                              bg-white hover:bg-slate-50 text-slate-600 border border-slate-200
                              rounded-xl font-bold text-sm shadow-sm transition-all
                              pointer-events-auto">
                        <i class="fas fa-home text-xs"></i> Dashboard
                    </a>
                @endif

            </div>
        </div>
    @endif


    {{-- ══════════════════════════════════════════════════════════════
         SCOPED PROSE STYLES
         Using .cp-prose scoped class to avoid conflicts.
         ══════════════════════════════════════════════════════════ --}}
    <style>
        /* x-cloak: hide Alpine elements before init to prevent FOUC */
        [x-cloak] { display: none !important; }

        .cp-prose p, .cp-prose li { line-height: 1.85; }
        .cp-prose h1, .cp-prose h2, .cp-prose h3, .cp-prose h4 { line-height: 1.3; }

        .cp-prose p, .cp-prose li, .cp-prose td, .cp-prose th,
        .cp-prose h1, .cp-prose h2, .cp-prose h3, .cp-prose h4 {
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        .cp-prose pre  { overflow-x: auto; white-space: pre; }
        .cp-prose code { word-break: break-all; }
        .cp-prose table { display: block; overflow-x: auto; max-width: 100%; }

        .cp-prose img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .cp-prose div[style*="padding-bottom"] {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            border-radius: 12px;
            margin: 1.5rem 0;
        }
        .cp-prose div[style*="padding-bottom"] iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            border: 0;
            border-radius: 12px;
        }

        .cp-prose iframe {
            max-width: 100%;
            width: 100%;
            aspect-ratio: 16/9;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
            border: 0;
        }
    </style>

</div>
