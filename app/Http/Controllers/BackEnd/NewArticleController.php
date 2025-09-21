<?php

namespace App\Http\Controllers\BackEnd;

use App\NewArticle;
use App\NewArticleImage;
use App\NewArticleSubCatrgory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
// use App\Http\Requests\Backend\StoreNewArticleRequest;
// use App\Http\Requests\Backend\UpdateNewArticleRequest;


class NewArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = NewArticle::latest()->get();
            
        return view('backend.newArticles.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoreies = NewArticleSubCatrgory::get();
        return view('backend.newArticles.create' , compact('categoreies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
            $dateNow = Carbon::now('Africa/Cairo')->format('Y-m-d');
            // dd($request->schedule_date , $request->schedule_time , $dateNow);
            
            if($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $fileName = time().str_random(10);
            $file = (string) Image::make($request->file('main_image'))->encode('webp' , 75)->save(public_path('newArticle/'.$fileName , 'webp'));
            // $file->move(public_path('newArticle'), $fileName);

            }
            
            $newdate = $request->schedule_date.' '.$request->schedule_time;
            // dd($newdate);
            
            function make_slug($string, $separator = '-') {
                $string = trim($string);
                $string = mb_strtolower($string, 'UTF-8');
    
                $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);
    
                // Remove multiple dashes or whitespaces or underscores
                $string = preg_replace("/[\s\-]+/", " ", $string);
    
                // Convert whitespaces and underscore to the given separator
                $string = preg_replace("/[\s_]/", $separator, $string);
    
                return $string;
            }
    
            $ar_slug = make_slug($request->ar_title);
            
            
            $ar_slug = make_slug($request->ar_title);

            $requestArray = [
                'en_slug' => Str::slug($request->en_title), 'ar_slug' => $ar_slug, 
                'main_image' =>  $fileName, 
        
                'ar_tag_title' => $request->ar_tag_title,
                'schedule_date' => $newdate,    
                'ar_tag_desc' => $request->ar_tag_desc,
                'new_article_catrgory_id' => $request->new_article_catrgory_id,
                'article_date' => $request->schedule_date,
                'blog_script' => $request->blog_script,
                'blog_second_script' => $request->blog_second_script,
                'status' => $request->status,
                'article_counter' => 0
            ] + $request->all();
            
            
            $row = NewArticle::create($requestArray);
            $arrayofimages =  $request->file('arrayOfImages');;
            // dd($arrayofimages);
            if($arrayofimages)
            {
                foreach($arrayofimages as $arrayofimage)
                {
           
                    $fileName = time().str_random(10);
                    $file = (string) Image::make($arrayofimage)->encode('webp' , 75)->save(public_path('articleImages/'.$fileName , 'webp'));
                    
                    
                // dd($arrayofimages);
                    NewArticleImage::create([
                        'image' => $fileName,
                        'new_article_id' => $row->id,
                        'image_url' => 'articleImages/'.$fileName
                    ]);
                    // dd($arrayofimage);
                }
                
            }

        

        Session::flash('flash_message', 'Blog added successfully!');
        return redirect()->route('newArticle.edit' , $row->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = NewArticle::findorFail($id);
        $articleImages = NewArticleImage::where('new_article_id' , $row->id)->get();
        $categoreies = NewArticleSubCatrgory::get();
        // dd($articleImages);

        return view('backend.newArticles.edit', compact('row' , 'articleImages' , 'categoreies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        
        $requestArray = $request->all();

        $about = NewArticle::findorFail($id);
        
        // $dateNow = Carbon::now('Africa/Cairo')->format('Y-m-d');
        // $timeNow = Carbon::now('Africa/Cairo')->format('H:i:s');
        // $newvalue = $about->schedule_date.' '.$about->schedule_time;
        // $newvaluereal = $dateNow.' '.$timeNow;
        // if($newvalue <= $newvaluereal) {
        //     $counter = 1;
        // } else {
        //     $counter = 0;
        // }
        
        // if($newvalue <= $newvaluereal) {
        //     $counterdate = 1;
        // } else {
        //     $counterdate = 0;
        // }
        // dd($newvalue , $newvaluereal , $counter , $counterdate);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $fileName = time().str_random(10);
            $file = (string) Image::make($request->file('main_image'))->encode('webp' , 75)->save(public_path('newArticle/'.$fileName , 'webp'));
            // $file->move(public_path('newArticle'), $fileName);

            if($about->main_image !== NULL) {
                if (file_exists(public_path('newArticle/'. $about->main_image))) {
                    unlink(public_path('newArticle/'. $about->main_image));
                }
            }
        }


        $arrayofimages =  $request->file('arrayOfImages');
            // dd($arrayofimages);

            if($arrayofimages)
            {
                foreach($arrayofimages as $arrayofimage)
                {
           
                    $fileName = time().str_random(10);
                    $file = (string) Image::make($arrayofimage)->encode('webp' , 75)->save(public_path('articleImages/'.$fileName , 'webp'));
                    
                    
                    NewArticleImage::create([
                        'image' => $fileName,
                        'new_article_id' => $about->id,
                        'image_url' => 'articleImages/'.$fileName
                    ]);
                    // dd($arrayofimage);
                }

            }
        


        function make_slug($string, $separator = '-') {
            $string = trim($string);
            $string = mb_strtolower($string, 'UTF-8');

            $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

            // Remove multiple dashes or whitespaces or underscores
            $string = preg_replace("/[\s\-]+/", " ", $string);

            // Convert whitespaces and underscore to the given separator
            $string = preg_replace("/[\s_]/", $separator, $string);

            return $string;
        }

        $ar_slug = make_slug($request->ar_title);

        $requestArray = [
        'main_image' => $request->hasFile('main_image') ? $fileName : $about->main_image, 
        'ar_tag_title' => $request->ar_tag_title,
        
        'ar_tag_desc' => $request->ar_tag_desc,
        'new_article_catrgory_id' => $request->new_article_catrgory_id,
        
        ] + $request->all();

        $about->update($requestArray);

        Session::flash('flash_message', 'Blog updated successfully!');
        // dd($request->file('arrayOfImages'));
        if($request->file('arrayOfImages'))
        {
            return redirect()->route('newArticle.edit' , $about->id);
        } else 
        {

            return redirect()->route('newArticle.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroyImage($id){
        $eventCategery = NewArticleImage::findorFail($id);

        if($eventCategery->image !== NULL) {
            if(file_exists(public_path('articleImages/'. $eventCategery->image))) {
                unlink(public_path('articleImages/'. $eventCategery->image));
            }
        }

        $eventCategery->delete();

        Session::flash('flash_message', 'Blog Image deleted successfully!');
        return redirect()->back();
    } 
     
    public function destroy($id)
    {
        $eventCategery = NewArticle::findorFail($id);

        

        $eventCategery->update([
            'status' => 0
            ]);

        Session::flash('flash_message', 'Blog deleted successfully!');
        return redirect()->route('newArticle.index');
    }
    
    public function recover($id)
    {
        $eventCategery = NewArticle::findorFail($id);

        

        $eventCategery->update([
            'status' => 1
            ]);

        Session::flash('flash_message', 'Blog recoverd successfully!');
        return redirect()->route('newArticle.index');
    }
}
