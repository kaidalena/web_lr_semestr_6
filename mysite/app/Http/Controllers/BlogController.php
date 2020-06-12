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


class BlogController extends Controller{
    
    public function blog(){
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

    public function updateRecord(){
        header('Content-Type: application/json');
        $newData = (array) json_decode(file_get_contents('php://input'));
        $result = Blog::where('id', $newData["id"])->update($newData);
        // $result = $this->model->save($newData);
        $jsonRespons = "{ \"status\": ";
        if ($result) $jsonRespons .= "1 }";
        else $jsonRespons .= "0 }"; 
        echo $jsonRespons;
    }

    public function saveRecord(BlogRequest $req){
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
            $file = $request->file('userFile')->openFile();
            $counter = 0;

            while (!$file->eof()) {
                $info = explode(';', $file->fgets());
                // dd($info);
                $blog = new Blog();

                $i=0;
                // $blog->topic = trim($info[0]);
                // $blog->message = trim($info[1]); $i++;
                // $blog->img_name = trim($info[$i++]);
                // $blog->img_src = trim($info[$i++]);
                // $blog->created_at = trim($info[$i++]);

                $blog->fill([
                    'topic' => trim($info[$i++]),
                    'message' => trim($info[$i++]),
                    'img_name' => trim($info[$i++]),
                    'img_src' => trim($info[$i++]),
                    'created_at' => trim($info[$i++]),
                ]);
                
                $blog->save();
                $counter++;
            }

            return redirect()->back()->with('status', "Успешно добавлено $counter записей блога");
        }else{
            return redirect()->back()->with('status', "Ошибка считывания из файла");
        }
    }
    
}
