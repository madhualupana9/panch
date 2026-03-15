<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\ChannelPartnerController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProjectController as ApiProjectController;
use App\Http\Controllers\Api\ServiceController as ApiServiceController;
use App\Http\Controllers\Api\ClientController as ApiClientController;
use App\Http\Controllers\Api\NewsController as ApiNewsController;
use App\Http\Controllers\Api\CareerController as ApiCareerController;
use App\Http\Controllers\Api\JobApplicationController as ApiJobApplicationController;
use App\Http\Controllers\Api\HomepageController;
use App\Http\Controllers\Api\VendorPartnerController;
use App\Http\Controllers\Admin\DrrPremiumCountyController;
use App\Http\Controllers\Api\DrrLeadController;

// Redirect root to admin login
Route::get('/', function () {
    return redirect()->route('admin.login');
});

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    // Protected admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->middleware('permission:dashboard.view')
            ->name('dashboard');

        // Logout (no permission needed)
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // User Management
        Route::middleware('permission:users.view,users.create,users.edit,users.delete')->group(function () {
            Route::resource('users', App\Http\Controllers\Admin\UserController::class);
            Route::patch('/users/{user}/toggle-status', [App\Http\Controllers\Admin\UserController::class, 'toggleStatus'])
                ->name('users.toggle-status');
        });

        // Role Management
        Route::middleware('permission:roles.view,roles.create,roles.edit,roles.delete')->group(function () {
            Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
        });

        // Sliders Management
        Route::middleware('permission:sliders.view,sliders.create,sliders.edit,sliders.delete')->group(function () {
            Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
        });

        // Projects Management
        Route::middleware('permission:projects.view,projects.create,projects.edit,projects.delete')->group(function () {
            Route::resource('projects', ProjectController::class);
        });

        // News Management
        Route::middleware('permission:news.view,news.create,news.edit,news.delete')->group(function () {
            Route::resource('news', NewsController::class);
        });

        // Content Management
        Route::middleware('permission:content.view,content.edit')->group(function () {
            Route::get('/content', [ContentController::class, 'index'])->name('content.index');
            Route::get('/content/{section}/edit', [ContentController::class, 'edit'])->name('content.edit');
            Route::put('/content/{section}', [ContentController::class, 'update'])->name('content.update');
        });

        // Navigation Management
        Route::middleware('permission:navigation.view,navigation.create,navigation.edit,navigation.delete')->group(function () {
            Route::resource('navigation', NavigationController::class);
        });

        // Settings
        Route::middleware('permission:settings.view,settings.edit')->group(function () {
            Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
            Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
        });

        // Services Management
        Route::middleware('permission:services.view,services.create,services.edit,services.delete')->group(function () {
            Route::resource('services', ServiceController::class);
        });

        // Technologies Management
        Route::middleware('permission:technologies.view,technologies.create,technologies.edit,technologies.delete')->group(function () {
            Route::resource('technologies', TechnologyController::class);
        });

        // Clients Management
        Route::middleware('permission:clients.view,clients.create,clients.edit,clients.delete')->group(function () {
            Route::resource('clients', ClientController::class);
        });

        // Careers Management
        Route::middleware('permission:careers.view,careers.create,careers.edit,careers.delete')->group(function () {
            Route::resource('careers', CareerController::class);
        });

        // Job Applications Management
        Route::middleware('permission:job-applications.view,job-applications.manage,job-applications.delete')->group(function () {
            Route::get('/job-applications', [JobApplicationController::class, 'index'])->name('job-applications.index');
            Route::get('/job-applications/{jobApplication}', [JobApplicationController::class, 'show'])->name('job-applications.show');
            Route::put('/job-applications/{jobApplication}/status', [JobApplicationController::class, 'updateStatus'])->name('job-applications.update-status');
            Route::put('/job-applications/{jobApplication}/spam', [JobApplicationController::class, 'markAsSpam'])->name('job-applications.mark-spam');
            Route::post('/job-applications/{jobApplication}/email', [JobApplicationController::class, 'sendEmail'])->name('job-applications.send-email');
            Route::get('/job-applications/{jobApplication}/download', [JobApplicationController::class, 'downloadResume'])->name('job-applications.download');
            Route::delete('/job-applications/{jobApplication}', [JobApplicationController::class, 'destroy'])->name('job-applications.destroy');
            Route::post('/job-applications/bulk', [JobApplicationController::class, 'bulkAction'])->name('job-applications.bulk');
            Route::get('/job-applications-stats', [JobApplicationController::class, 'statistics'])->name('job-applications.stats');
        });

        // Contact Submissions
        Route::middleware('permission:contacts.view,contacts.manage,contacts.delete')->group(function () {
            Route::get('/contacts', [ContactSubmissionController::class, 'index'])->name('contacts.index');
            Route::get('/contacts/{contact}', [ContactSubmissionController::class, 'show'])->name('contacts.show');
            Route::put('/contacts/{contact}', [ContactSubmissionController::class, 'update'])->name('contacts.update');
            Route::delete('/contacts/{contact}', [ContactSubmissionController::class, 'destroy'])->name('contacts.destroy');
        });

        // Vendors
        Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
        Route::get('/vendors/{vendor}', [VendorController::class, 'show'])->name('vendors.show');
        Route::delete('/vendors/{vendor}', [VendorController::class, 'destroy'])->name('vendors.destroy');

        // Channel Partners
        Route::get('/channel-partners', [ChannelPartnerController::class, 'index'])->name('channel-partners.index');
        Route::get('/channel-partners/{channelPartner}', [ChannelPartnerController::class, 'show'])->name('channel-partners.show');
        Route::delete('/channel-partners/{channelPartner}', [ChannelPartnerController::class, 'destroy'])->name('channel-partners.destroy');

        // DRR Premium County
        Route::get('/drr-premium-county', [DrrPremiumCountyController::class, 'index'])->name('drr.index');
        Route::get('/drr-premium-county/enquiry/{enquiry}', [DrrPremiumCountyController::class, 'showEnquiry'])->name('drr.enquiry.show');
        Route::put('/drr-premium-county/enquiry/{enquiry}', [DrrPremiumCountyController::class, 'updateEnquiry'])->name('drr.enquiry.update');
        Route::delete('/drr-premium-county/enquiry/{enquiry}', [DrrPremiumCountyController::class, 'destroyEnquiry'])->name('drr.enquiry.destroy');
        Route::get('/drr-premium-county/brochure/{brochureDownload}', [DrrPremiumCountyController::class, 'showBrochure'])->name('drr.brochure.show');
        Route::put('/drr-premium-county/brochure/{brochureDownload}', [DrrPremiumCountyController::class, 'updateBrochure'])->name('drr.brochure.update');
        Route::delete('/drr-premium-county/brochure/{brochureDownload}', [DrrPremiumCountyController::class, 'destroyBrochure'])->name('drr.brochure.destroy');
        Route::get('/drr-premium-county/export/enquiries', [DrrPremiumCountyController::class, 'exportEnquiries'])->name('drr.export.enquiries');
        Route::get('/drr-premium-county/export/brochure', [DrrPremiumCountyController::class, 'exportBrochure'])->name('drr.export.brochure');
    });
});

// API Routes for Next.js Frontend
Route::prefix('api')->group(function () {
    // Contact form submission
    Route::post('/contact', [ContactController::class, 'submit']);
    Route::post('/vendor-submit', [VendorPartnerController::class, 'submitVendor']);
    Route::post('/channel-partner-submit', [VendorPartnerController::class, 'submitChannelPartner']);

    // DRR Premium County form submissions
    Route::post('/drr/enquiry', [DrrLeadController::class, 'submitEnquiry']);
    Route::post('/drr/brochure', [DrrLeadController::class, 'submitBrochure']);

    // Projects API
    Route::get('/projects', [ApiProjectController::class, 'index']);
    Route::get('/projects/stats', [ApiProjectController::class, 'stats']);
    Route::get('/projects/{slug}', [ApiProjectController::class, 'show']);

    // Services API
    Route::get('/services', [ApiServiceController::class, 'index']);
    Route::get('/services/{slug}', [ApiServiceController::class, 'show']);

    // Clients API
    Route::get('/clients', [ApiClientController::class, 'index']);
    Route::get('/clients/{slug}', [ApiClientController::class, 'show']);

    // News API
    Route::get('/news', [ApiNewsController::class, 'index']);
    Route::get('/news/{slug}', [ApiNewsController::class, 'show']);

    // Careers API
    Route::get('/careers', [ApiCareerController::class, 'index']);
    Route::get('/careers/{id}', [ApiCareerController::class, 'show']);
    Route::get('/careers/filters/departments', [ApiCareerController::class, 'departments']);
    Route::get('/careers/filters/locations', [ApiCareerController::class, 'locations']);

    // Job Applications API
    Route::post('/job-applications', [ApiJobApplicationController::class, 'submit']);
    Route::post('/job-applications/check-eligibility', [ApiJobApplicationController::class, 'checkEligibility']);

    // Navigation API
    Route::get('/navigation', [App\Http\Controllers\Api\NavigationController::class, 'index']);
    Route::get('/navigation/{location}', [App\Http\Controllers\Api\NavigationController::class, 'byLocation']);

    // Homepage Content API
    Route::get('/homepage', [HomepageController::class, 'index']);
    Route::get('/homepage/{sectionKey}', [HomepageController::class, 'getSection']);
});
