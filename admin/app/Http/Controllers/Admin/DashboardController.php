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
        ];

        $recentProjects = Project::latest()->take(5)->get();
        $recentNews = News::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentNews'));
    }
}
