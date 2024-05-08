<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function vnpay_payment(Request $request)
    {

        $data = $request->all();
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/Git/nhom3_ST5_BE2_NH23-24/resources/views/vnpay_php/vnpay_return.blade.php";
        $vnp_TmnCode = "S77NQKOC"; //Mã website tại VNPAY 
        $vnp_HashSecret = "VMUTQZMAJALJDPSKDOATRRZBNLUQYNMJ"; //Chuỗi bí mật

        $vnp_TxnRef = "127k8kb3kdgf6l046687"; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh Toán Hóa Đơn - " . $vnp_TxnRef;
        $vnp_OrderType = "Flipmart";
        $vnp_Amount = $data['redirect'] * 10000;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo

    }


    public function checkout(Request $request)
    {



        $product_id = $request->input('product_id');
        $redirectValue = $request->input('redirect');
        $qtyProduct = $request->input('qty');
        session()->put('quantity',$qtyProduct);
        session()->put('product_id',$product_id );
        
        return view('checkout', compact('product_id', 'redirectValue', 'qtyProduct'));
    }
    
    public function vnpay_create_payment(Request $request)
    {
        
        
        // Lấy thông tin từ form
        $email = $request->input('customerEmail');
        $phone = $request->input('customerPhone');
        $orderContent = $request->input('orderContent');
        $shippingAddress = $request->input('shippingAddress');
        $product_id = $request->input('product_id');
        $redirectValue = $request->input('redirectCheckout');
        $user_id = Auth::user()->id; // Hoặc bất kỳ cách nào bạn xác định người dùng hiện tại
       
        // Tạo mã giao dịch duy nhất
        do {
            $code_vnpay = rand(1, 100000);
            // Kiểm tra xem mã này đã tồn tại trong cơ sở dữ liệu chưa
        } while (Transaction::where('code_vnpay', $code_vnpay)->exists());

        log::info('gia tien la: ' . $redirectValue);
        // Lưu thông tin giao dịch vào bảng 'transactions'
        $transaction = new Transaction([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'amount' => $redirectValue,
            'payment_method' => 'VNPAY',
            'code_vnpay' => $code_vnpay,
            'status' => 0, // Mặc định là 0
            'email' => $email,
            'phone' => $phone,
            'order_content' => $orderContent,
            'shipping_address' => $shippingAddress,
        ]);
        $transaction->save();
        // Chuyển hướng đến trang 'vnpay_create_payment' với thông tin giao dịch

        // Lấy thông tin giao dịch từ cơ sở dữ liệu
        $transaction = Transaction::where('code_vnpay', $code_vnpay)->firstOrFail();

        // Tiếp tục với việc tạo thanh toán VNPAY...

        return view('vnpay_php.vnpay_create_payment', compact('transaction', 'redirectValue', 'code_vnpay'));
    }

    public function vnpay_return()
    {
        return view('vnpay_php.vnpay_return');
    }
    public function vnpay_pay()
    {
        return view('vnpay_php.vnpay_pay');
    }

    public function handleVnpayResponse(Request $request)
    {
        // Lấy thông tin từ request
        $transactionId = $request->input('vnp_TxnRef');
        $amount = $request->input('vnp_Amount');
        $orderInfo = $request->input('vnp_OrderInfo');
        $responseCode = $request->input('vnp_ResponseCode');
        $vnpayTransactionNo = $request->input('vnp_TransactionNo');
        $bankCode = $request->input('vnp_BankCode');
        $payDate = $request->input('vnp_PayDate');

        // Kiểm tra chữ ký hợp lệ và mã phản hồi
        // ...

        $existingPayment = Payment::where('code_vnpay', $transactionId)->first();

        // Nếu không tồn tại, lưu thông tin mới vào bảng 'payments'
        if (!$existingPayment) {
            $payment = new Payment([
                'user_id' => Auth::user()->id,
                'code_vnpay' => $transactionId,
                'amount' => $amount,
                'transaction_code' => $responseCode,
                'transaction_no' => $vnpayTransactionNo,
                'bank_code' => $bankCode,
                'payment_date' => $payDate,
                'status' => ($responseCode == '00') ? 'GD Thanh cong' : 'GD Khong thanh cong',
                // Các trường khác nếu cần
            ]);
            $payment->save();
        }

        if($responseCode == '00'){
            $productdM = new Product();
            $bill = new Bill;
            $billProduct= new BillProduct();
            $amount = $amount / 100000;

                $total = $amount;
                $userId = Auth::user()->id;
                $createdAt = $payDate;
                $paymentMethod = 'VNpay';
          $billId = $bill->addBill($total, $userId, $createdAt, $paymentMethod);
          $product_id = session('product_id');
          $quantity = session('quantity');
          $billProduct->addBillProduct($billId,$product_id,$quantity);
          $productdM->updateProductQuantity($product_id,$quantity);
        }
        // Tìm giao dịch trong bảng 'transactions' với code_vnpay tương ứng
        $transaction = Transaction::where('code_vnpay', $transactionId)->first();

        // Nếu tìm thấy giao dịch, cập nhật trạng thái của nó
        if ($transaction && $responseCode == '00') {
            $transaction->status = 1; // Cập nhật trạng thái thành công
            $transaction->save();
        }

        return view('vnpay_php.vnpay_return', compact('transactionId'));
    }
}
