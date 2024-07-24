<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">

      <div class="container mx-auto px-6 py-2">
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">ID</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">User Name</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Email</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Check</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Phone number</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Contact</th>
                <th scope="col" class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('Permission access')
              @foreach($users as $user)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-grey-light">{{ $user->id }}</td>
                <td class="py-4 px-6 border-grey-light">{{ $user->name }}</td>
                <td class="py-4 px-6 border-grey-light">{{ $user->email }}</td>
                <td class="py-4 px-6 border-grey-light">
                  @if ($user->check_id == null)
                  <span class="text-red-500">Free</span>
                  @elseif ($user->check_id)
                  <span class="text-green-500">premium</span>
                  @endif
                </td>
                <td class="py-4 px-6 border-grey-light">{{ $user->phone }}</td>
                <td class="py-4 px-6 border-grey-light inline-flex gap-1 text-blue-500">
                  @if($user->telegram !== null)
                  @php
                  $telegramLink = $user->telegram;
                  if (!str_starts_with($telegramLink, 'http://') && !str_starts_with($telegramLink, 'https://')) {
                  $telegramLink = 'http://' . $telegramLink;
                  }
                  @endphp
                  <a target="_blank" href="{{ $telegramLink }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09" />
                    </svg>
                  </a>
                  @endif

                  @if($user->facebook !== null)
                  @php
                  $facebookLink = $user->facebook;
                  if (!str_starts_with($facebookLink, 'http://') && !str_starts_with($facebookLink, 'https://')) {
                  $facebookLink = 'http://' . $facebookLink;
                  }
                  @endphp
                  <a target="_blank" href="{{ $facebookLink }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                  </a>
                  @endif
                </td>
                <td class="py-4 px-6 border-grey-light text-right">
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
          @can('Permission access')
          <div class="text-right p-4 py-10">
            {{ $users->links() }}
          </div>
          @endcan
        </div>
      </div>
    </main>
  </div>

  <!-- HTML -->
  <script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
      searchNameSeller(this.value);
    });

    function searchNameSeller(searchTerm) {
      let trs = document.querySelectorAll('tbody tr');
      searchTerm = searchTerm.toLowerCase();
      let foundItem = false;

      trs.forEach(tr => {
        let nameCell = tr.querySelector('td[data-name]');
        if (nameCell) {
          let name = nameCell.getAttribute('data-name').toLowerCase();
          if (name.includes(searchTerm)) {
            tr.style.display = '';
            foundItem = true;
          } else {
            tr.style.display = 'none';
          }
        }
      });

    }




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