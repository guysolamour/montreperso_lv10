<?php

namespace App\Http\Controllers\Back;

use App\Models\Design;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\DesignForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class DesignController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designs = Design::last()->get();
        return view('back.designs.index', compact('designs'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Design, DesignForm::class);

        return view('back.designs.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Design, DesignForm::class);

       $form->redirectIfNotValid();

       Design::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.design.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design)
    {
       return view('back.designs.show', compact('design'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design)
    {
        $form = $this->getForm($design, DesignForm::class);
        return view('back.designs.edit', compact('design','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Design $design)
    {
        $form = $this->getForm($design, DesignForm::class);
        $form->redirectIfNotValid();
        $design->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.design.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design)
    {
        $design->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.design.index');
    }


}
