<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('categorie.categorie', [
            'categorie' => Categorie::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        try {
            $this->authorize('create', Categorie::class);
        } catch (AuthorizationException $e) {
            return $php_errormsg;
        }
        return view('categorie.create', [
            'action' =>route('categorie.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate(Categorie::rules());

        $cat = new Categorie($validated);
        $cat->save();

        return redirect('/categorie')->with('success', 'Saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('categorie.show', [
            'categorie' => Categorie::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('categorie.create',[
            'cat' =>Categorie::find($id),
            'action' => route('categorie.update', $id)//links uz update funkciju , action nodod pogai saglabat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $this->authorize('update', Categorie::class);
        } catch (AuthorizationException $e) {
            return $php_errormsg;
        }
        $validated=$request->validate(Categorie::rules());
        $cat = Categorie::find($id);
        $cat->setRawAttributes($validated);
        $cat->save();

        return redirect('/categorie')->with('success', 'Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $this->authorize('destroy', Categorie::class);
        } catch (AuthorizationException $e) {
            return $php_errormsg;
        }
        $cat = Categorie::find($id);
        $cat->delete();

        return redirect('/categorie')->with('success', 'Deleted successfully');
    }
}
