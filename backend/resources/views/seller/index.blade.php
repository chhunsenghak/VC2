<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
        <h1>Total users register: {{ count($users) }}</h1>
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">User Name</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Email</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Check</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Phone number</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Contact</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('Permission access')
              @foreach($users as $user)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->id }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->check }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->phone }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $user->address }}</td>
                <td class="py-4 px-6 border-b border-grey-light text-right">
                  <!-- <button type="button" @click="openModalBtn({{ $user }})" class="btn-open-modal bg-green-500 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-white">Edit</button> -->
                  @can('Permission edit')
                  <a href="{{route('admin.seller.edit',$user->id)}}" class="bg-yellow-500 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-white">Update</a>
                  @endcan
                  @can('Permission delete')
                  <form action="{{ route('admin.seller.destroy', $user->id) }}" method="POST" class="inline">
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

    function deleteUser(userId) {
      if (confirm('Are you sure you want to delete this user?')) {
        fetch(`/users/${userId}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          })
          .then(response => response.json("success"))
          .then(data => {
            if (data.success) {
              location.reload();
            } else {
              alert('Error deleting user');
            }
          });
      }
    }
  </script>
</x-app-layout>