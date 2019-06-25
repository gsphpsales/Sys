<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categories::all();
        return view('category.cat', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('category.cat_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $cat = new Categories();
        $cat->name = $request->input('name');
        $cat->desc = $request->input('desc');
        $cat->status = "1";
        $cat->save();
        return redirect('/cat');
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
         $cat =  Categories::find($id);
        if (isset($cat)) {
            return view('category.cat_edi', compact('cat'));
        }
        return redirect('/cat');
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
          $cat =  Categories::find($id);
        if (isset($cat)) {
            $cat->name = $request->input('name');
            $cat->desc = $request->input('desc');
            $cat->save();
        }
        return redirect('/cat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat =  Categories::find($id);
        if (isset($cat)) {
            $cat->delete();
        }
        return redirect('/cat');
    }

    public function indexJson()
    {
        $cats = Categories::all();
        return json_encode($cats);
    }    

}
