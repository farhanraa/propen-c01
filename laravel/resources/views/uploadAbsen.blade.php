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
                    <h2 style="padding-left: 30px;">Halaman Upload Absen</h2>
                  </div>
                  <div class="dahboard-menu">
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link active" id="riwayatIzin-tab" data-toggle="tab" href="#riwayatIzin" role="tab" aria-controls="riwayatIzin" aria-selected="true">Upload Absen</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="ajukanIzin-tab" data-toggle="tab" href="#ajukanIzin" role="tab" aria-controls="ajukanIzin" aria-selected="false">Riwayat Upload</a>
                        </li>
                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="form-field tab-pane fade active in" id="riwayatIzin" role="tabpanel" aria-labelledby="riwayatIzin-tab" style="padding-left:35px; padding-right:35px; padding-top:25px; padding-bottom:35px;">
    
                              <form class="form-group" action="{{ route('tambahAbsen') }}" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="row">
                              <div class='col-sm-6'>
                                <div class="form-group">

                        <label for="sel1"><strong>Nama Cabang</strong></label>
                        <select class="form-control" id="sel1" name="nama_cabang" style="color: black;">
                              @foreach ($cabang as $cabang)
                              <option value="{{$cabang->nama_cabang}}" >
                                {{ $cabang->nama_cabang }}
                              </option>
                              @endforeach
                            </select><br>
                      </div>
                    </div>
                        <div class='col-sm-6'>
                          <div class="form-group">
                            <label for="datepicker2"><strong>Tanggal Absen</strong></label>
                            <div class="form-group">
                              <div class="form-group">
                                <input class="form-control" id='datepicker2' type='text' name="tanggal">
                              </div>
                            </div>
                            <script>
                                                                                  $(function () {
                                                                                      $('#datepicker2').datepicker();
                                                                                  });
                            </script>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="reason"><strong>File (CSV)</strong></label> 
                              <label for="reason"><strong>Upload File</strong></label><br>
                              <br>                                                        
                            <input  type="file" name="upload" style="padding-left: 15px;"required>
                          </div>
                        </div>
                      </div>
                      <div style="text-align:center;">
                          <div class="btn-group">
                          <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                      </div>
                    </form>
                        </div>

                        <div class="form-field tab-pane fade" id="ajukanIzin" role="tabpanel" aria-labelledby="ajukanIzin-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                    <table id="riwayat" class="table" style="width:95%">
                             <thead>
                               <th>Tanggal</th>
                               <th>Nama Cabang</th>
                               <th>Detail</th>
                             </thead>
                             <tbody>
                               @foreach($uploadAbsensi as $upload_absensi)
                                <tr>
                                  <td width="43%">{{ \Carbon\Carbon::parse($upload_absensi -> tanggal)->format('d-m-Y')}}</td>
                                  <td width="43%">{{ $upload_absensi -> nama_cabang}}</td>
                                  <td>
                                    <ul style="list-style-type: none;">
                                    <li style="float:left;">
                                      <a href="/upload/{{$upload_absensi -> nama_file}}">
                                      <button type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download">
                                      </i>
                                      </button>
                                    </a> 
                                </li>
                              <li style="float:left;">
                                    <form method="post" action="{{route('hapus_Absen')}}">
                                      <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                      <input type="hidden" name = "tg_absen" type="submit" value = "{{$upload_absensi -> tanggal}}">
                                      <input type="hidden" name = "nm_cabang" type="submit" value = "{{$upload_absensi -> nama_cabang}}">
                                    <button  type="button" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#tolakModal{{ $loop -> index}}" ><i class="fa fa-times-circle"></i></button>
                              
                                    <div class="modal fade" id="tolakModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <h2><strong>Hapus Absen?</strong></h2>
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
                               $('#riwayat').DataTable();
                             } );
                           </script>
                          <script>
                            var coll = document.getElementsByClassName("collapsible");
                            var i;

                            for (i = 0; i < coll.length; i++) {
                              coll[i].addEventListener("click", function() {
                                this.classList.toggle("activee");
                                var content = this.nextElementSibling;
                                if (content.style.maxHeight){
                                  content.style.maxHeight = null;
                                } else {
                                  content.style.maxHeight = content.scrollHeight + "px";
                                }
                              });
                            }
                          </script>

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

