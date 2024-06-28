<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.products.update',$product->id)}}">
                        @csrf
                        @method('put')
                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-gray-700 select-none font-medium">Product Name</label>
                            <input id="name" type="text" name="name" value="{{ old('product',$product->name) }}" placeholder="Enter name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="description" class="text-gray-700 select-none font-medium">Description</label>
                            <input id="description" type="text" name="description" value="{{ old('description',$product->description) }}" placeholder="Enter description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="stock" class="text-gray-700 select-none font-medium">stock</label>
                            <input id="stock" type="text" name="stock" value="{{ old('stock', $stock->quantity ) }}" placeholder="Enter stock" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="price" class="text-gray-700 select-none font-medium">Price</label>
                            <input id="price" type="text" name="price" value="{{ old('price', $product->price) }}" placeholder="Re-enter password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="category_id" class="text-gray-700 select-none font-medium">Category name</label>
                            <input id="category_id" type="text" name="category_id" value="{{ old('category', $category->name) }}" placeholder="Category_id" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>