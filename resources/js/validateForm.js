let inputs = document.querySelectorAll('.form-control')

inputs.forEach(input =>{
  console.log(input.type);

  input.addEventListener('change', function() {
    if (input.type === 'text' || input.type === 'textarea'){
      if(input.value.trim().length == 0){
        input.value = ""
      } 
      console.log(input.value);
      input.value = input.value.split('  ').join(' ') 

    }else if(input.type === 'file'){
      let fileExtension = input.value.slice((Math.max(0, input.value.lastIndexOf(".")) || Infinity) + 1);
      console.log(fileExtension);
      if (fileExtension !== 'jpg' || fileExtension !== 'png' || fileExtension !== 'jpeg'){
        input.value = ""
      }
    }
    
  })
})

/* let nameInput = document.getElementById('name')
nameInput.addEventListener('keyup', function(){
  //do some stuff
  console.log(nameInput, nameInput.value, nameInput.value.trim().length);
  if(nameInput.value.trim().length == 0){
    nameInput.value = nameInput.value.trim().split('  ').join(' ') 
  } 
  nameInput.value = nameInput.value.split('  ').join(' ') 
}); */


// Fetch all the forms we want to apply custom Bootstrap validation styles to
const forms = document.querySelectorAll('.needs-validation');



// Loop over them and prevent submission
Array.prototype.slice.call(forms).forEach((form) => {
  console.log(form);



  form.addEventListener('submit', (event) => {
    let inputs = document.querySelectorAll('.form-control')

    inputs.forEach(input =>{
      console.log(input.type);

      if (input.type === 'text' || input.type === 'textarea'){
        if(input.value.trim().length == 0){
          input.value = input.value.trim()
        } 
        console.log(input.value);
        input.value = input.value.split('  ').join(' ') 

      }
      
    }) 
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
  }, false);
});

