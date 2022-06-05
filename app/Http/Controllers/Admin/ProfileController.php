<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\User;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        //dd($profile->id);
        return view('_admin.profile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, User $profile)
    {
        $profile->update($request->validated());
        
        Alert::success('Sukses', 'Profile berhasil diperbaharui');
        return redirect()->route('admin.profile.edit', $profile->id);
    }
}
