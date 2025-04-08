<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        $data = [
            'title' => 'Users',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Users',
            'users' => $users
        ];
        return view('admin.user.index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add User',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Add User',
        ];
        return view('admin.user.add', $data);
    }

    public function save(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'username' => [
                    'required',
                    'string',
                    'max:25',
                    'regex:/^[a-z0-9_]*$/'
                ],
                'fullname' => [
                    'required',
                    'max:50',
                ],
                'email' => [
                    'required',
                    'max:50',
                    'email',
                    'unique:users,email'
                ],
                'password' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/'
                ],
                'repassword' => [
                    'required',
                    'min:8',
                    'same:password',
                    'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/'
                ],
                'nohp' => [
                    'required',
                    'max:13',
                    'regex:/^\d+$/'
                ],

            ],
            [
                'username.required' => 'Nama kategori wajib diisi',
                'username.string' => 'Hanya boleh berupa text',
                'username.unique' => 'Username ini sudah digunakan!',
                'username.max' => 'Nama tidak boleh lebih dari 25 karakter',
                'username.regex' => 'Username harus tanpa spasi dan huruf kecil',
                'fullname.max' => 'Nama lengkap tidak boleh lebih dari 50 karakter',
                'fullname.required' => 'Nama lengkap wajib diisi',
                'email.max' => 'Email tidak boleh lebih dari 50 karakter',
                'email.required' => 'Email wajib diisi',
                'email.unique' => 'Email ini sudah digunakan!',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter!',
                'password.regex' => 'Password harus mengandung setidaknya huruf dan angka',
                'repassword.required' => 'Konfirmasi password wajib diisi',
                'repassword.min' => 'Konfirmasi password minimal 8 karakter!',
                'repassword.regex' => 'Password harus mengandung setidaknya huruf dan angka',
                'repassword.same' => 'Konfirmasi password tidak cocok!',
                'nohp.required' => 'Nomor telepon wajib diisi!',
                'nohp.max' => 'Nomor telepon maksimal 13 angka!',
                'nohp.regex' => 'Nomor telepon harus berupa angka',
            ]
        );

        $validated['status_user'] = 'aktif';
        $validated['avatar'] = 'default.png';
        $validated['role'] = 'writer';

        // dd($request->all());
        User::create($validated);

        // dd(User::all());

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $data = [
            'title' => 'Edit User',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Edit User',
            'users' => $users
        ];
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'username' => [
                    'required',
                    'string',
                    'max:25',
                    'regex:/^[a-z0-9_]*$/'
                ],
                'fullname' => [
                    'required',
                    'max:50',
                ],
                'email' => [
                    'required',
                    'max:50',
                    'email',
                    'unique:users,email,' . $id
                ],
                'nohp' => [
                    'required',
                    'max:13',
                    'regex:/^\d+$/'
                ],
                'status_user' => [
                    'required',
                ],

            ],
            [
                'username.required' => 'Nama kategori wajib diisi',
                'username.string' => 'Hanya boleh berupa text',
                'username.unique' => 'Username ini sudah digunakan!',
                'username.max' => 'Nama tidak boleh lebih dari 25 karakter',
                'username.regex' => 'Username harus tanpa spasi dan huruf kecil',
                'fullname.max' => 'Nama lengkap tidak boleh lebih dari 50 karakter',
                'fullname.required' => 'Nama lengkap wajib diisi',
                'email.max' => 'Email tidak boleh lebih dari 50 karakter',
                'email.required' => 'Email wajib diisi',
                'email.unique' => 'Email ini sudah digunakan!',
                'email.email' => 'Format email tidak valid',
                'nohp.required' => 'Nomor telepon wajib diisi!',
                'nohp.max' => 'Nomor telepon maksimal 13 angka!',
                'nohp.regex' => 'Nomor telepon harus berupa angka',
                'status_user.required' => 'Status user wajib dipilih!',
            ]
        );

        $validated['avatar'] = 'default.png';

        // dd($request->all());
        User::where('id', $id)
            ->update($validated);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan!');
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->delete();

            return redirect()->route('admin.users')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.users')->with('failed', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
