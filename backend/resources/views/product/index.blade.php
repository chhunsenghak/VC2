<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="flex justify-between">
                    <h1>Total product: {{count($products)}}</h1>
                    <div class="text-right">
                        @can('Product create')
                        <a href="{{route('admin.products.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New product</a>
                        @endcan
                    </div>
                </div>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead class="text-xs bg-gray-50 dark:bg-gray-700 dark:text-gray-500">
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID </th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">product Name</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Description</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('Product access')
                            @foreach($products as $product)

                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    {{ $product->id}}
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product->description }}</td>

                                <td class="py-4 px-6 border-b border-grey-light text-right">
                                    <button type="button" @click="openModalBtn({{$product}})" class="btn-open-modal bg-blue-500 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-white">Detail</button>
                                    <div id="modal" class="fixed z-50 inset-0 overflow-y-auto hidden">
                                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-name"></h3>
                                                            <div class="mt-2">
                                                                <p class="text-lg text-gray-500" id="description"></p>
                                                                <p class="text-lg text-gray-500" id="price"></p>
                                                                <p class="text-lg text-gray-500" id="discount"></p>
                                                                <p class="text-lg text-gray-500" id="phone-number"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @can('Product access')
                                    <a href="{{route('admin.products.edit',$product->id)}}" class="bg-yellow-500 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-white">Update</a>
                                    @endcan
                                    @can('Product delete')
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button class=" font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-blue-dark text-white">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            @endcan
                        </tbody>
                    </table>
                    @can('Post access')
                    <div class="text-right p-4 py-10">
                        {{ $products->links() }}
                    </div>
                    @endcan
                </div>
            </div>
        </main>
    </div>
    <!-- HTML -->

    <script>
        const modal = document.getElementById('modal');
        const closeModalBtns = modal.querySelectorAll('button');
        const modalname = document.getElementById('modal-name');
        const modalPrice = document.getElementById('price');
        const modaldiscount = document.getElementById('discount');
        const modalDescription = document.getElementById('description');

        function openModalBtn(product) {
            modal.classList.remove('hidden');
            modalname.textContent = 'product name: ' + product.name;
            modalDescription.textContent = 'Description: ' + product.description;
            modalPrice.textContent = 'price: ' + product.price;
            modaldiscount.textContent = 'discount: ' + product.discount;
        }
        closeModalBtns.forEach((btn) => {
            btn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });
    </script>
</x-app-layout>