<?php

namespace App\Http\Controllers;
use App\Models\DBU as DBU;
use App\Models\DBS as DBS;
use App\Models\DBRS as RS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $LogUser = null;

        if (Session::has('LogSession')) {
            $LogUser = $this->db->where('id', Session::get('LogSession'))->first();
        }

        return view('index', compact('LogUser'));
    }

    public function home()
    {
        $LogUser = null;

        if (Session::has('LogSession')) {
            $LogUser = $this->db->where('id', Session::get('LogSession'))->first();
        }

        return view('index', compact('LogUser'));
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

    public function login(Request $reqData)
    {   
        $reqData->validate(['email' => 'required|email', 'password' => 'required']);
        $user = $this->db->where('email', '=', $reqData->email)->first();
        if(!$user){
            return redirect()->route('index')->withErrors(['email_login' => 'error', 'password_login' => 'error'])->withInput();
        }
        if(!Hash::check($reqData->password, $user->password)){
            return redirect()->route('index')->withErrors(['password_login' => 'error'])->withInput();
        }
        $reqData->session()->put('LogSession', $user->id);
        $reqData->session()->put('adminAccess', $user->id);
        $reqData->session()->put('siswaAccess', $user->id);
        $msg = "Anda berhasil masuk, selamat datang di menu utama STCAMP404 !!";
        return redirect()->route('dashboardaccount')->with('LoginNotif', $msg);
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
            'email' => strtolower($reqdata->email)
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

        $msg = 'Selamat anda berhasil mengubah data profil !!';
        return redirect()->route('dashboardaccount')->with('updateProfileNotif', $msg);
    }

    public function logout(){
        if (Session::has('LogSession')) {
            Session::pull('LogSession');
            $msg = " Anda telah berhasil keluar dari segala bentuk aktivitas !!";
            return redirect()->route('index')->with('LogoutNotif', $msg);   
        }
    }

    public function regUser(Request $reqData)
    {
        $validator = Validator::make($reqData->all(), [
            'name' => [
                'required',
                'min:3',
                function ($attribute, $value, $fail) {
                    $exists = $this->db->whereRaw('LOWER(name) = ?', [strtolower($value)])->exists();

                    if ($exists) {
                        $fail('error');
                    }
                },
            ],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->route('registrasi')->withErrors($validator)->withInput();
        }

        $this->db->create([
            'siswa_id' => $reqData->siswa_id,
            'name' => $reqData->name,
            'email' => strtolower($reqData->email),
            'password' => bcrypt($reqData->password),
            'image' => $reqData->image
        ]);

        return redirect()->route('registrasi')->with('registerNotif', 'Selamat anda berhasil melakukan registrasi !!');
    }

    public function forgetUser()
    {
        return view('general.forget');
    }

    public function forgetProcess(Request $reqData)
    {
        $validator = Validator::make($reqData->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->route('forgetUser')->withErrors($validator)->withInput();
        }

        $user = $this->db->where('email', '=', $reqData->email)->first();

        if (!$user) {
            return redirect()->route('forgetUser')->withErrors(['email_forget' => 'error'])->withInput();
        }

        $count = $this->rs->count();

        $this->rs->create([
            'email' => strtolower($reqData->email),
            'token' => bcrypt($count),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('resetUser')->with('email', $reqData->email);
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
        $validator = Validator::make($reqData->all(), [
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->route('resetUser')->withErrors($validator)->with('email', $reqData->email);
        }

        $user = $this->db->where('email', '=', $reqData->email)->first();

        if (!$user) {
            return redirect()->route('resetUser')->withErrors([
                'password' => 'error',
                'password_confirmation' => 'error'
            ])->with('email', $reqData->email);
        }

        if (Hash::check($reqData->password, $user->password)) {
            return redirect()->route('resetUser')->withErrors([
                'password' => 'error'
            ])->with('email', $reqData->email);
        }

        $user->update(['password' => bcrypt($reqData->password)]);
        $this->rs->where('email', '=', $reqData->email)->delete();
        return redirect()->route('index')->with('ResetPassNotif', 'Berhasil reset password !!');
    }
}