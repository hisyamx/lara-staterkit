<div class="modal fade" id="kt-modal-transaction" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h2 class="fw-bold modal-title"></h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </div>
            </div>
            <form action="#" id="form-data">
                @csrf
                {{-- @method('POST') --}}
                <div class="modal-body">
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Transaction Number</label>
                        <input type="text" name="order_number" class="form-control mb-3 mb-lg-0" disabled
                            placeholder="{{ $transaction_number }}" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Transaction Name</label>
                        <input type="text" id="transaction_name" name="transaction_name"
                            class="form-control mb-3 mb-lg-0" placeholder="Transaction Name" />
                        @error('transaction_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Product</label>
                        <select name="product_id" data-control="select2" data-placeholder="Product" class="form-select">
                            <option value="">{{ __('Select') }}</option>
                            @foreach ($product as $value)
                            <option value="{{ $value->id }}" {{ $value->id === '' ? 'selected' : '' }}>
                                {{ $value->product_name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Order Date</label>
                        <input id="order_date" name="order_date" class="form-control mb-3 mb-lg-0"
                            placeholder="Order Date" />
                        @error('order_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Amount</label>
                        <input type="number" name="amount" class="form-control mb-3 mb-lg-0" placeholder="Amount" />
                        @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end">
                    <button type="reset" class="btn btn-sm btn-light me-3" data-bs-dismiss="modal"
                        aria-label="Close">{{__('Cancel') }}</button>
                    <button type="submit" class="btn btn-sm btn-primary" data-kt-users-modal-action="submit"
                        id="kt-data-submit">
                        <span class="indicator-label">{{ __('Save Changes') }}</span>
                        <span class="indicator-progress">
                            Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="kt-modal-edit-transaction" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h2 class="fw-bold modal-title"></h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </div>
            </div>
            <!--begin::Form-->
            <form action="#" id="form-edit-data">
                @csrf
                {{-- @method('POST') --}}
                <div class="modal-body">
                    <div class="fv-row mb-7">
                        <input type="hidden" id="id" name="id" class="form-control">
                        <label class="required fw-semibold fs-6 mb-2">Order Number</label>
                        <input type="text" id="order_number_edit" name="order_number"
                            class="form-control mb-3 mb-lg-0" />
                        @error('order_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Product</label>
                        <select id="product_id_edit" name="product_id" data-control="select2" data-placeholder="Product"
                            class="form-select">
                            <option value="">Product</option>
                            @foreach ($product as $value)
                            <option value="{{ $value->id }}" {{ $value->id === '' ? 'selected' : '' }}>
                                {{ $value->product_name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Transaction Name</label>
                        <input type="text" id="transaction_name_edit" name="transaction_name"
                            class="form-control mb-3 mb-lg-0" placeholder="Transaction Name" />
                        @error('transaction_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Order Date</label>
                        <input id="order_date_edit" name="order_date" class="form-control mb-3 mb-lg-0"
                            placeholder="Order Date" />
                        @error('order_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Amount</label>
                        <input type="number" id="amount_edit" name="amount" class="form-control mb-3 mb-lg-0"
                            placeholder="Amount" />
                        @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-sm btn-light me-3" data-bs-dismiss="modal"
                        aria-label="Close">{{__('Cancel') }}</button>
                    <button type="submit" class="btn btn-sm btn-primary" data-kt-users-modal-action="submit"
                        id="kt-data-edit-submit">
                        <span class="indicator-label">{{ __('Save Changes') }}</span>
                        <span class="indicator-progress">
                            Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
