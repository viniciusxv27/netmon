<div class="main-content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="text-left">
                    <select class="mb-3 form-select text-left" name="networkSelect" id="networkSelect">
                        <option value="0">Filtered by Network</option>
                        @foreach ($networks as $network)
                            <option value="{{ $network->id }}">{{ $network->network_name }}</option>
                        @endforeach
                    </select>

                    <table class="table table-dark table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th>Your connections</th>
                                <th>MB Used</th>
                                <th>Network name</th>
                                <th>Status</th>
                                <th>Generated packages</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($networks as $network)
                                <tr class="table-dark">
                                    <td class="table-dark">{{ $network->connection_name }}</td>
                                    <td class="table-dark">{{ $network->mb_used }}MB</td>
                                    <td class="table-dark">{{ $network->network_name }}</td>
                                    <td class="table-dark">{{ $network->status }}</td>
                                    <td class="table-dark">{{ $connections[$network->id]->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
