<div class="main-content">
    <div class="container">
        <h4><i class="ph ph-hand-waving"></i> Olá, {{ session()->get('user')->name }}!</h4>
        <div class="card">
            <fieldset>Graphic</fieldset>
            <div class="card-header">
                    <canvas id="myChart"></canvas>
            </div>
            <div class="card-body">
                <hr>
                <fieldset>Network 1 trafic</fieldset>
                <div class="notification">
                    <p>Frame 5: Src MAC: aa:bb:cc:dd:ee:ff, Dst MAC: ff:ee:dd bb:aa, Src IP: 192.168.1.10, Dst IP: 192.168.1.20, Src Port: 4</p>
                    <div>
                        <a href=""><i class="ph ph-eye"></i></a>
                        <a href=""><i class="ph ph-broom"></i></a>
                        <a href=""><i class="ph ph-backspace"></i></a>
                        <a href=""><i class="ph ph-shield-warning"></i></a>
                    </div>
                </div>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        ctx.canvas.height = 80;

        new Chart(ctx, {
            type: 'line',
            data: {
            labels: {!! json_encode(array_map(function($i) {
                return \Carbon\Carbon::now()->addDays($i)->format('d/m');
            }, range(0, 5))) !!},
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                fill: true,
                borderColor: 'rgb(232, 97, 0)',
                borderWidth: 1
            }]
            },
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
