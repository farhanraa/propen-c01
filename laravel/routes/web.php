<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" mixddleware group. Now create something great!
|
*/
Route::get('/dashboard', [
	'middleware' => 'generalAuth',
	'uses' => 'HomeController@index',
])->name('dashboard');

Route::get('/', function(){
	return redirect('/dashboard');
});

//ROUTE UNTUK PERMISSION

Route::get('/permission/form', [
	'middleware' => 'generalAuth',
	'uses' => 'izinController@riwayatIzin',
]);

Route::post('/permission/form/submit', 'izinController@submitForm');

Route::post('/permission/form/dibatalkan', 'izinController@dibatalkan');

Route::get('/permission/approval', [
	'middleware' => 'adminAuth',
	'uses' => 'izinController@approval' 
]);

Route::post('/permission/approval/diterima', 'izinController@approvalDiterima');


Route::post('/permission/approval/ditolak', 'izinController@approvalDitolak');
//Route::get('/coba', 'izinController@index');


// ROUTE UNTUK LEAVE
Route::get('/leave/form', 'LeaveController@dataCuti');

Route::post('/leave/form/submit', 'LeaveController@submitForm');

Route::post('/leave/form/dibatalkan', 'LeaveController@dibatalkan');

Route::get('/leave/approval', [
	'middleware' => 'adminAuth',
	'uses' => 'LeaveController@approval'
]);

Route::post('/leave/approval/diterima', [
	'middleware' => 'adminAuth',
	'uses' => 'LeaveController@approvalDiterima'
]);

Route::post('/leave/approval/ditolak', [
	'middleware' => 'adminAuth',
	'uses' => 'LeaveController@approvalDitolak'
]);



// ROUTE UNTUK OVERTIME
Route::get('/overtime/form', [
	'middleware' => 'generalAuth',
	'uses' => 'overtimeController@riwayatLembur',
]);

Route::post('/overtime/form/submit', 'overtimeController@submitForm');

Route::get('/overtime/approval', [
	'middleware' => 'adminAuth',
	'uses' => 'overtimeController@approvalLembur'
]);

Route::post('/overtime/approval/approved', 'overtimeController@approved');

Route::post('/overtime/approval/reject', 'overtimeController@reject');

Route::post('/overtime/form/batal', 'overtimeController@batal');



// 
Route::get('/claim', function(){
	return redirect('/claim/form');
});
Route::get('/claim/form', [
	'middleware' => 'generalAuth',
	'uses' => 'ClaimController@lihatClaim'
])->name('lihatClaim');

Route::post('/claim/submit', [
	'middleware' => 'generalAuth',
	'uses' => 'ClaimController@ajukanClaimSubmit'
])->name('ajukanClaim');

Route::get('/claim/approval',  [
	'middleware' => 'adminAuth',
	'uses' => 'ClaimController@approvalClaim'
]);

Route::post('/claim/approval/diterima',  [
	'middleware' => 'adminAuth',
	'uses' => 'ClaimController@diterima'
])->name('claimDiterima');

Route::post('/claim/approval/ditolak',  [
	'middleware' => 'adminAuth',
	'uses' => 'ClaimController@ditolak'
])->name('claimDitolak');

Route::post('/claim/approval/dibatalkan',  [
	'middleware' => 'generalAuth',
	'uses' => 'ClaimController@dibatalkan'
])->name('claimDibatalkan');


//AUTH
Route::get('/login', 'LoginController@showLogin')->name('login');
Route::post('/login', 'LoginController@doLogin');
Route::get('/logout', 'LoginController@doLogout');
Route::get('/home', 'HomeController@index')->name('home');

//ROUTE UNTUK PROFIL
Route::get('/profile/view', 'ProfilController@lihatProfil')->name('lihatProfil');
Route::get('/download/{file}', 'ProfilController@download');
Route::get('/absen/view', 'AbsenController@lihatAbsen');
Route::get('/profile/form', 'ProfilController@formProfil')->name('ubahProfil');
Route::post('/profile/form/ubahKontakDarurat', 'ProfilController@ubahKD')->name('ubahKD');
Route::post('/profile/form/ubahBank', 'ProfilController@ubahBank')->name('ubahBank');
Route::post('/profile/form/submitDok', 'ProfilController@tambahDokumen')->name('tambahDoku');
Route::post('/profile/form/submitPB', 'ProfilController@tambahPB')->name('tambahPB');
Route::post('/profile/form/hobidanprestasi/submit', 'ProfilController@tambahHDP')->name('tambahHDP');
Route::post('/profile/form/submitKP', 'ProfilController@tambahKP')->name('tambahKP');
Route::post('/profile/form/submitPD', 'ProfilController@tambahPD')->name('tambahPD');
Route::post('/profile/form/submitSP', 'ProfilController@tambahSP')->name('tambahSP');
Route::post('/profile/form/submitBA', 'ProfilController@tambahBA')->name('tambahBA');
Route::post('/profile/form/submitLI', 'ProfilController@tambahLI')->name('tambahLI');
Route::post('/profile/form/submitSU', 'ProfilController@tambahSU')->name('tambahSU');
Route::post('/profile/form/submitIK', 'ProfilController@tambahIK')->name('tambahIK');
Route::post('/profile/form/submitPK', 'ProfilController@tambahPK')->name('tambahPK');
Route::post('/profile/form/submitK1', 'ProfilController@tambahK1')->name('tambahK1');
Route::post('/profile/form/submitK2', 'ProfilController@tambahK2')->name('tambahK2');
Route::post('/profile/form/submit', 'ProfilController@formProfilSubmit')->name('submitFormProfil');
Route::get('/profile/form/selesai', 'ProfilController@formProfilSelesai')->name('selesai');

Route::get('/sendmail', 'HomeController@sendEmail');


//ROUTES UNTUK REPORT

Route::get('report',array('as'=>'report','uses'=>'ReportController@report'));
Route::get('report',array('as'=>'reportIzin','uses'=>'ReportController@report'));

