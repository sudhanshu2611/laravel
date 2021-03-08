<?php

namespace App\Http\Controllers;
use App\Models\AddPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddPostController extends Controller
{
  
   //
	 public function index()
    {	
	
$posts = DB::table('add_posts');
// foreach($posts as $p){
	// echo $p->posttitle;
// }


$u= Auth::user();
//echo $u->id;

$data = DB::table('add_posts')
    ->join('users', 'users.id', '=', 'add_posts.id')
    ->select('*')
	->distinct()
    ->get();


// echo '<pre>';
// print_R($data);
// exit;
       return view('addpost',['post'=>$posts->simplePaginate("5")]);
    }
	 private $form_rules =[
            'posttitle' => ['required', 'string'],
            'postcontent' => ['required', 'string'],
            'author_name' => ['required', 'string'],
            'catogory' => ['required', 'string'],
        ];
	/* protected function validator(array $data)
    {
        return Validator::make($data, [
            'posttitle' => ['required', 'string'],
            'postcontent' => ['required', 'string'],
            'author_name' => ['required', 'string'],
            'catogory' => ['required', 'string'],
        ]);
    }*/
	 protected function create(Request $data)
    {

 $path = public_path().'/uploads/images/';
		 $this->validate($data, $this->form_rules);
			$file = $data->filename;
          $filename = $file->getClientOriginalName();
          $file->move($path, $filename);
         AddPost::create([
            'posttitle' => $data['posttitle'],
            'postcontent' => $data['postcontent'],
            'author_name' => $data['author_name'],
            'catogory' => $data['catogory'],
            'filename' => $filename,
        ]);
		return redirect()->back()->with('message', 'IT WORKS!');
    }
		public function updatepost(Request $request){

			 $employee = AddPost::find($request['id']);

			 if($request->filename != ''){        
				  $path = public_path().'/uploads/images/';

				  //code for remove old file
				  if($employee->filename != ''  && $employee->filename != null){
					   $file_old = $path.$employee->filename;
					   unlink($file_old);
				  }

				  //upload new file
				  $file = $request->filename;
				  $filename = $file->getClientOriginalName();
				  $file->move($path, $filename);

				  //for update in table
				  $employee->update(
					[
						'posttitle' => $request['posttitle'],
						'postcontent' => $request['postcontent'],
						'author_name' => $request['author_name'],
						'catogory' => $request['catogory'],
						'filename' => $filename,
					]
					);
			 }
return redirect()->back()->with('message', 'IT WORKS!');
		}
		function getajaxdata(){
			
			return response()->json(["html"=>"<h2>WOR</h2>"],200);
		}
}
