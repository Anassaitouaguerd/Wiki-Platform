
// VALIDATION DES FORMS
let valid = "";
let valid_pass = "";
function email_validation(e)
{
    document.querySelector(".btn_submit").disabled = true;
    
    if (e.key == "Enter") {
        const emailRegex = /^[a-zA-Z0-9._-]+@(hotmail|gmail)\.[a-zA-Z]{2,4}$/;
        const value_email = e.currentTarget.value;
        const messageValid = document.querySelector(".messageValid");
        
        if (value_email.match(emailRegex)) {
            messageValid.classList.remove("text-danger");
            messageValid.innerHTML = "The email is valid";
            messageValid.classList.add("text-success");
            valid = "valid";
        } else {
            messageValid.classList.remove("text-success");
            messageValid.classList.add("text-danger");
            messageValid.innerHTML = "The email is not valid";
            valid = " no valid";
        }
    }
    
}
function pass_validation(e)
{
    document.querySelector(".btn_submit").disabled = true;
    if (e.key == "Enter")
    {
        const passwordRegex = /^[a-zA-Z0-9!@#$%^&*()_+]{8,16}$/;
        const value_password = e.currentTarget.value;
        const messageValid = document.querySelector(".messageValid");
        if(value_password.match(passwordRegex))
        {   
            messageValid.classList.remove("text-danger");
            messageValid.innerHTML = "the email and password is validate";
            messageValid.classList.add("text-success");
            valid_pass = "valid";
            
        }else
        {
            messageValid.classList.remove("text-success");
            messageValid.classList.add("text-danger");
            messageValid.innerHTML = "the password is not validate";   
            valid_pass = "no valid";
    }
}
if(valid == "valid" && valid_pass == "valid")
{
    document.querySelector(".btn_submit").disabled = false;
    
}
}

// CRUD CATEGORIES 

function add_categorie()
{
  const value_input = document.getElementById("categoryName").value;
  let data = {name:value_input};
  const req = new XMLHttpRequest();
  req.open('POST','add_categorie');
  req.setRequestHeader("Content-type","Application/json");
  req.send(JSON.stringify(data));
  req.onreadystatechange = () =>{
    if(req.status === 200 && req.readyState === 4)
    {
      const res = JSON.parse(req.responseText);
      for(let i = 0 ; i < res.length ; i++)
      {
        document.querySelector(".t_body").insertAdjacentHTML('beforeend',`
        <tr class="categories" data-index="<?= $index++ ?>">
          <th scope="row">${res[i]['id']}</th>
          <td>${res[i]['name']}</td>
          <td>
          <button type="button" data-bs-toggle="modal" data-bs-target="#Modal${res[i]['id']}" class="m-0 btn btn-primary">
          <i class="bi bi-pencil-fill"></i> Edit
        </button>
        <button type="button" class="m-0 btn btn-danger">
            <i class="bi bi-trash-fill"></i> Delete
        </button>

        </td>
      </tr>
      <!-- start modal update -->
      <div class="modal fade" id="Modal${res[i]['id']}" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Nouvelles Catégories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <input type="hedden" value="${res[i]['id']}" class="form-control" id="categoryid" name="categoryName">
          <div class="mb-3">
            <label for="categoryName" class="form-label">Nom de la catégorie</label>
            <input type="text" value="${res[i]['name']}" class="form-control" id="categoryName_up" name="categoryName">
          </div>
          <div class="mb-3 d-flex justify-content-center align-items-center">
          <button type="submit" class="btn btn-primary m-0 mx-4" onclick="update_categorie()" data-bs-dismiss="modal">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        
      </div>
    </div>
  </div>
</div>
        `);
      }
    }
  } 
}