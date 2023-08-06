<?php

namespace App\Http\Controllers\Back;

use App\Models\Type;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\TypeForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class TypeController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::last()->get();
        return view('back.types.index', compact('types'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Type, TypeForm::class);

        return view('back.types.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Type, TypeForm::class);

       $form->redirectIfNotValid();

       Type::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.type.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
       return view('back.types.show', compact('type'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $form = $this->getForm($type, TypeForm::class);
        return view('back.types.edit', compact('type','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $form = $this->getForm($type, TypeForm::class);
        $form->redirectIfNotValid();
        $type->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.type.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.type.index');
    }


}
