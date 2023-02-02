<?php

namespace App\Http\Controllers;

use App\Models\Feeds;
use App\Models\Pets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pets::where('author_id',Auth::user()->id)->get();
        $posts = Feeds::where('author_id', Auth::user()->id)->get();
        //dd($posts);
        $userdata = User::where('id',Auth::user()->id)->first();
//        dd($userdata);
//        $posts = Feeds::all();

        return view('components.profile.profile', ['pets'=>$pets, 'posts'=>$posts, 'userdata'=>$userdata]);
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


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pets = Pets::where('author_id',$id)->get();
        $posts = Feeds::where('author_id',$id)->get();
        $userdata = User::where('id',$id)->get();
//        dd($userdata);

        return view('components.profile.profile', ['pets'=>$pets, 'posts'=>$posts, 'userdata'=>$userdata]);
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
        //
    }
}
