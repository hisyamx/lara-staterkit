<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3">
                Sign In
            </h1>
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <input type="text" placeholder="Email" id="email" name="email" autocomplete="off"
                class="form-control bg-transparent" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <div class="position-relative mb-3">
                <input class="form-control bg-transparent" type="password" placeholder="Password" id="password"
                    name="password" autocomplete="off">
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                    data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-3"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span><span class="path4"></span></i>
                    <i class="ki-duotone ki-eye d-none fs-3"><span class="path1"></span><span class="path2"></span><span
                            class="path3"></span></i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!--end::Input group--->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_submit" class="btn btn-primary">
                Sign In
            </button>
        </div>
        <!--end::Submit button-->

    </form>
    <!--end::Form-->
</x-guest-layout>
