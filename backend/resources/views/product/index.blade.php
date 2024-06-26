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
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID </th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">product Name</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Description</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Price</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Stock</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Category ID</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Discount</th>
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
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product->price }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product->stock }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product->categorys_id }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $product->dicsount }}</td>

                                <td class="py-4 px-6 border-b border-grey-light text-right">
                                    @can('Product delete')
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            @endcan
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <!-- HTML -->

    <script>
        const modal = document.getElementById('modal');
        const closeModalBtns = modal.querySelectorAll('button');
        const modalname = document.getElementById('modal-name');
        const modalPhone = document.getElementById('phone-number');
        const modalEmail = document.getElementById('email');
        const modalCity = document.getElementById('city');
        const modalGender = document.getElementById('gender');

        function openModalBtn(user) {
            modal.classList.remove('hidden');
            modalname.textContent = 'username: ' + user.name;
            modalPhone.textContent = user.phone;
            modalEmail.textContent = user.email;
            modalGender.textContent = user.gender;
            modalCity.textContent = user.city;
        }
        closeModalBtns.forEach((btn) => {
            btn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });
    </script>
</x-app-layout>