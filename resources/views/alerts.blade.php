<div class="main-content">
    <div class="container">
        <div class="card">
            <fieldset>Alerts</fieldset>
            <div class="card-header">
                <div>
                    <h3><i class="ph ph-shield-warning"></i> You have {{ $count_danger }} dangers packets to investigate
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <hr>
                <fieldset>Criticals Traffics of Default Network</fieldset>
                @foreach ($connection as $packet)
                    @if ($packet->is_danger == 1)
                        <div class="notification notification_danger">
                            <p>Protocol {{ $packet->protocol }}: Src MAC: {{ $packet->mac_origin }}, Dst MAC:
                                {{ $packet->mac_destination }}, Src IP: {{ $packet->ip_origin }}, Dst IP:
                                {{ $packet->ip_destination }}, Src Port: {{ $packet->origin_port }}</p>
                            <div>
                                <a href="viewPacket/{{ $packet->id }}"><i class="ph ph-tree-structure"></i></a>
                                <a href="deletePacket/{{ $packet->id }}"><i class="ph ph-backspace"></i></a>
                                <a href="dangerPacket/{{ $packet->id }}"><i class="ph ph-shield-warning"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
        </div>
    </div>
</div>
