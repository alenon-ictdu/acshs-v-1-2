<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Announcement;
use App\Models\Administration;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function landingpage()
    {
        /*$checkIfPageContentIsEmpty = false;
        $checkPageContent = Page_content::all();
        if($checkPageContent->count() <= 0){
            $checkIfPageContentIsEmpty = true;
        }

        $pagecontents = Page_content::orderBy('created_at', 'desc')->first();*/

        // fac
        $facilities = Facility::orderBy('created_at', 'desc')->paginate(6);
        $facSeeMore = false;
        $allFac = Facility::all();
        if ($allFac->count() > 6) {
            $facSeeMore = true;
        }
        
        // admin
        $allAdmin = Administration::all();
        $administrations = Administration::orderBy('created_at', 'desc')->paginate(6);
        $adminSeeMore = false;
        if ($allAdmin->count() > 6) {
            $adminSeeMore = true;
        }

        // ann
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(4);
        $annSeeMore = false;
        $allAnn = Announcement::all();
        if ($allAnn->count() > 4) {
            $annSeeMore = true;
        }

        return view('welcome')
            ->with('facilities', $facilities)
            ->with('facSeeMore', $facSeeMore)
            ->with('administrations',$administrations)
            ->with('adminSeeMore', $adminSeeMore)
            ->with('announcements', $announcements)
            ->with('annSeeMore', $annSeeMore);
    }
}
