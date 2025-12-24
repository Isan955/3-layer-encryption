<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Integrity Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f5f5f5;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .secure { color: green; }
        .danger { color: red; }
    </style>
</head>
<body>

<div class="card">
    <h1>🔍 System Integrity Check</h1>

    @if($result['status'] === 'SECURE')
        <h2 class="secure">✅ STATUS: SECURE</h2>
        <p>Blockchain integrity is intact.</p>
    @else
        <h2 class="danger">🚨 STATUS: COMPROMISED</h2>
        <p><strong>Corrupted Block ID:</strong> {{ $result['block_id'] ?? '-' }}</p>
        <p>Data manipulation detected in blockchain ledger.</p>
    @endif

    <hr>
    <a href="/system-health">🔄 Scan Integrity Again</a>
</div>

</body>
</html>
