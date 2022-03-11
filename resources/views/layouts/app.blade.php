<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('includes.meta')
    @include('includes.styles')

    <title>Document</title>
</head>
<body>

    @include('includes.navbar')
    
    <div class="container">
        @yield('body')
    </div>
    
    @include('includes.footer')

    @include('includes.scripts')
</body>
</html>