<?php

namespace App\Http\Controllers\Back;

use App\Models\Background;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\BackgroundForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class BackgroundController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backgrounds = Background::last()->get();
        return view('back.backgrounds.index', compact('backgrounds'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Background, BackgroundForm::class);

        return view('back.backgrounds.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Background, BackgroundForm::class);

       $form->redirectIfNotValid();

       Background::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.background.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function show(Background $background)
    {
       return view('back.backgrounds.show', compact('background'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function edit(Background $background)
    {
        $form = $this->getForm($background, BackgroundForm::class);
        return view('back.backgrounds.edit', compact('background','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Background $background)
    {
        $form = $this->getForm($background, BackgroundForm::class);
        $form->redirectIfNotValid();
        $background->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.background.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function destroy(Background $background)
    {
        $background->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.background.index');
    }


}
