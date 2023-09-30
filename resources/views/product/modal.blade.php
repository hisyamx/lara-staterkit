<div class="modal fade" id="kt-modal-product" tabindex="-1" aria-hidden="true">
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
                        <label class="required fw-semibold fs-6 mb-2">Product Code</label>
                        <input type="text" name="product_code" class="form-control mb-3 mb-lg-0" disabled
                            placeholder="{{ $product_number }}" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Product</label>
                        <input type="text" name="product_name" class="form-control mb-3 mb-lg-0"
                            placeholder="Product Name" />
                        @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Expired Date</label>
                        <input id="expired_date" name="expired_date" class="form-control mb-3 mb-lg-0"
                            placeholder="Expired Date" />
                        @error('expired_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Price</label>
                        <input type="number" name="price" class="form-control mb-3 mb-lg-0" placeholder="Price" />
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Size</label>
                        <select name="size" data-control="select2" data-placeholder="Size" class="form-select">
                            <option value="">Select</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Extra Large">Extra Large</option>
                        </select>
                        @error('size')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Category</label>
                        <select name="category" data-control="select2" data-placeholder="Category" class="form-select">
                            <option value="">Select</option>
                            <option value="New">New</option>
                            <option value="Old">Old</option>
                        </select>
                        @error('category')
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

<div class="modal fade" id="kt-modal-edit-product" tabindex="-1" aria-hidden="true">
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
                        <label class="required fw-semibold fs-6 mb-2">Product Code</label>
                        <input type="text" id="product_code_edit" name="product_code" class="form-control mb-3 mb-lg-0"
                            placeholder="0003-PRD-2023" />
                        @error('product_code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Product</label>
                        <input type="text" id="product_name_edit" name="product_name" class="form-control mb-3 mb-lg-0"
                            placeholder="Product Name" />
                        @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Expired Date</label>
                        <input id="expired_date_edit" name="expired_date" class="form-control mb-3 mb-lg-0"
                            placeholder="Expired Date" />
                        @error('expired_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Price</label>
                        <input type="number" id="price_edit" name="price" class="form-control mb-3 mb-lg-0"
                            placeholder="Price" />
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Size</label>
                        <select id="size_edit" name="size" data-control="select2" data-placeholder="Size"
                            class="form-select">
                            <option value="">Select</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Extra Large">Extra Large</option>
                        </select>
                        @error('size')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Category</label>
                        <select id="category_edit" name="category" data-control="select2" data-placeholder="Category"
                            class="form-select">
                            <option value="">Select</option>
                            <option value="New">New</option>
                            <option value="Old">Old</option>
                        </select>
                        @error('category')
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
