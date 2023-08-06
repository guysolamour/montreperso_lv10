<?php

namespace App\Http\Controllers\Back;

use App\Models\Watch;
use Illuminate\Http\Request;
use App\Forms\Back\WatchForm;
use App\Http\Requests\Front\WatchFormRequest;
use Guysolamour\Administrable\Traits\FormBuilderTrait;
use Guysolamour\Administrable\Http\Controllers\BaseController;

class WatchController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watches = Watch::last()->get();
        return view('back.watches.index', compact('watches'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Watch, WatchForm::class);

        return view('back.watches.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Watch, WatchForm::class);

       $form->redirectIfNotValid();

       Watch::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.watch.index');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function show(Watch $watch)
    {
       return view('back.watches.show', compact('watch'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function edit(Watch $watch)
    {
        $watch->load([
            'form', 'form.type', 'index', 'indicator', 'background', 'bracelet', 'design', 'designcategory',
            'user'
        ]);

        return view('back.watches.edit', compact('watch'));
    }


    public function update(Watch $watch, WatchFormRequest $request)
    {
        // dd('salut');
        $data = $request->validated();

        $backgroundImage = $watch->uploadBackgroundImage($data['background_image']);

        $data['background_image'] = $backgroundImage;

        $watch->update($data);

        flashy('L\' élément a bien été modifié');

        return back();
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Watch  $watch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watch $watch)
    {
        $watch->delete();

        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.watch.index');
    }


}
