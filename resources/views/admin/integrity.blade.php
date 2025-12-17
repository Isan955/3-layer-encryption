<!DOCTYPE html>
<html>
<head>
    <title>System Integrity Check</title>
</head>
<body>

<h2>System Integrity Check</h2>

@if($status)
    <p style="color:green; font-weight:bold;">
        ✔ LEDGER VALID — DATA AMAN
    </p>
@else
    <p style="color:red; font-weight:bold;">
        ✖ LEDGER TAMPERED — DATA TELAH DIMODIFIKASI
    </p>
@endif

</body>
</html>
