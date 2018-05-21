
var cabang = '';
var dataTargetCuti = new Array();
var dataTargetKlaim = new Array();
var dataTargetIzin = new Array();
var dataTargetLembur = new Array();
// fungsi untuk mengambil data report yang dibutuhkan
$(document).ready(function(){

});

function pilihCabang(){
  cabang = document.getElementById('namaCabang').value;
  // mengambil data dari view   
    data = JSON.parse(document.getElementById("reports").value);
    dataReportBulanLalu = JSON.parse(document.getElementById("reportBulanLalu").value);

    //
    for (var i = 0; i < dataReportBulanLalu.length; i++){
      if(dataReportBulanLalu[i].id_cabang == cabang && dataReportBulanLalu[i].jenis_report == 'Cuti'){
        document.getElementById('cutiKemarin').innerHTML = dataReportBulanLalu[i].total_pengajuan;
      }
      else if(dataReportBulanLalu[i].id_cabang == cabang && dataReportBulanLalu[i].jenis_report == 'Claim'){
        document.getElementById('claimKemarin').innerHTML = dataReportBulanLalu[i].total_pengajuan;
      }
      else if(dataReportBulanLalu[i].id_cabang == cabang && dataReportBulanLalu[i].jenis_report == 'Lembur'){

        document.getElementById('lemburKemarin').innerHTML = dataReportBulanLalu[i].total_pengajuan;
      }
      else if(dataReportBulanLalu[i].id_cabang == cabang && dataReportBulanLalu[i].jenis_report == 'Izin'){
        document.getElementById('izinKemarin').innerHTML = dataReportBulanLalu[i].total_pengajuan;
      }
    }

    //Memasukkan data report sesuai dengan cabang yang dipilih
    var indexCuti = 0;
    var indexKlaim = 0;
    var indexIzin = 0; 
    var indexLembur = 0;

    for (var i = 0; i < data.length; i++){
      if(data[i].id_cabang == cabang && data[i].jenis_report == 'Cuti'){
        dataTargetCuti[indexCuti] = data[i];
        indexCuti++;
      }
      else if(data[i].id_cabang == cabang && data[i].jenis_report == 'Claim'){
        dataTargetKlaim[indexKlaim] = data[i];
        indexKlaim++;
      }
      else if(data[i].id_cabang == cabang && data[i].jenis_report == 'Lembur'){
        dataTargetLembur[indexLembur] = data[i];
        indexLembur++;
      }
      else if(data[i].id_cabang == cabang && data[i].jenis_report == 'Izin'){
        dataTargetIzin[indexIzin] = data[i];
        indexIzin++;
      }
    }

    var today = new Date();
    var todayMonth = today.getMonth();
    var todayYear = today.getFullYear();
    var monthYear = '';
    var cuti = new Array();
    var klaim = new Array();
    var izin = new Array();
    var lembur = new Array();

    // loop untuk mengambil 6 bulan terakhir (dari hari ini)
    for (var i = 0; i < 6; i++){
      if(todayMonth == 0){
        todayMonth = 12;
        todayYear = --todayYear;
      }
      if(todayMonth < 10){
        monthYear = todayYear + '-0' + todayMonth--;
      } else{
        monthYear = todayYear + '-' + todayMonth--;
      }
      cuti[i] = { month: '' + monthYear, a: dataTargetCuti[i].total_pengajuan, b: dataTargetCuti[i].total_pengajuan_diterima, c: dataTargetCuti[i].total_pengajuan_ditolak};
      klaim[i] = { month: '' + monthYear, a: dataTargetKlaim[i].total_pengajuan, b: dataTargetKlaim[i].total_pengajuan_diterima, c: dataTargetKlaim[i].total_pengajuan_ditolak};
      izin[i] = { month: '' + monthYear, a: dataTargetIzin[i].total_pengajuan, b: dataTargetIzin[i].total_pengajuan_diterima, c: dataTargetIzin[i].total_pengajuan_ditolak};
      lembur[i] = { month: '' + monthYear, a: dataTargetLembur[i].total_pengajuan, b: dataTargetLembur[i].total_pengajuan_diterima, c: dataTargetLembur[i].total_pengajuan_ditolak};
    }

        config1 = {
          data: cuti,
          xkey: 'month',
          ykeys: ['a', 'b', 'c'],
          labels: ['Jumlah Cuti Diajukan', 'Jumlah Cuti Diterima','Jumlah Cuti Ditolak'],
          fillOpacity: 0.8,
          hideHover: 'auto',
          xLabelFormat: function (x) {
              var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
              var month = IndexToMonth[ x.getMonth() ];
              var year = x.getFullYear();
              return year + ' ' + month;
          },
          dateFormat: function (x) {
              var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
              var month = IndexToMonth[ new Date(x).getMonth() ];
              var year = new Date(x).getFullYear();
              return year + ' ' + month;
          },
          behaveLikeLine: true,
          resize: true,
          pointFillColors:[''],
          pointStrokeColors: [''],
          padding: 30,
          lineColors:['#020509','#31A2AC','#cb0000'], 
      };
    document.getElementById('area-chart1').innerHTML = '';
    config1.element = 'area-chart1';
    Morris.Area(config1);


        config2 = {

          data: klaim,
          xkey: 'month',
          ykeys: ['a', 'b', 'c'],
          labels: ['Jumlah Klaim Diajukan', 'Jumlah Klaim Diterima','Jumlah Klaim Ditolak'],
          fillOpacity: 0.8,
          hideHover: 'auto',
          xLabelFormat: function (x) {
              var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
              var month = IndexToMonth[ x.getMonth() ];
              var year = x.getFullYear();
              return year + ' ' + month;
          },
          dateFormat: function (x) {
              var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
              var month = IndexToMonth[ new Date(x).getMonth() ];
              var year = new Date(x).getFullYear();
              return year + ' ' + month;
          },
          behaveLikeLine: true,
          resize: true,
          pointFillColors:[''],
          pointStrokeColors: [''],
          padding: 30,
          lineColors:['#020509','#31A2AC','#cb0000'],
      };
    document.getElementById('area-chart2').innerHTML = '';
    config2.element = 'area-chart2';
    Morris.Area(config2);

        config3 = {
          data: lembur,
          xkey: 'month',
          ykeys: ['a', 'b', 'c'],
          labels: ['Jumlah Lembur Diajukan', 'Jumlah Lembur Diterima','Jumlah Lembur Ditolak'],
          fillOpacity: 0.8,
          hideHover: 'auto',
          xLabelFormat: function (x) {
              var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
              var month = IndexToMonth[ x.getMonth() ];
              var year = x.getFullYear();
              return year + ' ' + month;
          },
          dateFormat: function (x) {
              var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
              var month = IndexToMonth[ new Date(x).getMonth() ];
              var year = new Date(x).getFullYear();
              return year + ' ' + month;
          },
          behaveLikeLine: true,
          resize: true,
          pointFillColors:[''],
          pointStrokeColors: [''],
          padding: 30,
          lineColors:['#020509','#31A2AC','#cb0000'],
      };
    document.getElementById('area-chart3').innerHTML = '';
    config3.element = 'area-chart3';
    Morris.Area(config3);

        config4 = {
          data: izin,
          xkey: 'month',
          ykeys: ['a', 'b', 'c'],
          labels: ['Jumlah Izin Diajukan', 'Jumlah Izin Diterima','Jumlah Izin Ditolak'],
          fillOpacity: 0.8,
          hideHover: 'auto',
          xLabelFormat: function (x) {
              var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
              var month = IndexToMonth[ x.getMonth() ];
              var year = x.getFullYear();
              return year + ' ' + month;
          },
          dateFormat: function (x) {
              var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des" ];
              var month = IndexToMonth[ new Date(x).getMonth() ];
              var year = new Date(x).getFullYear();
              return year + ' ' + month;
          },
          behaveLikeLine: true,
          resize: true,
          pointFillColors:[''],
          pointStrokeColors: [''],
          padding: 30,
          lineColors:['#020509','#31A2AC','#cb0000'],
      };
    document.getElementById('area-chart4').innerHTML = '';
    config4.element = 'area-chart4';
    Morris.Area(config4);

    // config.element = 'bar-chart';
    // Morris.Bar(config);
    // config.element = 'bar-stacked';
    // config.stacked = true;
    // Morris.Bar(config);
    // Morris.Donut({
    //   element: 'pie-chart',
    //   data: [
    //     {label: "HR", value: 30},
    //     {label: "IT", value: 15},
    //     {label: "Finance", value: 45},
    //     {label: "Operational", value: 10}
    //   ]
    // });
}

