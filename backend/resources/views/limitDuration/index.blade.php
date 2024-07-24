<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
        <div class="text-right">
          @can('Post create')
          <a href="{{route('admin.limitDuration.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Create New</a>
          @endcan
        </div>
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Price</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Durations</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Duration name</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('Permission access')
              @foreach($limitDurations as $item)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">{{ $item->id }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $item->price }}​ ៛</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $item->durations }}</td>
                <td class="py-4 px-6 border-b border-grey-light">
                  @php
                  $durationType = App\Models\LimitDurationType::find($item->limit_duration_type_id);
                  echo $durationType['name'];
                  @endphp
                </td>
                <td class="py-4 px-6 border-b border-grey-light text-right">
                  @can('Permission access')
                  <a href="{{route('admin.limitDuration.edit',$item->id)}}" class="bg-yellow-500 font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-white">Edit</a>
                  @endcan
                  @can('Permission access')
                  <form action="{{ route('admin.limitDuration.destroy', $item->id) }}" method="POST" class="inline">
                    @csrf
                    @method('delete')
                    <button class="font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-blue-dark text-white">Delete</button>
                  </form>
                  @endcan
                </td>
              </tr>
              @endforeach
              @endcan
            </tbody>
          </table>
          @can('Permission access')
          <div class="text-right p-4 py-10">
            {{ $limitDurations->links() }}
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