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
    // var employee = JSON.parse(document.getElementById("masuk").value);


    var data = [{"nama_cabang":"BANDUNG","id":"3","kode_report":"R2042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"12","total_pengajuan_ditolak":"5","total_pengajuan_dibatalkan":"3","total_nominal":"0"},
                {"nama_cabang":"BANDUNG","id":"4","kode_report":"R3042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"10","total_pengajuan_diterima":"8","total_pengajuan_ditolak":"2","total_pengajuan_dibatalkan":"0","total_nominal":"0"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"50","total_pengajuan_diterima":"23","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"7","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"30","total_pengajuan_diterima":"30","total_pengajuan_ditolak":"0","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"19","total_pengajuan_ditolak":"1","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"15","total_pengajuan_diterima":"10","total_pengajuan_ditolak":"2","total_pengajuan_dibatalkan":"3","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"3","kode_report":"R2042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"10","total_pengajuan_diterima":"5","total_pengajuan_ditolak":"5","total_pengajuan_dibatalkan":"3","total_nominal":"0"},
                {"nama_cabang":"Jakarta 1","id":"4","kode_report":"R3042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"15","total_pengajuan_ditolak":"10","total_pengajuan_dibatalkan":"0","total_nominal":"0"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"30","total_pengajuan_diterima":"25","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"7","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"40","total_pengajuan_diterima":"35","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"50","total_pengajuan_diterima":"45","total_pengajuan_ditolak":"30","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Cuti","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"60","total_pengajuan_diterima":"55","total_pengajuan_ditolak":"35","total_pengajuan_dibatalkan":"3","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"3","kode_report":"R2042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"12","total_pengajuan_ditolak":"5","total_pengajuan_dibatalkan":"3","total_nominal":"0"},
                {"nama_cabang":"BANDUNG","id":"4","kode_report":"R3042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"10","total_pengajuan_diterima":"8","total_pengajuan_ditolak":"2","total_pengajuan_dibatalkan":"0","total_nominal":"0"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"50","total_pengajuan_diterima":"23","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"7","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"30","total_pengajuan_diterima":"30","total_pengajuan_ditolak":"0","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"19","total_pengajuan_ditolak":"1","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"15","total_pengajuan_diterima":"10","total_pengajuan_ditolak":"2","total_pengajuan_dibatalkan":"3","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"3","kode_report":"R2042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"10","total_pengajuan_diterima":"5","total_pengajuan_ditolak":"5","total_pengajuan_dibatalkan":"3","total_nominal":"0"},
                {"nama_cabang":"Jakarta 1","id":"4","kode_report":"R3042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"15","total_pengajuan_ditolak":"10","total_pengajuan_dibatalkan":"0","total_nominal":"0"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"30","total_pengajuan_diterima":"25","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"7","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"40","total_pengajuan_diterima":"35","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"50","total_pengajuan_diterima":"45","total_pengajuan_ditolak":"30","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Klaim","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"60","total_pengajuan_diterima":"55","total_pengajuan_ditolak":"35","total_pengajuan_dibatalkan":"3","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"3","kode_report":"R2042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"12","total_pengajuan_ditolak":"5","total_pengajuan_dibatalkan":"3","total_nominal":"0"},
                {"nama_cabang":"BANDUNG","id":"4","kode_report":"R3042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"10","total_pengajuan_diterima":"8","total_pengajuan_ditolak":"2","total_pengajuan_dibatalkan":"0","total_nominal":"0"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"50","total_pengajuan_diterima":"23","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"7","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"30","total_pengajuan_diterima":"30","total_pengajuan_ditolak":"0","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"19","total_pengajuan_ditolak":"1","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"15","total_pengajuan_diterima":"10","total_pengajuan_ditolak":"2","total_pengajuan_dibatalkan":"3","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"3","kode_report":"R2042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"10","total_pengajuan_diterima":"5","total_pengajuan_ditolak":"5","total_pengajuan_dibatalkan":"3","total_nominal":"0"},
                {"nama_cabang":"Jakarta 1","id":"4","kode_report":"R3042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"15","total_pengajuan_ditolak":"10","total_pengajuan_dibatalkan":"0","total_nominal":"0"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"30","total_pengajuan_diterima":"25","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"7","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"40","total_pengajuan_diterima":"35","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"50","total_pengajuan_diterima":"45","total_pengajuan_ditolak":"30","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Lembur","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"60","total_pengajuan_diterima":"55","total_pengajuan_ditolak":"35","total_pengajuan_dibatalkan":"3","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"3","kode_report":"R2042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"12","total_pengajuan_ditolak":"5","total_pengajuan_dibatalkan":"3","total_nominal":"0"},
                {"nama_cabang":"BANDUNG","id":"4","kode_report":"R3042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"10","total_pengajuan_diterima":"8","total_pengajuan_ditolak":"2","total_pengajuan_dibatalkan":"0","total_nominal":"0"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"50","total_pengajuan_diterima":"23","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"7","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"30","total_pengajuan_diterima":"30","total_pengajuan_ditolak":"0","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"19","total_pengajuan_ditolak":"1","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"BANDUNG","id":"5","kode_report":"R4042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"15","total_pengajuan_diterima":"10","total_pengajuan_ditolak":"2","total_pengajuan_dibatalkan":"3","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"3","kode_report":"R2042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"10","total_pengajuan_diterima":"5","total_pengajuan_ditolak":"5","total_pengajuan_dibatalkan":"3","total_nominal":"0"},
                {"nama_cabang":"Jakarta 1","id":"4","kode_report":"R3042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"20","total_pengajuan_diterima":"15","total_pengajuan_ditolak":"10","total_pengajuan_dibatalkan":"0","total_nominal":"0"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"30","total_pengajuan_diterima":"25","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"7","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"40","total_pengajuan_diterima":"35","total_pengajuan_ditolak":"20","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"50","total_pengajuan_diterima":"45","total_pengajuan_ditolak":"30","total_pengajuan_dibatalkan":"0","total_nominal":"1200000"},
                {"nama_cabang":"Jakarta 1","id":"5","kode_report":"R4042018","jenis_report":"Izin","bulan":"April","tahun":"2018","id_cabang":"1","total_pengajuan":"60","total_pengajuan_diterima":"55","total_pengajuan_ditolak":"35","total_pengajuan_dibatalkan":"3","total_nominal":"1200000"}];
    
    //Memasukkan data report sesuai dengan cabang yang dipilih
    var indexCuti = 0;
    var indexKlaim = 0;
    var indexIzin = 0; 
    var indexLembur = 0;

    for (var i = 0; i < data.length; i++){
      if(data[i].nama_cabang == cabang && data[i].jenis_report == 'Cuti'){
        dataTargetCuti[indexCuti] = data[i];
        indexCuti++;
      }
      else if(data[i].nama_cabang == cabang && data[i].jenis_report == 'Klaim'){
        dataTargetKlaim[indexKlaim] = data[i];
        indexKlaim++;
      }
      else if(data[i].nama_cabang == cabang && data[i].jenis_report == 'Lembur'){
        dataTargetLembur[indexLembur] = data[i];
        indexLembur++;
      }
      else if(data[i].nama_cabang == cabang && data[i].jenis_report == 'Izin'){
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

