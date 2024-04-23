$(document).ready(function() {

   // Load value price 
   function updateGrandTotal(productId) {
    var quantity = parseInt($('#quant-input-' + productId + ' input').val(), 10);
    var price = parseFloat($('#cart-sub-total-price-' + productId).text());
    $('#cart-grand-total-price-' + productId).text(price * quantity);
}

// Tính toán tổng Subtotal và Grand Total
function calculateTotal() {
    var subtotal = 0;
    var grandTotal = 0;

    $('.cart-product-sub-total .cart-sub-total-price').each(function() {
        var price = parseFloat($(this).text());
        var productId = $(this).closest('tr').data('id');
        var quantity = parseInt($('#quant-input-' + productId + ' input').val(), 10);

        subtotal += price;
        grandTotal += price * quantity;
    });

    // Hiển thị tổng giá trị trong cột "Subtotal" và "Grand Total"
    $('.sub-total').text('$' + subtotal.toFixed(0));
    $('.grand-total').text('$' + grandTotal.toFixed(0));
}

// Cập nhật tổng số lượng ngay khi trang tải lần đầu tiên
$('.cart-product-grand-total').each(function() {
    var productId = $(this).parent().parent().data('id');
    updateGrandTotal(productId);
});

// Tính toán và hiển thị tổng Subtotal và Grand Total lần đầu tiên khi trang tải
calculateTotal();

// Xử lý sự kiện tăng giảm số lượng sản phẩm
$('.arrow.plus').click(function() {
    var productId = $(this).closest('tr').data('id');
    var input = $('#quant-input-' + productId + ' input');
    var quantity = parseInt(input.val(), 10) + 1;
    input.val(quantity);
    updateGrandTotal(productId);
    calculateTotal();
});

$('.arrow.minus').click(function() {
    var productId = $(this).closest('tr').data('id');
    var input = $('#quant-input-' + productId + ' input');
    var quantity = parseInt(input.val(), 10) - 1;
    if (quantity >= 1) {
        input.val(quantity);
        updateGrandTotal(productId);
        calculateTotal();
    }
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


    window.onload = async function() {
        let updateCartButton = document.querySelector('.update-cart');
    
        updateCartButton.addEventListener('click', async function(e) {
            e.preventDefault();
            
            // Create an object to store the updated quantities
            var updatedCart = {};
    
            // Loop through each product in the cart
            $('tr[data-id]').each(function() {
                var productId = $(this).data('id');
                var quantity = $('#quant-input-' + productId + ' input').val();
    
                // Add the product ID and quantity to the updatedCart object
                updatedCart[productId] = quantity;
            });
    
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            $.ajax({
                url: '/shopping-cart/update',
                method: 'POST',
                data: {
                    cart: updatedCart,
                    _token: csrfToken
                },
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 401) {  // HTTP status 401 means "Unauthorized"
                        alert('Please login to update cart.');
                    } else {
                        alert('Error: ' + textStatus + ' ' + errorThrown);
                    }
                }
            });
        });

    }


    $('.checkout-btn').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a

        // Lấy href từ thuộc tính href của thẻ a
        var href = $(this).attr('href');

        // Chuyển hướng đến trang checkout
        window.location.href = href;
    });
    
    
    
});
