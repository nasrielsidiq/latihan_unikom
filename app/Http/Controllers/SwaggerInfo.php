<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="API Mahasiswa Unikom",
 *     version="1.0.0",
 *     description="API untuk mengelola data mahasiswa di Universitas Komputer Indonesia",
 *     @OA\Contact(
 *         email="admin@unikom.ac.id"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Development server"
 * )
 *
 * @OA\Server(
 *     url="https://api.unikom.ac.id",
 *     description="Production server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="Masukkan token Bearer untuk autentikasi"
 * )
 */
class SwaggerInfo {}
