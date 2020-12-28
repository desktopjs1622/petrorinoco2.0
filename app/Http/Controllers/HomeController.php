<?php

namespace App\Http\Controllers;


use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Validated\FormRegistroPersonalCreateRequest;
use App\Models\Condicion_Ingreso;
use App\Models\Estado_Civil;
use App\Models\Estado;
use App\Models\Municipios;
use App\Models\Parroquias;
use App\Models\Instituciones;
use App\Models\Nucleos;
use App\Models\Tipo_Genero;
use App\Models\Tipo_Personal;
use App\Models\RegistroPersonal;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function registroLaboral()
    {
        $condicion_ingreso = Condicion_Ingreso::all();
        $estado_civil = Estado_Civil::all();
        $estados = Estado::all();
        $institucion = Instituciones::all();
        $tipo_nucleo = Nucleos::all();
        $tipo_genero = Tipo_Genero::all();
        $tipo_personal = Tipo_Personal::all();

        return view(
            'registro', 
            compact(
                'condicion_ingreso',
                'estado_civil',
                'institucion', 
                'estados', 
                'tipo_nucleo',
                'tipo_genero',
                'tipo_personal'
            )
        );
    }

    public function getMunicipios(Request $request, $id) 
    {
        if($request->ajax()) {
            $municipio = Municipios::municipios($id);
            return response()->json($municipio);
        }
    }

    public function getParroquias(Request $request, $id) 
    {
        if($request->ajax()) {
            $parroquia = Parroquias::parroquias($id);
            return response()->json($parroquia);
        }
    }

    public function registrodepersonal(FormRegistroPersonalCreateRequest $request)
    {
        
        $id_usuario = Auth::user()->id; // aqui capturo el id del usuario logeado
        
        $personal = new RegistroPersonal; //instanciando la tabla en donde se va a almacenar el registro
        $personal->id_usuario = $id_usuario; // asigno a la variable id_usuario el valor que trae el usuario de la sesion
        $personal->id_instituciones = implode(',',$request->institucion);
        $personal->id_estado = implode(',', $request->estado);
        $personal->id_municipio = $request->municipio;
        $personal->id_parroquia = $request->parroquia;
        $personal->id_nucleo = implode(',', $request->nucleo);
        $personal->id_tipo_personal = implode(',', $request->tipo_personal);
        $personal->id_condicion_ingreso = implode(',', $request->condegreso);
        $personal->primer_nombre = $request->nombre;
        $personal->segundo_nombre = $request->segnombre;
        $personal->primer_apellido = $request->apellido;
        $personal->segundo_apellido = $request->sgap;
        $personal->cedula = $request->cedulapersonal;
        $personal->fecha_nacimiento = $request->fnacimiento;
        $personal->id_sexualidad = implode(',', $request->sexo);
        $personal->id_estado_civil = implode(',', $request->estcivil);
        $personal->fecha_ingreso = $request->fingreso;
        $personal->fecha_egreso = $request->fegreso;
        $personal->correo_email = $request->userEmail;

        if($personal == true) {
            $personal->save();
            Session::flash('save', 'Se ha Creado el Registro de '.$personal->primer_nombre.' '.$personal->primer_apellido.' Correctamente');
            return redirect('/registro-de-personal');
        }else {
            return redirect('/home'); 
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

}