<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Jmsuser;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Validator;
use Auth;
class JmsUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Jmsuser = new Jmsuser();
    }

   
    public function index(Request $request)
    {

        $results = $this->Jmsuser->GetJmsusers($request);
       dd($results);
        $data['results'] = $results;
        $data['seo_title'] = 'Editers';
        $data['ispage'] = 'editers';
        return view('admin.editers.list', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['seo_title'] = 'Editer Add';
        $data['ispage'] = 'editers';
        try {
            return view('admin.editers.add-new',$data);
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', ERROR_MSG);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                // 'phone' => 'required|regex:/^[(]?\d{3}[)]?[(\s)?.-]\d{3}[\s.-]\d{4}$/',
                'name' => 'required|max:255',
                'role' => 'required',
                'email' => 'required|email|max:255|unique:jmsusers,email',
                'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,20}$/',
                'confirm_password' => 'required|same:password',
                'image' => 'file|mimes:jpeg,jpg,png,bmp,svg|max:2048',
            ],
            [
                'phone.required' => 'The field is required.',
                'name.required' => 'The field is required.',
                'email.required' => 'The field is required.',
                'role.required' => 'The field is required.',
                'password.required' => 'The field is required.',
                'image.file' => 'Uploed Image format jpeg,jpg,png,bmp,svg max:2048.',
                'password.regex' => 'The password should be 8-20 characters, with at least one uppercase letter, one lowercase letter, one number and one special character @ $ ! % * ? & #',
                'confirm_password.required' => 'The field is required.',
                'confirm_password.same' => 'The password and confirm password do not match.',
            ]
        );

        $original_path = '';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            $originalname = $file->getClientOriginalName();
            $file_name = uniqid() . "_" . $originalname;
            $file->storeAs('public/uploads/users/' .$file_name);
            $original_path = $file_name;

        }
        try {
            $user = new Jmsuser;
            $user->name = $request->name;
            $user->roles = $request->role;
            $user->email = $request->email;
            $user->mobile = $request->phone;
            $user->address = $request->address;
            $user->image = $original_path;
            $user->status = $request->status;
            $user->password = $request->password;
            $user->created_at = Carbon::now();
            $user->save();
            return redirect('admin/editers')->with('success', 'User Added Successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', ERROR_MSG);
        }
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jmsuser  $Jmsuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    { 
         $result = $this->Jmsuser->GetJmsuserByID($request, $id);
           if (empty($result)) {
            return redirect('admin/editers');
        }
        $data['seo_title'] = 'Editer Edit';
        $data['ispage'] = 'editers';
        try {
           
            $data["user_details"] = $result;
            return view('admin.editers.add-new', $data);
        } catch (\Exception $e) {
            return redirect('admin/editers')->with('error', ERROR_MSG);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jmsuser  $Jmsuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
        $validated = $request->validate(
            [
                // 'phone' => 'required|regex:/^[(]?\d{3}[)]?[(\s)?.-]\d{3}[\s.-]\d{4}$/',
                'name' => 'required|max:255',
                'role' => 'required',
                'email' => 'required|email|max:255|unique:jmsusers,email,' . $id,
                'image' => 'file|mimes:jpeg,jpg,png,bmp,svg|max:2048',
            ],
            [
                'phone.required' => 'The field is required.',
                'phone.regex' => 'Please enter valid phone number (000) 000-0000.',
                'role.required' => 'The field is required.',
                'name.required' => 'The field is required.',
                'email.required' => 'The field is required.',
                'image.file' => 'Uploed Image format jpeg,jpg,png,bmp,svg max:2048.',
            ]
        );
        $original_path = '';
        $oldFile = Jmsuser::select('image')->where('id', $id)->first();
        if ($request->hasFile('file')) {
            if (!empty($oldFile->image) && Storage::exists('public/uploads/users/' . $oldFile->image)) {
                Storage::delete('public/uploads/users/' . $oldFile->image);
            }
            $file = $request->file('file');
            $originalname = $file->getClientOriginalName();
            $file_name = uniqid() . "_" . $originalname;
            $file->storeAs('public/uploads/users/' . $file_name);
            $original_path = $folder_db_path . '/' . $file_name;

        } elseif ($request->deletefile != '') {
            Jmsuser::select('image')->where('id', $id)->update(['image' => '']);
            if (!empty($oldFile->image) && Storage::exists('public/uploads/users/' . $oldFile->image)) {
                Storage::delete('public/uploads/users/' . $oldFile->image);
            }
        } else {
            $original_path = $oldFile->image;
        }

        $user = Jmsuser::find($id);
        $user->name = $request->name;
        $user->roles = $request->role;
        $user->email = $request->email;
        $user->mobile = $request->phone;
        $user->address = $request->address;
        $user->image = $original_path;
        $user->status = $request->status;
        $user->updated_at = Carbon::now();

        try {
            $user->save();
        
            return redirect('admin/editers')->with('success', 'Editer Update Successfully.');
        } catch (\Exception $e) {
            return redirect('admin/editers/edit');
        }
    }

    public function editpass(Request $request, $id)
    {    $data['seo_title'] = 'Change Password';
        $data['ispage'] = 'editers';
        $result = $this->Jmsuser->GetJmsuserByID($request, $id);
          if (empty($result)) {
            return redirect('admin/editers');
        }
        try {
            
            $data["user_details"] = $result;
            return view('admin.editers.changepassword', $data);
        } catch (\Exception $e) {
            return redirect('admin/editers')->with('error', ERROR_MSG);
        }
    }
    public function updatepass(Request $request, $id)
    {
      
        $validated = $request->validate(
            [
                 'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,20}$/',
                'confirm_password' => 'required|same:password',
            ],
            [
                'password.required' => 'The field is required.',
                'password.regex' => 'The password should be 8-20 characters, with at least one uppercase letter, one lowercase letter, one number and one special character @ $ ! % * ? & #',
                'confirm_password.required' => 'The field is required.',
                'confirm_password.same' => 'The password and confirm password do not match.'
            ]
        );
        $user = Jmsuser::find($id);
        $user->password =$request->password;
        $user->updated_at = Carbon::now();

        try {
            $user->save();
            return redirect('admin/editers')->with('success', 'Password Change Successfully.');
        } catch (\Exception $e) {
            return redirect('admin/editers/changepassword');
        }
    }

     public function delete($id)
        {
            try {
                $user = Jmsuser::find($id);
        
                if (!$user) {
                    return redirect('admin/editers')->with('error', 'Editer not found.');
                }
        
                $user->delete();
        
                return redirect('admin/editers')->with('success', 'Editer deleted successfully.');
            } catch (\Exception $e) {
                return redirect('admin/editers')->with('error', 'Unable to delete editer due to related fields.');
            }
        }

}
