@extends("layouts/masterlayout")

@section("main")

      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="row mt">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;">Profil Page</h2>
                  </div>

                  <div class="dahboard-menu">
                     <h5 style="padding-left: 20px;">@if ($employee-> status === '0')
                                  Status : Menunggu persetujuan HRD
                                  @endif</h5>


                  <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item active">
                        <a class="nav-link active" id="riwayatLembur-tab" data-toggle="tab" href="#riwayatLembur" role="tab" aria-controls="riwayatLembur" aria-selected="true">Riwayat Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                      </li>
                    </ul>

                    

                    </div>





                    <form class="form-field">
                        <div class='col-sm-2'>
                            <div class="form-group">
                              <img src=  "/upload/{{$employee-> foto}}" style="width:150px;height:180px;padding-left: 20px;">
                            </div>
                        </div>
                        <div class='col-sm-10'>
                          <div class="form-group">
                          <ul style="float:right"><a class="btn btn-default" href="/profile/form"><i class="fa fa-pencil" ></i> EDIT</a></ul>
                              <h3 style="line-height: 60%;"><b>{{ $employee -> nama }}</b></h3>
                              @foreach($jabatan as $jabatan)
                                <h5>{{$jabatan -> nama_jabatan}}
                                @endforeach</h5>
                              <table style="width:100%;table-layout: auto;">
                                <tr>
                                                                  <tr>
                                <th>Nomor Pegawai</th>
                                <td>{{ $employee -> nik_employee }}</td>
                                </tr>
                               <tr>
                                  <th>Email Perusahaan</th>
                                  <td>{{ $employee -> email_perusahaan }}</td>
                                </tr>
                                                              <tr>
                               <th>Cabang</th>
                               @foreach($cabang as $cabang)
                                  <td>{{$cabang -> nama_cabang}}</td>
                                @endforeach
                                </tr>
                                <tr>
                                <th>Departemen</th>
                                @foreach($departemen as $departemen)
                                <td>{{$departemen -> nama_departemen}}</td>
                                @endforeach
                              </tr>
                                <tr>
                                  <th width="20%">Alamat</th>
                                  <td width="80%">{{$employee -> alamat_tempat_tinggal}}</td>
                                </tr>
                                <tr>
                                  <th>No. Handphone</th>
                                  <td>{{ $employee -> no_handphone }}</td>
                                </tr>

                              </table>

                          </div>
                        </div>
                    </form>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Profil Karyawan</button>

                          <div class="content">
                              <br>
                             <table id="tabelProfil" class="table table-condensed" >
                                  <th width="33%">Tempat Lahir</th>
                                  <th width="33%">Tanggal Lahir</th>
                                  <th width="33%">E-mail Pribadi</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> tempat_lahir }}</td>
                                  <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d-m-Y')}}</td>
                                  <td>{{ $employee -> email }}</td>
                                </tr>
                                <tr>
                                  <th width="33%">Agama</th>
                                  <th width="33%">Jenis Kelamin</th>
                                  <th width="34%">Golongan Darah</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> agama }}</td>
                                  <td>@if ($employee -> jenis_kelamin === 'L')
                                  Laki-Laki
                                  @else
                                  Perempuan
                                  @endif
                                  </td>
                                  <td>{{ $employee -> golongan_darah }}</td>
                                </tr>
                               <tr>
                                  <th width="33%">Tinggi Badan (cm)</th>
                                  <th width="33%">Berat Badan (kg)</th>
                                  <th width="34%">Status Perkawinan</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> tinggi }}</td>
                                  <td>{{ $employee -> berat_badan }}</td>
                                  <td>{{ $employee -> status_perkawinan }}</td>
                                </tr>
                               <tr>
                                  <th width="33%">Jenis Identitas</th>
                                  <th width="33%">Nomor Identitas</th>
                                  <th width="34%">Alamat (Identitas)</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> jenis_identitas }}</td>
                                  <td>{{ $employee -> no_identitas }}</td>
                                  <td>{{ $employee -> jalan_identitas}}</td>
                                </tr>
                                <tr>
                                  <th width="33%">Kota (Identitas)</th>
                                  <th width="33%">Provinsi (Identitas)</th>
                                  <th width="34%">Kode pos (Identitas)</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> kota_identitas }}</td>
                                  <td>{{ $employee -> provinsi_identitas }}</td>
                                  <td>{{ $employee -> kode_pos_identitas }}</td>
                                </tr>
                                <tr>
                                  <th width="33%">No Telepon (Identitas)</th>
                                  <th width="34%">Nomor DPLK</th>
                                  <th width="33%">Nomor NPWP</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> no_telepon }}</td>
                                  <td>{{ $employee -> no_dplk }}</td>
                                  <td>{{ $employee -> no_jamsostek }}</td>
                                </tr>
                                <tr>
                                  <th width="33%">Nomor BPJS</th>
                                  <th width="34%">Nomor Jamsostek</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> no_bpjs }}</td>
                                  <td>{{ $employee -> no_jamsostek }}</td>
                                </tr>
                                <tr>
                                  <th></th>
                                  <td></td>
                                </tr>
                              </table>
                        </div>
                          </div>
                    </div>
                    <!-- awal -->
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Kontak Darurat</button>

                          <div class="content">
                              <br>
                            @if($employee -> kontakDarurat)
                             <table id="tabelProfil" class="table table-condensed" >
                                <tr>
                                  <th width="33%">Nama</th>
                                  <th width="33%">Hubungan</th>
                                  <th width="34%">Alamat</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> kontakDarurat -> nama_kontak}}</td>
                                  <td>{{ $employee -> kontakDarurat -> hubungan_kontak}}</td>
                                  <td>{{ $employee -> kontakDarurat -> alamat_kontak}}</td>
                                </tr>
                                <tr>
                                  <th width="33%">Kota</th>
                                  <th width="33%">Propinsi</th>
                                  <th width="34%">Kode Pos</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> kontakDarurat -> kota_kontak}}</td>
                                  <td>{{ $employee -> kontakDarurat -> provinsi_kontak}}</td>
                                  <td>{{ $employee -> kontakDarurat -> kode_pos_kontak}}</td>
                                </tr>
                               <tr>
                                  <th width="33%">Nomor Telepon</th>
                                  <th width="33%">Nomor Handphone</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> kontakDarurat -> no_telepon_kontak}}</td>
                                  <td>{{ $employee -> kontakDarurat -> no_hp_kontak}}</td>
                                </tr>
                              </table>
                            @else <h5>Data tidak ada</h5>
                            @endif
                        </div>
                          </div>

                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Informasi Bank</button>

                          <div class="content">
                            <br>
                            @if($employee -> bank)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Nama Bank</th>
                                  <th>Nomor Rekening</th>
                                </tr>
                                <tr>
                                  <td>{{ $employee -> bank -> nama_bank}}</td>
                                  <td>{{ $employee -> bank -> nomor_rekening_bank}}</td>
                                </tr>
                                <tr>
                                  <th>Nama Pemilik Rekening</th>
                                  <th>Informasi Bank</th>
                                </tr>
                              </thead>
                              <tbody>

                                <tr>
                                  <td>{{ $employee -> bank -> nama_rekening}}</td>
                                  <td>{{ $employee -> bank -> informasi_bank}}</td>
                                </tr>
                              </tbody>

                            </table>
                            @else <h5>Data tidak ada</h5>
                            @endif
                          </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Pengalaman Berorganisasi</button>

                          <div class="content">
                            <br>
                            @if($employee -> pengalamanBerorganisasi -> count() != 0)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Nama Organisasi</th>
                                  <th>Jenis Organisasi</th>
                                  <th>Tahun Aktif</th>
                                  <th>Jabatan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee->pengalamanBerorganisasi as $pengalaman_berorganisasi)
                                <tr>
                                  <td>{{ $pengalaman_berorganisasi -> nama_organisasi}}</td>
                                  <td>{{ $pengalaman_berorganisasi -> jenis_organisasi}}</td>
                                  <td>{{ $pengalaman_berorganisasi -> tahun_aktif}}</td>
                                  <td>{{ $pengalaman_berorganisasi -> jabatan}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                    </div>
                  </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Hobi & Prestasi</button>

                          <div class="content">
                            <br>
                            @if($employee -> hobiDanPrestasi -> count() != 0)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th width="25%">Hobi</th>
                                  <th>Prestasi dari Hobi</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($employee->hobiDanPrestasi as $hobi_dan_prestasi)
                                <tr>
                                  <td>{{ $hobi_dan_prestasi -> hobi}}</td>
                                  <td>{{ $hobi_dan_prestasi -> prestasi}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                      </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Kontrak/Percobaan</button>

                          <div class="content">
                            <br>
                            @if($employee -> kontakPercobaan)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Jenis</th>
                                  <th>Jangka Waktu (Bulan)</th>
                                  <th>Tanggal Awal</th>
                                  <th>Tanggal Akhir</th>
                                  <th>Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee ->kontrakPercobaan as $kontrak_percobaan)
                                <tr>
                                  <td>{{ $kontrak_percobaan-> jenis }}</td>
                                  <td>{{$kontrak_percobaan -> jangka_waktu}}</td>
                                  <td>{{ \Carbon\Carbon::parse($kontrak_percobaan -> tanggal_awal)->format('d-m-Y')}}</td>
                                  <td>{{ \Carbon\Carbon::parse($kontrak_percobaan -> tanggal_akhir)->format('d-m-Y')}}</td>
                                  <td>{{$kontrak_percobaan -> keterangan}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                      </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Pendidikan</button>

                          <div class="content">
                          <br>
                            @if($employee -> pendidikan -> count() != 0)
                            <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Jenjang</th>
                                  <th>Institusi Pendidikan</th>
                                  <th>Jurusan</th>
                                  <th>Tahun Masuk</th>
                                  <th>Tahun Lulus</th>
                                  <th>IPK/Nilai Akhir</th>
                                  <th>Catatan</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($employee->pendidikan as $pendidikan)
                                <tr>
                                  <td>{{ $pendidikan -> tingkat_pendidikan}}</td>
                                  <td>{{ $pendidikan -> nama_sekolah}}</td>
                                  <td>{{ $pendidikan -> jurusan}}</td>
                                  <td>{{ $pendidikan -> tahun_masuk}}</td>
                                  <td>{{ $pendidikan -> tahun_lulus}}</td>
                                  <td>{{ $pendidikan -> ipk}}</td>
                                  <td>{{ $pendidikan -> catatan}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                      </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Sertifikasi & Pelatihan</button>

                          <div class="content">
                         <br>
                            @if($employee -> sertifikasi -> count() != 0)
                            <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Nama Sertifikasi/Pelatihan</th>
                                  <th>Tingkatan</th>
                                  <th>Tahun</th>
                                  <th>Penyelenggara</th>
                                  <th>Catatan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee->sertifikasi as $sertifikasi)
                                <tr>
                                  <td>{{ $sertifikasi -> nama_sertifikat}}</td>
                                  <td>{{ $sertifikasi -> tingkat_sertifikat}}</td>
                                  <td>{{ $sertifikasi -> tahun_sertifikat}}</td>
                                  <td>{{ $sertifikasi -> penyelenggara}}</td>
                                  <td>{{ $sertifikasi -> catatan_sertifikat}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                          </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Kemampuan Bahasa</button>

                          <div class="content">
                         <br>
                          @if($employee -> kemampuanBahasa -> count() != 0)
                            <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Nama Bahasa</th>
                                  <th>Kemampuan Berbicara</th>
                                  <th>Kemampuan Menulis</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee->kemampuanBahasa as $kemampuan_bahasa)
                                <tr>
                                  <td>{{ $kemampuan_bahasa -> nama_bahasa}}</td>
                                  <td>{{ $kemampuan_bahasa -> kemampuan_berbicara}}</td>
                                  <td>{{ $kemampuan_bahasa -> kemampuan_menulis}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                      </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Lisensi</button>

                          <div class="content">
                            <br>
                            @if($employee -> lisensi -> count() != 0)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Nomor Lisensi</th>
                                  <th>Jenis</th>
                                  <th>Tanggal</th>
                                  <th>Tanggal Hangus</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee->lisensi as $lisensi)
                                <tr>
                                  <td>{{ $lisensi -> nomor}}</td>
                                  <td>{{ $lisensi -> jenis_lisensi}}</td>
                                  <td>{{ \Carbon\Carbon::parse($lisensi -> tanggal)->format('d-m-Y')}}
                                  </td>
                                  <td>{{ \Carbon\Carbon::parse($lisensi -> tanggal_hangus)->format('d-m-Y')}}
                                  </td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                          </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Pengalaman Kerja</button>

                          <div class="content">
                             <br>
                             @if($employee -> pengalamanKerja -> count() != 0)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Nama Perusahaan</th>
                                  <th>Periode</th>
                                  <th>Jabatan</th>
                                  <th>Jabatan Atasan Langsung</th>
                                  <th>Alasan Keluar</th>
                                  <th>Gaji</th>
                                  <th>Ringkasan Pekerjaan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee->pengalamanKerja as $pengalaman_kerja)
                                <tr>
                                  <td>{{ $pengalaman_kerja -> nama_perusahaan}}</td>
                                  <td>{{ $pengalaman_kerja -> periode}}</td>
                                  <td>{{ $pengalaman_kerja -> jabatan}}</td>
                                  <td>{{ $pengalaman_kerja -> jabatan_atasan_langsung}}</td>
                                  <td>{{ $pengalaman_kerja -> alasan_keluar}}</td>
                                  <td>{{ $pengalaman_kerja -> gaji_terakhir}}</td>
                                  <td>{{ $pengalaman_kerja -> ringkasan_jenis_pekerjaan}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                          </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
s
                          <button class="collapsible">Keluarga</button>

                          <div class="content">
                            <br>
                            <h4>Keluarga sebagai orang tua</h4>
                            @if($employee -> keluarga -> count() != 0)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Hubungan</th>
                                  <th>Nama</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Tempat Lahir</th>
                                  <th>Tanggal Lahir</th>
                                  <th>Pendidikan</th>
                                  <th>Pekerjaan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee->keluarga as $keluarga)
                                <tr>
                                  <td>{{ $keluarga -> hubungan}}</td>
                                  <td>{{ $keluarga -> nama}}</td>
                                  <td>@if ($keluarga-> jenis_kelamin === 'L')
                                        Laki-Laki
                                        @else
                                        Perempuan
                                        @endif</td>
                                  <td>{{ $keluarga -> tempat_lahir}}</td>
                                  <td>{{ \Carbon\Carbon::parse($keluarga -> tanggal_efektif)->format('d-m-Y')}}</td>
                                  <td>{{ $keluarga -> pendidikan}}</td>
                                  <td>{{ $keluarga -> pekerjaan}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>

                            @else <h5>Data tidak ada</h5>
                            @endif
                      <h4>Keluarga sebagai anak</h4>
                      @if($employee -> keluargaOrangTua -> count() != 0)
                      <table id="dataAttendance" class="table table-condensed" align="center">
                        <thead>
                          <tr>
                            <th>Hubungan</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>No. Telepon</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($employee->keluargaOrangTua as $keluarga_orang_tua)
                          <tr>
                            <td>{{ $keluarga_orang_tua -> hubungan}}</td>
                            <td>{{ $keluarga_orang_tua -> nama}}</td>
                            <td>@if ($keluarga_orang_tua-> jenis_kelamin === 'L')
                                  Laki-Laki
                                  @else
                                  Perempuan
                                  @endif</td>
                            <td>{{ $keluarga_orang_tua -> tempat_lahir}}</td>
                            <td>{{ \Carbon\Carbon::parse($keluarga_orang_tua -> tanggal_efektif)->format('d-m-Y')}}</td>
                            <td>{{ $keluarga_orang_tua -> pendidikan}}</td>
                            <td>{{ $keluarga_orang_tua -> pekerjaan}}</td>
                            <td>{{ $keluarga_orang_tua -> no_telepon}}</td>
                          </tr>
                            @endforeach

                        </tbody>
                      </table>
                      @else <h5>Data tidak ada</h5>
                      @endif

                          </div>
                    </div>
                    <!-- awal -->
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Dokumen</button>

                          <div class="content">
                           <br>
                          @if($employee -> dokumen -> count() != 0)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Nama Dokumen</th>
                                  <th>Keterangan</th>
                                  <th>Unduh</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee-> dokumen as $dokumen)
                                <tr>
                                  <td>{{ $dokumen -> nama_dokumen}}</td>
                                  <td>{{ $dokumen -> keterangan}}</td>
                                  <td>
                                    <a href="/upload/{{$dokumen -> nama_file}}">
                                      <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download">
                                      Unduh</i>
                                      </button>
                                    </a>
                                    </td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                            @else <h5>Data tidak ada</h5>
                            @endif

                      </div>
                    </div>
                    <!-- akhir -->
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                          <button class="collapsible">Mutasi</button>

                          <div class="content">
                            <br>
                            @if($employee -> mutasi -> count() != 0)
                             <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Jenis</th>
                                  <th>Cabang/Departemen</th>
                                  <th>Job title</th>
                                  <th>Tanggal Efektif</th>
                                  <th>Nomor Surat</th>
                                  <th>Tanggal Surat</th>
                                  <th>Tanggal diterima surat</th>
                                  <th>Informasi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee->mutasi as $mutasi)
                                <tr>
                                  <td>{{ $mutasi -> jenis_mutasi}}</td>
                                  <td>IT</td>
                                  <td>{{ $mutasi-> job_title}}</td>
                                  <td>{{ \Carbon\Carbon::parse($mutasi -> tanggal_efektif)->format('d-m-Y')}}</td>
                                  <td>{{ $mutasi -> nomor_surat}}</td>
                                  <td>{{ \Carbon\Carbon::parse($mutasi -> tanggal_efektif)->format('d-m-Y')}}</td>
                                  <td>{{ \Carbon\Carbon::parse($mutasi -> tanggal_efektif)->format('d-m-Y')}}</td>
                                  <td>{{ $mutasi -> informasi}}</td>
                                </tr>
                                @endforeach
                     </tbody>
                            </table>
                            @else <h5>Data tidak ada</h5>
                            @endif
                          </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                          <button class="collapsible">Surat</button>

                          <div class="content">
                            <br>
                            @if($employee -> surat -> count() != 0)
                            <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Jenis</th>
                                  <th>Nomor Surat</th>
                                  <th>Tanggal Surat</th>
                                  <th>Informasi</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($employee->surat as $surat)
                                <tr>
                                  <td>{{ $surat -> jenis}}</td>
                                  <td>{{ $surat -> nomor}}</td>
                                  <td>{{ \Carbon\Carbon::parse($mutasi -> tanggal)->format('d-m-Y')}}</td>
                                  <td>{{ $surat -> informasi}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                            @else <h5>Data tidak ada</h5>
                            @endif
                          </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                          <button class="collapsible">Laporan Psikotes dan Medical Check Up</button>

                          <div class="content">
                             <h4>Psikotes</h4>
                             <table id="dataAttendance" class="table table-condensed" align="center">
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Tanggal Terima</th>
                            <th>Hasil</th>
                            <th>Uraian</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                          </tr>

                        </tbody>
                      </table>

                      <h4>Medical Check Up</h4>
                             <table id="dataAttendance" class="table table-condensed" align="center">
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Tanggal Terima</th>
                            <th>Hasil</th>
                            <th>Masalah Kesehatan</th>
                            <th>Saran</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                          </tr>

                        </tbody>
                      </table>
                          </div>
                    </div>
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                          <button class="collapsible">Informasi Kedisiplinan</button>

                          <div class="content">
                            <br>
                            @if($employee -> kedisiplinan -> count() != 0)
                            <table id="dataAttendance" class="table table-condensed" align="center">
                              <thead>
                                <tr>
                                  <th>Jenis</th>
                                  <th>Subjek</th>
                                  <th>Masa Berlaku (Bulan)</th>
                                  <th>Keterangan</th>
                                  <th>Review</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($employee-> kedisiplinan as $kedisiplinan)
                                <tr>
                                  <td>{{ $kedisiplinan -> jenis}}</td>
                                  <td>{{ $kedisiplinan -> subjek}}</td>
                                  <td>{{ $kedisiplinan -> masa_berlaku}}</td>
                                  <td>{{ $kedisiplinan -> keterangan}}</td>
                                  <td>{{ $kedisiplinan -> review}}</td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                            @else <h5>Data tidak ada</h5>
                            @endif

                          </div>
                    </div>
                    <!-- akhir -->
                </div>
                      <script>
                            var coll = document.getElementsByClassName("collapsible");
                            var i;

                            for (i = 0; i < coll.length; i++) {
                              coll[i].addEventListener("click", function() {
                              this.classList.toggle("active1");
                              var content = this.nextElementSibling;
                              if (content.style.maxHeight){
                                content.style.maxHeight = null;
                              } else {
                                content.style.maxHeight = content.scrollHeight + "px";

                              }
                            });
                            }
                          </script>
>>>>>>> faisal                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection