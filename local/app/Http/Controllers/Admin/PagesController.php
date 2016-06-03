<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
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

        $pages = \App\Pages::all();

        return view('admin/pages/index')->with('pages', $pages);
    }

    public function edit($id)
    {

        $page = \App\Pages::where('id', '=', $id)->first();

        return view('admin/pages/edit')->with('page', $page);
    }

    public function editContent($id)
    {

        $page = \App\Pages::where('id', '=', $id)->first();

        return view('admin/pages/editContent')->with('page', $page);
    }

    public function editImage($id)
    {

        $page = \App\Pages::where('id', '=', $id)->first();

        return view('admin/pages/editImage')->with('page', $page);
    }

    public function update(Request $request, $id)
    {

        $page = \App\Pages::findOrFail($id);

        $page->title = $request->input('title');
        $page->slug = str_slug($request->input('title'));
        $page->link = $request->input('link');
        $page->seo_title = $request->input('seo_title');
        $page->seo_description = $request->input('seo_description');
        $page->save();

        $alert = array(
            'html' => 'Pop-up \''.$page->title.'\' is succesvol opgeslagen.',
            'class' => 'alert-success'
        );

        return redirect()->action('Admin\PagesController@edit', $id)
            ->with([
                'alert' => $alert
            ]);
    }

    // Delete a page
    public function delete($id)
    {

        echo $id;
    }
}

