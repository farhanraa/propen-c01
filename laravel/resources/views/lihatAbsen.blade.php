@extends("layouts/masterlayout")
@section("main")
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="row mt">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;">Daftar absen {{ $employee -> nama }}</h2>
                  </div>
                  <div class="dahboard-menu">
                    <form class="form-field">
                      <div class="form-group">
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
                            <td>{{ \Carbon\Carbon::parse($absen -> jam_datang)->format('H:i')}}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($absen -> jam_pulang)->format('H:i')}}
                            </td>
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
