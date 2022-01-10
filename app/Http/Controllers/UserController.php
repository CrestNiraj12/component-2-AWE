<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with("roles")->orderBy('created_at', 'desc')->paginate(10);
        return view("admin.users.users", ['page_title' => 'User', 'users' => $users]);
    }

    public function show($id)
    {
        $user = User::has("roles")->with("roles")->find($id);
        return view("admin.users.user", ['page_title' => 'User', 'user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|mimes:png,jpg',
            "description" => 'required',
            "price" => 'required|numeric', 
            "units" => 'required|integer',
            "data" => 'required|integer',
            "user_category_id" => 'required',
        ]);
        $user = User::create($request->all());
        return redirect("/admin/users")->with('success', 'User Added!');
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update($request->except(["_token", "_method"]));
        return redirect("/admin/users")->with('success', 'User Updated!');
    }

    public function showAddForm()
    {
        $roles = Role::all();
        return view('admin.users.add', ['page_title' => 'Add User', 'roles' => $roles]);
    }

    public function showEditForm($id)
    {
        $user = $this->show($id);
        $roles = Role::all();
        return view('admin.users.edit', ['page_title' => 'Edit User', 'user' => $user, 'roles' => $roles]);
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect("/admin/users")->with('success', 'User Deleted!');
    }
}
