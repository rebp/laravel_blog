<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',
            'password' => 'required',           
        ], [
            'required' => 'This field is required.'
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($request->password);

        if($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images/uploads/users', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;
            
        }

        User::create($input);
        
        Session::flash('created_user', 'User ' . $input['name'] . ' has been successfully created.');

        return redirect()->route('admin.users.index');
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
         $user = User::findOrFail($id);
         $roles = Role::pluck('name', 'id')->all();

         return view('admin.users.edit', compact('user', 'roles'));
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

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',        
        ], [
            'required' => 'This field is required.'
        ]);

        $user = User::findOrFail($id);
        
        if(trim($request->password) == '') {
            
            $input = $request->except('password');

        } else {
            
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }

        
        if($file = $request->file('photo_id')) {

            if($user->photo) {
                
                $image_path = public_path() . $user->photo->file;
    
                if(file_exists($image_path)) {
    
                    unlink($image_path);
    
                    $user_photo_id = $user->photo_id;
                    
                    $photo = Photo::findOrFail($user_photo_id);
    
                    $photo->delete();
    
                }
    
            }
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images/uploads/users', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
            
        }

        $user->update($input);

        Session::flash('updated_user', 'User ' . $user->name . ' has been successfully updated.');

        return redirect()->route('admin.users.index');


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
        
        if($user->photo) {

            $image_path = public_path() . $user->photo->file;

            if(file_exists($image_path)) {

                unlink($image_path);

                $user_photo_id = $user->photo_id;
                
                $photo = Photo::findOrFail($user_photo_id);

                $photo->delete();

            }

        }

        $user->delete();
        
        Session::flash('deleted_user', 'User ' . $user->name . ' has been successfully deleted.');        
    
        return redirect()->route('admin.users.index');
    }
}
