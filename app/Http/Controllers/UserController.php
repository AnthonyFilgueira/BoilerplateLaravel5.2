<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;

class UserController extends Controller
{
    public function __construct() 
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role ==="admin")
        {
            $users = User::paginate(5);
        
            return view('users.index', compact('users'));
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role ==="admin")
        {
            return view('users.create');
        }else{
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User($request->all());
        $user->save();
    
        Flash::message(trans('validation.actions.create'))->important();

        return \Redirect::route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(auth()->user()->role ==="admin" || (auth()->user()->role ==="client" && auth()->user()->id ==$id))
        {
            $user = User::findOrFail($id);
            return view('users.edit',compact('user'));
        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();

        Flash::message($user->full_name." / ". trans('validation.actions.update'))->important();
        if(auth()->user()->role ==="admin")
        {
            return \Redirect::route('users.index');
        }else{
            return redirect('/'); 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        $message = $user->full_name ." / ". trans('validation.actions.delete');
        Flash::message($message)->important();

        return \Redirect::route('users.index');
    }
}
