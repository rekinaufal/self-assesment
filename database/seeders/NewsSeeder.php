<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "id" => 1,
                "title" => "Rahasia Terungkap: Masa Lalu Luffy di Dunia One Piece",
                "description" => "Dalam perkembangan terbaru di dunia One Piece, masa lalu Luffy akhirnya terungkap. Penggemar di seluruh dunia terkejut dengan fakta-fakta baru tentang petualangan Luffy.",
                "link" => "http://127.0.0.1:8000/news/1",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 2,
                "title" => "Pertarungan Epik: Luffy Vs. Kaido di Pulau Wano",
                "description" => "Pertarungan epik antara Monkey D. Luffy dan Yonko Kaido mencapai puncaknya di Pulau Wano. Siapakah yang akan keluar sebagai pemenang dalam pertarungan hebat ini?",
                "link" => "http://127.0.0.1:8000/news/2",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 3,
                "title" => "Misteri Buah Iblis Baru di Dunia One Piece",
                "description" => "Para bajak laut Topi Jerami menemukan buah iblis baru yang memiliki kekuatan misterius di Pulau Misteri. Apa yang akan mereka lakukan dengan kekuatan ini?",
                "link" => "http://127.0.0.1:8000/news/3",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 4,
                "title" => "Pencarian Harta Karun Terbesar: Petualangan Kelompok Topi Jerami",
                "description" => "Kelompok Topi Jerami memulai petualangan epik mereka dalam mencari harta karun terbesar di dunia. Tantangan dan bahaya menanti mereka di setiap langkah.",
                "link" => "http://127.0.0.1:8000/news/4",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 5,
                "title" => "Perjalanan ke Raftel: Misi Terakhir Topi Jerami",
                "description" => "Topi Jerami telah mencapai tahap akhir dalam perjalanan mereka ke Pulau Raftel. Misi terakhir mereka adalah mengungkap rahasia di balik harta karun legendaris.",
                "link" => "http://127.0.0.1:8000/news/5",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 6,
                "title" => "Ancaman Besar Dunia One Piece: Revolusi Kelompok Topi Jerami",
                "description" => "Dunia One Piece diguncang oleh rencana revolusi yang digerakkan oleh Kelompok Topi Jerami. Bagaimana upaya mereka akan memengaruhi dunia?",
                "link" => "http://127.0.0.1:8000/news/6",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 7,
                "title" => "Kehadiran Karakter Baru: Siapa Sahabat Baru Topi Jerami?",
                "description" => "Kelompok Topi Jerami telah bertemu dengan karakter baru misterius yang akan memengaruhi nasib mereka. Siapakah sahabat baru mereka dalam petualangan ini?",
                "link" => "http://127.0.0.1:8000/news/7",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 8,
                "title" => "Misteri Kelompok Dalam Topi Jerami: Siapa Mereka?",
                "description" => "Kelompok dalam Topi Jerami memiliki anggota misterius yang identitasnya belum terungkap. Apa rahasia yang mereka sembunyikan?",
                "link" => "http://127.0.0.1:8000/news/8",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 9,
                "title" => "Kisah Keberanian Sanji: Duel Melawan Pangeran Kelas Dunia",
                "description" => "Sanji, koki handal kelompok Topi Jerami, menghadapi duel epik melawan pangeran kelas dunia. Siapakah yang akan keluar sebagai pemenang dalam pertarungan ini?",
                "link" => "http://127.0.0.1:8000/news/9",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 10,
                "title" => "Rencana Terbaru Topi Jerami: Misi Rahasia di Dunia One Piece",
                "description" => "Topi Jerami memiliki rencana rahasia untuk mengungkap kebenaran tentang dunia One Piece. Apa yang akan terjadi dalam misi rahasia ini?",
                "link" => "http://127.0.0.1:8000/news/10",
                "thumbnail" => "news/news-thumbnail-20231026061428.gif",
                "created_at" => date("Y-m-d H:i:s")
            ]
        ];


        DB::table("news")->insert($data);
    }
}
