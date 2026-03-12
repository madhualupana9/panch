<x-admin-layout 
    :title="isset($project) ? 'Edit Project' : 'Create Project'" 
    :pageTitle="isset($project) ? 'Edit Project' : 'Create New Project'"
    :pageSubtitle="isset($project) ? 'Update project details' : 'Add a new project to your portfolio'">

<form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="space-y-6">
    @csrf
    @if(isset($project))
        @method('PUT')
    @endif

    <!-- Main Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
            Basic Information
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Project Title <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $project->title ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required
                >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Client -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Client Name</label>
                <input 
                    type="text" 
                    name="client" 
                    value="{{ old('client', $project->client ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <!-- Location -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                <input 
                    type="text" 
                    name="location" 
                    value="{{ old('location', $project->location ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <!-- Category -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                <input 
                    type="text" 
                    name="category" 
                    value="{{ old('category', $project->category ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="e.g., Infrastructure, Building, Road"
                >
            </div>

            <!-- Value -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Project Value (Rs. In Lakhs)
                </label>
                <input
                    type="number"
                    name="value"
                    step="0.01"
                    value="{{ old('value', $project->value ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="e.g., 809.11 for ₹809.11 Lakhs (will display as ₹8.09 Cr)"
                >
                <p class="text-xs text-gray-500 mt-1">Enter value in Lakhs. It will be automatically converted to Crores for display.</p>
            </div>

            <!-- Start Date -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Start Date</label>
                <input 
                    type="date" 
                    name="start_date" 
                    value="{{ old('start_date', isset($project) && $project->start_date ? $project->start_date->format('Y-m-d') : '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <!-- End Date -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">End Date</label>
                <input 
                    type="date" 
                    name="end_date" 
                    value="{{ old('end_date', isset($project) && $project->end_date ? $project->end_date->format('Y-m-d') : '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <select 
                    name="status" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required
                >
                    <option value="planned" {{ old('status', $project->status ?? '') == 'planned' ? 'selected' : '' }}>Planned</option>
                    <option value="in_progress" {{ old('status', $project->status ?? '') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $project->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <!-- Display Order -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Display Order
                </label>
                <input 
                    type="number" 
                    name="order" 
                    value="{{ old('order', $project->order ?? 0) }}"
                    min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="0"
                >
                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first. Default: 0</p>
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Short Description <span class="text-red-500">*</span>
                </label>
                <textarea 
                    name="description" 
                    rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required
                >{{ old('description', $project->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Full Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Full Description</label>
                <!-- Quill Editor Container -->
                <div id="editor-container" style="height: 300px; background: white;" class="rounded-lg border border-gray-300"></div>
                <!-- Hidden textarea to store content -->
                <textarea
                    id="full_description"
                    name="full_description"
                    style="display: none;"
                >{{ old('full_description', $project->full_description ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Image Upload Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-image text-purple-600 mr-2"></i>
            Project Images
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
            <p class="text-sm text-gray-500 mt-1">Max size: 2MB. Recommended: 1200x800px</p>

            @if(isset($project) && $project->image)
                <div class="mt-4">
                    <p class="text-sm font-semibold text-gray-700 mb-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-48 h-32 object-cover rounded-lg border border-gray-200">
                </div>
            @endif
        </div>

        <!-- Gallery Images -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Gallery Images</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors" id="gallery-dropzone">
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
                    id="gallery-input"
                >
            </div>
            <p class="text-sm text-gray-500 mt-2">Max size per image: 2MB. Supported formats: JPG, PNG, GIF</p>

            <!-- Preview Area -->
            <div id="gallery-preview" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>

            <!-- Existing Gallery Images -->
            @if(isset($project) && $project->gallery && count($project->gallery) > 0)
                <div class="mt-6">
                    <p class="text-sm font-semibold text-gray-700 mb-3">Current Gallery Images:</p>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="existing-gallery">
                        @foreach($project->gallery as $index => $galleryImage)
                            <div class="relative group" data-image="{{ $galleryImage }}">
                                <img src="{{ asset('storage/' . $galleryImage) }}" alt="Gallery image {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                                <button type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity remove-gallery-btn">
                                    <i class="fas fa-times"></i>
                                </button>
                                <input type="hidden" name="remove_gallery[]" value="" class="remove-gallery-input">
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
            Settings
        </h3>

        <div class="space-y-4">
            <!-- Featured -->
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    name="is_featured" 
                    id="is_featured"
                    value="1"
                    {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                >
                <label for="is_featured" class="ml-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                    Featured Project (Show on homepage)
                </label>
            </div>

            <!-- Active -->
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    name="is_active" 
                    id="is_active"
                    value="1"
                    {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                >
                <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-toggle-on text-green-500 mr-1"></i>
                    Active (Visible to public)
                </label>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <a href="{{ route('admin.projects.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
            <i class="fas fa-save mr-2"></i>{{ isset($project) ? 'Update Project' : 'Create Project' }}
        </button>
    </div>
</form>

@push('scripts')
<!-- Quill Editor CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- Quill Editor JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill editor
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link', 'image'],
                ['clean']
            ]
        },
        placeholder: 'Write detailed project description here...'
    });

    // Load existing content
    var existingContent = document.querySelector('#full_description').value;
    if (existingContent) {
        quill.root.innerHTML = existingContent;
    }

    // Update hidden textarea on form submit
    document.querySelector('form').onsubmit = function() {
        document.querySelector('#full_description').value = quill.root.innerHTML;
    };

    // Gallery Upload Functionality
    const galleryDropzone = document.getElementById('gallery-dropzone');
    const galleryInput = document.getElementById('gallery-input');
    const galleryPreview = document.getElementById('gallery-preview');
    let selectedFiles = [];

    // Click to browse
    galleryDropzone.addEventListener('click', () => {
        galleryInput.click();
    });

    // Drag and drop
    galleryDropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        galleryDropzone.classList.add('border-blue-400', 'bg-blue-50');
    });

    galleryDropzone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        galleryDropzone.classList.remove('border-blue-400', 'bg-blue-50');
    });

    galleryDropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        galleryDropzone.classList.remove('border-blue-400', 'bg-blue-50');
        const files = Array.from(e.dataTransfer.files);
        handleFiles(files);
    });

    // File input change
    galleryInput.addEventListener('change', (e) => {
        const files = Array.from(e.target.files);
        handleFiles(files);
    });

    function handleFiles(files) {
        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                selectedFiles.push(file);
                createPreview(file);
            }
        });
        updateFileInput();
    }

    function createPreview(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const previewDiv = document.createElement('div');
            previewDiv.className = 'relative group';
            previewDiv.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                <button type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity remove-preview-btn">
                    <i class="fas fa-times"></i>
                </button>
            `;

            const removeBtn = previewDiv.querySelector('.remove-preview-btn');
            removeBtn.addEventListener('click', () => {
                const index = selectedFiles.indexOf(file);
                if (index > -1) {
                    selectedFiles.splice(index, 1);
                    previewDiv.remove();
                    updateFileInput();
                }
            });

            galleryPreview.appendChild(previewDiv);
        };
        reader.readAsDataURL(file);
    }

    function updateFileInput() {
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        galleryInput.files = dt.files;
    }

    // Remove existing gallery images
    document.querySelectorAll('.remove-gallery-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const container = this.closest('[data-image]');
            const imagePath = container.dataset.image;
            const removeInput = container.querySelector('.remove-gallery-input');

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

