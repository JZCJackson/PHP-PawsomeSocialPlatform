<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use App\Models\User;
use File;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feed = Feeds::all();
        $users = User::all();
        return view('Components.Feed.feed', ['feed'=>$feed, 'users'=>$users]);
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
        if($request->hasFile('picture')){
            $request->validate([
                'image' =>'mimes:jpeg,bmp,png'
            ]);

            $request->picture->store('feed','public');

            $feed = new Feeds([
                'author_id' => $request->get('author_id'),
                'description' =>$request->get('description'),
                'picture' => $request->picture->hashName()
            ]);

            $feed->save();
        }
        return redirect('/feed');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        if (File::exists(public_path('/feed/'. Feeds::find($id)->value('picture')))) {
            File::delete(public_path('/feed/'. Feeds::find($id)->value('picture')));
        }
        File::delete(Feeds::find($id)->value('picture'));
        Feeds::find($id)->delete();
        return redirect('/feed');
    }
}
