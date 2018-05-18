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
                    <h2 style="padding-left: 30px;">Daftar Pengajuan Cuti</h2>

                  </div>
                  <div class="dahboard-menu">
                  <!--begin-->
                  <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item active">
                        <a class="nav-link active" id="listCuti-tab" data-toggle="tab" href="#listCuti" role="tab" aria-controls="listCuti" aria-selected="true">List Pengajuan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="riwayatCuti-tab" data-toggle="tab" href="#riwayatCuti" role="tab" aria-controls="riwayatCuti" aria-selected="false">Riwayat Pengajuan</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                      <div class="form-field tab-pane fade active in" id="listCuti" role="tabpanel" aria-labelledby="listCuti-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                        <table id="example" class="table table-hover" style="width:100%;">
                          <thead>
                            <th>Nama Pegawai</th>
                            <th>Nomor Pegawai</th>
                            <th>Departemen</th>
                            <th>Cabang</th>
                            <th>Tanggal Awal Cuti</th>
                            <th>Tanggal Akhir Cuti</th>
                            <th>Jenis Cuti</th>
                            <th>Status</th>
                            <th>Detail</th>
                          </thead>
                          @foreach($approvals as $cuti)
                          <tr>
                              <td>{{ $cuti -> nama}}</td>
                              <td>{{ $cuti -> nik_employee}}</td>
                              <td>{{ $cuti -> nama_departemen}}</td>
                              <td>{{ $cuti -> nama_cabang}}</td>
                              <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_mulai)->format('d-m-Y')}}</td>
                              <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_selesai)->format('d-m-Y')}} </td>
                              <td>{{ $cuti -> nama_jenis}}</td>
                              <td>
                                @if ($cuti -> status === 'Menunggu Persetujuan HRM')
                                  <span class="label label-default">{{ $cuti -> status}}</span>
                                @elseif ($cuti -> status === 'Ditolak')
                                <span class="label label-danger">{{ $cuti -> status}}</span>
                                @elseif($cuti -> status === 'Dibatalkan')
                                  <span class="label label-danger">{{ $cuti -> status}}</span>
                                @elseif($cuti -> status === 'Menunggu Persetujuan HoD')
                                  <span class="label label-default">{{ $cuti -> status}}</span>
                                @else
                                  <span class="label label-success">{{ $cuti -> status}}</span>
                                @endif
                              </td>
                              <td id="terima">
                                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{{$cuti -> id}}"><i class="fa fa-question-circle"></i></button>
                                <div class="modal fade" id="myModal{{$cuti -> id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    						  <div class="modal-dialog">
                    						    <div class="modal-content">
                    						      <div class="modal-header">
                    						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    						        <h4 id="myModalLabel">Detail Cuti</h4>
                    						      </div>
                    						      <div class="modal-body">
                                        <table class="table">
                                          <tr>
                                            <th>Nama Pegawai</th>
                                            <td>{{ $cuti -> nama}}</td>
                                          </tr>
                                          <tr>
                                            <th>Nomor Pegawai</th>
                                            <td>{{ $cuti -> nik_employee}}</td>
                                          </tr>
                                          <tr>
                                            <th>Departemen</th>
                                            <td>{{ $cuti -> nama_departemen}}</td>
                                          </tr>
                                          <tr>
                                            <th>Cabang</th>
                                            <td>{{ $cuti -> nama_cabang}}</td>
                                          </tr>
                                          <tr>
                                            <th>Jenis Cuti</th>
                                            <td>{{ $cuti -> nama_jenis}}</td>
                                          </tr>
                                          <tr>
                                            <th>Tanggal Awal Cuti</th>
                                            <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_mulai)->format('d-m-Y')}}</td>
                                          </tr>
                                          <tr>
                                            <th>Tanggal Akhir Cuti</th>
                                            <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_selesai)->format('d-m-Y')}} </td>
                                          </tr>
                                          <tr>
                                            <th>Alasan Cuti</th>
                                            <td>{{ $cuti -> alasan}}</td>
                                          </tr>
                                          <tr>
                                            <th>Alamat</th>
                                            <td>{{ $cuti -> alamat}}</td>
                                          </tr>
                                          <tr>
                                            <th>Telp/HP</th>
                                            <td>{{ $cuti -> no_telepon}}</td>
                                          </tr>
                                          <tr>
                                            <th>Pegawai Pengganti</th>
                                            <td>{{ $cuti -> pegawai_pengganti}}</td>
                                          </tr>
                                        </table>
                    						      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <form action="/leave/approval/diterima" method="post" >
                                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                  <input name="target" value="{{ $cuti -> id }}" hidden></input>
                                  <button class="btn btn-success btn-xs" type ="button" data-toggle="modal" data-target="#terima{{$loop -> index}}"
                                    @if ($cuti -> status === 'Menunggu Persetujuan hrManager') disabled
                                    @elseif($cuti -> status === 'Ditolak') disabled
                                    @elseif($cuti -> status === 'Dibatalkan') disabled
                                    @elseif($cuti -> status === 'Diterima') disabled
                                    @endif ><i class="fa fa-check" ></i></button>

                                  <div class="modal fade" id="terima{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                          <h2><strong>Terima pengajuan?</strong></h2>
                                          <button type="submit" class="btn btn-danger">YA</button>
                                          <button type="button" class="btn" data-dismiss="modal">KEMBALI</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>

                                <form action="/leave/approval/ditolak" method="post">
                                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                  <input name="target" value="{{ $cuti -> id}}" hidden></input>
                                  <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#tolak{{$loop -> index}}"
                                    @if ($cuti -> status === 'Ditolak') disabled
                                    @elseif ($cuti -> status === 'Menunggu Persetujuan hrManager') disabled
                                    @elseif($cuti -> status === 'Dibatalkan') disabled
                                    @elseif($cuti -> status === 'Diterima') disabled
                                    @endif><i class="fa fa-times-circle"></i></button>

                                  <div class="modal fade" id="tolak{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                          <h2><strong>Tolak pengajuan?</strong></h2>
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
                      </div>

                      <div class="form-field tab-pane fade" id="riwayatCuti" role="tabpanel" aria-labelledby="riwayatCuti-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                        @if(count($result) > 0)
                        <table id="example1" class="table table-hover" style="width:100%;">
                          <thead>
                            <th>Nama Pegawai</th>
                            <th>Nomor Pegawai</th>
                            <th>Departemen</th>

                            <th>Cabang</th>
                            <th>Tanggal Awal Cuti</th>
                            <th>Tanggal Akhir Cuti</th>
                            <th>Jenis Cuti</th>
                            <th>Status</th>
                            <th>Detail</th>
                          </thead>
                          @foreach($result as $cuti)
                          <tr>
                              <td>{{ $cuti -> nama}}</td>
                              <td>{{ $cuti -> nik_employee}}</td>
                              <td>{{ $cuti -> nama_departemen}}</td>
                              <td>{{ $cuti -> nama_cabang}}</td>
                              <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_mulai)->format('d-m-Y')}}</td>
                              <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_selesai)->format('d-m-Y')}} </td>
                              <td>{{ $cuti -> nama_jenis}}</td>
                              <td>
                                @if ($cuti -> status === 'Menunggu Persetujuan HRM')
                                  <span class="label label-default">{{ $cuti -> status}}</span>
                                @elseif ($cuti -> status === 'Ditolak')
                                <span class="label label-danger">{{ $cuti -> status}}</span>
                                @elseif($cuti -> status === 'Dibatalkan')
                                  <span class="label label-danger">{{ $cuti -> status}}</span>
                                @elseif($cuti -> status === 'Menunggu Persetujuan HoD')
                                  <span class="label label-default">{{ $cuti -> status}}</span>
                                @else
                                  <span class="label label-success">{{ $cuti -> status}}</span>
                                @endif
                              </td>
                              <td id="terima">
                                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{{$cuti -> id}}"><i class="fa fa-question-circle"></i></button>
                                <div class="modal fade" id="myModal{{$cuti -> id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    						  <div class="modal-dialog">
                    						    <div class="modal-content">
                    						      <div class="modal-header">
                    						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    						        <h4 id="myModalLabel">Detail Cuti</h4>
                    						      </div>
                    						      <div class="modal-body">
                                        <table class="table">
                                          <tr>
                                            <th>Nama Pegawai</th>
                                            <td>{{ $cuti -> nama}}</td>
                                          </tr>
                                          <tr>
                                            <th>Nomor Pegawai</th>
                                            <td>{{ $cuti -> nik_employee}}</td>
                                          </tr>
                                          <tr>
                                            <th>Departemen</th>
                                            <td>{{ $cuti -> nama_departemen}}</td>
                                          </tr>
                                          <tr>
                                            <th>Cabang</th>
                                            <td>{{ $cuti -> nama_cabang}}</td>
                                          </tr>
                                          <tr>
                                            <th>Jenis Cuti</th>
                                            <td>{{ $cuti -> nama_jenis}}</td>
                                          </tr>
                                          <tr>
                                            <th>Tanggal Awal Cuti</th>
                                            <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_mulai)->format('d-m-Y')}}</td>
                                          </tr>
                                          <tr>
                                            <th>Tanggal Akhir Cuti</th>
                                            <td>{{ \Carbon\Carbon::parse($cuti -> tanggal_selesai)->format('d-m-Y')}} </td>
                                          </tr>
                                          <tr>
                                            <th>Alasan Cuti</th>
                                            <td>{{ $cuti -> alasan}}</td>
                                          </tr>
                                          <tr>
                                            <th>Alamat</th>
                                            <td>{{ $cuti -> alamat}}</td>
                                          </tr>
                                          <tr>
                                            <th>Telp/HP</th>
                                            <td>{{ $cuti -> no_telepon}}</td>
                                          </tr>
                                          <tr>
                                            <th>Pegawai Pengganti</th>
                                            <td>{{ $cuti -> pegawai_pengganti}}</td>
                                          </tr>
                                        </table>
                    						      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                          </tr>
                          @endforeach
                        </table>
                        @else <h5>Tidak ada riwayat cuti</h5>
                        @endif
                      </div>
                    </div>

                    <script type="text/javascript">
                      $(document).ready(function() {
                        $('#example').DataTable();
                      } );
                    </script>

                    <script type="text/javascript">
                      $(document).ready(function() {
                        $('#example1').DataTable();
                      } );
                    </script>

                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

   @endsection