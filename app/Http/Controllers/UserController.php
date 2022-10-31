<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, $id)
    {
        $findUser = $user::find($id);

        return response()->json([
            'data' => $findUser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateUser = $request->validate([
            'name' => 'required|max:150',
            'email' => 'required|email:dns|unique:users',
            'birthdate' => 'required|min:6|max:100',
            'phone' => 'required|min:11|max:13',
            'password' => 'required|min:8|max:16',
            'address' => 'required|max:255',
            'profile' => 'image|file|max:1024',
        ]);

        if($request->role){
            $validateUser['is_Admin'] = 1;
        }else{
            $validateUser['is_Admin'] = 0;
        };

        if($request->file('profile')){
            $validateUser['profile'] = $request->file('profile')->store('img-profile');
        }else{
            $validateUser['profile'] = '';
        };

        $newUser = [
            'user_id' => 'A-00' . rand(1, 999),
            'name' => $validateUser['name'],
            'email' => $validateUser['email'],
            'birthdate' => $validateUser['birthdate'],
            'phone' => $validateUser['phone'],
            'gender' => $request->gender,
            'password' => Hash::make($validateUser['password']),
            'address' => $validateUser['address'],
            'profile' => $validateUser['profile'],
            'is_Admin' => $validateUser['is_Admin'],
        ];

        User::create($newUser);
        
        if(Auth::user()){
            if($request->role){
                Alert::success('Selamat', 'Pendaftaran Admin Berhasil. Silahkan Login!');
                return redirect('/admin/list-admin');
            }
            Alert::success('Selamat', 'Pendaftaran Akun Berhasil. Silahkan Login!');
            return redirect('/admin/list-anggota');
        }

        Alert::success('Selamat', 'Pendaftaran Akun Berhasil. Silahkan Login!');
        return redirect('/register');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users = $user::where('is_Admin', 0)->get();
        return view('admin.member', ['users' => $users]);
    }

    public function showAdmin(User $user)
    {
        $admin = $user::where('is_Admin', 1)->where('id', '!=' , Auth::user()->id)->get();
        return view('admin.admin', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->accountId){
            $validateUser= $request->validate([
                'adminName' => 'required|max:150',
                'adminBirth' => 'required',
                'adminPhone' => 'required|min:11|max:13',
                'adminAddress' => 'required|max:255',
                'adminProfile' => 'image|file|max:1024',
            ]);
            $editUser = [
                'name' => $validateUser['adminName'],
                'email' => $request->adminEmail,
                'birthdate' => $validateUser['adminBirth'],
                'phone' => $validateUser['adminPhone'],
                'gender' => $request->adminGender,
                'address' => $validateUser['adminAddress'],
            ];
            if($request->adminProfile){
                if(Auth::user()->profile){
                    Storage::delete(Auth::user()->profile);
                }
                $editUser['profile'] = $request->file('adminProfile')->store('img-profile');
            }
    
            $user::where('id', Auth::user()->id)->update($editUser);

            Alert::success('Selamat', 'Data Akun Berhasil Diubah.');
            return redirect('/admin/settings');
        }
        else if($request->passId){
            $validatePass= $request->validate([
                'newPass' => 'required|min:8|max:16',
                'newPassConfirm' => 'required|min:8|max:16',
                'oldPass' => 'required|min:8|max:16',
                'oldPassConfirm' => 'required|min:8|max:16',
            ]);
            if(Hash::check($validatePass['oldPass'], Auth::user()->password)){
                $user::where('id', Auth::user()->id)->update([
                    'password' => Hash::make($validatePass['newPass'])
                ]);

                Alert::success('Selamat', 'Password Berhasil Diubah.');
                return redirect('/admin/settings');
            }
            Alert::error('Gagal', 'Password Gagal Diubah.');
                return redirect('/admin/settings');
        }
        else{
            $validateUser= $request->validate([
                'edit_name' => 'required|max:150',
                'edit_birthdate' => 'required',
                'edit_phone' => 'required|min:11|max:13',
                'edit_address' => 'required|max:255',
                'edit_profile' => 'image|file|max:1024',
            ]);
    
            $editUser = [
                'name' => $validateUser['edit_name'],
                'email' => $request->edit_email,
                'birthdate' => $validateUser['edit_birthdate'],
                'phone' => $validateUser['edit_phone'],
                'gender' => $request->edit_gender,
                'address' => $validateUser['edit_address'],
            ];
    
            if($request->edit_profile){
                if($request->old_profile){
                    Storage::delete($request->old_profile);
                }
                $editUser['profile'] = $request->file('edit_profile')->store('img-profile');
            }
    
            $user::where('id', $request->edit_id)->update($editUser);
    
            if(Auth::user()){
                if($request->edit_role){
                    Alert::success('Selamat', 'Data Admin dengan Nomor ' . $request->edit_userid . ' Berhasil Diubah.');
                    return redirect('/admin/list-admin');
                }
                Alert::success('Selamat', 'Data Anggota dengan Nomor ' . $request->edit_userid . ' Berhasil Diubah.');
                return redirect('/admin/list-anggota');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        $user::destroy($request->del_id);
        History::where('id_user', $request->del_id)->delete();
        Storage::delete($request->del_profile);
        if($request->del_role){
            Alert::success('Selamat', 'Data Admin dengan Nomor ' . $request->del_userid . ' Berhasil Dihapus.');
            return redirect('/admin/list-admin');
        }
        Alert::success('Selamat', 'Data Anggota dengan Nomor ' . $request->del_userid . ' Berhasil Dihapus.');
        return redirect('/admin/list-anggota');
    }

    public function adminSet()
    {
        return view('admin.settings');
    }
}
