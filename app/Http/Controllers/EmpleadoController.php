<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Empleado;
use MongoDB\Driver\Session;
use SoapClient;
use GuzzleHttp\Client;

class EmpleadoController extends Controller
{
    public function index()
    {
        //
        $empleados = Empleado::orderBy('id','DESC')->paginate(20);
        return view ('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $currencies = $this->valorMoneda();
        $valor_actual = end($currencies->bmx->series[0]->datos);
        //dd($valor_actual->dato);

         return view('Empleado.create',["valor_actual"=>$valor_actual->dato]);
    }

    public function store(Request $request)
    {
        $this->validaDatos($request);
        Empleado::create($request->all());
        return redirect()->route('empleado.index')->with('success','Registro creado');
    }
      /*public function codigoRandom(){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }*/
    public function show($id)
    {
        $empleado = Empleado::find($id);

        $empleado->porcentajeDolar = $this->obtenerPorcentajeDolar($empleado->sueldo_dolar);
        $empleado->porcentajePesos = $this->obtenerPorcentajePesos($empleado->sueldo_pesos);

        return view('empleado.show', compact('empleado'));
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);

        $currencies = $this->valorMoneda();
        $valor_actual = end($currencies->bmx->series[0]->datos);

        return view('Empleado.edit', ["valor_actual"=>$valor_actual->dato], compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $this->validaDatos($request);
        Empleado::find($id)->update($request->all());
        return redirect()->route('empleado.index')->with('success','Registro Actualizado');

    }
    private function valorMoneda(){
        $wsMoneda = "https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos";
        $client = new Client();
        $headers = [
            'Bmx-Token' => '0fce7d85c76c9afa6f8ef05f95d50a11c62573c637d28706e28f2a81e84264e5'
        ];
        $response = $client->request('GET', $wsMoneda, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
        return $responseBody;
    }
    public function validaDatos($request)
    {
        return  $this->validate($request, [
            'nombre'       => 'required|max:50',
            'correo'       => 'required',
            'direccion'    => 'required|max:50',
            'estado'       => 'required|max:50',
            'ciudad'       => 'required|max:50',
        ]);
    }

    public function destroy($id)
    {
        //
        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado');

    }

    public function cambiar_estado(Request $request){
        $empleado = Empleado::find($request->idempleado);
        $empleado->update(
            array(
                "activo"=>$request->estado
            )
        );
        return 'true';
    }

    function obtenerPorcentajeDolar($sueldo_dolar) {
        $sueldos=[$sueldo_dolar];
        for($cont=1; $cont<=6; $cont++){
            $sueldo = (((float)$sueldos[$cont-1] * 5) / 100) + $sueldos[$cont-1];
            array_push($sueldos, round($sueldo,2));
        }
        //dd($sueldos);
       return  $sueldos;


    }
    function obtenerPorcentajePesos($sueldo_pesos) {
        $sueldosPes=[$sueldo_pesos];
        for($cont=1; $cont<=6; $cont++){
           $sueldo =  (((float)$sueldosPes[$cont-1] * 5) / 100) + $sueldosPes[$cont-1];
           array_push($sueldosPes, round($sueldo, 2));
        }
        return  $sueldosPes;

    }
}
