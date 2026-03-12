<x-admin-layout 
    title="Contact Submission" 
    pageTitle="Contact Submission Details" 
    pageSubtitle="View and manage contact submission">
    
    <div class="max-w-5xl mx-auto py-6">
        <!-- Action Buttons -->
        <div class="mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-blue-600 transition-all bg-white px-5 py-2.5 rounded-xl shadow-sm border border-gray-200">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to All Submissions
            </a>
            
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this submission?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-5 py-2.5 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all">
                    <i class="fas fa-trash-alt mr-2"></i> Delete
                </button>
            </form>
        </div>

        <div class="space-y-8">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="h-20 w-20 bg-blue-600 text-white rounded-2xl flex items-center justify-center text-3xl font-bold shadow-lg shadow-blue-100 flex-shrink-0">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </div>
                    <div class="flex-grow">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">{{ $contact->name }}</h2>
                                <div class="mt-2 flex flex-wrap items-center gap-4 text-sm text-gray-500 font-medium">
                                    <span class="flex items-center">
                                        <i class="far fa-calendar-alt mr-2 text-blue-500"></i>
                                        {{ $contact->created_at->format('M d, Y') }}
                                    </span>
                                    <span class="flex items-center">
                                        <i class="far fa-clock mr-2 text-blue-500"></i>
                                        {{ $contact->created_at->format('h:i A') }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <span @class([
                                    'px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest border flex items-center shadow-sm',
                                    'bg-blue-50 text-blue-700 border-blue-200' => $contact->status === 'new',
                                    'bg-gray-50 text-gray-700 border-gray-200' => $contact->status === 'read',
                                    'bg-green-50 text-green-700 border-green-200' => $contact->status === 'replied',
                                    'bg-yellow-50 text-yellow-700 border-yellow-200' => $contact->status === 'archived',
                                ])>
                                    <span @class([
                                        'w-2 h-2 rounded-full mr-2',
                                        'bg-blue-500' => $contact->status === 'new',
                                        'bg-gray-500' => $contact->status === 'read',
                                        'bg-green-500' => $contact->status === 'replied',
                                        'bg-yellow-500' => $contact->status === 'archived',
                                    ])></span>
                                    {{ $contact->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Contact Information & Actions -->
                <div class="lg:col-span-1 space-y-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-6 pb-2 border-b border-gray-100 flex items-center">
                            <i class="fas fa-address-card mr-2 text-blue-500"></i>
                            Contact Info
                        </h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Email Address</label>
                                <a href="mailto:{{ $contact->email }}" class="group flex items-center p-3 rounded-xl border border-gray-100 bg-gray-50 hover:bg-white hover:border-blue-200 transition-all duration-300">
                                    <div class="w-10 h-10 bg-white rounded-lg shadow-sm flex items-center justify-center mr-3 text-blue-600 group-hover:scale-110 transition-all">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <span class="text-sm font-semibold text-gray-900 break-all group-hover:text-blue-600">{{ $contact->email }}</span>
                                </a>
                            </div>
                            
                            @if($contact->phone)
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Phone Number</label>
                                <a href="tel:{{ $contact->phone }}" class="group flex items-center p-3 rounded-xl border border-gray-100 bg-gray-50 hover:bg-white hover:border-green-200 transition-all duration-300">
                                    <div class="w-10 h-10 bg-white rounded-lg shadow-sm flex items-center justify-center mr-3 text-green-600 group-hover:scale-110 transition-all">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <span class="text-sm font-semibold text-gray-900 group-hover:text-green-600">{{ $contact->phone }}</span>
                                </a>
                            </div>
                            @endif

                            @if($contact->company)
                            <div class="p-3 rounded-xl border border-gray-100 bg-gray-50">
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Company</label>
                                <p class="text-sm font-semibold text-gray-900 flex items-center">
                                    <i class="fas fa-building mr-2 text-gray-400"></i>
                                    {{ $contact->company }}
                                </p>
                            </div>
                            @endif

                            @if($contact->service)
                            <div class="p-3 rounded-xl border border-gray-100 bg-gray-50">
                                <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Service</label>
                                <p class="text-sm font-semibold text-gray-900 flex items-center">
                                    <i class="fas fa-concierge-bell mr-2 text-gray-400"></i>
                                    {{ $contact->service }}
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-6 pb-2 border-b border-gray-100 flex items-center">
                            <i class="fas fa-bolt mr-2 text-yellow-500"></i>
                            Quick Actions
                        </h3>
                        <div class="flex flex-col gap-3">
                            <a href="mailto:{{ $contact->email }}?subject=Re: Your inquiry&body=Hi {{ $contact->name }},%0D%0A%0D%0AThank you for contacting us." 
                                class="flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition shadow-sm font-bold text-sm">
                                <i class="fas fa-reply mr-2"></i>Reply via Email
                            </a>
                            @if($contact->phone)
                                <a href="tel:{{ $contact->phone }}" 
                                    class="flex items-center justify-center px-4 py-3 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition shadow-sm font-bold text-sm">
                                    <i class="fas fa-phone mr-2 text-green-500"></i>Call Sender
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Message & Management -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 flex flex-col">
                        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50 rounded-t-2xl">
                            <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider flex items-center">
                                <i class="fas fa-comment-alt mr-2 text-blue-500"></i>
                                Submission Message
                            </h3>
                            <button onclick="navigator.clipboard.writeText('{{ addslashes($contact->message) }}').then(() => alert('Message copied!'))" class="text-xs text-blue-600 hover:text-blue-800 font-bold flex items-center bg-white px-3 py-1.5 rounded-lg border border-gray-200 shadow-sm transition-all">
                                <i class="far fa-copy mr-1.5"></i> Copy Text
                            </button>
                        </div>
                        <div class="p-8 text-gray-800 leading-relaxed text-lg">
                            <div class="whitespace-pre-wrap italic font-serif text-gray-700 bg-gray-50/50 p-6 rounded-2xl border border-dashed border-gray-200">
                                "{{ $contact->message }}"
                            </div>
                        </div>
                    </div>

                    <!-- Internal Management -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="px-6 py-4 bg-slate-900 flex items-center">
                            <h3 class="text-sm font-bold text-white uppercase tracking-wider flex items-center">
                                <i class="fas fa-tasks mr-2 text-blue-400"></i>
                                Management
                            </h3>
                        </div>
                        <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" class="p-6">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-1">
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Status</label>
                                    <select name="status" 
                                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all font-medium" required>
                                        <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>New</option>
                                        <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                                        <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                                        <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }}>Archived</option>
                                    </select>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Internal Notes</label>
                                    <textarea name="admin_notes" rows="3" 
                                        placeholder="Add internal notes about this submission..."
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-6 pt-6 border-t border-gray-100">
                                <div class="text-[11px] text-gray-400 font-bold uppercase tracking-widest">
                                    @if($contact->read_at)
                                        <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                        Read on {{ $contact->read_at->format('M d, Y') }}
                                    @endif
                                </div>
                                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 shadow-md shadow-blue-100 transition-all">
                                    <i class="fas fa-save mr-2"></i> Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
