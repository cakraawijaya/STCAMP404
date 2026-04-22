<?php

namespace App\Http\Controllers;

use App\Models\DBS as DBS;
use App\Models\DBU as DBU;
use App\Models\PEL as PEL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct(DBS $db, DBU $dbu, PEL $dbl)
    {
        $this->db = $db;
        $this->dbu = $dbu;
        $this->dbl = $dbl;
    }

    public function index(Request $reqdata)
    {
        if (Session::has('adminAccess')) {
            // Session::pull('LogSession');
            Session::pull('siswaAccess');
            $NIS = $this->dbu->where('role', 'siswa')->whereNotNull('siswa_id')->get(['siswa_id', 'name']);
            $PEL = $this->dbl->distinct()->get(['nama_pelatihan']);
            if ($reqdata->has('search')) {
                $search = $this->db->where('nis','LIKE','%'.$reqdata->search.'%')->orWhere('nama_siswa', 'LIKE', '%'.$reqdata->search.'%')->orWhere('pelatihan', 'LIKE', '%'.$reqdata->search.'%')->orWhere('created_at', 'LIKE', '%' . $reqdata->search . '%');
                $searchData = $search->paginate(5);
                if ($searchData->count() > 0) {
                    Session::flash('searchFoundNotif', 'Data ditemukan (sebanyak '.$searchData->total().' data) !!');
                }
                $data = [
                    'data' => $searchData,
                    'NIS' => $NIS,
                    'PEL' => $PEL
                ];
            } else {
                $readDB = $this->db->paginate(5);
                $data = [
                    'data' => $readDB,
                    'NIS' => $NIS,
                    'PEL' => $PEL
                ];
            }
            return view('admin.datapelatihan', $data);
        }
    }

    public function create(Request $reqdata)
    {
        if (Session::has('adminAccess')) {

            $user = $this->dbu->where('siswa_id', $reqdata->nis)->first();

            if (!$user) {
                return redirect()->route('data-pelatihan')->with('errorCreateAdminNotif', 'NIS tidak ditemukan !!');
            }

            $cek = $this->db
                ->where('nis', $reqdata->nis)
                ->where('pelatihan', $reqdata->pelatihan)
                ->first();

            if ($cek) {
                return redirect()->route('data-pelatihan')->with('errorCreateAdminNotif', 'Data pelatihan sudah ada !!');
            }

            $this->db->create([
                'nis' => $reqdata->nis,
                'nama_siswa' => $user->name,
                'pelatihan' => $reqdata->pelatihan
            ]);

            return redirect()->route('data-pelatihan')->with('addAdminNotif', 'Berhasil menambahkan data siswa !!');
        }
    }

    public function update(Request $reqdata, $id)
    {
        $DB_NULLnis = $this->db->select('pelatihan')->where('nis', '=', $reqdata->nis)->where('pelatihan', '=', NULL)->distinct()->get();
        $DB_NULLnama = $this->db->select('pelatihan')->where('nama_siswa', '=', $reqdata->nama_siswa)->where('pelatihan', '=', NULL)->distinct()->get();
        $DB_SearchNIS = $this->db->select('pelatihan')->where('nis', '=', $reqdata->nis)->where('pelatihan', '=', $reqdata->pelatihan)->distinct()->get();
        $DB_SearchNama = $this->db->select('pelatihan')->where('nama_siswa', '=', $reqdata->nama_siswa)->where('pelatihan', '=', $reqdata->pelatihan)->distinct()->get();
        if ($DB_SearchNIS == $DB_NULLnis) {
            if ($DB_SearchNama == $DB_NULLnama) {
                $findID = $this->db->find($id);
                $findID->update($reqdata->all());
                $msg = ' Berhasil mengubah data siswa !!';
                return redirect()->route('data-pelatihan')->with('updateAdminNotif', $msg);
            }
            $msg = 'Data pelatihan sudah ada !!';
            return redirect()->route('data-pelatihan')->with('errorUpdateAdminNotif', $msg);
        } else {
            $msg = 'Data pelatihan sudah ada !!';
            return redirect()->route('data-pelatihan')->with('errorUpdateAdminNotif', $msg);
        }
    }

    public function delete($id)
    {
        $findID = $this->db->find($id);
        $findID->delete();
        $this->db->reset();
        $msg = ' Berhasil menghapus data siswa !!';
        return redirect()->route('data-pelatihan')->with('deleteAdminNotif', $msg);
    }
}