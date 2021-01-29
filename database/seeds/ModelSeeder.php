<?php

use App\Level;
use App\Pemesanan;
use App\Penumpang;
use App\Petugas;
use App\Rute;
use App\Transportasi;
use App\TypeTransportasi;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penumpang::create([
            'username'          =>  'flatliners',
            'password'          =>  bcrypt('komputer123'),
            'nama_penumpang'    =>  'Daffa Dziban Fadia',
            'alamat_penumpang'  =>  'Jalancagak',
            'tanggal_lahir'     =>  '2003-02-18',
            'jenis_kelamin'     =>  'L',
            'telefone'          =>  '085322697752',
            'api_token'         =>  Str::random(60)
        ]);

        Penumpang::create([
            'username'          =>  'rhidofadzuani',
            'password'          =>  bcrypt('komputer123'),
            'nama_penumpang'    =>  'Aly Rhido Fadzuani',
            'alamat_penumpang'  =>  'Jalancagak',
            'tanggal_lahir'     =>  '2003-02-18',
            'jenis_kelamin'     =>  'L',
            'telefone'          =>  '085322697752',
            'api_token'         =>  Str::random(60)
        ]);

        Penumpang::create([
            'username'          =>  'alghifari',
            'password'          =>  bcrypt('komputer123'),
            'nama_penumpang'    =>  'Maulidin Alghifari',
            'alamat_penumpang'  =>  'Jalancagak',
            'tanggal_lahir'     =>  '2003-02-18',
            'jenis_kelamin'     =>  'L',
            'telefone'          =>  '085322697752',
            'api_token'         =>  Str::random(60)
        ]);

        Level::create([
            'nama_level'    =>  'admin'
        ]);

        Level::create([
            'nama_level'    =>  'petugas'
        ]);

        Petugas::create([
            'username'      =>  'superuser',
            'password'      =>  bcrypt('komputer123'),
            'nama_petugas'  =>  'Administrator',
            'api_token'     =>  Str::random(60),
            'id_level'      =>  1
        ]);

        Petugas::create([
            'username'      =>  'silverlake',
            'password'      =>  bcrypt('komputer123'),
            'nama_petugas'  =>  'Advisor',
            'api_token'     =>  Str::random(60),
            'id_level'      =>  1
        ]);

        Petugas::create([
            'username'      =>  'silvermist',
            'password'      =>  bcrypt('komputer123'),
            'nama_petugas'  =>  'Officer',
            'api_token'     =>  Str::random(60),
            'id_level'      =>  2
        ]);

        TypeTransportasi::create([
            'nama_type'     =>  'First',
            'keterangan'    =>  'First Class'
        ]);

        TypeTransportasi::create([
            'nama_type'     =>  'Business',
            'keterangan'    =>  'Business Class'
        ]);

        TypeTransportasi::create([
            'nama_type'     =>  'Economy',
            'keterangan'    =>  'Economy Class'
        ]);

        Transportasi::create([
            'kode'                  =>  'CCA',
            'jumlah_kursi'          =>  40,
            'keterangan'            =>  'Transportasi',
            'id_type_transportasi'  =>  1
        ]);

        Transportasi::create([
            'kode'                  =>  'CGK',
            'jumlah_kursi'          =>  40,
            'keterangan'            =>  'Transportasi',
            'id_type_transportasi'  =>  2
        ]);

        Transportasi::create([
            'kode'                  =>  'BLA',
            'jumlah_kursi'          =>  40,
            'keterangan'            =>  'Transportasi',
            'id_type_transportasi'  =>  3
        ]);

        $bandung = Rute::create([
            'tujuan'        =>  'Bandung',
            'rute_awal'     =>  'Jakarta',
            'rute_ahir'     =>  'Bandung',
            'harga'         =>  '400.000',
            'id_transportasi'   =>  1,
        ]);

        $jakarta = Rute::create([
            'tujuan'        =>  'Jakarta',
            'rute_awal'     =>  'Bandung',
            'rute_ahir'     =>  'Jakarta',
            'harga'         =>  '400.000',
            'id_transportasi'   =>  2,
        ]);

        $yogyakarta = Rute::create([
            'tujuan'        =>  'Yogyakarta',
            'rute_awal'     =>  'Bandung',
            'rute_ahir'     =>  'Yogyakarta',
            'harga'         =>  '750.000',
            'id_transportasi'   =>  3,
        ]);

        Pemesanan::create([
            'kode_pemesanan'    =>  Str::random(8),
            'tanggal_pemesanan' =>  now(),
            'tempat_pemesanan'  =>  'Subang',
            'id_pelanggan'      =>  1,
            'kode_kursi'        =>  'A1',
            'id_rute'           =>  $bandung->id,
            'tujuan'            =>  $bandung->tujuan,
            'tanggal_berangkat' =>  now(),
            'jam_cekin'         =>  now(),
            'jam_berangkat'     =>  now(),
            'total_bayar'       =>  $bandung->harga,
            'id_petugas'        =>  1
        ]);

        Pemesanan::create([
            'kode_pemesanan'    =>  Str::random(8),
            'tanggal_pemesanan' =>  now(),
            'tempat_pemesanan'  =>  'Subang',
            'id_pelanggan'      =>  2,
            'kode_kursi'        =>  'A2',
            'id_rute'           =>  $jakarta->id,
            'tujuan'            =>  $jakarta->tujuan,
            'tanggal_berangkat' =>  now(),
            'jam_cekin'         =>  now(),
            'jam_berangkat'     =>  now(),
            'total_bayar'       =>  $jakarta->harga,
            'id_petugas'        =>  2
        ]);

        Pemesanan::create([
            'kode_pemesanan'    =>  Str::random(8),
            'tanggal_pemesanan' =>  now(),
            'tempat_pemesanan'  =>  'Subang',
            'id_pelanggan'      =>  3,
            'kode_kursi'        =>  'A3',
            'id_rute'           =>  $yogyakarta->id,
            'tujuan'            =>  $yogyakarta->tujuan,
            'tanggal_berangkat' =>  now(),
            'jam_cekin'         =>  now(),
            'jam_berangkat'     =>  now(),
            'total_bayar'       =>  $yogyakarta->harga,
            'id_petugas'        =>  3
        ]);
    }
}
