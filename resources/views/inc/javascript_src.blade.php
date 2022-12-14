<!--begin::Javascript-->
<script>var hostUrl = "{{ asset('frontend/assets/') }}";</script>

<!--begin::Vendors Javascript-->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<!--end::Vendors Javascript-->

<script src="{{ asset('frontend/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('frontend/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/authentication/sign-up/general.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/authentication/sign-in/general.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<script src="{{ asset('frontend/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script src="{{ asset('frontend/assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom/apps/user-management/users/list/add.js') }}"></script>

<!--end::Custom Javascript-->

{{-- import vue js --}}
@vite('resources/js/app.js')

<!--end::Javascript-->
