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
use Exception;
use Log;

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
        $canaimas = CanaimaModel::listCanaima();
        return view('canaima.index')->with(array('canaimas' => $canaimas));
    }

    public function index2() {
//
        $canaimas = CanaimaModel::listCanaima();
        return view('tecnico.canaima.index')->with(array('canaimas' => $canaimas));
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

    public function create2() {
//
        return view('tecnico.canaima.create');
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

    public function store2(Request $request) {
//
        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('tecnico/canaima/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        $canaima = new CanaimaModel();
        $canaima->modelo = $request->get('modelo');
        $canaima->save();
//Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('Se ha Registrado el Modelo de Cainama Correctamente', 'success');
        return redirect()->route('tecnico.canaima.index');
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
        $canaima = CanaimaModel::findOrFail($id);
        if (!$canaima) {
            notify()->flash('la canaima no exite verifique!', 'warning');
            return redirect()->route('canaima.index');
        } else {
            return View('canaima.edit')->with('canaima', $canaima);
        }
    }

    public function edit2($id) {
//
        $canaima = CanaimaModel::findOrFail($id);
        if (!$canaima) {
            notify()->flash('la canaima no exite verifique!', 'warning');
            return redirect()->route('tecnico.canaima.index');
        } else {
            return View('tecnico.canaima.edit')->with('canaima', $canaima);
        }
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
            return redirect('canaima/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $canaima = CanaimaModel::find($id);
        if (is_null($canaima)) {
            notify()->flash('la canaima no exite', 'error');
            return redirect()->route('canaima.index');
        }
        $canaima = new CanaimaModel();
        $canaima->modelo = $request->get('modelo');
        $canaima->save();
        notify()->flash('Se ha Actualizado el Modelo de Cainama Correctamente', 'success');
        return redirect()->route('canaima.index');
    }

    public function update2(Request $request, $id) {
        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('tecnico/canaima/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
        $canaima = CanaimaModel::find($id);
        if (is_null($canaima)) {
            notify()->flash('la canaima no exite', 'error');
            return redirect()->route('tecnico.canaima.index');
        }
        $canaima = new CanaimaModel();
        $canaima->modelo = $request->get('modelo');
        $canaima->save();
        notify()->flash('Se ha Actualizado el Modelo de Cainama Correctamente', 'success');
        return redirect()->route('tecnico.canaima.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $result = CanaimaModel::deleteCanaima($id);
            if ($result == 100) {
                notify()->flash('Se ha eliminado Safisfactoriamente', 'success');
                return redirect()->route('canaima.index');
            }
        } catch (Exception $e) {
            Log::error('CanaimaController@getZonesByPoint: ' . $e->getMessage());
            $code = $e->getCode();
            $this->processingError($code);
            if ($code == 23000) {
                notify()->flash('No se puede eliminar porque esta asociado a un beneficiario', 'warning');
                return redirect()->route('canaima.index');
            }
        }
    }

    public function eliminar($id) {
        try {
            $result = CanaimaModel::deleteCanaima($id);
            if ($result == 100) {
                notify()->flash('Se ha eliminado Safisfactoriamente', 'success');
                return redirect()->route('tecnico.canaima.index');
            }
        } catch (Exception $e) {
            Log::error('CanaimaController@getZonesByPoint: ' . $e->getMessage());
            $code = $e->getCode();
            $this->processingError($code);
            if ($code == 23000) {
                notify()->flash('No se puede eliminar porque esta asociado a un beneficiario', 'warning');
                return redirect()->route('tecnico.canaima.index');
            }
        }
    }

    public function getBeneficiarios(Request $request) {
        if ($request->ajax()) {
            $beneficiarios = BenefiriarioModel::beneficiarios();

            return response()->json($beneficiarios);
        }
    }

}
