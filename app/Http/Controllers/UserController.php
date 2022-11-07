<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(3);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            'gambar' => 'required|nullable|image|mimes:jpeg,jpg,png|max:2048',


        ]);

        $fileName = '';
        if ($request->file('gambar')->isValid()) {
            $gambar = $request->file('gambar');
            $extention = $gambar->getClientOriginalExtension();
            $fileName = "user/" . date('ymdHis') . "." . $extention;
            $upload_path = 'public/storage/uploads/user';
            $request->file('gambar')->move($upload_path, $fileName);
            $input['gambar'] = $fileName;
        }
        User::create(array_merge($request->all(), [
            'gambar' => $fileName,
            'password' => bcrypt('12345'),
        ]));

        return redirect('user')->with('status', 'Berhasil menambahkan user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'role' => 'required',
            'alamat' => 'required',
            'gambar' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048',

        ]);

        if ($request->gambar) {
            Storage::disk('local')->delete('public/uploads/' . $user->gambar);
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namaGambar = "user/" . date('YmdHis') . "." . $gambar;
            $request->gambar->storeAs('public/uploads', $namaGambar);
        } else {
            $namaGambar = $user->gambar;
        }
        User::where('id', $user->id)
            ->update([
                'nama' => $request->nama,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'role' => $request->role,
                'gambar' => $namaGambar,
            ]);
        return redirect('user')->with('status', 'Berhasil mengubah User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('user')->with('status', 'User berhasil dihapus');
    }

    public function profile($id)
    {
        return view('user.profile');
    }
}
