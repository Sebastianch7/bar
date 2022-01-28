<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Redirect,Response;

class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
	return view('user',[
            'users' => DB::table('users')->get(),
        ]);
}

public function store(Request $request)
{

$r=$request->validate([
'name' => 'required',
'email' => 'required',

]);

$uId = $request->user_id;
User::updateOrCreate(['id' => $uId],['name' => $request->name, 'email' => $request->email]);
if(empty($request->user_id))
$msg = 'User created successfully.';
else
$msg = 'User data is updated successfully';
return redirect()->route('users.index')->with('success',$msg);
}

/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function show($id)
{
$where = array('id' => $id);
$user = User::where($where)->first();
return Response::json($user);
//return view('users.show',compact('user'));
}

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function edit($id)
{
$where = array('id' => $id);
$user = User::where($where)->first();
return Response::json($user);
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function destroy($id)
{
$user = User::where('id',$id)->delete();
return Response::json($user);
//return redirect()->route('users.index');
}
}