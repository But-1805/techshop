<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Hiển thị trang hồ sơ người dùng và lịch sử đơn hàng.
     */
    public function index()
    {
        $user = Auth::user();
        // Lấy các đơn hàng của người dùng, sắp xếp mới nhất lên đầu
        $orders = $user->orders()->latest()->paginate(5);

        return view('pages.profile', compact('user', 'orders'));
    }

    /**
     * Cập nhật thông tin người dùng.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            // Kiểm tra mật khẩu cũ nếu người dùng muốn đổi mật khẩu
            'current_password' => 'nullable|required_with:new_password|current_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        // Cập nhật thông tin cơ bản
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Cập nhật mật khẩu nếu có
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Hồ sơ đã được cập nhật thành công!');
    }

    /**
     * Cập nhật ảnh đại diện.
     */
    public function updateAvatar(Request $request)
    {
        $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        $user = Auth::user();

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $path;
        $user->save();

        return back()->with('success', 'Ảnh đại diện đã được cập nhật!');
    }
}
