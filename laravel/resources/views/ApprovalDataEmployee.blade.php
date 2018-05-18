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

                    <h2 style="padding-left: 30px;">Daftar Pengajuan Perubahan Data Pegawai</h2>
                  </div>
                  <div class="dahboard-menu"  style="margin:2.5%; padding-bottom: 5rem"> 
                    <table id="Profil" class="table">
                      <thead>
                          <tr>
                          <th>Nama Pengaju</th>
                          <th>Cabang</th>
                          <th>Departemen</th>
                          <th>Status</th>
                          <th>Detail</th>     
                          </tr>
                      </thead>
                      <tbody>
                       @foreach($employees as $employeesi)
                               <td>{{$employeesi -> nama}}</td>
                               <td>{{$employeesi -> nama_cabang}}</td>
                               <td>{{$employeesi -> nama_departemen}}</td>
                             <td>
                               <span class="label label-default">Menunggu Persetujuan HRM</span>
                           </td>
                               <td><ul style="list-style-type: none;">
                                  <li style="float:left;">
                                    <form method="post" action="{{route('profilDiterima')}}">
                                      <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                      <input type="hidden" name = "nik_employee" type="submit" value = "{{$employeesi->nik_employee}}">
                                    <button type="button" class="btn btn-success btn-xs"  data-toggle="modal" data-target="#terimaModal{{ $loop -> index}}"><i class="fa fa-check"></i></button>
                                    <div class="modal fade" id="terimaModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <h2><strong>Terima pengajuan?</strong></h2>
                                              <button type="submit" class="btn btn-success">YA</button>
                                              <button type="button" class="btn" data-dismiss="modal">KEMBALI</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </form>
                                </li  >

                                    <li style="float:left;">
                                    <form method="post" action="{{route('viewHr')}}">
                                      <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                      <input type="hidden" name = "id" type="submit" value = "{{$employeesi->id}}">
                                      <input type="hidden" name = "nik_employee" type="submit" value = "{{$employeesi->nik_employee}}">
                                    <button class="btn btn-warning btn-xs"  data-toggle="modal"><i class="fa fa-question-circle"></i></button>
                                  </form>
                                </li>
                                  <li style="float:left;">
                                     <form method="post" action="{{route('profilDitolak')}}">
                                      <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                      <input type="hidden" name = "nik_employee" type="submit" value = "{{$employeesi->nik_employee}}">
                                    <button type="button" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#tolakModal{{ $loop -> index}}"><i class="fa fa-times-circle"></i></button>
                                    <div class="modal fade" id="tolakModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                                </li>                            
                                 </ul>
                               </td>
                            </tr>
                            @endforeach
                      </tbody>
    
                     
              </table>
                  <script type="text/javascript">
                    $(document).ready(function() {
                      $('#Profil').DataTable();
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

