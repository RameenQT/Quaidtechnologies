<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\EditBlogRequest;
use App\Blog;
use App\Categories;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Dailymilkduying;
use Carbon\Carbon;
use Response;
use URL;

class BlogController  extends Controller
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
        return view('blog.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
		
         $blog = Blog::with('categoryName')->get();

        return Datatables::of($blog)
		
			->addColumn('CatName', function ($blog) 
			{
				return $blog->categoryName->title;
			})
			->editColumn('status', function ($blog) {
                if($blog->status == 'Active')
				{
					return '<span class="label label-success ng-scope">Active</span>';
				}
				else
				{
				
					return '<span class="label label-danger">In Active</span>';
				}
            })
           
           ->addColumn('action', function ($blog) {
                return '<a href="blog/'.$blog->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
				<a href="blog/'.$blog->id.'" class="btn btn-success"><i class="fa fa-eye"></i></a> 
				<form method="post" action="blog/'.$blog->id.'" style="float:right;padding-right:20%;" >
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="'.csrf_token().'">
				<button type="submit"  class="btn btn-danger" id="deleteuser_'.$blog->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</form>
				</form>
				<script>
					$("#deleteuser_'.$blog->id.'").click(function(){
						return confirm("Are you sure you want to delete this?");
					});
				</script>' ;
            })
			->rawColumns(['action','status','CatName'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Categories::get();
		return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 public static function slugify($text)
		{
		  // replace non letter or digits by -
		  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

		  // transliterate
		  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		  // remove unwanted characters
		  $text = preg_replace('~[^-\w]+~', '', $text);

		  // trim
		  $text = trim($text, '-');

		  // remove duplicate -
		  $text = preg_replace('~-+~', '-', $text);

		  // lowercase
		  $text = strtolower($text);

		  if (empty($text)) {
			return 'n-a';
		  }

		  return $text;
		}
    public function store(CreateBlogRequest $request)
    {
		$destinationPath = public_path('/assets/uploads/images');
		
		
		$imagename = '';
		$serviceTitle = $request->title ;
		$slug = $slug =  $this->slugify($serviceTitle);
		
		$image = $request->file('image');
		if($image){
			 $imagename = $slug.time().'.'.$image->getClientOriginalExtension();
			 $image->move($destinationPath, $imagename);
			
		}
		
		Blog::create(array_merge($request->all(), ['slug'=>$slug,'image'=>$imagename]));
		

		flash('Blog has been created successfully.', 'success')->important();

        return redirect('/webmaster/blog');
    }

    public function show($id)
	{
		//$blog = Blog::with('category')->findOrFail($id);
		$blog = Blog::with('categoryName')->where('id','=',$id)->first();
		
		return view('blog.show', compact('blog'));
	}
	
    public function edit($id)
    {
		$categories = Categories::get();
        $blog = Blog::findOrFail($id);
		return view('blog.edit', compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBlogRequest $request, $id)
    {
		$destinationPath = public_path('/assets/uploads/images');
		
        $blog = Blog::findOrFail($id);
		
		$serviceTitle = $request->title ;
		$slug = $slug =  $this->slugify($serviceTitle);
		
		$data['slug'] = $slug;
		$data['title'] = $request->title;
		$data['category'] = $request->category;
		$data['short_description'] = $request->short_description;
		$data['description'] = $request->description;
		$data['status'] = $request->status;
		$data['meta_title'] = $request->meta_title;
		$data['meta_description'] = $request->meta_description;
		$data['focus_keywords'] = $request->focus_keywords;
		
		//image check 
		$image = $request->file('image');
		if(!$image){
			$data['image'] = $blog->image;
		}
		else
		{
			$imagename = $slug.time().'.'.$image->getClientOriginalExtension();
			$image->move($destinationPath, $imagename);
			$data['image'] = $imagename;
			@unlink(base_path().'/public/assets/uploads/images/'.$blog->image);
		}
		
		$blog->update($data);

        flash('Blog has been updated successfully.', 'success')->important();

        return redirect('/webmaster/blog');
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
