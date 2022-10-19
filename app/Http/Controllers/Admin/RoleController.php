<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', ['roles' => Role::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $validatedData = $request->validated();

        $role = Role::create($validatedData);
        $role->users()->sync($request->users);

        $request->session()->flash('success', 'Role '. $role->name .' úspěšně vytvořena!');
        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            $request->session()->flash('error', 'Tato role neexistuje!');
            return redirect(route('admin.roles.index'));
        }

        return view('admin.rles.show', [
            'users'     => User::all(),
            'role'      => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            $request->session()->flash('error', 'Tato role neexistuje!');
            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.edit', [
            'users'    => User::all(),
            'role'     => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $validatedData = $request->validated();

        $role = Role::find($id);
        $role->update($validatedData);
        $role->users()->sync($request->users);

        $request->session()->flash('success', 'Role '. $role->name .' úspěšně aktualizována!');
        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $role = Role::find($id);
        $role->delete();

        $request->session()->flash('success', 'Role '. $role->name .' odstraněna!');
        return redirect(route('admin.roles.index'));
    }
}
