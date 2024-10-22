<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Đăng nhập thành công, chuyển hướng về trang chủ hoặc dashboard
            return redirect()->intended('/');
        }

        // Đăng nhập thất bại, quay lại trang login với thông báo lỗi
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ]);
    }

    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validate dữ liệu form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:NguoiDung,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Tạo người dùng mới
        NguoiDung::create([
            'HoTen' => $request->name,
            'TenDangNhap' => $request->email,
            'MatKhau' => Hash::make($request->password), // Mã hóa mật khẩu
        ]);

        // Tự động đăng nhập sau khi đăng ký thành công
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // Chuyển hướng đến trang chủ hoặc dashboard
        return redirect()->intended('/');
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
