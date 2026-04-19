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
            $NIS = $this->db->distinct()->get(['nis']);
            $NAMA = $this->db->distinct()->get(['nama_siswa']);
            $PEL = $this->dbl->distinct()->get(['nama_pelatihan']);
            if($reqdata->has('search')){
                $search = $this->db->where('nis','LIKE','%'.$reqdata->search.'%')->orWhere('nama_siswa', 'LIKE', '%'.$reqdata->search.'%')->orWhere('pelatihan', 'LIKE', '%'.$reqdata->search.'%')->orWhere('created_at', 'LIKE', '%' . $reqdata->search . '%');
                $searchData = $search->paginate(5);
                $data = [
                    'data' => $searchData,
                    'NIS' => $NIS,
                    'NAMA' => $NAMA,
                    'PEL' => $PEL
                ];
            } else{
                $readDB = $this->db->paginate(5);
                $data = [
                    'data' => $readDB,
                    'NIS' => $NIS,
                    'NAMA' => $NAMA,
                    'PEL' => $PEL
                ];
            }
            return view('admin.datapelatihan', $data);
        }
    }

    public function create(Request $reqdata)
    {
        if (Session::has('adminAccess')) {
            $DB_NULLnis = $this->db->select('pelatihan')->where('nis', '=', $reqdata->nis)->where('pelatihan', '=', NULL)->distinct()->get();
            $DB_NULLnama = $this->db->select('pelatihan')->where('nama_siswa', '=', $reqdata->nama_siswa)->where('pelatihan', '=', NULL)->distinct()->get();
            $DB_SearchNIS = $this->db->select('pelatihan')->where('nis', '=', $reqdata->nis)->where('pelatihan', '=', $reqdata->pelatihan)->distinct()->get();
            $DB_SearchNama = $this->db->select('pelatihan')->where('nama_siswa', '=', $reqdata->nama_siswa)->where('pelatihan', '=', $reqdata->pelatihan)->distinct()->get();
            if ($DB_SearchNIS == $DB_NULLnis) {
                if ($DB_SearchNama == $DB_NULLnama) {
                    $this->db->create([
                        'nis' => $reqdata->nis,
                        'nama_siswa' => $reqdata->nama_siswa,
                        'pelatihan' => $reqdata->pelatihan
                    ]);
                    $msg = ' Selamat anda berhasil menambahkan data siswa!!';
                    return redirect()->route('data-pelatihan')->with('addAdminNotif', $msg);
                }
                $msg = ' Selamat anda berhasil menambahkan data siswa!!';
                return redirect()->route('data-pelatihan')->with('addAdminNotif', $msg);
            } else {
                $msg = 'Data pelatihan anda sudah ada, harap selesaikan terlebih dahulu!!';
                return redirect()->route('data-pelatihan')->with('errorCreateAdminNotif', $msg);
            }
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
                $msg = ' Selamat anda berhasil mengubah data siswa!!';
                return redirect()->route('data-pelatihan')->with('updateAdminNotif', $msg);
            }
            $msg = 'Data pelatihan anda sudah ada, harap selesaikan terlebih dahulu!!';
            return redirect()->route('data-pelatihan')->with('errorUpdateAdminNotif', $msg);
        } else {
            $msg = 'Data pelatihan anda sudah ada, harap selesaikan terlebih dahulu!!';
            return redirect()->route('data-pelatihan')->with('errorUpdateAdminNotif', $msg);
        }
    }

    public function delete($id)
    {
        $findID = $this->db->find($id);
        $findID->delete();
        $this->db->reset();
        $msg = ' Selamat anda berhasil menghapus data siswa!!';
        return redirect()->route('data-pelatihan')->with('deleteAdminNotif', $msg);
    }
}
