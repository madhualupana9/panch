<x-admin-layout title="Settings" pageTitle="Site Settings" pageSubtitle="Configure your website settings">

<form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
    @csrf

    @foreach($settings as $group => $groupSettings)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center capitalize">
                <i class="fas fa-{{ $group === 'general' ? 'cog' : ($group === 'contact' ? 'envelope' : ($group === 'social' ? 'share-alt' : 'search')) }} text-blue-600 mr-2"></i>
                {{ ucfirst($group) }} Settings
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($groupSettings as $setting)
                    <div class="{{ in_array($setting->type, ['textarea', 'text']) && strlen($setting->value ?? '') > 50 ? 'md:col-span-2' : '' }}">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                        </label>
                        
                        @if($setting->description)
                            <p class="text-xs text-gray-500 mb-2">{{ $setting->description }}</p>
                        @endif

                        @if($setting->type === 'textarea')
                            <textarea 
                                name="settings[{{ $setting->key }}]" 
                                rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                        @elseif($setting->type === 'boolean')
                            <div class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    name="settings[{{ $setting->key }}]" 
                                    id="{{ $setting->key }}"
                                    value="1"
                                    {{ old('settings.' . $setting->key, $setting->value) ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                >
                                <label for="{{ $setting->key }}" class="ml-2 text-sm text-gray-700">Enable</label>
                            </div>
                        @elseif($setting->type === 'email')
                            <input 
                                type="email" 
                                name="settings[{{ $setting->key }}]" 
                                value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        @elseif($setting->type === 'url')
                            <input 
                                type="url" 
                                name="settings[{{ $setting->key }}]" 
                                value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="https://"
                            >
                        @elseif($setting->type === 'number')
                            <input 
                                type="number" 
                                name="settings[{{ $setting->key }}]" 
                                value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        @else
                            <input 
                                type="text" 
                                name="settings[{{ $setting->key }}]" 
                                value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <!-- Action Buttons -->
    <div class="flex items-center justify-end bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition">
            <i class="fas fa-save mr-2"></i>Save Settings
        </button>
    </div>
</form>

</x-admin-layout>

