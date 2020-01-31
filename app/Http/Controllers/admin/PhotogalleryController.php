<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreatePhotoGalleryRequest;
use App\Http\Requests\EditPhotoGalleryRequest;
use App\Photogallery;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Image;
use Response;

class PhotogalleryController  extends Controller
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
        return view('photogallery.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
	
		$photogallery = Photogallery::get();
		
		
		
		return Datatables::of($photogallery)
            
			->editColumn('photo', function ($photogallery) {
               return '<img src="/assets/uploads/images/'.$photogallery->photo .'" style="width:100px;height:100px;"/>';
            })
			->editColumn('display', function ($photogallery) {
                if($photogallery->display == 'Y')
				{
					return '<span class="label label-success ng-scope">Active</span>';
				}
				else
				{
				
					return '<span class="label label-danger">In Active</span>';
				}
            })
			->addColumn('action', function ($photogallery) {
                return '<a href="photogallery/'.$photogallery->id.'" class="btn btn-success"><i class="fa fa-eye"></i></a>
				<a href="photogallery/'.$photogallery->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
				<form method="post" action="photogallery/'.$photogallery->id.'" style="float:right;padding-right:21%;" >
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="'.csrf_token().'">
				<button type="submit"  class="btn btn-danger" id="deleteuser_'.$photogallery->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</form>
				</form>
				<script>
					$("#deleteuser_'.$photogallery->id.'").click(function(){
						return confirm("Are you sure you want to delete this?");
					});
				</script>' ;
            })
			->rawColumns(['action','display','photo'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		 return view('photogallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePhotoGalleryRequest $request)
    {
		$destinationPath = public_path('/assets/uploads/images');
		
		
		$imagename = '';
		
		$image = $request->file('photo');
		if($image){
			 $imagename = 'photogallery'.time().'.'.$image->getClientOriginalExtension();
			 $image->move($destinationPath, $imagename);
			
		}
		
		Photogallery::create(array_merge($request->all(), ['photo'=>$imagename]));

        flash('Phot Gallery Image has been created successfully.', 'success')->important();

        return redirect('/webmaster/photogallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
    public function show($id)
    {
	 	$photogallery = Photogallery::findOrFail($id);
		
        return view('photogallery.show', compact('photogallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$photogallery = Photogallery::findOrFail($id);
		
		return view('photogallery.edit',['photogallery'=>$photogallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPhotoGalleryRequest $request, $id)
    {
        $photogallery = Photogallery::findOrFail($id);
      
        $data['story'] = $request->story;
        $data['display'] = $request->display;
        $data['type'] = $request->type;
        
        $destinationPath = public_path('/assets/uploads/images');
		
		//image check 
		$image = $request->file('photo');
		if(!$image){
			$data['photo'] = $photogallery->photo;
		}
		else
		{
			$imagename = 'photogallery'.time().'.'.$image->getClientOriginalExtension();
			$image->move($destinationPath, $imagename);
			$data['photo'] = $imagename;
			@unlink(base_path().'/public/assets/uploads/images/'.$photogallery->photo);
		}
		
		
        $photogallery->update($data);

        flash('Photo Gallery Image has been updated successfully.', 'success')->important();

        return redirect('/webmaster/photogallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
		$photogallery = Photogallery::findOrFail($id);
		
		$photo = $photogallery->photo;
		//unlink image
		@unlink(base_path().'/public/assets/uploads/images/'.$photo);
		
        $photogallery->delete();
		flash('Photo Gallery Image has been deleted!', 'success')->important();
        return redirect('/webmaster/photogallery');
    }
}
