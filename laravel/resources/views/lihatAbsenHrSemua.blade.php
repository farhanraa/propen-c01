@extends("layouts/masterlayout")
@section("main")      
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="row mt">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;">Daftar Absen pada Cabang {{$absensis[0]->nama_cabang}} Tanggal {{ \Carbon\Carbon::parse($absensis[0] -> tanggal)->format('d-m-Y')}}</h2>
                  </div>
                  <div class="dahboard-menu"> 
                    <ul style="float:left"><a class="btn btn-primary" href="/absen/view/all"><i class="fa fa-chevron-left" ></i>  Kembali</a></ul>
                    <form class="form-field">
                      <div class="form-group">

                      <br>
                      <table id="dataAttendance" class="table table-condensed" style="width:95%" align="center">
                        <thead>
                          <tr>
                            <th>NIK</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Keterangan</th>
                            <th>Overtime (sec)</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach($absensis as $absen)
                          <tr>
                            <td>{{$absen -> nik_employee}}</td>
                            <td>{{$absen -> nama}}</td>
                            <td>{{ \Carbon\Carbon::parse($absen -> tanggal)->format('d-m-Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($absen -> jam_datang)->format('H:i')}}</td>
                            <td>{{ \Carbon\Carbon::parse($absen -> jam_pulang)->format('H:i')}}</td>
                            <td>{{$absen -> keterangan}}</td>
                            <td>{{$absen -> overtime}}</td>
                          </tr>
                          @endforeach
                        </tbody>  
                      </table>  
                        <script type="text/javascript">
      $(document).ready(function() {
        $('#dataAttendance').DataTable();
      } );
  </script>
                      <br>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection