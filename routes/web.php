<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CBaiviet;
use App\Http\Controllers\CChutro;
use App\Http\Controllers\CPhongtro;
use App\Http\Controllers\Auth\AuthController;
use App\Events\SendMessage;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/')->group(function () {
    Route::get('chutro', [AdminController::class, 'index'])->middleware('chutro');
    Route::get('admin', [AdminController::class, 'addashboard'])->middleware('admin');
    Route::get('dangnhap', [HomeController::class, 'dangnhap']);
    Route::post('dangnhap', [AuthController::class, 'dangnhap'])->name('login');
    Route::get('dangky', [HomeController::class, 'dangky']);
    Route::post('dangky', [AuthController::class, 'dangky'])->name('register');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('user', [AuthController::class, 'thongtin'])->name('user');
    Route::get('tindangphongtro', [CBaiviet::class, 'tindang']);
    Route::get('dangtin', [CBaiviet::class, 'dangtin'])->middleware('home');
    Route::post('chutro/dangtin', [CBaiviet::class, 'post_dangtin'])->name('dangtinphong');
    Route::get('detail/{slug}', [CBaiviet::class, 'detail'])->name('detail.slug');
    /*Socical Google Login*/
    Route::get('auth/redirect/{provider}', [AuthController::class, 'redirect']);
    Route::get('callback/{provider}', [AuthController::class, 'callback']);
    Route::get('logout', [AuthController::class, 'logout_dashboard']);
});
/*Chat*/
Route::middleware('home')->group(function () {
    Route::get('chat/{id}', function () {
       broadcast(new SendMessage(auth()->user(), null));
       return view('home.chat');
    });
    Route::post('message', function (Request $request) {
        broadcast(new SendMessage(auth()->user(), $request->input('message')));
        return $request->input('message');
    });
});


// Admin
Route::prefix('/admin')->group(function () {
    Route::get('dangnhap', [AdminController::class, 'login_admin']);
    Route::post('dangnhap', [AuthController::class, 'login_admin'])->name('login-admin');
    Route::get('dangky', [AdminController::class, 'register_admin']);
    Route::get('profile/{id}', [AdminController::class, 'profile'])->name('admin-profile');
    Route::post('profile/{id}', [AdminController::class, 'changes_profile'])->name('admin-profile-changes');
});
Route::group(['prefix'=>'/admin', 'middleware'=>['admin']], function() {
// Bai viet
    Route::get('danhmuc', [AdminController::class, 'danh_muc'])->name('danhmuc');
    Route::post('danhmuc', [AdminController::class, 'danh_muc_add'])->name('admin.danhmuc.add');
    Route::get('danhmuc-delete/{id}', [AdminController::class, 'danh_muc_delete'])->name('danhmuc.delete');
    Route::get('mo-danhmuc/{id}', [AdminController::class, 'danh_muc_mo'])->name('modanhmuc');
    Route::get('khoa-danhmuc/{id}', [AdminController::class, 'danh_muc_khoa'])->name('khoadanhmuc');
    Route::get('baiviet', [AdminController::class, 'bai_viet'])->name('baiviet');
    Route::get('khoa-baiviet/{id}', [AdminController::class, 'khoa_baiviet'])->name('khoa-baiviet');
    Route::get('xac-minh-baiviet/{id}', [AdminController::class, 'xacminh_baiviet'])->name('xacminh-baiviet');
    Route::get('quanli-chutro', [AdminController::class, 'danhsach_chutro'])->name('account-chutro');
    Route::get('quanli-khachthue', [AdminController::class, 'danhsach_khachthue'])->name('account-khach');
});
// End Admin

// Chutro
Route::group(['prefix'=>'/chutro', 'middleware'=>['chutro']], function() {
    //    Loại phòng
    Route::get('loaiphong', [CChutro::class, 'danh_sach'])->name('ds-loaiphong');
    Route::post('loaiphong', [CChutro::class, 'loaiphong_add'])->name('chutro.loaiphong.add');
    Route::get('loaiphong-active/{id}', [CChutro::class, 'loaiphong_active'])->name('loaiphong.active');
    Route::get('loaiphong-unactive/{id}', [CChutro::class, 'loaiphong_unactive'])->name('loaiphong.unactive');
    Route::get('loaiphong-edit/{id}', [CChutro::class, 'loaiphong_edit'])->name('chutro.loaiphong.edit');
    Route::post('loaiphong-edit/{id}', [CChutro::class, 'loaiphong_edit_post'])->name('loaiphong.edit.post');
    Route::get('loaiphong-delete/{id}', [CChutro::class, 'loaiphong_delete'])->name('loaiphong.delete');

    // Danh muc & bai viet
    Route::get('danhmuc', [CChutro::class, 'chutro_danh_muc'])->name('chutro.danhmuc');
    Route::get('baiviet', [CChutro::class, 'chutro_tindang'])->name('chutro.tindang');
    // phòng trọ
    Route::get('phongtro', [CPhongtro::class, 'danh_sach'])->name('ds-phongtro');
    Route::post('phongtro-add', [CPhongtro::class, 'phongtro_add'])->name('chutro.phongtro.add');
});

Route::get('chutro/getQuanhuyen/{matp}',[CPhongtro::class, 'getQuanhuyen']);
Route::get('chutro/getXaphuong/{maqh}',[CPhongtro::class, 'getXaphuong']);
// End Chutro
