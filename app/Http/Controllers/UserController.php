<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(6);

        return view('welcome', ['users' => $users]);
    }

    public function tambah()
    {
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);

        return redirect()->back()->with('berhasil', 'Data Users berhasil ditambah sebanyak 10 user');
    }
    public function hapus($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->back()->with('berhasil', 'Data Users berhasil dihapus');
    }
    public function hapusSemua()
    {
        $users = User::truncate();

        return redirect('/')->with('berhasil', 'Data Users berhasil dihapus semua');
    }
}
