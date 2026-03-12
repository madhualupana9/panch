<x-admin-layout title="News" pageTitle="News & Blog Management" pageSubtitle="Manage all your news articles and blog posts">

<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <input 
                type="text" 
                placeholder="Search news..." 
                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64"
            >
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <option>All Status</option>
                <option>Published</option>
                <option>Draft</option>
            </select>
        </div>
        <a href="{{ route('admin.news.create') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
            <i class="fas fa-plus mr-2"></i>Add New Article
        </a>
    </div>

    <!-- News Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Article</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Views</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($news as $article)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-16 h-16 rounded-lg object-cover">
                                @else
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-newspaper text-blue-500 text-xl"></i>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $article->title }}</p>
                                    <p class="text-sm text-gray-500">{{ $article->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $article->category ?? 'Uncategorized' }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $article->author ?? 'Admin' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                {{ $article->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $article->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center text-gray-700">
                            <i class="fas fa-eye text-blue-500 mr-1"></i>
                            {{ $article->views ?? 0 }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($article->is_featured)
                                <i class="fas fa-star text-yellow-500 text-xl"></i>
                            @else
                                <i class="far fa-star text-gray-300 text-xl"></i>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.news.edit', $article) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                                <p class="text-lg font-semibold mb-2">No news articles found</p>
                                <a href="{{ route('admin.news.create') }}" class="text-blue-600 hover:underline mt-2">
                                    Create your first article
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($news->hasPages())
        <div class="flex justify-center">
            {{ $news->links() }}
        </div>
    @endif
</div>

</x-admin-layout>

