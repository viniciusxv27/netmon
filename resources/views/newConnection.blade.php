<div class="main-content">
    <div>
        <div class=" card">
            <div class="card-header">
                <h4 class="card-title"><i class="ph ph-wifi-high"></i> Connect to a new network</h4>
                <hr>
            </div>
            <div class="card-body">
                <form action="{{ route('createConnection') }}" id="newConnectionForm" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="connection_name" class="form-label">Connection name:</label>
                        <input class="form-control" type="text" name="connection_name" id="connection_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="network_name" class="form-label">Network name:</label>
                        <input class="form-control" type="text" name="network_name" id="network_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="interface" class="form-label">Network interface name:</label>
                        <input class="form-control" type="text" name="interface" id="interface" required>
                    </div>

                    <div class="mb-3 container text-center">
                        <button class="btn btn-primary" id="submitButton" type="submit"><i class="ph ph-download-simple"></i> Generate and download</button>
                    </div>

                    <div class="mb-3 container text-center">
                        <a href="manual.pdf">Download the manual of how to install</a>
                    </div>
                </form>
                @if (session()->has('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="ph ph-check m-2"></i>
                        <div class="m-2">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
