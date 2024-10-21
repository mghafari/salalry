<!DOCTYPE html>
<html lang="fa">


@include('panel.layouts.head')

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/" class="brand-logo">
                <img class="logo-abbr" src="/fish/images/logo-rahojade.png" alt="شرکت حمل و نقل راه و جاده کرمان">
                <img class="logo-compact" src="/fish/images/logo-rahojade.png" alt="شرکت حمل و نقل راه و جاده کرمان">
                <div class="brand-title" >شرکت حمل و نقل راه و جاده کرمان</div>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->






        @include('panel.layouts.header')

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('panel.layouts.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid" style="
    scroll-behavior: auto;
    overflow: auto;
">
                <!-- row -->
                @yield('body')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        @include('panel.layouts.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/panel/vendor/global/global.min.js"></script>


    <script src="/panel/js/custom.min.js"></script>
    <script src="/panel/js/deznav-init.js"></script>
    <script src="/panel/vendor/datatables/js/jquery.dataTables.min.js"></script>


    <script src="/panel/js/plugins-init/datatables.init.js"></script>
    <!-- Apex Chart -->


    <!-- Vectormap -->




    <!-- Svganimation scripts -->






    <script>
	(function($) {
		"use strict"

		var direction =  getUrlParams('dir');
		if(direction != 'rtl')
		{direction = 'ltr'; }

		new dezSettings({
			typography: "roboto",
			version: "light",
			layout: "vertical",
			headerBg: "color_1",
			navheaderBg: "color_3",
			sidebarBg: "color_1",
			sidebarStyle: "full",
			sidebarPosition: "fixed",
			headerPosition: "fixed",
			containerLayout: "wide",
			direction: direction
		});

	})(jQuery);
	</script>

</body>

</html>
