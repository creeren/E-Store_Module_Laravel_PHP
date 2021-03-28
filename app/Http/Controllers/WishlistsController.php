<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class WishlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        if(Auth::check()){
      return view('wishlist.wishlist', [
          'wishlists' => Wishlist::all()
      ]);
        }
        else return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
{
    return view('wishlist.create', [
        'action' =>route('wishlist.store')
    ]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addWishlist($id)
    {
        if(Auth::check()){

            $wishlist = new Wishlist();
            $wishlist->product_id = $id;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
            return redirect('/index')->with('success', 'Added to wishlist successfully!');
        }
         else{
                return redirect('/login');
            }
    }
    public function store(Request $request)
    {
        $validated = $request->validate(Wishlist::rules());
        $wishlist = new Wishlist($validated);
        $wishlist->product_id = $request->input('product_id');
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();

        return redirect('/wishlist')->with('success', 'Added to wishlist successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        return view('wishlist.create',[
            'wishlist' =>Wishlist::find($id),
            'product_id'=>Product::find($id),
            'action' => route('wishlist.update', $id)//links uz update funkciju , action nodod pogai saglabat
        ]);

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
        $validated=$request->validate(Wishlist::rules());
        $wishlist = Wishlist::find($id);
        $wishlist->setRawAttributes($validated);
        $wishlist->save();

        return redirect('/wishlist')->with('success', 'Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $list
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $wishlist = Wishlist::find($id);
        $wishlist->delete();

        return redirect('/wishlist')->with('success', 'Removed from wishlist');
    }
}
