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
                    <h2 style="padding-left: 30px;">Daftar Pengajuan Klaim</h2>
                  </div>
                  <div class="dahboard-menu"  style="margin:2.5%; padding-bottom: 5rem"> 
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item active">
                        <a class="nav-link active" id="listClaim-tab" data-toggle="tab" href="#listClaim" role="tab" aria-controls="listClaim" aria-selected="true">List Pengajuan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="riwayatClaim-tab" data-toggle="tab" href="#riwayatClaim" role="tab" aria-controls="riwayatClaim" aria-selected="false">Riwayat Pengajuan</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="form-field tab-pane fade active in" id="listClaim" role="tabpanel" aria-labelledby="listClaim-tab">
                        <table id="claimList" class="table">
                          <thead>
                              <tr>
                                 
                                  <th>Nama</th>
                                  <th>Jenis Claim</th>
                                  <th>Tanggal Transaksi</th>
                                  <th>Nominal Claim</th>
                                  <th>Status</th>
                                  <th>Detail</th>
                                  
                              </tr>
                          </thead>
                          @if($approvalClaim->count() != 0)
                            @foreach($approvalClaim as $claim)
                            <tr>
                                  <td>{{$claim->employee->nama}}</td>
                                  <td>{{$claim->rulesClaim->jenis}}</td>
                                  <td>{{$claim->tanggal_transaksi}}</td>
                                  <td>{{ number_format($claim->nominal_klaim, 0, '', '.') }}</td>
                                  
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
                                      <li style="float:left">
                                      <form method="post" action="{{route('claimDiterima')}}">
                                          <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                          <input type="hidden" name = "idDataClaim" value = "{{$claim->id}}">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#terimaModal{{ $loop -> index}}"><i class="fa fa-check"></i></button>
                                          <div class="modal fade" id="terimaModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-body">
                                                <h2><strong>Menerima pengajuan?</strong></h2>
                                                <button type="submit" class="btn btn-danger">YA</button>
                                                <button type="button" class="btn" data-dismiss="modal">KEMBALI</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </form></li>
                                        <li style="float:left;"><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{{ $loop -> index}}"><i class="fa fa-question-circle"></i></button></li>
                                        <div class="modal fade" id="myModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                                                    <td>{{ number_format($claim->nominal_klaim, 0, '', '.') }}</td>
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
                                      <li style="float:left;">
                                      <form method="post" action="{{route('claimDitolak')}}">
                                          <input type="hidden" name = "_token" value = "{{ csrf_token()}}">
                                          <input type="hidden" name = "idDataClaim" value = "{{$claim->id}}">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#tolakModal{{ $loop -> index}}"><i class="fa fa-times-circle"></i></button>
                                          <div class="modal fade" id="tolakModal{{ $loop -> index ++}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-body">
                                                <h2><strong>Menolak pengajuan?</strong></h2>
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
                          @endif
                      </table>
                    </div>
                  <script type="text/javascript">
                    $(document).ready(function() {
                      $('#claimList').DataTable();
                    } );
                  </script>
                 <div class="form-field tab-pane fade" id="riwayatClaim" role="tabpanel" aria-labelledby="riwayatClaim-tab">
                          <table id="riwayat" class="table">
                          <thead>
                              <tr>
                                  <th>ID Claim</th>
                                  <th>Jenis Claim</th>
                                  <th>Tanggal Transaksi</th>
                                  <th>Nominal Claim</th>
                                  <th>Status</th>
                              </tr>
                          </thead>

                          @foreach($riwayat as $claim)
                          <tr>
                              <td>{{ $claim->id }}</td>
                              <td>{{ $claim->rulesClaim->jenis }}</td>
                              <td>{{ $claim->tanggal_transaksi }}</td>
                              <td>{{ number_format($claim->nominal_klaim, 0, '', '.') }}</td>
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
                          @endforeach
                          </table>
                          <script type="text/javascript">
                            $(document).ready(function() {
                              $('#riwayat').DataTable();
                            } );
                          </script>
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

