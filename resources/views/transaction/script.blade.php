{{-- <script src="{{ asset('assets/plugins/custom/flatpickr/flatpickr.bundle.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $("#order_date").flatpickr({
            minDate: "today",
            maxDate: new Date().fp_incr(1)
            // dateFormat: "d-m-Y",
        });
        $("#order_date_edit").flatpickr({
            minDate: "today",
            maxDate: new Date().fp_incr(1)
            // dateFormat: "d-m-Y",
        });

        const form = document.getElementById('form-data');
        const submitButton = document.getElementById('kt-data-submit');

        $('body').on('click', '.create-data', function() {
            document.getElementById("form-data").reset();
            $('.modal-title').text('Create New Record');

            $('#kt-modal-transaction').modal('show');
            $('#action').val('Create');
            $('#kt-data-submit').val('Create');
        });

        var validator = FormValidation.formValidation(
            form, {
                fields: {
                    'order_date': {
                        validators: {
                            notEmpty: {
                                message: 'Order Date is required'
                            }
                        }
                    },
                    'transaction_name': {
                        validators: {
                            notEmpty: {
                                message: 'Transaction Name is required'
                            }
                        }
                    },
                    'product_id': {
                        validators: {
                            notEmpty: {
                                message: 'Product is required'
                            }
                        }
                    },
                    'amount': {
                        validators: {
                            notEmpty: {
                                message: 'Amount is required'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Submit the create form via AJAX
        $('#form-data').on('submit', function(event) {
            event.preventDefault();

            if (validator) {
                validator.validate().then(function(status) {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;

                    if (status == 'Valid') {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: '/transaction',
                            data: $('#form-data').serialize(),
                            dataType: 'json',
                            success: function(response) {

                                setTimeout(function() {
                                    // Remove loading indication
                                    submitButton.removeAttribute('data-kt-indicator');

                                    // Enable button
                                    submitButton.disabled = false;

                                    // Show popup confirmation
                                    Swal.fire({
                                        text: response.message,
                                        icon: response.icon,
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 2000
                                    });

                                    $('#kt-modal-transaction').modal('hide');
                                    $('#master-transaction-table').DataTable().ajax.reload();
                                }, 2000);
                            },
                            error: function (xhr) {
                                // Handle validation errors and other errors
                                if (xhr.status === 422) {
                                    var errors = xhr.responseJSON.errors;
                                    // Display validation errors to the user
                                    $.each(errors, function (key, value) {
                                        // Display the error messages to the user (e.g., in a Bootstrap modal)
                                        Swal.fire({
                                            text: key + ': ' + value[0],
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-danger",
                                            },
                                        }).then(() => {
                                            // Hide loading indication
                                            submitButton.removeAttribute(
                                                "data-kt-indicator"
                                            );
                                            // Enable button
                                            submitButton.disabled = false;
                                        });
                                    });
                                } else {
                                    // Handle other errors
                                    Swal.fire({
                                        text: xhr.responseText,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-danger",
                                        },
                                    }).then(() => {
                                        // Hide loading indication
                                        submitButton.removeAttribute(
                                            "data-kt-indicator"
                                        );
                                        // Enable button
                                        submitButton.disabled = false;
                                    });
                                }
                            }
                        });
                    } else {
                        // Remove loading indication
                        setTimeout(function() {
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                        }, 2000);
                    }
                });
            }
        });

        $('body').on('click', '.edit-data', function(e) {
            e.preventDefault();
            // Construct the URL with the item ID
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'transaction/' + id + '/edit',
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.result.id);
                    $('#transaction_name_edit').val(data.result.transaction_name);
                    $('#order_number_edit').val(data.result.order_number);
                    $('#order_date_edit').val(data.result.order_date);
                    $('#amount_edit').val(data.result.amount);
                    $('#product_id_edit').val(data.result.product_id).trigger('change');

                    $('.modal-title').text('Edit Record');
                    $('#action').val('Edit');
                    $('#kt-data-edit-submit').val('Update');
                    $('#kt-modal-edit-transaction').modal('show');
                },
                error: function(data) {
                    var errors = data.responseJSON;
                }
            })
        });

        const formEdit = document.getElementById('form-edit-data');
        const editButton = document.getElementById('kt-data-edit-submit');

        var validator_edit = FormValidation.formValidation(
            formEdit, {
                fields: {
                    'order_number': {
                        validators: {
                            notEmpty: {
                                message: 'Order Number is required'
                            }
                        }
                    },
                    'order_date': {
                        validators: {
                            notEmpty: {
                                message: 'Order Date is required'
                            }
                        }
                    },
                    'transaction_name': {
                        validators: {
                            notEmpty: {
                                message: 'Transaction Name is required'
                            }
                        }
                    },
                    'product_id': {
                        validators: {
                            notEmpty: {
                                message: 'Product is required'
                            }
                        }
                    },
                    'amount': {
                        validators: {
                            notEmpty: {
                                message: 'Amount is required'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Submit the create form via AJAX
        $('#form-edit-data').on('submit', function(event) {
            // Get the checkbox value
            var id = $('#id').val();

            event.preventDefault();

            if (validator_edit) {
                validator_edit.validate().then(function(status_edit) {
                    editButton.setAttribute('data-kt-indicator', 'on');
                    editButton.disabled = true;

                    if (status_edit == 'Valid') {

                        // Construct the URL with the item ID
                        var route = 'transaction/' + id;

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'PUT',
                            url: route,
                            data: $('#form-edit-data').serialize(),
                            dataType: 'json',
                            success: function(response) {

                                console.log(response);
                                setTimeout(function() {
                                    // Remove loading indication
                                    editButton.removeAttribute('data-kt-indicator');

                                    // Enable button
                                    editButton.disabled = false;

                                    // Show popup confirmation
                                    Swal.fire({
                                        text: response.message,
                                        icon: response.icon,
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 2000
                                    });

                                    $('#kt-modal-edit-transaction').modal('hide');
                                    $('#master-transaction-table').DataTable().ajax.reload();
                                }, 2000);
                            },
                            error: function (xhr) {
                                // Handle validation errors and other errors
                                if (xhr.status === 422) {
                                    var errors = xhr.responseJSON.errors;
                                    // Display validation errors to the user
                                    $.each(errors, function (key, value) {
                                        // Display the error messages to the user (e.g., in a Bootstrap modal)
                                        Swal.fire({
                                            text: key + ': ' + value[0],
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-danger",
                                            },
                                        }).then(() => {
                                            // Hide loading indication
                                            editButton.removeAttribute(
                                                "data-kt-indicator"
                                            );
                                            // Enable button
                                            editButton.disabled = false;
                                        });
                                    });
                                } else {
                                    // Handle other errors
                                    Swal.fire({
                                        text: xhr.responseText,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-danger",
                                        },
                                    }).then(() => {
                                        // Hide loading indication
                                        editButton.removeAttribute(
                                            "data-kt-indicator"
                                        );
                                        // Enable button
                                        editButton.disabled = false;
                                    });
                                }
                            }
                        });
                    } else {
                        // Remove loading indication
                        setTimeout(function() {
                            editButton.removeAttribute('data-kt-indicator');
                            editButton.disabled = false;
                        }, 2000);
                    }
                });
            }
        });

        // delete function
        $('body').on('click', '.destroy-data', function(e) {
            let id = $(this).data('id');
            let token = $("meta[name='csrf-token']").attr("content");

            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'btn btn-sm btn-primary',
                    cancelButton: 'btn btn-sm btn-secondary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    //fetch to delete data
                    $.ajax({
                        url: 'transaction/' + id,
                        type: "DELETE",
                        cache: false,
                        data: {
                            "_token": token
                        },
                        success: function(response) {
                            //show success message
                            Swal.fire({
                                text: `${response.message}`,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('#master-transaction-table').DataTable().ajax.reload();
                        }
                    });
                }
            })
        });
    });
</script>
