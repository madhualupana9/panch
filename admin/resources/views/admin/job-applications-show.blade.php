<x-admin-layout title="Application Details" pageTitle="Application Details" pageSubtitle="View and manage job application">
    <!-- Success/Error Messages -->
    

    @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-r-lg shadow-sm" role="alert">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.job-applications.index') }}" 
           class="inline-flex items-center text-gray-600 hover:text-gray-900 font-medium transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Back to Applications</span>
        </a>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="xl:col-span-2 space-y-6">
            <!-- Applicant Header Card -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl shadow-lg p-6 text-white">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold mb-2">{{ $jobApplication->full_name }}</h2>
                        <p class="text-blue-100 text-lg flex items-center gap-2">
                            <i class="fas fa-briefcase"></i>
                            <span>{{ $jobApplication->career ? $jobApplication->career->title : $jobApplication->position_applied }}</span>
                        </p>
                        <p class="text-blue-200 text-sm mt-2 flex items-center gap-2">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Applied {{ $jobApplication->created_at->format('M d, Y') }}</span>
                        </p>
                    </div>
                    <div>
                        <span class="inline-block px-4 py-2 text-sm font-bold rounded-lg shadow-md
                            {{ $jobApplication->status === 'pending' ? 'bg-yellow-400 text-yellow-900' : '' }}
                            {{ $jobApplication->status === 'reviewing' ? 'bg-blue-400 text-blue-900' : '' }}
                            {{ $jobApplication->status === 'shortlisted' ? 'bg-green-400 text-green-900' : '' }}
                            {{ $jobApplication->status === 'rejected' ? 'bg-red-400 text-red-900' : '' }}
                            {{ $jobApplication->status === 'hired' ? 'bg-purple-400 text-purple-900' : '' }}">
                            {{ ucfirst($jobApplication->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-user-circle text-blue-600"></i>
                        Contact Information
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Email Address</label>
                            <p class="text-gray-900">
                                <a href="mailto:{{ $jobApplication->email }}" 
                                   class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $jobApplication->email }}</span>
                                </a>
                            </p>
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Phone Number</label>
                            <p class="text-gray-900">
                                @if($jobApplication->phone)
                                    <a href="tel:{{ $jobApplication->phone }}" 
                                       class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                        <i class="fas fa-phone"></i>
                                        <span>{{ $jobApplication->phone }}</span>
                                    </a>
                                @else
                                    <span class="text-gray-400 italic">Not provided</span>
                                @endif
                            </p>
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Current Location</label>
                            <p class="text-gray-900 font-medium flex items-center gap-2">
                                <i class="fas fa-map-marker-alt text-gray-400"></i>
                                {{ $jobApplication->current_location ?? 'Not provided' }}
                            </p>
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Experience</label>
                            <p class="text-gray-900 font-medium flex items-center gap-2">
                                <i class="fas fa-briefcase text-gray-400"></i>
                                {{ $jobApplication->years_of_experience ? $jobApplication->years_of_experience . ' years' : 'Not provided' }}
                            </p>
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Expected Salary</label>
                            <p class="text-gray-900 font-medium flex items-center gap-2">
                                <i class="fas fa-dollar-sign text-gray-400"></i>
                                {{ $jobApplication->expected_salary ?? 'Not provided' }}
                            </p>
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Notice Period</label>
                            <p class="text-gray-900 font-medium flex items-center gap-2">
                                <i class="fas fa-clock text-gray-400"></i>
                                {{ $jobApplication->notice_period ?? 'Not provided' }}
                            </p>
                        </div>

                        @if($jobApplication->linkedin_url)
                            <div class="space-y-1">
                                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">LinkedIn Profile</label>
                                <p>
                                    <a href="{{ $jobApplication->linkedin_url }}" target="_blank" 
                                       class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                        <i class="fab fa-linkedin text-lg"></i>
                                        <span>View Profile</span>
                                        <i class="fas fa-external-link-alt text-xs"></i>
                                    </a>
                                </p>
                            </div>
                        @endif

                        @if($jobApplication->portfolio_url)
                            <div class="space-y-1">
                                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Portfolio</label>
                                <p>
                                    <a href="{{ $jobApplication->portfolio_url }}" target="_blank" 
                                       class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                        <i class="fas fa-globe text-lg"></i>
                                        <span>View Portfolio</span>
                                        <i class="fas fa-external-link-alt text-xs"></i>
                                    </a>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Cover Letter -->
            @if($jobApplication->cover_letter)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-file-alt text-blue-600"></i>
                            Cover Letter
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="prose max-w-none">
                            <div class="text-gray-700 leading-relaxed whitespace-pre-wrap bg-gray-50 p-6 rounded-lg border border-gray-200">{{ $jobApplication->cover_letter }}</div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Resume -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-file-pdf text-blue-600"></i>
                        Resume / CV
                    </h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between p-5 bg-gradient-to-r from-red-50 to-orange-50 rounded-lg border-2 border-red-200">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0 w-14 h-14 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-pdf text-red-600 text-2xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">{{ $jobApplication->resume_original_name }}</p>
                                <p class="text-sm text-gray-600">Uploaded {{ $jobApplication->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.job-applications.download', $jobApplication) }}" 
                           class="flex-shrink-0 inline-flex items-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all shadow-md hover:shadow-lg font-medium">
                            <i class="fas fa-download"></i>
                            <span>Download</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Admin Notes -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-sticky-note text-blue-600"></i>
                        Admin Notes
                    </h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.job-applications.update-status', $jobApplication) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{ $jobApplication->status }}">
                        <textarea name="admin_notes" rows="5" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all resize-none" 
                                  placeholder="Add internal notes about this application...">{{ $jobApplication->admin_notes }}</textarea>
                        <div class="mt-4 flex justify-end">
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all shadow-sm hover:shadow-md font-medium">
                                <i class="fas fa-save"></i>
                                <span>Save Notes</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Update Status -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-sync-alt"></i>
                        Update Status
                    </h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.job-applications.update-status', $jobApplication) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <select name="status" 
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all font-medium">
                                <option value="pending" {{ $jobApplication->status === 'pending' ? 'selected' : '' }}>📋 Pending</option>
                                <option value="reviewing" {{ $jobApplication->status === 'reviewing' ? 'selected' : '' }}>👀 Reviewing</option>
                                <option value="shortlisted" {{ $jobApplication->status === 'shortlisted' ? 'selected' : '' }}>⭐ Shortlisted</option>
                                <option value="rejected" {{ $jobApplication->status === 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                                <option value="hired" {{ $jobApplication->status === 'hired' ? 'selected' : '' }}>🎉 Hired</option>
                            </select>
                            <button type="submit" 
                                    class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all shadow-md hover:shadow-lg font-semibold">
                                <i class="fas fa-check-circle"></i>
                                <span>Update Status</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                    <h3 class="text-lg font-bold text-black flex items-center gap-2">
                        <i class="fas fa-bolt"></i>
                        Quick Actions
                    </h3>
                </div>
                <div class="p-6 bg-black">
                    <div class="space-y-3">
                        <!-- Send Email Button -->
                        <button type="button"
                                onclick="openEmailModal()"
                                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-purple-600 text-black rounded-lg hover:bg-purple-700 transition-all shadow-md hover:shadow-lg font-semibold">
                            <i class="fas fa-envelope"></i>
                            <span>Send Email</span>
                        </button>

                        <!-- Download Resume Button -->
                        <a href="{{ route('admin.job-applications.download', $jobApplication) }}"
                           class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-green-600 text-black rounded-lg hover:bg-green-700 transition-all shadow-md hover:shadow-lg font-semibold">
                            <i class="fas fa-download"></i>
                            <span>Download Resume</span>
                        </a>

                        <!-- Mark as Spam Button -->
                        @if(!$jobApplication->is_spam)
                            <form action="{{ route('admin.job-applications.mark-spam', $jobApplication) }}"
                                  method="POST"
                                  onsubmit="return confirm('Mark this application as spam?');">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-orange-600 text-black rounded-lg hover:bg-orange-700 transition-all shadow-md hover:shadow-lg font-semibold">
                                    <i class="fas fa-flag"></i>
                                    <span>Mark as Spam</span>
                                </button>
                            </form>
                        @else
                            <div class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-gray-300 text-black rounded-lg font-semibold cursor-not-allowed">
                                <i class="fas fa-flag"></i>
                                <span>Marked as Spam</span>
                            </div>
                        @endif

                        <!-- Delete Button -->
                        <form action="{{ route('admin.job-applications.destroy', $jobApplication) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to permanently delete this application? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-red-600 text-black rounded-lg hover:bg-red-700 transition-all shadow-md hover:shadow-lg font-semibold">
                                <i class="fas fa-trash-alt"></i>
                                <span>Delete Application</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Application Info -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-600"></i>
                        Application Info
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="pb-4 border-b border-gray-200">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 block">Submitted</label>
                            <p class="text-gray-900 font-semibold text-sm mb-1">{{ $jobApplication->created_at->format('M d, Y h:i A') }}</p>
                            <p class="text-gray-500 text-xs">{{ $jobApplication->created_at->diffForHumans() }}</p>
                        </div>

                        @if($jobApplication->reviewed_at)
                            <div class="pb-4 border-b border-gray-200">
                                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 block">Reviewed</label>
                                <p class="text-gray-900 font-semibold text-sm mb-1">{{ $jobApplication->reviewed_at->format('M d, Y h:i A') }}</p>
                                @if($jobApplication->reviewer)
                                    <p class="text-gray-500 text-xs">By {{ $jobApplication->reviewer->name }}</p>
                                @endif
                            </div>
                        @endif

                        <div class="pb-4 border-b border-gray-200">
                            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 block">IP Address</label>
                            <p class="text-gray-700 font-mono text-xs bg-gray-50 px-3 py-2 rounded border border-gray-200">{{ $jobApplication->ip_address }}</p>
                        </div>

                        @if($jobApplication->is_spam)
                            <div>
                                <div class="inline-flex items-center gap-2 px-3 py-2 text-xs font-bold rounded-lg bg-red-100 text-red-800 border border-red-300">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    <span>Marked as Spam</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Email Modal -->
    <div id="emailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
        <div class="relative w-full max-w-2xl bg-white rounded-xl shadow-2xl">
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-5 rounded-t-xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-white flex items-center gap-2">
                        <i class="fas fa-envelope"></i>
                        Send Email to {{ $jobApplication->full_name }}
                    </h3>
                    <button onclick="closeEmailModal()" class="text-white hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <form action="{{ route('admin.job-applications.send-email', $jobApplication) }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">To:</label>
                        <input type="text" value="{{ $jobApplication->email }}" readonly 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 font-medium">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Subject: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="subject" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all" 
                               placeholder="e.g., Thank you for your application">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Message: <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message" rows="10" required 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all resize-none" 
                                  placeholder="Write your message here..."></textarea>
                        <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                            <i class="fas fa-info-circle"></i>
                            <span>You can use HTML formatting in your message.</span>
                        </p>
                    </div>
                </div>
                
                <div class="flex justify-end gap-3 mt-6 pt-6 border-t border-gray-200">
                    <button type="button" onclick="closeEmailModal()" 
                            class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-all font-medium">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-purple-600 text-black rounded-lg hover:bg-purple-700 transition-all shadow-md hover:shadow-lg font-medium">
                        <i class="fas fa-paper-plane"></i>
                        <span>Send Email</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEmailModal() {
            document.getElementById('emailModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeEmailModal() {
            document.getElementById('emailModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal on outside click
        document.getElementById('emailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEmailModal();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('emailModal').classList.contains('hidden')) {
                closeEmailModal();
            }
        });
    </script>
</x-admin-layout>