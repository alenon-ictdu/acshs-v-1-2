<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Announcement;
use App\Models\Administration;

class PageController extends Controller
{
    public function facilityPage() {
    	$facilities = Facility::orderBy('created_at', 'desc')->get();

    	return view('facilities')
    		->with('facilities', $facilities);
    }

    public function announcementPage() {
    	$announcements = Announcement::orderBy('created_at', 'desc')->get();

    	return view('announcements')
    		->with('announcements', $announcements);
    }

    public function administrationPage() {
    	$administrations = Administration::orderBy('created_at', 'desc')->get();

    	return view('administrations')
    		->with('administrations', $administrations);
    }
}
