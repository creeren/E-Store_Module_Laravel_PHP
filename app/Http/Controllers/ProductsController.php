<?php

namespace App\Http\Controllers;
use App\Wishlist;
use App\Categorie;
use App\Product;


use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */

    public function index()
    {
        $plaginate = false;
       if(request()->categorie)
       {
            $products = Product::with('categories')->whereHas('categories', function ($query)
            {
                $query->where('name', request()->categorie);
            })->get();

        $categories = Categorie::all();
        $wishlist = Wishlist::all();
        $catName = $categories->where('name', request()->categorie)->first()->name;
           return view('products.index')->with([
               'products' => $products,
               'wishlist' => $wishlist,
               'categories' => $categories,
               'catName' => $catName,
               'plaginate' => $plaginate,
           ]);
       }
        else {
            $plaginate = true;
            $products = Product::paginate(5);
            $wishlist = Wishlist::all();
            $categories = Categorie::all();
            return view('products.index')->with([
                'products' => $products,
                'wishlist' => $wishlist,
                'categories' => $categories,
                'plaginate' => $plaginate,

            ]);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        /** @var TYPE_NAME $this */
        $this->authorize('create', Product::class);

        return view('products.create',[
            'action' =>route('index.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {

        $validated = $request->validate(Product::rules());

        $product = new Product($validated);
        $product->save();

        return redirect('/index')->with('success', 'Saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        return view('products.show', [
            'product' => Product::find($id),
            'search' => Product::find($id)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {

        return view('products.create',[
            'product' =>Product::find($id),
            'action' => route('index.update', $id)//links uz update funkciju , action nodod pogai saglabat
    ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $this->authorize('update', Product::class);
        } catch (AuthorizationException $e) {
            return $php_errormsg;
        }

        $validated=$request->validate(Product::rules());
       $product = Product::find($id);
       $product->setRawAttributes($validated);
       $product->save();

       return redirect('/index')->with('success', 'Saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->authorize('destroy', Product::class);
        } catch (AuthorizationException $e) {
            return $php_errormsg;
        }
        $product = Product::find($id);
        $product->delete();

        return redirect('/index')->with('success', 'Deleted successfully');
    }


}
