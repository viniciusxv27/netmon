<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="../js/header.js" defer></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <title> {{ $page }} | Netmon</title>
</head>
<body>
<div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <button onclick="homeTab()" ><i class="ph ph-house"></i> HOME</button>
            <button onclick="alertsTab()" ><i class="ph ph-warning"></i> ALERTS</button>
            <button onclick="newConnectionTab()" ><i class="ph ph-cell-signal-high"></i> NEW CONNECTION</button>
            <button onclick="securityTab()" ><i class="ph ph-lock-key"></i> SECURITY</button>
            <button onclick="managementTab()" ><i class="ph ph-kanban"></i> MANAGEMENT</button>
            <button onclick="helpTab()" ><i class="ph ph-question-mark"></i> HELP</button>
            <button onclick="networkConfigTab()" ><i class="ph ph-cell-tower"></i> NETWORK CONFIGS</button>
            <button onclick="accountConfigTab()" ><i class="ph ph-user-gear"></i> ACCOUNT CONFIGS</button>
            <button onclick="logout()" ><i class="ph ph-sign-out"></i> LOGOUT</button>
        </aside>