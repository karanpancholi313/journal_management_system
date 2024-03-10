<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Make sure to import Laravel's base controller
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Auth;

class RolesController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Role = new Role();
    }    

    public function index(Request $request)
    {        
        $results = $this->Role->GetRoles($request);
        $data['results'] = $results;
        $data['seo_title'] = 'Roles';
        $data['ispage'] = 'roles';
        return view('admin.roles.list', $data);
    }
    
    public function add_new(Request $request)
    {
        $data['seo_title'] = 'Add Role';
        $data['ispage'] = 'roles';
        return view('admin.roles.add-new', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' =>  ['required', Rule::unique('Roles')->where('title', $request->title)],
                'status' => 'required|in:1,2'
            ],
            [
                'title.required' => 'The field is required.',
                'status.required' => 'The field is required.',
                'status.in' => 'Please select valid status.'
            ]
        );
        $DataInsert = [
            'title' => ($request->title) ? htmlspecialchars($request->title) : NULL,
            'status' => ($request->status) ? htmlspecialchars($request->status) : NULL,
            'created_at' =>  date('Y-m-d H:i:s')
		];
        if(Role::CreateRole($DataInsert)){
            return redirect('admin/roles')->with('success', 'Role created successfully.');
		}else{
			return redirect('admin/roles')->with('error', 'Somthing wrong, Try again');
		}
    }

    public function edit(Request $request, $id)
    {
        $GetRoleByID = Role::GetRoleByID($request, $id);
		if(empty($GetRoleByID)){
			abort(401);
		}
        $data['role'] = $GetRoleByID;
        $data['seo_title'] = 'Edit Role';
        $data['ispage'] = 'roles';
        return view('admin.roles.add-new', $data);
    }

    public function update(Request $request, $id)
    {
        $GetRoleByID = Role::GetRoleByID($request, $id);
		if(empty($GetRoleByID)){
			abort(401);
		}
        $validated = $request->validate(
            [
                'title' =>  ['required', Rule::unique('Roles')->where('title', $request->title)->ignore($id, 'id')],
                'status' => 'required|in:1,2',
            ],
            [
                'title.required' => 'The field is required.',
                'status.required' => 'The field is required.',
                'status.in' => 'Please select valid status.'
            ]
        );
        $DataInsert = [
            'title' => ($request->title) ? htmlspecialchars($request->title) : NULL,
            'status' => ($request->status) ? htmlspecialchars($request->status) : NULL,
            'updated_at' =>  date('Y-m-d H:i:s')
		];
        if(Role::UpdateRole($id, $DataInsert)){
            return redirect('admin/roles')->with('success', 'Role has been updated successfully.');
		}else{
			return redirect('admin/roles')->with('error', 'Somthing wrong, Try again');
		}
    }

    public function destroy(Request $request, $id)
    {
        $GetRoleByID = Role::GetRoleByID($request, $id);
		if(empty($GetRoleByID)){
			abort(401);
		}
		try {
			Role::DeleteRole($id);
			return redirect()->back()->with('success', 'Role deleted successfully.');
		} catch (\Illuminate\Database\QueryException $e) {
			if($e->getCode() == "23000"){ //23000 is sql code for integrity constraint violation
				// return error to user here
				return redirect()->back()->with('error', 'You can not delete a master record if child records exist.');
			}else{
				return redirect()->back()->with('error', 'Something went wrong try again.');
			}
		}
    }

 

}
