<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10" wire:component="crud-widget">

            @livewire('products', ['action' => $action, 'product_id' => $product_id, 'user_id' => $user_id, 'route' => $route])

        </div>
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
