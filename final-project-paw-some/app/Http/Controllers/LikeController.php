<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;


class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $like = new Like([
            'post_id' => $request->get('post_id'),
            'user_id' => $request->get('user_id')
        ]);

        $likeCheck = Like::where('user_id', $request->get('user_id'))
            ->where('post_id', $request->get('post_id'))
            ->first();

        if ($likeCheck) {
            return response()->json([
                'liked' => false
            ]);
        } else {
            $like->save();
            return response()->json([
                'liked' => true
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Like::find($id)->delete();
        return response()->json([
            'disliked' => true
        ]);
    }
}
