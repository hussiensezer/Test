{{-- Start Alert Danger For Error  --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)

<div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-danger">
    <div class="d-flex align-items-center">
        <div class="fs-3 text-danger"><ion-icon name="close-circle-sharp" role="img" class="md hydrated" aria-label="close circle sharp"></ion-icon>
        </div>
        <div class="ms-3">
            <div class="text-danger">{{$error}}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

    @endforeach
@endif
{{-- End Alert Danger For Error  --}}
