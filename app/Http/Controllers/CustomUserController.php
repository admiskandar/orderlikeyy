<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


class CustomUserController extends Controller
{
    //ALL USER
    //user-list
    public function user_list(){
        $users = User::all();
        return view ('user.user-list', compact('users'));
    }

    //user-edit
    public function user_edit($id){
        $users = User::find($id);
        return view ('user.user-edit', ["user" => $users]);
    }

    public function user_update(Request $request, $id){

        $user = User::find($id);
    
        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> phone_num = $request->input('phone_num');
    
        $user->update();
        $users = User::all();
        return view ('user.user-list', compact('users'));
    }

    public function user_destroy($id){

        $user = User::find($id);
        $user->delete();
        $users = User::all();
        return view ('user.user-list', compact('users'));
    }


    public function my_profile_show(){
        $id = Auth::id();
        $user = User::find($id);
        return view('user.my-profile', ["user" => $user]);
    }
    
    public function my_profile_edit($id){
        $user = User::find($id);
        return view('user.my-profile-edit', ["user" => $user]);
    }
    
    public function my_profile_update(Request $request, $id){
        $user = User::find($id);
    
        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> phone_num = $request->input('phone_num');
    
        $user->update();
        return view('user.my-profile', ["user" => $user]);
    }
    
    public function my_profile_password_edit($id){
        $user = User::find($id);
        return view('user.my-profile-password-edit', ["user" => $user]);
    }
    
    private function passwordRules()
    {
        return [
            'required',
            'string',
            'min:8',
            'confirmed',
            'different:current_password',
        ];
    }

    public function my_profile_password_update(Request $request, $id)
    {
        $input = $request->input();

        $user = User::find($id);

        Validator::make($input, [
            'input.current_password' => ['required', 'string', 'current_password:web'],
            'input.password' => $this->passwordRules(),
        ], [
            'input.current_password.current_password' => __('The provided password does not match your current password.'),
        ])->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['input']['password']),
        ])->save();

        return view('user.my-profile', ["user" => $user]);
    }




























    //KESUKOMP
    //kesukomp-list
    public function kesukomp_list(){
        return view ('user.kesukomp-list');
    }

    //kesukomp-add
    public function kesukomp_add(){

        return view ('user.kesukomp-add');
    }
    public function kesukomp_store(Request $request){

        $user = new User;

        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));
        $user -> phone_num = $request->input('phone_num');
        $user -> user_type = $request->input('user_type');

        $user->save();

        $users = User::all();
        return view ('user.user-list', compact('users'));
    }

    //kesukomp-edit
    public function kesukomp_edit($id){
        $user = User::find($id);
        return view('user.kesukomp-edit', ["user" => $user]);
    }

    public function kesukomp_update(Request $request, $id){

        $user = User::find($id);

        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));
        $user -> phone_num = $request->input('phone_num');
        $user -> user_type = $request->input('user_type');

        $user->update();


        $users = User::all();
        return view ('user.user-list', compact('users'));
    }



    //Kiosk Staff
    //kiosk-staff-list
    public function kiosk_staff_list(){
        return view ('user.kiosk-staff-list');
    }

    //kiosk-staff-add
    public function kiosk_staff_add(){
        return view ('user.kiosk-staff-add');
    }

    public function kiosk_staff_store(Request $request){
        $user = new User;

        $user -> name = $request->input('name');
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));
        $user -> phone_num = $request->input('phone_num');
        $user -> user_type = $request->input('user_type');

        $user->save();

        $users = User::all();
        return view ('user.user-list', compact('users'));
    }

    //kiosk-staff-edit
    public function kiosk_staff_edit(){
        return view ('user.kiosk-staff-edit');
    }


    //Customer
    //customer-list
    public function customer_list(){
        return view ('user.customer-list');
    }

    //customer-edit
    public function customer_edit(){
        return view ('user.customer-edit');
    }
}
