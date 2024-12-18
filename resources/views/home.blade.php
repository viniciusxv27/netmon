<div class="main-content">
    <div class="container">
        <h4><i class="ph ph-hand-waving"></i> Hello, {{ session()->get('user')->name }}!</h4>
        <div class="card">
            <fieldset>Graphic</fieldset>
            <div class="card-header">
                <canvas id="myChart"></canvas>
            </div>
            <div class="card-body">
                <hr>
                <fieldset>Default network trafic</fieldset>

                @if (!$connection)
                    <p>No packets found</p>
                @endif

                @foreach ($connection as $packet)
                    @if ($packet->is_danger == 1)
                        <div class="notification notification_danger">
                        @else
                            <div class="notification">
                    @endif
                    <p>Protocol {{ $packet->protocol }}: Src MAC: {{ $packet->mac_origin }}, Dst MAC:
                        {{ $packet->mac_destination }}, Src IP: {{ $packet->ip_origin }}, Dst IP:
                        {{ $packet->ip_destination }}, Src Port: {{ $packet->origin_port }}</p>
                    <div>
                        <a href="viewPacket/{{ $packet->id }}"><i class="ph ph-tree-structure"></i></a>
                        <a href="deletePacket/{{ $packet->id }}"><i class="ph ph-backspace"></i></a>
                        <a href="dangerPacket/{{ $packet->id }}"><i class="ph ph-shield-warning"></i></a>
                    </div>
            </div>
            @endforeach

        </div>
    </div>
    <script>
        const packets = []
        const dangerPacket = []

        let days = {};
        for (let i = 6; i >= 0; i--) {
            days[new Date(new Date().setDate(new Date().getDate() - i)).toLocaleDateString('pt-BR')] = 0;
        }
        Object.keys(days).forEach(key => {
            const formattedDate = new Date(key.split('/').reverse().join('-')).toISOString().split('T')[0];
            days[formattedDate] = days[key];
            delete days[key];
        });
        
        let daysDanger = {};
        for (let i = 6; i >= 0; i--) {
            daysDanger[new Date(new Date().setDate(new Date().getDate() - i)).toLocaleDateString('pt-BR')] = 0;
        }
        Object.keys(daysDanger).forEach(key => {
            const formattedDate = new Date(key.split('/').reverse().join('-')).toISOString().split('T')[0];
            daysDanger[formattedDate] = daysDanger[key];
            delete daysDanger[key];
        });


        fetch('/getPackets')
            .then(response => response.json())
            .then(data => {

                var dados = data.packets_per_day;
                Object.entries(dados).forEach(([date, values]) => {
                    days[date] = values.total;
                    daysDanger[date] = values.danger;
                });

                const ctx = document.getElementById('myChart').getContext('2d');
                ctx.canvas.height = 80;

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        datasets: [{
                                label: 'Number of packets per day',
                                data: days,
                                fill: true,
                                borderColor: 'rgb(232, 97, 0)',
                                borderWidth: 1
                            },
                            {
                                label: 'Number of danger packets per day',
                                data: daysDanger,
                                fill: false,
                                borderColor: 'rgb(255, 0, 0)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
</div>
