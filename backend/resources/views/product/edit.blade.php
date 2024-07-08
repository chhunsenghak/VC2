<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.products.update',$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex flex-col gap-4">
                            <label for="name" class="text-gray-700 select-none font-medium">Owner product</label>
                            <select name="frontuser_id" id="category_id" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $product->user_id ) == $product->id?'selected' : '' }}> {{ $user->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex gap-4 mt-5">
                            <div class="flex flex-col w-1/2">
                                <label for="name" class="text-gray-700 select-none font-medium">Product Name</label>
                                <input id="name" type="text" name="name" value="{{ old('product',$product->name) }}" placeholder="Enter name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="description" class="text-gray-700 select-none font-medium">Description</label>
                                <input id="description" type="text" name="description" value="{{ old('description',$product->description) }}" placeholder="Enter description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                        </div>

                        <div class="flex gap-4 mt-5">
                            <div class="flex flex-col w-1/2">
                                <label for="price" class="text-gray-700 select-none font-medium">Price</label>
                                <input id="price" type="text" name="price" value="{{ old('price', $product->price ) }}" placeholder="Re-enter password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="category_id" class="text-gray-700 select-none font-medium">Category name</label>
                                <select name="categorys_id" id="category_id" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == old('categorys_id', $product->categorys_id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-4 mt-5">
                            <div class="flex flex-row w-1/2">
                                <div class="flex flex-col w-3/4">
                                    <label for="quantity" class="text-gray-700 select-none font-medium">Stock</label>
                                    <input id="quantity" type="text" name="quantity" value="{{ old('stock', $stock->quantity ) }}" placeholder="Enter stock" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <label for="stock_type_id" class="text-gray-700 select-none font-medium">Type</label>
                                    <select id="stock_type_id" name="stock_type_id" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                        @foreach($stockTypes as $type)
                                        <option value="{{$type->id}}" {{ old('stock_type_id', $stock->stock_type_id ) == $type->id?'selected' : '' }}>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="discount" class="text-gray-700 select-none font-medium">Discount</label>
                                <input id="discount" type="text" name="discount" value="{{ old('discount', $product->discount ) }}" placeholder="Re-enter password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                        </div>
                        <div class="flex gap-4 mt-5">
                            <div class="flex flex-col w-1/2">
                                <label for="category_id" class="text-gray-700 select-none font-medium">Choose file of product</label>
                                <input name="image" class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="break_product_at" class="text-gray-700 select-none font-medium">Can keep up to</label>
                                <input name="break_product_at" value="{{ old('break_product_at', $product->break_product_at ? $product->break_product_at : '') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" type="date">
                            </div>
                        </div>
                        <div class="text-center mt-10 mb-10">
                            <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Update Product</button>
                        </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>