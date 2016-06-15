<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon;

class SettingsController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mainPages = \App\Pages::where('parent', 0)
            ->orderBy('position')
            ->get();

        $pages = $this->getAllPages($mainPages);

        return view('admin/pages/index')
            ->with('pages', $pages);
    }


    public function store(Request $request)
    {

        $page = new \App\Pages;

        $validator = Validator::make($request->all(), $page->rules);

        if($validator->fails()) {

            $alert = array(
                'html' => 'De pagina titel mag niet leeg zijn. Probeer het aub nog een keer en vul dan een pagina titel in.',
                'class' => 'danger'
            );

            return redirect('cfadmin/Pages')
                ->with([
                    'alert' => $alert
                ])
                ->withErrors($validator)
                ->withInput();

        } else {

            $page->title = $request->input('title');
            $page->template = $request->input('template');
            $page->save();

            $alert = array(
                'html' => 'Pagina \''.$page->title.'\' is succesvol toegevoegd.',
                'class' => 'success'
            );

            return redirect()->action('Admin\PagesController@edit', $page->id)
                ->with([
                    'alert' => $alert
                ]);

        }

    }


    public function edit($id)
    {

        $page = \App\Pages::where('id', '=', $id)->first();

        return view('admin/pages/edit')->with('page', $page);
    }


    public function update(Request $request, $id)
    {

        $page = \App\Pages::findOrFail($id);

        $page->title = $request->input('title');
        $page->link = $request->input('link');
        $page->seo_title = $request->input('seo_title');
        $page->seo_description = $request->input('seo_description');
        $page->save();

        $alert = array(
            'html' => 'Pagina \''.$page->title.'\' is succesvol opgeslagen.',
            'class' => 'success'
        );

        return redirect()->action('Admin\PagesController@edit', $id)
            ->with([
                'alert' => $alert
            ]);
    }

}

