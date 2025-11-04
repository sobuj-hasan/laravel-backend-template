<!-- Create Product Modal Toggle -->
<input type="checkbox" id="modal-toggle" class="modal-toggle sr-only">

<!-- Modal backdrop -->
<div class="modal-backdrop fixed inset-0 bg-gray-900 bg-opacity-50 z-50 opacity-0 invisible transition-all duration-300 flex items-center justify-center p-4">
    <div class="modal-content bg-white dark:bg-gray-800 rounded-2xl shadow-xl w-full max-w-md opacity-0 transform scale-95 transition-all duration-300">
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New Product</h3>
            <label for="modal-toggle" class="cursor-pointer text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </label>
        </div>
        <form class="p-6 space-y-4">
            <div>
                <label for="product-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Product Name</label>
                <input type="text" id="product-name" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-150" placeholder="Enter product name">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="product-price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price</label>
                    <input type="number" id="product-price" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-150" placeholder="0.00">
                </div>
                <div>
                    <label for="product-stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Stock</label>
                    <input type="number" id="product-stock" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-150" placeholder="0">
                </div>
            </div>
            <div>
                <label for="product-category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
                <select id="product-category" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-150">
                    <option>Select category</option>
                    <option>Furniture</option>
                    <option>Lighting</option>
                    <option>Decor</option>
                    <option>Textiles</option>
                </select>
            </div>
            <div>
                <label for="product-status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                <select id="product-status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-150">
                    <option>Active</option>
                    <option>Draft</option>
                    <option>Archived</option>
                </select>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <label for="modal-toggle" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-600 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 cursor-pointer transition-colors duration-150">
                    Cancel
                </label>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-150">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</div>