<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)
                ->paginate(10);

        return view('users.index', [
             'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $audit = ([
            'details' => 'Create new user with name '.$request->name,
            'module' => 'Create User',
            'action_type' => 'Create',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        return redirect('/users')
                      ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::where('id',$id)

        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('new_password'),),
        ]);


        $audit = ([
            'details' => 'Update user with name '.$request->name,
            'module' => 'Edit User',
            'action_type' => 'Edit',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);


        return redirect('/users')
                   ->with('success','User updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);

        $audit = ([
            'details' => 'Delete user with name '.$user->name,
            'module' => 'Delete User',
            'action_type' => 'Delete',
        ]);

        app('App\Http\Controllers\AudittrailController')->audit($audit);

        $user->delete();


        return redirect('/users')
                     ->with('delete','User deleted successfully');
        
    }
}
