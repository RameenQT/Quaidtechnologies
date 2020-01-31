<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Generalsettings;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;
use URL;

class GeneralsettingsController  extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$id = 1;
        $generalsettings = Generalsettings::findOrFail($id);
		return view('generalsettings.index', compact('generalsettings'));
        
    }

	public function edit($id)
    {
		$id = 1;
        $generalsettings = Generalsettings::findOrFail($id);
		return view('generalsettings.edit', compact('generalsettings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
		$id = 1;
        $generalsettings = Generalsettings::findOrFail($id);
		
		
		$data['email'] = $request->email;
		$data['phone'] = $request->phone;
		$data['facebook'] = $request->facebook;
		$data['twitter'] = $request->twitter;
		$data['linkdin'] = $request->linkdin;
		$data['google'] = $request->google;
		$data['linkedin'] = $request->linkedin;
		$data['meta_title'] = $request->meta_title;
		$data['meta_description'] = $request->meta_description;
		$data['focus_keywords'] = $request->focus_keywords;
		
		
		$generalsettings->update($data);

        flash('Settings has been updated successfully.', 'success')->important();

        return redirect('/webmaster/generalsettings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
