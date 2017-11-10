<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleInterface;
use App\Repositories\Permission\PermissionInterface;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $permissionRepository;

    public function __construct(RoleInterface $roleRepository, PermissionInterface $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }
    
    public function index()
    {
        $roles = $this->roleRepository->paginate(10);
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->permissionRepository->all();
        return view('role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $insertData = $request->only(['source', 'name']);

        $role = $this->roleRepository->create($insertData);

        $role->givePermissionsTo($request->source, $request->permissions);

        return redirect()->route('role.index')->with('message', 'Bạn đã thêm role thành công');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->find($id);
        $permissions = $this->permissionRepository->all();
        return view('role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $updateData = $request->only(['source', 'name']);
        $this->roleRepository->update($id, $updateData);

        $role = $this->roleRepository->find($id);
        $role->permissions()->detach();
        $role->givePermissionsTo($role->source, $request->permissions);

        return redirect()->back()->with('message','Bạn đã sửa role thành công');
    }

    public function destroy($id)
    {
        if($this->roleRepository->delete($id)) {
            return response()->json([
                'error' => false,
                'data' => null
            ]);
        }
    }
}
