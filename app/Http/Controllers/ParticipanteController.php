<?php

namespace App\Http\Controllers;

use App\Hotsite;
use App\Participante;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;


class ParticipanteController extends Controller
{
    
    /**
     * Validação de participante
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|unique:participantes',
            'telefone' => 'required|max:255', 
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hotsite_apelido)
    {
        $hotsite = Hotsite::where('apelido',$hotsite_apelido)->first();
        $participantes = Participante::with('hotsite')->where('hotsite_id', $hotsite->id )->get();
        return view('participante-list', ['participantes'=> $participantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participante-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $hotsite_apelido)
    {
        $hotsite = Hotsite::where('apelido',$hotsite_apelido)->firstOrFail();
        
        $data = $request->all();
        $validator = $this->validator($data);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
    
        $participante = Participante::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'cpf' => $data['cpf'],
            'hotsite_id' => $hotsite->id
        ]);
        
        if( $participante){
            return redirect( $hotsite_apelido . '/participantes');
        }
        
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
        //
    }
}
