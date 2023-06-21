var edit_fields = document.querySelectorAll("#edit_field");
var save_button = document.getElementById('save_button');
save_button.style.backgroundColor = 'gray';
save_button.disabled = true;

for (let field of edit_fields) {
  field.addEventListener("click", function() {
    save();
  })
}

function save() {
  save_button.style.backgroundColor = '';
  save_button.disabled = false;
}