{{-- you could put the defined value by @section method into same key of @yield--}}
{{-- At first, you should use @extends to extend the template which contains @yield's setting--}}
@extends('common.layout')

{{-- you can use the defined value by @section and @endsection pair method to put the value into same key of @yield --}}
@section('page_content')
    <!-- you can use trans to load language setting, the argument is [language file name . key name] -->
    <!-- you can use dot to connect the output from two functions -->
    <h1>{{ trans('hello_world.HELLO').trans('hello_world.WORLD')}} !!!!!</h1>
    <h2>views/test/hello_world.blade.php</h2>
    <!-- it will just return the argument as text when there is no key in both of local and default language templates -->
    <h3>{{ trans('hello_world.NoKey') }}</h3>
@endsection
