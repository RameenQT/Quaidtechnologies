<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\EditTeamRequest;
use App\Team;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;
use URL;

class TeamController  extends Controller
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
        return view('team.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
		
         $team = Team::get();

        return Datatables::of($team)
		
			->editColumn('status', function ($team) {
                if($team->status == 'Active')
				{
					return '<span class="label label-success ng-scope">Active</span>';
				}
				else
				{
				
					return '<span class="label label-danger">In Active</span>';
				}
            })
           ->editColumn('image', function ($team) {
			   
			   return '<img src="/assets/uploads/images/'. $team->image .'" width="75px;" height="75px;"/>' ;
                
            })
           ->addColumn('action', function ($team) {
                return '<a href="team/'.$team->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
				<form method="post" action="team/'.$team->id.'" style="float:right;padding-right:35%;" >
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="'.csrf_token().'">
				<button type="submit"  class="btn btn-danger" id="deleteuser_'.$team->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</form>
				</form>
				<script>
					$("#deleteuser_'.$team->id.'").click(function(){
						return confirm("Are you sure you want to delete this?");
					});
				</script>' ;
            })
			->rawColumns(['action','status','image'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('team.create');
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
    public function store(CreateTeamRequest $request)
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
		
		Team::create(array_merge($request->all(), ['slug'=>$slug,'image'=>$imagename]));
		

		flash('Team Member has been created successfully.', 'success')->important();

        return redirect('/webmaster/team');
    }

   
    public function edit($id)
    {
		$team = Team::findOrFail($id);
		return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTeamRequest $request, $id)
    {
		$destinationPath = public_path('/assets/uploads/images');
		
        $team = Team::findOrFail($id);
		
		$title = $request->title ;
		$slug =  $this->slugify($title);
		
		
		$data['title'] = $request->title;
		$data['category'] = $request->category;
		$data['designation'] = $request->designation;
		$data['status'] = $request->status;
		$data['description'] = $request->description;
		
		//image check 
		$image = $request->file('image');
		if(!$image){
			$data['image'] = $team->image;
		}
		else
		{
			$imagename = $slug.time().'.'.$image->getClientOriginalExtension();
			$image->move($destinationPath, $imagename);
			$data['image'] = $imagename;
			@unlink(base_path().'/public/assets/uploads/images/'.$team->image);
		}
		
		$team->update($data);

        flash('Team Member has been updated successfully.', 'success')->important();

        return redirect('/webmaster/team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
		$image = $team->image;
		//unlink image
		@unlink(base_path().'/public/assets/uploads/images/'.$image);
		$team->delete();
		flash('Team Member has been deleted!', 'success')->important();
        return redirect('/webmaster/team');
    }
}
