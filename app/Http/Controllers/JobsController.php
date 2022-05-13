<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Comment;
use File;
class JobsController extends Controller
{
	
	function show()
  {	
		$data = Jobs::all();
		return view('admin',['Hr'=>$data]);
	  
  }
  
	
	function edit($id)
  {	
		$data = Jobs::find($id);
		$comment = Comment::where('candidateid', $id)->orderBy('id', 'desc')->get();
		return view('edit',['data'=>$data,'comment'=>$comment]);
	  
  }
  

  
  function comment(Request $req)
  {
	$comment= new Comment;
	$comment->candidateid=$req->id;
	$comment->comment=$req->comment;
	$comment->status=$req->status;
	$comment->date=date("M d");
	$comment->save();
	return redirect('admin/edit/'.$req->id);
	  
  }
	
	
	function update(Request $req)
  {	
		$data = Jobs::find($req->id);
		$data->status=$req->status;
		$data->save();
		return redirect('admin/edit/'.$req->id);
	  
  }
  
  function delete(Request $req)
  {	
		$data = Jobs::find($req->id);
		$comment = Comment::where('candidateid', $req->id);
		unlink($req->cv);
		$data->delete();
		$comment->delete();
		return redirect('admin');
	  
  }
	
  function save(Request $req)
  {
	$file = strtolower(pathinfo($req->file('file')->store(''),PATHINFO_EXTENSION));
	if($file == "pdf")
	{
	$apply= new Jobs;
	$apply->first_name=$req->firstname;
	$apply->last_name=$req->lastname;
	$apply->position=$req->position;
	$apply->salary=$req->min . " - " .$req->max;
	$apply->skills=$req->skills;
	$apply->linkedin=$req->linkedin;
	$apply->cv=$req->file('file')->store(''); 
	$apply->save();
	echo '<p class="text-success"><h1>თქვენი განაცხადი მიღებულია</h1></p>';
			}
			else
			{
				echo '<p class="text-danger"><h1>დაშვებულია მხოლოდ PDF ფორმატი</h1></p>';
			}
		 }	
	}
