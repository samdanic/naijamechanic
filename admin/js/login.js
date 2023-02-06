const email = document.getElementById('email');
const password = document.getElementById('password');
const access = document.getElementById('access');

let error = false;



const validateInput = async () => {
    let valid = true;
    const emailError = {};
    const passwordError = {};
    const accessError = {};

    $(".email").text('');
    $(".password").text('');

    if (email.value === '') {
        emailError.empty = ' email is required';
        valid = false;
    }
    if (password.value === '') {
        passwordError.empty = ' password is required';
        valid = false;
    }
    if (access.value === '') {
        accessError.empty = ' access code is required';
        valid = false;
    }
    return {
        emailError, passwordError,accessError, valid
    }


}
const becomeAMember = async (event) => {
    event.preventDefault();
    const formData = {};
    const {   emailError, passwordError,accessError, valid} = await validateInput();
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
        Object.keys(emailError).map(item => {
            $(".email").text(emailError[item]);
        })

        Object.keys(passwordError).map(item => {
            $(".password").text(passwordError[item]);
        })

        Object.keys(accessError).map(item => {
            $(".access").text(accessError[item]);
        })
      
       
       
    }
    else {

        $(document).ready(async () => {
            $('.loader').css('display', 'flex')
        })
        formData.email = email.value
        formData.access = access.value
        formData.password = password.value
        const apiURl = `./../login/loginserverside.php`;
        $.ajax({
            method: "POST",
            url: apiURl,
            dataType: 'json',
            data: formData,
            beforeSend: function (data) {
                $(".member-add").html("Logging....");
                setTimeout(() => { $(".member-add").html("Register"); }, 5000);
            },
            success: async (data) => {
                if (data) {
                    if (data.success === false) {
                        error = true;
                        
                       if (data.success ===false && data.message==="The password is incorrect") {
                        setTimeout(()=>{$(".password").text(data.message)  },500);
                       }
                       if (data.success ===false && data.message==="Email does not exist") {
                        setTimeout(()=>{ $(".email").text(data.message)},500);
                       } 
                       if (data.success ===false && data.message==="Access Code does not exist") {
                        setTimeout(()=>{$(".access").text(data.message)},500);
                       } 
                  
                    }
                    else if (data.success === true) {
                       
                        error = false;
                        // $(".modal-text").text(data.message);
                        // $(".modal").css('display', 'flex');
                        // $(".warning").css('background-color', 'hsl(134, 61%, 41%)');
                        // $(".access").text(data.message);

                        setTimeout(() => { $(".member-add").html("Login..") }, 2500);
                        if (data.success==true && data.message=== "done") {
                            window.location.href= "./../../index.php"
                        }
                        
                    }
                }
                else {
                    error = true;
                    // $(".modal-text").text('Something went wrong');
                    // $(".modal").css('display', 'flex');
                    // setTimeout(() => { $(".member-add").html("Register") }, 2500);
                }
            }
        });
    }
}