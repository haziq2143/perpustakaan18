const btn = document.getElementById('btn')
const names = document.getElementById('name')
const email = document.getElementById('email')
const password = document.getElementById('password')

btn.addEventListener('click', (event) => {
    event.preventDefault()
    confirmation()
})
  
function confirmation() {
    if(names.value != "" && email.value != "" && password.value != ""){
        Swal.fire({
            title: "Apakah kamu sudah yakin?",
            showDenyButton: true,
            confirmButtonText: "Ya, lanjutkan",
            denyButtonText: `Belum`
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire("Saved!", "", "success");
            } 
          });
    }else{
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Lengkapi Seluruh Form yang ada!!",
          });
    }
   
  
}