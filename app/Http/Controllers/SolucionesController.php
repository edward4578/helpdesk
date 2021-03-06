<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SolucionesModel;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator;
use Exception;
use Log;

class SolucionesController extends Controller {

    //
    private $rulesCreated = array(
        'solucion' => 'required',
    );
    private $rulesUpdate = array(
        'solucion' => 'required',
    );
    private $rulesMessages = array(
        'solucion.required' => 'Debe Ingresar la Solución!',
    );

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //todos los Infocentros
        $soluciones = SolucionesModel::getSoluciones();
        return view('solucion.index')->with('soluciones', $soluciones);
    }

    public function index2() {
        //todos los Infocentros
        $soluciones = SolucionesModel::getSoluciones();
        return view('tecnico.solucion.index')->with('soluciones', $soluciones);
    }

    public function index3() {
        //todos los Infocentros
        $soluciones = SolucionesModel::getSoluciones();
        return view('facilitador.solucion.index')->with('soluciones', $soluciones);
    }

    
    
    
    
    public function create() {
        // Creacion de una Falla
        return view('solucion.create');
    }

    public function create2() {
        // Creacion de una Falla
        return view('tecnico.solucion.create');
    }

    public function create3() {
        // Creacion de una Falla
        return view('facilitador.solucion.create');
    }
    
    
    
    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('solucion/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $solucion = new SolucionesModel();
        $solucion->solucion = $request->get('solucion');
        $solucion->save();
        notify()->flash('Se ha Registrado la solucion correctamente', 'success');
        return redirect()->route('tecnico.solucion.index');
    }

    public function store2(Request $request) {
        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect()->route('tecnico.solucion.create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $solucion = new SolucionesModel();
        $solucion->solucion = $request->get('solucion');
        $solucion->save();
        notify()->flash('Se ha Registrado la solucion correctamente', 'success');
        return redirect()->route('tecnico.solucion.index');
    }

    
    public function store3(Request $request) {
        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect()->route('facilitador.solucion.create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $solucion = new SolucionesModel();
        $solucion->solucion = $request->get('solucion');
        $solucion->save();
        notify()->flash('Se ha Registrado la solucion correctamente', 'success');
        return redirect()->route('facilitador.solucion.index');
    }
    
        public function show($id) {
        //
        try {
            

           
        } catch (Exception $e) {
            return $e;
        }
    }
    
    
    
    public function edit($id) {
//
        $solucion = SolucionesModel::findOrFail($id);
        if (!$solucion) {
            notify()->flash('la Solución no exite verifique!', 'warning');
            return redirect()->route('solucion.index');
        } else {
            return View('solucion.edit')->with('solucion', $solucion);
        }
    }

    public function edit2($id) {
//
        $solucion = SolucionesModel::findOrFail($id);
        if (!$solucion) {
            notify()->flash('la Solución no exite verifique!', 'warning');
            return redirect()->route('tecnico.solucion.index');
        } else {
            return View('tecnico.solucion.edit')->with('solucion', $solucion);
        }
    }
    
    public function edit3($id) {
//
        $solucion = SolucionesModel::findOrFail($id);
        if (!$solucion) {
            notify()->flash('la Solución no exite verifique!', 'warning');
            return redirect()->route('facilitador.solucion.index');
        } else {
            return View('facilitador.solucion.edit')->with('solucion', $solucion);
        }
    }
    
    
    

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('solucion/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $solucion = SolucionesModel::find($id);
        if (is_null($solucion)) {
            notify()->flash('la Solución no exite', 'error');
            return redirect()->route('solucion.index');
        }
        $solucion->solucion = $request->get('solucion');
        $solucion->save();
        notify()->flash('Se ha Actualizado la Solución Correctamente', 'success');
        return redirect()->route('solucion.index');
    }

    public function update2(Request $request, $id) {
        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('tecnico/solucion/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $solucion = SolucionesModel::find($id);
        if (is_null($solucion)) {
            notify()->flash('la Solución no exite', 'error');
            return redirect()->route('tecnico.solucion.index');
        }
        $solucion->solucion = $request->get('solucion');
        $solucion->save();
        notify()->flash('Se ha Actualizado la Solución Correctamente', 'success');
        return redirect()->route('tecnico.solucion.index');
    }

    
    public function update3(Request $request, $id) {
        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('facilitador/solucion/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $solucion = SolucionesModel::find($id);
        if (is_null($solucion)) {
            notify()->flash('la Solución no exite', 'error');
            return redirect()->route('facilitador.solucion.index');
        }
        $solucion->solucion = $request->get('solucion');
        $solucion->save();
        notify()->flash('Se ha Actualizado la Solución Correctamente', 'success');
        return redirect()->route('facilitador.solucion.index');
    }
    
    
    
    
    public function destroy($id) {
        try {
            $result = SolucionesModel::deleteSolucion($id);
            if ($result == 100) {
                notify()->flash('Se ha eliminado Safisfactoriamente', 'success');
                return redirect()->route('solucion.index');
            }
        } catch (Exception $e) {
            Log::error('SolucionController@destroy: ' . $e->getMessage());
            $code = $e->getCode();
            $this->processingError($code);
            if ($code == 23000) {
                notify()->flash('No se puede eliminar porque esta asociado a una Canaima', 'warning');
                return redirect()->route('solucion.index');
            }
        }
    }

    public function eliminarSolucion($id) {
        try {
            $result = SolucionesModel::deleteSolucion($id);
            if ($result == 100) {
                notify()->flash('Se ha eliminado Safisfactoriamente', 'success');
                return redirect()->route('tecnico.solucion.index');
            }
        } catch (Exception $e) {
            Log::error('SolucionController@destroy: ' . $e->getMessage());
            $code = $e->getCode();
            $this->processingError($code);
            if ($code == 23000) {
                notify()->flash('No se puede eliminar porque esta asociado a una Canaima', 'warning');
                return redirect()->route('tecnico.solucion.index');
            }
        }
    }

    public function eliminarSolucion3($id) {
        try {
            $result = SolucionesModel::deleteSolucion($id);
            if ($result == 100) {
                notify()->flash('Se ha eliminado Safisfactoriamente', 'success');
                return redirect()->route('facilitador.solucion.index');
            }
        } catch (Exception $e) {
            Log::error('SolucionController@destroy: ' . $e->getMessage());
            $code = $e->getCode();
            $this->processingError($code);
            if ($code == 23000) {
                notify()->flash('No se puede eliminar porque esta asociado a una Canaima', 'warning');
                return redirect()->route('facilitador.solucion.index');
            }
        }
    }

    
    
    
    
    
    
    
    public function getSoluciones() {

        $soluciones = SolucionesModel::getSoluciones();
        return $soluciones;
    }

}
