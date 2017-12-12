<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\FallasModel;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator;
use Exception;
use Log;

class FallasController extends Controller {

    //
    private $rulesCreated = array(
        'falla' => 'required',
    );
    private $rulesUpdate = array(
        'falla' => 'required',
    );
    private $rulesMessages = array(
        'falla.required' => 'Debe Ingresar la Falla!',
    );

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //todos los Infocentros
        $fallas = FallasModel::fallas();
        return view('falla.index')->with('fallas', $fallas);
    }

    public function create() {
        // Creacion de una Falla
        return view('falla.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('falla/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $canaima = new FallasModel();
        $canaima->falla = $request->get('falla');
        $canaima->save();
        notify()->flash('Se ha Registrado la Falla correctamente', 'success');
        return redirect()->route('falla.index');
    }

    public function edit($id) {
//
        $falla = FallasModel::findOrFail($id);
        if (!$falla) {
            notify()->flash('la falla no exite verifique!', 'warning');
            return redirect()->route('falla.index');
        } else {
            return View('falla.edit')->with('falla', $falla);
        }
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('falla/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $falla = FallasModel::find($id);
        if (is_null($falla)) {
            notify()->flash('la falla no exite', 'error');
            return redirect()->route('falla.index');
        }
        $falla->falla = $request->get('falla');
        $falla->save();
        notify()->flash('Se ha Actualizado la Falla Correctamente', 'success');
        return redirect()->route('falla.index');
    }

    public function destroy($id) {
        try {
            $result = FallasModel::deleteFalla($id);
            if ($result == 100) {
                notify()->flash('Se ha eliminado Safisfactoriamente', 'success');
                return redirect()->route('falla.index');
            }
        } catch (Exception $e) {
            Log::error('FallaController@destroy: ' . $e->getMessage());
            $code = $e->getCode();
            $this->processingError($code);
            if ($code == 23000) {
                notify()->flash('No se puede eliminar porque esta asociado a un beneficiario', 'warning');
                return redirect()->route('falla.index');
            }
        }
    }

}
