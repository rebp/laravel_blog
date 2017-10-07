<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('author.profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'about_me' => 'required',     
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
            $file->move('images/uploads', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
            
        }

        $user->update($input);

        Session::flash('updated_profile', 'Your profile has been successfully updated.');

        return redirect()->route('author.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
