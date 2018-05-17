<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CabangTableSeeder::class);
        $this->call(GolonganTableSeeder::class);
        $this->call(DaftarJabatanTableSeeder::class);
        $this->call(DepartemenTableSeeder::class);
        $this->call(KaryawanTableSeeder::class);
        $this->call(AbsensiTableSeeder::class);
        $this->call(BankTableSeeder::class);
        $this->call(DokumenTableSeeder::class);
        $this->call(KontrakPercobaanTableSeeder::class);
        $this->call(LisensiTableSeeder::class);
        $this->call(PendidikanTableSeeder::class);
        $this->call(SertifikatTableSeeder::class);
        $this->call(SuratTableSeeder::class);
        $this->call(PengalamanKerjaTableSeeder::class);
        $this->call(KeluargaOrangTuaTableSeeder::class);
        $this->call(KeluargaTableSeeder::class);
        $this->call(LaporanPsikotesTableSeeder::class);
        $this->call(LaporanTesKesehatanTableSeeder::class);
        $this->call(PengalamanBerorganisasiTableSeeder::class);
        $this->call(HobiDanPrestasiTableSeeder::class);
        $this->call(KontakDaruratTableSeeder::class);
        $this->call(KedisiplinanTableSeeder::class);
        $this->call(KemampuanBahasaTableSeeder::class);
        $this->call(IzinTableSeeder::class);
        $this->call(LemburTableSeeder::class);
        $this->call(MutasiTableSeeder::class);
        $this->call(JenisCutiTableSeeder::class);
        $this->call(JatahCutiTableSeeder::class);
        $this->call(CutiTableSeeder::class);
        $this->call(PeraturanPengeluaranKlaimTableSeeder::class);
        $this->call(PeraturanKlaimTableSeeder::class);
        $this->call(KlaimKaryawanTableSeeder::class);
        $this->call(DataKlaimTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JabatanTableSeeder::class);
        $this->call(ReportSeeder::class);
    }
}
