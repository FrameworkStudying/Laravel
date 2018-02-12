@include('common.header')
{{-- you can use @include function for including an existing blade template  --}}
<!-- the above method for comment will not display in output HTML file -->
<h5>Layout is Loaded</h5>

{{-- the function will outputs the value of page_content key in @section --}}
@yield('page_content')

@include('common.footer')
