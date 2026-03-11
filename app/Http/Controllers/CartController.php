<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
    }

    public function index(): View
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);
        $relatedProducts = $this->productService->getAllProducts();

        return view('cart', compact('cart', 'total', 'relatedProducts'));
    }

    public function addToCart(Request $request): JsonResponse
    {
        $id = md5($request->name); // Use name as ID since we don't have DB IDs
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $request->name,
                'quantity' => 1,
                'price' => $request->price,
                'image' => $request->image,
            ];
        }

        session()->put('cart', $cart);

        // Calculate total count
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json(['success' => 'Đã thêm sản phẩm vào giỏ hàng.', 'cart_count' => $count]);
    }

    public function update(Request $request): JsonResponse
    {
        if (! $request->id || ! $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Thiếu dữ liệu cập nhật.',
            ], 422);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
        }
        session()->put('cart', $cart);
        session()->flash('success', 'Cập nhật giỏ hàng thành công.');

        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật giỏ hàng thành công.',
            'cart_count' => $count,
        ]);
    }

    public function remove(Request $request): JsonResponse
    {
        if (! $request->id) {
            return response()->json([
                'success' => false,
                'message' => 'Thiếu dữ liệu cần xóa.',
            ], 422);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');

        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa sản phẩm khỏi giỏ hàng.',
            'cart_count' => $count,
        ]);
    }

    public function checkout(): View
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);

        return view('checkout', compact('cart', 'total'));
    }

    public function processCheckout(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('checkout_error', 'Giỏ hàng của bạn đang trống.');
        }

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'note' => ['nullable', 'string', 'max:1000'],
            'payment_method' => ['required', 'string', 'in:qr,cod,bank'],
        ]);

        session()->forget('cart');

        $paymentMethod = $request->input('payment_method');
        $message = match ($paymentMethod) {
            'qr' => 'Đã ghi nhận thanh toán QR. Chúng tôi sẽ liên hệ xác nhận đơn hàng sớm nhất.',
            'bank' => 'Đã ghi nhận đơn hàng. Nhân viên sẽ liên hệ gửi thông tin chuyển khoản.',
            default => 'Đã ghi nhận đơn hàng. Vui lòng thanh toán khi nhận hàng.',
        };

        return redirect()
            ->route('cart.index')
            ->with('checkout_success', $message);
    }

    private function calculateTotal(array $cart): float
    {
        $total = 0;
        foreach ($cart as $details) {
            $priceValue = isset($details['price'])
                ? preg_replace('/[^\d]/', '', $details['price'])
                : null;
            $price = is_numeric($priceValue) ? (float) $priceValue : 0;
            $total += $price * $details['quantity'];
        }

        return $total;
    }
}
