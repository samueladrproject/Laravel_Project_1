<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Ubah Password',
            'namaPage' => 'Ubah Password',
            'iconPage' => 'fas fa-lock'
        ];

        return view('backend.pages.ubahpassword', $datas);
    }

    public function changePassword(Request $request)
    {
        $validateReq = $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required|required_with:newrepassword|same:newrepassword',
            'newrepassword' => 'required',
        ]);

        $idUser = Auth::id();

        $dataUser = User::find($idUser);

        if (!(Hash::check($validateReq['oldpassword'], Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($validateReq['oldpassword'], $validateReq['newpassword']) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $dataUser->password = bcrypt($validateReq['newpassword']);
        $dataUser->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }
}
