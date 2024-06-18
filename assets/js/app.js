
confirmationToDelete();

function confirmationToDelete()
{

    let deleteBtn = document.querySelectorAll(".delete-btn")
    // console.log(deleteBtn);


    for(let i=0;i<deleteBtn.length;i++)
    {

        deleteBtn[i].addEventListener("click",(event)=>{
     
            let adminConfirmed =  confirm("you really want to delete it");
    
            if(adminConfirmed == false)
            {
                event.preventDefault();
            }
    
        })
    }
    

  
}

