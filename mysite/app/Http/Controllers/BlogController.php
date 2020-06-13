<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\Http\Requests\BlogRequest;
use app\models\validators\Validator as ValidatorsValidator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use DateTime;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller{
    
    public function index(){
        $blogModel = new Blog();
        $data = [
            'blogs' => $blogModel->selectAll(),
            'controller' => $this
        ];
        return view('blog')->with($data);
    }

    public function upload(){
        return view('blogUpload');
    }

    public function edit(){
        header('Content-Type: application/json');
        $newData = (array) json_decode(file_get_contents('php://input'));
        dd($newData);
        $result = $this->model->save($newData);
        //возвращаем json
        $status =  ($result) ? 1 : 0;
        echo "{ \"status\": \"$status\"}";
    }

    public function create(BlogRequest $req){
        $model = new Blog();
        $model->topic =  trim($_POST['topic']);
        $model->message = trim($_POST['message']);
        if ($req->hasFile('userFile')){
            $file = $req->file('userFile');
            $file->move(public_path()."/img/", $req->file('userFile')->getClientOriginalName());
            $model->img_name = $req->file('userFile')->getClientOriginalName();
            $model->img_src = public_path().'/img';
        }
        
        $status = $model->save();
        echo $status;
        return redirect()->route('blogEditor')->with('status', ($status)? "Добавление прошло успешно":"Ошибка сохранения");
    }

    public function loadBlogs(Request $request){

    if ($request->hasFile('userFile')){
        $file = $request->file('userFile');

        $blogs = [];

        $fileR = fopen($file, "r");
        
        for($i=0; !feof($fileR); $i++){
            $str = fgets($fileR);
            if (empty($str)) continue;
            $blogs[$i] = explode(';', $str);
        }

        fclose($fileR);
        $counter = 0;
        foreach($blogs as $blog){
            // $temp = explode(',', $blog);
            $temp = $blog;
            $newBlog = new Blog();
            if(strlen($temp[0])>0){
                $newBlog->topic = $temp[0];
                $newBlog->message = $temp[1];
                $newBlog->img_name = trim($temp[2]);
                $newBlog->img_src = trim($temp[3]);
                $newBlog->created_at = trim($temp[4]);
                $newBlog->save();
                $counter++;
            }
        }
        return redirect()->back()->with('status', "Успешно добавлено $counter записей блога");
    }
    
    return redirect()->back()->with('status', "Ошибка считывания из файла");
}

}
