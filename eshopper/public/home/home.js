
jQuery(document).ready(function () {
    // Bắt sự kiện click nút "Add to cart"
    jQuery('.add-to-cart').on('click', function (e) {
        e.preventDefault();

        let urlCart = jQuery(this).data('url');
        // alert(urlCart);

        // Gửi request Ajax
        jQuery.ajax({
            type: 'GET',
            url: urlCart,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function (data) {
                alert('Thêm sản phẩm thành công');
            },

            error: function (error) {

            }

        });
    });
});
