const search = document.getElementById('search');
const outer = document.getElementById('outer-div');
const FetchData= async ()=>{

    
    // event.preventDefault();
    const formData ={}
    formData.search = search.value;
    const apiURLs = `Controllers/getMechanic.php`;
    $.ajax({
            method: "POST",
            url: apiURLs,
            dataType: 'json',
            data: formData,
            success: async (data) =>
             {
                if (data)
                 {
                    if (data.success === false) 
                    {
                        outer.innerHTML=(`

                        <div class="inner-div">
                        <div class="front">
                          <br/>
                          <br/>
                         
                          <div class="">
                            <h3 class="">${data.message}</h3>
                            <p class="front__text-para"><i class="fas fa-map-marker-alt front-icons"></i></p>
                            
                            <span class=""></span>
                            <p class="front__text-para"><i class="fas fa-phone-alt front-icons">${data.message}</i></p>
                            
                            <span class="front__text-hover"></span>
                            <p class="front__text-para"><i class="fas fa-mars front-icons"></i></p>
                            
                            <span class="front__text-hover">/span>
                          </div>
                        </div>
                        
                    
                      </div>
                        
                        `)
               

                    }else if (data.success===true){

                        console.log(data.mobile);
                        console.log(data.workshop);

                        outer.innerHTML=(`
                        <br/>
                        <div class="inner-div">
                        <div class="front">
                          <br/>
                          <br/>
                          <div class="">
                          <img src="${data.image}" class=""style="height:120px;width:130px>
                          </div>
                          <div class="front__text">
                            <h3 class="front__text-header">${data.fullname}</h3>
                            <p class="front__text-para"><i class="fas fa-map-marker-alt front-icons"></i></p>
                            
                            <span class="front__text-hover">${data.workshop}</span>
                            <p class="front__text-para"><i class="fas fa-phone-alt front-icons"></i></p>
                            
                            <span class="front__text-hover">${data.mobile}</span>
                            <p class="front__text-para"><i class="fas fa-mars front-icons"></i></p>
                            
                            <span class="front__text-hover">${data.gender}</span>
                          </div>
                        </div>
                        <div class="back">
                          <div class="social-media-wrapper">
                            <a href="#" class="social-icon"><i class="fab fa-codepen" aria-hidden="true"></i></a> 
                            <a href="#" class="social-icon"><i class="fab fa-github-square" aria-hidden="true"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-linkedin-square" aria-hidden="true"></i></a>
                             <a href="#" class="social-icon"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                          </div>
                        </div>
                    
                      </div>
                        
                        `)
                        
                    }
                }
            }
    })
}