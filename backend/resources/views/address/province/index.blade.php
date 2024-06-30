<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
                @can('Address create')
                <a href="{{route('admin.province.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Province</a>
                @endcan
            </div>
            <div class="shadow-md bg-white rounded my-6">
                <table class="text-left w-full border-collapse">
                    <thead class="uppercase">
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID </th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Provice</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @can('Address access')
                        @foreach($province as $item)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">
                                {{ $item->id}}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light text-right">
                                @can('Post edit')
                                <a href="{{route('admin.province.edit',$item->id)}}" class="text-white font-bold py-1 px-3 rounded text-xs bg-blue-500 hover:bg-green-dark text-white-400">Edit</a>
                                @endcan

                                @can('Post delete')
                                <form action="{{ route('admin.province.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button class="text-white font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-blue-dark text-white-400">Delete</button>
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
                    {{ $province->links() }}
                </div>
                @endcan
            </div>

        </div>
    </main>
    <!-- HTML -->
</x-app-layout>