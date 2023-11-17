<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NeedsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $json_static = '{"id":1,"form_1":{"id":1,"name":"I. DATA UMUM ASPEK LEGAL","data_1":{"id":1,"name":"Profil Perusahaan","tooltip":"Ini adalah tooltip","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"far fa-building"},"data_2":{"id":1,"name":"Akta Pendidikan dan Akta Perubahan Terakhir","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"far fa-file-archive"},"data_3":{"id":1,"name":"Izin Usaha (IUI/UT/OSS)","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"far fa-file-code"},"data_4":{"id":1,"name":"Izin Usaha","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"far fa-file-powerpoint"},"data_5":{"id":1,"name":"Nomor Pokok Wajib Pajak (NPWP)","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"far fa-file"},"data_6":{"id":1,"name":"Struktur Organisasi","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"fas fa-sitemap"},"data_7":{"id":1,"name":"Katalog Produk","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file-alt"},"data_8":{"id":1,"name":"Sertifikat Merek","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file-powerpoint"},"data_9":{"id":1,"name":"Surat Pelimpahan Penggunaan Merk","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file-pdf"}},"form_2":{"id":1,"name":"II. TINGKAT KOMPONEN DALAM NEGERI (TKDN)","tab_1":{"id":1,"name":"Bahan Baku Langsung","data_1":{"id":1,"name":"Daftar Kebutuhan Bahan Baku Untuk Satuan Produk Yang Dinilai","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"far fa-file"},"data_2":{"id":1,"name":"Bukti Pembelian Bahan Baku Terhadap Produk Yang Dinilai","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_3":{"id":1,"name":"Jasa Terkait Pembelian Bahan Baku","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"}},"tab_2":{"id":2,"name":"Tenaga Kerja Langsung","data_1":{"id":1,"name":"List gaji","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"far fa-file"},"data_2":{"id":1,"name":"Biaya lembur","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_3":{"id":1,"name":"Biaya tunjangan","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_4":{"id":1,"name":"Biaya asuransi","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_5":{"id":1,"name":"Biaya pajak penghasilan","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_6":{"id":1,"name":"Biaya lain lain","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"}},"tab_3":{"id":3,"name":"Overhead Pabrik","data_1":{"id":1,"name":"Layout pabrik","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":true,"icon":"far fa-file"},"data_2":{"id":1,"name":"Daftar mesin dan nilai depresiasi/sewa mesin","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_3":{"id":1,"name":"List gaji tenaga kerja tidak langsung ","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_4":{"id":1,"name":"Biaya asuransi, pajak dan tunjangan tenaga kerja tidak langsung","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_5":{"id":1,"name":"Bukti pembayaran PLN, air , telepon dalam 3 bulan terakhir ","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_6":{"id":1,"name":"Bukti pembelian consumable","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_7":{"id":1,"name":"Biaya depresiasi / sewa gedung pabrik dan mesin produksi","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_8":{"id":1,"name":"Biaya lisensi dan patent","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_9":{"id":1,"name":"Biaya sertifikasi","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_10":{"id":1,"name":"Biaya perawatan, perbaikan dan suku cadang","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_11":{"id":1,"name":"Pajak bumi dan bangunan","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_12":{"id":1,"name":"Biaya pengujian produk","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"},"data_13":{"id":1,"name":"Biaya program mutu","tooltip":"asdasd asdas","file_path":"x:/a/b/c.xlsx","is_checked":true,"is_required":false,"icon":"far fa-file"}}},"user_id":1,"tipe_produk":"lorem","jenis_produk":false,"permenperin_id":1,"nama_perusahaan":"delectus aut autem"}';
    $data = [
      [
        "id" => 1,
        "json_needs" => $json_static,
        "created_at" => date("Y-m-d H:i:s"),
        "updated_at" => date("Y-m-d H:i:s")
      ]
    ];


    DB::table("needs")->insert($data);
  }
}
