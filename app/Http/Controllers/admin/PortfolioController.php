<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreatePortfolioRequest;
use App\Http\Requests\EditPortfolioRequest;
use App\Portfolio;
use DB;
use App\PortfolioGallery;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;
use URL;

class PortfolioController  extends Controller
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
        return view('portfolio.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
		
         $portfolio = Portfolio::get();

        return Datatables::of($portfolio)
		
			->editColumn('status', function ($portfolio) {
                if($portfolio->status == 'Active')
				{
					return '<span class="label label-success ng-scope">Active</span>';
				}
				else
				{
				
					return '<span class="label label-danger">In Active</span>';
				}
            })
           ->editColumn('mianImage', function ($portfolio) {
			   
			   return '<img src="/assets/uploads/images/'. $portfolio->mianImage .'" width="75px;" height="75px;"/>' ;
                
            })
           ->addColumn('action', function ($portfolio) {
                return '<a href="portfolio/'.$portfolio->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
						<a href="portfolio/'.$portfolio->id.'" class="btn btn-success"><i class="fa fa-eye"></i></a> 				
				<form method="post" action="portfolio/'.$portfolio->id.'" style="float:right;padding-right:1%;" >
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="'.csrf_token().'">
				<button type="submit"  class="btn btn-danger" id="deleteuser_'.$portfolio->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</form>
				</form>
				<script>
					$("#deleteuser_'.$portfolio->id.'").click(function(){
						return confirm("Are you sure you want to delete this?");
					});
				</script>' ;
            })
			->rawColumns(['action','status','mianImage'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('portfolio.create');
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
    public function store(CreatePortfolioRequest $request)
    {
		
		$title = $request->title ;
		$slug =  $this->slugify($title);
		$destinationPath = public_path('/assets/uploads/images');
		
	
		
		
		$slidrThumb = $request->file('slidrThumb');
		if($slidrThumb){
			 $slidrThumbName = 'slidrThumb'.time().'.'.$slidrThumb->getClientOriginalExtension();
			 $slidrThumb->move($destinationPath, $slidrThumbName);
			
		}
		$mianImage = $request->file('mianImage');
		if($mianImage){
			 $mianImageName = 'mianImage'.time().'.'.$mianImage->getClientOriginalExtension();
			 $mianImage->move($destinationPath, $mianImageName);
			
		}
		
		$desImage1 = $request->file('desImage1');
		if($desImage1){
			 $desImage1Name = 'desImage1'.time().'.'.$desImage1->getClientOriginalExtension();
			 $desImage1->move($destinationPath, $desImage1Name);
			
		}
		
		$desImage2 = $request->file('desImage2');
		if($desImage2){
			 $desImage2Name = 'desImage2'.time().'.'.$desImage2->getClientOriginalExtension();
			 $desImage2->move($destinationPath, $desImage2Name);
			
		}
		
		$clientVideo = $request->file('clientVideo');
		if($clientVideo){
			 $clientVideoName = 'clientVideo'.time().'.'.$clientVideo->getClientOriginalExtension();
			 $clientVideo->move($destinationPath, $clientVideoName);
			
		}
		
		$portfolio = Portfolio::create(array_merge($request->all(), ['slug'=>$slug,'slidrThumb'=>$slidrThumbName,'mianImage'=>$mianImageName,'desImage1'=>$desImage1Name,'desImage2'=>$desImage2Name,'clientVideo'=>$clientVideoName]));
		
		if($request->file('PortfolioGallery'))
		{
			foreach($_FILES["PortfolioGallery"]["tmp_name"] as $key=>$tmp_name) 
			{
				$file_name=$_FILES["PortfolioGallery"]["name"][$key];
				$file_tmp=$_FILES["PortfolioGallery"]["tmp_name"][$key];
				$ext=pathinfo($file_name,PATHINFO_EXTENSION);
					
				$filename=basename($file_name,$ext);
				$newFileName=$filename.time().".".$ext;
				move_uploaded_file($file_tmp=$_FILES["PortfolioGallery"]["tmp_name"][$key],"assets/uploads/images/".$newFileName);
					
					
				$input['portfolioId'] = $portfolio->id ;
				$input['image'] = $newFileName ;
				PortfolioGallery::create($input);
			}
			
		}
		
		
		flash('Portfolio has been created successfully.', 'success')->important();
		return redirect('/webmaster/portfolio');
    }

	public function show($id)
    {
		$portfolio = Portfolio::findOrFail($id);
		$portfolioGallery = PortfolioGallery::where('portfolioId','=',$portfolio->id)->get();
		return view('portfolio.show', compact('portfolio','portfolioGallery'));
    }
	public function deleteImage(request $request , $imageId  , $porId)
	{
		$porId = $request->porId;
		$imageId = $request->imageId;
		
		$pimage = PortfolioGallery::findOrFail($imageId);
		
		@unlink(base_path().'/public/assets/uploads/images/'.$pimage->image);
		
		$pimage->delete();
		flash('Image has been deleted!', 'success')->important();
        return redirect('/webmaster/portfolio/'.$porId);
	}
    public function edit($id)
    {
		$portfolio = Portfolio::findOrFail($id);
		$portfolioGallery = PortfolioGallery::where('portfolioId','=',$portfolio->id)->get();
		return view('portfolio.edit', compact('portfolio','portfolioGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPortfolioRequest $request, $id)
    {
		
		$destinationPath = public_path('/assets/uploads/images');
		
        $portfolio = Portfolio::findOrFail($id);
		
		$title = $request->title ;
		//$slug =  $this->slugify($title);
		
		
		$data['type'] = $request->type;
		$data['title'] = $request->title;
		$data['category'] = $request->category;
		$data['tagLine'] = $request->tagLine;
		$data['compatibility'] = $request->compatibility;
		$data['seller'] = $request->seller;
		$data['size'] = $request->size;
		$data['languages'] = $request->languages;
		$data['ageRating'] = $request->ageRating;
		$data['copyright'] = $request->copyright;
		$data['playStoreLink'] = $request->playStoreLink;
		$data['price'] = $request->price;
		$data['appStoreLine'] = $request->appStoreLine;
		$data['description'] = $request->description;
		$data['shortDescription'] = $request->shortDescription;
		$data['clientName'] = $request->clientName;
		$data['clientWords'] = $request->clientWords;
		//image check 
		$slidrThumb = $request->file('slidrThumb');
		if(!$slidrThumb){
			$data['slidrThumb'] = $portfolio->slidrThumb;
		}
		else
		{
			$slidrThumbname = 'slidrThumb'.time().'.'.$slidrThumb->getClientOriginalExtension();
			$slidrThumb->move($destinationPath, $slidrThumbname);
			$data['slidrThumb'] = $slidrThumbname;
			@unlink(base_path().'/public/assets/uploads/images/'.$portfolio->slidrThumb);
		}
		$mianImage = $request->file('mianImage');
		if(!$mianImage){
			$data['mianImage'] = $portfolio->mianImage;
		}
		else
		{
			$mianImagename = 'mianImage'.time().'.'.$mianImage->getClientOriginalExtension();
			$mianImage->move($destinationPath, $mianImagename);
			$data['mianImage'] = $mianImagename;
			@unlink(base_path().'/public/assets/uploads/images/'.$portfolio->mianImage);
		}
		$desImage1 = $request->file('desImage1');
		if(!$desImage1){
			$data['desImage1'] = $portfolio->desImage1;
		}
		else
		{
			$desImage1name = 'desImage1'.time().'.'.$desImage1->getClientOriginalExtension();
			$desImage1->move($destinationPath, $desImage1name);
			$data['desImage1'] = $desImage1name;
			@unlink(base_path().'/public/assets/uploads/images/'.$portfolio->desImage1);
		}
		$desImage2 = $request->file('desImage2');
		if(!$desImage2){
			$data['desImage2'] = $portfolio->desImage2;
		}
		else
		{
			$desImage2name = 'desImage2'.time().'.'.$desImage2->getClientOriginalExtension();
			$desImage2->move($destinationPath, $desImage2name);
			$data['desImage2'] = $desImage2name;
			@unlink(base_path().'/public/assets/uploads/images/'.$portfolio->desImage2);
		}
		$clientVideo = $request->file('clientVideo');
		if(!$clientVideo){
			$data['clientVideo'] = $portfolio->clientVideo;			
		}
		else {
			$clientVideoName = 'clientVideo'.time().'.'.$clientVideo->getClientOriginalExtension();
			 $clientVideo->move($destinationPath, $clientVideoName);
			 $data['clientVideo'] = $clientVideoName;
			@unlink(base_path().'/public/assets/uploads/images/'.$portfolio->clientVideo);
		}

		$portfolio->update($data);
		$portfolioGallery = PortfolioGallery::where('portfolioId','=',$portfolio->id)->get();
		if($request->file('PortfolioGallery'))
		{
			foreach($_FILES["PortfolioGallery"]["tmp_name"] as $key=>$tmp_name) 
			{
				$file_name=$_FILES["PortfolioGallery"]["name"][$key];
				$file_tmp=$_FILES["PortfolioGallery"]["tmp_name"][$key];
				$ext=pathinfo($file_name,PATHINFO_EXTENSION);
					
				$filename=basename($file_name,$ext);
				$newFileName=$filename.time().".".$ext;
				foreach($portfolioGallery as $image)
				{
					@unlink(base_path().'/public/assets/uploads/images/'.$image->image);
					$image->delete();
				}
				move_uploaded_file($file_tmp=$_FILES["PortfolioGallery"]["tmp_name"][$key],"assets/uploads/images/".$newFileName);
					
					
				$input['portfolioId'] = $portfolio->id ;
				$input['image'] = $newFileName ;
				PortfolioGallery::create($input);
			}
			
		}
			
			flash('Portfolio has been updated successfully.', 'success')->important();

        return redirect('/webmaster/portfolio');
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
