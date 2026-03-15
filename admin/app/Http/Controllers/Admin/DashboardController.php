<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\News;
use App\Models\ContentSection;
use App\Models\NavigationItem;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\Vendor;
use App\Models\ChannelPartner;
use App\Models\Slider;
use App\Models\Career;
use App\Models\JobApplication;
use App\Models\ContactSubmission;
use App\Models\DrrEnquiry;
use App\Models\DrrBrochureDownload;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'news' => News::count(),
            'content_sections' => ContentSection::count(),
            'navigation' => NavigationItem::count(),
            'featured_projects' => Project::where('is_featured', true)->count(),
            'published_news' => News::where('is_published', true)->count(),
            'active_sections' => ContentSection::where('is_active', true)->count(),
            'settings' => SiteSetting::count(),
            'users' => User::count(),
            'news_views' => News::sum('views'),
            'vendors' => Vendor::count(),
            'channel_partners' => ChannelPartner::count(),
            'sliders' => Slider::count(),
            'careers' => Career::count(),
            'job_applications' => JobApplication::count(),
            'contact_submissions' => ContactSubmission::count(),
            'drr_enquiries' => DrrEnquiry::count(),
            'drr_brochures' => DrrBrochureDownload::count(),
        ];

        $recentVendors = Vendor::latest()->take(5)->get();
        $recentChannelPartners = ChannelPartner::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentVendors', 'recentChannelPartners'));
    }
}
