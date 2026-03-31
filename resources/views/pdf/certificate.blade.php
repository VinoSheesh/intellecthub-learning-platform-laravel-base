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
            background: #ffffff;
            color: #1e293b;
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
            margin-top: 8mm;
        }
        .logo-text {
            font-size: 26pt;
            font-weight: bold;
            color: #1e40af;
            letter-spacing: 3px;
        }
        .cert-title {
            font-size: 13pt;
            letter-spacing: 8px;
            text-transform: uppercase;
            color: #475569;
            margin-bottom: 12mm;
        }
        .is-presented {
            font-size: 11pt;
            color: #64748b;
            margin-bottom: 5mm;
            font-style: italic;
        }
        .recipient-name {
            font-size: 36pt;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 6mm;
            border-bottom: 2px solid #93c5fd;
            padding-bottom: 3mm;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .description {
            font-size: 11pt;
            color: #475569;
            max-width: 220mm;
            line-height: 1.6;
            margin-bottom: 5mm;
            margin-left: auto;
            margin-right: auto;
        }
        .course-name {
            font-size: 18pt;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 10mm;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            width: 85%;
            margin-top: 8mm;
            margin-left: auto;
            margin-right: auto;
        }
        .footer-item {
            text-align: center;
            width: 40%;
        }
        .footer-line {
            border-top: 1px solid #cbd5e1;
            padding-top: 2mm;
            font-size: 10pt;
            font-weight: bold;
            color: #334155;
        }
        .footer-label {
            font-size: 8pt;
            color: #64748b;
            margin-top: 1.5mm;
        }
        .seal {
            position: absolute;
            bottom: 22mm;
            right: 22mm;
            width: 28mm;
            height: 28mm;
            border: 3px solid #1e40af;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1e40af;
            font-size: 7.5pt;
            font-weight: bold;
            text-align: center;
            line-height: 1.4;
            letter-spacing: 1px;
            background-color: #eff6ff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
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
