<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="flex justify-end">
                    <div class="text-right">
                        @can('StockLimit create')
                        <a href="{{route('admin.stockType.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Stock Type</a>
                        @endcan
                    </div>
                </div>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead class="text-xs bg-gray-50 dark:bg-gray-700 dark:text-gray-500">
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID </th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Name</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Limit Quantity</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('StockLimit access')
                            @foreach($stocks as $stock)

                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">
                                    {{ $stock->id}}
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    {{ $stock->name }}
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    {{ $stock->limit_quantity }}
                                </td>

                                </td>
                                <td class="py-4 px-6 border-b border-grey-light text-right">
                                    @can('StockLimit access')
                                    <a href="{{route('admin.stockType.edit',$stock->id)}}" class="bg-yellow-500 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-white">Update</a>
                                    @endcan
                                    @can('StockLimit delete')
                                    <form action="{{ route('admin.stockType.destroy', $stock->id) }}" method="POST" class="inline">
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
                    @can('StockType access')
                    <div class="text-right p-4 py-10">
                        {{ $stocks->links() }}
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