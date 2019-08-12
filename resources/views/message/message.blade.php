@if(session()->has('successful'))
    <div class="alert alert-success fade-in-bck" role="alert">
        <div class="row">
            <div class="col-auto m-0">
                <i class="fa fa-check"></i>
            </div>
            <div class="col text-center font-weight-bold">
                {{session()->get('successful')}}
            </div>
        </div>
    </div>
@endif
@if(session()->has('unsuccessful'))
    <div class="alert alert-danger fade-in-bck" role="alert">
        <div class="row">
            <div class="col-auto m-0">
                <i class="fa fa-bug"></i>
            </div>
            <div class="col text-center  font-weight-bold">
                {{session()->get('unsuccessful')}}
            </div>
        </div>
    </div>
@endif