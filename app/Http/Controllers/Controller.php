<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: "My Laravel API Documentation",
    version: "1.0.0",
    description: "Dokumentasi API menggunakan Swagger L5"
)]
#[OA\Server(
    url: "http://localhost:8000",
    description: "Local Server"
)]
abstract class Controller
{
    //
}
