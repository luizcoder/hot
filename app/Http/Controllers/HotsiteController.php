<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Hotsite;

class HotsiteController extends Controller
{
    
     /**
     * Validação de hotsite
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|max:255',
            'apelido' => 'required|unique:hotsites|max:255',
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hotsite-list',['hotsites'=> Hotsite::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotsite-create');

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
    
        $hotsite = Hotsite::create([
            'nome' => $data['nome'],
            'apelido' => $data['apelido'],            
            'descricao' => (isset($data['descricao']))?$data['descricao']:''
        ]);
        
        if($hotsite){
            return redirect('admin/hotsite');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hotsite_apelido)
    {
        $hotsite = Hotsite::where('apelido',$hotsite_apelido)->first()->toArray();
        return view('hotsite-intro', ['hotsite' => $hotsite]);
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
