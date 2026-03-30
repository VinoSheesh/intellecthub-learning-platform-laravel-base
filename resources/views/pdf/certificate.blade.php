<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Penyelesaian</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: #fff;
            color: #1a1a2e;
            width: 297mm;
            height: 210mm;
            position: relative;
            overflow: hidden;
        }
        .border-outer {
            position: absolute;
            inset: 10mm;
            border: 4px solid #1e40af;
            border-radius: 4px;
        }
        .border-inner {
            position: absolute;
            inset: 13mm;
            border: 1px solid #93c5fd;
            border-radius: 2px;
        }
        .content {
            position: absolute;
            inset: 16mm;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10mm;
        }
        .logo-area {
            margin-bottom: 6mm;
        }
        .logo-text {
            font-size: 22pt;
            font-weight: bold;
            color: #1e40af;
            letter-spacing: 2px;
        }
        .cert-title {
            font-size: 11pt;
            letter-spacing: 6px;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 8mm;
        }
        .is-presented {
            font-size: 9pt;
            color: #6b7280;
            margin-bottom: 4mm;
        }
        .recipient-name {
            font-size: 30pt;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 5mm;
            border-bottom: 2px solid #93c5fd;
            padding-bottom: 3mm;
        }
        .description {
            font-size: 9pt;
            color: #6b7280;
            max-width: 200mm;
            line-height: 1.5;
            margin-bottom: 4mm;
        }
        .course-name {
            font-size: 14pt;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 8mm;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 6mm;
        }
        .footer-item {
            text-align: center;
            width: 45%;
        }
        .footer-line {
            border-top: 1px solid #cbd5e1;
            padding-top: 2mm;
            font-size: 8pt;
            color: #6b7280;
        }
        .footer-label {
            font-size: 7pt;
            color: #94a3b8;
            margin-top: 1mm;
        }
        .seal {
            position: absolute;
            bottom: 22mm;
            right: 22mm;
            width: 25mm;
            height: 25mm;
            border: 3px solid #1e40af;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1e40af;
            font-size: 7pt;
            font-weight: bold;
            text-align: center;
            line-height: 1.3;
        }
        .corner-ornament {
            position: absolute;
            width: 15mm;
            height: 15mm;
            border-color: #bfdbfe;
            border-style: solid;
            border-width: 0;
        }
        .top-left { top: 14mm; left: 14mm; border-top-width: 3px; border-left-width: 3px; }
        .top-right { top: 14mm; right: 14mm; border-top-width: 3px; border-right-width: 3px; }
        .bottom-left { bottom: 14mm; left: 14mm; border-bottom-width: 3px; border-left-width: 3px; }
        .bottom-right { bottom: 14mm; right: 14mm; border-bottom-width: 3px; border-right-width: 3px; }
    </style>
</head>
<body>
    <div class="border-outer"></div>
    <div class="border-inner"></div>
    <div class="corner-ornament top-left"></div>
    <div class="corner-ornament top-right"></div>
    <div class="corner-ornament bottom-left"></div>
    <div class="corner-ornament bottom-right"></div>

    <div class="content">
        <div class="logo-area">
            <div class="logo-text">IntellectHub</div>
        </div>
        <div class="cert-title">Certificate of Completion</div>
        <div class="is-presented">Dengan bangga diberikan kepada</div>
        <div class="recipient-name">{{ $user->name }}</div>
        <div class="description">
            yang telah berhasil menyelesaikan seluruh materi kursus
        </div>
        <div class="course-name">{{ $course->title }}</div>
        <div class="description">
            pada tanggal {{ $completedAt->translatedFormat('d F Y') }}
        </div>

        <div class="footer">
            <div class="footer-item">
                <div class="footer-line">IntellectHub Platform</div>
                <div class="footer-label">Diterbitkan oleh</div>
            </div>
            <div class="footer-item">
                <div class="footer-line">{{ $completedAt->translatedFormat('d F Y') }}</div>
                <div class="footer-label">Tanggal Penyelesaian</div>
            </div>
        </div>
    </div>

    <div class="seal">
        <span>RESMI<br>TERVERIFIKASI</span>
    </div>
</body>
</html>
