<div class="main-content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="text-left">
                    <select class="mb-3 form-select text-left" name="networkSelect" id="networkSelect">
                        <option value="0">Filter by network name</option>
                        @foreach ($networks as $network)
                            <option value="{{ $network->id }}">{{ $network->network_name }}</option>
                        @endforeach
                    </select>

                    <table class="table table-dark table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th>Your connections</th>
                                <th>MB used</th>
                                <th>Network name</th>
                                <th>Status</th>
                                <th>Generated packages</th>
                                <th>Set default</th>
                            </tr>
                        </thead>
                        <tbody id="networkTable">
                            @foreach ($networks as $network)
                                <tr class="table-dark">
                                    <td class="table-dark">{{ $network->connection_name }}</td>
                                    <td class="table-dark">{{ $network->mb_used }}MB</td>
                                    <td class="table-dark">{{ $network->network_name }}</td>
                                    <td class="table-dark">{{ $network->status }}</td>
                                    <td class="table-dark">{{ $connections[$network->id]->count() }}</td>
                                    <td class="table-dark">
                                        @if ($network->default == 1)
                                            <button class="btn btn-primary btn-sm" disabled>Set default</button>
                                        @else
                                            <button class="btn btn-primary btn-sm"
                                                onclick="setDefault({{ $network->id }})">Set default</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/management.js') }}"></script>
