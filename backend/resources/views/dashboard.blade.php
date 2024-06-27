<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                <h4 class="text-gray-700 text-3xl">Welcome : {{ auth()->user()->name }}</h4>

                <!-- <p>Role :<b>
                        @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                        @endforeach
                    </b> </p> -->
            </div>
            <div class="pl-5 flex gap-5">
                <div class="w-60 block max-w-sm p-6 bg-green-400 rounded-lg shadow ">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total User</h5>
                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400">{{count($frontend)}} People</p>

                    <a class="mt-5 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 {{ Route::currentRouteNamed('front.frontuser.index') ? 'active' : '' }}" href="{{ route('front.frontuser.index')}}">
                        <svg class="rtl:rotate-180 pl-1 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                        <span class="mx-3">User Register</span>
                    </a>
                </div>
                <div class="w-60 block max-w-sm p-6 bg-red-500 rounded-lg shadow hover:bg-red-400 dark:bg-gray-100 dark:border-gray-100 dark:hover:bg-gray-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Category</h5>
                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400">{{count($categoies)}} Cateogies</p>
                    <a class="mt-5 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800{{ Route::currentRouteNamed('admin.categorys.index') ? 'active' : '' }}" href="{{ route('admin.categorys.index')}}">
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                        <span class="mx-3">Category</span>
                    </a>
                </div>
                <div class="w-60 block max-w-sm p-6 bg-yellow-400  rounded-lg shadow hover:bg-yellow-300 dark:bg-gray-100 dark:border-gray-100 dark:hover:bg-gray-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Product</h5>
                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400">{{count($products)}} Products</p>

                    <a class="mt-5 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 {{ Route::currentRouteNamed('admin.products.index') ? 'active' : '' }}" href="{{ route('admin.products.index')}}">

                        <span class="mx-3">Product</span>
                    </a>
                </div>
                <div class="w-60 block max-w-sm p-6 bg-blue-400 rounded-lg shadow hover:bg-blue-300 dark:bg-gray-100 dark:border-gray-100 dark:hover:bg-gray-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Seller</h5>
                    <p class="font-normal text-lg text-gray-700 dark:text-gray-400">200 people</p>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>