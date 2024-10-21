<!DOCTYPE html>
<html lang="en">


@include('dashboard.layouts.head')

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
                <img class="logo-abbr" src="" alt="">
                <img class="logo-compact" src="" alt="">
                <div class="brand-title" >سیستم فروش رادین خودرو</div>
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






        @include('dashboard.layouts.header')

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('dashboard.layouts.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
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
        @include('dashboard.layouts.footer')
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
    <script src="/assets/vendor/global/global.min.js"></script>
    <script src="/assets/vendor/jquery/jquery-3.6.1.min.js"></script>

    <script src="/assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/deznav-init.js"></script>
    <!-- Apex Chart -->
    <script src="/assets/vendor/apexchart/apexchart.js"></script>

    <!-- Vectormap -->
    <!-- Chart piety plugin files -->
    <script src="/assets/vendor/peity/jquery.peity.min.js"></script>

    <!-- Chartist -->
    <script src="/assets/vendor/chartist/js/chartist.min.js"></script>

    <!-- Dashboard 1 -->
    <script src="/assets/js/dashboard/dashboard-1.js"></script>
    <!-- Svganimation scripts -->
    <script src="/assets/vendor/svganimation/vivus.min.js"></script>
    <script src="/assets/vendor/svganimation/svg.animation.js"></script>

    <!-- Datatable -->
    <script src="/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>

    <script src="/assets/js/plugins-init/datatables.init.js"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="/assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/assets/js/plugins-init/chartjs-init.js"></script>


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
