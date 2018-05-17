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
                    <h2 style="padding-left: 30px;">Halaman Izin</h2>
                  </div>

                  <div class="dahboard-menu">


                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link active" id="riwayatIzin-tab" data-toggle="tab" href="#riwayatIzin" role="tab" aria-controls="riwayatIzin" aria-selected="true">Riwayat Izin</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="ajukanIzin-tab" data-toggle="tab" href="#ajukanIzin" role="tab" aria-controls="ajukanIzin" aria-selected="false">Ajukan Izin</a>
                        </li>
                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="form-field tab-pane fade active in" id="riwayatIzin" role="tabpanel" aria-labelledby="riwayatIzin-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                          <table id="riwayat" class="table" style="width:95%">
                             <thead>
                               <th>Jenis Izin</th>
                               <th>Tanggal Permohonan</th>
                               <th>Alasan</th>
                               <th>Status</th>


                               <th>Details</th>



                             </thead>
                             <tbody>
                             <tr>
                               @foreach($result as $izin)
                               <td>{{$izin -> jenis}}</td>
                               <td>{{$izin -> tanggal_permohonan}}</td>
                               <td>{{$izin -> alasan}}</td>

                             <td>
                               @if ($izin -> status === 'Menunggu Persetujuan HRM')
                               <span class="label label-default">{{ $izin -> status}}</span>
                             @elseif ($izin -> status === 'Ditolak')
                               <span class="label label-danger">{{ $izin -> status}}</span>
                             @elseif($izin -> status === 'Dibatalkan')
                               <span class="label label-warning">{{ $izin -> status}}</span>
                             @elseif($izin -> status === 'Menunggu Persetujuan HoD')
                               <span class="label label-default">{{ $izin -> status}}</span>
                             @else
                               <span class="label label-success">{{ $izin -> status}}</span>
                             @endif
                           </td>

                               <td>

                                  <form action="/permission/form/dibatalkan" method="post">
                                   <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                   <input name="target" value="{{ $izin ->  id }}" hidden></input>

                                   <button class="btn btn-danger btn-xs" type="Submit"
                                   @if($izin->status === 'Ditolak') disabled
                                   @elseif($izin->status === 'Diterima') disabled
                                   @elseif($izin->status === 'Dibatalkan') disabled
                                   @endif><i class="fa fa-times-circle"></i></button>
                                 </form>

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
                        </div>

                        <div class="form-field tab-pane fade" id="ajukanIzin" role="tabpanel" aria-labelledby="ajukanIzin-tab" style="padding-left:35px; padding-right:35px; padding-top:25px; padding-bottom:35px;">
                          <form method="post" action="/permission/form/submit">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <div class="form-group">

                              <label for="sel1"><strong>Jenis Izin</strong></label>

                              <select class="form-control" id="sel1" name="jenisIzin">
                                <option value="Izin Datang Terlambat">
                                 Izin Datang Terlambat
                                </option>
                                <option value="Izin Pulang Cepat">
                                 Izin Pulang Cepat
                                </option>



                              </select><br>
                            </div>
                            <div class="row">
                              <div class='col-sm-6'>
                                <div class="form-group">
                                  <label for="datepicker2"><strong>Tanggal Permohonan</strong></label>
                                  <div class="form-group">
                                    <div class="form-group">

                                      <input class="form-control" id='datepicker2' type='text' name='tanggal' required="true">

                                    </div>
                                  </div>
                                  <script>
                                    $(function () {
                                       $('#datepicker2').datepicker();
                                     });
                                  </script>
                                </div>


                              </div>
                              <div class='col-sm-6'>
                                <div class="form-group">
                                  <label for="timepicker1"><strong>Jam</strong></label>
                                  <div class="form-group">

                                    <input class="form-control" id='timepicker1' type='text' name='waktu' >

                                  </div>
                                </div>
                              </div>

                              <script type="text/javascript">
                                $(function () {
                                  $('#timepicker1').timepicker();
                                });
                              </script>
                            </div>

                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">

                                  <label for="reason"><strong>Alasan</strong></label>
                                  <textarea class="form-control" id="reason" rows="3" name='alasan' required="true"></textarea>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <span class="col-lg-11"></span>
                              <div class="btn-group">


                                <button class="btn btn-primary" type="submit"> AJUKAN</button>
                              </div>
                            </div>
                          </form>
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

