<?php

namespace App\Http\Controllers\Back;

use App\Models\Index;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\IndexForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class IndexController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indices = Index::last()->get();
        return view('back.indices.index', compact('indices'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Index, IndexForm::class);

        return view('back.indices.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Index, IndexForm::class);

       $form->redirectIfNotValid();

       Index::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.index.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
       return view('back.indices.show', compact('index'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        $form = $this->getForm($index, IndexForm::class);
        return view('back.indices.edit', compact('index','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        $form = $this->getForm($index, IndexForm::class);
        $form->redirectIfNotValid();
        $index->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.index.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        $index->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.index.index');
    }


}
