<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;


class UserController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function index(Request $request){
    $query = User::query();

    if ($request->search) {
        $searchTerm = $request->search;
        $query->where(function($q) use ($searchTerm) {
            $q->where('name', 'like', "%{$searchTerm}%")
              ->orWhere('email', 'like', "%{$searchTerm}%");
        });
    }

    $users = $query->paginate(10);
    return view('admin.users.index', compact('users'));
    }


    public function create(){
    return view('admin.users.create-user');
    }

    public function export(Request $request){
    $search = $request->input('search');
    return Excel::download(new UsersExport($search), 'users.xlsx');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'User created successfully');
    }
}
