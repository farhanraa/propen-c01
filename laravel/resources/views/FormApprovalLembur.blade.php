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
                    <h2 style="padding-left: 30px;">Daftar Pengajuan Lembur</h2>
                  </div>

                  <div class="dahboard-menu">
                  <!--begin-->
                  <table id="example" class="table table-striped table-bordered" style="width:95%">
                   <thead>
                      <tr>
                          <th>Nama Pengaju</th>
                          <th>Tanggal Lembur</th>
                          <th>Jam Mulai</th>
                          <th>Jam Selesai</th>
                          <th>Keterangan</th>

                          <th>Kebutuhan</th>

                          <th>Status</th>
                          <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($approvalLembur as $pengajuan)
                          <tr>
                              <td>{{ $pengajuan -> nama}}</td>
                              <td>{{ $pengajuan -> tanggal}} </td>
                              <td>{{ $pengajuan -> waktu_mulai}} </td>
                              <td>{{ $pengajuan -> waktu_selesai}}</td>


                              <td>{{ $pengajuan -> alasan}} </td>
                              <td>{{ $pengajuan -> kebutuhan}}</td>


                               <td>
                            @if ($pengajuan -> status === 'Menunggu Persetujuan HRM')
                              <span class="label label-default">{{ $pengajuan -> status}}</span>
                            @elseif ($pengajuan -> status === 'Ditolak')
                              <span class="label label-danger">{{ $pengajuan -> status}}</span>
                            @elseif($pengajuan -> status === 'Dibatalkan')
                              <span class="label label-danger">{{ $pengajuan -> status}}</span>
                            @elseif($pengajuan -> status === 'Menunggu Persetujuan HoD')
                              <span class="label label-default">{{ $pengajuan -> status}}</span>
                            @else
                              <span class="label label-success">{{ $pengajuan -> status}}</span>
                            @endif
                          </td>
                              <td>

                                <form action="/overtime/approval/approved" method="post">
                                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                  <input name="target" value="{{ $pengajuan -> id }}" hidden></input>

                                  <button class="btn btn-success btn-xs" type="Submit"
                                
                                  ><i class="fa fa-check"></i></button>
                                </form>
                                <form action="/overtime/approval/reject" method="post">
                                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                  <input name="target" value="{{ $pengajuan -> id }}" hidden></input>

                                  <button class="btn btn-danger btn-xs" type="Submit"
                                  
                                  @if($pengajuan->status == 'Ditolak') disabled
                                  @elseif ($pengajuan->status == 'Menunggu Persetujuan HRM') disabled
                                  @elseif($pengajuan->status == 'Dibatalkan') disabled
                                  @elseif($pengajuan->status == 'Diterima') disabled
                                  @endif
                                  ><i class="fa fa-times-circle"></i></button>
                                </form>
                              </td>

                      </tr>
                    </tbody>
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
      </section>

  @endsection

