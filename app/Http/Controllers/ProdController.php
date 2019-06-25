<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProdController extends Controller
{
    
     public function indexView()
    {
       return view('products.prod');
    }
    public function index()
    {
         $prods = products::all();
        return $prods->toJson();
        
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

    
    public function store(Request $request)
    {
        
       $prod = new Products();
        $prod->name = $request->input('name');
        $prod->ref = $request->input('ref');
        $prod->price_c = $request->input('price_c');
        $prod->price_s = $request->input('price_s');
        $prod->img = $request->input('img');
        $prod->cat_id = $request->input('cat_id');
        $prod->status = "Ativo";
        $prod->save();
        return json_encode($prod);
    }

   
    public function show($id)
    {
        $prod =  Products::find($id);
        if (isset($prod)) {
            # code...
            return json_encode($prod);
        }
        return response('Não encontrado', 404); 
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

  
    public function update(Request $request, $id)
    {
         $prod = Products::find($id);
        if (isset($prod)) {
            $prod->name = $request->input('np');
            $prod->ref = $request->input('ref');
            $prod->price_c = $request->input('pc');
            $prod->price_s = $request->input('pv');
            $prod->img = $request->input('img');
            $prod->cat_id = $request->input('catp');
                $prod->save();
            return json_encode($prod);
        }
        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Products::find($id);
        if (isset($prod)) {
            $prod->delete();
            return response('OK', 200);
        }
        return response('Produto não encontrado', 404);
    }
}
