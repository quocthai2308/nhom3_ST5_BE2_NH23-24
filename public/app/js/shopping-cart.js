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


// Xử lý sự kiện khi nhấn vào nút "UPDATE CART"
$('.update-cart').click(function(e) {
    e.preventDefault();
    updateCart();
});

// Hàm cập nhật giỏ hàng thông qua Ajax
async function updateCart() {
    var updatedCart = {};

    // Lặp qua mỗi sản phẩm trong giỏ hàng
    $('tr[data-id]').each(function() {
        var productId = $(this).data('id');
        var quantity = $('#quant-input-' + productId + ' input').val();

        // Thêm ID sản phẩm và số lượng vào đối tượng updatedCart
        updatedCart[productId] = quantity;
    });

    // Lấy mã CSRF token
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Gửi yêu cầu Ajax để cập nhật giỏ hàng
    $.ajax({
        url: '/shopping-cart/update',
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        data: JSON.stringify({
            cart: updatedCart,
            _token: csrfToken
        }),
        success: function(response) {
            alert(response); // Hiển thị thông báo thành công
            location.reload(); // Tải lại trang để cập nhật giỏ hàng
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus + ' ' + errorThrown); // Hiển thị thông báo lỗi nếu có
        }
    });
}

// Lấy tổng giá trị của giỏ hàng và gán vào nút "PROCEED TO CHECKOUT"
function setCheckoutValue() {
    var totalPrice = 0;

    // Lặp qua mỗi sản phẩm trong giỏ hàng và tính tổng giá trị
    $('.cart-product-grand-total .cart-grand-total-price').each(function() {
        totalPrice += parseFloat($(this).text());
    });

    // Gán giá trị tổng giá trị vào nút "PROCEED TO CHECKOUT"
    $('.checkout-btn').val(totalPrice.toFixed(0));
}

// Gọi hàm để gán giá trị cho nút "PROCEED TO CHECKOUT"
setCheckoutValue();

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


   
    // $('.checkout-btn').click(function(e) {
    //     e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a

    //     // Lấy href từ thuộc tính href của thẻ a
    //     var href = $(this).attr('href');

    //     // Chuyển hướng đến trang checkout
    //     window.location.href = href;
    // });
    
    
    
    
    
    
    
});


document.addEventListener("DOMContentLoaded", function() {
        // Bắt sự kiện khi nút "PROCEED TO CHECKOUT" được ấn
        document.querySelector('.checkout-btn').addEventListener('click', function() {
            // Lấy giá trị của nút "PROCEED TO CHECKOUT"
            var redirectValue = this.value;
            
            // Gán giá trị vào trường ẩn trong form
            document.getElementById('redirectValue').value = redirectValue;
            
            // Chuyển hướng đến trang vnpay_pay.php
            document.getElementById('checkoutForm').action = "http://localhost:8080/Git/nhom3_ST5_BE2_NH23-24/resources/views/vnpay_php/vnpay_pay.php";
            
            // Submit form
            document.getElementById('checkoutForm').submit();
        });

    });

// document.addEventListener('DOMContentLoaded', function() {
    
    


// let updateCartButton = document.querySelector('.update-cart');
//     updateCartButton.addEventListener('click', function(e) {
//         e.preventDefault();
//         updateCart();
//     });

//     async function updateCart() {
//         var updatedCart = {};
    
//         // Loop through each product in the cart
//         $('tr[data-id]').each(function() {
//             var productId = $(this).data('id');
//             var quantity = $('#quant-input-' + productId + ' input').val();
    
//             // Add the product ID and quantity to the updatedCart object
//             updatedCart[productId] = quantity;
//         });
    
//         let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
//         const url = '/shopping-cart/update';
//         const response = await fetch(url, {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': csrfToken
//             },
//             body: JSON.stringify({
//                 cart: updatedCart,
//                 _token: csrfToken
//             })
//         });
    
//         if (response.ok) {
//             const result = await response.text();
//             alert(result);
//             location.reload();
//         } else {
//             if (response.status === 401) {  // HTTP status 401 means "Unauthorized"
//                 alert('Please login to update cart.');
//             } else {
//                 alert('Error: ' + response.status);
//             }
//         }
//     }
// });