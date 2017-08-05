<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\EstadoModel;
use App\MunicipioModel;
use App\ParroquiaModel;
use App\BenefiriarioModel;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator;

class BeneficiarioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    private $rulesCreated = array(
        'cedula' => array('required', 'unique:beneficiario', 'regex:/^[A-Z]{1}-\d{8}$/'),
        'nombres' => 'required',
        'apellidos' => 'required',
        'email' => 'required|email|unique:beneficiario',
        'telefono' => array('required', 'regex:/^\d{4}-\d{7}$/'),
        'direccion' => 'required',
        'estado_id' => 'required|not_in:0|exists:estado,id',
        'municipio_id' => 'required|not_in:0|exists:municipio,id',
        'parroquia_id' => 'required|not_in:0|exists:parroquia,id',
    );
    private $rulesUpdate = array(
        'cedula' => array('required', 'exists:beneficiario,cedula', 'regex:/^[A-Z]{1}-\d{8}$/'),
        'nombres' => 'required',
        'apellidos' => 'required',
        'email' => 'required|email|exists:beneficiario,email',
        'telefono' => array('required', 'regex:/^\d{4}-\d{7}$/'),
        'direccion' => 'required',
        'estado_id' => 'required|not_in:0|exists:estado,id',
        'municipio_id' => 'required|not_in:0|exists:municipio,id',
        'parroquia_id' => 'required|not_in:0|exists:parroquia,id',
    );
    private $rulesMessages = array(
        'cedula.regex' => 'la cédula debe tener el formato V-00000000',
        'telefono.regex' => 'la telefono debe tener el formato 0000-0000000',
        'estado_id.required' => 'El estado es obligatorio',
        'estado_id.exists' => 'El estado no exite!',
        'estado_id.not_in' => 'Debe Seleccionar un Estado',
        'municipio_id.required' => 'El campo municipio es obligatorio',
        'municipio_id.not_in' => 'Debe Seleccionar un Municipio',
        'municipio_id.exists' => 'El campo municipio no exite!',
        'parroquia_id.required' => 'El campo parroquia es obligatorio',
        'parroquia_id.not_in' => 'Debe Seleccionar una Parroquia',
        'parroquia_id.exists' => 'la parroquia no exite!',
    );

    public function index() {
        //todos los Beneficiarios
        $beneficiarios = BenefiriarioModel::all();
        return view('beneficiario.index')->with('beneficiarios', $beneficiarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $estados = EstadoModel::all();
        return view('beneficiario.create')->with('estados', $estados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('beneficiario/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $beneficiario = new BenefiriarioModel();
        $beneficiario->cedula = $request->get('cedula');
        $beneficiario->nombres = $request->get('nombres');
        $beneficiario->apellidos = $request->get('apellidos');
        $beneficiario->email = $request->get('email');
        $beneficiario->telefono = $request->get('telefono');
        $beneficiario->direccion = $request->get('direccion');
        $beneficiario->parroquia_id = $request->get('parroquia_id');
        $beneficiario->save();
        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('Se ha Registrado el Beneficiario Correctamente', 'success');
        return redirect()->route('beneficiario.index');
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
        $beneficiario = BenefiriarioModel::find($id);
        $estados = EstadoModel::all(); 
//dd($beneficiario->parroquia->municipio->estado);
        
        return View('beneficiario.edit')->with('beneficiario', $beneficiario)->with('estados', $estados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('beneficiario/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $beneficiario = BenefiriarioModel::find($id);
        if (is_null($beneficiario)) {
            notify()->flash('El Beneficiario no exite', 'error');
            return redirect()->route('beneficiario.index');
        }
        $beneficiario->nombres = $request->get('nombres');
        $beneficiario->apellidos = $request->get('apellidos');
        $beneficiario->telefono = $request->get('telefono');
        $beneficiario->direccion = $request->get('direccion');
        $beneficiario->parroquia_id = $request->get('parroquia_id');
        $beneficiario->save();
        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('El Beneficiario  se ha actualizado correctamente', 'success');
        return redirect()->route('beneficiario.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $usuario = BenefiriarioModel::find($id);
        $usuario->delete();
        //Flash::error('El usuario ' . $usuario->nombre_usuario . ' ');
        notify()->flash('El Beneficiario se ha sido eliminado correctamente', 'error');
        return redirect()->route('usuario.index');
    }

    public function getMunicipios(Request $request, $id) {
        if ($request->ajax()) {
            $municipios = MunicipioModel::municipios($id);
            return response()->json($municipios);
        }
    }

    public function getParroquias(Request $request, $id) {
        if ($request->ajax()) {
            $parroquias = ParroquiaModel::parroquias($id);
            return response()->json($parroquias);
        }
    }

}
