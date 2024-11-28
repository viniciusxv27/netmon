<div class="main-content">
    <div>
        <div class=" card">
            <div class="card-header">
                <h4 class="card-title"><i class="ph ph-user-gear"></i> Your account configs</h4>
                <hr>
            </div>
            <div class="card-body">
                <form action="{{ route('accountUpdate') }}" id="configAccountForm" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ auth()->user()->email }}" required>
                    </div>

                    <div class="mb-3 container text-center">
                        <button class="btn btn-primary mb-2" id="submitButton" type="submit"><i class="ph ph-user-check"></i> Update account</button>
                        <a href="{{ route('accountDelete') }}" class="btn btn-danger"><i class="ph ph-user-check"></i> Delete account</a>
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
