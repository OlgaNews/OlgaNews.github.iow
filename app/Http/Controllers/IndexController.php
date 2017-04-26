<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\User;
use App\Category;
use App\Http\Controllers\Auth\RegisterController;
 use Illuminate\Database\Query\Builder;

class IndexController extends Controller
{
    //
	protected $h1;
	protected $m;
	protected $m2;
        protected $z;
	public function __construct(){
	
        $this->h1='Актуальные новости';
	$this->m='Мудрость приходит вместе со способностью быть спокойным. Просто СМОТРИ и СЛУШАЙ. Больше ничего не нужно.';
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',5)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',5)->first()->text;

        }
	public function index(Request $request){
         $data=$request->all();
        // dump($data);
            if(isset($data['np'])) $np=$data['np'];
          else $np=1;
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',1)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',1)->first()->text;
        $count=Article::count();
        $count_page=ceil($count/5);
        $skip=($np-1)*6;
        $articles=Article::select('id','title','des','img','cat','alias')->skip($skip)->take(6)->get();
	$categories=Category::select('id','name','alias')->get();
              
        //dump($articles);
	return view('page')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'articles'=>$articles,'categories'=>$categories,'count_page'=>$count_page,'np'=>$np]);
	}
	
        public function show($cat,$id){
 	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',2)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',2)->first()->text;
        //$article=Article::find($id);
	$article=Article::select(['id','title','text','img','source','alias','updated_at'])-> where('alias',$id)->first();
	//$comment= Comment::select(['id','id_u','text','created_at'])-> where('newsid',$id)->get();
        $comment_us= Comment::with('user')-> where('newsid',$article->id)->get();
        //dump($article);
        //dump($comment_us);
        return view('article-content')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'article'=>$article,'comment_us'=>$comment_us]);
        }
              
       
        public function acom($id){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',1)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',1)->first()->text;
           $article=Article::select(['id','title','text','img','source'])-> where('id',$id)->first();
            $comment_us= Comment::with('user')-> where('newsid',$article->id)->get();
	return view('add-coment')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'article'=>$article,'comment_us'=>$comment_us]);
	}
	
        
        public function scom(Request $request,$newsid,$id_u){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',2)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',2)->first()->text;

            $this->validate($request,[
		'text'=>'required'
	]);
	$data=$request->all();
	$comment=new Comment;
	$comment->fill($data);
        $comment->newsid=$newsid;
        $comment->id_u=$id_u;
	$comment->save();
        $article=Article::select(['id','title','text','img','source'])-> where('id',$newsid)->first();
        $comment_us= Comment::with('user')-> where('newsid',$newsid)->get();
         return view('article-content')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'article'=>$article,'comment_us'=>$comment_us]);
         }
        
         
         public function category(){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',3)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',3)->first()->text;
        $categories=Category::select('id','name','alias')->get();
	$articles=Article::select('id','title','des','img','cat','alias')->orderBy('cat')->get();
        /*$articles_c=$articles->where('cat','=','1');*/
       	return view('category')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'articles'=>$articles,'categories'=>$categories]);
	}
 
        
         public function categoryshow($id){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',3)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',3)->first()->text;
        $category=Category::select('id','name','alias')-> where('alias',$id)->first();
	$articles=Article::select('id','title','des','img','cat','alias')-> where('cat',$category->id)->get();
        /*$articles_c=$articles->where('cat','=','1');*/
        //dump($articles);
        //dump($category);
        return view('categoryshow')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'articles'=>$articles,'category'=>$category]);
	}
        
        
         public function tag(){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',4)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',4)->first()->text;
	$this->z='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',7)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',7)->first()->text;
        
        $arr_a=array();
             $arr=array();
             $articles=Article::select('id','tags')->get();
        foreach($articles as $article){
                        $tag = explode(',',$article->tags);
                        /*/dump($tag);*/
                        foreach($tag as $t){
                            //echo $t;
                            $t = trim($t, "\x00..\x1F");
                            $t = trim($t);
                       //     $alias= str_replace($rus,$lat,$t);
                            if($t<>''){
                  $arr_a[$t]= $article->id;         
                 if(!(in_array($t, $arr)))
                            $arr[]=$t;}
         }}
         sort($arr,SORT_STRING);
        reset($arr);
       //dump($arr);
         /*$articles_c=$articles->where('cat','=','1');*/
       	return view('tag')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'z'=>$this->z,'tags'=>$arr]);
	}

         public function tagshowurl(Request $request){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',4)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',4)->first()->text;
        $data=$request->all();
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        $alias= str_replace($rus,$lat,$data['tags']);
        //dump($alias);        
        // return redirect()->route('tags/tag_', ['id' =>$alias]);
        //return redirect('tag',['id'=>$alias]);
	return redirect()->action('IndexController@tagshow', ['id' =>$alias]);
        
         }
          
        
         public function tagshow($id){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',4)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',4)->first()->text;
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        $aliass= str_replace($lat,$rus,$id);
        $articles=Article::select('id','title','text','img','source','tags','des','alias','cat')->where('tags','RLIKE',$aliass)->get();
        $categories=Category::select('id','name','alias')->get(); 
        return view('tag-show')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'articles'=>$articles,'tags'=>$aliass,'categories'=>$categories]);
	}
        
        
         public function contact(){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',5)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',5)->first()->text;
        $this->z='<h2>Для с вязи с нами заполните контактную форму и мы постараемся, по мере возможности, оперативно ответить Вам.</h2>';
       	return view('contact')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'z'=>$this->z]);
	}

        
         public function about(){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',6)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',6)->first()->text;

             $this->z='<h2>Добро пожаловать на наш сайт!</h2>'
                . '<p>Если вы хотите быть в курсе всех самых интересных (и не очень) событий, происходящих в мире и у нас в стране, то вы попали по адресу. '
                .'Ни одно более менее важное событие не пройдет мимо ваших глаз.</p> <p>Есть такая поговорка:"Предупрежден, значит вооружен". Мы всегда будем следить за тем, чтоб ваш арсенал был полным! </p>'
                . '<p>Для быстрой ориентации на нашем сайте на главной странице есть меню, позволяющее вам просматривать новости по рубрикам или по тегам.</p>'
                . '<p> Если вам хочется поделиться своими впечатлениями о событии, оставьте коментарий. Будьте в центре действий! Обсуждайте, акцентируйте внимание окружающих, разворушите равнодушных!'
                . 'Занимайте активную жизненную позицию и, возможно, когда-то "мир прогнется под вас".</p>'
                . '<p>Если вы раздражены какими-то фактами с нашего сайта, остыньте, раслабтесь и почитайте "Мудрые мысли" или "Анекдоты" в правой колонке страницы.</p>'
                . '<p>Ну, и, наконец, если у вас есть какие-то пожелания, предложения или (пусть лучше этого не будет) жалобы относительно нашего проекта, свяжитесь с нами на странице "Контакты".'
                . 'Мы всегда будем рады помочь вам сделать этот мир лучше.</p>';
       	return view('about')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'z'=>$this->z]);
	}
        
        
        
        public function contactpost(Request $request){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',5)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',5)->first()->text;
        $this->validate($request,[
	'fio'=>'required|max:255|regex: ~^[а-яґєіїё\,\\\'\s-]{1,255}$~ui',
        'phone'=>'required|regex:/^\+[3]{1}[8]{1}\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/',
	'email'=>'required|email',
         'message'=>'required|min:10'   
	]);
     	 $data=$request->all();
         if($_SERVER['REQUEST_METHOD']=='POST'){
             if(empty($_POST['g-recaptcha-response'])){
              $this->z='<h2> Нажмите капчу</h2>';   
               return view('contact')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'z'=>$this->z]);
              }
         $recaptcha=$_POST['g-recaptcha-response'];
         $url='https://www.google.com/recaptcha/api/siteverify';
         $secret='6Levzx4UAAAAAHTgxCMd10pOq7lCfcGihkjZlJxR';
         $ip=$_SERVER['REMOTE_ADDR'];
         $url_data=$url.'?secret='.$secret.'&response='.$recaptcha.'&remoteip='.$ip;
                 $curl= curl_init();
                 curl_setopt($curl, CURLOPT_URL, $url_data);
                  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
                $res= curl_exec($curl);
                curl_close($curl);
                $res= json_decode($res);
                if($res->success){
      			/*/Email send*/
			Date_default_timezone_set('Europe/Kiev');
			$header="From: <". $data['email'].">";
			$msgg=$data['message']." Номер телефона: ".$data['phone'];
			if(mail('duushka@ukr.net', $data['fio'],$msgg ,$header))
			$this->z='<h2> Ваш запрос отправлен. С Вами в ближайшее время свяжутся.</h2>';
                        else $this->z='<h2> Ошибка отправки запроса.</h2>';
       	//return redirect()->back();
                        return view('contact')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'z'=>$this->z]);
                }
                else return redirect()->back ();
	}
        }

                
         public function person(){
	$this->m2='<p><h2>Мудрые мысли</h2></p>'. \App\Think::select('text')->where('page',5)->first()->text.'<p><h2> Улыбнись!</h2> </p>'.\App\Anecdote::select('text')->where('page',5)->first()->text;
        $this->z='<h2>Личный кабинет.</h2>'
                . '<<p>Здесь Вы можете изменить свой пароль</p>';
       	return view('person')->with(['h1'=>$this->h1,'m'=>$this->m,'m2'=>$this->m2,'z'=>$this->z]);
	}

    
}
