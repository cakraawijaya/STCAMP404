<?php

namespace App\Http\Controllers;
use App\Models\DBU as DBU;
use App\Models\DBS as DBS;
use App\Models\DBRS as RS;
use App\Http\Requests\REQSTCAMP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    public function __construct(DBU $dbu, DBS $dbs, RS $rs)
    {
        $this->db = $dbu;
        $this->dbs = $dbs;
        $this->rs = $rs;
    }

    public function index()
    {
        return view('index');
    }

    public function home()
    {
        if (Session::has('LogSession')) {
            $LogUser = $this->db->where('id', '=', Session::get('LogSession'))->first();
            $Data = [
                'LogUser' => $LogUser
            ];
            return view('index', $Data);
        }
    }

    public function infokegiatan()
    {
        return view('general.infokegiatan');
    }

    public function register()
    {
        $Usercount = $this->db->count();
        if ($Usercount == null){
            $count = '1';
        } else {
            $count = $Usercount;
        }
        $IDS = [
            'defid' => '20220100',
            'jumlah' => $count
        ];
        return view('general.registrasi', $IDS);
    }

    public function login(Request $reqData){   
        $user = $this->db->where('email', '=', $reqData->email)->first();
        if($user){
            if(Hash::check($reqData->password, $user->password)){
                $reqData->session()->put('LogSession', $user->id);
                $reqData->session()->put('adminAccess', $user->id);
                $reqData->session()->put('siswaAccess', $user->id);
                $msg = " Anda berhasil masuk, selamat datang di menu utama STCAMP404!!";
                return redirect()->route('dashboardaccount')->with('LoginNotif', $msg);
            } else{
                return redirect()->route('index')->with('loginError', 'Data tidak ditemukan, silakan registrasi terlebih dahulu.');
            }
        } else{
            return redirect()->route('index')->with('loginError', 'Data tidak ditemukan, silakan registrasi terlebih dahulu.');
        }
    }

    public function dashboardaccount()
    {
        if (Session::has('LogSession')) {
            $LogUser = $this->db->where('id', '=', Session::get('LogSession'))->first();
            $IdPelUser = $this->dbs->where('id', '=', Session::get('LogSession'))->get();
            $PelUser = $this->dbs->select('pelatihan')->where('nis', '=', $LogUser->siswa_id)->distinct()->get();
            $PelUser_NULL = $this->dbs->select('pelatihan')->where('nis', '=', $LogUser->siswa_id)->where('pelatihan', '=', NULL)->distinct()->get();
            $CountBootstrap8 = $this->dbs->where('pelatihan', 'Bootstrap 5')->count();
            $CountGit = $this->dbs->where('pelatihan', 'Git')->count();
            $CountLaravel8 = $this->dbs->where('pelatihan', 'Laravel 8')->count();
            $CountCodeigniter4 = $this->dbs->where('pelatihan', 'Codeigniter 4')->count();

            $Data = [
                'Cbt' => $CountBootstrap8,
                'Cgt' => $CountGit,
                'Clr' => $CountLaravel8,
                'Cci' => $CountCodeigniter4,
                'LogUser' => $LogUser,
                'IdPelUser' => $IdPelUser,
                'PelUser' => $PelUser,
                'PelUser_NULL' => $PelUser_NULL
            ];

            return view('general.dashboard', $Data);
        }
    }

    public function updprofile(Request $reqdata)
    {
        $UpData = $this->db->where('id', '=', Session::get('LogSession'))->first();

        $dataUpdate = [
            'siswa_id' => $reqdata->siswa_id,
            'name' => $reqdata->name,
            'email' => $reqdata->email,
        ];

        if (!empty($reqdata->password)) {
            $dataUpdate['password'] = bcrypt($reqdata->password);
        }

        if ($reqdata->hasFile('image')) {
            $dataUpdate['image'] = $reqdata->file('image')->move(
                'asset/img/profile', 
                $reqdata->file('image')->getClientOriginalName()
            );
        } else {
            $dataUpdate['image'] = $UpData->image;
        }

        $UpData->update($dataUpdate);

        $msg = 'Selamat anda berhasil mengubah data profil!!';
        return redirect()->route('dashboardaccount')->with('updateProfileNotif', $msg);
    }

    public function logout(){
        if (Session::has('LogSession')) {
            Session::pull('LogSession');
            $msg = " Anda telah berhasil keluar dari segala bentuk aktivitas!!";
            return redirect()->route('index')->with('LogoutNotif', $msg);   
        }
    }

    public function regUser(REQSTCAMP $reqData)
    {   
        $validated = $reqData->validated();
        if($validated){
            $this->db->create([
                'siswa_id' => $reqData->siswa_id,
                'name' => $reqData->name,
                'email' => $reqData->email,
                'password' => bcrypt($reqData->password),
                'image' => $reqData->image
            ]);

            $msg = ' Selamat anda berhasil melakukan registrasi!!';
            return redirect()->route('registrasi')->with('registerNotif', $msg);
        }
    }

    public function forgetUser()
    {
        return view('general.forget');
    }

    public function forgetProcess(Request $reqData)
    {
        $count = $this->rs->count();
        $email = $this->db->select('email')->where('email', '=', $reqData->email)->distinct()->get();
        $emailNULL = $this->db->select('email')->where('email', '=', NULL)->distinct()->get();
        if($email != $emailNULL){
            $this->rs->create([
                'email' => $reqData->email,
                'token' => bcrypt($count),
                'created_at' => $reqData->created_at,
                'updated_at' => $reqData->updated_at
            ]);
            return redirect()->route('resetUser')->with('email', $reqData->email);
        } else {
            $msg = ' Email yang anda masukkan salah atau belum terdaftar!!';
            return redirect()->route('forgetUser')->with('forgetFailNotif', $msg);
        }
    }

    public function resetUser()
    {
        $email = session('email');

        if (!$email) {
            return redirect()->route('forgetUser');
        }

        $EmailReset = $this->rs->where('email', '=', $email)->first();

        return view('general.reset', ['data' => $EmailReset]);
    }

    public function resetProcess(Request $reqData)
    {
        if ($reqData->password !== $reqData->password_confirmation) {
            $msg = 'Password tidak sama !';
            return redirect()->route('resetUser')->with('resetFailNotif', $msg)->with('email', $reqData->email);
        }

        $validated = $this->db->where('email', '=', $reqData->email)->first();

        if (!$validated) {
            $msg = ' Anda gagal melakukan reset password, harap coba lagi!!';
            return redirect()->route('resetUser')->with('resetFailNotif', $msg);
        } else {
            $validated->update([
                'password' => bcrypt($reqData->password)
            ]);
            $tempresetPassword = $this->rs->select('email')->where('email', '=', $reqData->email);
            $tempresetPassword->delete();
            $msg = ' Selamat anda berhasil melakukan reset password!!';
            return redirect()->route('index')->with('ResetPassNotif', $msg);
        }        
    }
}