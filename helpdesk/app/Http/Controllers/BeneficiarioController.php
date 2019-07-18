<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\EstadoModel;
use App\MunicipioModel;
use App\ParroquiaModel;
use App\BenefiriarioModel;
use App\beneficiario_x_canaima;
use App\CanaimaModel;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator;
use App;

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

    //funcion exclusiva para el perfil de Administrador
    public function index() {
        //todos los Beneficiarios
        $beneficiarios = BenefiriarioModel::all();
        return view('beneficiario.index')->with('beneficiarios', $beneficiarios);
    }

    //funcion exclusiva para el perfil de tecnico
    public function index2() {
        //todos los Beneficiarios
        $beneficiarios = BenefiriarioModel::all();
        return view('tecnico.beneficiario.index')->with('beneficiarios', $beneficiarios);
    }

    //funcion exclusiva para el perfil de facilitador
    public function index3() {
        //todos los Beneficiarios
        $beneficiarios = BenefiriarioModel::all();
        return view('facilitador.beneficiario.index')->with('beneficiarios', $beneficiarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $canaimas = CanaimaModel::all();
        $estados = EstadoModel::all();
        return view('beneficiario.create')->with('estados', $estados)->with('canaimas', $canaimas);
    }

    public function create2() {
        //
        $canaimas = CanaimaModel::all();
        $estados = EstadoModel::all();
        return view('tecnico.beneficiario.create')->with('estados', $estados)->with('canaimas', $canaimas);
    }

    public function create3() {
        //
        $canaimas = CanaimaModel::all();
        $estados = EstadoModel::all();
        return view('facilitador.beneficiario.create')->with('estados', $estados)->with('canaimas', $canaimas);
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
        if ($beneficiario->save()) {
            $id = $beneficiario->id;
            foreach ($request->modelo as $key => $v) {

                $data = array('serial_canaima' => $request->serial [$key],
                    'sol_can' => $request->robada,
                    'descripcion' => $request->descripcion [$key],
                    'beneficiario_id' => $id,
                    'canaima_id' => $v);

                beneficiario_x_canaima::insert($data);
            }
        }
        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('Se ha Registrado el Beneficiario Correctamente', 'success');
        return redirect()->route('beneficiario.index');
    }

    public function store2(Request $request) {

        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('tecnico/beneficiario/create')
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
        if ($beneficiario->save()) {
            $id = $beneficiario->id;
            foreach ($request->modelo as $key => $v) {

                $data = array('serial_canaima' => $request->serial [$key],
                    'sol_can' => $request->robada,
                    'descripcion' => $request->descripcion [$key],
                    'beneficiario_id' => $id,
                    'canaima_id' => $v);

                beneficiario_x_canaima::insert($data);
            }
        }
        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('Se ha Registrado el Beneficiario Correctamente', 'success');
        return redirect('tecnico/beneficiario/index');
    }

    public function store3(Request $request) {

        $validator = Validator::make($request->all(), $this->rulesCreated, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect('facilitador/beneficiario/create')
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
        if ($beneficiario->save()) {
            $id = $beneficiario->id;
            foreach ($request->modelo as $key => $v) {

                $data = array('serial_canaima' => $request->serial [$key],
                    'sol_can' => $request->robada,
                    'descripcion' => $request->descripcion [$key],
                    'beneficiario_id' => $id,
                    'canaima_id' => $v);

                beneficiario_x_canaima::insert($data);
            }
        }
        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('Se ha Registrado el Beneficiario Correctamente', 'success');
        return redirect()->route('facilitador.beneficiario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        try {
            $beneficiario = BenefiriarioModel::getIdBeneficiario($id);

            // dd($beneficiario);
            return view('beneficiario.show')->with('beneficiario', $beneficiario);
        } catch (Exception $e) {
            return $e;
        }
    }

 
   public function beneficiarioReporteId(Request $request, $id) {

       $usuario = $request->user();
       
       
       $beneficiario = BenefiriarioModel::getIdBeneficiario($id);
       $view = view('beneficiario.ReporteBeneficiarioId')->with('beneficiario',$beneficiario)
               ->with('usuario',$usuario)->render();
       
       //PDF
       $pdf = App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
       return $pdf->stream("ReporteBeneficiario.pdf", array("Attachment"=>1));
    }

    //para la sesscion del Facilitador
    public function show2($id) {
        //
        try {
            $beneficiario = BenefiriarioModel::getIdBeneficiario($id);

            // dd($beneficiario);
            return view('facilitador.beneficiario.show')->with('beneficiario', $beneficiario);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function show3($id) {
        //
        try {
            $beneficiario = BenefiriarioModel::getIdBeneficiario($id);

            // dd($beneficiario);
            return view('tecnico.beneficiario.show')->with('beneficiario', $beneficiario);
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $beneficiario = BenefiriarioModel::getIdBeneficiario($id);
        $estados = EstadoModel::all();
        $canaimass = CanaimaModel::all();
        return View('beneficiario.edit')->with('beneficiario', $beneficiario)->with('estados', $estados)->with('canaimass', $canaimass);
    }

    public function edit2($id) {
        //
        $beneficiario = BenefiriarioModel::getIdBeneficiario($id);
        $estados = EstadoModel::all();
        $canaimass = CanaimaModel::all();
        return View('tecnico.beneficiario.edit')->with('beneficiario', $beneficiario)->with('estados', $estados)->with('canaimass', $canaimass);
    }

    public function edit3($id) {
        //
        $beneficiario = BenefiriarioModel::getIdBeneficiario($id);
        $estados = EstadoModel::all();
        $canaimass = CanaimaModel::all();
        return View('facilitador.beneficiario.edit')->with('beneficiario', $beneficiario)->with('estados', $estados)->with('canaimass', $canaimass);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

//dd($request->get('canaimas'));

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
        if ($beneficiario->save()) {
            $beneficiario->canaimas()->sync($request->get('canaimas'));
        }

        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('El Beneficiario  se ha actualizado correctamente', 'success');
        return redirect()->route('beneficiario.index');
        //
    }

    public function actualizar(Request $request, $id) {


        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect()->route('tecnico.beneficiario.edit', $id)
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
        if ($beneficiario->save()) {
            $beneficiario->canaimas()->sync($request->get('canaimas'));
        }


        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('El Beneficiario  se ha actualizado correctamente', 'success');
        return redirect()->route('tecnico.beneficiario.index');
        //
    }

    public function actualizar2(Request $request, $id) {


        $validator = Validator::make($request->all(), $this->rulesUpdate, $this->rulesMessages);
        if ($validator->fails()) {
            return redirect()->route('facilitador.beneficiario.edit', $id)
                            ->withErrors($validator)
                            ->withInput();
        }
        $beneficiario = BenefiriarioModel::find($id);
        if (is_null($beneficiario)) {
            notify()->flash('El Beneficiario no exite', 'error');
            return redirect()->route('facilitador.beneficiario.index');
        }
        $beneficiario->nombres = $request->get('nombres');
        $beneficiario->apellidos = $request->get('apellidos');
        $beneficiario->telefono = $request->get('telefono');
        $beneficiario->direccion = $request->get('direccion');
        $beneficiario->parroquia_id = $request->get('parroquia_id');
        if ($beneficiario->save()) {
            $beneficiario->canaimas()->sync($request->get('canaimas'));
        }


        //Flash::success('Se ha Registrado el Beneficiario Correctamente');
        notify()->flash('El Beneficiario  se ha actualizado correctamente', 'success');
        return redirect()->route('facilitador.beneficiario.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy2($id) {
        //
        $usuario = BenefiriarioModel::find($id);
        $usuario->delete();
        //Flash::error('El usuario ' . $usuario->nombre_usuario . ' ');
        notify()->flash('El Beneficiario se ha sido eliminado correctamente', 'error');
        return redirect()->route('usuario.index');
    }

    public function destroy3($id) {
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

    public function getCedulaBeneficiario($cedula) {


        $beneficiario = BenefiriarioModel::getCedulaBeneficiario($cedula);
        return $beneficiario;
    }
    
    public function getCedulaBeneficiario2($cedula) {


        $beneficiario = BenefiriarioModel::getCedulaBeneficiario($cedula);
        return $beneficiario;
    }
}
