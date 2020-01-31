<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
        return view('users.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allData()
    {
        $users = User::query();

        return Datatables::of($users)
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/Y h:i A');
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->format('d/m/Y h:i A');
            })
			->addColumn('action', function ($user) {
                return '<a href="users/'.$user->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a> 
				<form method="post" action="users/'.$user->id.'" style="float:right;padding-right:54%;" >
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="'.csrf_token().'">
				<button type="submit" style="display:none;" class="btn btn-danger" id="deleteuser_'.$user->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				</form>
				</form>
				<script>
					$("#deleteuser_'.$user->id.'").click(function(){
						return confirm("Are you sure you want to delete this?");
					});
				</script>' ;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$added_by = Auth::user()->id;
        return view('users.create',['added_by'=>$added_by]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'added_by' => $request->added_by,
            'password' => bcrypt($request->password),
        ]);

        flash('User has been created successfully.', 'success')->important();

        return redirect('/webmaster/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
      
        $user_update  = [
            'name' => $request->name,
            'email' => $request->email,
            'edited_by' => Auth::user()->id,
        ];

        if($request->password) {
            $user_update['password'] = bcrypt($request->password);
        }

        $user->update($user_update);

        flash('User has been updated successfully.', 'success')->important();

        return redirect('/webmaster/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
		flash('User has been deleted!', 'success')->important();
        return redirect('/webmaster/users');
    }
}
