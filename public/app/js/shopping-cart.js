$(document).ready(function() {
    // Load value price 
    function updateGrandTotal(productId) {
        var quantity = parseInt($('#quant-input-' + productId + ' input').val(), 10);
        var price = parseFloat($('#cart-sub-total-price-' + productId).text());
        $('#cart-grand-total-price-' + productId).text(price * quantity);
    }

    // Cập nhật tổng số lượng ngay khi trang tải
    $('.cart-product-grand-total').each(function() {
        var productId = $(this).parent().parent().data('id');
        updateGrandTotal(productId);
    });

    $('.arrow.plus').click(function() {
        var productId = $(this).parent().parent().parent().parent().data('id');
        var input = $('#quant-input-' + productId + ' input');
        input.val(parseInt(input.val(), 10) + 1);
        updateGrandTotal(productId);
    });

    $('.arrow.minus').click(function() {
        var productId = $(this).parent().parent().parent().parent().data('id');
        var input = $('#quant-input-' + productId + ' input');
        var currentValue = parseInt(input.val(), 10);
        if (currentValue > 1) {
            input.val(currentValue - 1);
        }
        updateGrandTotal(productId);
    });




    $('.romove-cooke').click(function(e) {
        e.preventDefault();
    
        // Lấy productId từ thuộc tính data-id của hàng
        var productId = $(this).closest('tr').data('id');
    
        $.ajax({
            url: '/shopping-cart/' + productId,
            method: 'get',
            success: function(response) {
                alert('Sản phẩm đã được xóa khỏi giỏ hàng');
                location.reload(); // Tải lại trang để cập nhật giỏ hàng
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Lỗi: ' + textStatus + ' ' + errorThrown);
            }
        });
    });
    
    
    $('.cooke').click(function() {
        var product_id = $(this).data('id');

        $.ajax({
            url: '/home/' + product_id,
            method: 'get',
            success: function(response) {
                alert('Product added to cart');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error: ' + textStatus + ' ' + errorThrown);
            }
        });
    });
    
    
});
