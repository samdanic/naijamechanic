const pic = document.getElementById('pic');

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
    

    $(".pic").text('');
    


    if (pic.value === '') {
        picError.empty = 'File is required';
        valid = false;
    }
   id = false;
    return {
        picError,valid
    }
}




const uploadBTN = async (event) => {
    event.preventDefault();
    const formData = {};
    const {   picError, valid } = await validateInput();
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
        
    }
    else {

        $(document).ready(async () => {
            $('.loader').css('display', 'flex')
        })
        formData.pic = pic.value
        const apiURl = `Controllers/upload.php`;
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
                        $('#alert').append(`<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        ${e}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);
                       
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