@extends("layouts/masterlayout")
@section("main")      
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="row mt">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;">Attendance Page</h2>
                  </div>
                  <div class="dahboard-menu"> 
                    <form class="form-field">
                      <div class="form-group">

                      <h4>Daftar absensi {{ $employee[0] -> nama }}</h4>

                      <br>
                      <table id="dataAttendance" class="table table-condensed" style="width:95%" align="center">
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Keterangan</th>
                            <th>Overtime (sec)</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach($absensi as $absen)
                          <tr>
                            <td>{{ \Carbon\Carbon::parse($absen -> tanggal)->format('d-m-Y')}}</td>
                            <td>{{$absen -> jam_datang}}</td>
                            <td>{{$absen -> jam_pulang}}</td>
                            <td>-</td>
                            <td>-</td>
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