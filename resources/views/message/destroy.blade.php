@if(session()->has('deleted_successful'))
    <p class="animated fadeInDown text-green text-center">{{session()->get('deleted_successful')}}</p>
@endif
@if(session()->has('deleted_unsuccessful'))
    <p class="animated fadeInDown text-red text-center">{{session()->get('deleted_unsuccessful')}}</p>
@endif