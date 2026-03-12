<x-admin-layout 
    :title="isset($news) ? 'Edit News' : 'Create News'" 
    :pageTitle="isset($news) ? 'Edit News Article' : 'Create New Article'"
    :pageSubtitle="isset($news) ? 'Update article details' : 'Add a new news article or blog post'">

<form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="space-y-6">
    @csrf
    @if(isset($news))
        @method('PUT')
    @endif

    <!-- Main Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
            Article Information
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Article Title <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $news->title ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required
                >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                <input 
                    type="text" 
                    name="category" 
                    value="{{ old('category', $news->category ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="e.g., Company News, Industry Update"
                >
            </div>

            <!-- Author -->
            <div>
                <!-- <label class="block text-sm font-semibold text-gray-700 mb-2">Author</label> -->
                <input 
                    type="hidden" 
                    name="author" 
                    value="{{ old('author', $news->author ?? auth()->user()->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <!-- Published Date -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Published Date</label>
                <input 
                    type="datetime-local" 
                    name="published_at" 
                    value="{{ old('published_at', isset($news) && $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <!-- Tags -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
                <input 
                    type="text" 
                    name="tags" 
                    value="{{ old('tags', isset($news) && $news->tags ? implode(', ', $news->tags) : '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="tag1, tag2, tag3"
                >
                <p class="text-sm text-gray-500 mt-1">Separate tags with commas</p>
            </div>

            <!-- Excerpt -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Excerpt</label>
                <textarea 
                    name="excerpt" 
                    rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Short summary of the article..."
                >{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
            </div>

            <!-- Content -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Article Content <span class="text-red-500">*</span>
                </label>
                <!-- Quill Editor Container -->
                <div id="news-editor-container" style="height: 400px; background: white;" class="rounded-lg border border-gray-300"></div>
                <!-- Hidden textarea to store content -->
                <!-- Remove required from the hidden textarea -->
                <textarea
                    id="article_content"
                    name="content"
                    style="display: none;"
                >{{ old('content', $news->content ?? '') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Image Upload Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-image text-purple-600 mr-2"></i>
            Article Images
        </h3>

        <!-- Featured Image -->
        <div class="mb-8">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Featured Image</label>
            <input
                type="file"
                name="image"
                accept="image/*"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
            <p class="text-sm text-gray-500 mt-1">Max size: 2MB. Recommended: 1200x630px</p>

            @if(isset($news) && $news->image)
                <div class="mt-4">
                    <p class="text-sm font-semibold text-gray-700 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-64 h-40 object-cover rounded-lg border border-gray-200">
                </div>
            @endif
        </div>

        <!-- Gallery Images -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Gallery Images</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors" id="news-gallery-dropzone">
                <div class="space-y-2">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                    <p class="text-gray-600">Drag and drop images here or click to browse</p>
                    <p class="text-sm text-gray-500">You can upload multiple images at once</p>
                </div>
                <input
                    type="file"
                    name="gallery[]"
                    accept="image/*"
                    multiple
                    class="hidden"
                    id="news-gallery-input"
                >
            </div>
            <p class="text-sm text-gray-500 mt-2">Max size per image: 2MB. Supported formats: JPG, PNG, GIF</p>

            <!-- Preview Area -->
            <div id="news-gallery-preview" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>

            <!-- Existing Gallery Images -->
            @if(isset($news) && $news->gallery && count($news->gallery) > 0)
                <div class="mt-6">
                    <p class="text-sm font-semibold text-gray-700 mb-3">Current Gallery Images:</p>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="news-existing-gallery">
                        @foreach($news->gallery as $index => $galleryImage)
                            <div class="relative group" data-image="{{ $galleryImage }}">
                                <img src="{{ asset('storage/' . $galleryImage) }}" alt="Gallery image {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                                <button type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity news-remove-gallery-btn">
                                    <i class="fas fa-times"></i>
                                </button>
                                <input type="hidden" name="remove_gallery[]" value="" class="news-remove-gallery-input">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Settings Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-cog text-gray-600 mr-2"></i>
            Publication Settings
        </h3>

        <div class="space-y-4">
            <!-- Featured -->
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    name="is_featured" 
                    id="is_featured"
                    value="1"
                    {{ old('is_featured', $news->is_featured ?? false) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                >
                <label for="is_featured" class="ml-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                    Featured Article (Show on homepage)
                </label>
            </div>

            <!-- Published -->
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    name="is_published" 
                    id="is_published"
                    value="1"
                    {{ old('is_published', $news->is_published ?? false) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                >
                <label for="is_published" class="ml-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-check-circle text-green-500 mr-1"></i>
                    Publish Article (Make visible to public)
                </label>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <a href="{{ route('admin.news.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <div class="flex space-x-3">
            <button type="submit" name="action" value="draft" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                <i class="fas fa-save mr-2"></i>Save as Draft
            </button>
            <button type="submit" name="action" value="publish" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
                <i class="fas fa-paper-plane mr-2"></i>{{ isset($news) ? 'Update Article' : 'Publish Article' }}
            </button>
        </div>
    </div>
</form>

@push('scripts')
<!-- Quill Editor CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- Quill Editor JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill editor for news
    var newsQuill = new Quill('#news-editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link', 'image'],
                ['blockquote', 'code-block'],
                ['clean']
            ]
        },
        placeholder: 'Write comprehensive article content here (800-1,200 words recommended)...'
    });

    // Load existing content
    var existingNewsContent = document.querySelector('#article_content').value;
    if (existingNewsContent) {
        newsQuill.root.innerHTML = existingNewsContent;
    }

    // Update hidden textarea on form submit
    document.querySelector('form').onsubmit = function() {
        document.querySelector('#article_content').value = newsQuill.root.innerHTML;
    };

    // News Gallery Upload Functionality
    const newsGalleryDropzone = document.getElementById('news-gallery-dropzone');
    const newsGalleryInput = document.getElementById('news-gallery-input');
    const newsGalleryPreview = document.getElementById('news-gallery-preview');
    let newsSelectedFiles = [];

    // Click to browse
    newsGalleryDropzone.addEventListener('click', () => {
        newsGalleryInput.click();
    });

    // Drag and drop
    newsGalleryDropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        newsGalleryDropzone.classList.add('border-blue-400', 'bg-blue-50');
    });

    newsGalleryDropzone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        newsGalleryDropzone.classList.remove('border-blue-400', 'bg-blue-50');
    });

    newsGalleryDropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        newsGalleryDropzone.classList.remove('border-blue-400', 'bg-blue-50');
        const files = Array.from(e.dataTransfer.files);
        handleNewsFiles(files);
    });

    // File input change
    newsGalleryInput.addEventListener('change', (e) => {
        const files = Array.from(e.target.files);
        handleNewsFiles(files);
    });

    function handleNewsFiles(files) {
        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                newsSelectedFiles.push(file);
                createNewsPreview(file);
            }
        });
        updateNewsFileInput();
    }

    function createNewsPreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const previewDiv = document.createElement('div');
            previewDiv.className = 'relative group';
            previewDiv.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                <button type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity news-remove-preview-btn">
                    <i class="fas fa-times"></i>
                </button>
            `;

            const removeBtn = previewDiv.querySelector('.news-remove-preview-btn');
            removeBtn.addEventListener('click', () => {
                const index = newsSelectedFiles.indexOf(file);
                if (index > -1) {
                    newsSelectedFiles.splice(index, 1);
                    previewDiv.remove();
                    updateNewsFileInput();
                }
            });

            newsGalleryPreview.appendChild(previewDiv);
        };
        reader.readAsDataURL(file);
    }

    function updateNewsFileInput() {
        const dt = new DataTransfer();
        newsSelectedFiles.forEach(file => dt.items.add(file));
        newsGalleryInput.files = dt.files;
    }

    // Remove existing news gallery images
    document.querySelectorAll('.news-remove-gallery-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const container = this.closest('[data-image]');
            const imagePath = container.dataset.image;
            const removeInput = container.querySelector('.news-remove-gallery-input');

            if (container.style.opacity === '0.5') {
                // Restore image
                container.style.opacity = '1';
                removeInput.value = '';
                this.innerHTML = '<i class="fas fa-times"></i>';
                this.classList.remove('bg-green-500');
                this.classList.add('bg-red-500');
            } else {
                // Mark for removal
                container.style.opacity = '0.5';
                removeInput.value = imagePath;
                this.innerHTML = '<i class="fas fa-undo"></i>';
                this.classList.remove('bg-red-500');
                this.classList.add('bg-green-500');
            }
        });
    });
</script>
@endpush

</x-admin-layout>

