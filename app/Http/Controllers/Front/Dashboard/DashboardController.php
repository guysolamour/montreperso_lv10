<?php

namespace App\Http\Controllers\Front\Dashboard;

use App\Models\Watch;
use Illuminate\Support\Arr;
use App\Http\Requests\Front\WatchFormRequest;
use Guysolamour\Administrable\Http\Controllers\BaseController;

class DashboardController extends BaseController
{

  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return front_view('dashboard.index');
    }

    public function watches()
    {
        $user = auth()->user();
        $watches = $user->watches->reverse();

        return view('front.dashboard.watch.index', [
            'watches' => $watches,
            'user' => $user,
        ]);
    }

    public function edit(Watch $watch)
    {
        $watch->load([
            'form', 'form.type', 'index', 'indicator', 'background', 'bracelet', 'design', 'designcategory'
        ]);

       return view('front.dashboard.watch.edit', compact('watch'));
    }

    public function create()
    {
       return view('front.dashboard.watch.create');
    }


    public function update(Watch $watch, WatchFormRequest $request)
    {
        $data = $request->validated();

        $backgroundImage = $watch->uploadBackgroundImage($data['background_image']);

        $data['background_image'] = $backgroundImage;

        $watch->update($data);

        return back();
    }


    public function destroy(Watch $watch)
    {
        $watch->delete();

        return back();
    }


}


