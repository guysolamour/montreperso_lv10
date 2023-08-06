<?php

namespace App\Http\Controllers\Back;

use App\Models\Font;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\FontForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class FontController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonts = Font::last()->get();
        return view('back.fonts.index', compact('fonts'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Font, FontForm::class);

        return view('back.fonts.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Font, FontForm::class);

       $form->redirectIfNotValid();

       Font::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.font.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function show(Font $font)
    {
       return view('back.fonts.show', compact('font'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function edit(Font $font)
    {
        $form = $this->getForm($font, FontForm::class);
        return view('back.fonts.edit', compact('font','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Font $font)
    {
        $form = $this->getForm($font, FontForm::class);
        $form->redirectIfNotValid();
        $font->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.font.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Font  $font
     * @return \Illuminate\Http\Response
     */
    public function destroy(Font $font)
    {
        $font->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.font.index');
    }


}
