<?php
namespace App\Http\Controllers\Api;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *   name="Mahasiswa",
 *   description="Operasi CRUD untuk Mahasiswa"
 * )
 *
 * @OA\Schema(
 *   schema="Mahasiswa",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(property="nim", type="string", example="20000123"),
 *   @OA\Property(property="nama", type="string", example="Budi Santoso"),
 *   @OA\Property(property="jenis_kelamin", type="string", enum={"L","P"}, example="L"),
 *   @OA\Property(property="kelas", type="string", example="TI-3A"),
 *   @OA\Property(property="jurusan", type="string", example="Teknik Informatika"),
 *   @OA\Property(property="tahun_masuk", type="string", example="2023"),
 *   @OA\Property(property="agama", type="string", example="Islam"),
 *   @OA\Property(property="alamat_asal", type="string", example="Jl. Merdeka No.1"),
 *   @OA\Property(property="alamat_sekarang", type="string", nullable=true, example="Jl. Sudirman No.10"),
 *   @OA\Property(property="foto", type="string", nullable=true, example="foto_mahasiswa/abc123.jpg"),
 *   @OA\Property(property="link_ig", type="string", nullable=true, example="https://instagram.com/budi"),
 *   @OA\Property(property="link_linkedin", type="string", nullable=true, example="https://linkedin.com/in/budi"),
 *   @OA\Property(property="created_at", type="string", format="date-time"),
 *   @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 *
 * @OA\Schema(
 *   schema="MahasiswaInput",
 *   type="object",
 *   required={"nim","nama","jenis_kelamin","kelas","jurusan","tahun_masuk","agama","alamat_asal"},
 *   @OA\Property(property="nim", type="string", example="20000123"),
 *   @OA\Property(property="nama", type="string", example="Budi Santoso"),
 *   @OA\Property(property="jenis_kelamin", type="string", enum={"L","P"}, example="L"),
 *   @OA\Property(property="kelas", type="string", example="TI-3A"),
 *   @OA\Property(property="jurusan", type="string", example="Teknik Informatika"),
 *   @OA\Property(property="tahun_masuk", type="string", example="2023"),
 *   @OA\Property(property="agama", type="string", example="Islam"),
 *   @OA\Property(property="alamat_asal", type="string", example="Jl. Merdeka No.1"),
 *   @OA\Property(property="alamat_sekarang", type="string", nullable=true, example="Jl. Sudirman No.10"),
 *   @OA\Property(property="foto", type="string", format="binary", nullable=true),
 *   @OA\Property(property="link_ig", type="string", nullable=true, example="https://instagram.com/budi"),
 *   @OA\Property(property="link_linkedin", type="string", nullable=true, example="https://linkedin.com/in/budi")
 * )
 *
 * @OA\Schema(
 *   schema="MahasiswaUpdate",
 *   type="object",
 *   @OA\Property(property="nama", type="string", example="Budi Santoso"),
 *   @OA\Property(property="jenis_kelamin", type="string", enum={"L","P"}, example="L"),
 *   @OA\Property(property="kelas", type="string", example="TI-3A"),
 *   @OA\Property(property="jurusan", type="string", example="Teknik Informatika"),
 *   @OA\Property(property="tahun_masuk", type="string", example="2023"),
 *   @OA\Property(property="agama", type="string", example="Islam"),
 *   @OA\Property(property="alamat_asal", type="string", example="Jl. Merdeka No.1"),
 *   @OA\Property(property="alamat_sekarang", type="string", nullable=true, example="Jl. Sudirman No.10"),
 *   @OA\Property(property="foto", type="string", format="binary", nullable=true),
 *   @OA\Property(property="link_ig", type="string", nullable=true, example="https://instagram.com/budi"),
 *   @OA\Property(property="link_linkedin", type="string", nullable=true, example="https://linkedin.com/in/budi")
 * )
 */
class MahasiswaController extends Controller {

  /**
   * @OA\Get(
   *   path="/api/mahasiswa",
   *   summary="List semua mahasiswa",
   *   tags={"Mahasiswa"},
   *   @OA\Response(
   *     response=200,
   *     description="Berhasil",
   *     @OA\JsonContent(
   *       @OA\Property(property="status", type="boolean", example=true),
   *       @OA\Property(property="message", type="string", example="Data Mahasiswa"),
   *       @OA\Property(
   *         property="data",
   *         type="array",
   *         @OA\Items(ref="#/components/schemas/Mahasiswa")
   *       )
   *     )
   *   )
   * )
   */
  public function index() {
    return response()->json([
      'status'  => true,
      'message' => 'Data Mahasiswa',
      'data'    => Mahasiswa::latest()->get()
    ]);
  }

  /**
   * @OA\Post(
   *   path="/api/mahasiswa",
   *   summary="Tambah mahasiswa baru",
   *   tags={"Mahasiswa"},
   *   @OA\RequestBody(
   *     required=true,
   *     @OA\MediaType(
   *       mediaType="multipart/form-data",
   *       @OA\Schema(ref="#/components/schemas/MahasiswaInput")
   *     )
   *   ),
   *   @OA\Response(
   *     response=201,
   *     description="Tersimpan",
   *     @OA\JsonContent(
   *       @OA\Property(property="status", type="boolean", example=true),
   *       @OA\Property(property="message", type="string", example="Mahasiswa berhasil disimpan"),
   *       @OA\Property(property="data", ref="#/components/schemas/Mahasiswa")
   *     )
   *   )
   * )
   */
  public function store(Request $request) {
    $data = $request->validate([
      'nim'            => 'required|unique:mahasiswas|max:20',
      'nama'           => 'required|max:100',
      'jenis_kelamin'  => 'required|in:L,P',
      'kelas'          => 'required|max:20',
      'jurusan'        => 'required|max:100',
      'tahun_masuk'    => 'required|digits:4',
      'agama'          => 'required|max:30',
      'alamat_asal'    => 'required',
      'alamat_sekarang'=> 'nullable',
      'link_ig'        => 'nullable|max:100',
      'link_linkedin'  => 'nullable|url|max:100',
      'foto'           => 'nullable|image|max:2048',
    ]);
    if ($request->hasFile('foto')) {
      $data['foto'] = $request->file('foto')
        ->store('foto_mahasiswa', 'public');
    }
    $mhs = Mahasiswa::create($data);
    return response()->json([
      'status'  => true,
      'message' => 'Mahasiswa berhasil disimpan',
      'data'    => $mhs
    ], 201);
  }

  /**
   * @OA\Get(
   *   path="/api/mahasiswa/{id}",
   *   summary="Tampilkan detail mahasiswa",
   *   tags={"Mahasiswa"},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     @OA\Schema(type="integer", example=1)
   *   ),
   *   @OA\Response(
   *     response=200,
   *     description="Berhasil",
   *     @OA\JsonContent(
   *       @OA\Property(property="status", type="boolean", example=true),
   *       @OA\Property(property="data", ref="#/components/schemas/Mahasiswa")
   *     )
   *   ),
   *   @OA\Response(response=404, description="Tidak ditemukan")
   * )
   */
  public function show($id) {
    $mhs = Mahasiswa::find($id);
    if (!$mhs) return response()->json(['status'=>false,'message'=>'Tidak ditemukan'], 404);
    return response()->json(['status'=>true,'data'=>$mhs]);
  }

  /**
   * @OA\Put(
   *   path="/api/mahasiswa/{id}",
   *   summary="Perbarui data mahasiswa",
   *   tags={"Mahasiswa"},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     @OA\Schema(type="integer", example=1)
   *   ),
   *   @OA\RequestBody(
   *     required=true,
   *     @OA\MediaType(
   *       mediaType="multipart/form-data",
   *       @OA\Schema(ref="#/components/schemas/MahasiswaUpdate")
   *     )
   *   ),
   *   @OA\Response(
   *     response=200,
   *     description="Data diperbarui",
   *     @OA\JsonContent(
   *       @OA\Property(property="status", type="boolean", example=true),
   *       @OA\Property(property="message", type="string", example="Data diperbarui"),
   *       @OA\Property(property="data", ref="#/components/schemas/Mahasiswa")
   *     )
   *   ),
   *   @OA\Response(response=404, description="Tidak ditemukan")
   * )
   */
  public function update(Request $request, $id) {
    $mhs = Mahasiswa::findOrFail($id);
    $data = $request->validate([
      'nama'           => 'sometimes|max:100',
      'jenis_kelamin'  => 'sometimes|in:L,P',
      'kelas'          => 'sometimes|max:20',
      'jurusan'        => 'sometimes|max:100',
      'tahun_masuk'    => 'sometimes|digits:4',
      'agama'          => 'sometimes|max:30',
      'alamat_asal'    => 'sometimes',
      'alamat_sekarang'=> 'nullable',
      'link_ig'        => 'nullable|max:100',
      'link_linkedin'  => 'nullable|url',
      'foto'           => 'nullable|image|max:2048',
    ]);
    if ($request->hasFile('foto')) {
      $data['foto'] = $request->file('foto')
        ->store('foto_mahasiswa', 'public');
    }
    $mhs->update($data);
    return response()->json(['status'=>true,'message'=>'Data diperbarui','data'=>$mhs]);
  }

  /**
   * @OA\Delete(
   *   path="/api/mahasiswa/{id}",
   *   summary="Hapus mahasiswa",
   *   tags={"Mahasiswa"},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     @OA\Schema(type="integer", example=1)
   *   ),
   *   @OA\Response(
   *     response=200,
   *     description="Data dihapus",
   *     @OA\JsonContent(
   *       @OA\Property(property="status", type="boolean", example=true),
   *       @OA\Property(property="message", type="string", example="Data dihapus")
   *     )
   *   ),
   *   @OA\Response(response=404, description="Tidak ditemukan")
   * )
   */
  public function destroy($id) {
    $mhs = Mahasiswa::findOrFail($id);
    $mhs->delete();
    return response()->json(['status'=>true,'message'=>'Data dihapus']);
  }
}
