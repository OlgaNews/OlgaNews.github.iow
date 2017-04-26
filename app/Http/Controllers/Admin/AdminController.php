<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;
use App\User;
use App\Category;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Database\Query\Builder;


class AdminController extends Controller
{
    
    protected $h1;
	protected $m;
	protected $m2;
	public function __construct(){
	$this->h1='Актуальные новости';
	$this->m='Мудрость приходит вместе со способностью быть спокойным. Просто СМОТРИ и СЛУШАЙ. Больше ничего не нужно.';
	$this->m2='У нас один рот и два уха, значит мы должны больше слушать, чем говорить. Но пара глаз расположена выше ушей, поэтому мы должны видеть, а не верить слухам. Над всем этим есть мозг, поэтому мы обязаны сначала думать, прежде чем увидев отрывок услышав слухи, выливать все через рот.';
               
	}
    public function deshboard(Request $request){
         $value = $request->session()->all();
         //$value_a=array_values($value);
         //dump($value_a);
            if(end($value)==1)
            return view('deshboard')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2]);
            else
                return redirect('/');
        }
      
  
        public function add(Request $request){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
                $categories=Category::select('id','name')->get();
            return view('add-content')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'categories'=>$categories]);
           }
            else
                return redirect('/');
         }
        
        
        
           
	public function store(Request $request){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
 
            $this->validate($request,[
	'title'=>'required|max:255',
        'des'=>'required',
	'text'=>'required'
	]);
        $data=$request->all();
        //dump($data);
         $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        $alias= str_replace($rus,$lat,$data['title']);
	$article=new Article;
	$article->fill($data);
         if ($_FILES['uploadfile']['size'] > 0){
        if(!file_exists('img/')) mkdir('img/');
            if(isset($_FILES['uploadfile']['name']))
            {
            $f='img/'.$_FILES['uploadfile']['name'];
                while(file_exists($f)):
                $f=str_replace('.','_c.',$f); 
                endwhile;
            if(move_uploaded_file($_FILES['uploadfile']['tmp_name'],$f)): 
           // echo 'Картинка загружена успешно!'; 
            endif;
            } 
            else $f='../img/header.jpeg';
            $f='../'.$f;
         }
         else $f='../../img/news.jpg';
        $article->alias= $alias;
	$article->img=$f;
        $article->tags= $data['tags'];
        $article->source= $data['source'];
        $article->cat= $data['cat'];
        $article->save();
	return redirect('admin/');
           }
            else
                return redirect('/');
 	
        }

         public function delete(Request $request){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
                $articles= Article::select('id','title','des','alias','cat')->get();
                $categories=Category::select('id','name','alias')->get(); 
            return view('delete-content')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'articles'=>$articles,'categories'=>$categories]);
            }
            else
                return redirect('/');
        }
        
        
         public function artdelete(Request $request,$id){
         
             $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
        // echo 'artdelete';
        // dump($value);
            if($v==1){
                return view('delcontent')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'id'=>$id]);
            }
            else
                return redirect('/');
        }
        
        public function delstore(Request $request,$id){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
        // dump($request);
         
            if($v==1){
               $del=$request->request->all();
            // dump($del);   
               foreach ($del as $key=>$d){
               if(substr($key,0,3)=="DEL"){ $articles= Article::select('id')->where('id',$id)->limit(1)->delete();    
               $attr=1;
                }
            }}
            else
                return redirect('/');
            
             return redirect('admin/');
        }

        public function edit(Request $request){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
                $articles= Article::select('id','title','des','alias','cat')->get();
                $categories=Category::select('id','name','alias')->get(); 
            return view('edit-content')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'articles'=>$articles,'categories'=>$categories]);
            }
            else
                return redirect('/');
        }
     
        public function editpost(Request $request,$id){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
                $article= Article::all()->where('id',$id)->first();
                $categories=Category::select('id','name','alias')->get(); 
//dump($article);
 return view('edit-cont')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'article'=>$article,'categories'=>$categories]);
            }
            else
                return redirect('/');
             return redirect('admin/');
            
        }
    
	public function editstore(Request $request,$id){
            $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){

       /*     $this->validate($request,[
	'title'=>'required|max:255',
        'des'=>'required',
	'text'=>'required'
	]);*/
          //  dump($value);
       $data=$request->all();
       // dump($_FILES);
         $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        $alias= str_replace($rus,$lat,$data['title']);
	$article=Article::find($id);
	$article->fill($data);
        
    if ($_FILES['uploadfile']['size'] > 0){
        if(!file_exists('img/')) mkdir('img/');
            if(isset($_FILES['uploadfile']['name']))
            {
            $f='img/'.$_FILES['uploadfile']['name'];
                while(file_exists($f)):
                $f=str_replace('.','_c.',$f); 
                endwhile;
            if(move_uploaded_file($_FILES['uploadfile']['tmp_name'],$f)): 
           // echo 'Картинка загружена успешно!'; 
            endif;
            } 
            else $f='../img/header.jpeg';
            $f='../'.$f;
 	$article->img=$f;
            }
        $article->alias= $alias;
        $article->tags= $data['tags'];
        $article->source= $data['source'];
        $article->cat= $data['cat'];
        $article->created_at= $data['created_at'];
        $article->updated_at= $data['updated_at'];

        $article->save();
	return redirect('admin/');
	            }
            else
                return redirect('/'); 
        }
        
        
                public function addcat(Request $request){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
                $categories=Category::select('id','name')->get();
            return view('add-cat')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'categories'=>$categories]);
           }
            else
                return redirect('/');
         }

	public function storecat(Request $request){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
 
            $this->validate($request,[
	'name'=>'required|max:100|unique:categories'
	]);
        $data=$request->all();
        //dump($data);
         $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        $alias= str_replace($rus,$lat,$data['name']);
	$category=new Category;
	//$category->fill($data);
        $category->name=$data['name'];
        $category->alias= $alias;
        $category->save();
	return redirect('admin/');
           }
            else
                return redirect('/');
 	
        }

                 public function deletecom(Request $request){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
                $articles= Article::select('id','title','des','alias','cat')->get();
               $comments= Comment::select('id','id_u','text','newsid')->orderBy('newsid')->get();
           //  dump($articles); 
            return view('del_com')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'articles'=>$articles,'comments'=>$comments]);
            }
            else
                return redirect('/');
        }
        
        
         public function comdelete(Request $request,$id){
         
             $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
        // echo 'artdelete';
        // dump($value);
            if($v==1){
                return view('delcomment')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'id'=>$id]);
            }
            else
                return redirect('/');
        }
        
        public function delcom(Request $request,$id){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
        // dump($request);
         
            if($v==1){
               $del=$request->request->all();
            // dump($del);   
               foreach ($del as $key=>$d){
               if(substr($key,0,3)=="DEL"){ $comments= Comment::select('id')->where('id',$id)->limit(1)->delete();    
               $attr=1;
                }
            }}
            else
                return redirect('/');
            
             return redirect('admin/');
        }

                 public function deleteuser(Request $request){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
         //dump($value_a);
            if($v==1){
                $users= User::select('id','name','email')->get();
            //  dump($articles); 
            return view('del_user')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'users'=>$users]);
            }
            else
                return redirect('/');
        }
        
        
         public function userdelete(Request $request,$id){
         
             $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
        // echo 'artdelete';
        // dump($value);
            if($v==1){
                return view('deluser')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'id'=>$id]);
            }
            else
                return redirect('/');
        }
        
        public function deluser(Request $request,$id){
         $value = $request->session()->all();
         $v=0;
         foreach ($value as $key=>$val){
          if(substr($key,0,9)=='login_web') $v=$val;   
         }
         //$value_a=array_values($value);
        // dump($request);
         
            if($v==1){
               $del=$request->request->all();
            // dump($del);   
               foreach ($del as $key=>$d){
               if(substr($key,0,3)=="DEL"){
                   $users= User::select('id','name','email')->where('id',$id)->first();
                 //  dump($users);
                   if($users->id <> 1){
                   $users= User::select('id','name','email')->where('id',$id)->limit(1)->delete();    
               $attr=1;
                   }
                }
            }}
            else
                return redirect('/');
            
              return redirect('admin/');
        }

      

//
}
