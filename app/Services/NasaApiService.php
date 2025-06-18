<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NasaApiService
{
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->url = config('services.nasa.url');
        $this->key = config('services.nasa.key');
    }

    /**
     * Llamada a la API Nasa para obtener un número de imágenes astronómicas definido por el usuario.
     * 
     */
    public function getAstronomyPictures($count)
    {
        // Realizar la solicitud a la API de la NASA, pasando el param 'count'
        $response = Http::get("{$this->url}/planetary/apod", [
            'api_key' => $this->key,
            'count' => $count
        ]);

        // Verificar si la respuesta fue exitosa
        if ($response->successful()) {
            // Retornar los datos de las imágenes
            return $response->json();
        }

        // En caso de error, retornar un mensaje
        return [
            'error' => 'No se pudieron obtener las imágenes. Intenta nuevamente.'
        ];
    }

    /**
     * Llamada a la API Nasa para obtener la imagen astronómica del día.
     * 
     */
    public function getApod()
    {
        // Realizar la solicitud a la API de la NASA para obtener la imagen del día
        $response = Http::get("{$this->url}/planetary/apod", [
            'api_key' => $this->key,
        ]);

        // Verificar si la respuesta fue exitosa
        if ($response->successful()) {
            // Retornar los datos de la imagen del día
            return $response->json();
        }

        // En caso de error, retornar un mensaje
        return [
            'error' => 'No se pudo obtener la imagen del día. Intenta nuevamente.'
        ];
    }
}
