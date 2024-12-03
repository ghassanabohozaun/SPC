<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Projects;
use App\Models\Scopes\StatusScope;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProjectController extends Controller
{
    function getProjects($type){
        if( LaravelLocalization::getCurrentLocale() == 'ar'){
        $projects = Projects::orderByDesc('id')->where('status' ,'on')->where('type' ,$type)->where(function ($q) {
            $q->where('language', 'ar')
                ->orWhere('language', 'ar_en');
        })->paginate(5);
        }else{
        $projects = Projects::orderByDesc('id')->where('status' ,'on')->where('type' ,$type)->where(function ($q) {
            $q->orWhere('language', 'ar_en');
        })->paginate(5);

        }
        if($projects){
            $title =__("site.$type") ; 
            return view('site.projects.project' , compact('projects' , 'type' , 'title'));
        }else{
            return redirect(route('index'));
        }

    }

    function detailProject($title){
         $title = returnSpaceBetweenString($title);
         $project = Projects::orderByDesc('id')->where('title_'.Lang() ,$title)->where('status' ,'on')->first();
         $news =Article::orderByDesc('id')->where('status' ,'on')->limit(3)->get();

        if($project){

            $project->increment('views', 1);
            $title = __('menu.projects');
            return view('site.projects.project-details' , compact('project' ,'news' , 'title'));
        }else{
            return redirect(route('index'));
        }
    }

    //get case study of  project
    function getCaseStudies($name){
        $title = returnSpaceBetweenString($name);
        $project = Projects::orderByDesc('id')->where('title_'.Lang() ,$title)->where('status' ,'on')->first();
        if($project){
             $publications =  $project->publications;
            if($publications){
                return view('site.projects.case-study' , compact('publications' , 'project'));
            }else{
                return redirect(route('index'));
            }
        }else{
            return redirect(route('index'));
        }


    }
}
