<!DOCTYPE html>
<html lang="en">

	@section('htmlheader')
	    @include('layouts.partials.htmlheader')
	@show

<body class="skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

    @include('layouts.partials.footer')

    @include('layouts.partials.controlsidebar')


	</div><!-- ./wrapper -->
</div>
	@section('scripts')
	    @include('layouts.partials.scripts')
	@show
    @include('layouts.partials.flash')
</body>
</html>