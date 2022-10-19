<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('is-admin')) {
            return view('admin.users.index', ['users' => User::paginate(10)]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create($validatedData);
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'Uživatel '. $user->user_name .' úspěšně vytvořen!');
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            $request->session()->flash('error', 'Tento uživatel neexistuje!');
            return redirect(route('admin.users.index'));
        }

        return view('admin.users.show', [
            'roles'     => Role::all(),
            'user'      => $user
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
        $user = User::find($id);

        if (!$user) {
            $request->session()->flash('error', 'Tento uživatel neexistuje!');
            return redirect(route('admin.users.index'));
        }

        return view('admin.users.edit', [
            'roles'    => Role::all(),
            'user'     => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $validatedData = $request->validated();

        $user = User::find($id);
        $user->update($validatedData);
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'Uživatel '. $user->user_name .' úspěšně upraven!');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();

        $request->session()->flash('success', 'Uživatel '. $user->user_name .' Odstraněn!');
        return redirect(route('admin.users.index'));
    }
}
