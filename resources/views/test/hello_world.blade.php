<html>
    <body>
        <!-- you can use trans to load language setting, the argument is [language file name . key name] -->
        <!-- you can use dot to connect the output from two functions -->
        <h1>{{ trans('hello_world.HELLO').trans('hello_world.WORLD')}} !!!!!</h1>
        <h2>views/test/hello_world.blade.php</h2>
        <!-- it will just return the argument as text when there is no key in both of local and default language templates -->
        <h3>{{ trans('hello_world.NoKey') }}</h3>
    </body>
<html>
