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

                    <h2 style="padding-left: 30px;">Daftar Absen Pegawai</h2>
                  </div>
                  <div class="dahboard-menu"  style="margin:2.5%; padding-bottom: 5rem"> 
                    <table id="Profil" class="table">
                      <thead>
                          <tr>
                          <th>Tanggal</th>
                          <th>Nama Cabang</th>
                          <th>Detail</th>     
                          </tr>
                      </thead>
                      <tbody>
                       @foreach($upload_absensis as $upload_absensii)
                              <td width=45%>{{ \Carbon\Carbon::parse($upload_absensii -> tanggal)->format('d-m-Y')}}</td>
                              <td  width=45%>{{$upload_absensii -> nama_cabang}}</td>
                               <td><ul>
                                    <li>
                                    <form method="post" action="{{route('viewAllAbsen')}}">
                                      <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                      <input type="hidden" name = "tanggal" type="submit" value = "{{$upload_absensii -> tanggal}}">
                                      <input type="hidden" name = "nama_cabang" type="submit" value = "{{$upload_absensii -> nama_cabang}}">
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

