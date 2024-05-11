
$(document).ready(function () {

    // Load value price 

    let date = new Date();
    getProductInfo();
    async function getProductInfo() {
        let voucherContent = document.querySelectorAll('.voucher');
        const url = '/get-product-info';
        const response = await fetch(url);
        const result = await response.json();
        console.log(result)
        voucherContent.forEach(e => {

            result.vouchers.forEach(element => {
                let due = element.due_date.replace(' ', 'T');
                let dueDate = new Date(due);
                if (dueDate > date) {
                    e.innerHTML += `	
             <input type="radio" id="option${element.id}" name="options" value="${element.id}">
             <label for="option${element.id}">
             ${element.title} - giảm ${element.discount} vnd
             </label>`;
                }
            });
        });

    }

    // Load value price 
    function updateGrandTotal(productId) {

        var quantity = parseInt($('#quant-input-' + productId + ' input').val(), 10);
        var priceString = $('#cart-sub-total-price-' + productId).text().trim();

        // Loại bỏ dấu chấm phân cách thập phân (ví dụ: "522.000" -> "522000")
        var priceWithoutDecimal = priceString.replace('.', '');
        // Chuyển đổi chuỗi thành số dấu phẩy động
        var price = parseFloat(priceWithoutDecimal);
        var grandTotal = price * quantity; // Tính toán tổng cộng

        // Định dạng kết quả tổng cộng thành định dạng tiền tệ và gán vào thành phần DOM
        $('#cart-grand-total-price-' + productId).text(formatCurrency(grandTotal));

        // Lặp qua các hàng và gán giá trị tổng cộng vào trường input ẩn
        $('tr[data-id]').each(function () {
            var productId = $(this).data('id');
            var totalValueStrng = $('#cart-grand-total-price-' + productId).text().trim();
            var totalValueWithoutDecimal = totalValueStrng.replace('.', '');
            var totalValue = parseFloat(totalValueWithoutDecimal);
            // console.log('totalValue = ' + totalValue);
            $('#redirectValue-' + productId).val(totalValue);
        });


    }



    // Tính toán tổng Subtotal và Grand Total
    function calculateTotal() {
        var subtotal = 0;
        var grandTotal = 0;

        $('.cart-product-sub-total .cart-sub-total-price').each(function () {
            // var price = parseInt($(this).text());
            var productId = $(this).closest('tr').data('id');
            var quantity = parseInt($('#quant-input-' + productId + ' input').val(), 10);

            // Lấy giá trị chuỗi tiền tệ từ thành phần DOM
            var priceString = $(this).text().trim(); // Đảm bảo loại bỏ khoảng trắng thừa
            //console.log('Giá trị chuỗi ban đầu:', priceString);

            // Loại bỏ dấu chấm phân cách thập phân (ví dụ: "522.000" -> "522000")
            var priceWithoutDecimal = priceString.replace('.', '');
            //console.log('Giá trị sau khi loại bỏ dấu chấm:', priceWithoutDecimal);

            // Chuyển đổi chuỗi thành số để sử dụng trong tính toán
            var price = parseFloat(priceWithoutDecimal);
            //console.log('Giá trị số sau khi chuyển đổi:', price);

            subtotal += price;
            grandTotal += price * quantity;
        });

        // Hiển thị tổng giá trị trong cột "Subtotal" và "Grand Total"
        $('.sub-total').text(formatCurrency(subtotal) + ' VND');
        $('.grand-total').text(formatCurrency(grandTotal) + ' VND');
    }

    function formatCurrency(amount) {
        return amount.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Cập nhật tổng số lượng ngay khi trang tải lần đầu tiên
    $('.cart-product-grand-total').each(function () {
        var productId = $(this).parent().parent().data('id');
        updateGrandTotal(productId);
    });

    // Tính toán và hiển thị tổng Subtotal và Grand Total lần đầu tiên khi trang tải
    calculateTotal();


    // Xử lý sự kiện khi nhấn vào nút "UPDATE CART"
    $('.update-cart').click(function (e) {
        e.preventDefault();
        updateCart();
    });

    // Hàm cập nhật giỏ hàng thông qua Ajax
    async function updateCart() {
        var updatedCart = {};

        // Lặp qua mỗi sản phẩm trong giỏ hàng
        $('tr[data-id]').each(function () {
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
            success: function (response) {
                alert(response); // Hiển thị thông báo thành công
                location.reload(); // Tải lại trang để cập nhật giỏ hàng
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error: ' + textStatus + ' ' + errorThrown); // Hiển thị thông báo lỗi nếu có
            }
        });
    }

    // Lấy tổng giá trị của giỏ hàng và gán vào nút "PROCEED TO CHECKOUT"
    function setCheckoutValue() {
        var totalPrice = 0;

        // Lặp qua mỗi sản phẩm trong giỏ hàng và tính tổng giá trị
        $('.cart-product-grand-total .cart-grand-total-price').each(function () {
            totalPrice += parseFloat($(this).text());
        });

        // Gán giá trị tổng giá trị vào nút "PROCEED TO CHECKOUT"
        $('.checkout-btn').val(totalPrice.toFixed(0));
    }

    // Gọi hàm để gán giá trị cho nút "PROCEED TO CHECKOUT"
    setCheckoutValue();

    $('.arrow.plus').click(function () {
        var productId = $(this).closest('tr').data('id');
        var input = $('#quant-input-' + productId + ' input');
        var quantity = parseInt(input.val(), 10) + 1;
        input.val(quantity); // Cập nhật giá trị mới vào input

        // Cập nhật giá trị qtyProduct-{{ $product['id'] }}
        $('input[name="qtyProduct-' + productId + '"]').val(quantity);

        updateGrandTotal(productId);
        calculateTotal();
    });

    $('.arrow.minus').click(function () {
        var productId = $(this).closest('tr').data('id');
        var input = $('#quant-input-' + productId + ' input');
        var quantity = parseInt(input.val(), 10) - 1;
        if (quantity >= 1) {
            input.val(quantity); // Cập nhật giá trị mới vào input

            // Cập nhật giá trị qtyProduct-{{ $product['id'] }}
            $('input[name="qtyProduct-' + productId + '"]').val(quantity);

            updateGrandTotal(productId);
            calculateTotal();
        }
    });


    $('.romove-cooke').click(function (e) {
        e.preventDefault();

        // Lấy productId từ thuộc tính data-id của hàng
        var productId = $(this).closest('tr').data('id');

        $.ajax({
            url: '/shopping-cart/' + productId,
            method: 'get',
            success: function (response) {
                alert('Sản phẩm đã được xóa khỏi giỏ hàng');
                location.reload(); // Tải lại trang để cập nhật giỏ hàng
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Lỗi: ' + textStatus + ' ' + errorThrown);
            }
        });
    });


    $('.cooke').click(function () {
        var product_id = $(this).data('id');

        $.ajax({
            url: '/home/' + product_id,
            method: 'get',
            success: function (response) {
                alert('Product added to cart');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error: ' + textStatus + ' ' + errorThrown);
            }
        });
    });




    $('.checkout-btn-child').click(function () {
        // Lấy product_id từ thuộc tính 'data-id' của hàng sản phẩm
        var productId = $(this).closest('tr').data('id');

        // Lấy giá trị tổng cộng của sản phẩm từ phần tử có id tương ứng
        var totalValue = $('#cart-grand-total-price-' + productId).text();

        // Gán giá trị tổng cộng vào trường input ẩn có id 'redirectValue-' cùng với product_id
        $('#redirectValue-' + productId).val(totalValue);

        // Tiếp tục với hành động submit form nếu cần
    });



    function updateCartDataOnLoad() {
        // Lặp qua mỗi hàng sản phẩm để cập nhật dữ liệu
        $('tr[data-id]').each(function () {
            var productId = $(this).data('id');

            // Cập nhật tổng giá trị cho sản phẩm
            updateGrandTotal(productId);
        });

        // Tính toán và hiển thị tổng Subtotal và Grand Total khi màn hình được tải xong
        calculateTotal();
    }

    updateCartDataOnLoad();
});


document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('checkoutFormB').addEventListener('submit', function (e) {
        e.preventDefault(); // Ngăn không cho form submit tự động


        //alert(cashPaymentUrl)


        // Kiểm tra xem radio button nào được chọn
        if (document.getElementById('cash_payment').checked) {
            // Nếu "Pay cash upon receipt" được chọn, chuyển hướng đến trang A
            document.getElementById('checkoutFormB').action = cashPaymentUrl;

            // Submit form
            document.getElementById('checkoutFormB').submit();
        } else if (document.getElementById('online_payment').checked) {
            // Nếu "online payment" được chọn, chuyển hướng đến trang B
            document.getElementById('checkoutFormB').action = onlinePaymentUrl;

            // Submit form
            document.getElementById('checkoutFormB').submit();
        }
    });
});




document.addEventListener("DOMContentLoaded", function () {
    // Bắt sự kiện khi nút "PROCEED TO CHECKOUT" được ấn
    document.querySelector('.checkout-btn').addEventListener('click', function () {
        // Lấy giá trị của nút "PROCEED TO CHECKOUT"
        var redirectValue = this.value;

        // Gán giá trị vào trường ẩn trong form
        document.getElementById('redirectValue').value = redirectValue;

        // Chuyển hướng đến trang vnpay_pay.php
        document.getElementById('checkoutForm').action = checkoutUrl;
        // document.getElementById('checkoutForm').action = "http://localhost:8080/Git/nhom3_ST5_BE2_NH23-24/resources/views/vnpay_php/vnpay_pay.php";

        // Submit form
        document.getElementById('checkoutForm').submit();
    });






});

