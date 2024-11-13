<div class="main-content">
    <div>
        <div class=" card">
            <div class="card-header">
                <h4 class="card-title"><i class="ph ph-wifi-high"></i> Connect to a new network</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('newConnection') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="connectionkName" class="form-label">Connection name:</label>
                        <input class="form-control" type="text" name="connectionkName" id="connectionkName" required>
                    </div>
                    <div class="mb-3">
                        <label for="networkName" class="form-label">Network name:</label>
                        <input class="form-control" type="text" name="networkName" id="networkName" required>
                    </div>
                    <div class="mb-3">
                        <label for="networkInterfaceName" class="form-label">Network interface name:</label>
                        <input class="form-control" type="text" name="networkInterfaceName" id="networkInterfaceName" required>
                    </div>

                    <div class="mb-3 container text-center">
                        <input class="btn btn-primary" type="submit" value="Generate and download">
                    </div>

                    <div class="mb-3 container text-center">
                        <a href="manual.pdf">Download the manual of how to install</a>
                    </div>
                </form>
        </div>
    </div>
</div>