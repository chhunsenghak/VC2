<?php

use Illuminate\Support\Facades\Storage;
?>
<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">


        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">User Name</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Email</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Gender</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Phone number</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">City</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('User access')
              @foreach($users as $user)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  {{ $user->id}}
                </td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->gender }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->phone }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->city }}</td>
                <td class="py-4 px-6 border-b border-grey-light text-right">
                  @can('User delete')
                  <form action="{{ route('front.frontuser.destroy', $user->id) }}" method="POST" class="inline">
                    @csrf
                    @method('delete')
                    <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                  </form>
                  @endcan
                </td>
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
  </div>


</x-app-layout>