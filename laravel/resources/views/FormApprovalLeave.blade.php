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
                              <button class="btn btn-success btn-xs" type="Submit"
                                @if ($cuti -> status === 'Menunggu Persetujuan hrManager') disabled
                                @elseif($cuti -> status === 'Ditolak') disabled
                                @elseif($cuti -> status === 'Dibatalkan') disabled
                                @elseif($cuti -> status === 'Diterima') disabled
                                @endif ><i class="fa fa-check" ></i></button>
                            </form>
                            <form action="/leave/approval/ditolak" method="post">
                              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                              <input name="target" value="{{ $cuti -> id}}" hidden></input>
                              <button class="btn btn-danger btn-xs" type="Submit"
                                @if ($cuti -> status === 'Ditolak') disabled
                                @elseif ($cuti -> status === 'Menunggu Persetujuan hrManager') disabled
                                @elseif($cuti -> status === 'Dibatalkan') disabled
                                @elseif($cuti -> status === 'Diterima') disabled
                                @endif><i class="fa fa-times-circle"></i></button>
                            </form>
                          </td>
                      </tr>
                 @endforeach
                    </table>
                    <script type="text/javascript">
                      $(document).ready(function() {
                        $('#example').DataTable();
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

