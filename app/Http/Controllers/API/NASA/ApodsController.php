<?php

namespace App\Http\Controllers\API\NASA;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Apod;
use App\Services\NasaApiService;

class ApodsController extends Controller
{
    // Inyectamos el servicio de la API de la NASA
    protected $nasaApiService;

    public function __construct(NasaApiService $nasaApiService)
    {
        $this->nasaApiService = $nasaApiService;
    }

    /**
     * Funcion para obtener un numero de  imagenes elegidas aleatoriamente
     * para ser devueltas en un array JSON.
     * 
     * */
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

    /**     
     * Funcion para recoger la imagen astronomica del dia
     * 
     * */
    public function getApod()
    {
        try {
            // Hacemos la consulta a la API de la NASA
            $apod = $this->nasaApiService->getApod();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($apod, 200, [], JSON_PRETTY_PRINT);
    }
}
