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

                    <h2 style="padding-left: 30px;">Halaman Profil Pegawai</h2>
                  </div>
                  <div class="dahboard-menu"  style="margin:2.5%; padding-bottom: 5rem"> 
                    <table id="Profil" class="table">
                      <thead>
                          <tr>
                          <th>NIK</th>
                          <th>Nama Pegawai</th>
                          <th>Cabang</th>
                          <th>Departemen</th>
                          <th>Email</th>
                          <th>Detail</th>     
                          </tr>
                      </thead>
                      <tbody>
                       @foreach($employees as $employeesi)
                                <td>{{$employeesi -> nik_employee}}</td>
                               <td>{{$employeesi -> nama}}</td>
                               <td>{{$employeesi -> nama_cabang}}</td>
                               <td>{{$employeesi -> nama_departemen}}</td>
                             <td>
                             {{$employeesi -> email_perusahaan}}
                           </td>
                               <td><ul>
                                    <li>
                                    <form method="post" action="{{route('viewAllDetail')}}">
                                      <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                      <input type="hidden" name = "id" type="submit" value = "{{$employeesi->id}}">
                                      <input type="hidden" name = "nik_employee" type="submit" value = "{{$employeesi->nik_employee}}">
                                    <button class="btn btn-warning btn-xs"  data-toggle="modal"><i class="fa fa-question-circle"></i></button>
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

