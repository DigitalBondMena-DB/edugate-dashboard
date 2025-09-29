<?php

namespace App\Http\Controllers\BackEnd;

use App\Contact;
use App\NewArticle;
use Illuminate\Http\Request;
use App\NewArticleSubCatrgory;
use App\Http\Controllers\Controller;
use App\EventCategery;

class HomeController extends Controller
{
    public function index()
    {
        //get number of unread messages
        $unreadedMassages = Contact::where('seen', 0)->count();
        // get numbers of active Articles
        $activeArticles = NewArticle::where('status' , 1)->count();

        // get numbers of subCategories 
        $learningSubCategories = NewArticleSubCatrgory::where('active' , 'activated')
        ->where('new_article_catrgory_id' , 1)
        ->count();

        $eventCategories = EventCategery::where('active' , 'activated')->count();
        return view('dashboard.home.index', compact('unreadedMassages' , 'activeArticles' , 'learningSubCategories' , 'eventCategories'));
    }
}
