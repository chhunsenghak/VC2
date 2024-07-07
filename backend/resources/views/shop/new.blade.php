<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <form method="POST" action="{{ route('admin.products.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="flex gap-4">
                            <div class="flex flex-col w-1/2">
                                <label for="name" class="text-gray-700 select-none font-medium">Product Name</label>
                                <input id="name" type="text" name="name" placeholder="Enter name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="description" class="text-gray-700 select-none font-medium">Description</label>
                                <input id="description" type="text" name="description" placeholder="Enter description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                        </div>
                        <div class="flex gap-4 mt-5">
                            <div class="flex flex-row w-1/2">
                                <div class="flex flex-col w-3/4">
                                    <label for="quantity" class="text-gray-700 select-none font-medium">Stock</label>
                                    <input id="quantity" type="text" name="quantity" placeholder="Enter stock" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <label for="stock_type_id" class="text-gray-700 select-none font-medium">Type</label>
                                    <select id="stock_type_id" name="stock_type_id" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                        @foreach($stockTypes as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="shop" class="text-gray-700 select-none font-medium">shop</label>
                                <input id="shop" type="text" name="shop_id" placeholder="Enter stock" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                        </div>
                        <div class="flex gap-4 mt-5">
                            <div class="flex flex-col w-1/2">
                                <label for="price" class="text-gray-700 select-none font-medium">Price</label>
                                <input id="price" type="text" name="price" placeholder="Re-enter password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="category_id" class="text-gray-700 select-none font-medium">Category name</label>
                                <select name="categorys_id" id="category_id" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-4 mt-5">
                            <div class="flex flex-col w-1/2">
                                <label for="discount" class="text-gray-700 select-none font-medium">Discount</label>
                                <input id="discount" type="text" name="discount" placeholder="Re-enter password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                            </div>
                            <div class="flex flex-col w-1/2">
                                <label for="category_id" class="text-gray-700 select-none font-medium">Choose file of product</label>
                                <input name="image" class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file">
                            </div>
                        </div>
                        <div class="text-center mt-10 mb-10">
                            <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Create Product</button>
                        </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>