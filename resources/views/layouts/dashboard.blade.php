<!DOCTYPE html>
<html lang="en" dir="ltr">
  
    @include('dashboard.include.head')

  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
            
                @include('dashboard.include.aside')

            <div class="page-wrapper">
                        <!-- Header -->
                @include('dashboard.include.header')

                    <div class="content-wrapper">
                        				 
                             @yield('content')   
                        
                    </div>

                @include('dashboard.include.footer')

            </div>
    </div>

    @include('dashboard.include.script')
  </body>
</html>
