<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\permissionRepositoryInterface;
use App\Http\controllers\Backend\BackendController;

class PermissionController extends Controller
{
    protected $permission;

    public function __construct(permissionRepositoryInterface $permission)
    {
        $this->middleware([
            'permission:permissions-read', 
            'permission:permissions-create',
            'permission:permissions-edit' , 
            'permission:permissions-delete'
        ]);

        return $this->permission = $permission;
    }

    public function view()
    {
        return $this->permission->view();
        
    }
    
    public function create()
    {
        return $this->permission->create();
    }

    public function store(PermissionRequest $request)
    {
        return $this->permission->insert($request);
    }
    public function edit(Request $request)
    {
        return $this->permission->edit($request);
    }
    public function update(Request $request)
    {
        return $this->permission->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->permission->destroy($request);
    }

   
}
