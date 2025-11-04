@extends('backend.layouts.app')

@section('title')
    Website Settings 
@endsection

@section('content')
    <!-- Main content wrapper -->
    <div class="flex-1 flex flex-col pt-4 lg:pt-8">
        <!-- Main content -->
        <main id="main-content" class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8 bg-gray-50 dark:bg-gray-900 overflow-y-auto">
            <!-- Page header -->
            <div class="mb-4 sm:mb-6 lg:mb-8">
                <h1 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Website Settings</h1>
            </div>
            {{-- website settings part --}}
            <section aria-labelledby="website-settings-heading" class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="px-4 sm:px-6 lg:px-8 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h2 id="website-settings-heading" class="text-lg font-semibold text-gray-900 dark:text-white">General Information</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Manage your website identity and basic information.</p>
                </div>

                <form class="px-4 sm:px-6 lg:px-8 py-6 space-y-8" method="POST" action="{{ route('website-settings.update') }}" enctype="multipart/form-data">
                    @csrf

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="site_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Site Name</label>
                            <input id="site_name" name="site_name" type="text" value="{{ old('site_name', $settings['site_name'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('site_name') border-red-500 @enderror" placeholder="Acme Inc." />
                            @error('site_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tagline" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tagline</label>
                            <input id="tagline" name="tagline" type="text" value="{{ old('tagline', $settings['tagline'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('tagline') border-red-500 @enderror" placeholder="Just another awesome site" />
                            @error('tagline')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Email</label>
                            <input id="contact_email" name="contact_email" type="email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('contact_email') border-red-500 @enderror" placeholder="hello@example.com" />
                            @error('contact_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Phone</label>
                            <input id="contact_phone" name="contact_phone" type="tel" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('contact_phone') border-red-500 @enderror" placeholder="+1 555 123 4567" />
                            @error('contact_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Address</label>
                            <textarea id="address" name="address" rows="3" class="mt-1 px-3 py-2 min-h-[120px] resize-y block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('address') border-red-500 @enderror" placeholder="123 Main St, City, Country">{{ old('address', $settings['address'] ?? '') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="my-8 border-gray-200 dark:border-gray-600">

                    <div class="pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Branding</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Upload your logo and favicon.</p>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="logo" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Logo</label>
                                <input id="logo" name="logo" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-100 border border-gray-300 dark:border-gray-500 rounded-md @error('logo') border-red-500 @enderror" />
                                <p class="mt-2 text-xs text-gray-500">PNG, JPG, or SVG. Max 2MB.</p>
                                @error('logo')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div class="mt-3 flex items-center gap-4">
                                    @if(isset($settings['logo']) && $settings['logo'])
                                        <img id="logo_preview" src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo preview" class="h-12 w-12 rounded border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 object-contain" />
                                        <span id="logo_filename" class="text-xs text-gray-500">Current logo</span>
                                    @else
                                        <img id="logo_preview" src="" alt="Logo preview" class="h-12 w-12 rounded border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 object-contain hidden" />
                                        <span id="logo_filename" class="text-xs text-gray-500">No file chosen</span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <label for="favicon" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Favicon</label>
                                <input id="favicon" name="favicon" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-100 border border-gray-300 dark:border-gray-500 rounded-md @error('favicon') border-red-500 @enderror" />
                                <p class="mt-2 text-xs text-gray-500">ICO or PNG. 32x32 recommended.</p>
                                @error('favicon')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div class="mt-3 flex items-center gap-4">
                                    @if(isset($settings['favicon']) && $settings['favicon'])
                                        <img id="favicon_preview" src="{{ asset('storage/' . $settings['favicon']) }}" alt="Favicon preview" class="h-10 w-10 rounded border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 object-contain" />
                                        <span id="favicon_filename" class="text-xs text-gray-500">Current favicon</span>
                                    @else
                                        <img id="favicon_preview" src="" alt="Favicon preview" class="h-10 w-10 rounded border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 object-contain hidden" />
                                        <span id="favicon_filename" class="text-xs text-gray-500">No file chosen</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="my-8 border-gray-200 dark:border-gray-600">

                    <div class="pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Social Links</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 mb-4">Connect your social media profiles.</p>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="facebook" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Facebook URL</label>
                                <input id="facebook" name="facebook" type="url" value="{{ old('facebook', $settings['facebook'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('facebook') border-red-500 @enderror" placeholder="https://facebook.com/yourpage" />
                                @error('facebook')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="twitter" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Twitter URL</label>
                                <input id="twitter" name="twitter" type="url" value="{{ old('twitter', $settings['twitter'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('twitter') border-red-500 @enderror" placeholder="https://x.com/yourhandle" />
                                @error('twitter')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="instagram" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Instagram URL</label>
                                <input id="instagram" name="instagram" type="url" value="{{ old('instagram', $settings['instagram'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('instagram') border-red-500 @enderror" placeholder="https://instagram.com/yourhandle" />
                                @error('instagram')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="linkedin" class="block text-sm font-medium text-gray-700 dark:text-gray-200">LinkedIn URL</label>
                                <input id="linkedin" name="linkedin" type="url" value="{{ old('linkedin', $settings['linkedin'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('linkedin') border-red-500 @enderror" placeholder="https://linkedin.com/company/yourcompany" />
                                @error('linkedin')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="my-8 border-gray-200 dark:border-gray-600">

                    <div class="pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">SEO Settings</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 mb-4">Optimize your website for search engines.</p>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="meta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Meta Title</label>
                                <input id="meta_title" name="meta_title" type="text" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('meta_title') border-red-500 @enderror" placeholder="Home | Acme Inc." />
                                @error('meta_title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Meta Keywords</label>
                                <input id="meta_keywords" name="meta_keywords" type="text" value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('meta_keywords') border-red-500 @enderror" placeholder="acme, ecommerce, gadgets" />
                                @error('meta_keywords')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Meta Description</label>
                                <textarea id="meta_description" name="meta_description" rows="3" class="mt-1 px-3 py-2 min-h-[140px] resize-y block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('meta_description') border-red-500 @enderror" placeholder="Describe your site for search engines...">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                                @error('meta_description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="my-8 border-gray-200 dark:border-gray-600">

                    <div class="pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Preferences</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 mb-4">Configure additional website settings.</p>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="footer_text" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Footer Text</label>
                                <input id="footer_text" name="footer_text" type="text" value="{{ old('footer_text', $settings['footer_text'] ?? '') }}" class="mt-1 h-11 px-3 py-2 block w-full rounded-md border border-gray-300 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 @error('footer_text') border-red-500 @enderror" placeholder="© 2025 Acme Inc. All rights reserved." />
                                @error('footer_text')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center gap-3 pt-6">
                                <input id="maintenance_mode" name="maintenance_mode" type="checkbox" value="1" {{ old('maintenance_mode', $settings['maintenance_mode'] ?? '0') == '1' ? 'checked' : '' }} class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                <label for="maintenance_mode" class="text-sm font-medium text-gray-700 dark:text-gray-200">Enable Maintenance Mode</label>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 flex items-center justify-end gap-3">
                        <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-medium border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">Cancel</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save Settings</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function bindPreview(fileInputId, imgPreviewId, fileNameId) {
            const input = document.getElementById(fileInputId);
            const preview = document.getElementById(imgPreviewId);
            const nameHolder = document.getElementById(fileNameId);
            if (!input || !preview || !nameHolder) return;

            input.addEventListener('change', function () {
                const file = this.files && this.files[0] ? this.files[0] : null;
                if (file) {
                    const url = URL.createObjectURL(file);
                    preview.src = url;
                    preview.classList.remove('hidden');
                    nameHolder.textContent = file.name;
                } else {
                    preview.src = '';
                    preview.classList.add('hidden');
                    nameHolder.textContent = 'No file chosen';
                }
            });
        }

        bindPreview('logo', 'logo_preview', 'logo_filename');
        bindPreview('favicon', 'favicon_preview', 'favicon_filename');
    });
</script>
@endpush
