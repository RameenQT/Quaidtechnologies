<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\EditServiceRequest;
use App\Services;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;
use URL;
use App\Servicecategories;

class ServicesController  extends Controller
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
        return view('services.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
		
         $services = Services::get();

        return Datatables::of($services)
		
			->editColumn('status', function ($services) {
                if($services->status == 'Active')
				{
					return '<span class="label label-success ng-scope">Active</span>';
				}
				else
				{
				
					return '<span class="label label-danger">In Active</span>';
				}
            })
			->editColumn('showonhomepage', function ($services) {
                if($services->showonhomepage == 'Yes')
				{
					return '<span class="label label-success ng-scope">Yes</span>';
				}
				else
				{
				
					return '<span class="label label-danger">No</span>';
				}
            })
           
           ->addColumn('action', function ($services) {
                return '<a href="services/'.$services->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
				<a href="services/'.$services->id.'" class="btn btn-success"><i class="fa fa-eye"></i></a> 
				<form method="post" action="services/'.$services->id.'" style="float:right;padding-right:20%;" >
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="'.csrf_token().'">
				<button type="submit"  class="btn btn-danger" id="deleteuser_'.$services->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</form>
				</form>
				<script>
					$("#deleteuser_'.$services->id.'").click(function(){
						return confirm("Are you sure you want to delete this?");
					});
				</script>' ;
            })
			->rawColumns(['action','status','showonhomepage'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('services.create');
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
		
    public function store(CreateServiceRequest $request)
    {
		$destinationPath = public_path('/assets/uploads/images');
		$imagename = '';
		$topbannerimagename = '';
		
		
		$serviceTitle = $request->title ;
		$slug = $this->slugify($serviceTitle);
		
		
		
		$image = $request->file('image');
		if($image){
			 $imagename = $slug.time().'.'.$image->getClientOriginalExtension();
			 $image->move($destinationPath, $imagename);
			
		}
		
		
		
		Services::create(array_merge($request->all(), ['slug'=>$slug,'image'=>$imagename]));
		

		flash('Services has been created successfully.', 'success')->important();

        return redirect('/webmaster/services');
    }

    public function show($id)
	{
		$service = Services::findOrFail($id);
		
		return view('services.show', compact('service'));
	}
	
    public function edit($id)
    {
        $service = Services::findOrFail($id);
		return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditServiceRequest $request, $id)
    {
		$destinationPath = public_path('/assets/uploads/images');
		
        $service = Services::findOrFail($id);
		
		$serviceTitle = $request->title ;
		$slug = $this->slugify($serviceTitle);
		
		$data['slug'] = $slug;
		$data['title'] = $request->title;
		$data['short_description'] = $request->short_description;
		$data['description'] = $request->description;
		$data['status'] = $request->status;
		$data['showonhomepage'] = $request->showonhomepage;
		$data['meta_title'] = $request->meta_title;
		$data['meta_description'] = $request->meta_description;
		$data['focus_keywords'] = $request->focus_keywords;
		
		
		//image check 
		$image = $request->file('image');
		if(!$image){
			$data['image'] = $service->image;
		}
		else
		{
			$imagename = $slug.time().'.'.$image->getClientOriginalExtension();
			$image->move($destinationPath, $imagename);
			$data['image'] = $imagename;
			@unlink(base_path().'/public/assets/uploads/images/'.$service->small_image);
		}
		
		
		$service->update($data);

        flash('Service has been updated successfully.', 'success')->important();

        return redirect('/webmaster/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Services::findOrFail($id);
		$image = $service->image;
		//unlink image
		@unlink(base_path().'/public/assets/uploads/images/'.$image);
		$service->delete();
		flash('Service has been deleted!', 'success')->important();
        return redirect('/webmaster/services');
    }
}
