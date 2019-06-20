@if(session()->has('created_successful'))
    <p class="animated fadeInDown text-green text-center">{{session()->get('created_successful')}}</p>
@endif
@if(session()->has('created_unsuccessful'))
    <p class="animated fadeInDown text-red text-center">{{session()->get('created_unsuccessful')}}</p>
@endif