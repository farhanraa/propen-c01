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

                    <h2 style="padding-left: 30px;">Halaman Cuti</h2>
                  </div>
                  <div class="dahboard-menu">

                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link active" id="sisaCuti-tab" data-toggle="tab" href="#sisaCuti" role="tab" aria-controls="sisaCuti" aria-selected="true">Sisa Cuti</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="riwayatCuti-tab" data-toggle="tab" href="#riwayatCuti" role="tab" aria-controls="riwayatCuti" aria-selected="false">Riwayat Cuti</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="ajukanCuti-tab" data-toggle="tab" href="#ajukanCuti" role="tab" aria-controls="ajukanCuti" aria-selected="false">Ajukan Cuti</a>
                        </li>
                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="form-field tab-pane fade active in" id="sisaCuti" role="tabpanel" aria-labelledby="sisaCuti-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                          <table class="table">
                            <thead>

                              <th>Jenis Cuti</th>
                              <th>Tanggal Awal</th>
                              <th>Tanggal Akhir</th>
                              <th>Tanggal Hangus</th>
                              <th>Hak Cuti</th>
                              <th>Sisa Cuti</th>
                            </thead>
                            @foreach($jatahCuti as $cuti)
                            <tr>
                              <td>{{ $cuti -> nama_jenis}}</td>
                              <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_awal)->format('d-m-Y')}}</td>
                              <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_akhir)->format('d-m-Y')}}</td>
                              <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_hangus)->format('d-m-Y')}}</td>
                              <td>{{ $cuti -> durasi_cuti}}</td>
                              <td>{{ $cuti -> sisa_cuti}} </td>
                            </tr>
                            @endforeach

                          </table>
                        </div>

                        <div class="form-field tab-pane fade" id="riwayatCuti" role="tabpanel" aria-labelledby="riwayatCuti-tab" style="padding-left:5px; padding-right:35px; padding-top:15px; padding-bottom:5px;">
                          @if(count($result) > 0)
                          <table class="table" style="width:100%;">

                            <thead>

                              <th>Jenis Cuti</th>
                              <th>Tanggal Mulai Cuti</th>
                              <th>Tanggal Selesai Cuti</th>
                              <th>Alasan</th>
                              <th>Alamat</th>
                              <th>No Telepon</th>
                              <th>Pegawai Pengganti</th>
                              <th>Status</th>
                            </thead>
                            @foreach($result as $riwayat)
                            <tr>
                              <td>{{ $riwayat -> nama_jenis}}</td>
                              <td>{{ \Carbon\Carbon::parse($riwayat -> tanggal_mulai)->format('d-m-Y')}}</td>
                              <td>{{ \Carbon\Carbon::parse($riwayat -> tanggal_selesai)->format('d-m-Y')}}</td>
                              <td>{{ $riwayat -> alasan}}</td>
                              <td>{{ $riwayat -> alamat}}</td>
                              <td>{{ $riwayat -> no_telepon}}</td>
                              <td>{{ $riwayat -> pegawai_pengganti }}</td>
                              <td>
                                @if ($riwayat -> status === 'Menunggu Persetujuan HRM')
                                  <span class="label label-default">{{ $riwayat -> status}}</span>
                                @elseif ($riwayat -> status === 'Ditolak')
                                <span class="label label-danger">{{ $riwayat -> status}}</span>
                                @elseif($riwayat -> status === 'Dibatalkan')
                                  <span class="label label-warning">{{ $riwayat -> status}}</span>
                                @elseif($riwayat -> status === 'Menunggu Persetujuan HoD')
                                  <span class="label label-default">{{ $riwayat -> status}}</span>
                                @else
                                  <span class="label label-success">{{ $riwayat -> status}}</span>
                                @endif
                              </td>
                              <td>
                                <form action="/leave/form/dibatalkan" method="post">
                                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                  <input name="target" value="{{ $riwayat -> id }}" hidden></input>
                                  <button type ="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{$loop -> index}}"
                                    @if ($riwayat -> status === 'Ditolak') disabled
                                    @elseif($riwayat -> status === 'Diterima') disabled
                                    @elseif($riwayat -> status === 'Dibatalkan') disabled
                                    @endif><i class="fa fa-times-circle"></i></button>

                                    <div class="modal fade" id="myModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <h2><strong>Batalkan pengajuan?</strong></h2>
                                              <button type="submit" class="btn btn-danger">YA</button>
                                              <button type="button" class="btn" data-dismiss="modal">KEMBALI</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                </form>
                              </td>
                            </tr>
                            @endforeach

                          </table>
                          @else <h5>Tidak ada riwayat cuti</h5>
                          @endif
                        </div>


                        <div class="form-field tab-pane fade" id="ajukanCuti" role="tabpanel" aria-labelledby="ajukanCuti-tab" style="padding-left:35px; padding-right:35px; padding-top:25px; padding-bottom:35px;">
                          <form action="/leave/form/submit" method="post">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                              <label for="sel1"><strong>Jenis Cuti</strong></label>
                              <select class="form-control" id="sel1" name="jenisCuti">
                                @foreach($jenisCuti as $jenis)
                                  <option>{{$jenis -> nama_jenis}}</option>
                                @endforeach
                              </select><br>

                            <div class="row">
                              <div class='col-sm-6'>

                                <div class="form-group">
                                  <label for="datepicker1" ><strong>Tanggal Awal Cuti</strong></label>
                                  <div class="form-group">
                                    <input class="form-control" id='datepicker1' type='date' name="tanggalMulai" min="{{$today}}" required="true">
                                  </div>
                                  <script>

                                  </script>
                                </div>
                              </div>

                                <div class='col-sm-6'>
                                  <div class="form-group">
                                    <label for="datepicker2" ><strong>Tanggal Akhir Cuti</strong></label>
                                    <div class="form-group">
                                      <input class="form-control" id='datepicker2' type='date' name="tanggalSelesai" min="{{$today}}" required="true">
                                    </div>
                                    <script>

                                      </script>

                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label for="alasancuti"><strong>Alasan Cuti</strong></label>

                                    <textarea class="form-control" id="alasancuti" rows="2" name="alasan" required="true"></textarea>

                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label for="alamat"><strong>Alamat</strong></label>
                                    <input class="form-control" id="alamat" name="alamat" required="true"></input>
                                  </div>
                                </div>
                              </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="telp"><strong>Telp/HP</strong></label>
                                  <input class="form-control" id="telp" name="telp" required type="number"></input>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="pegawaipengganti"><strong>Pegawai Pengganti</strong></label>
                                  <input class="form-control" id="pegawaipengganti" name="pegawaipengganti" required="true"></input>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <span class="col-lg-11"></span>
                              <div class="btn-group">
                                <button type ="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaal">AJUKAN</button>
                              </div>
                            </div>

                                <div class="modal fade" id="myModaal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                          <h2><strong>Ajukan Cuti?</strong></h2>
                                          <button type="submit" class="btn btn-danger">YA</button>
                                          <button type="button" class="btn" data-dismiss="modal">KEMBALI</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                            <br><br>
                            <div class="row">
                              <span class="col-lg-8"></span>
                              <div class="btn-group">
                                <h5 style="font-style: italic; font-weight: 300">This form submitted to yudi_hrd@megasekuritas.id</h5>
                              </div>

                            </div>

                          </form>
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
