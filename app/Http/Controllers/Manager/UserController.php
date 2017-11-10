<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use App\Repositories\Role\RoleInterface;
use App\Repositories\Permission\PermissionInterface;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserInterface $userRepository, RoleInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $users = $this->userRepository->paginate(10);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/users".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/users",$hinh_anh);
        }
        else{
            $hinh_anh = "";
        }

        $user = $this->userRepository->create([
            'email' => $request->email,
            'name' => $request->name,
            'hinh_anh' => $hinh_anh,
            'password' => bcrypt('123456')
        ]);

        foreach ($request->roles as $roleId) {
            $role = $this->roleRepository->find($roleId);
            $user->assignRoles($role->source, $role->name);
        }

        return redirect()->route('users.index')->with('message', 'Bạn đã thêm user thành công');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $roles = $this->roleRepository->all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $duoi = $file->getClientOriginalExtension();

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(4)."_".$name;
            while(file_exists("assets/upload/users".$hinh_anh)){
                $hinh_anh = str_random(4)."_".$name;
            }
            $file->move("assets/upload/users",$hinh_anh);
        }
        else{
            $hinh_anh = "";
        }

        $updateData = [
            'email' => $request->email,
            'name' => $request->name,
            'hinh_anh' => $hinh_anh,
        ];

        $this->userRepository->update($id, $updateData);

        $user = $this->userRepository->find($id);
        $user->roles()->detach();
        foreach ($request->roles as $roleId) {
            $role = $this->roleRepository->find($roleId);
            $user->assignRoles($role->source, $role->name);
        }

        return redirect()->back()->with('message','Bạn đã sửa user thành công');
    }

    public function destroy($id)
    {
        if($this->userRepository->delete($id)) {
            return response()->json([
                'error' => false,
                'data' => null
            ]);
        }
    }
}
