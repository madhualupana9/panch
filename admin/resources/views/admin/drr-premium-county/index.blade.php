<x-admin-layout title="DRR Premium County" pageTitle="DRR Premium County" pageSubtitle="Manage enquiry and brochure download submissions">
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Total Enquiries</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_enquiries'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-envelope text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">New Enquiries</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $stats['new_enquiries'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-bell text-yellow-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">Total Brochure Downloads</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_brochure'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-download text-green-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-1">New Brochure Requests</p>
                        <p class="text-2xl font-bold text-green-600">{{ $stats['new_brochure'] }}</p>
                    </div>
                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-pdf text-red-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px">
                    <a href="{{ route('admin.drr.index', ['tab' => 'enquiries']) }}"
                       class="px-6 py-4 text-sm font-semibold border-b-2 transition {{ $tab === 'enquiries' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        <i class="fas fa-envelope mr-2"></i>Enquiry Forms
                        @if($stats['new_enquiries'] > 0)
                            <span class="ml-2 px-2 py-0.5 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">{{ $stats['new_enquiries'] }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.drr.index', ['tab' => 'brochure']) }}"
                       class="px-6 py-4 text-sm font-semibold border-b-2 transition {{ $tab === 'brochure' ? 'border-green-600 text-green-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        <i class="fas fa-download mr-2"></i>Brochure Downloads
                        @if($stats['new_brochure'] > 0)
                            <span class="ml-2 px-2 py-0.5 bg-green-100 text-green-800 text-xs font-bold rounded-full">{{ $stats['new_brochure'] }}</span>
                        @endif
                    </a>
                </nav>
            </div>

            @if($tab === 'enquiries')
                <div class="p-4 border-b border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-600">Total: {{ $enquiries->total() }} submissions</p>
                    <a href="{{ route('admin.drr.export.enquiries') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-file-csv mr-2"></i>Export CSV
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Source</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($enquiries as $enquiry)
                                <tr class="hover:bg-gray-50 {{ $enquiry->status === 'new' ? 'bg-blue-50' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $enquiry->created_at->format('M d, Y') }}
                                        <div class="text-xs text-gray-400">{{ $enquiry->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $enquiry->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <a href="mailto:{{ $enquiry->email }}" class="text-blue-600 hover:text-blue-800">{{ $enquiry->email }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($enquiry->phone)
                                            <a href="tel:{{ $enquiry->phone }}" class="text-blue-600 hover:text-blue-800">{{ $enquiry->phone }}</a>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-700">{{ $enquiry->source }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $enquiry->status === 'new' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $enquiry->status === 'read' ? 'bg-gray-100 text-gray-800' : '' }}
                                            {{ $enquiry->status === 'replied' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $enquiry->status === 'archived' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                            {{ ucfirst($enquiry->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.drr.enquiry.show', $enquiry) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('admin.drr.enquiry.destroy', $enquiry) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-envelope text-4xl text-gray-300 mb-3 block"></i>
                                        <p class="text-lg">No enquiries found</p>
                                        <p class="text-sm text-gray-400 mt-1">Enquiries from the DRR Premium County page will appear here</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($enquiries->hasPages())
                    <div class="p-6 border-t border-gray-200">
                        {{ $enquiries->appends(['tab' => 'enquiries'])->links() }}
                    </div>
                @endif
            @else
                <div class="p-4 border-b border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-600">Total: {{ $brochureDownloads->total() }} requests</p>
                    <a href="{{ route('admin.drr.export.brochure') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700 transition">
                        <i class="fas fa-file-csv mr-2"></i>Export CSV
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($brochureDownloads as $download)
                                <tr class="hover:bg-gray-50 {{ $download->status === 'new' ? 'bg-green-50' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $download->created_at->format('M d, Y') }}
                                        <div class="text-xs text-gray-400">{{ $download->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $download->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <a href="mailto:{{ $download->email }}" class="text-blue-600 hover:text-blue-800">{{ $download->email }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($download->phone)
                                            <a href="tel:{{ $download->phone }}" class="text-blue-600 hover:text-blue-800">{{ $download->phone }}</a>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $download->status === 'new' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $download->status === 'read' ? 'bg-gray-100 text-gray-800' : '' }}
                                            {{ $download->status === 'replied' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $download->status === 'archived' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                            {{ ucfirst($download->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.drr.brochure.show', $download) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('admin.drr.brochure.destroy', $download) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-download text-4xl text-gray-300 mb-3 block"></i>
                                        <p class="text-lg">No brochure download requests found</p>
                                        <p class="text-sm text-gray-400 mt-1">Brochure download requests will appear here</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($brochureDownloads->hasPages())
                    <div class="p-6 border-t border-gray-200">
                        {{ $brochureDownloads->appends(['tab' => 'brochure'])->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-admin-layout>
