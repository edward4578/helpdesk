<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\InfocentroModel;
use App\EstadoModel;
use App\MunicipioModel;
use App\ParroquiaModel;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator;

class InfocentroController extends Controller {

    //
    private $rulesCreated = array(
        'mir' => 'required|unique:infocentros',
        'nombre_infocentro' => 'required',
        'activo' => 'required|not_in:0',
        'direccion' => 'required',
        'estado_id' => 'required',
        'municipio_id' => 'required|not_in:0|exists:municipio,id',
        'parroquia_id' => 'required|not_in:0|exists:parroquia,id',
    );
    private $rulesUpdate = array(
        'mir' => 'required',
        'nombre_infocentro' => 'required',
        'activo' => 'required|not_in:0',
        'direccion' => 'required',
        'estado_id' => 'required|not_in:0|exists:estado,id',
        'municipio_id' => 'required|not_in:0|exists:municipio,id',
        'parroquia_id' => 'required|not_in:0|exists:parroquia,id',
    );
    private $rulesMessages = array(
        'mir.required' => 'El mir es Obligatorio',
        'mir.unique' => 'El MIR ya exite Verifique',
        'nombre_infocentro.required' => 'El Nombre del Infocentro es requerido',
        'activo.not_in' => 'Debe seleccionar el Estado del Infocentro!',
        'estado_id.exists' => 'El estado no exite!',
        'estado_id.not_in' => 'Debe Seleccionar un Estado',
        'municipio_id.required' => 'El campo municipio es obligatorio',
        'municipio_id.not_in' => 'Debe Seleccionar un Municipio',
        'municipio_id.exists' => 'El campo municipio no exite!',
        'parroquia_id.required' => 'El campo parroquia es obligatorio',
        'parroquia_id.not_in' => 'Debe Seleccionar una Parroquia',
        'parroquia_id.exists' => 'la parroquia no exite!',
    );

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //todos los Infocentros
        $infocentros = InfocentroModel::infocentros();
        return view('infocentro.index')->with('infocentros', $infocentros);
    }

    public function index2() {
        //todos los Infocentros
        $infocentros = InfocentroModel::infocentros();
        return view('facilitador.infocentro.index')->with('infocentros', $infocentros);
    }
    
    
    public function create() {
        $estados = EstadoModel::all();
        return view('infocentro.create')->with('estados', $estados);
    }

    public function create2() {
        $estados = EstadoModel::all();
        return view('facilitador.infocentro.create')->with('estados', $estados);
    }
    
    
    
    
    public function store(Request $request) {

        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('infocentros/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $infocentro = new InfocentroModel();
        $infocentro->mir = $request->get('mir');
        $infocentro->nombre_infocentro = $request->get('nombre_infocentro');
        $infocentro->descripcion = $request->get('descripcion');
        $infocentro->activo = $request->get('activo');
        $infocentro->direccion = $request->get('direccion');
        $infocentro->estado_id = $request->get('estado_id');
        $infocentro->municipio_id = $request->get('municipio_id');
        $infocentro->parroquia_id = $request->get('parroquia_id');
        $infocentro->save();
        //Flash::success('Se ha Registrado el Infocentro Correctamente');
        notify()->flash('Se ha Registrado el Infocentro Correctamente', 'success');
        return redirect()->route('infocentro.index');
    }

    public function store2(Request $request) {

        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('facilitador/infocentro/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $infocentro = new InfocentroModel();
        $infocentro->mir = $request->get('mir');
        $infocentro->nombre_infocentro = $request->get('nombre_infocentro');
        $infocentro->descripcion = $request->get('descripcion');
        $infocentro->activo = $request->get('activo');
        $infocentro->direccion = $request->get('direccion');
        $infocentro->estado_id = $request->get('estado_id');
        $infocentro->municipio_id = $request->get('municipio_id');
        $infocentro->parroquia_id = $request->get('parroquia_id');
        $infocentro->save();
        //Flash::success('Se ha Registrado el Infocentro Correctamente');
        notify()->flash('Se ha Registrado el Infocentro Correctamente', 'success');
        return redirect()->route('facilitador.infocentro.index');
    }
    
    
    
    public function edit($id) {
        $infocentro = InfocentroModel::findOrFail($id);
        if (!$infocentro) {
            notify()->flash('El Infocentro no exite verifique!', 'warning');
            return redirect()->route('infocentro.index');
        } else {
            $estados = EstadoModel::all();
            return View('infocentro.edit')->with('infocentro', $infocentro)->with('estados', $estados);
        }
    }

    public function edit2($id) {
        $infocentro = InfocentroModel::findOrFail($id);
        if (!$infocentro) {
            notify()->flash('El Infocentro no exite verifique!', 'warning');
            return redirect()->route('facilitador.infocentro.index');
        } else {
            $estados = EstadoModel::all();
            return View('facilitador.infocentro.edit')->with('infocentro', $infocentro)->with('estados', $estados);
        }
    }
    
    
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('infocentro/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $infocentro = InfocentroModel::find($id);
        if (is_null($infocentro)) {
            notify()->flash('El infocentro no exite', 'error');
            return redirect()->route('infocentro.index');
        }
        $infocentro->mir = $request->get('mir');
        $infocentro->nombre_infocentro = $request->get('nombre_infocentro');
        $infocentro->descripcion = $request->get('descripcion');
        $infocentro->activo = $request->get('activo');
        $infocentro->direccion = $request->get('direccion');
        $infocentro->parroquia_id = $request->get('parroquia_id');
        $infocentro->save();
        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('El infocentro se ha actualizado correctamente', 'success');
        return redirect()->route('infocentro.index');
        //
    }

        public function updateDos(Request $request, $id) {
        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('facilitador/infocentro/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $infocentro = InfocentroModel::find($id);
        if (is_null($infocentro)) {
            notify()->flash('El infocentro no exite', 'error');
            return redirect()->route('infocentro.index');
        }
        $infocentro->mir = $request->get('mir');
        $infocentro->nombre_infocentro = $request->get('nombre_infocentro');
        $infocentro->descripcion = $request->get('descripcion');
        $infocentro->activo = $request->get('activo');
        $infocentro->direccion = $request->get('direccion');
        $infocentro->parroquia_id = $request->get('parroquia_id');
        $infocentro->save();
        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('El infocentro se ha actualizado correctamente', 'success');
        return redirect()->route('facilitador.infocentro.index');
        //
    }
    public function InfocentroReporteId($id) {

       $infocentros = infocentroModel::getIdBeneficiario($id);
       $view = view('infocentro.ReporteInfocentroId')->with('infocentros',$infocentro);
       
       //PDF
       $pdf = App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
       return $pdf->stream('infocentro');
    }
    
    public function destroy() {
        
    }

}
