<?php
    include "../config/layout.php"
?>

<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
   <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-black">Tambah Anggota Baru</h2>
      <form action="proses-tambah.php" method="POST">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          <div class="sm:col-span-2">
                  <label for="namapetugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama Petugas</label>
                  <input type="text" name="namapetugas" id="namapetugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Nama Petugas" required="">
              </div>
              <div class="w-full">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Email</label>
                  <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Email" required="">
              </div>

                            <div class="w-full">
                  <label for="nomortelp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nomor Telpon</label>
                  <input type="text" name="nomortelp" id="nomortelp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Nomor Telpon" required="">
              </div>
              <div class="w-full">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Password</label>
    <div class="relative">
        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Password" required>
        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
            <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2 12s3-8 10-8 10 8 10 8-3 8-10 8-10-8-10-8z"></path>
            </svg>
        </button>
    </div>
</div>
<div class="col-span-2 sm:col-span-1">
    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Role</label>
    <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        <option value="Admin">Admin</option>
        <option value="Staf">Staf</option>
        <option value="Karyawan">Karyawan</option>
    </select>
</div>
                
          </div>
          <div class="sm:col-span-2">
            <br>
            <button type="submit" class="text-white bg-blue-700
hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600
dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
<button type="button" onclick="history.back()"
class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4
focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200
text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-
gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white
dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button> 
      </form>
  </div>
</section>
</div>
<script>
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Change icon based on the password visibility
        togglePasswordButton.querySelector('svg').classList.toggle('text-gray-500', type === 'password');
        togglePasswordButton.querySelector('svg').classList.toggle('text-primary-500', type === 'text');
    });
</script>
</body>
</html>