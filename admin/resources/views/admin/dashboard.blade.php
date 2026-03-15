<x-admin-layout title="Dashboard" pageTitle="Dashboard" pageSubtitle="Here's your business overview">
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold mb-2">
                    <i class="fas fa-hand-wave mr-2"></i>
                    Welcome back, {{ auth()->user()->name }}!
                </h3>
                <p class="text-blue-100">Here's your business overview.</p>
            </div>
            <div class="flex space-x-2">
                <button class="px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition">
                    <i class="fas fa-sync-alt mr-2"></i>Refresh
                </button>
                <button class="px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition">
                    <i class="fas fa-download mr-2"></i>Export
                </button>
            </div>
        </div>
    </div>


    <!-- Quick Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
        <!-- <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Featured Projects</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['featured_projects'] ?? 0 }}</p>
                </div>
                <i class="fas fa-star text-yellow-500 text-2xl"></i>
            </div>
        </div> -->

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Published News</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['published_news'] ?? 0 }}</p>
                </div>
                <i class="fas fa-check-circle text-green-500 text-2xl"></i>
            </div>
        </div>



        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Vendors</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['vendors'] ?? 0 }}</p>
                </div>
                <i class="fas fa-users text-blue-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Channel Partners</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['channel_partners'] ?? 0 }}</p>
                </div>
                <i class="fas fa-handshake text-indigo-500 text-2xl"></i>
            </div>
        </div>

       

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Careers</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['careers'] ?? 0 }}</p>
                </div>
                <i class="fas fa-briefcase text-orange-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Job Applications</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['job_applications'] ?? 0 }}</p>
                </div>
                <i class="fas fa-user-graduate text-purple-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Contact Submissions</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['contact_submissions'] ?? 0 }}</p>
                </div>
                <i class="fas fa-envelope text-red-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">DRR Enquiries</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['drr_enquiries'] ?? 0 }}</p>
                </div>
                <i class="fas fa-building text-cyan-500 text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Brochure Downloads</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['drr_brochures'] ?? 0 }}</p>
                </div>
                <i class="fas fa-file-download text-green-500 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Vendors -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800">
                        <i class="fas fa-users text-blue-600 mr-2"></i>
                        Recent Vendors
                    </h3>
                    <a href="{{ route('admin.vendors.index') }}" class="text-sm text-blue-600 hover:text-blue-700">View All →</a>
                </div>
            </div>
            <div class="p-6">
                @if(isset($recentVendors) && count($recentVendors) > 0)
                    <div class="space-y-4">
                        @foreach($recentVendors as $vendor)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-user text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $vendor->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $vendor->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $vendor->status === 'new' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                                    {{ ucfirst($vendor->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">No vendors yet.</p>
                @endif
            </div>
        </div>

        <!-- Recent Channel Partners -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800">
                        <i class="fas fa-handshake text-purple-600 mr-2"></i>
                        Recent Channel Partners
                    </h3>
                    <a href="{{ route('admin.channel-partners.index') }}" class="text-sm text-blue-600 hover:text-blue-700">View All →</a>
                </div>
            </div>
            <div class="p-6">
                @if(isset($recentChannelPartners) && count($recentChannelPartners) > 0)
                    <div class="space-y-4">
                        @foreach($recentChannelPartners as $partner)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-user-friends text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $partner->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $partner->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $partner->status === 'new' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                                    {{ ucfirst($partner->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">No channel partners yet.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">
            <i class="fas fa-bolt text-yellow-500 mr-2"></i>
            Quick Actions
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4">

        <a href="{{ route('admin.vendors.index') }}" class="flex flex-col items-center justify-center p-6 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition group">
                <i class="fas fa-users text-indigo-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-indigo-700">Vendors</span>
            </a>
            <a href="{{ route('admin.channel-partners.index') }}" class="flex flex-col items-center justify-center p-6 bg-teal-50 hover:bg-teal-100 rounded-lg transition group">
                <i class="fas fa-handshake text-teal-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-teal-700">Partners</span>
            </a>

             <a href="{{ route('admin.news.create') }}" class="flex flex-col items-center justify-center p-6 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                <i class="fas fa-plus-circle text-purple-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-purple-700">Add News</span>
            </a>
            
            <a href="{{ route('admin.settings') }}" class="flex flex-col items-center justify-center p-6 bg-gray-50 hover:bg-gray-100 rounded-lg transition group">
                <i class="fas fa-cog text-gray-600 text-3xl mb-2 group-hover:scale-110 transition"></i>
                <span class="text-sm font-semibold text-gray-700">Settings</span>
            </a>
        </div>
    </div>
</div>
</x-admin-layout>

