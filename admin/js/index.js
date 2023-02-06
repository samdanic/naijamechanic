const name = document.getElementById('fullname');
const association = document.getElementById('association');
const phone_no = document.getElementById('phone_no');
const email = document.getElementById('email');
const address = document.getElementById('address');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');

let error = false;
// let states = [];
// let stateLga = [];
// let localGoverment = {};

// $(document).ready(async () => {
//     setTimeout(() => {
//         $('.loader').css('display', 'none')
//         $('html, body').animate({
//             scrollTop: $('form').offset().top
//         }, 'slow');
//     }, 1200);
//     $(".modal-text").text('Note: \n After registration you can click the pay button and proceed with the payment of your monthly dues..Thanks!');
//     $('.modal').css('display', 'flex')
// })


// $('#state').on('change', function () {
//     try {
//         localGoverment[this.value].map(item => {
//             const { name, abrv } = item
//             $('#lga').append(`
//         <option name=${item}>${item}</option>
//         `)
//         })
//     } catch (error) {
//         $(".alert-warning").text(error.message);
//         $(".messages").css('display', 'flex');
//         $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
//     }
// });

// $(document).ready(async () => {
//     try {
//         const url = './state.json';
//         const lgaurl = './lga.json';
//         const headers = new Headers();
//         headers.append('Accept', 'application/json');
//         const options = {
//             method: 'GET',
//             headers
//         }
//         const result = await fetch(url, options)
//         const lgaRresult = await fetch(lgaurl, options)
//         const response = await result.json();
//         const lgaRresponse = await lgaRresult.json();
//         const { ruawi_states } = response
//         const { lgaList } = lgaRresponse
//         states = ruawi_states;
//         localGoverment = lgaList;
//         ruawi_states.map(item => {
//             const { name, abrv } = item
//             $('#state').append(`
//             <option name=${abrv}>${name}</option>
//             `)
//         })
//     } catch (error) {
//         $(".alert-warning").text(error.message);
//         $(".messages").css('display', 'flex');
//         $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
//     }
// })

const closeMessage = async () => {
    $('.messages').css('display', 'none')
}


const closeModal = async (event) => {
    event.preventDefault()
    $('.modal').fadeOut('slow');
}

const validateInput = async () => {
    let valid = true;
    const nameError = {};
    const associationError = {};
    // const stateError = {};
    // const lgaError = {};
    const emailError = {};
    const phone_noError = {};
    const addressError = {};
    // const area_of_specializationError= {}
    const passwordError= {}
    const cpasswordError= {}
    

    $(".name").text('');
    $(".address").text('');
    // $(".area_of_specialization").text('');
    $(".association").text('');
    // $(".state").text('');
    // $(".lga").text('');
    $(".email").text('');
    $(".phone_no").text('');
    $(".password").text('');
    $(".cpassword").text('');
    $(".messages").css('display', 'none');


    if (name.value === '') {
        nameError.empty = 'Full name is required';
        valid = false;
    }
    if (association.value === '') {
        associationError.empty = 'bank name is required';
        valid = false;
    }
    // if (state.value === '' || state.value === 'Select state') {
    //     stateError.empty = 'State is required';
    //     valid = false;
    // }
    // if (lga.value === '' || lga.value === 'Select local government') {
    //     lgaError.empty = 'Local government is required';
    //     valid = false;
    // }
    if (phone_no.value === '') {
        phone_noError.empty = 'phone no. is required';
        valid = false;
    }
    if (email.value === '') {
        emailError.empty = 'email is required';
        valid = false;
    }
    // if (area_of_specialization.value === '') {
    //     area_of_specializationError.empty = 'Area of Specialization is required';
    //     valid = false;
    // }
    if (address.value === '') {
        addressError.empty = 'address is required';
        valid = false;
    }
    if (cpassword.value === '') {
        cpasswordError.empty = 'cpassword is required';
        valid = false;
    }
    // if (password.value === '') {
    //     passwordError.empty = 'password is required';
    //     valid = false;
    // }
    
        if (password.value === '') {
            passwordError.empty = "please enter your password";
            valid = false;
        }
        else if (password.type === 'password' && password.value.length < 8 ) {
            console.log('Checking password', cpassword.value.length);
            passwordError.empty =  "Password should be 8 characters or more";
            valid =false;
        }
        else if (password.type === 'password' && password.value !== cpassword.value) {
            cpasswordError.empty = "password do not match";
            // passwordError.empty = "password do not match";
            valid = false;
           if (password.value.length !== cpassword.value.length) {
                 cpasswordError.empty = "password do not match";
                    valid = false;
                    password.empty = 'password do not match';
                //  $(`.cpassword`).text(`Password do not match`)
            }
        }
        else {
           passwordError.empty = ""
        }
   
    
    if (phone_no.value === '') {
        phone_no.empty = 'Phone is required';
        valid = false;
    }
    if (phone_no.value.length < 11) {
        phone_noError.error = 'Phone should be 11 characters or more';
        
        valid = false;
    }
    return {
        nameError, associationError,addressError, passwordError, phone_noError,emailError,cpasswordError, valid
    }
}

const becomeAMember = async (event) => {
    event.preventDefault();
    const formData = {};
    const {   nameError, associationError,addressError,passwordError,  phone_noError,emailError,cpasswordError, valid } = await validateInput();
    $(document).ready(async () => {
        $('.loader').css('display', 'flex')
    })
    if (valid === false) {
        $(document).ready(async () => {
            $('.loader').css('display', 'none')
        })
        $(".alert-warning").text('Some fields are empty');
        $(".messages").css('display', 'flex');
        $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
        setTimeout(() => {
            $(".messages").css('display', 'none');
        }, 5000);
        Object.keys(nameError).map(item => {
            $(".name").text(nameError[item]);
        })
      
        Object.keys(associationError).map(item => {
            $(".association").text(associationError[item]);
        })
        Object.keys(passwordError).map(item => {
            $(".password").text(passwordError[item]);
        })
        Object.keys(cpasswordError).map(item => {
            $(".cpassword").text(cpasswordError[item]);
        })
        Object.keys(addressError).map(item => {
            $(".address").text(addressError[item]);
        })
     
        Object.keys(phone_noError).map(item => {
            $(".phone_no").text(phone_noError[item]);
        })
        Object.keys(emailError).map(item => {
            $(".email").text(emailError[item]);
        })
        $(".phone_no").text(phone_noError.empty);
        $(".phone_length").text(phone_noError.length);
    }
    else {

        $(document).ready(async () => {
            $('.loader').css('display', 'flex')
        })
        formData.name = name.value
        formData.association = association.value
        formData.email = email.value
        formData.phone_no = phone_no.value
        formData.address = address.value
        formData.password =password.value
        formData.cpassword = cpassword.value
        const apiURl = `adminserverside.php`;
        $.ajax({
            method: "POST",
            url: apiURl,
            dataType: 'json',
            data: formData,
            beforeSend: function (data) {
                $(".member-add").html("Sending....");
                setTimeout(() => { $(".member-add").html("Register"); }, 5000);
            },
            success: async (data) => {
                if (data) {
                    if (data.success === false) {
                        $(document).ready(async () => {
                            $('.loader').css('display', 'none')
                        })
                        error = true;
                        $(".modal-text").text(data.message);
                        $(".modal").css('display', 'flex');
                        setTimeout(() => { $(".member-add").html("Register") }, 2500);

                    }
                    else if (data.success === true) {
                        $(document).ready(async () => {
                            $('.loader').css('display', 'none')
                            association.value = "";
                            name.value ="";
                            phone_no.value = "";
                            email.value = "";
                            address.value="";
                            password.value="";
                           
                           
                            
                        })
                        error = false;
                        $(".modal-text").text(data.message);
                        $(".modal").css('display', 'flex');
                        $(".warning").css('background-color', 'hsl(134, 61%, 41%)');

                        setTimeout(() => { $(".member-add").html("Register") }, 2500);
                        window.location.href="./../admin/login/"
                    }
                }
                else {
                    error = true;
                    $(".modal-text").text('Something went wrong');
                    $(".modal").css('display', 'flex');
                    setTimeout(() => { $(".member-add").html("Register") }, 2500);
                }
            }
        });
    }
}