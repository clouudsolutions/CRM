<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
        @include('inc.head')
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url()" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">

        <!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->

		<!--begin::Main-->
		<div id="app" class="d-flex flex-column flex-root">

			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">

				<!--begin::Aside-->
                @include('inc.sidebar')
				<!--end::Aside-->

				<!--begin::Wrapper-->
                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                        <!--begin::Content-->
                            @yield('content')
                        <!--end::Content-->

                        <!--begin::Footer-->
                        @include('inc.footer')
                        <!--end::Footer-->

                    </div>
                <!--end::Wrapper-->

			</div>
			<!--end::Page-->

		</div>
		<!--end::Main-->

		<!--begin::Javascript-->
        @include('inc.javascript_src')
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
