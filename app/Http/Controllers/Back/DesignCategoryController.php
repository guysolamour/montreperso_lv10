<?php

namespace App\Http\Controllers\Back;

use App\Models\DesignCategory;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\DesignCategoryForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class DesignCategoryController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designcategories = DesignCategory::last()->get();
        return view('back.designcategories.index', compact('designcategories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new DesignCategory, DesignCategoryForm::class);

        return view('back.designcategories.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new DesignCategory, DesignCategoryForm::class);

       $form->redirectIfNotValid();

       DesignCategory::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.designcategory.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DesignCategory  $designcategory
     * @return \Illuminate\Http\Response
     */
    public function show(DesignCategory $designcategory)
    {
       return view('back.designcategories.show', compact('designcategory'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DesignCategory  $designcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DesignCategory $designcategory)
    {
        $form = $this->getForm($designcategory, DesignCategoryForm::class);
        return view('back.designcategories.edit', compact('designcategory','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DesignCategory  $designcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DesignCategory $designcategory)
    {
        $form = $this->getForm($designcategory, DesignCategoryForm::class);
        $form->redirectIfNotValid();
        $designcategory->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.designcategory.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DesignCategory  $designcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DesignCategory $designcategory)
    {
        $designcategory->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.designcategory.index');
    }


}
