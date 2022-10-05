<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
	<!--begin::Toolbar container-->
	<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
		{{-- <!==layout-partial:layout/partials/_page-title.html> --}}
		@include('dashboard.layout.partials._page-title')
	<!--begin::Actions-->
	<div class="d-flex align-items-center gap-2 gap-lg-3">
		<!--begin::Primary button-->
		<a href="{{route('products.index')}}" class="btn btn-sm fw-bold btn-primary" >Return Home</a>
		<!--end::Primary button-->
	</div>
	<!--end::Actions-->
    </div>
	<!--end::Toolbar container-->
</div>
<!--end::Toolbar-->
