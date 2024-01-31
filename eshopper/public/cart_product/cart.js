jQuery(document).ready(function () {
    // Lắng nghe sự kiện khi nhấn nút "+"
    jQuery('.cart_quantity_up').on('click', function (e) {
        e.preventDefault();
        updateQuantity(this, 1); // Gọi hàm để cập nhật số lượng

    });

    // Lắng nghe sự kiện khi nhấn nút "-"
    jQuery('.cart_quantity_down').on('click', function (e) {
        e.preventDefault();
        updateQuantity(this, -1); // Gọi hàm để cập nhật số lượng

    });

    // Lắng nghe sự kiện khi nhập số vào ô input
    jQuery('.cart_quantity_input').on('input', function (e) {
        e.preventDefault();
        updateTotalPrice(this);

    });

    jQuery('.update').on('click', function (e) {
        e.preventDefault();
        updateCart();
    });
// sự kiện xóa sản phẩm
    jQuery('.cart_quantity_delete').on('click',function(e){
        e.preventDefault();
        deleteProductCart();
    })
    // Hàm cập nhật số lượng
    function updateQuantity(button, delta) {
        // Lấy giá trị hiện tại từ input
        var inputElement = jQuery(button).siblings('.cart_quantity_input');
        var currentValue = parseInt(inputElement.val());

        // Đảm bảo giá trị không âm và cập nhật giá trị trong input
        if (currentValue + delta > 0) {
            inputElement.val(currentValue + delta);
        }

        // Gọi hàm cập nhật tổng giá trị
        updateTotalPrice(inputElement);
    }

    // Hàm cập nhật tổng giá trị
    function updateTotalPrice(inputElement) {
        // Lấy giá và số lượng từ các ô tương ứng
        var priceElement = jQuery(inputElement).closest('tr').find('.cart_price p');
        var quantity = parseInt(jQuery(inputElement).val());

        // Chuyển đổi giá từ chuỗi sang số
        var price = parseFloat(priceElement.text().replace(' đ', '').replace(',', ''));

        // Tính tổng giá trị
        var totalPrice = isNaN(quantity) || jQuery.trim(jQuery(inputElement).val()) === '' ? 0 : price * quantity;

        // Cập nhật giá trị trong ô tổng giá với định dạng tiền Việt
        jQuery(inputElement).closest('tr').find('.cart_total p').text(totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));
    }

    function updateCart() {
        var updateCartUrl = jQuery('.cart_wrapper').data('url');
        // alert(updateCartUrl);
        // Lấy thông tin giỏ hàng cập nhật từ các ô input
        jQuery('.cart_item').each(function () {
            var productId = jQuery(this).data('product-id');
            var quantity = parseInt(jQuery(this).closest('tr').find('input.cart_quantity_input').val()) || 0;
            // Gửi yêu cầu Ajax
            jQuery.ajax({
                type: 'GET',
                url: updateCartUrl,
                data: {
                    productId: productId,
                    quantity: quantity
                },
                dataType: 'json',
                success: function (data) {
                    // Cập nhật giá trị tổng tiền của toàn bộ giỏ hàng
                    var $cartComponent = $(data.cart_component);

                    var cartGrandTotalValue = parseFloat($cartComponent.find('.cart_grand_total span').text().replace(/[^\d.-]/g, ''));
                    jQuery('.cart_grand_total span').text(cartGrandTotalValue.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));
                },
                error: function (error) {
                    // Xử lý lỗi (nếu có)
                    console.error(error);
                }
            });
        });
    }

    function deleteProductCart(){
        let urlRequest = jQuery('.cart_quantity_delete').data('url');
        let productId = jQuery('.cart_item').data('product-id');
        swal({
            title: "Bạn có chắc chắn muốn xóa sản phẩm?",        
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: 'GET',
                    url: urlRequest,
                    data:{productId: productId},
                   
                    success: function(data){
                        if(data.code === 200){
                            jQuery('.cart_wrapper').html(data.cart_component);
                            
                        }
                    },
                    error: function (){

                    }
                })
                swal("Bạn đã xóa thành công!",{
                    icon: "success"
                });
            } else {
              swal("Sản phẩm chưa được xóa!");
            }
          });
    }
});
