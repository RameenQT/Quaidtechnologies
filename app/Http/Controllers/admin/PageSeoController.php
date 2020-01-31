<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\EditBlogRequest;
use App\PageSeo;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;
use URL;

class PageSeoController  extends Controller
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
        return view('pageSeo.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
		
        $pageSeo = PageSeo::get();
		return Datatables::of($pageSeo)
			
			->addColumn('action', function ($pageSeo) {
                return '<a href="pageSeo/'.$pageSeo->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> ' ;
            })
			->rawColumns(['action'])
            ->make(true);
    }

    public function edit($id)
    {
		$pageSeo = PageSeo::findOrFail($id);
		return view('pageSeo.edit', compact('pageSeo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$pageSeo = PageSeo::findOrFail($id);
		$data['meta_title'] = $request->meta_title;
		$data['meta_description'] = $request->meta_description;
		$data['focus_keywords'] = $request->focus_keywords;
		
		$pageSeo->update($data);

        flash('Page Content has been updated successfully.', 'success')->important();

        return redirect('/webmaster/pageSeo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
		$image = $blog->image;
		//unlink image
		@unlink(base_path().'/public/assets/uploads/images/'.$image);
		$blog->delete();
		flash('Blog has been deleted!', 'success')->important();
        return redirect('/webmaster/blog');
    }
}
