<x-admin-layout title="Job Applications" pageTitle="Job Applications" pageSubtitle="Manage job applications and resumes">
    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Pending</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $pendingCount }}</p>
                </div>
                <i class="fas fa-clock text-yellow-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Reviewing</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $reviewingCount }}</p>
                </div>
                <i class="fas fa-eye text-blue-500 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Shortlisted</p>
                    <p class="text-3xl font-bold text-green-600">{{ $shortlistedCount }}</p>
                </div>
                <i class="fas fa-star text-green-500 text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <!-- Header with Filters -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">All Applications</h2>
                    <p class="text-sm text-gray-600 mt-1">Total: {{ $applications->total() }} applications</p>
                </div>

                <!-- Filters -->
                <form method="GET" class="flex flex-wrap gap-3">
                    <!-- Search -->
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search by name, email, phone..." 
                        value="{{ request('search') }}"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >

                    <!-- Status Filter -->
                    <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="all">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewing" {{ request('status') == 'reviewing' ? 'selected' : '' }}>Reviewing</option>
                        <option value="shortlisted" {{ request('status') == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="hired" {{ request('status') == 'hired' ? 'selected' : '' }}>Hired</option>
                    </select>

                    <!-- Career Filter -->
                    <select name="career_id" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="all">All Positions</option>
                        @foreach($careers as $career)
                            <option value="{{ $career->id }}" {{ request('career_id') == $career->id ? 'selected' : '' }}>
                                {{ $career->title }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Hide Spam -->
                    <label class="flex items-center px-4 py-2 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="checkbox" name="hide_spam" value="1" {{ request('hide_spam') ? 'checked' : '' }} class="mr-2">
                        <span class="text-sm">Hide Spam</span>
                    </label>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>

                    @if(request()->hasAny(['search', 'status', 'career_id', 'hide_spam']))
                        <a href="{{ route('admin.job-applications.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            <i class="fas fa-times mr-2"></i>Clear
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Experience</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($applications as $application)
                        <tr class="hover:bg-gray-50 {{ $application->is_spam ? 'bg-red-50' : '' }} {{ $application->status === 'pending' ? 'bg-yellow-50' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $application->created_at->format('M d, Y') }}
                                <div class="text-xs text-gray-400">{{ $application->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $application->full_name }}</div>
                                <div class="text-sm text-gray-500">
                                    <a href="mailto:{{ $application->email }}" class="text-blue-600 hover:text-blue-800">{{ $application->email }}</a>
                                </div>
                                @if($application->phone)
                                    <div class="text-sm text-gray-500">
                                        <a href="tel:{{ $application->phone }}" class="text-blue-600 hover:text-blue-800">{{ $application->phone }}</a>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $application->career ? $application->career->title : $application->position_applied }}
                                </div>
                                @if($application->current_location)
                                    <div class="text-xs text-gray-500">
                                        <i class="fas fa-map-marker-alt mr-1"></i>{{ $application->current_location }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $application->years_of_experience ? $application->years_of_experience . ' years' : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $application->status === 'reviewing' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $application->status === 'shortlisted' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $application->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}
                                    {{ $application->status === 'hired' ? 'bg-purple-100 text-purple-800' : '' }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                                @if($application->is_spam)
                                    <span class="ml-1 px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        <i class="fas fa-exclamation-triangle"></i> Spam
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.job-applications.show', $application) }}" 
                                       class="text-blue-600 hover:text-blue-900" 
                                       title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    <a href="{{ route('admin.job-applications.download', $application) }}" 
                                       class="text-green-600 hover:text-green-900" 
                                       title="Download Resume">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    
                                    <button onclick="openEmailModal({{ $application->id }}, '{{ $application->full_name }}', '{{ $application->email }}')" 
                                            class="text-purple-600 hover:text-purple-900" 
                                            title="Send Email">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    
                                    @if(!$application->is_spam)
                                        <form action="{{ route('admin.job-applications.mark-spam', $application) }}" method="POST" class="inline" onsubmit="return confirm('Mark as spam?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-orange-600 hover:text-orange-900" title="Mark as Spam">
                                                <i class="fas fa-flag"></i>
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <form action="{{ route('admin.job-applications.destroy', $application) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-briefcase text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">No job applications found</p>
                                <p class="text-sm text-gray-400 mt-1">Applications from the careers page will appear here</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($applications->hasPages())
            <div class="p-6 border-t border-gray-200">
                {{ $applications->links() }}
            </div>
        @endif
    </div>

    <!-- Email Modal -->
    <div id="emailModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Send Email to <span id="applicantName"></span></h3>
                <button onclick="closeEmailModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="emailForm" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">To:</label>
                    <input type="text" id="applicantEmail" readonly class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subject: <span class="text-red-500">*</span></label>
                    <input type="text" name="subject" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message: <span class="text-red-500">*</span></label>
                    <textarea name="message" rows="8" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
                
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeEmailModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-paper-plane mr-2"></i>Send Email
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEmailModal(applicationId, name, email) {
            document.getElementById('applicantName').textContent = name;
            document.getElementById('applicantEmail').value = email;
            document.getElementById('emailForm').action = `/admin/job-applications/${applicationId}/email`;
            document.getElementById('emailModal').classList.remove('hidden');
        }

        function closeEmailModal() {
            document.getElementById('emailModal').classList.add('hidden');
            document.getElementById('emailForm').reset();
        }

        // Close modal on outside click
        document.getElementById('emailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEmailModal();
            }
        });
    </script>
</x-admin-layout>

