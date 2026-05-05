<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: "API Latihan Unikom",
    version: "1.0.0",
    description: "Dokumentasi API Mahasiswa menggunakan Laravel 13 & Swagger"
)]
#[OA\Server(
    url: "http://localhost:8000",
    description: "Local Development Server"
)]
#[OA\Server(
    url: "https://starling-right-hen.ngrok-free.app",
    description: "Production Server"
)]
abstract class Controller
{
    //
}
