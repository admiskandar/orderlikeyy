<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kiosk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    //menu-list
    public function menu_list()
    {
        $menus = Menu::all();
        return view('menu.menu-list', compact('menus'));
    }

    //menu-add
    //similar to public function create()
    public function menu_add()
    {
        return view('menu.menu-add');
    }

    //menu-info
    //similar to public function store(Request $request)
    public function menu_store(Request $request)
    {

        //create new table
        $menu = new Menu;

        // assign column name with html input name and get the value
        $menu->name = $request->input('menu_name');
        $menu->description = $request->input('menu_desc');
        $menu->price = $request->input('menu_price');
        $menu->category = implode(', ', $request->input('menu_category'));
        $menu->quantity = $request->input('menu_quantity');

        //input for image
        if ($request->hasfile('menu_image')) {
            $file = $request->file('menu_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);
            $menu->image = $filename;
        }

        //get user id
        $user_id = Auth::id();
        //assign user id into column in table menu
        $menu->created_by = $user_id;

        $kiosk = Kiosk::where('owner', $user_id)->first();
        $menu->kiosk = $kiosk->id;

        //save the data in table menu
        $menu->save();

        //find the menu id that is newly created
        $menu_id = Menu::find($menu->id);
        //show page with the newly created information
        return view('menu.menu-info', ["menu" => $menu_id]);
    }

    //menu-info
    //similar to public function show($id)
    public function menu_info($id)
    {
        //search the same id in table menu
        $menu = Menu::find($id);
        //display the data with the same id 
        return view('menu.menu-info', ["menu" => $menu]);
    }

    //menu-edit
    //similar to public function edit ($id)
    public function menu_edit($id)
    {
        //search the same id in table menu
        $menu = Menu::find($id);
        //display the data with the same id 
        return view('menu.menu-edit', ["menu" => $menu]);
    }

    //menu_update
    //similar to public function update(Request $request, $id)
    public function menu_update(Request $request, $id)
    {
        //search the same id in table menu
        $menu = Menu::find($id);

        // assign column name with html input name and get the value
        $menu->name = $request->input('menu_name');
        $menu->description = $request->input('menu_desc');
        $menu->price = $request->input('menu_price');
        $menu->category = implode(', ', $request->input('menu_category'));
        $menu->quantity = $request->input('menu_quantity');

        if ($request->hasfile('menu_image')) {
            $destination = 'uploads/images/' . $menu->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('menu_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);
            $menu->image = $filename;
        }

        //get user id
        $user_id = Auth::id();
        //assign user id into column in table menu
        $menu->created_by = $user_id;

        $kiosk = Kiosk::where('owner', $user_id)->first();
        $menu->kiosk = $kiosk->id;

        //save the data in table menu
        $menu->update();


        $menu_id = Menu::find($menu->id);
        // return view ('menu.menu-info', ["menu"=>$menu_id]);
        $menus = Menu::all();
        return view('menu.menu-list', compact('menus'));
    }

    public function menu_destroy($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            // Handle case where the menu with the given ID does not exist
            // Redirect or display an error message
        }

        $destination = 'uploads/images/' . $menu->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        // Delete associated favourites
        $menu->favourite()->delete();

        // Delete the menu
        $menu->delete();

        $menus = Menu::all();
        return view('menu.menu-list', compact('menus'));
    }

    //KIOSK STAFF
    public function menu_my_menu_list()
    {
        $user_id = Auth::id();

        // Retrieve the kiosk ID(s) owned by the user
        $kiosk_ids = Kiosk::where('owner', $user_id)->pluck('id');

        // Fetch the menus associated with the kiosk IDs
        $menus = Menu::whereIn('kiosk', $kiosk_ids)->get();

        return view('menu.menu-my-menu-list', compact('menus'));
    }

    public function menu_my_menu_add()
    {
        return view('menu.menu-my-menu-add');
    }

    public function menu_my_menu_store(Request $request)
    {
        //create new table
        $menu = new Menu;

        // assign column name with html input name and get the value
        $menu->name = $request->input('menu_name');
        $menu->description = $request->input('menu_desc');
        $menu->price = $request->input('menu_price');
        $menu->category = implode(', ', $request->input('menu_category'));
        $menu->quantity = $request->input('menu_quantity');

        //input for image
        if ($request->hasfile('menu_image')) {
            $file = $request->file('menu_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);
            $menu->image = $filename;
        }

        //get user id
        $user_id = Auth::id();
        //assign user id into column in table menu
        $menu->created_by = $user_id;

        $kiosk = Kiosk::where('owner', $user_id)->first();
        $menu->kiosk = $kiosk->id;

        //save the data in table menu
        $menu->save();

        $user_id = Auth::id();

        // Retrieve the kiosk ID(s) owned by the user
        $kiosk_ids = Kiosk::where('owner', $user_id)->pluck('id');

        // Fetch the menus associated with the kiosk IDs
        $menus = Menu::whereIn('kiosk', $kiosk_ids)->get();

        return view('menu.menu-my-menu-list', compact('menus'));
    }

    public function menu_my_menu_edit($id)
    {
        //search the same id in table menu
        $menu = Menu::find($id);
        //display the data with the same id 
        return view('menu.menu-my-menu-edit', ["menu" => $menu]);
    }

    public function menu_my_menu_update(Request $request, $id)
    {

        //search the same id in table menu
        $menu = Menu::find($id);

        // assign column name with html input name and get the value
        $menu->name = $request->input('menu_name');
        $menu->description = $request->input('menu_desc');
        $menu->price = $request->input('menu_price');
        $menu->category = implode(', ', $request->input('menu_category'));
        $menu->quantity = $request->input('menu_quantity');

        if ($request->hasfile('menu_image')) {
            $destination = 'uploads/images/' . $menu->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('menu_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);
            $menu->image = $filename;
        }

        //get user id
        $user_id = Auth::id();
        //assign user id into column in table menu
        $menu->created_by = $user_id;

        $kiosk = Kiosk::where('owner', $user_id)->first();
        $menu->kiosk = $kiosk->id;

        //save the data in table menu
        $menu->update();

        $user_id = Auth::id();

        // Retrieve the kiosk ID(s) owned by the user
        $kiosk_ids = Kiosk::where('owner', $user_id)->pluck('id');

        // Fetch the menus associated with the kiosk IDs
        $menus = Menu::whereIn('kiosk', $kiosk_ids)->get();

        return view('menu.menu-my-menu-list', compact('menus'));
    }

    public function menu_my_menu_destroy($id)
    {

        $menu = Menu::find($id);
        if (!$menu) {
            // Handle case where the menu with the given ID does not exist
            // Redirect or display an error message
        }

        $destination = 'uploads/images/' . $menu->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        // Delete associated favourites
        $menu->favourite()->delete();

        // Delete the menu
        $menu->delete();

        $user_id = Auth::id();

        // Retrieve the kiosk ID(s) owned by the user
        $kiosk_ids = Kiosk::where('owner', $user_id)->pluck('id');

        // Fetch the menus associated with the kiosk IDs
        $menus = Menu::whereIn('kiosk', $kiosk_ids)->get();

        return view('menu.menu-my-menu-list', compact('menus'));
    }



    // CUSTOMER
    //function for customer to view the list of menu
    public function menu_customer_list()
    {
        $menus = Menu::with('kioskk')->get();
        return view('menu.menu-list-customer', compact('menus'));
    }

}



