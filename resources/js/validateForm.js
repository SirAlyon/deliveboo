let inputs = document.querySelectorAll('.form-control')

inputs.forEach(input =>{
  console.log(input.type);

  input.addEventListener('keydown', function() {
    if (input.type === 'text' || input.type === 'textarea'){
      if(input.value.trim().length == 0){
        input.value = ""
      } 
      console.log(input.value);
      input.value = input.value.split('  ').join(' ') 

    }else if(input.type === 'file'){
      let fileExtension = input.value.slice((Math.max(0, input.value.lastIndexOf(".")) || Infinity) + 1);
      console.log(fileExtension);
      if (fileExtension !== 'jpg' || fileExtension !== 'png' || fileExtension !== 'jpeg' || fileExtension !== 'svg'){
        input.value = ""
      }
    }  
    
    if (input.type === 'number'){
      console.log(input.type === 'number');
    }
    
  })
})

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
        let fileExtension = input.value.slice((Math.max(0, input.value.lastIndexOf(".")) || Infinity) + 1);
        console.log(fileExtension);
        if (fileExtension !== 'jpg' || fileExtension !== 'png' || fileExtension !== 'jpeg' || fileExtension !== 'svg'){
          input.value = ""
        }
      }else if(input.value == 'number'){
        console.log(event.keyCode !== 69);
      }
      
    }) 
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
  }, false);
});

