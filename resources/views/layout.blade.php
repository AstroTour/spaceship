<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstroTour Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>
</head>


<body class ="table-responsive">

<div class="navbar-container">
    <span class="navbar-brand">AstroTour</span>
    <nav class="navbar">
        <a href="{{ url('/admin') }}">Felhasználók</a>
        <a href="{{ url('/admin/schedules-list') }}">Menetrendek</a>
        <a href="{{ url('/admin/reservations') }}">Foglalások</a>
        <a href="{{ url('/admin/spaceships-management') }}">Űrhajók</a>
    </nav>
</div>


<div class="container mt-5">
    @yield('content')
</div>

</body>
</html>
