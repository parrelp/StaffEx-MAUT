  window.addEventListener('DOMContentLoaded', () => {
      const alert = document.getElementById('alert-message');
      if (alert) {
          setTimeout(() => {
              alert.style.animation = 'fadeOut 0.5s ease-out forwards';
          }, 3000); // Muncul selama 3 detik

          setTimeout(() => {
              alert.remove();
          }, 3500); // Hapus dari DOM setelah animasi
      }
  });