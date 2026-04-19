<?php

namespace App\Http\Controllers;

use App\Models\DBU as DBU;
use App\Models\DBS as DBS;
use App\Models\PEL as PEL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function __construct(DBU $dbu, DBS $dbs, PEL $dbl)
    {
        $this->db = $dbu;
        $this->dbs = $dbs;
        $this->dbl = $dbl;
    }

    public function index()
    {
        if (Session::has('siswaAccess')) {
            // Session::pull('LogSession');
            Session::pull('adminAccess');
            $LogUser = $this->db->where('id', '=', Session::get('siswaAccess'))->first();
            $PEL = $this->dbl->distinct()->get(['nama_pelatihan']);
            $readDB = $this->dbs->select('nis','nama_siswa','pelatihan','created_at')->where('nis', '=', $LogUser->siswa_id)->distinct()->paginate(2);
            $value = [
                'value' => $readDB,
                'LogUser' => $LogUser,
                'PEL' => $PEL
            ];

            return view('siswa.datasiswa', $value);
        }
    }

    public function create(Request $reqData)
    {
        if (Session::has('siswaAccess')) {
            $LogUser = $this->db->where('id', '=', Session::get('siswaAccess'))->first();
            $DB_NULL = $this->dbs->select('pelatihan')->where('nis', '=', $LogUser->siswa_id)->where('pelatihan', '=', NULL)->distinct()->get();
            $DB_Search = $this->dbs->select('pelatihan')->where('nis', '=', $LogUser->siswa_id)->where('pelatihan', '=', $reqData->pelatihan)->distinct()->get();

            if ($DB_Search == $DB_NULL){
                $this->dbs->create([
                    'nis' => $LogUser->siswa_id,
                    'nama_siswa' => $LogUser->name,
                    'pelatihan' => $reqData->pelatihan
                ]);
                $msg = 'Anda berhasil menambahkan data pelatihan!!';
                return redirect()->route('data-siswa')->with('addSiswaNotif', $msg);
            } else {
                $msg = 'Data pelatihan anda sudah ada, harap selesaikan terlebih dahulu!!';
                return redirect()->route('data-siswa')->with('erroraddSiswaNotif', $msg);
            }
        }
    }
}
