<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Email;
use App\Models\Admin\Ip;
use App\Models\Admin\Phone;
use App\Models\Admin\Region;
use App\Models\Admin\Role;
use App\Models\Admin\RoleUser;
use App\Models\Admin\Specialization;
use App\Models\Admin\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::getAllRegions();
        $specs = Specialization::getAllSpecs();
        $statuses = Status::getAllSattuses();
        $roles = Role::getAllRolesWithoutSuperadmin();

        return view('admin.users.create', compact('regions', 'specs', 'statuses', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'user_type' => 'required|in:Исполнитель,Заказчик',
            'login' => 'required|unique:users,login',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:3|max:50',
            'avatar' => 'nullable|mimes:jpeg,jpg,png|max:4096',
            'password' => 'required|min:6|confirmed',
            'region' => 'nullable|exists:regions,id',
            'city' => 'nullable|exists:cities,id',
            'birthday' => 'nullable|date',
            'gender' => 'required|in:Мужчина,Женщина',
            'specialization' => 'nullable|exists:specializations,id',
            'status' => 'required|exists:statuses,id',
            'roles' => 'required',
            'roles.*' => 'exists:roles,id',
        ]);
        if ($validator->fails() || in_array('1', $request->roles)) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('avatar')) {
            $image_url = User::resizeAvatar($request->file('avatar'));
        } else {
            $image_url = null;
        }

        $user = User::create([
            'user_type' => $request->user_type,
            'login' => $request->login,
            'email' => $request->email,
            'name' => $request->name,
            'surname' => $request->surname,
            'midname' => $request->midname,
            'password' => Hash::make($request->password),
            'city_id' => $request->city,
            'street' => $request->street,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'specialization_id' => $request->user_type == 'Исполнитель' ? $request->specialization : null,
            'status_id' => $request->status,
            'status_desc' => $request->status_desc,
            'icq' => $request->icq,
            'skype' => $request->skype,
            'site' => $request->site,
            'show_info' => $request->show_info ? true : false,
            'about' => $request->about,
            'new_messages' => $request->new_messages ? true : false,
            'new_orders_offers' => $request->new_orders_offers ? true : false,
            'avatar' => $image_url,
            'last_activity' => Carbon::now()->format('Y-m-d h:i:s'),
        ]);

        if (isset($request->phones)) {
            foreach ($request->phones as $phone) {
                if ($phone) {
                    Phone::create([
                        'phone' => $phone,
                        'user_id' => $user->id,
                    ]);
                }
            }
        }

        if (isset($request->emails)) {
            foreach ($request->emails as $email) {
                if ($email) {
                    Email::create([
                        'email' => $email,
                        'user_id' => $user->id,
                    ]);
                }
            }
        }

        foreach ($request->roles as $role) {
            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => $role,
            ]);
        }

        Ip::create([
            'user_id' => $user->id,
            'ip' => request()->ip()
        ]);

        return redirect()->route('users.index')->with('success', 'Пользователь создан');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    public function showAvatar(Request $request) {
////        $extension = $request->file('avatar')->getClientOriginalExtension();
////        $dir = 'uploads/avatar/';
////        $filename = uniqid() . '_' . time() . '.' . $extension;
////        $request->file('avatar')->move($dir, $filename);
//
//        $folder = date('Y-m-d');
//        $filename = $request->file('avatar')->store("/uploads/avatar/{$folder}");
//
//        return asset($filename);
//    }
}
