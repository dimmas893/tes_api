<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;
use App\Http\Resources\ShoppingResource;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tags = Shopping::get();
        return $tags;
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
       $request->validate([
            'name' => 'required',
            'createddate' => 'required',
         ]);

        $shopping = Shopping::create([
             'name' => $request->name,
             'createddate' => $request->createddate,
         ]);

         return response()->json([
            'message' => 'Your cart has been removed',
            'data' => $shopping,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping $shopping)
    {
         return new ShoppingResource($shopping);
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
    public function update(Request $request, Shopping $shopping)
    {


            $request->validate([
            'name' => 'required',
            'createddate' => 'required',
         ]);

         $shopping->update([
            'name' => $request->name,
             'createddate' => $request->createddate,
         ]);

           return response()->json([
            'message' => 'Your cart has been update',
            'data' => $shopping,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping $shopping)
    {
          $shopping->delete();
        return response()->json([
            'message' => 'Your cart has been removed',
        ]);
    }
}
