<!DOCTYPE html>
<html lang="en-US" class="no-js no-svg">

<head>
    @include('includes.head')
</head>

<body
    class="home page-template-default page page-id-1906 wp-embed-responsive group-blog twentyseventeen-front-page has-header-image page-two-column colors-light">
    <!-- navbar -->
    @include('includes.navbar')
    
    <!-- mobile navbar -->
    @include('includes.mobilenavbar')

    <!-- content  -->
    @yield('content')
    
    @include('includes.footer')
    
</body>

</html>
