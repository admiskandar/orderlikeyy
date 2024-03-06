<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FavouriteController extends Controller
{
    //View Favourite
    public function favourite_list()
    {
        $user_id = Auth::id();
        $favourites = Favourite::where('user_id', $user_id)->get();
        $menuIds = $favourites->pluck('menu_id')->toArray();
        $menus = Menu::whereIn('id', $menuIds)->with('kioskk')->get();
        return view('favourite.favourite-list', compact('menus'));
    }

    // //Add to Favourite
    // public function add_favourite($id){
    //     $user_id = Auth::id();
    //     $menu = Menu::find($id);
    //     $favourite = new Favourite;
    //     $favourite -> menu_id = $menu->id;
    //     $favourite -> user_id = $user_id;
    //     $favourite -> save();
    //     return back() -> with('Success!', 'Menu added to you favourites');
    // }

    // //Remove Favourite
    // public function delete_favourite($id){
    //     $favourite = Favourite::find($id);
    //     $favourite -> delete();
    //     return back();
    // }


    public function add(Request $request, Menu $menu)
    {
        // Check if the menu is already favorited by the authenticated user
        if ($request->user()->favourites()->where('menu_id', $menu->id)->exists()) {
            // Menu is already favorited, you may handle the response accordingly
            return redirect()->back()->with('error', 'Menu already favorited');
        }

        // Create a new Favourite record linking the menu to the authenticated user
        $favourite = new Favourite();
        $favourite->menu_id = $menu->id;
        $favourite->user_id = $request->user()->id;
        $favourite->save();

        // Return a successful response with a flash message
        return redirect()->back()->with('success', 'Menu added to favorites')->with('menuId', $menu->id);
    }

    public function remove(Request $request, Menu $menu)
    {
        // Retrieve the Favourite record linking the menu to the authenticated user
        $favourite = $request->user()->favourites()->where('menu_id', $menu->id)->first();

        // Check if the menu is favorited by the authenticated user
        if (!$favourite) {
            // Menu is not favorited, you may handle the response accordingly
            return redirect()->back()->with('error', 'Menu is not favorited')->with('menuId', $menu->id);
        }

        // Delete the Favourite record
        $favourite->delete();

        // Return a successful response with a flash message
        return redirect()->back()->with('success', 'Menu removed from favorites')->with('menuId', $menu->id);
    }
}
