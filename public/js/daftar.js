
document.addEventListener('DOMContentLoaded', function() {
    // Form Animations
        const formGroups = document.querySelectorAll('.form-group');
        formGroups.forEach((group, index) => {
            setTimeout(() => {
              group.classList.add('appear');
            }, index * 200); // Delay animasi tiap field
          });

          // Form Validation
          const form = document.getElementById('registrationForm');
          form.addEventListener('submit', function(event) {
            event.preventDefault();
            event.stopPropagation();

            if (form.checkValidity()) {
              // Tampilkan notifikasi setelah berhasil submit
              const toast = new bootstrap.Toast(document.getElementById('submitToast'));
              toast.show();

              // Reset form setelah submit
              form.reset();
            } else {
              form.classList.add('was-validated');
            }
          }, false);
        });

  // Fungsi untuk menangani pengiriman form
  document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Menampilkan notifikasi toast
    var toastEl = document.getElementById('liveToast');
    var toast = new bootstrap.Toast(toastEl);
    toast.show();

    // Reset form setelah submit
    document.getElementById('registrationForm').reset();
  });
  function validateFileSize(input) {
    const file = input.files[0];
    const maxSize = 10 * 1024 * 1024; // 10 MB dalam byte
    if (file.size > maxSize) {
        alert("Ukuran file maksimal adalah 10 MB.");
        input.value = ""; // Hapus file dari input jika melebihi batas
    }
}

function isLetter(event) {
    var char = String.fromCharCode(event.which);
    // Memeriksa apakah karakter adalah huruf atau spasi
    return /^[A-Za-z\s]$/.test(char);
}
// Event listener ketika form di-submit
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah pengiriman form sesungguhnya


    // Notifikasi SweetAlert2 sukses
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data berhasil disimpan.',
        showConfirmButton: false,
        timer: 2000 // Menutup otomatis dalam 2 detik
    });

    // Simulasi pengiriman form (setelah alert, misalnya redirect atau proses lainnya)
    setTimeout(function() {
        // Di sini kamu bisa melakukan pengiriman form atau aksi lainnya setelah notifikasi
        // Misal: window.location.href = "/berhasil";
        document.getElementById('registrationForm').reset();
    }, 2000); // Timer sesuai dengan alert agar terjadi setelah notifikasi ditutup
});
