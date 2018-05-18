<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\RolesRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Relationships\CommentNews;
use App\Models\Relationships\NewsArtists;
use App\Models\Relationships\NewsTags;
use App\Models\Relationships\RatingNews;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends DefaultAdminController
{

    public function index()
    {
        $roles = Role::paginate(self::PAGINATION_PAGE);
        return view('admin.roles.index', compact('roles'));
    }

    public function add()
    {
        return view('admin.roles.add');
    }

    public function create(RolesRequest $request)
    {

        if($request->post()) {
            $role = new Role();

            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();

        }
        return redirect()->route('adminRoleIndex')->with('status', "Роль {$role->name} добавлена.");
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'));
    }

    public function update(RolesRequest $request, $id)
    {

        if($request->post()){

            $role = Role::findOrFail($id);

            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();

        }
        return redirect()->route('adminRoleIndex')->with('status', "Роль {$role->name} обновлена.");
    }

    public function delete($id)
    {
        User::where('role_id', $id)->delete();
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back()->with('status', "Роль {$role->name} удалена.");
    }

}
