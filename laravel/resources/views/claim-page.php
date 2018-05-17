<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>HARMONIS - Claim</title>
  <script src="../../public/js/jquery-3.3.1.js">
  </script>
  <script src="../../public/js/jquery-3.3.1.min.js">
  </script><!-- import css -->
  <link href="../../public/css/bootstrap.css" rel="stylesheet">
  <link href="../../public/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../../public/css/zabuto_calendar.css" rel="stylesheet" type="text/css">
  <link href="../../public/js/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css">
  <link href="../../public/lineicons/style.css" rel="stylesheet" type="text/css"><!-- Custom styles for this template -->
  <link href="../../public/css/style.css" rel="stylesheet">
  <link href="../../public/css/style-responsive.css" rel="stylesheet">
  <link href="../../public/css/bootstrap-timepicker.css" rel="stylesheet">
  <link href="../../public/css/bootstrap-timepicker.min.css" rel="stylesheet">
  <link href="../../public/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="../../public/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <script src="../../public/js/chart-master/Chart.js">
  </script>
  <link href="../../public/img/megacapital.png" rel="shortcut icon">
</head>
<body>
  <section id="container">
    <?php include 'header.php';?><?php include 'sidebar.php'; ?><!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="row mt">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h2 style="padding-left: 30px;">Claim Page</h2>
                  </div>
                  <div class="dashboard-menu">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenis Claim</th>
                          <th>Tanggal Awal</th>
                          <th>Tanggal Akhir</th>
                          <th>Tanggal Hangus</th>
                          <th>Hak Claim</th>
                          <th>Sisa Claim</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>C201600110906</td>
                          <td>20-09-2016</td>
                          <td>20-09-2016</td>
                          <td>20-09-2016</td>
                          <td>Rp. 1.000.000</td>
                          <td>Rp. 1.000.000</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>C201600110906</td>
                          <td>20-09-2016</td>
                          <td>20-09-2016</td>
                          <td>20-09-2016</td>
                          <td>Rp. 1.000.000</td>
                          <td>Rp. 1.000.000</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><strong>Total Sisa Claim</strong></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><strong>Rp. 2.000.000</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="dashboard-menu">
                 
                    <button class="btn-slidedown" id="btnRiwayatClaim">
                      <span id="btn-slide-left" data-placement="right">Riwayat Claim<span>
                      <span id="btn-slide-right" class="fa fa-angle-down"></span>
                    </button>
                    <form class="form-field"  id="riwayatClaim" hidden>
                      
                    </form>
                    
                  </div><br>
                  <div class="dahboard-menu">
                    <button class="btn-slidedown" id="btnAjukanClaim">
                      <span id="btn-slide-left" data-placement="right">Ajukan Claiwdawdmam<span>
                      <span id="btn-slide-right" class="fa fa-angle-down"></span>
                    </button>
                    <form class="form-field"  id="formPengajuanClaim" hidden>
                      <div class="form-group">
                        <label for="sel1"><strong>Jenis Claim</strong></label> 
                        <select class="form-control" id="sel1">
                          <option>
                            a
                          </option>
                          <option>
                            b
                          </option>
                          <option>
                            c
                          </option>
                          <option>
                            d
                          </option>
                        </select><br>
                      </div>
                      <div class="row">
                        <div class='col-sm-12'>
                          <div class="form-group">
                            <label for="datepicker2"><strong>Tanggal Kwitansi</strong></label>
                            <div class="form-group">
                              <div class="form-group">
                                <input class="form-control" id='datepicker2' type='text'>
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
                            <label><strong>Nama Pasien</strong></label> 
                            <input class="form-control" type="text" name="namaPasien">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label><strong>Nama Dokter</strong></label> 
                            <input class="form-control" type="text" name="namaDokter">
                          </div>
                        </div>
                      </div><br><br>

                      <h4x  ><strong>Perincian Dokumen Claim</strong></h4><br>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label><strong>Diagnosis</strong></label> 
                            <input class="form-control" type="text" name="diagnosis">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label><strong>Rumah Sakit</strong></label> 
                            <input class="form-control" type="text" name="rumahSakit">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label><strong>Nominal</strong></label> 
                            <input class="form-control" type="text" name="nominal">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="reason"><strong>Alasan</strong></label> 
                            <textarea class="form-control" id="reason" rows="3"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <span class="col-lg-10"></span>
                        <div class="btn-group">
                          <button class="btn btn-secondary" type="button">KEMBALI</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary" type="button">AJUKAN</button>
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

                  </div><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section><!--main content end-->
    <?php include 'footer.php'; ?>
  </section>
  <?php include 'script.php' ?>
  <script type="application/javascript">
            $(document).ready(function () {
                $("#date-popover").popover({html: true, trigger: "manual"});
                $("#date-popover").hide();
                $("#date-popover").click(function (e) {
                    $(this).hide();
                });
            
                $("#my-calendar").zabuto_calendar({
                    action: function () {
                        return myDateFunction(this.id, false);
                    },
                    action_nav: function () {
                        return myNavFunction(this.id);
                    },
                    ajax: {
                        url: "show_data.php?action=1",
                        modal: true
                    },
                    legend: [
                        {type: "text", label: "Special event", badge: "00"},
                        {type: "block", label: "Regular event", }
                    ]
                });
            });
            
            
            function myNavFunction(id) {
                $("#date-popover").hide();
                var nav = $("#" + id).data("navigation");
                var to = $("#" + id).data("to");
                console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
            }
  </script>
</body>
</html>