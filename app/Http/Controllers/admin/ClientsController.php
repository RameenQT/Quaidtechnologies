<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateClientsRequest;
use App\Http\Requests\EditClientsRequest;
use App\Clients;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;
use URL;

class ClientsController  extends Controller
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
        return view('clients.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
		
         $clients = Clients::get();

        return Datatables::of($clients)
		
			->editColumn('status', function ($clients) {
                if($clients->status == 'Active')
				{
					return '<span class="label label-success ng-scope">Active</span>';
				}
				else
				{
				
					return '<span class="label label-danger">In Active</span>';
				}
            })
           ->editColumn('image', function ($clients) {
			   
			   return '<img src="/assets/uploads/images/'. $clients->image .'" width="75px;" height="75px;"/>' ;
                
            })
			->editColumn('url', function ($clients) {
			   
			   return ' <a href="'.$clients->url.'" target="parent">'.$clients->url.'</a> ';
                
            })
           ->addColumn('action', function ($clients) {
                return '<a href="clients/'.$clients->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
				<form method="post" action="clients/'.$clients->id.'" style="float:right;padding-right:35%;" >
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="'.csrf_token().'">
				<button type="submit"  class="btn btn-danger" id="deleteuser_'.$clients->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</form>
				</form>
				<script>
					$("#deleteuser_'.$clients->id.'").click(function(){
						return confirm("Are you sure you want to delete this?");
					});
				</script>' ;
            })
			->rawColumns(['action','status','image','url'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('clients.create');
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
    public function store(CreateClientsRequest $request)
    {
		$destinationPath = public_path('/assets/uploads/images');
		
		
		$imagename = '';
		$title = $request->title ;
		$slug =  $this->slugify($title);
		
		$image = $request->file('image');
		if($image){
			 $imagename = $slug.time().'.'.$image->getClientOriginalExtension();
			 $image->move($destinationPath, $imagename);
			
		}
		
		Clients::create(array_merge($request->all(), ['image'=>$imagename]));
		

		flash('Client has been created successfully.', 'success')->important();

        return redirect('/webmaster/clients');
    }

   
    public function edit($id)
    {
		$clients = Clients::findOrFail($id);
		return view('clients.edit', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditClientsRequest $request, $id)
    {
		$destinationPath = public_path('/assets/uploads/images');
		
        $clients = Clients::findOrFail($id);
		
		$title = $request->title ;
		$slug =  $this->slugify($title);
		
		
		$data['title'] = $request->title;
		$data['url'] = $request->url;
		$data['status'] = $request->status;
		
		//image check 
		$image = $request->file('image');
		if(!$image){
			$data['image'] = $clients->image;
		}
		else
		{
			$imagename = $slug.time().'.'.$image->getClientOriginalExtension();
			$image->move($destinationPath, $imagename);
			$data['image'] = $imagename;
			@unlink(base_path().'/public/assets/uploads/images/'.$clients->image);
		}
		
		$clients->update($data);

        flash('Client has been updated successfully.', 'success')->important();

        return redirect('/webmaster/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Clients::findOrFail($id);
		$image = $clients->image;
		//unlink image
		@unlink(base_path().'/public/assets/uploads/images/'.$image);
		$clients->delete();
		flash('client has been deleted!', 'success')->important();
        return redirect('/webmaster/clients');
    }
}
