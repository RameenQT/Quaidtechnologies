<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateCategoriesRequest;
use App\Categories;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Dailymilkduying;
use Carbon\Carbon;
use Response;
use URL;

class CategoriesController  extends Controller
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
        return view('categories.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
		
         $categories = Categories::query();
		 return Datatables::of($categories)
         ->addColumn('action', function ($categories) {
                return '<a href="categories/'.$categories->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
				<form method="post" action="categories/'.$categories->id.'" style="float:right;padding-right:48%;" >
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="'.csrf_token().'">
				<button type="submit"  class="btn btn-danger" id="deleteuser_'.$categories->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</form>
				</form>
				<script>
					$("#deleteuser_'.$categories->id.'").click(function(){
						return confirm("Are you sure you want to delete this?");
					});
				</script>' ;
            })
			->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoriesRequest $request)
    {
		
		$Title = $request->title ;
		$slug = strtolower(str_replace(" ","-",$Title));
		
		Categories::create(array_merge($request->all(), ['slug'=>$slug]));
		

		flash('Category has been created successfully.', 'success')->important();

        return redirect('/webmaster/categories');
    }

    public function edit($id)
    {
        $categories = Categories::findOrFail($id);
		return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategoriesRequest $request, $id)
    {
		
		
        $categories = Categories::findOrFail($id);
		
		$Title = $request->title ;
		$slug = strtolower(str_replace(" ","-",$Title));
		
		$data['slug'] = $slug;
		$data['title'] = $request->title;
		
		$categories->update($data);

        flash('Category has been updated successfully.', 'success')->important();

        return redirect('/webmaster/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::findOrFail($id);
		
		$categories->delete();
		flash('Category has been deleted!', 'success')->important();
        return redirect('/webmaster/categories');
    }
}
