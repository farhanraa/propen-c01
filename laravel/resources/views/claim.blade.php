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
                    <h2 style="padding-left: 30px;">Halaman Klaim</h2>
                  </div>
                  <div class="dashboard-menu">

                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link active" id="sisaClaim-tab" data-toggle="tab" href="#sisaClaim" role="tab" aria-controls="sisaClaim" aria-selected="true">Sisa Claim</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="riwayatClaim-tab" data-toggle="tab" href="#riwayatClaim" role="tab" aria-controls="riwayatClaim" aria-selected="false">Riwayat Claim</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="ajukanClaim-tab" data-toggle="tab" href="#ajukanClaim" role="tab" aria-controls="ajukanClaim" aria-selected="false">Ajukan Claim</a>
                        </li>
                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="form-field tab-pane fade active in" id="sisaClaim" role="tabpanel" aria-labelledby="sisaClaim-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Jenis Klaim</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Tanggal Hangus</th>
                                <th>Hak Klaim</th>
                                <th>Sisa Klaim</th>
                              </tr>
                            </thead>
                            <tbody>

                              @foreach($claimOfEmployee as $claimOfEmployee)
                              <tr>
                                <td>{{ ++$loop -> index }}</td>
                                <td>{{ $claimOfEmployee -> rulesClaim -> jenis }}</td>
                                <td>{{ $claimOfEmployee -> rulesClaim -> tanggal_awal }}</td>
                                <td>{{ $claimOfEmployee -> rulesClaim -> tanggal_akhir }}</td>
                                <td>{{ $claimOfEmployee -> rulesClaim -> tanggal_hangus}}</td>
                                <td>Rp. {{ number_format($claimOfEmployee -> rulesClaim -> nominal_klaim, 0, '', '.') }}</td>
                                <td>Rp. {{ number_format($claimOfEmployee -> sisa_klaim, 0, '', '.') }}</td>
                              </tr>
                              @endforeach
                              <tr>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Rp. {{ number_format($totalHakClaim, 0, '', '.') }}</strong></td>
                                <td><strong>Rp. {{ number_format($totalSisaClaim, 0, '', '.') }}</strong></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- Riwayat Claim Start -->
                        <div class="form-field tab-pane fade" id="riwayatClaim" role="tabpanel" aria-labelledby="riwayatClaim-tab" style="padding-left:35px; padding-right:35px; padding-top:25px; padding-bottom:35px;">
                          <table id="riwayat" class="table">
                          <thead>
                              <tr>
                                  <th>ID Claim</th>
                                  <th>Jenis Claim</th>
                                  <th>Tanggal Transaksi</th>
                                  <th>Nominal Claim</th>
                                  <th>Status</th>
                                  <th>Detail</th>
                              </tr>
                          </thead>

                          @foreach($dataClaim as $claim)
                          <tr>
                              <td>{{ $claim->id }}</td>
                              <td>{{ $claim->rulesClaim->jenis }}</td>
                              <td>{{ $claim->tanggal_transaksi }}</td>
                              <td>Rp. {{ number_format($claim->nominal_klaim, 0, '', '.') }}</td>
                              @if($claim->status == 'Diterima')
                              <td>
                                <span class="label label-success">Diterima</span>
                              </td>
                              @elseif($claim->status == 'Ditolak')
                              <td>
                                <span class="label label-danger">Ditolak</span>
                              </td>
                              @elseif($claim->status == 'Dibatalkan')
                              <td>
                                <span class="label label-warning">Dibatalkan</span>
                              </td>
                              @elseif($claim->status == 'Menunggu Persetujuan Finance')
                              <td>
                                <span class="label label-default">Menunggu persetujuan Finance</span>
                              </td>
                              @elseif($claim->status == 'Menunggu Persetujuan HRM')
                              <td>
                                <span class="label label-default">Menunggu persetujuan HRM</span>
                              </td>
                              @endif
                              <td>
                                <ul style="list-style-type: none;">
                                  <li style="float:left;">
                                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{{ $loop -> index}}"><i class="fa fa-question-circle"></i></button></li>
                                <!-- modal start -->
                                  <div class="modal fade" id="myModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                              <h4 id="myModalLabel">Detail Claim</h4>
                                            </div>
                                            <div class="modal-body">
                                              <table class="table">
                                                <tbody>
                                                <tr>
                                                  <th>Nama Pengaju</th>
                                                  <td>{{$claim->employee->nama}}</td>
                                                </tr>
                                                <tr>
                                                  <th>NIK Pengaju</th>
                                                  <td>{{$claim->employee->nik_employee}}</td>
                                                </tr>
                                                <tr>
                                                  <th>Kode Claim</th>
                                                  <td>{{$claim->id_klaim}}</td>
                                                </tr>
                                                <tr>
                                                  <th>Jenis Claim</th>
                                                  <td>{{$claim->rulesClaim->jenis}}</td>
                                                </tr>
                                                <tr>
                                                  <th>Tanggal Transaksi</th>
                                                  <td>{{$claim->tanggal_transaksi}}</td>
                                                </tr>
                                                <tr>
                                                  <th>Nominal Claim</th>
                                                  <td>{{$claim->nominal_klaim}}</td>
                                                </tr>
                                                <tr>
                                                  <th>Keterangan</th>
                                                  <td>{{ $claim->keterangan }}</td>
                                                </tr>
                                                <tr>
                                                  <th>Status</th>
                                                  @if($claim->status == 'Diterima')
                                                  <td>
                                                    <span class="label label-success">Diterima</span>
                                                  </td>
                                                  @elseif($claim->status == 'Ditolak')
                                                  <td>
                                                    <span class="label label-danger">Ditolak</span>
                                                  </td>
                                                  @elseif($claim->status == 'Dibatalkan')
                                                  <td>
                                                    <span class="label label-warning">Dibatalkan</span>
                                                  </td>
                                                  @elseif($claim->status == 'Menunggu Persetujuan Finance')
                                                  <td>
                                                    <span class="label label-default">Menunggu persetujuan Finance</span>
                                                  </td>
                                                  @elseif($claim->status == 'Menunggu Persetujuan HRM')
                                                  <td>
                                                    <span class="label label-default">Menunggu persetujuan HRM</span>
                                                  </td>
                                                  @endif
                                                </tr>
                                                <tr>
                                                  <th>Foto Bukti</th>
                                                  <td><a href="/upload/{{$claim -> bukti}}"><img src= "/upload/{{$claim -> bukti}}" style="max-width:70%;max-height:70%;"></a></td>
                                                </tr>
                                              </tbody></table>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                     <!-- modal end -->
                                      <li style="float:left;">
                                      <form method="post" action="{{route('claimDibatalkan')}}">
                                        <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                        <input type="hidden" name = "idDataClaim" value = "{{$claim->id}}">
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#tolakModal{{ $loop -> index}}"
                                        @if($claim->status == 'Dibatalkan' || $claim->status == 'Diterima' || $claim->status == 'Ditolak') disabled
                                        @endif
                                        ><i class="fa fa-trash-o"></i></button>
                                        <div class="modal fade" id="tolakModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                                      </form></li>
                                   </ul>
                              </td>
                          </tr>
                          @endforeach
                          </table>
                          <script type="text/javascript">
                            $(document).ready(function() {
                              $('#riwayat').DataTable();
                            } );
                          </script>
                        </div>
<!-- Riwayat Claim End -->
<!-- Ajukan Claim Start -->
                        <div class="form-field tab-pane fade" id="ajukanClaim" role="tabpanel" aria-labelledby="ajukanClaim-tab" style="padding-left:35px; padding-right:35px; padding-top:25px; padding-bottom:35px;">
                          <form method="post" action="/claim/submit" enctype="multipart/form-data">
                          <input type = "hidden" name = "_token" value = "{{ csrf_token()}}">
                          <div class="form-group">
                            <h4><strong>Data General Claim</strong></h4><br><br>
                            <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label><strong>Nama Pasien</strong></label>
                                <input class="form-control" type="text" value="{{$employee -> nama}}" disabled>
                                <input class="form-control" type="hidden" name="idEmployee" value="{{Auth::user()->id_employee}}" hidden>
                              </div>
                            </div>
                          </div>

                            <label for="sel1"><strong>Jenis Claim</strong></label>
                            <select class="form-control" id="sel1" name="kodeClaim" onblur="maxClaim()" requireds>
                              <option disabled selected value></option>
                              @foreach ($validClaim as $claim)
                              <option value="{{ $claim->rulesClaim->id}}" maxClaim="{{$claim->sisa_klaim}}">
                                  {{ $claim->rulesClaim->id_klaim }} - {{ $claim->rulesClaim->jenis }}
                              </option>
                              @endforeach
                            </select><br>
                          </div>
                          <div class="row">
                            <div class='col-sm-12'>
                              <div class="form-group">
                                <label for="datepicker2"><strong>Tanggal Transaksi</strong></label>
                                <div class="form-group">
                                  <div class="form-group">
                                    <input class="form-control" id='datepicker2' type='text' name="tanggalTransaksi" required>
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
                                <label><strong>Nominal</strong></label>
                                <div class="input-group">
                                  <span class="input-group-addon">Rp. </span>
                                  <input id="nominalClaim" class="form-control" type="number" min="0" name="nominalClaim" value="" required="">
                                </div> 
                              </div>
                            </div>
                          </div><br><br>
                          <h4><strong>Perincian Dokumen Claim</strong></h4><br><br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label><strong>Diagnosis</strong></label>
                                <input class="form-control" type="text" name="diagnosis" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label><strong>Rumah Sakit</strong></label>
                                <input class="form-control" type="text" name="rumahSakit" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label><strong>Nama Dokter</strong></label>
                                <input class="form-control" type="text" name="namaDokter" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label for="reason"><strong>Alasan</strong></label>
                                <textarea class="form-control" id="reason" rows="3" required></textarea>
                              </div>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label for="upload"><strong>Bukti Pembayaran</strong></label>
                                <input type="file" name="uploadBukti" enctype="multipart/form-data">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <span class="col-lg-10 "></span>
                            <div class="btn-group">
                              <button class="btn btn-primary" type="submit">AJUKAN</button>
                            </div>
                          </div>
                          <br><br>
                          <div class="row">
                            <span class="col-lg-8"></span>
                            <div class="btn-group">
                              <h5 style="font-style: italic; font-weight: 300">This form submitted to yudi_hrd@megasekuritas.id</h5>
                            </div>
                          </div>
                        </form>
                          </div>
                        </div>
                      </div>
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
                                content.style.maxHeight = content.scrollHeight + 1000 + "px";
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
      </section>
@endsection
