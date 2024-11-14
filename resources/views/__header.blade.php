<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Dashboard | Netmon</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</head>

<body>

    <button class="menu-toggle" onclick="toggleMenu()">☰</button>

    <div class="sidebar" id="sidebar">
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <img width="80%" src="{{ asset('images/logo-resize.png') }}" alt="">
        </div>
        <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"><i class="ph ph-house"></i> Home</a></li>
            <div>
                <hr>
                <span>Network</span>
                <li><a href="{{ route('alerts') }}" class="{{ request()->routeIs('alerts') ? 'active' : '' }}"><i class="ph ph-warning"></i> Alerts</a></li>
                <li><a href="{{ route('newConnection') }}" class="{{ request()->routeIs('newConnection') ? 'active' : '' }}"><i class="ph ph-wifi-high"></i> New Connection</a></li>
                <li><a href="{{ route('networkConfig') }}" class="{{ request()->routeIs('networkConfig') ? 'active' : '' }}"><i class="ph ph-faders"></i> Network Configs</a></li>
                <li><a href="{{ route('security') }}" class="{{ request()->routeIs('security') ? 'active' : '' }}"><i class="ph ph-fingerprint"></i> Security</a></li>
                <li><a href="{{ route('management') }}" class="{{ request()->routeIs('management') ? 'active' : '' }}"><i class="ph ph-kanban"></i> Management</a></li>
            </div>
            <div>
                <hr>
                <span>Help</span>
                <li><a href="{{ route('accountConfig') }}" class="{{ request()->routeIs('accountConfig') ? 'active' : '' }}"><i class="ph ph-user-gear"></i> Account Configs</a></li>
                <li><a href="{{ route('help') }}" class="{{ request()->routeIs('help') ? 'active' : '' }}"><i class="ph ph-question"></i> Help</a></li>
                <hr>
            </div>
            <li><a href="{{ route('logout') }}"><i class="ph ph-sign-out"></i> Log out</a></li>
        </ul>
        <hr>
        <span style="padding: 20px">
            &copy; Netmon
        </span>
    </div>