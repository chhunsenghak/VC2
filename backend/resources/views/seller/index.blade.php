<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
        <h1>Total users register: {{count($users)}}</h1>
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID </th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">User Name</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Email</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">check</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Phone number</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Contact</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
              </tr>
            </thead>

            <tbody>
              @can('Permission access')
              @foreach($users as $user)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  {{ $user->id}}
                </td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->check }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->phone }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->address }}</td>
                <td class="py-4 px-6 border-b border-grey-light text-right">
                  <button type="button" @click="openModalBtn({{$user}})" class="btn-open-modal bg-blue-500 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-white">Detail</button>
                  <div id="modal" class="fixed z-50 inset-0 overflow-y-auto hidden">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                          <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-name"></h3>
                              <div class="mt-2">
                                <p class="text-lg text-gray-500" id="email"></p>
                                <p class="text-lg text-gray-500" id="gender"></p>
                                <p class="text-lg text-gray-500" id="city"></p>
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