<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Producto;
use Illuminate\Support\Facades\Http;

class EnviarDatosPowerBi extends Command
{
    protected $signature = 'enviar-datos:power-bi';
    protected $description = 'Envía automáticamente los datos a Power BI';

    public function handle()
    {
        $url = 'https://api.powerbi.com/beta/adc06a38-4631-43a5-b3fd-badb63447935/datasets/8c5a257f-4177-4c32-8963-89415c4b1cb5/rows?experience=power-bi&key=j4I7slALwGzGoBiOgQECHTUFGtpVlHqXpxtHnHImc5qpP0SjJT9pWS3Oi2Y3LMq08PkqVvBwddZujUoXqGkwNQ%3D%3D';

        $datosDeLaBase = Producto::all();

        $respuesta = Http::post($url, $datosDeLaBase->toArray());

        // Puedes manejar la respuesta según tus necesidades
        $this->info('Datos enviados a Power BI: ' . $respuesta->body());
    }
}
