<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
      return Post::orderBy('created_at', 'desc')->paginate(100);
     //$posts =  Post::all();
     //  return $request->all();
    //return response()->json($posts);
      // return "list all patient details";
    }

    public function store(Request $request)
    {
        // For creating a new record (post)

        try {
            $post = new Post();
            $post->fullname = $request->fullname;
            $post->age = $request->age;
            $post->dob = $request->dob;
            $post->adharno = $request->adharno;
            $post->address = $request->address;
            $post->vaccinated = $request->vaccinated;
            $post->dose1date = $request->dose1date;
            $post->dose2date = $request->dose2date;
            $post->result = $request->result;
            $post->isolation = $request->isolation;
         
            if ($post->save()) {
                return response()->json(['status' => 'success', 'message' => 'Post created successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }



    public function update(Request $request, $id)
    {
        // For Updating a record(post)

        try {
            $post = Post::findOrFail($id);
            $post->fullname = $request->fullname;
            $post->age = $request->age;
            $post->dob = $request->dob;
            $post->adharno = $request->adharno;
            $post->address = $request->address;
            $post->vaccinated = $request->vaccinated;
            $post->dose1date = $request->dose1date;
            $post->dose2date = $request->dose2date;
            $post->result = $request->result;
            $post->isolation = $request->isolation;
         
            if ($post->save()) {
                return response()->json(['status' => 'success', 'message' => 'Post updated successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        
    }

    public function destroy($id)
    {
        
        try {
            $post = Post::findOrFail($id);
            if ($post->delete()) {
                return response()->json(['status' => 'success', 'message' => 'Post deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }



}
