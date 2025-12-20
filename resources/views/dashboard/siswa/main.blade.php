<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','E-Point')</title>

    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        ::-webkit-scrollbar{width:8px}
        ::-webkit-scrollbar-thumb{background:#2B1B64;border-radius:4px}
        .sidebar-item::before{
            content:'';position:absolute;left:0;top:0;width:3px;height:100%;
            background:#F2C94C;transform:translateX(-100%);transition:.3s
        }
        .sidebar-item:hover::before,
        .sidebar-item.active::before{transform:translateX(0)}
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- LAYOUT --}}
    @yield('layout')

<script>
function updateTime() {
    const now = new Date();

    const timeString = now.toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit'
    });

    const dateString = now.toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    const timeEl = document.getElementById('current-time');
    const dateEl = document.getElementById('current-date');

    if (timeEl) timeEl.textContent = timeString;
    if (dateEl) dateEl.textContent = dateString;
}

updateTime();
setInterval(updateTime, 1000);
</script>

@stack('scripts')
</body>
</html>
