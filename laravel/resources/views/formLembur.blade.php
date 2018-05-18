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


                    <h2 style="padding-left: 30px;">Halaman Lembur</h2>
                  </div>
                  <div class="dahboard-menu">



                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link active" id="riwayatLembur-tab" data-toggle="tab" href="#riwayatLembur" role="tab" aria-controls="riwayatLembur" aria-selected="true">Riwayat Lembur</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="ajukanLembur-tab" data-toggle="tab" href="#ajukanLembur" role="tab" aria-controls="ajukanLembur" aria-selected="false">Ajukan Lembur</a>
                        </li>
                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="form-field tab-pane fade active in" id="riwayatLembur" role="tabpanel" aria-labelledby="riwayatLembur-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">

                          <table id="riwayat" class="table" style="width:95%">
                            <thead>
                              <th>Tanggal Lembur</th>
                              <th>Waktu Mulai</th>
                              <th>Waktu Selesai</th>

                              <th>Status</th>
                              <th>Detail</th>
                            </thead>
                            <tbody>
                              <tr>
                                @foreach($result as $lembur)
                                <td>{{$lembur -> tanggal}}</td>

                                <td>{{ \Carbon\Carbon::parse($lembur -> waktu_mulai)->format('H:i')}} </td>
                                <td>{{ \Carbon\Carbon::parse($lembur -> waktu_selesai)->format('H:i')}}</td>


                                <td>
                                @if ($lembur -> status === 'Menunggu Persetujuan HRM')
                                  <span class="label label-default">{{ $lembur -> status}}</span>
                                @elseif ($lembur -> status === 'Ditolak')
                                  <span class="label label-danger">{{ $lembur -> status}}</span>
                                @elseif($lembur -> status === 'Dibatalkan')

                                  <span class="label label-warning">{{ $lembur -> status}}</span>

                                @elseif($lembur -> status === 'Menunggu Persetujuan HoD')
                                  <span class="label label-default">{{ $lembur -> status}}</span>
                                @else
                                  <span class="label label-success">{{ $lembur -> status}}</span>
                                @endif
                                </td>
                                <td>
                                  <form action="/overtime/form/batal" method="post">

                                   <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                   <input name="target" value="{{ $lembur ->  id }}" hidden></input>
                                   <button type ="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{$loop -> index}}"
                                   @if ($lembur -> status === 'Ditolak') disabled
                                    @elseif($lembur -> status === 'Dibatalkan') disabled
                                    @elseif($lembur -> status === 'Diterima') disabled
                                    @endif><i class="fa fa-times-circle"></i></button>

                                    <div class="modal fade" id="myModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <h2><strong>Batalkan pengajuan?</strong></h2>
                                              <button type="submit" class="btn btn-danger">YA</button>
                                              <button type="button" class="btn" data-dismiss="modal">KEMBALI</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

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


                        <div class="form-field tab-pane fade" id="ajukanLembur" role="tabpanel" aria-labelledby="ajukanLembur-tab" style="padding-left:35px; padding-right:35px; padding-top:25px; padding-bottom:35px;">
                          <form method="post" action="/overtime/form/submit">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <!--form tanggal dan jam-->

                            <div class="row">
                              <div class='col-sm-6'>
                                <div class="form-group">
                                  <label for="datepicker2"><strong>Tanggal Lembur</strong></label>
                                  <div class="form-group">
                                    <div class="form-group">



                                      <input class="form-control" id='datepicker2' name='tanggalLembur' type='date' min="{{$today}}" required="true">

                                    </div>
                                  </div>
                                  

                                </div>

                              </div>
                              <div class='col-sm-6'>
                                <div class="form-group">
                                  <label for="timepicker1"><strong>Jam Mulai</strong></label>
                                  <div class="form-group">


                                    <input class="form-control" id='timepicker1' name='jamMulai' type='text'>

                                  </div>
                                </div>

                              </div>
                              <script type="text/javascript">
                                    $(function () {
                                        $('#timepicker1').timepicker();
                                    });
                              </script>
                              <div class='col-sm-6'>
                                <div class="form-group">
                                  <label for="timepicker1"><strong>Jam Selesai</strong></label>
                                  <div class="form-group">


                                    <input class="form-control" id='timepicker2' name='jamSelesai' type='text'>

                                  </div>
                                </div>
                              </div>
                              <script type="text/javascript">
                                    $(function () {
                                        $('#timepicker2').timepicker();

                                    });
                              </script>
                            </div>

                            <!--akhir form tanggal dan jam pengajuan lembur-->
                            <!--form tujuan lembur-->
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">


                                  <label for="reason"><strong>Alasan</strong></label>
                                  <textarea class="form-control" id="reason" name='alasan' rows="3" required="true"></textarea>

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <span class="col-lg-11"></span>

                                 <button type ="button" class="btn btn-primary" data-toggle="modal" data-target="#ajukan">AJUKAN</button>

                                    <div class="modal fade" id="ajukan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                              <h2><strong>Ajukan Lembur?</strong></h2>
                                              <button type="submit" class="btn btn-danger">YA</button>
                                              <button type="button" class="btn" data-dismiss="modal">KEMBALI</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>      
                              </div>
                            </form>
                            </div>

                          <!-- <script>
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

                            </script> -->


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
