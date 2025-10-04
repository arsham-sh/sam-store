const checkboxes = document.querySelectorAll('.select-color');

checkboxes.forEach(checkbox => {
     checkbox.addEventListener('change', function () {
          if (this.checked)
               checkboxes.forEach(ab => {
                    if (ab !== this) {
                         ab.checked = false;
                    }
               });
     });
});


const sizeCheckboxes = document.querySelectorAll('.select-size');

sizeCheckboxes.forEach(check => {
     check.addEventListener('change', function () {
          if (this.checked)
               sizeCheckboxes.forEach(cb => {
                    if (cb !== this) {
                         cb.checked = false;
                    }
               });
     });
});