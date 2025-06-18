<?php

namespace App\Http\Controllers\API\NASA;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Apod;
use App\Services\NasaApiService;

class ApodsController extends Controller
{
    // Inyectamos el servicio de la API de la NASA
    protected $nasaApiService;

    public function __construct(NasaApiService $nasaApiService)
    {
        $this->middleware('auth');
        $this->nasaApiService = $nasaApiService;
    }

    // Retorna vista de ver dashboard de APOD en sidebar
    public function index()
    {
        return view('backend.admin.nasa_api.dashboard.nasa_dashboard');
    }

    /**
     * Funcion para obtener un numero de  imagenes elegidas aleatoriamente
     * para ser devueltas en un array JSON.
     * 
     * */
    public function getRandomApods(Request $request)
    {
        // Definimos reglas para los parametros
        $rules = array(
            'cantidad' => 'required|integer|min:1|max:10',
        );
        $cant = 0;
        try {
            // Validamos los parametros
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                //return response()->view(['errors.422'], [], 422);
                return ['success' => 0];
            }
            $cant = $request->cantidad;

            // Hacemos la consulta a la API de la NASA
            $apods = $this->nasaApiService->getAstronomyPictures($cant);
        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500);
            return ['success' => 2, 'error' => $e->getMessage()];
        }
        return response()->json(['success' => 1, 'apods' => $apods]);
    }

    /**     
     * Funcion para recoger la imagen astronomica del dia
     * 
     * */
    public function getApod(Request $request)
    {
        try {
            // Hacemos la consulta a la API de la NASA
            $apods = $this->nasaApiService->getApod();
        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500);
            return ['success' => 2, 'error' => $e->getMessage()];
        }
        return response()->json(['success' => 1, 'apods' => $apods]);
    }



    // Métodos para prueba de API
    public function getApodTest()
    {
        try {
            // Hacemos la consulta a la API de la NASA
            $apod = $this->nasaApiService->getApod();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($apod, 200, [], JSON_PRETTY_PRINT);
    }
    public function showAstronomyPictures($random_number)
    {
        // Definimos reglas para los parametros
        $rules = array(
            'random_number' => 'required|integer|min:1|max:100',
        );

        try {
            // Validamos los parametros
            $validator = Validator::make(['random_number' => $random_number], $rules);
            if ($validator->fails()) {
                return response()->view(['errors.422'], [], 422);
            }

            // Hacemos la consulta a la API de la NASA
            $apods = $this->nasaApiService->getAstronomyPictures($random_number);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($apods, 200, [], JSON_PRETTY_PRINT);
    }
}
