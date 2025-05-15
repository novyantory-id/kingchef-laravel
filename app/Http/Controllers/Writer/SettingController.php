<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $user = User::where('id', auth()->id())->firstOrFail();
        $data = [
            'title' => 'Profile',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Profile',
            'user' => $user
        ];
        return view('writer.settings.index', $data);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:25',
            'username' => 'required|string|max:30|unique:users,username,' . $user->id,
            'nohp' => 'required|string|max:13',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);



        //get input data, kecuali avatar dan remove_thumbnail
        // $updateData = $request->except('avatar', 'remove_thumbnail');

        $updateData = $validator->validated();

        $disk = Storage::disk('public');

        // Handle penghapusan thumbnail (jika tombol hapus diklik)
        if ($request->has('remove_thumbnail') && $request->remove_thumbnail) {
            if ($user->avatar) {
                $oldFilePath = 'profile/' . $user->avatar;
                if ($disk->exists($oldFilePath)) {
                    $disk->delete($oldFilePath);
                }
                $updateData['avatar'] = null;
            }
        }

        //kelola gambar
        elseif ($request->hasFile('avatar')) {
            // Delete file lama jika ada
            if ($user->avatar) {
                $fileLama = 'profile/' . $user->avatar;
                if ($disk->exists($fileLama)) {
                    $disk->delete($fileLama);
                }
            }

            $file = $request->file('avatar');
            $fileName = $file->hashName(); // atau bisa gunakan $file->getClientOriginalName()

            // Simpan file
            $file->storeAs('profile', $fileName, 'public');

            // Hanya simpan nama file ke database
            $updateData['avatar'] = $fileName;
        }



        $user->update($updateData);

        if ($validator->fails()) {
            return redirect()->route('writer.settings')
                ->with('failed', 'Ada yang salah, periksa!.')
                ->withErrors($validator);
        }

        return redirect()->route('writer.settings')
            ->with('success', 'Profile berhasil diupdate!');
    }

    public function updatePassword(Request $request)
    {

        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'current_password' => [
                'required',
                'string',
                // 3. Custom validation: cek kecocokan password lama
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Password saat ini salah'); // Pesan error custom
                    }
                }
            ],
            // 4. Validasi password baru
            'password' => 'required|string|min:8|different:current_password',

            // 5. Validasi konfirmasi password
            're_enter_password' => 'required|string|same:password',
        ], [
            // 6. Custom error messages
            'password.different' => 'Password baru harus berbeda dengan password lama',
            're_enter_password.same' => 'Konfirmasi password tidak cocok'
        ]);

        // 7. Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('writer.settings')
                ->with('failed', 'Ada yang salah, periksa!') // Alert merah dengan pesan ini
                ->withErrors($validator); // Tetap pertahankan error per field
        }

        // 8. Update password baru (otomatis di-hash)
        $user->update([
            // 'password' => Hash::make($validated['password'])
            'password' => Hash::make($request->password)
        ]);

        // 8. Redirect dengan pesan sukses
        return redirect()->route('writer.settings')
            ->with('success', 'Password berhasil diubah!');
    }
}
