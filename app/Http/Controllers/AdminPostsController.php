<?php

namespace App\Http\Controllers;

use App\Post;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        
        return view('admin.posts.create', compact('categories'));
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
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'          
        ], [
            'required' => 'This field is required.'
        ]);

        $input = $request->all();        
        $user = Auth::user();

        if($file = $request->file('photo_id')) {
            
            $name = time() . "_post_" . $file->getClientOriginalName();

            $file->move('images/uploads', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;
            
        }

        $user->posts()->create($input);

        Session::flash('created_post', 'Post successfully created.');

        return redirect()->route('admin.posts.index');
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
        $post = Post::findOrFail($id);
        
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
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
            'title' => 'required',
            'content' => 'required',       
        ], [
            'required' => 'This field is required.'
        ]);

        $input = $request->all();
        $post = Post::findOrFail($id);

        if($file = $request->file('photo_id')) {
            
            if($post->photo) {
                
                $image_path = public_path() . $post->photo->file;
    
                if(file_exists($image_path)) {
    
                    unlink($image_path);
    
                    $post_photo_id = $post->photo_id;
                    
                    $photo = Photo::findOrFail($post_photo_id);
    
                    $photo->delete();
    
                }
    
            }
            
            $name = time() . '_post_' . $file->getClientOriginalName();
            $file->move('images/uploads', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
            
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        Session::flash('updated_post', 'Post successfully updated.');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if($post->photo) {

            $image_path = public_path() . $post->photo->file;

            if(file_exists($image_path)) {

                unlink($image_path);

                $post_photo_id = $post->photo_id;
                
                $photo = Photo::findOrFail($post_photo_id);

                $photo->delete();

            }

        }

        $post->delete();
        
        Session::flash('deleted_post', 'Post successfully deleted.');        
    
        return redirect()->route('admin.posts.index');
    }
}
