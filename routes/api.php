<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\{User, Post, Comment, Interaction, Message};



// 1. REGISTER
Route::post('/register', function (Request $request) {
    return User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);
});

// 2. LOGIN (Hanya cek email, lalu kasih tau ID user-nya)
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if ($user) {
        return ['status' => 'Berhasil Login', 'user_id_kamu' => $user->id];
    }
    return ['status' => 'Gagal, email tidak ditemukan'];
});

// 3. HOME (Lihat semua postingan)
Route::get('/home', function () {
    return Post::orderBy('id', 'desc')->get();
});

// 4. POSTING
Route::post('/posts', function (Request $request) {
    return Post::create([
        'user_id' => $request->user_id, // Masukkan user_id saat tes
        'content' => $request->content
    ]);
});

// 5. SEARCH (Cari postingan)
Route::get('/search', function (Request $request) {
    return Post::where('content', 'like', "%{$request->q}%")->get();
});

// 6. DM (Kirim Pesan)
Route::post('/dm', function (Request $request) {
    return Message::create([
        'sender_id' => $request->user_id,
        'receiver_id' => $request->receiver_id,
        'message' => $request->message
    ]);
});

// 7. KOMEN
Route::post('/posts/{post_id}/comments', function (Request $request, $post_id) {
    return Comment::create([
        'user_id' => $request->user_id,
        'post_id' => $post_id,
        'comment' => $request->comment
    ]);
});

// 8. INTERAKSI (Like Postingan)
Route::post('/posts/{post_id}/like', function (Request $request, $post_id) {
    return Interaction::create([
        'user_id' => $request->user_id,
        'post_id' => $post_id,
        'type' => 'like'
    ]);
});

// 9. SETTING (Update Profil)
Route::post('/settings', function (Request $request) {
    $user = User::find($request->user_id);
    $user->update([
        'name' => $request->name,
        'bio' => $request->bio
    ]);
    return ['status' => 'Profil diupdate', 'data' => $user];
});

// 10. PROFIL (Lihat data user spesifik (id))
Route::get('/user/{user_id}', function ($user_id) {
    return User::find($user_id);
});

// 11. LIHAT SEMUA USER
Route::get('/users', function () {
    return User::all();
});