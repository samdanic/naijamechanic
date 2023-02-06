const pic = document.getElementById('pic');
const cert = document.getElementById('cert');
const mobile = document.getElementById('mobile');
const warn = document.getElementById('cons');

const closeMessage = async () => {
    $('.messages').css('display', 'none')
}


const closeModal = async (event) => {
    event.preventDefault()
    $('.modal').fadeOut('slow');
}

const validateInput = async () => {
    let valid = true;
    const picError = {};
    const certError = {};
    const mobileError = {};
    

    $(".pic").text('');
    $(".cert").text('');
    $(".mobile").text('');
    
    


    if (mobile.value === '') {
        mobileError.empty = 'File is required';
        valid = false;
    }
    if (pic.value === '') {
        picError.empty = 'image field is required';
        valid = false;
    } if (cert.value === '') {
        certError.empty = 'Certificate field is required';
        valid = false;
    }
   id = false;
    return {
        picError, mobileError, certError, valid
    }
}




const uploadImage = async () => {
   
    // const formData = {};
    const {   picError,mobileError,certError, valid } = await validateInput();
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
        Object.keys(picError).map(item => {
            $(".pic").text(picError[item]);
        })
        Object.keys(certError).map(item => {
            $(".cert").text(certError[item]);
        })
        Object.keys(mobileError).map(item => {
            $(".mobile").text(mobileError[item]);
        })
        
    }
    else {

        $(document).ready(async () => {
            $('.loader').css('display', 'flex')
        })
        
       await fetch('./../Controllers/upload.php', {
            method: "POST",
            body: new FormData(document.getElementById('loginForm')),
       }).then((response)=>{
        if (!response.ok) {
          warn.textContent= response.text;
                       
        }
        return response.text();
        window.location.href= "./../../index.php"
       })
       .then((text)=>warn.textContent= text)
       window.location.href= "./../index.php";

    //    .catch((error) => warn.textContent = `Could not fetch verse: ${error}`);
      
          
        // $.ajax({
        //     method: "POST",
        //     url: apiURl,
        //     dataType: 'json',
        //     data: formData,
        //     beforeSend: function (data) {
        //         $(".member-add").html("Sending....");
        //         setTimeout(() => { $(".member-add").html("Register"); }, 5000);
        //     },
        //     success: async (data) => {
        //         if (data) {
        //             if (data.success === false) {
        //                 $(document).ready(async () => {
        //                     $('.loader').css('display', 'none')
        //                 })
        //                 error = true;
        //                 $(".modal-text").text(data.message);
        //                 $(".modal").css('display', 'flex');
        //                 setTimeout(() => { $(".member-add").html("Register") }, 2500);

        //             }
        //             else if (data.success === true) {
        //                 console.log(data.mobile);
        //                 $('#alert').append(`<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        //                 ${e}
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                     <span aria-hidden="true">&times;</span>
        //                 </button>
        //             </div>`);
                       
        //             }
        //         }
        //         else {
        //             error = true;
        //             $(".modal-text").text('Something went wrong');
        //             $(".modal").css('display', 'flex');
        //             setTimeout(() => { $(".member-add").html("Register") }, 2500);
        //         }
        //     }
        // });
    }
}