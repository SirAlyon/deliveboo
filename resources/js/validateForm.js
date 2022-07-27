let inputs = document.querySelectorAll('.form-control')

inputs.forEach(input =>{
  console.log(input.type, input.id);


  input.addEventListener('keyup', function() {
    if (input.type === 'text' || input.type === 'textarea'){
      if(input.value.trim().length == 0){
        input.value = ""
      } 
      //console.log(input.value);
      input.value = input.value.split('  ').join(' ') 
      if (input.value.length < 3){
        input.classList.remove('is-valid')

        input.classList.add('is-invalid')
      }else{
        input.classList.add('is-valid')

        input.classList.remove('is-invalid')
      }

    }/* else if(input.type === 'file'){
      let fileExtension = input.value.slice((Math.max(0, input.value.lastIndexOf(".")) || Infinity) + 1);
      console.log(fileExtension);
      if (fileExtension !== 'jpg' || fileExtension !== 'png' || fileExtension !== 'jpeg' || fileExtension !== 'svg'){
        input.value = ""
      }
    } */

    
    if(input.id === 'price'){
      console.log(Number(input.value), input.value.length);

      if(Number(input.value) == 0 || input.value.includes('.') && input.value.split('.')[1].length > 2){
        input.classList.remove('is-valid')

        input.classList.add('is-invalid')
      }else{
        input.classList.add('is-valid')

        input.classList.remove('is-invalid')
      }
    }
    
    if(input.id === 'vat'){
      console.log(input.value, input.value.length);
      if(input.value.length !== 11 || isNaN(Number(input.value))){
        console.log(Number.isNaN(input.value), Number(input.value));
        input.classList.remove('is-valid')

        input.classList.add('is-invalid')
      }else{
        input.classList.add('is-valid')

        input.classList.remove('is-invalid')
      }
    }

  })
})

let passwordInput = document.querySelector('#password');
let passwordConfirm = document.querySelector('#password-confirm')
console.log(passwordInput, passwordConfirm);

if(passwordConfirm){
  passwordConfirm.addEventListener('keyup', () =>{
    console.log(passwordInput.value, passwordConfirm.value);
    if(passwordInput.value != passwordConfirm.value || passwordInput.value.length < 8){
        passwordInput.classList.remove('is-valid')
        passwordConfirm.classList.remove('is-valid')
    
        passwordInput.classList.add('is-invalid')
        passwordConfirm.classList.add('is-invalid')
    
    }else{
        passwordInput.classList.add('is-valid')
        passwordConfirm.classList.add('is-valid')
    
    
        passwordInput.classList.remove('is-invalid')
        passwordConfirm.classList.remove('is-invalid')
    
    }
})

}


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

      }else if(input.type === 'file'){
        let fileExtension = input.value.split('.').pop();
        
        let allowedExtensione = ['jpg', 'png', 'jpeg', 'gif']
        console.log(fileExtension);
        if (!allowedExtensione.includes(fileExtension)){
          console.log('deleted', fileExtension === 'jpg');
          input.value = ""
        }
      }
      
    }) 
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
  }, false);
});

