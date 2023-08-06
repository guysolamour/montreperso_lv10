<?php

namespace App\Http\Controllers\Back;

use App\Models\Bracelet;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\BraceletForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class BraceletController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bracelets = Bracelet::last()->get();
        return view('back.bracelets.index', compact('bracelets'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Bracelet, BraceletForm::class);

        return view('back.bracelets.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Bracelet, BraceletForm::class);

       $form->redirectIfNotValid();

       Bracelet::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.bracelet.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bracelet  $bracelet
     * @return \Illuminate\Http\Response
     */
    public function show(Bracelet $bracelet)
    {
       return view('back.bracelets.show', compact('bracelet'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bracelet  $bracelet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bracelet $bracelet)
    {
        $form = $this->getForm($bracelet, BraceletForm::class);
        return view('back.bracelets.edit', compact('bracelet','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bracelet  $bracelet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bracelet $bracelet)
    {
        $form = $this->getForm($bracelet, BraceletForm::class);
        $form->redirectIfNotValid();
        $bracelet->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.bracelet.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bracelet  $bracelet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bracelet $bracelet)
    {
        $bracelet->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.bracelet.index');
    }


}
