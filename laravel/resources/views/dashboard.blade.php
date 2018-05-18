@extends("layouts/masterlayout")
@section("main")
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <!-- Start ROW MT -->
            <div class="row mt">
              <!-- White panel Quick Access START -->
              <div class="col-md-12 col-sm-12 mb">
                    @if(Auth::user()->role === 'headOfDepartment')
                    <!-- Chart START -->

                    <ul>
                      <li style="float: left">
                        <h4 style="font-weight: 700; margin-left: -3rem">Dashboard</h4>
                      </li>
                      <li style="float: right">
                        <select class="form-control" id="namaCabang" name="namaCabang" onchange="pilihCabang()" style="border-radius: 5pt; box-shadow: 0px 0px 10px -2px #aab2bd; width: 20rem">
                          <option disabled selected value>Pilih Cabang</option>
                          @foreach ($listOfCabang as $cabang)
                          <option value="{{ $cabang->nama_cabang }}">
                            {{ $cabang->nama_cabang }}
                          </option>
                          @endforeach
                        </select>
                      </li>
                    </ul><br>

                    <div class="row mt">
                      <div class="col-md-3 col-sm-3">
                        <div class="stock">
                          <div class="stock current-price">
                            <div class="row">
                              <div class="info col-sm-6 col-xs-6">
                                <abbr>Cuti</abbr> <time>Pengajuan Bulan lalu</time>
                              </div>
                              <div class="changes col-sm-6 col-xs-6">
                                <div class="value up" style="color: #ce5a57">
                                 694.00
                                </div>
                                <div class="change hidden-sm hidden-xs">
                                  +4.95 (3.49%)
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-3 col-sm-3">
                        <div class="stock">
                          <div class="stock current-price">
                            <div class="row">
                              <div class="info col-sm-6 col-xs-6">
                                <abbr>Klaim</abbr> <time>Total klaim bulan lalu</time>
                              </div>
                              <div class="changes col-sm-6 col-xs-6">
                                <div class="value up" style="color: #4fd98b;; font-size: 2rem">
                                  16.500.200
                                </div>
                                <div class="change hidden-sm hidden-xs">
                                  Rupiah<p> (+20%)</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-3 col-sm-3">
                        <div class="stock">
                          <div class="stock current-price">
                            <div class="row">
                              <div class="info col-sm-6 col-xs-6">
                                <abbr>Izin</abbr> <time>Pengajuan Bulan lalu</time>
                              </div>
                              <div class="changes col-sm-6 col-xs-6">
                                <div class="value up" style="color: lightblue">
                                  694.00
                                </div>
                                <div class="change hidden-sm hidden-xs">
                                  +4.95 (3.49%)
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-3 col-sm-3">
                        <div class="stock">
                          <div class="stock current-price">
                            <div class="row">
                              <div class="info col-sm-6 col-xs-6">
                                <abbr>Lembur</abbr> <time>Pengajuan Bulan lalu</time>
                              </div>
                              <div class="changes col-sm-6 col-xs-6">
                                <div class="value up" style="color: yellow;">
                                  694.00
                                </div>
                                <div class="change hidden-sm hidden-xs">
                                  +4.95 (3.49%)
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                                        
                    <div class="row mt mmb">
                      <div class="col-lg-6 col-md-6">
                        <div class="content-panel">
                          <h3 class="graph-title">Grafik Cuti</h3>
                          <div id="area-chart1"></div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="content-panel">
                          <h3 class="graph-title">Grafik Klaim</h3>
                          <div id="area-chart2"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt">
                      <div class="col-lg-6 col-md-6">
                        <div class="content-panel">
                          <h3 class="graph-title">Grafik Lembur</h3>
                          <div id="area-chart3"></div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="content-panel">
                          <h3 class="graph-title">Grafik Izin</h3>
                          <div id="area-chart4"></div>
                        </div>
                      </div>
                    </div>
                   <!--  <div class="row mt">
                      <div class="col-lg-6">
                        <div class="content-panel">
                          <div id="bar-chart"></div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="content-panel">
                          <div id="bar-stacked"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt">
                      <div class="col-lg-6">
                        <div class="content-panel">
                          <div id="pie-chart" ></div>
                        </div>
                      </div>
                    </div> -->
                    <!-- Chart END -->
                    @else
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;">Dashboard</h2>
                  </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <!-- card start -->
                        <div class="stock card">
                          <a href="/profile/view">
                          <div class="stock-chart">
                            <div id="chart"><img class="dashboard-icon" src="{{ asset('public/img/profile.png') }}"></div>
                          </div>
                          <div class="summary">
                            <strong>PROFIL</strong>
                          </div>
                        </a>
                        </div><!-- card end -->
                      </div>
                      <div class="col-lg-3">
                        <!-- card start -->
                        <div class="stock card">
                          <a href="/claim/form">
                          <div class="stock-chart">
                            <div id="chart"><img class="dashboard-icon" src="{{ asset('public/img/claim.png') }}"></div>
                          </div>
                          <div class="summary">
                            <strong>KLAIM</strong>
                          </div>
                        </a>
                        </div><!-- card end -->
                      </div>
                      <div class="col-lg-3">
                        <!-- card start -->
                        <div class="stock card">
                          <a href="/leave/form">
                          <div class="stock-chart">
                            <div id="chart"><img class="dashboard-icon" src="{{ asset('public/img/leave.png') }}"></div>
                          </div>
                          <div class="summary">
                            <strong a href="/leave/form">CUTI</strong>
                          </div>
                        </a>

                        </div><!-- card end -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <!-- card start -->
                        <div class="stock card">
                          <a href="/overtime/form">
                          <div class="stock-chart">
                            <div id="chart"><img class="dashboard-icon" src="{{ asset('public/img/overtime.png') }}"></div>
                          </div>
                          <div class="summary">
                            <strong a href="/overtime/form">LEMBUR</strong>
                          </div>
                        </a>
                        </div><!-- card end -->
                      </div>
                      <div class="col-lg-3">

                        <div class="stock card">
                          <a href="/permission/form">
                          <div class="stock-chart">
                            <div id="chart"><img class="dashboard-icon" src="{{ asset('public/img/permission.png') }}"></div>
                          </div>
                          <div class="summary">
                            <strong>IZIN</strong>
                          </div>
                          </a>
                        </div>
                        <!-- card end -->
                      </div>
                    </div><br><br>
                    @endif
                  </div>
                </div>
              </div>
              <!-- White panel Quick Access END -->
            </div>
            <!-- End ROW MT -->
          </div>
        </div>
      </section>

@endsection

