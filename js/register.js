const firstname = document.getElementById('firstname');
const workshop = document.getElementById('workshop');
const state = document.getElementById('state');
const lga = document.getElementById('lga');
const mobile = document.getElementById('mobile');
const lastname = document.getElementById('lastname');
const gender = document.getElementById('gender');
const dob = document.getElementById('dob');
const profession = document.getElementById('profession');
const association = document.getElementById('association');

let error = false;
let states = [];
let stateLga = [];
let localGoverment = {};



$('#state').on('change', function () {
    try {
        localGoverment[this.value].map(item => {
            const { name, abrv } = item
            $('#lga').append(`
        <option name=${item}>${item}</option>
        `)
        })
    } catch (error) {
        $(".alert-warning").text(error.message);
        $(".messages").css('display', 'flex');
        $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
    }
});



$(document).ready(async () => {
    try {
        const url = './Js/state.json';
        const lgaurl = './Js/lga.json';
        const headers = new Headers();
        headers.append('Accept', 'application/json');
        const options = {
            method: 'GET',
            headers
        }
        const result = await fetch(url, options)
        const lgaRresult = await fetch(lgaurl, options)
        const response = await result.json();
        const lgaRresponse = await lgaRresult.json();
        const { ruawi_states } = response
        const { lgaList } = lgaRresponse
        states = ruawi_states;
        localGoverment = lgaList;
        ruawi_states.map(item => {
            const { name, abrv } = item
            $('#state').append(`
            <option name=${abrv}>${name}</option>
            `)
        })
    } catch (error) {
        $(".alert-warning").text(error.message);
        $(".messages").css('display', 'flex');
        $(".warning").css('background-color', 'hsl(45, 100%, 51%)');
    }
})
const closeMessage = async () => {
    $('.messages').css('display', 'none')
}


const closeModal = async (event) => {
    event.preventDefault()
    $('.modal').fadeOut('slow');
}

const validateInput = async () => {
    let valid = true;
    const firstnameError = {};
    const workshopError = {};
    const stateError = {};
    const lgaError = {};
    const mobileError = {};
    const genderError = {};
    const lastnameError= {}
    const professionError= {}
    const dobError= {}

    $(".firstname").text('');
    $(".gender").text('');
    $(".lastname").text('');
    $(".workshop").text('');
    $(".state").text('');
    $(".lga").text('');
    $(".mobile").text('');
    $(".dob").text('');
    $(".profession").text('');
    $(".messages").css('display', 'none');


    if (firstname.value === '') {
        firstnameError.empty = 'First Name is required';
        valid = false;
    }
    if (workshop.value === '') {
        workshopError.empty = 'Workshop Address is required';
        valid = false;
    }
    if (state.value === '' || state.value === 'Select state') {
        stateError.empty = 'State is required';
        valid = false;
    }
    if (lga.value === '' || lga.value === 'Select local government') {
        lgaError.empty = 'Local government is required';
        valid = false;
    }
    if (profession.value === '') {
        professionError.empty = 'profession. is required';
        valid = false;
    }
    if (lastname.value === '') {
        lastnameError.empty = 'Last Name is required';
        valid = false;
    }
    if (mobile.value === '') {
        mobileError.empty = 'Phone No is required';
        valid = false;
    }
    if (gender.value === '') {
        genderError.empty = 'Gender is required';
        valid = false;
    }
    if (dob.value === '') {
        dobError.empty = 'Date of Birth is required';
        valid = false;
    }
    
    if (mobile.value === '') {
        mobile.empty = 'Phone is required';
        valid = false;
    }
    if (mobile.value.length < 11) {
        mobileError.error = 'Phone should be 11 characters or more';
        
        valid = false;
    }
    return {
        firstnameError, workshopError,lastnameError,stateError, dobError, lgaError, mobileError, professionError,genderError, valid
    }
}




const becomeAMember = async (event) => {
    event.preventDefault();
    const formData = {};
    const {   firstnameError, workshopError,lastnameError,stateError, dobError, lgaError, mobileError,genderError, professionError, valid } = await validateInput();
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
        Object.keys(firstnameError).map(item => {
            $(".firstname").text(firstnameError[item]);
        })
        Object.keys(lastnameError).map(item => {
            $(".lastname").text(lastnameError[item]);
        })
        Object.keys(workshopError).map(item => {
            $(".workshop").text(workshopError[item]);
        })
        Object.keys(professionError).map(item => {
            $(".profession").text(professionError[item]);
        })
        Object.keys(dobError).map(item => {
            $(".dob").text(dobError[item]);
        })
        Object.keys(genderError).map(item => {
            $(".gender").text(genderError[item]);
        })
        Object.keys(stateError).map(item => {
            $(".state").text(stateError[item]);
        })
        Object.keys(lgaError).map(item => {
            $(".lga").text(lgaError[item]);
        })
        Object.keys(mobileError).map(item => {
            $(".mobile").text(mobileError[item]);
        })
        $(".mobile").text(mobileError.empty);
        $(".phone_length").text(mobileError.length);
    }
    else {

        $(document).ready(async () => {
            $('.loader').css('display', 'flex')
        })
        formData.firstname = firstname.value
        formData.workshop = workshop.value
        formData.state = state.value
        formData.lga = lga.value
        formData.mobile = mobile.value
        formData.lastname = lastname.value
        formData.gender = gender.value
        formData.dob =dob.value
        formData.profession =profession.value
        formData.association =association.value
        const apiURl = `Controllers/register.php`;
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
                        console.log(data.mobile);
                        $(document).ready(async () => {
                            $('.loader').css('display', 'none')
                            // workshop.value = "";
                            // firstname.value ="";
                            // mobile.value = "";
                            // state.value ="";
                            // lga.value = "";
                            // file.value = "";
                            // gender.value="";
                            // lastname.value="";
                            // dob.value="";
                            
                            
                        })
                        error = false;
                        $(".modal-text").text(data.message);
                        $(".modal").css('display', 'flex');
                        $(".warning").css('background-color', 'hsl(134, 61%, 41%)');

                        setTimeout(() => { $(".member-add").html("Register") }, 2500);
                        window.location.href="./file/"
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