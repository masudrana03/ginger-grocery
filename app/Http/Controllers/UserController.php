<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index');
    }

    public function allUsers(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'phone',
            4 => 'created_at',
            5 => 'id',
        ];

        $totalData = User::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $users = User::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        } else {
            $search = $request->input('search.value');

            $users =  User::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = User::where('id','LIKE',"%{$search}%")
                                ->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = [];

        if (!empty($users)) {
            foreach ($users as $user) {
                $edit   = route('users.edit',$user->id);
                $delete = route('users.destroy', $user->id);
                $token  = csrf_token();

                $nestedData['id']         = $user->id;
                $nestedData['name']       = $user->name;
                $nestedData['email']      = $user->email;
                $nestedData['phone']      = $user->phone;
                $nestedData['created_at'] = $user->created_at->format('d-m-Y');
                $nestedData['actions']    = "
                    &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                    &emsp;<a href='#' onclick='deleteUser({$user->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                    <form id='delete-form-{$user->id}' action='{$delete}' method='POST' style='display: none;'>
                    <input type='hidden' name='_token' value='{$token}'>
                    <input type='hidden' name='_method' value='DELETE'>
                    </form>
                    ";
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];

        echo json_encode($json_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        toast('User successfully created', 'success');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest $request
     * @param  \App\Models\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());

        toast('User successfully updated', 'success');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        toast('User successfully deleted', 'success');

        return redirect()->back();
    }

    /**
     * User profile
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = auth()->user();

        return view('backend.users.profile', compact('user'));
    }

    /**
     * Change user password
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('backend.users.change-password');
    }

    /**
     * Update user password
     *
     * @param PasswordUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function passwordUpdate(PasswordUpdateRequest $request)
    {
        $user = Auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            toast('Your Current password did not match', 'error');
            return back();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        toast('Password Successfully Changed', 'success');

        return back();
    }
}
