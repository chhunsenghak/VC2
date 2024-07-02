<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="flex justify-between mt-5">
                    <div class="text-right">
                        @can('Address create')
                        <a href="{{route('admin.province.index')}}" class="bg-blue-500 text-white font-bold px-20 py-5 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Province</a>
                        @endcan
                    </div>
                    <div class="text-right">
                        @can('Address create')
                        <a href="{{route('admin.district.index')}}" class="bg-blue-500 text-white font-bold px-20 py-5 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">District</a>
                        @endcan
                    </div>
                    <div class="text-right">
                        @can('Address create')
                        <a href="{{route('admin.commune.index')}}" class="bg-blue-500 text-white font-bold px-20 py-5 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Commnue</a>
                        @endcan
                    </div>
                    <div class="text-right">
                        @can('Address create')
                        <a href="{{route('admin.village.index')}}" class="bg-blue-500 text-white font-bold px-20 py-5 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Village</a>
                        @endcan
                    </div>
                </div>
                <div class="bg-white shadow-md rounded my-6">
                </div>
            </div>
        </main>
    </div>
    <!-- HTML -->
</x-app-layout>