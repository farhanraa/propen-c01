@extends("layouts/masterlayout")
@section("main")
      <section class="wrapper">
        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
              if(exist){
                alert(msg);
                }
        </script>
        <div class="row">
          <div class="col-lg-12">
            <div class="row mt">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;"> Halaman Ubah Profil</h2>
                  </div>
                  <div class="dahboard-menu">


                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link active" id="dataKaryawan-tab" data-toggle="tab" href="#dataKaryawan" role="tab" aria-controls="dataKaryawan" aria-selected="true">Data Karyawan</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pendidikan-tab" data-toggle="tab" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="false">Pendidikan & Pengalaman</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="dataKeluarga-tab" data-toggle="tab" href="#dataKeluarga" role="tab" aria-controls="dataKeluarga" aria-selected="false">Data Keluarga</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="kontrak-tab" data-toggle="tab" href="#kontrak" role="tab" aria-controls="kontrak" aria-selected="false">Kontrak</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="lisensi-tab" data-toggle="tab" href="#lisensi" role="tab" aria-controls="lisensi" aria-selected="false">Lisensi</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="dokumen-tab" data-toggle="tab" href="#dokumen" role="tab" aria-controls="dokumen" aria-selected="false">Dokumen & Surat</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="lainLain-tab" data-toggle="tab" href="#lainLain" role="tab" aria-controls="lainLain" aria-selected="false">Lain-Lain</a>
                        </li>
                      </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">

                      <div class="form-field tab-pane fade active in" id="dataKaryawan" role="tabpanel" aria-labelledby="dataKaryawan-tab" style="padding-left:35px; padding-right:35px; padding-top:25px; padding-bottom:35px;">
                        <form class="form-field"  action="{{ route('submitFormProfil') }}" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class='col-sm-2'>
                                <div class="form-group">
                                <img  src=  "/upload/{{$employee-> foto}}"  style="width:150px;height:180px;padding-left: 20px; margin-bottom: 60px;">
                                  <br>
                                  <input type="file" name="uploadContainer" >
                                </div>
                            </div>

                            <div class='col-sm-10'>
                              <div class="form-group" style="margin-left: 20px;">
                                 <input type="text" name="nama" me="fname" value="{{ $employee -> nama }}" size="50" style="margin-bottom:5px;"  class="form-control" style="padding-bottom:0px;" required>
                                  @foreach($jabatan as $jabatan)
                                    <h5 style="padding-left:10px;">{{$jabatan -> nama_jabatan}}
                                    @endforeach</h5>
                                  <table style="width:100%;table-layout: auto;"  style="height:80%;">
                                    <tr>
                                      <th>Nomor Pegawai</th>
                                     <td style="padding-left:10px;">{{ $employee -> nik_employee }}</td>
                                    </tr>
                                    <tr>
                                      <th width="20%">Email Perusahaan</th>
                                      <td width="80%">  <input type="text" name="email_perusahaan" value="{{ $employee -> email_perusahaan }}" size="50" style="margin-bottom:5px; line-height: 60%; padding-bottom:0px;" class="form-control" name="email_perusahaan" required></td>
                                    </tr>
                                    <tr>
                                    <th>Cabang</th>
                                       @foreach($cabang as $cabang)
                                      <td style="padding-left:10px; padding-bottom: 10px;">{{$cabang -> nama_cabang}}</td>
                                      @endforeach
                                    </tr>
                                    <tr>
                                    <th>Departemen</th>
                                      @foreach($departemen as $departemen)
                                      <td style="padding-left:10px;">{{$departemen -> nama_departemen}}</td>
                                      @endforeach
                                    </tr>
                                    <tr>
                                      <th width=>Alamat</th>
                                      <td width=><input type="Text" value="{{ $employee -> alamat_tempat_tinggal}}" size="80"style="line-height: 50%; padding-bottom:0px;" name="alamat" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                      <th>No. Handphone</th>
                                      <td><input type="number" value="{{ $employee -> no_handphone }}" name="no_handphone" size="80" style="line-height: 60%;padding-bottom:0px;" class="form-control" required></td>
                                    </tr>
                                  </table>
                                  <br>
                                  <br>
                              </div>
                            </div>
                            <div>
                              <h4><b>Profil Karyawan</b></h4>
                               <table id="tabelProfil"  style="width: 100%;">
                                  <tr>
                                    <th width="33%">Tempat Lahir</th>
                                    <th width="33%">Tanggal Lahir </th>
                                    <th width="34%">Email Pribadi</th>
                                  </tr>
                                  <tr>
                                    <td style="padding-left:10px;">{{ $employee -> tempat_lahir}}</td>
                                    <td style="padding-left:10px;">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d-m-Y')}}</td>
                                    <td><input type="Text" class="form-control" value="{{ $employee -> email}}" size="45" name="email"></td>
                                  </tr>
                                  <tr>
                                    <th width="33%">Agama</th>
                                    <th width="33%">Jenis Kelamin</th>
                                    <th width="34%">Golongan Darah</th>
                                  </tr>
                                  <tr>
                                    <td ><input type="Text" value="{{ $employee -> agama}}" size="42" name="agama" class="form-control" required></td>
                                    <td style="padding-left:10px;">@if ($employee -> jenis_kelamin === 'L')
                                    Laki-Laki
                                    @else
                                    Perempuan
                                    @endif
                                    </td>
                                    <td style="padding-left:10px;">{{$employee -> golongan_darah}}</td>
                                  </tr>
                                 <tr>
                                    <th width="33%">Tinggi Badan (cm)</th>
                                    <th width="33%">Berat Badan (kg)</th>
                                    <th >Status Perkawinan</th>
                                  </tr>
                                  <tr>
                                    <td><input type="Text" value="{{ $employee -> tinggi}}" size="42" name="tinggi" class="form-control" required></td>
                                    <td><input type="Text" value="{{ $employee -> berat_badan}}" size="42" name="berat_badan" class="form-control" required></td>
                                    <td><input type="Text" value="{{ $employee -> status_perkawinan}}" size="45"
                                      name="status_perkawinan" class="form-control" required></td>
                                  </tr>
                                 <tr>
                                    <th width="33%">Jenis Identitas</th>
                                    <th width="33%">Nomor Identitas</th>
                                    <th width="34%">Alamat (Identitas)</th>
                                  </tr>
                                  <tr>
                                    <td><input type="Text" value="{{ $employee -> jenis_identitas}}" size="42" name="jenis_identitas" class="form-control" required></td>
                                    <td><input type="Text" value="{{ $employee -> no_identitas }}" size="42" name="no_identitas" class="form-control" required></td>
                                    <td><input type="Text" value="{{ $employee -> jalan_identitas}}" size="45" name="jalan_identitas" class="form-control" required></td>
                                  </tr>
                                  <tr>
                                    <th width="33%" >Kota (Identitas)</th>
                                    <th width="33%" >Provinsi (Identitas)</th>
                                    <th width="34%" >Kode pos (Identitas)</th>
                                  </tr>
                                  <tr>
                                    <td><input type="Text" value="{{ $employee -> kota_identitas }}" size="42" name="kota_identitas" class="form-control" required></td>
                                    <td><input type="Text" value="{{ $employee -> provinsi_identitas }}" size="42" name="provinsi_identitas" class="form-control" required></td>
                                    <td><input type="Text" value="{{ $employee -> kode_pos_identitas }}" size="45" name="kode_pos_identitas" class="form-control" required></td>
                                  </tr>
                                  <tr>
                                    <th width="33%">Nomor Telepon (Identitas)</th>
                                    <th width="33%">Nomor DPLK</th>
                                    <th width="34%">Nomor NPWP</th>
                                  </tr>
                                  <tr>
                                    <td><input type="number" value="{{ $employee -> no_telepon }}" size="42" name="no_telepon" class="form-control" required></td>
                                    <td><input type="number" value="{{ $employee -> no_dplk }}" size="42" name="no_dplk" class="form-control" required></td>
                                    <td><input type="number" value="{{ $employee -> no_npwp }}" size="45" name="no_npwp" class="form-control" required></td>
                                  </tr>
                                  <tr>
                                    <th width="33%">Nomor BPJS</th>
                                    <th width="34%">Nomor Jamsostek</th>
                                  </tr>
                                  <tr>
                                    <td><input type="number" value="{{ $employee -> no_bpjs }}" size="42" name="no_bpjs" class="form-control" required></td>
                                    <td><input type="number" value="{{ $employee -> no_jamsostek }}" size="42" name="no_jamsostek" class="form-control" required></td>
                                  </tr>
                                </table>
                                <button class="btn btn-primary btn-lg" type="submit" style="margin-top:20px; margin-left: 393px;">Ubah</a>
                              </div>
                          </form>
                      </div>

                      <div class="form-field tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab" style="padding-left:35px; padding-right:35px; padding-top:0px; padding-bottom:35px;">
                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Pendidikan</h3>
                          <form class="form-field"  action="{{ route('ubahKD') }}" method="post" enctype="multipart/form-data" style="padding-top:5px; padding-bottom:5px;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <br>
                             <table id="tabelProfil">
                                <tr>
                                  <th width="33%">Nama</th>
                                  <th width="33%">Hubungan</th>
                                  <th width="34%">Alamat</th>
                                </tr>
                                <tr>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> nama_kontak}}" size="42" class="form-control" name="nama_kontak" required></td>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> hubungan_kontak}}" size="42" class="form-control" name="hubungan_kontak" required></td>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> alamat_kontak}}" size="45" class="form-control" name="alamat_kontak" required></td>
                                </tr>
                                <tr>
                                  <th width="33%">Kota</th>
                                  <th width="33%">Provinsi</th>
                                  <th width="34%">Kode Pos</th>
                                </tr>
                                <tr>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> kota_kontak}}" size="42" class="form-control" name="kota_kontak" required></td>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> provinsi_kontak}}" size="42" class="form-control" name="provinsi_kontak" required></td>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> kode_pos_kontak}}" size="45" class="form-control" name="kode_pos_kontak" required></td>
                                </tr>
                               <tr>
                                  <th width="33%">Nomor Telepon</th>
                                  <th width="33%">Nomor Handphone</th>
                                </tr>
                                <tr>
                                  <td><input type="number" value="{{ $employee -> kontakDarurat -> no_telepon_kontak}}" size="42" class="form-control" name="no_telp_kontak" required></td>
                                  <td><input type="number" value="{{ $employee -> kontakDarurat -> no_hp_kontak}}" size="42" class="form-control" name="no_hp_kontak" required></td>
                                </tr>
                              </table>
                              <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Ubah</button>
                            </form>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Pengalaman Kerja</h3>
                          <form class="form-field"  action="{{ route('tambahPK') }}" method="post" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <div class="col-lg-6">
                              <label for="reason"><strong>Nama Perusahaan</strong></label>
                            <input class="form-control" type="Text" value="" name="nama_perusahaan" required>
                           </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Periode</strong></label>
                                 <input class="form-control" type="Text" value=""  name="periode" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Jabatan</strong></label>
                                 <input class="form-control" type="Text" value="" name="jabatan" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Jabatan Atasan Langsung</strong></label>
                                 <input class="form-control"  type="Text" value="" name="jabatan_atasan_langsung" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Alasan Keluar</strong></label>
                                 <input class="form-control"  type="Text" value="" name="alasan_keluar" required>
                             </div>
                                                     <div class="col-lg-6">
                                 <label for="reason"><strong>Gaji</strong></label>
                                 <input class="form-control"  type="number" value="" name="gaji_terakhir" required>
                             </div>
                             <div class="col-lg-12">
                                 <label for="reason"><strong>Ringkasan Pekerjaan</strong></label>
                                 <input class="form-control" type="Text" value="" name="ringkasan_jenis_pekerjaan" required>
                             </div>
                               <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                         </form>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Pengalaman Berorganisasi</h3>
                          <form class="form-field"  action="{{ route('tambahPB') }}" method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <div class="col-lg-6">
                              <label for="reason"><strong>Nama Organisasi</strong></label>
                            <input class="form-control" type="Text" name="nama_organisasi" required>
                           </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Jenis Organisasi</strong></label>
                                 <input class="form-control" type="Text" name="jenis_organisasi" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Tahun Aktif</strong></label>
                                 <input class="form-control" type="Text" name="tahun_aktif" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Jabatan</strong></label>
                                 <input class="form-control" type="Text" name="jabatan" required>
                             </div>
                               <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                         </form>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Hobi & Prestasi</h3>
                          <form class="form-field"  action="{{ route('tambahHDP') }}" method="post" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-6">
                               <label for="reason"><strong>Nama Hobi</strong></label>
                             <input class="form-control" type="Text" name="hobi" required>
                            </div>
                              <div class="col-lg-6">
                                  <label for="reason"><strong>Presatasi</strong></label>
                                  <input class="form-control" type="Text" name="prestasi" required>
                              </div>
                                <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                          </form>
                        </div>
                      </div>

                      <div class="form-field tab-pane fade" id="dataKeluarga" role="tabpanel" aria-labelledby="dataKeluarga-tab" style="padding-left:35px; padding-right:35px; padding-top:0px; padding-bottom:35px;">
                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Keluarga sebagai orang tua</h3>
                          <form class="form-field"  action="{{ route('tambahK1') }}" method="post" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="col-lg-4">
                              <label for="reason"><strong>Hubungan</strong></label>
                              <input class="form-control" type="Text" value="" name="hubungan" required>
                             </div>
                             <div class="col-lg-4">
                               <label for="reason"><strong>Nama</strong></label>
                               <input class="form-control" type="Text" value="" name="nama" required>
                             </div>
                             <div class="col-lg-4">
                               <label for="reason"><strong>Jenis Kelamin</strong></label>
                               <select class="form-control" value="" name="jenis_kelamin" required>
                                 <option value="L">Laki-Laki</option>
                                 <option value="P">Perempuan</option>
                               </select>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Tanggal Lahir</strong></label>
                                 <input class="form-control" type="Text" id='datepicker5' value="" name="tanggal_lahir" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Tempat Lahir</strong></label>
                                 <input class="form-control"  type="Text" value="" name="tempat_lahir" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Pendidikan</strong></label>
                                 <input class="form-control"  type="Text" value="" name="pendidikan" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Pekerjaan</strong></label>
                                 <input class="form-control"  type="Text" value="" name="pekerjaan" required>
                             </div>
                             <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                            </form>
                            <script>
                               $(function () {
                                 $('#datepicker5').datepicker();
                               });
                            </script>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Keluarga sebagai anak</h3>
                          <form class="form-field"  action="{{ route('tambahK2') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-4">
                              <label for="reason"><strong>Hubungan</strong></label>
                              <input class="form-control" type="Text" value="" name="hubungan" required>
                            </div>
                            <div class="col-lg-4">
                              <label for="reason"><strong>Nama</strong></label>
                              <input class="form-control" type="Text" value="" name="nama" required>
                            </div>
                            <div class="col-lg-4">
                              <label for="reason"><strong>Jenis Kelamin</strong></label>
                              <select class="form-control" value="" name="jenis_kelamin" required>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                              </select>
                            </div>
                            <div class="col-lg-4">
                              <label for="reason"><strong>Tanggal Lahir</strong></label>
                              <input class="form-control" type="Text" id='datepicker6' value="" name="tanggal_lahir" required>
                            </div>
                            <div class="col-lg-4">
                              <label for="reason"><strong>Tempat Lahir</strong></label>
                              <input class="form-control"  type="Text" value="" name="tempat_lahir" required>
                            </div>
                            <div class="col-lg-4">
                              <label for="reason"><strong>Pendidikan</strong></label>
                              <input class="form-control"  type="Text" value="" name="pendidikan" required>
                            </div>
                            <div class="col-lg-6">
                              <label for="reason"><strong>Pekerjaan</strong></label>
                              <input class="form-control"  type="Text" value="" name="pekerjaan" required>
                            </div>
                            <div class="col-lg-6">
                              <label for="reason"><strong>No. Telepon</strong></label>
                              <input class="form-control"  type="number" value="" name="no_telepon" required>
                            </div>
                            <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                          </form>
                          <script>
                             $(function () {
                               $('#datepicker6').datepicker();
                             });
                         </script>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Kontak Darurat</h3>
                          <form class="form-field"  action="{{ route('ubahKD') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <table id="tabelProfil">
                                <tr>
                                  <th width="33%">Nama</th>
                                  <th width="33%">Hubungan</th>
                                  <th width="34%">Alamat</th>
                                </tr>
                                <tr>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> nama_kontak}}" size="42" class="form-control" name="nama_kontak" required></td>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> hubungan_kontak}}" size="42" class="form-control" name="hubungan_kontak" required></td>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> alamat_kontak}}" size="45" class="form-control" name="alamat_kontak" required></td>
                                </tr>
                                <tr>
                                  <th width="33%">Kota</th>
                                  <th width="33%">Provinsi</th>
                                  <th width="34%">Kode Pos</th>
                                </tr>
                                <tr>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> kota_kontak}}" size="42" class="form-control" name="kota_kontak" required></td>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> provinsi_kontak}}" size="42" class="form-control" name="provinsi_kontak" required></td>
                                  <td><input type="Text" value="{{ $employee -> kontakDarurat -> kode_pos_kontak}}" size="45" class="form-control" name="kode_pos_kontak" required></td>
                                </tr>
                               <tr>
                                  <th width="33%">Nomor Telepon</th>
                                  <th width="33%">Nomor Handphone</th>
                                </tr>
                                <tr>
                                  <td><input type="number" value="{{ $employee -> kontakDarurat -> no_telepon_kontak}}" size="42" class="form-control" name="no_telp_kontak" required></td>
                                  <td><input type="number" value="{{ $employee -> kontakDarurat -> no_hp_kontak}}" size="42" class="form-control" name="no_hp_kontak" required></td>
                                </tr>
                              </table>
                              <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Ubah</button>
                            </form>
                        </div>
                      </div>

                      <div class="form-field tab-pane fade" id="kontrak" role="tabpanel" aria-labelledby="kontrak-tab" style="padding-left:35px; padding-right:35px; padding-top:0px; padding-bottom:35px;">
                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Kontrak/Percobaan</h3>
                          <form class="form-field"  action="{{ route('tambahKP') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-6">
                              <label for="reason"><strong>Jenis</strong></label>
                              <input class="form-control" type="Text" value="" name="jenis" required>
                            </div>
                            <div class="col-lg-6">
                              <label for="reason"><strong>Jangka Waktu (bulan)</strong></label>
                              <input class="form-control" type="number" value="" name="jangka_waktu" required>
                            </div>
                            <div class='col-sm-6'>
                              <label for="datepicker2"><strong>Tanggal Awal</strong></label>
                              <input class="form-control" id='datepicker1' type='text' name="tanggal_awal" required>
                            </div>
                            <div class='col-sm-6'>
                              <label for="reason"><strong>Tanggal Akhir</strong></label>
                              <input class="form-control" id='datepicker2' type='text' name="tanggal_akhir" required>
                            </div>
                            <div class="col-lg-12">
                              <label for="reason"><strong>Keterangan</strong></label>
                              <input class="form-control" type="Text" value="" name="keterangan" required>
                            </div>
                            <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                          </form>
                          <script>
                             $(function () {
                               $('#datepicker1').datepicker();
                             });
                          </script>
                          <script>
                             $(function () {
                               $('#datepicker2').datepicker();
                             });
                          </script>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Mutasi</h3>
                          <form class="form-group">
                            <div class="col-lg-4">
                              <label for="reason"><strong>Jenis</strong></label>
                              <input class="form-control" type="Text" value="" required>
                            </div>
                            <div class="col-lg-4">
                               <label for="reason"><strong>Cabang/Departemen</strong></label>
                               <input class="form-control" type="Text" value="" required>
                           </div>
                           <div class="col-lg-4">
                             <label for="reason"><strong>Job title</strong></label>
                             <input class="form-control" type="Text" value="" required>
                           </div>
                           <div class="col-lg-4">
                             <label for="reason"><strong>Tanggal Efektif</strong></label>
                             <input class="form-control" type="Text" id='datepicker7' value="" required>
                           </div>
                           <div class="col-lg-4">
                             <label for="reason"><strong>Nomor Surat</strong></label>
                             <input class="form-control"  type="Text" value="" required>
                           </div>
                           <div class="col-lg-4">
                             <label for="reason"><strong>Tanggal Surat</strong></label>
                             <input class="form-control"  type="Text" id='datepicker8'value="" required>
                           </div>
                           <div class="col-lg-4">
                             <label for="reason"><strong>Tanggal Diterima Surat</strong></label>
                             <input class="form-control"  type="Text" id='datepicker9' value="" required>
                           </div>
                           <div class="col-lg-8">
                             <label for="reason"><strong>Informasi</strong></label>
                             <input class="form-control"  type="Text" value="" required>
                           </div>
                           <button class="btn btn-primary" type="button"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                         </form>
                         <script>
                           $(function () {
                             $('#datepicker7').datepicker();
                           });
                        </script>
                        <script>
                             $(function () {
                               $('#datepicker8').datepicker();
                             });
                        </script>
                        <script>
                             $(function () {
                               $('#datepicker9').datepicker();
                             });
                        </script>
                        </div>
                      </div>

                      <div class="form-field tab-pane fade" id="lisensi" role="tabpanel" aria-labelledby="lisensi-tab" style="padding-left:35px; padding-right:35px; padding-top:0px; padding-bottom:35px;">
                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Lisensi</h3>
                          <form class="form-field"  action="{{ route('tambahLI') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-6">
                              <label for="reason"><strong>Nomor Lisensi</strong></label>
                              <input class="form-control" type="Text" value="" name="nomor" required>
                            </div>
                            <div class="col-lg-6">
                              <label for="reason"><strong>Jenis</strong></label>
                              <input class="form-control" type="Text" value="" name="jenis_lisensi" required>
                            </div>
                            <div class='col-sm-6'>
                              <label for="datepicker2"><strong>Tanggal</strong></label>
                              <input class="form-control" id='datepicker3' type='text' name="tanggal" required>
                            </div>
                            <div class='col-sm-6'>
                              <label for="reason"><strong>Tanggal Hangus</strong></label>
                              <input class="form-control" id='datepicker4' type='text' name="tanggal_hangus" required>
                            </div>
                            <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                          </form>
                          <script>
                             $(function () {
                               $('#datepicker3').datepicker();
                             });
                          </script>
                          <script>
                             $(function () {
                               $('#datepicker4').datepicker();
                             });
                          </script>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Sertifikasi/Pelatihan</h3>
                          <form class="form-field"  action="{{ route('tambahSP') }}" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-6">
                               <label for="reason"><strong>Nama Sertifikasi/Pelatihan</strong></label>
                             <input class="form-control" type="Text" value="" name="nama_sertifikat" required>
                            </div>
                              <div class="col-lg-6">
                                  <label for="reason"><strong>Tingkatan</strong></label>
                                  <input class="form-control" type="Text" value="" name="tingkat_sertifikat" required>
                              </div>
                              <div class="col-lg-6">
                                  <label for="reason"><strong>Tahun</strong></label>
                                  <input class="form-control"  type="number" value="" name="tahun_sertifikat" required>
                              </div>
                              <div class="col-lg-6">
                                  <label for="reason"><strong>Penyelenggara</strong></label>
                                  <input class="form-control"  type="Text" value="" name="penyelenggara" required>
                              </div>
                              <div class="col-lg-12">
                                  <label for="reason"><strong>Catatan</strong></label>
                                  <input class="form-control" type="Text" value="" name="catatan_sertifikat" required>
                              </div>
                                <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                          </form>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Kemampuan Bahasa</h3>
                          <form class="form-field"  action="{{ route('tambahBA') }}" method="post" enctype="multipart/form-data">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="col-lg-4">
                                <label for="reason"><strong>Nama Bahasa</strong></label>
                              <input class="form-control" type="Text" value="" name="nama_bahasa" required>
                             </div>
                               <div class="col-lg-4">
                                   <label for="reason"><strong>Kemampuan Berbicara</strong></label>
                                   <input class="form-control" type="Text" value="" name="kemampuan_berbicara" required>
                               </div>
                               <div class="col-lg-4">
                                   <label for="reason"><strong>Kemampuan Menulis</strong></label>
                                   <input class="form-control"  type="Text" value="" name="kemampuan_menulis" required>
                               </div>
                                 <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                          </form>
                        </div>
                      </div>

                      <div class="form-field tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab" style="padding-left:35px; padding-right:35px; padding-top:0px; padding-bottom:35px;">
                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Dokumen</h3>
                          <form class="form-group" action="{{ route('tambahDoku') }}" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <div class="col-lg-4">
                              <label for="reason"><strong>Nama Dokumen</strong></label>
                            <input class="form-control" type="Text" name="nama" required>
                           </div>
                             <div class="col-lg-8">
                                 <label for="reason"><strong>Keterangan</strong></label>
                                 <input class="form-control" type="Text" name="keterangan" required>
                             </div>
                             <div class="col-lg-12">
                                 <label for="reason"><strong>Upload File</strong></label>
                                 <input type="file" name="uploadDok" required>
                             </div>
                               <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                         </form>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Surat</h3>
                          <form class="form-field"  action="{{ route('tambahSU') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-4">
                               <label for="reason"><strong>Jenis</strong></label>
                             <input class="form-control" type="Text" value="" name="jenis" required>
                            </div>
                              <div class="col-lg-8">
                                  <label for="reason"><strong>Nomor Surat</strong></label>
                                  <input class="form-control" type="Text" value="" name="nomor" required>
                              </div>
                             <div class="col-lg-4">
                                  <label for="reason"><strong>Tanggal Surat</strong></label>
                                  <input class="form-control"  type="Text" id='datepicker10' value="" name="tanggal" required>
                              </div>
                              <div class="col-lg-8">
                                  <label for="reason"><strong>Informasi</strong></label>
                                  <input class="form-control" type="Text" value="" name="informasi" required>
                              </div>
                                <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                          </form>
                          <script>
                            $(function () {
                              $('#datepicker10').datepicker();
                            });
                          </script>
                        </div>
                      </div>

                      <div class="form-field tab-pane fade" id="lainLain" role="tabpanel" aria-labelledby="lainLain-tab" style="padding-left:35px; padding-right:35px; padding-top:0px; padding-bottom:35px;">
                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Informasi Bank</h3>
                          <form class="form-field"  action="{{ route('ubahBank') }}" method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <div class="col-lg-6">
                              <label for="reason"><strong>Nama Bank</strong></label>
                            <input class="form-control" type="Text" value="{{ $employee -> bank -> nama_bank}}" name="nama_bank" required>
                           </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Nomor Rekening</strong></label>
                                 <input class="form-control" type="number" value="{{ $employee -> bank -> nomor_rekening_bank}}" name="no_rekening_bank" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Nama Pemilik Rekening</strong></label>
                                 <input class="form-control" type="Text" value="{{ $employee -> bank -> nama_rekening}}" name="nama_rekening" required>
                             </div>
                             <div class="col-lg-6">
                                 <label for="reason"><strong>Informasi Bank</strong></label>
                                 <input class="form-control" type="Text" value="{{ $employee -> bank -> informasi_bank}}" name="informasi_bank" required>
                             </div>
                             <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Ubah</button>
                         </form>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Informasi Kedisiplinan</h3>
                          <form class="form-field"  action="{{ route('tambahIK') }}" method="post" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-4">
                               <label for="reason"><strong>Jenis</strong></label>
                             <input class="form-control" type="Text" value="" name="jenis" required>
                            </div>
                              <div class="col-lg-4">
                                  <label for="reason"><strong>Subjek</strong></label>
                                  <input class="form-control" type="Text" value="" name="subjek" required>
                              </div>
                              <div class="col-lg-4">
                                  <label for="reason"><strong>Masa Berlaku (Bulan)</strong></label>
                                  <input class="form-control" type="number" value="" name="masa_berlaku" required>
                              </div>
                              <div class="col-lg-8">
                                  <label for="reason"><strong>Review</strong></label>
                                  <input class="form-control" type="Text" value="" name="review" required>
                              </div>
                              <div class="col-lg-4">
                                  <label for="reason"><strong>Keterangan</strong></label>
                                  <input class="form-control" type="Text" value="" name="keterangan" required>
                              </div>
                                <button class="btn btn-primary" type="submit"  style="margin-top:14px; margin-left: 14px">Tambah</button>
                          </form>
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                           <h3>Psikotes</h3>
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
                        </div>

                        <div class="form-field" style="padding-top:5px; padding-bottom:5px;">
                          <h3>Medical Check Up</h3>
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
                  </div>
                                        <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#konfirmasi" style="margin-top:-50px; margin-bottom: 20px; margin-left: 400px;">Ajukan Perubahan</button>
                                        <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <h2><strong>Kirim pengajuan?</strong></h2>
                                              <h4>Data yang telah diubah atau ditambahkan akan langsung dikirimkan ke HRM untuk dilakukan persetujuan</h4>
                                              <a class="btn btn-warning" type="button" href="{{ route('selesai') }}">YA</a>
                                              <button type="button" class="btn" data-dismiss="modal">KEMBALI</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>






                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

