@if (Session::get('success'))
    <div class="alert alert-success" role="alert" data-mdb-color="success" data-mdb-alert-init=""
        data-mdb-alert-initialized="true">
        <i class="fas fa-check-circle me-3"></i> {{ Session::get('success') }}
    </div>
@endif

@if (Session::get('warning'))
    <div class="alert alert-warning" role="alert" data-mdb-color="warning" data-mdb-alert-init=""
        data-mdb-alert-initialized="true">
        <i class="fas fa-exclamation-triangle me-3"></i> {{ Session::get('warning') }}
    </div>
@endif

@if (Session::get('error'))
    <div class="alert alert-error" role="alert" data-mdb-color="error" data-mdb-alert-init=""
        data-mdb-alert-initialized="true">
        <i class="ffas fa-times-circle me-3"></i> {{ Session::get('error') }}
    </div>
@endif

@if (Session::get('info'))
    <div class="alert alert-info" role="alert" data-mdb-color="info" data-mdb-alert-init=""
        data-mdb-alert-initialized="true">
        <i class="fas fa-chevron-circle-right me-3"></i> {{ Session::get('info') }}
    </div>
@endif

@if ($errors->has('*'))
    <div class="alert fade alert-fixed alert-warning show" id="placement-example" data-mdb-width="250px"
        data-mdb-autohide="true" data-mdb-position="top-right" data-mdb-delay="5000" role="alert"
        data-mdb-alert-init="" data-mdb-hidden="true" data-mdb-append-to-body="true" data-mdb-color="warning"
        data-mdb-alert-initialized="true"
        style="display: block; width: 350px; right: 10px; top: 10px; left: unset; transform: unset;">
        <ul>
            @foreach ($errors->all() as $message)
                <li class="text-capitalize">{{ $message }}</li>
            @endforeach
        </ul>
    </div>


@endif
