<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Penyelesaian — IntellectHub</title>
    <style>
        /* ─── Reset ─────────────────────────────────────────── */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* ─── Page: Landscape A4 ─────────────────────────────
           domPDF uses px at 96dpi: 297mm ≈ 1123px, 210mm ≈ 794px
           We define em both ways to be safe.                   */
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            background: #ffffff;
            color: #1e293b;
            width:  297mm;
            height: 210mm;
            position: relative;
            overflow: hidden;
        }

        /* ─── Watermark ──────────────────────────────────────── */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 110pt;
            font-weight: 900;
            color: #1e293b;
            opacity: 0.030;
            letter-spacing: 10px;
            white-space: nowrap;
            font-family: 'DejaVu Sans', Arial, sans-serif;
            z-index: 0;
            pointer-events: none;
        }

        /* ─── Double Border Frame ────────────────────────────── */
        .border-outer {
            position: absolute;
            top: 7mm; left: 7mm; right: 7mm; bottom: 7mm;
            border: 3px solid #d4af37;
        }
        .border-inner {
            position: absolute;
            top: 10.5mm; left: 10.5mm; right: 10.5mm; bottom: 10.5mm;
            border: 1px solid #d4af37;
            opacity: 0.55;
        }

        /* ─── Gold Corner Ornaments ──────────────────────────── */
        .corner {
            position: absolute;
            width: 10mm;
            height: 10mm;
            border-color: #d4af37;
            border-style: solid;
            border-width: 0;
        }
        .corner-tl { top: 13mm;  left:  13mm;  border-top-width: 2.5px; border-left-width:  2.5px; }
        .corner-tr { top: 13mm;  right: 13mm;  border-top-width: 2.5px; border-right-width: 2.5px; }
        .corner-bl { bottom: 13mm; left:  13mm; border-bottom-width: 2.5px; border-left-width: 2.5px; }
        .corner-br { bottom: 13mm; right: 13mm; border-bottom-width: 2.5px; border-right-width: 2.5px; }

        /* ─── Left Accent Bar ────────────────────────────────── */
        .accent-bar {
            position: absolute;
            top: 15mm; bottom: 15mm; left: 15mm;
            width: 1.8mm;
            background: #d4af37;
        }
        .accent-bar-right {
            position: absolute;
            top: 15mm; bottom: 15mm; right: 15mm;
            width: 1.8mm;
            background: #d4af37;
            opacity: 0.35;
        }

        /* ─── Main Content wrapper ───────────────────────────── */
        .content {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            padding: 40mm 26mm 14mm 26mm;
            text-align: center;
            z-index: 1;
        }

        /* ─── Header: Logo + Subtitle ────────────────────────── */
        .logo-row {
            display: block;
            margin-bottom: 1.5mm;
        }
        .logo-name {
            font-size: 22pt;
            font-weight: 900;
            color: #1e293b;
            letter-spacing: 5px;
            text-transform: uppercase;
            line-height: 1;
        }
        .logo-name span {
            color: #d4af37;
        }
        .logo-tagline {
            font-size: 7pt;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #94a3b8;
            margin-top: 1mm;
        }

        /* ─── Gold Divider ───────────────────────────────────── */
        .divider {
            display: block;
            margin: 3.5mm auto;
            width: 60mm;
            height: 1px;
            background: #d4af37;
            opacity: 0.70;
        }
        .divider-thin {
            display: block;
            margin: 0 auto;
            width: 20mm;
            height: 1px;
            background: #d4af37;
            opacity: 0.40;
        }

        /* ─── Certificate Title ──────────────────────────────── */
        .cert-title {
            font-size: 9pt;
            letter-spacing: 7px;
            text-transform: uppercase;
            color: #64748b;
            margin-top: 1mm;
            margin-bottom: 4mm;
        }

        /* ─── Presented To ───────────────────────────────────── */
        .presented-to {
            font-size: 9pt;
            color: #94a3b8;
            letter-spacing: 2px;
            font-style: italic;
            margin-bottom: 2mm;
        }

        /* ─── Recipient Name (Serif fallback via DejaVu Serif) ── */
        .recipient-name {
            font-family: 'DejaVu Serif', Georgia, serif;
            font-size: 34pt;
            font-weight: bold;
            color: #1e293b;
            line-height: 1.1;
            margin-bottom: 2mm;
            /* domPDF does not support text-shadow */
        }

        /* ─── Completion Text ────────────────────────────────── */
        .completion-text {
            font-size: 9.5pt;
            color: #64748b;
            margin-bottom: 1.5mm;
            letter-spacing: 0.3px;
        }

        /* ─── Course Name ────────────────────────────────────── */
        .course-name {
            font-size: 15pt;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 1.5mm;
            letter-spacing: 0.5px;
        }

        /* ─── Date Row ───────────────────────────────────────── */
        .date-text {
            font-size: 9pt;
            color: #94a3b8;
            letter-spacing: 1px;
            margin-bottom: 4mm;
        }

        /* ─── Footer: Signature Table ────────────────────────── /
           Using display:table for domPDF compatibility (no grid) */
        .footer-table {
            display: table;
            width: 160mm;
            margin: 0 auto;
        }
        .footer-col {
            display: table-cell;
            width: 50%;
            text-align: center;
            vertical-align: bottom;
            padding: 0 8mm;
        }
        .sig-line {
            display: block;
            width: 100%;
            height: 1px;
            background: #cbd5e1;
            margin-bottom: 2.5mm;
        }
        .sig-name {
            font-size: 9pt;
            font-weight: bold;
            color: #1e293b;
            letter-spacing: 0.5px;
        }
        .sig-label {
            font-size: 7.5pt;
            color: #94a3b8;
            margin-top: 0.8mm;
            letter-spacing: 0.5px;
        }

        /* ─── Certificate ID ─────────────────────────────────── */
        .cert-id {
            position: absolute;
            bottom: 10mm;
            left: 50%;
            /* domPDF: approximate centering via margin */
            margin-left: -50mm;
            width: 100mm;
            text-align: center;
            font-size: 7pt;
            color: #cbd5e1;
            letter-spacing: 2px;
            z-index: 1;
        }
    </style>
</head>
<body>

    {{-- ── Watermark ── --}}
    <div class="watermark">INTELLECTHUB</div>

    {{-- ── Double Border Frame ── --}}
    <div class="border-outer"></div>
    <div class="border-inner"></div>

    {{-- ── Corner Ornaments ── --}}
    <div class="corner corner-tl"></div>
    <div class="corner corner-tr"></div>
    <div class="corner corner-bl"></div>
    <div class="corner corner-br"></div>

    {{-- ── Side Accent Bars ── --}}
    <div class="accent-bar"></div>
    <div class="accent-bar-right"></div>

    {{-- ── Certificate ID ── --}}
    <div class="cert-id">NO. SERTIFIKAT: {{ $certificateId }}</div>

    {{-- ── Main Content ── --}}
    <div class="content">

        {{-- Logo --}}
        <div class="logo-row">
            <div class="logo-name">Intellect<span>Hub</span></div>
            <div class="logo-tagline">Learning Platform</div>
        </div>

        {{-- Top gold divider --}}
        <div class="divider"></div>

        {{-- Title --}}
        <div class="cert-title">Certificate of Completion</div>

        {{-- Presented to --}}
        <div class="presented-to">dengan bangga diberikan kepada</div>

        {{-- Recipient Name --}}
        <div class="recipient-name">{{ $user->name }}</div>

        {{-- Thin divider below name --}}
        <div class="divider" style="width:45mm; margin-top:2mm; margin-bottom:3.5mm;"></div>

        {{-- Completion text --}}
        <div class="completion-text">yang telah berhasil menyelesaikan seluruh materi dalam kursus</div>

        {{-- Course name --}}
        <div class="course-name">&ldquo;{{ $course->title }}&rdquo;</div>

        {{-- Date --}}
        <div class="date-text">
            Diselesaikan pada &nbsp;{{ $completedAt->translatedFormat('d F Y') }}
        </div>

        {{-- Signature Row --}}
        <div class="footer-table">
            <div class="footer-col">
                <span class="sig-line"></span>
                <div class="sig-name">IntellectHub Platform</div>
                <div class="sig-label">Diterbitkan Oleh</div>
            </div>
            <div class="footer-col">
                <span class="sig-line"></span>
                <div class="sig-name">{{ $completedAt->translatedFormat('d F Y') }}</div>
                <div class="sig-label">Tanggal Penyelesaian</div>
            </div>
        </div>

    </div>{{-- /content --}}

</body>
</html>
