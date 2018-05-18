@extends("layouts/masterlayout")
@section("main")
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="row mt">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;">Halaman Report</h2>
                  </div>

                  <div class="dahboard-menu">
                    <div class="form-field" style="padding-left:15px; padding-right:15px; padding-top:15px; padding-bottom:15px;">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link active" id="izin-tab" data-toggle="tab" href="#izin" role="tab" aria-controls="izin" aria-selected="true">Izin</a>
                        </li>
                      
                         <li class="nav-item">
                          <a class="nav-link" id="cuti-tab" data-toggle="tab" href="#cuti" role="tab" aria-controls="cuti" aria-selected="false">Cuti</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="lembur-tab" data-toggle="tab" href="#lembur" role="tab" aria-controls="lembur" aria-selected="false">Lembur</a>
                        </li>

                           <li class="nav-item">
                          <a class="nav-link" id="claim-tab" data-toggle="tab" href="#claim" role="tab" aria-controls="claim" aria-selected="false">Claim</a>
                        </li>
                       
                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="form-field tab-pane fade active in" id="izin" role="tabpanel" aria-labelledby="izin-tab" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                        
                          <table id="example" class="table table-hover" style="width:95%">
                             <thead>
                              
                               <th>Nomor Dokumen</th>
                               <th>Nama Dokumen</th>
                               <th>Cabang</th>
                               <th>Lihat Detail</th>
                               <th>Unduh</th>
                             </thead>
                             <tbody>
                              @foreach($report as $izin)
                              @if($izin -> jenis_report === 'Izin')                             
                              <tr>
                               <td>{{$izin -> kode_report}}</td>
                               <td>Laporan Izin Bulan {{$izin -> bulan}}</td>
                               <td>{{$izin -> nama_cabang}}</td>
                               <td>                              
                                <form method ="post" action = "/report/details">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <input name = "target" value = "{{$izin->id}}" hidden></input>
                                <input name = "idCabang" value = "{{$izin->id_cabang}}" hidden></input>
                                <span class="col-lg-11"></span>
                                 <button class="btn btn-warning btn-xs" type="submit"> Details</button>
                                </form>
                              </td>
                               <td>
                              <form method ="post" action = "{{ route('reportPdf',['download'=>'pdf']) }}">
                              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                              <input name = "target" value = "{{$izin->id}}" hidden></input>
                              <input name = "idCabang" value = "{{$izin->id_cabang}}" hidden></input>
                              <span class="col-lg-11"></span>
                              <button type="submit" class="btn btn-primary btn-xs" >Download PDF</button>
                             </form>
                              </td>
                            </tr>
                            @endif
                            @endforeach
                           </tbody>
                           </table>
                           

                           <script type="text/javascript">
                             $(document).ready(function() {
                               $('#example').DataTable();
                             } );
                           </script>
                        </div>

                        <div class="form-field tab-pane fade" id="cuti" role="tabpanel" aria-labelledby="cuti" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                         
                         <table id="example2" class="table table-hover" style="width:95%">
                             <thead>
                               <th>Nomor Dokumen</th>
                               <th>Nama Dokumen</th>
                               <th>Cabang</th>
                               <th>Lihat Detail</th>
                               <th>Unduh</th>
                             </thead>
                             <tbody>
                              <tr>
                              @foreach($report as $reports)
                              @if($reports -> jenis_report === 'Cuti')
                              
                               <td>{{$reports -> kode_report}}</td>
                               <td>Laporan Cuti Bulan {{$reports -> bulan}}</td>
                               <td>{{$reports -> nama_cabang}}</td>
                               <td>                              
                                <form method ="post" action = "/report/details">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <input name = "target" value = "{{$reports->id}}" hidden></input>
                                <input name = "idCabang" value = "{{$reports->id_cabang}}" hidden></input>
                                <span class="col-lg-11"></span>
                                 <button class="btn btn-warning btn-xs" type="submit"> Details</button>
                                </form>
                              </td>
                              <td>
                              <form method ="post" action = "{{ route('reportPdf',['download'=>'pdf']) }}">
                              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                              <input name = "target" value = "{{$reports->id}}" hidden></input>
                              <input name = "idCabang" value = "{{$reports->id_cabang}}" hidden></input>
                              <span class="col-lg-11"></span>
                              <button type="submit" class="btn btn-primary btn-xs" >Download PDF</button>
                             </form>
                              </td>
                               
                            </tr>
                            @endif
                            @endforeach
                           </tbody>
                           </table>
                           
                           <script type="text/javascript">
                             $(document).ready(function() {
                               $('#example3').DataTable();
                             } );
                           </script>
                        </div>
                        <div class="form-field tab-pane fade" id="lembur" role="tabpanel" aria-labelledby="lembur" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                         
                         <table id="example3" class="table table-hover" style="width:95%">
                             <thead>
                               <th>Nomor Dokumen</th>
                               <th>Nama Dokumen</th>
                               <th>Cabang</th>
                               <th>Lihat Detail</th>
                               <th>Unduh</th>
                             </thead>
                             <tbody>
                             <tr>
                               @foreach($report as $reports)
                               @if($reports -> jenis_report === 'Lembur')
                               <td>{{$reports -> kode_report}}</td>
                               <td>Laporan Lembur Bulan {{$reports -> bulan}}</td>
                               <td>{{$reports -> nama_cabang}}</td>
                               <td>                              
                                <form method ="post" action = "/report/details">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <input name = "target" value = "{{$reports->id}}" hidden></input>
                                <input name = "idCabang" value = "{{$reports->id_cabang}}" hidden></input>
                                <span class="col-lg-11"></span>
                                 <button class="btn btn-warning btn-xs" type="submit"> Details</button>
                                </form>
                              </td>
                               <td>
                              <form method ="post" action = "{{ route('reportPdf',['download'=>'pdf']) }}">
                              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                              <input name = "target" value = "{{$reports->id}}" hidden></input>
                              <input name = "idCabang" value = "{{$reports->id_cabang}}" hidden></input>
                              <span class="col-lg-11"></span>
                              <button type="submit" class="btn btn-primary btn-xs" >Download PDF</button>
                             </form>
                              </td>
                            </tr>
                           @endif
                            @endforeach
                           </tbody>
                           </table>
                           <script type="text/javascript">
                             $(document).ready(function() {
                               $('#example2').DataTable();
                             } );
                           </script>
                        </div>

                        <div class="form-field tab-pane fade" id="claim" role="tabpanel" aria-labelledby="claim" style="padding-left:5px; padding-right:5px; padding-top:15px; padding-bottom:15px;">
                         
                         <table id="example4" class="table table-hover" style="width:95%">
                             <thead>
                               <th>Nomor Dokumen</th>
                               <th>Nama Dokumen</th>
                               <th>Cabang</th>
                               <th>Lihat Detail</th>
                               <th>Unduh</th>
                             </thead>
                             <tbody>
                             <tr>
                              @foreach($report as $reports)
                               @if($reports -> jenis_report === 'Claim')
                               <td>{{$reports -> kode_report}}</td>
                               <td>Laporan Lembur Bulan {{$reports -> bulan}}</td>
                               <td>{{$reports -> nama_cabang}}</td>
                               <td>                              
                                <form method ="post" action = "/report/details">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <input name = "target" value = "{{$reports->id}}" hidden></input>
                                <input name = "idCabang" value = "{{$reports->id_cabang}}" hidden></input>
                                <span class="col-lg-11"></span>
                                 <button class="btn btn-warning btn-xs" type="submit"> Details</button>
                                </form>
                              </td>
                               <td>
                              <form method ="post" action = "{{ route('reportPdf',['download'=>'pdf']) }}">
                              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                              <input name = "target" value = "{{$reports->id}}" hidden></input>
                              <input name = "idCabang" value = "{{$reports->id_cabang}}" hidden></input>
                              <span class="col-lg-11"></span>
                              <button type="submit" class="btn btn-primary btn-xs" >Download PDF</button>
                             </form>
                              </td>
                            </tr>
                            @endif
                            @endforeach

                           </tbody>
                           </table>
                           <script type="text/javascript">
                             $(document).ready(function() {
                               $('#example4').DataTable();
                             } );
                           </script>
                        </div>


                        <!-- here -->

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

