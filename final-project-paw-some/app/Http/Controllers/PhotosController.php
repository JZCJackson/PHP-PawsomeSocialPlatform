<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos=Photos::all();
        return view('Components.Photos.photos', ['photos'=>$photos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Components.Photos.create-photo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('picture')){
            $request->validate([
                'image' =>'mimes:jpeg,bmp,png'
            ]);

            $request->picture->store('photos','public');

            $photo = new Photos([
                'name' => $request->get('name'),
                'description' =>$request->get('description'),
                'author_id' => $request->get('author_id'),
                'picture' => $request->picture->hashName()

            ]);

            $photo->save();
        }

        return redirect('/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $photo = Photos::find($id);
        return view('Components.photos.update-photo',['photo'=>$photo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photos::find($id)->delete();
        return redirect('/photos');
    }

    public function uploadform(){
        return view('uploads.uploadimage');
    }
    public function uploadpost(Request $request){
        $request->validate([
            'upfile' => 'required',
        ]);

        $files = $request->file('upfile');
        foreach($files as $file) {

            $imagePath = $file->getClientOriginalName();

            $file->move(public_path('assets/images/photos'), $imagePath);



        }
        return back()->with('image', $imagePath);
    }
}
