<x-app-layout>
    @section('title')
    Dashboard
    @endsection
    <div class="row gx-5 gx-xl-10">
        <div class="col-xl-6 mb-5 mb-xl-10">
            <!--begin::List widget 12-->
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Total
                            Products</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">{{ $products_total }}
                            visitors</span>
                    </h3>
                    <div class="card-toolbar">
                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                            data-kt-menu-overflow="true">
                            <i class="ki-outline ki-dots-square fs-1 text-gray-400 me-n1"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                                    Quick
                                    Actions</div>
                            </div>
                            <div class="separator mb-3 opacity-75"></div>
                            <div class="menu-item px-3 mb-3">
                                <a href="{{ route('product.index') }}" class="menu-link px-3">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end">
                    <div class="w-100">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="ki-outline ki-rocket fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="d-flex align-items-center flex-stack flex-wrap d-grid gap-1 flex-row-fluid">
                                <div class="me-5">
                                    <a href="{{ route('product.index') }}" class="text-gray-800 fw-bold text-hover-primary fs-6">Direct
                                        Source</a>
                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Direct
                                        link clicks</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="text-gray-800 fw-bold fs-4 me-3">{{ $products_total }}</span>
                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::List widget 12-->
        </div>
        <div class="col-xl-6 mb-5 mb-xl-10">
            <!--begin::List widget 12-->
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Total Transaction</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">{{ $transactions_total }}
                            transactions</span>
                    </h3>
                    <div class="card-toolbar">
                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                            data-kt-menu-overflow="true">
                            <i class="ki-outline ki-dots-square fs-1 text-gray-400 me-n1"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                                    Quick
                                    Actions</div>
                            </div>
                            <div class="separator mb-3 opacity-75"></div>
                            <div class="menu-item px-3 mb-3">
                                <a href="{{ route('transaction.index') }}" class="menu-link px-3">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end">
                    <div class="w-100">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-30px me-5">
                                <span class="symbol-label">
                                    <i class="ki-outline ki-rocket fs-3 text-gray-600"></i>
                                </span>
                            </div>
                            <div class="d-flex align-items-center flex-stack flex-wrap d-grid gap-1 flex-row-fluid">
                                <div class="me-5">
                                    <a href="{{ route('transaction.index') }}" class="text-gray-800 fw-bold text-hover-primary fs-6">Direct
                                        Source</a>
                                    <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Direct
                                        link clicks</span>
                                </div>
                                <div class="d-flex align-items-center">

                                    <span class="text-gray-800 fw-bold fs-4 me-3">{{ $transactions_total }}</span>

                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::List widget 12-->
        </div>
    </div>
</x-app-layout>
