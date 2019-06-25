<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;

class CliController extends Controller
{
   

     public function indexView()
    {
       return view('client.cli');
    }
    public function index()
    {
         $cli = Clients::all();
        return $cli->toJson();
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
           $cli = new Clients();
        $cli->razao_soc = $request->input('rs');
        $cli->fantasia = $request->input('nf');
        $cli->cnpj = $request->input('cnpj');
        $cli->ie = $request->input('ie');
        $cli->email = $request->input('email');
        $cli->celular = $request->input('cel');
        $cli->fixo = $request->input('fix');
        $cli->endereco = $request->input('end');
        $cli->endereco_ent = $request->input('endt');
        $cli->status = "Ativo";
        $cli->save();
        return json_encode($cli);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $cli =  Clients::find($id);
        if (isset($cli)) {
            # code...
            return json_encode($cli);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $cli = Clients::find($id);
        if (isset($cli)) {
            $cli->razao_soc = $request->input('rs');
            $cli->fantasia = $request->input('nf');
            $cli->cnpj = $request->input('cnpj');
            $cli->ie = $request->input('ie');
            $cli->email = $request->input('email');
            $cli->celular = $request->input('cel');
            $cli->fixo = $request->input('fix');
            $cli->endereco = $request->input('end');
            $cli->endereco_ent = $request->input('endt');
            $cli->status = "Ativo";
                $cli->save();
            return json_encode($cli);
        }
        return response('cliuto não encontrado', 404);
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
