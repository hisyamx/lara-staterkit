<x-app-layout>
    @section('title')
    Transactions
    @endsection

    <div class="card card-xxl-stretch mb-3">
        <div class="card-header">
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
                <input type="text" data-kt-user-table-filter="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Search Data"
                    id="mySearchInput" />
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-light-primary create-data" data-bs-toggle="modal"
                    data-bs-target="#kt-modal-transaction">
                    Create New
                </button>
                @include('transaction.modal')
            </div>
        </div>
        <div class="card-body pt-6">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    <!--end::Card-->

    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        document.getElementById('mySearchInput').addEventListener('keyup', function () {
            window.LaravelDataTables['master-transaction-table'].search(this.value).draw();
        });
    </script>
    @include('transaction.script');
    @endpush


</x-app-layout>
