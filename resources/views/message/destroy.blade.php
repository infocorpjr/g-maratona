@if(session()->has('deleted_successful'))
    <div class="alert alert-success fade-in-bck" role="alert">
        <div class="row">
            <div class="col-auto m-0">
                <i class="fa fa-check"></i>
            </div>
            <div class="col text-center font-weight-bold">
                {{session()->get('deleted_successful')}}
            </div>
        </div>
    </div>
@endif
@if(session()->has('deleted_unsuccessful'))
    <div class="alert alert-danger fade-in-bck" role="alert">
        <div class="row">
            <div class="col-auto m-0">
                <i class="fa fa-bug"></i>
            </div>
            <div class="col text-center  font-weight-bold">
                {{session()->get('deleted_unsuccessful')}}
            </div>
        </div>
    </div>
@endif