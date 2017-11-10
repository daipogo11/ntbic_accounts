<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Permission\PermissionInterface;

class PermissionController extends Controller
{
    protected $permissionRepository;

    public function __construct(PermissionInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository; 
    }

    public function index()
    {
        $permissions = $this->permissionRepository->paginate(10);
        return view('permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $this->permissionRepository->insert([
            'source' => $request->source,
            'name' => $request->name
        ]);

        return redirect()->route('permission.index')->with('message','Bạn đã thêm permission thành công');
    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);
        return view('permission.edit', compact('permission'));
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
        $updateData = $request->only(['source', 'name']);

        if($this->permissionRepository->update($id, $updateData)) {
            return redirect()->back()->with('message','Bạn đã sửa permission thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->permissionRepository->delete($id)) {
            return response()->json([
                'error' => false,
                'data' => null
            ]);
        }
    }
}
