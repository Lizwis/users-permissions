<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        $roles = Auth()->user()->roles;

        foreach($roles as $role){

            if($role['name'] == 'User'){
                return redirect('/profile');
            }
            else{
                $users = User::where('id', '!=', Auth::id())->get();
                $roles = Auth()->user()->roles;
                return view('users/index', compact('users'));
            }
        }
        
    }

    public function create(){

        $permissions = Permission::all();
        return view('users/create', compact('permissions'));
    }

    public function Store(){


        //return request()->all();

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'phoneNumber' =>'required|numeric|digits:10',
            'address' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ],
            'toggleRoles' => 'required','numeric',
            

        ]);

        if($data['toggleRoles'] == '2'){

           $customRoles =  request()->validate([
                'permission' => ['required'],
                'customRoleName' =>['required']
            ]);

            $newRole = Role::create(['name' => $customRoles['customRoleName']]);


            $role = Role::findById($newRole->id);

            foreach($customRoles['permission'] as $pm){
                
                $role->givePermissionTo(['name' => $pm]);
            }

        }
        else{
           $existingRole = request()->validate([
                'role' => ['required'],
            ]);
        }

        
        $hashPassword = ['password' => Hash::make($data['password'])];

        $createdUser = User::create(array_merge($data, $hashPassword));

        if($data['toggleRoles'] == '2'){
            foreach($customRoles['permission'] as $pm){
                
                $createdUser->givePermissionTo($pm);
            }
            $createdUser->assignRole($customRoles['customRoleName']);
           
        }
        else{

           $roles = Role::findByName($existingRole['role'])->permissions;
           foreach($roles as $role){
             $createdUser->givePermissionTo($role['name']);
           }
           // 

            $createdUser->assignRole($existingRole['role']);
        }


        return redirect('/')->with('success','User Created Successfully.');
    }

    public function show(User $id ){

        foreach($id->roles as $item)
        {
            $roleType = $item['name'];
        }

       // return  $roleType;

        $user_details = User::where('id', $id->id)->first();
        return view('users/show', compact('user_details', 'roleType'));
    }

    public function edit($id){
        $user_details = User::where('id', $id)->first();
        return view('users/edit', compact('user_details'));
    }

    public function update($id){

        $user_details = User::where('id', $id)->first();

        $data = $this->validateData();

        User::where('id', $id)->update($data);

        return redirect()->back()->with('success','User details updated Successfully.');

    }

    public function delete(User $id){
        $id->delete();
        return redirect()->back();
    }
    
    public function password($id){
        return view('auth/passwords/index', compact('id'));
    }

    public function changePassword($id){

       $newPassword = request()->validate(['password' => 
            ['required', 'confirmed',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ]
        ]);


        User::where('id', $id)->update([
            'password' => Hash::make($newPassword['password']),
        ]);

        return redirect()->back()->with('success','Password changed Successfully.');
    }

    private function validateData(){

        return request()->validate(['name' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string', 'max:255'],
        'job_title' => ['required', 'string', 'max:255'],
        'phoneNumber' =>'required|numeric|digits:10',
        'address' => ['required', 'string', 'max:255'],]);
    }
}
