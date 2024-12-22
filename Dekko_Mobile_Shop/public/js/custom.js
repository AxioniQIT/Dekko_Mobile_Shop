$(document).on(
    "click",
    'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]',
    function () {
        var title = $(this).data("title");
        var size = $(this).attr("data-size") || "md";
        var url = $(this).data("url");

        // Show modal and set properties
        var $modal = $("#commanModel");
        $modal.find(".modal-title").html(title);
        $modal
            .find(".modal-dialog")
            .attr("class", `modal-dialog modal-${size}`);
        $modal.attr("aria-hidden", "false").css("display", "block");

        // Load modal content
        $.ajax({
            url: url,
            success: function (data) {
                $modal.find(".modal-body").html(data);
                $modal.modal("show");

                // Focus handling
                $modal.find("button, input, select, textarea").first().focus();

                comman_function();
            },
            error: function (data) {
                console.error(data.responseJSON);
            },
        });
    }
);

// Reset aria-hidden and modal state when hidden
$("#commanModel").on("hidden.bs.modal", function () {
    $(this).attr("aria-hidden", "true").css("display", "none");
});

$(document).on(
    "click",
    'a[data-ajax-popup-over="true"], button[data-ajax-popup-over="true"], div[data-ajax-popup-over="true"]',
    function () {
        var title = $(this).data("title");
        var size =
            $(this).attr("data-size") == "" ? "md" : $(this).attr("data-size");
        var url = $(this).data("url");
        $("#commanModelOver .modal-title").html(title);
        $("#commanModelOver .modal-dialog")
            .removeClass("modal-lg modal-md modal-sm")
            .addClass("modal-" + size);
        $.ajax({
            url: url,
            success: function (data) {
                $("#commanModelOver .modal-body").html(data);
                $("#commanModelOver").modal("show");

                $("#theme_id").trigger("change");
                $(
                    "#enable_product_variant, #variant_tag, #maincategory, #category_id"
                ).trigger("change");
                $(".code").trigger("click");

                comman_function();
            },
            error: function (data) {
                console.error(data.responseJSON);
            },
        });
    }
);

$(document).on("submit", 'form[data-ajax="true"]', function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr("action");
    var formData = new FormData(this);

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#commanModelOver").modal("hide");
            $(".alert-success").remove();
            var successMessage = `<div class="alert alert-success">${response.message}</div>`;
            form.prepend(successMessage);
            setTimeout(function () {
                location.reload();
            }, 200);
        },
        error: function (xhr) {
            $(".alert-danger").remove();
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                var errorList = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: left;">
                        <button type="button" class="close-error" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 5px; top: 2px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                `;
                $.each(errors, function (key, value) {
                    errorList += `<li>${value[0]}</li>`;
                });
                errorList += "</ul></div>";
                form.prepend(errorList);
            } else if (xhr.status === 500) {
                var errorMessage = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: left;">
                        <button type="button" class="close-error" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 5px; top: 2px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul><li>${xhr.responseJSON.message}</li></ul>
                    </div>
                `;
                form.prepend(errorMessage);
            }
        },
    });
});

$(document).on("click", ".close-error", function () {
    $(this).closest(".alert").remove();
});

$(document).on("click", ".show_confirm", function (e) {
    var form = $(this).closest("form");
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });
    swalWithBootstrapButtons
        .fire({
            title: "Are you sure Delete this?",
            text: "This action cannot be undone. Do you want to continue?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
});

function showCustomAlert(message) {
    document.getElementById("alertMessage").innerText = message;
    var customAlert = new bootstrap.Modal(
        document.getElementById("customAlert")
    );
    customAlert.show();
}

function comman_function() {
    if ($('[data-role="tagsinput"]').length > 0) {
        $('[data-role="tagsinput"]').each(function (index, element) {
            var obj_id = $(this).attr("id");
            new Choices(document.getElementById(obj_id), {
                delimiter: ",",
                editItems: true,
                removeItemButton: true,
            });
        });
    }
}

function show_toastr(title, message, type) {
    var icon, cls;
    if (type === "success") {
        cls = "primary";
        notifier.show(
            "Success",
            message,
            "success",
            "/assets/images/notification/ok-48.png",
            4000
        );
    } else {
        cls = "danger";
        notifier.show(
            "Error",
            message,
            "danger",
            "/assets/images/notification/high_priority-48.png",
            4000
        );
    }
}
