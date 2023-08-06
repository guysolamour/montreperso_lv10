<?php

namespace App\Http\Controllers\Back;

use App\Models\Form;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\FormForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class FormController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::last()->get();
        return view('back.forms.index', compact('forms'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Form, FormForm::class);

        return view('back.forms.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Form, FormForm::class);

       $form->redirectIfNotValid();

       Form::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.form.index');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
       return view('back.forms.show', compact('form'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        $forme = $this->getForm($form, FormForm::class);
        return view('back.forms.edit', compact('form','forme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        $forme = $this->getForm($form, FormForm::class);
        $forme->redirectIfNotValid();
        $form->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.form.index');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();

        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.form.index');
    }


}
