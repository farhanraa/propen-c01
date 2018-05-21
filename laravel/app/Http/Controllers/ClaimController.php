<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input; 
use App\DataClaim;
use App\RulesClaim;
use App\RulesOfCostClaim;
use App\ClaimOfEmployee;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Mail;
use DB;

class ClaimController extends Controller
{
    public function lihatClaim(){
        $totalHakClaim = 0;
        $totalSeluruhClaim = 0;
        $totalSisaClaim = 0;
        $employee = Employee::where('id', Auth::user()->id_employee)->first();
        $claimOfEmployee = ClaimOfEmployee::where('id_employee', $employee->id)->with('rulesClaim')->get();
        $validClaim = collect([]); //buat collection kosong

        // mencari claim yang berlaku pada tahun tersebut kepada suatu employee
        // DAN mencari totalHakClaim yang didapat
        ${'data'.$totalHakClaim} = 0 ;
        // echo $data0;
    
        for($i = 0; $i < $claimOfEmployee->count(); $i++){
            if($claimOfEmployee[$i]->rulesClaim->is_berlaku == 1){
                $validClaim[$i] = $claimOfEmployee[$i];
                $totalHakClaim += $claimOfEmployee[$i]->rulesClaim->nominal_klaim;
                $totalSisaClaim += $claimOfEmployee[$i]->sisa_klaim;
            }
        }
        // echo $validClaim[1]->id;
        // mencari data claim (seluruh claim yang diajukan)
        $dataClaim = DataClaim::where('id_employee', $employee->id)->get();
        for ($i = 0; $i < $dataClaim->count(); $i ++){
            if($dataClaim[$i]->status === 'Diterima'){
                $totalSeluruhClaim += $dataClaim->pluck('nominal_klaim')[$i];
            }
        }

        return view('claim', [
            'employee' => $employee,
            'claimOfEmployee'=>$claimOfEmployee, 
            'totalSisaClaim'=>$totalSisaClaim,
            'totalHakClaim'=>$totalHakClaim,
            'validClaim'=>$validClaim,
            'dataClaim'=>$dataClaim,
             ]);
    }

    public function ajukanClaimSubmit(Request $request){
        $dataClaim = new DataClaim();
        $kodeDataClaim = DataClaim::get() -> count() + 1;
        if($kodeDataClaim < 10){
            $kodeDataClaim = '00' . $kodeDataClaim;
        }else if($kodeDataClaim < 100){
            $kodeDataClaim = '0' . $kodeDataClaim;
        }
        $dataClaim->kode_data_klaim = 'KDC' . $kodeDataClaim;
        $dataClaim->id_klaim = $request->input('kodeClaim');
        // echo $dataClaim->id_klaim;
        $employee = Employee::where('id', $request->input('idEmployee'))->first();
        $dataClaim->id_employee = $employee->id;

        $tanggal =$request->input('tanggalTransaksi');
        $split_tanggal = explode("/", $tanggal);
        $tahun = $split_tanggal[2];
        $hari = $split_tanggal[1];
        $bulan = $split_tanggal[0];
        $tanggal_transaksi = $tahun. '-' . $bulan .'-' . $hari;

        if ($request->hasFile('uploadBukti')){
            $file = Input::file('uploadBukti');
            $destinationPath = public_path(). '/upload/';
            $filename = $file->getClientOriginalName();
            Input::file('uploadBukti')->move($destinationPath, $filename);
            $dataClaim->bukti = $filename;
        }
        $dataClaim->tanggal_transaksi = $tanggal_transaksi;
        $dataClaim->status = 'Menunggu Persetujuan HRM';
        $dataClaim->nominal_klaim = (int)str_replace(array(' ', ','), '', $request->input('nominalClaim'));
        $dataClaim->keterangan = 'diagnosis:' . $request->input('diagnosis') . '-rumahSakit:' . $request->input('rumahSakit');
        $dataClaim->save();
        // echo "simpen";
        return redirect('claim/form')->with('alert','Pengajuan Claim Berhasil Disubmit');
    }
    
    public function approvalClaim(){
        $employee = Employee::where('nik_employee', Auth::user()->nik_employee)->first();
        $approvalClaim = '';

        if(Auth::user()->role == 'hrManager'){
            $approvalClaim = DataClaim::with('employee', 'rulesClaim')->where('status', 'Menunggu Persetujuan HRM')->get();
        }
        elseif(Auth::user()->role == 'finance'){
        // jika dia finance
            $approvalClaim = DataClaim::with('employee', 'rulesClaim')->where('status', 'Menunggu Persetujuan Finance')->get();
        }

        $riwayat = DataClaim::get();

        return view('formApprovalClaim' , ['approvalClaim' => $approvalClaim, 'employee' => $employee, 'riwayat' => $riwayat]);
    }

    public function diterima(Request $request){
        $dataTarget = DataClaim::where('id', $request->input('idDataClaim'))->with('employee', 'rulesClaim')->first();

        if(Auth::user()->role == 'hrManager'){
            $dataTarget->status = 'Menunggu Persetujuan Finance';
        }
        elseif(Auth::user()->role == 'finance'){
            $claimOfEmployee = ClaimOfEmployee::where('id_employee', $dataTarget->employee->id)->where('id_klaim',  $dataTarget->rulesClaim->id)->first();
            $dataTarget->status = 'Diterima';
            $claimOfEmployee->sisa_klaim = $claimOfEmployee->sisa_klaim - $dataTarget->nominal_klaim;
            $claimOfEmployee->save();

            $dataClaim = DataClaim::where('id_employee', $dataTarget->employee->id)->where('id_klaim', $dataTarget->id_klaim)->get();
            foreach($dataClaim as $claim){
                if($claim->status == "Menunggu Persetujuan HRM" || $claim->status == "Menunggu Persetujuan Finance"){
                    if($claim->nominal_klaim > $claimOfEmployee->sisa_klaim){
                        $claim->status = 'Ditolak';
                        $claim->save();
                    }
                }
            }          
        }
        $dataTarget->save();

        $emailTarget = $dataTarget->employee->email;
        Mail::send('notif/the-email', ['title' => 'Harmonis - Mega Sekuritas', 'emailTarget' => $emailTarget, 'dataTarget' => $dataTarget, 'status' => strtolower($dataTarget->status)], function($message) use ($emailTarget){
            $message->to($emailTarget)->subject('Update Status Pengajuan');
        });
        return redirect('claim/approval')->with('alert','Pengajuan dengan ID ' . $dataTarget->id .' Berhasil Diterima');
    }

    public function ditolak(Request $request){
        $dataTarget = DataClaim::where('id', $request->input('idDataClaim'))->with('employee')->first();
        $dataTarget->status = 'Ditolak';
        $dataTarget->save();

        $emailTarget = $dataTarget->employee->email;
        Mail::send('notif/the-email', ['title' => 'Harmonis - Mega Sekuritas', 'emailTarget' => $emailTarget, 'dataTarget' => $dataTarget, 'status' => strtolower($dataTarget->status)], function($message) use ($emailTarget){
            $message->to($emailTarget)->subject('Update Status Pengajuan');
        });
        return redirect('claim/approval')->with('alert','Pengajuan dengan ID ' . $dataTarget->id .' Berhasil Ditolak');
    }
    public function dibatalkan(Request $request){
        $dataTarget = DataClaim::where('id', $request->input('idDataClaim'))->with('employee')->first();
        $dataTarget->status = 'Dibatalkan';
        $dataTarget->save();

        $emailTarget = $dataTarget->employee->email;
        Mail::send('notif/the-email', ['title' => 'Harmonis - Mega Sekuritas', 'emailTarget' => $emailTarget, 'dataTarget' => $dataTarget, 'status' => strtolower($dataTarget->status)], function($message) use ($emailTarget){
            $message->to($emailTarget)->subject('Update Status Pengajuan');
        });
        return redirect('claim/form')->with('alert','Pengajuan dengan ID ' . $dataTarget->id .' Berhasil Dibatalkan');
    }

}
