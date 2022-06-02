<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;

use App\User;
use App\http\Requests\Admin\UserStoreRequest;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = User::where('role', 'admin')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    $pic = $row->photo ?? 'https://ui-avatars.com/api/?name='.$row->name;
                    return $photo = '<img src="'.$pic .'" class="img-circle" alt="User Image" style="height: 30px; width: 30px;">';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('status', function ($row) {
                    if($row->status === 'active') {
                        return '<span class="badge badge-success">'.$row->status.'</span>';
                    } else {
                        return '<span class="badge badge-danger">'.$row->status.'</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    if($row->id != auth()->user()->id) {
                        $edit = '<a href="'.route('admin.admins.edit', $row->id).'" class="btn btn-default btn-sm"><i class="fas fa-edit"></i> </a>'; 
                        $delete = '<a href="javascript:void(0)" onclick="delete_admin('.$row->id.')" class="btn btn-default btn-sm mx-2"><i class="fas fa-trash"></i></a>';
                        return $edit.$delete;
                    }
                })
                ->rawColumns(['photo', 'status', 'action'])
                ->make(true);
        }
        return view('_admin.account.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_admin.account.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $data               = $request->all();
        $data['password']   = bcrypt($request->password);
        User::create($data);
        
        Alert::success('Sukses', 'Data admin berhasil ditambahkan');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('_admin.account.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $admin->update(['status' => $request->status]);   

        Alert::success('Sukses', 'Data admin berhasil diperbaharui');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
