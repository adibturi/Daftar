// Saat pengguna scroll lebih dari 100px dari atas, tampilkan tombol
window.onscroll = function() {
    scrollFunction();
  };

  function scrollFunction() {
    var backToTopButton = document.getElementById("back-to-top");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      backToTopButton.style.display = "block"; // Tampilkan tombol
    } else {
      backToTopButton.style.display = "none"; // Sembunyikan tombol
    }
  }

  // Ketika tombol diklik, scroll ke atas halaman
  document.getElementById("back-to-top").addEventListener("click", function() {
    window.scrollTo({
      top: 0,
      behavior: "smooth" // Scroll ke atas dengan animasi smooth
    });
  });
  // Animasi untuk footer muncul saat di-scroll ke bagian bawah
document.addEventListener("scroll", function() {
const footer = document.querySelector(".footer");
const footerPosition = footer.getBoundingClientRect().top;
const screenPosition = window.innerHeight;

if (footerPosition < screenPosition) {
  footer.classList.add("footer-visible");
}
});
const pointer = document.getElementById('pointer');

// Fungsi untuk menggerakkan pointer
document.addEventListener('mousemove', (e) => {
pointer.style.left = `${e.pageX}px`;
pointer.style.top = `${e.pageY}px`;
});

// Optional: Menambahkan efek klik (besar kecil saat klik)
document.addEventListener('mousedown', () => {
pointer.style.transform = 'translate(-50%, -50%) scale(1.5)';
});

document.addEventListener('mouseup', () => {
pointer.style.transform = 'translate(-50%, -50%) scale(1)';
});


//     // darkmode
//     // Mengambil elemen tombol dan body
// const darkModeToggle = document.getElementById('dark-mode-toggle');
// const body = document.body;

// // Mengatur event listener untuk dark mode
// darkModeToggle.addEventListener('click', function () {
//   // Toggle kelas dark-mode pada body
//   body.classList.toggle('dark-mode');

//   // Mengganti ikon dari bulan ke matahari atau sebaliknya
//   const icon = darkModeToggle.querySelector('i');
//   if (body.classList.contains('dark-mode')) {
//     icon.classList.remove('fa-moon');
//     icon.classList.add('fa-sun');
//   } else {
//     icon.classList.remove('fa-sun');
//     icon.classList.add('fa-moon');
//   }
// });
