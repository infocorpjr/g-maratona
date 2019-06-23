@if(session()->has('updated_successful'))
    <div class="alert alert-success fade-in-bck" role="alert">
        <div class="row">
            <div class="col-auto m-0">
                <i class="fa fa-check"></i>
            </div>
            <div class="col text-center font-weight-bold">
                {{session()->get('updated_successful')}}
            </div>
        </div>
    </div>
@endif
@if(session()->has('updated_unsuccessful'))
    <div class="alert alert-danger fade-in-bck" role="alert">
        <div class="row">
            <div class="col-auto m-0">
                <i class="fa fa-bug"></i>
            </div>
            <div class="col text-center  font-weight-bold">
                {{session()->get('updated_unsuccessful')}}
            </div>
        </div>
    </div>
@endif