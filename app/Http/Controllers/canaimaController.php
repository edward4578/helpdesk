<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\InfocentroModel;
use App\BenefiriarioModel;
use App\beneficiario_x_canaima;
use App\CanaimaModel;
use App\FallasModel;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator;

class canaimaController extends Controller {

    private $rulesCreated = array(
        'modelo' => 'required',
    );
    private $rulesUpdate = array(
        'modelo' => 'required',
    );
    private $rulesMessages = array(
        'modelo.required' => 'Debe Ingresar un Modelo de Canaima',
    );

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $canaimas = CanaimaModel::canaimas();
        return view('canaima.index')->with(array('canaimas' => $canaimas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('canaima.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('canaima/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $canaima = new CanaimaModel();
        $canaima->modelo = $request->get('modelo');
        $canaima->save();
        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('Se ha Registrado el Modelo de Cainama Correctamente', 'success');
        return redirect()->route('canaima.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $canaima = beneficiario_x_canaima::canaima_exist($id);
        
        dd($canaima);
        if ($canaima == true) {
            notify()->flash('El Modelo de Canaima no se Puede Eliminar', 'warning');
            return redirect()->route('canaima.index');
        }

        $canaima = CanaimaModel::find($id);
        $canaima->delete();
        notify()->flash('El Modelo de Canaima se ha Eliminado Correctamente', 'error');
        return redirect()->route('canaima.index');
    }

    public function getBeneficiarios(Request $request) {
        if ($request->ajax()) {
            $beneficiarios = BenefiriarioModel::beneficiarios();

            return response()->json($beneficiarios);
        }
    }

}
