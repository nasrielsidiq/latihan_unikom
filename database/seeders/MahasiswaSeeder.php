<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = [
            [
                'nama' => 'Ahmad Fauzi',
                'nim' => '1234567890',
                'jenis_kelamin' => 'L',
                'kelas' => 'TI-3A',
                'jurusan' => 'Teknik Informatika',
                'tahun_masuk' => 2020,
                'agama' => 'Islam',
                'alamat_asal' => 'Jl. Sudirman No. 1, Jakarta',
                'alamat_sekarang' => 'Jl. Malioboro No. 5, Yogyakarta',
                'foto' => null,
                'link_ig' => 'https://instagram.com/ahmadfauzi',
                'link_linkedin' => 'https://linkedin.com/in/ahmadfauzi',
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'nim' => '1234567891',
                'jenis_kelamin' => 'P',
                'kelas' => 'TI-3B',
                'jurusan' => 'Teknik Informatika',
                'tahun_masuk' => 2021,
                'agama' => 'Islam',
                'alamat_asal' => 'Jl. Thamrin No. 2, Bandung',
                'alamat_sekarang' => 'Jl. Malioboro No. 10, Yogyakarta',
                'foto' => null,
                'link_ig' => 'https://instagram.com/sitinurhaliza',
                'link_linkedin' => 'https://linkedin.com/in/sitinurhaliza',
            ],
            [
                'nama' => 'Budi Santoso',
                'nim' => '1234567892',
                'jenis_kelamin' => 'L',
                'kelas' => 'SI-3A',
                'jurusan' => 'Sistem Informasi',
                'tahun_masuk' => 2019,
                'agama' => 'Kristen',
                'alamat_asal' => 'Jl. Gatot Subroto No. 3, Surabaya',
                'alamat_sekarang' => 'Jl. Malioboro No. 15, Yogyakarta',
                'foto' => null,
                'link_ig' => 'https://instagram.com/budisantoso',
                'link_linkedin' => 'https://linkedin.com/in/budisantoso',
            ],
            [
                'nama' => 'Dewi Lestari',
                'nim' => '1234567893',
                'jenis_kelamin' => 'P',
                'kelas' => 'SI-3B',
                'jurusan' => 'Sistem Informasi',
                'tahun_masuk' => 2022,
                'agama' => 'Hindu',
                'alamat_asal' => 'Jl. Sudirman No. 4, Bali',
                'alamat_sekarang' => 'Jl. Malioboro No. 20, Yogyakarta',
                'foto' => null,
                'link_ig' => 'https://instagram.com/dewilestari',
                'link_linkedin' => 'https://linkedin.com/in/dewilestari',
            ],
            [
                'nama' => 'Eko Prasetyo',
                'nim' => '1234567894',
                'jenis_kelamin' => 'L',
                'kelas' => 'TI-4A',
                'jurusan' => 'Teknik Informatika',
                'tahun_masuk' => 2018,
                'agama' => 'Islam',
                'alamat_asal' => 'Jl. Malioboro No. 25, Yogyakarta',
                'alamat_sekarang' => null,
                'foto' => null,
                'link_ig' => 'https://instagram.com/ekoprasetyo',
                'link_linkedin' => 'https://linkedin.com/in/ekoprasetyo',
            ],
        ];

        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}
