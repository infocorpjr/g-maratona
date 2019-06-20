@if(session()->has('updated_successful'))
    <p class="animated fadeInDown text-green text-center">{{session()->get('updated_successful')}}</p>
@endif
@if(session()->has('updated_unsuccessful'))
    <p class="animated fadeInDown text-red text-center">{{session()->get('updated_unsuccessful')}}</p>
@endif