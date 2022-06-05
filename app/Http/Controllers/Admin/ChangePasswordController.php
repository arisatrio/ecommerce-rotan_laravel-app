<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

use App\Http\Requests\Admin\ChangePasswordRequest;
use App\User;

class ChangePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ChangePasswordRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'password'  => bcrypt($request->password),
        ]);

        Alert::success('Sukses', 'Password berhasil diperbaharui');
        return redirect()->route('admin.profile.edit', $user->id);
    }
}
