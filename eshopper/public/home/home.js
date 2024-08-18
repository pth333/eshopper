jQuery(document).ready(function () {
    // Bắt sự kiện click nút "Add to cart"
    jQuery(".cart").on("click", function (e) {
        e.preventDefault();

        let urlCart = jQuery(this).data("url");
        // alert(urlCart);

        // Gửi request Ajax
        jQuery.ajax({
            type: "GET",
            url: urlCart,
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
                if (data.cart != "") {
                    swal("Bạn đã thêm sản phẩm thành công!", {
                        icon: "success",
                    });
                }
            },

            error: function (error) {},
        });
    });
});
