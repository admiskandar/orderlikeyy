<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Kiosk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;


class KioskController extends Controller
{
    // KESUKOMP
    //kiosk-list
    //similar to public function index()
    public function kiosk_list (){
        $kiosks = Kiosk::all();
        return view('kiosk.kiosk-list', compact('kiosks'));
    }

    //kiosk-add
    //similar to public function create()
    public function kiosk_add (){
        // call table user where user_type = 1
        $users = User::where('user_type','Kiosk Staff')->get();
        return view ('kiosk.kiosk-add', compact('users'));
    }

    //kiosk-store
    //similar to public function store(Request $request)
    public function kiosk_store (Request $request){
        $kiosk = new Kiosk;
        $kiosk -> name = $request->input('kiosk_name');
        $kiosk -> address = $request->input('kiosk_address');
        $kiosk -> description = $request->get('kiosk_desc');
        $kiosk -> opening_day = implode(', ', $request->input('opening_day'));
        $kiosk -> opening_time = $request->get('opening_time');
        $kiosk -> closing_time = $request->get('closing_time');
        $kiosk -> category = $request->get('kiosk_category');
        $kiosk -> phone_num = $request->input('kiosk_phone_num');
        $kiosk -> owner = $request->input('kiosk_owner');
        $kiosk -> status = $request->input('kiosk_status');

        if($request->hasfile('kiosk_image'))
        {
            $file = $request->file('kiosk_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/images/', $filename);
            $kiosk->image = $filename;
        }

        $kiosk->save();

        $kiosk_id = Kiosk::find($kiosk->id);
        return view ('kiosk.kiosk-info', ["kiosk"=>$kiosk_id]);
    }

    //kiosk-info
    //similar to public function show($id)
    public function kiosk_info($id){
        $kiosk = Kiosk::find($id);
        $menus = Menu::where('kiosk', 'like', '%'.$id.'%')->get();
        $user_id = Auth::id();
        $favourites = Favourite::where('user_id', 'like', '%'.$user_id.'%')->get();
        return view ('kiosk.kiosk-info', ["kiosk"=>$kiosk], compact('menus', 'favourites'));
    }

    //kiosk-edit
    //similar to public function edit($id)
    public function kiosk_edit($id){
        $kiosk = Kiosk::find($id);
        $users = User::where('user_type',1)->get();
        return view ('kiosk.kiosk-edit', ["kiosk"=>$kiosk], compact('users'));
    }

    //kiosk_update
    //similar to public function update(Request $request, $id)
    public function kiosk_update (Request $request, $id){
        $kiosk = Kiosk::find($id);
        $kiosk -> name = $request->get('kiosk_name');
        $kiosk -> address = $request->get('kiosk_address');
        $kiosk -> description = $request->get('kiosk_desc');
        $kiosk -> opening_day = implode(', ', $request->input('opening_day'));
        $kiosk -> opening_time = $request->get('opening_time');
        $kiosk -> closing_time = $request->get('closing_time');
        $kiosk -> category = $request->get('kiosk_category');
        $kiosk -> phone_num = $request->get('kiosk_phone_num');
        $kiosk -> status = $request->get('kiosk_status');
        
        if($request->hasfile('kiosk_image')){
            $destination = 'uploads/images/'.$kiosk->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('kiosk_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/images/', $filename);
            $kiosk->image = $filename;
        }

        $kiosk->update();

        $kiosk_id = Kiosk::find($kiosk->id);
        $kiosks = Kiosk::all();
        return view('kiosk.kiosk-list', compact('kiosks'));
    }

    //kiosk_destroy
    //similar to public function destroy($id)
    public function kiosk_destroy ($id){
        $kiosk = Kiosk::find($id);
        $destination = 'uploads/images/'.$kiosk->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $kiosk -> delete();
        $kiosks = Kiosk::all();
        return view('kiosk.kiosk-list', compact('kiosks'));
    }



    // CUSTOMER
    public function kiosk_customer_list (){
        $kiosks = Kiosk::all();
        return view('kiosk.kiosk-customer-list', compact('kiosks'));
    }



    // kiosk-staff > my-kiosk
    public function kiosk_my_kiosk (){
        $user_id = Auth::id();
        $kiosk = Kiosk::where('owner', $user_id)->first();
        return view ('kiosk.kiosk-my-kiosk', ["kiosk"=>$kiosk], compact('kiosk'));
    }

    // kiosk-staff > my-kiosk > edit
    public function kiosk_my_kiosk_edit($id){
        $kiosk = Kiosk::find($id);
        return view ('kiosk.kiosk-my-kiosk-edit', ["kiosk"=>$kiosk]);
    }

    public function kiosk_my_kiosk_update (Request $request, $id){
        $kiosk = Kiosk::find($id);
        $kiosk -> name = $request->get('kiosk_name');
        $kiosk -> address = $request->get('kiosk_address');
        $kiosk -> description = $request->get('kiosk_desc');
        $kiosk -> opening_day = implode(', ', $request->input('opening_day'));
        $kiosk -> opening_time = $request->get('opening_time');
        $kiosk -> closing_time = $request->get('closing_time');
        $kiosk -> category = $request->get('kiosk_category');
        $kiosk -> phone_num = $request->get('kiosk_phone_num');
        $kiosk -> status = $request->get('kiosk_status');
        
        if($request->hasfile('kiosk_image')){
            $destination = 'uploads/images/'.$kiosk->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('kiosk_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/images/', $filename);
            $kiosk->image = $filename;
        }

        $kiosk->update();

        $user_id = Auth::id();
        $kiosk = Kiosk::where('owner', $user_id)->first();
        return view ('kiosk.kiosk-my-kiosk', ["kiosk"=>$kiosk], compact('kiosk'));
    }


    public function updateStatus(Request $request, $id)
    {
        $kiosk = Kiosk::find($id);
        if (!$kiosk) {
            return Redirect::back()->withErrors(['Kiosk not found.']);
        }

        $status = $request->input('status');
        $kiosk->status = $status;
        $kiosk->save();

        return Redirect::back()->with('message', 'Status updated successfully.');
    }


}
