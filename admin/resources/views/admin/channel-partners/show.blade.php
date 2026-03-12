<x-admin-layout title="Channel Partner Details" pageTitle="Channel Partner Details" pageSubtitle="Viewing channel partner submission">
    
<div class="max-w-5xl mx-auto py-4">
        <!-- Top Action Bar -->
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('admin.channel-partners.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition shadow-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to All Channel Partners
            </a>
            
           
        </div>

        <div class="space-y-6">
            <!-- Header Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="h-16 w-16 bg-indigo-600 text-white rounded-xl flex items-center justify-center text-2xl font-bold shadow-lg shadow-indigo-100 flex-shrink-0">
                        {{ strtoupper(substr($channelPartner->name, 0, 1)) }}
                    </div>
                    <div class="flex-grow">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">{{ $channelPartner->name }}</h2>
                                <div class="mt-1 flex flex-wrap items-center gap-4 text-sm text-gray-500 font-medium">
                                    <span class="flex items-center">
                                        <i class="far fa-calendar-alt mr-1.5 text-indigo-500"></i>
                                        {{ $channelPartner->created_at->format('M d, Y') }}
                                    </span>
                                    <span class="flex items-center">
                                        <i class="far fa-clock mr-1.5 text-indigo-500"></i>
                                        {{ $channelPartner->created_at->format('h:i A') }}
                                    </span>
                                    <span class="hidden sm:inline text-gray-300">|</span>
                                    <span class="text-gray-400">ID: #CP-{{ $channelPartner->id }}</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border {{ $channelPartner->status === 'read' ? 'bg-green-100 text-green-700 border-green-200' : 'bg-indigo-100 text-indigo-700 border-indigo-200' }}">
                                    <i class="fas {{ $channelPartner->status === 'read' ? 'fa-check-circle' : 'fa-envelope-open' }} mr-1.5"></i>
                                    {{ $channelPartner->status ?? 'New' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Info Column -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 flex items-center">
                            <i class="fas fa-handshake mr-2 text-indigo-500"></i>
                            Partner Details
                        </h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1">Email</label>
                                <a href="mailto:{{ $channelPartner->email }}" class="flex items-center p-3 rounded-lg border border-gray-100 bg-gray-50 hover:bg-white hover:border-indigo-300 transition-all text-sm font-semibold text-gray-900 truncate">
                                    <i class="far fa-envelope mr-3 text-indigo-600"></i>
                                    {{ $channelPartner->email }}
                                </a>
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1">Phone</label>
                                <a href="tel:{{ $channelPartner->phone }}" class="flex items-center p-3 rounded-lg border border-gray-100 bg-gray-50 hover:bg-white hover:border-green-300 transition-all text-sm font-semibold text-gray-900 truncate">
                                    <i class="fas fa-phone mr-3 text-green-600"></i>
                                    {{ $channelPartner->phone }}
                                </a>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-100">
                                <p class="text-xs text-gray-500 leading-relaxed italic">
                                    <i class="fas fa-history mr-1 text-gray-400"></i>
                                    Received {{ $channelPartner->created_at->diffForHumans() }}.
                                    @if($channelPartner->read_at)
                                        First viewed on {{ $channelPartner->read_at->format('M d, h:i A') }}.
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message Column -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col h-full">
                        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50 rounded-t-xl">
                            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest flex items-center">
                                <i class="fas fa-comment-alt mr-2 text-indigo-500"></i>
                                Message
                            </h3>
                            <button onclick="navigator.clipboard.writeText('{{ addslashes($channelPartner->message) }}').then(() => alert('Message copied!'))" class="inline-flex items-center px-3 py-1 bg-white border border-gray-200 rounded text-xs font-bold text-indigo-600 hover:bg-blue-50 transition shadow-sm">
                                <i class="far fa-copy mr-1.5"></i> Copy Text
                            </button>
                        </div>
                        <div class="p-6">
                            <div class="p-6 bg-gray-50 rounded-lg border border-gray-100 text-gray-800 leading-relaxed text-lg min-h-[200px] whitespace-pre-wrap">
                                {{ $channelPartner->message }}
                            </div>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 rounded-b-xl flex justify-between items-center">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Partner Inquiry</span>
                            <span class="text-[10px] font-bold text-gray-400">{{ strlen($channelPartner->message) }} Characters</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
