<?php

namespace App\Http\Controllers\Back;

use App\Models\Indicator;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;
use App\Forms\Back\IndicatorForm;
use Guysolamour\Administrable\Traits\FormBuilderTrait;

class IndicatorController extends BaseController
{
    use FormBuilderTrait;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicators = Indicator::last()->get();
        return view('back.indicators.index', compact('indicators'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->getForm(new Indicator, IndicatorForm::class);

        return view('back.indicators.create', compact('form'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $form = $this->getForm(new Indicator, IndicatorForm::class);

       $form->redirectIfNotValid();

       Indicator::create($request->all());

       flashy('L\' élément a bien été ajouté');

       return redirect()->route('back.indicator.index');
    }



    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function show(Indicator $indicator)
    {
       return view('back.indicators.show', compact('indicator'));
    }



      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicator $indicator)
    {
        $form = $this->getForm($indicator, IndicatorForm::class);
        return view('back.indicators.edit', compact('indicator','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indicator $indicator)
    {
        $form = $this->getForm($indicator, IndicatorForm::class);
        $form->redirectIfNotValid();
        $indicator->update($request->all());

        flashy('L\' élément a bien été modifié');

        return redirect()->route('back.indicator.index');
    }



    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicator $indicator)
    {
        $indicator->delete();
        
        flashy('L\' élément a bien été supprimé');

        return redirect()->route('back.indicator.index');
    }


}
