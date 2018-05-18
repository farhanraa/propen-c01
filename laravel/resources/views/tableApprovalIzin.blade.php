@extends("layouts/masterlayout")
@section("main")
      <section class="wrapper">

       <!--     @if(Session::has('message'))
           <div class = "alert">
            {{Session::get('message')}}
          @endif -->
          <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
              if(exist){
                alert(msg);
                }
        </script>

        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="row mt">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;">Daftar Pengajuan Izin</h2>
                  </div>

                   <div class="dahboard-menu" style="margin:2.5%;">

                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                      <!-- TAB START -->
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link active" id="listPengajuan-tab" data-toggle="tab" href="#listPengajuan" role="tab" aria-controls="listPengajuan">List Pegajuan</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="riwayatPengajuan-tab" data-toggle="tab" href="#riwayatPengajuan" role="tab" aria-controls="riwayatPengajuan">Riwayat Pengajuan</a>
                        </li>
                      </ul>
                       <!-- TAB END -->
                       <div class="tab-content" id="myTabContent">

                         <div class="form-field tab-pane fade active in" id="listPengajuan" role="tabpanel" aria-labelledby="listPengajuan-tab"  style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                          <table id="example" class="table table-hover" style="width:95%">

                              <thead>
                                  <tr>
                                      <th>Nama</th>
                                      <th>Jenis Izin</th>
                                      <th>Alasan</th>
                                      <th>Tanggal Permohonan</th>
                                      <th>Jam</th>
                                      <th>Status</th>

                                      <th style="width: 8rem">Detail</th>

                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($listPengajuan as $pengajuan)
                                  <tr>
                                      <td>{{ $pengajuan -> nama }}</td>
                                      <td>{{ $pengajuan -> jenis}} </td>
                                      <td style="width: 22rem">{{ $pengajuan -> alasan}} </td>
                                      <td>{{ $pengajuan -> tanggal_permohonan}}</td>

                                      <td>{{ \Carbon\Carbon::parse($pengajuan -> waktu)->format('H:i')}} </td>

                                      <td>
                                      <span class="label label-default">{{ $pengajuan -> status}}</span>                        
                                  </td>


                                      <td id="terima">

                                        <ul>
                                        <li style="float: left"><form action="/permission/approval/diterima" method="post" >
                                          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                          <input name="target" value="{{ $pengajuan -> id }}" hidden></input>
                                          <!-- <input name="target" value="{{ $pengajuan -> status }}" id="terima" hidden></input> -->
                                          <button class="btn btn-success btn-xs" type ="button" data-toggle="modal" data-target="#terima{{$loop -> index}}"><i class="fa fa-check" ></i></button>

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

                                        </form></li>
                                        <li style="float: left"><form action="/permission/approval/ditolak" method="post">
                                          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                          <input name="target" value="{{ $pengajuan -> id }}" hidden></input>

                                          <button class="btn btn-danger btn-xs" type="button" data-toggle="modal" data-target="#tolak{{$loop -> index}}"
                                          @if($pengajuan->status == 'Ditolak') disabled                                          
                                          @elseif($pengajuan->status == 'Diterima') disabled
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

                                        </form></li>
                                      </td></ul>    

                                  </tr>

                                @endforeach
                              </tbody>
                          </table>
                  <script type="text/javascript">
                    $(document).ready(function() {
                      $('#example').DataTable();
                    } );
                  </script>
                </div>


                        <div class="form-field tab-pane fade" id="riwayatPengajuan" role="tabpanel" aria-labelledby="riwayatPengajuan-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                          <table  id="example2" class="table table-hover" style="width:95%">

                      <thead>
                          <tr>

                              <th>Nama</th>
                              <th>Jenis Izin</th>
                              <th>Alasan</th>
                              <th>Tanggal Permohonan</th>
                              <th>Jam</th>

                              <th>Status</th>
                             

                          </tr>
                      </thead>
                      <tbody>
                        @foreach($riwayatPengajuan as $pengajuan)

                          <tr>


                              <td>{{ $pengajuan -> nama }}</td>
                              <td>{{ $pengajuan -> jenis}} </td>
                              <td style="width: 22rem">{{ $pengajuan -> alasan}} </td>
                              <td>{{ $pengajuan -> tanggal_permohonan}}</td>
                              <td>{{ \Carbon\Carbon::parse($pengajuan -> waktu)->format('H:i')}} </td>

                              <td>

                            @if ($pengajuan -> status === 'Menunggu Persetujuan HRM')
                              <span class="label label-default">{{ $pengajuan -> status}}</span>
                            @elseif ($pengajuan -> status === 'Ditolak')
                              <span class="label label-danger">{{ $pengajuan -> status}}</span>
                            @elseif($pengajuan -> status === 'Dibatalkan')
                              <span class="label label-warning">{{ $pengajuan -> status}}</span>
                            @elseif($pengajuan -> status === 'Menunggu Persetujuan HoD')
                              <span class="label label-default">{{ $pengajuan -> status}}</span>
                            @else
                              <span class="label label-success">{{ $pengajuan -> status}}</span>
                            @endif
                          </td>
                              
                          </tr>

                        @endforeach
                      </tbody>
                  </table>
                  <script type="text/javascript">
                    $(document).ready(function() {
                      $('#example2').DataTable();
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
