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
                      <div class="row">
                        <div class="col-md-6">
                          <h2 style="padding-left: 30px">Halaman Report</h2>
                        </div>
                        <div class="col-md-6" style="padding-left:40rem; padding-top: 1rem">
                          <a class="btn btn-primary btn-lg" style="border-radius: 0" href="{{route('report')}}"><i class="fa fa-angle-left"></i> Kembali</a>
                        </div>
                      </div>
                    </div>
                    <h2 align="center"><strong >Laporan Bulan {{$report_data -> bulan}} {{$report_data -> tahun}} </strong></h2>
                    <h3 align="center"><strong >Cabang {{$report_data -> nama_cabang}}</strong></h3>
                    <img src="{{ asset('public/img/megacapital.png') }}" style="max-width: 23%; max-height: 23%;padding-right: 3rem; margin-left: 3rem" align="right"><br>
                    <div class="dashboard-menu" style="padding-left: 4rem; padding-right: 4rem; ">
                    <table>           
                        <tr>
                          <thead>
                            <th>Kode Report</th>
                          </thead>
                          <td><h4>{{$report_data -> kode_report}}</h4></td>
                        </tr><tr></tr>
                        <tr>
                          <thead>
                            <th>Jenis Report</th>
                          </thead>
                          <td><h4>{{$report_data -> jenis_report}}</h4></td>
                        </tr>

                        <tr>
                          <thead>
                            <th>Periode</th>
                          </thead>
                          <td><h4>{{$report_data -> bulan}} {{$report_data -> tahun}}</h4></td>
                        </tr>

                        <tr>
                          <thead>
                            <th>Total Pengajuan</th>
                          </thead>
                          <td><h4>{{$report_data -> total_pengajuan}}</h4></td>
                         </tr>

                         <tr>
                           <thead>
                              <th>Total Pengajuan Diterima</th>                             
                           </thead>
                              <td><h4>{{$report_data -> total_pengajuan_diterima}}</h4></td>
                         </tr>

                         <tr>
                           <thead>
                               <th>Total Pengajuan Ditolak</th>
                           </thead>
                              <td><h4>{{$report_data -> total_pengajuan_ditolak}}</h4></td>
                         </tr>                     

                         <tr>
                           <thead>
                               <th>Total Pengajuan Dibatalkan</th> 
                           </thead>
                               <td><h4>{{$report_data -> total_pengajuan_dibatalkan}}</h4></td>
                           </tr> 
                    </table><br><br>
                        

                    @if($report_data -> jenis_report === "Claim")
                      <h4 class="font-weight-bold">Total Nominal</h4>
                      <h5>{{$report_data -> total_nominal}}</h5>
                    @endif

                    @if($report_data -> jenis_report === 'Izin')
                    <table id="izin" class="table table-hover" style="width:95%;">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Alasan</th>
                          <th>Tanggal</th>
                          <th>Waktu</th>
                          <th>Jenis</th>
                        </tr> 
                      </thead>
                      <tbody>
                        @foreach($data_report as $data)
                        <tr>
                          <td>{{$data -> nama}}</td>
                          <td>{{$data -> alasan}}</td>
                          <td>{{$data -> tanggal_permohonan}}</td>
                          <td>{{ \Carbon\Carbon::parse($data -> waktu)->format('H:i')}}</td>
                          <td>{{$data -> jenis}}</td>
                        @endforeach
                        </tr>
                      </tbody>
                    </table>
                    <script type="text/javascript">
                       $(document).ready(function() {
                         $('#izin').DataTable();
                       } );
                     </script>

                    @elseif($report_data -> jenis_report === 'Cuti')
                    <table id="cuti" class="table table-hover" style="width:95%" >      
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th left="10px">Alasan</th>
                          <th left="10px">Tanggal Mulai</th>
                          <th left="10px">Tanggal Selesai</th>
                          <th left="10px">Jenis Cuti</th>
                          <th left="10px">Pegawai Pengganti</th>      
                        </tr> 
                      </thead>
                      <tbody>
                        @foreach($data_report as $data)
                        <tr>
                          <td>{{$data -> nama}}</td>
                          <td>{{$data -> alasan}}</td>
                          <td>{{$data -> tanggal_mulai}}</td>
                          <td>{{$data -> tanggal_selesai}}</td>
                          <td>{{$data -> nama_jenis}}</td>
                          <td>{{$data -> pegawai_pengganti}}</td>
                        @endforeach
                        </tr>
                      </tbody>
                    </table>
                    <script type="text/javascript">
                       $(document).ready(function() {
                         $('#cuti').DataTable();
                       } );
                     </script>

                    @elseif($report_data -> jenis_report === 'Lembur')
                    <table id="lembur" class="table table-hover" style="width:95%">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Alasan</th>
                          <th>Tanggal</th>
                          <th>Jam Mulai</th>
                          <th>Jam Selesai</th>      
                        </tr> 
                      </thead>
                      <tbody>
                        @foreach($data_report as $data)
                        <tr>          
                          <td>{{$data -> nama}}</td>
                          <td>{{$data -> alasan}}</td>
                          <td>{{$data -> tanggal}}</td>
                          <td>{{ \Carbon\Carbon::parse($data -> waktu_mulai)->format('H:i')}}</td>
                          <td>{{ \Carbon\Carbon::parse($data -> waktu_selesai)->format('H:i')}}</td>
                        @endforeach       
                        </tr>
                      </tbody>
                    </table >
                    <script type="text/javascript">
                       $(document).ready(function() {
                         $('#lembur').DataTable();
                       } );
                     </script>

                    @elseif($report_data -> jenis_report === 'Claim')
                    <table id="claim" class="table table-hover" style="width:95%">     
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Jenis Klaim</th>
                          <th>Tanggal Transaksi</th>
                          <th>Nominal</th>
                          <th>Keterangan</th>                         
                        </tr> 
                      </thead>
                      <tbody>
                        @foreach($data_report as $data)
                        <tr>        
                          <td>{{$data -> nama}}</td>
                          <td>{{$data -> jenis}}</td>
                          <td>{{$data -> tanggal_transaksi}}</td>
                          <td>{{$data -> nominal_klaim}}</td>
                          <td>{{$data -> keterangan}}</td>
                        @endforeach
                        </tr>
                      </tbody>
                    </table>
                     <script type="text/javascript">
                       $(document).ready(function() {
                         $('#claim').DataTable();
                       } );
                     </script>
                    @endif
                        <br><br>
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
