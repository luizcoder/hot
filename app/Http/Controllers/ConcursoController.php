<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Concurso;
use App\Hotsite;

class ConcursoController extends Controller
{
    
    /**
     * Validação de concurso
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|max:255',
            'termo_url' => 'required|max:255',
            'pergunta' => 'required|max:255',
            'hotsite_id' => 'required|exists:hotsites,id', 
        ]);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concursos = Concurso::with('hotsite')->get();
        return view('concurso-list', ['concursos' => $concursos] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotsites = Hotsite::all();
        return view('concurso-create', ['hotsites' => $hotsites] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($data);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
    
        $concurso = Concurso::create([
            'nome' => $data['nome'],
            'termo_url' => $data['termo_url'],
            'pergunta' => $data['pergunta'],
            'hotsite_id' => $data['hotsite_id'],
            'descricao' => (isset($data['descricao']))?$data['descricao']:''
        ]);
        
        if($concurso){
            return redirect('admin/concurso');
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
