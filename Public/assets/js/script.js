
// VALIDATION DES FORMS
const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('password');

form.addEventListener('submit', e => {
  e.preventDefault();
  validateInputs_login(); 
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = (email) => {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs_login = () => {

    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();


    if(emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.')
    } else {
        setSuccess(password);
    }
    return true ;

};

// CRUD CATEGORIES 

/* =====  Add categorie ===== */
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
        <th scope="row" id="IDCategorie">${res[i]['id_categorie']}</th>
        <td id="nameCategorie">${res[i]['name']}</td>
        <td>
        <button type="button" data-bs-toggle="modal" data-bs-target="#Modal${res[i]['id_categorie']}" class="m-0 btn btn-primary">
        <i class="bi bi-pencil-fill"></i> Edit
        </button>
        <button type="button" onclick="deleteRow(event)" class="m-0 btn btn-danger">
        <i class="bi bi-trash-fill"></i> Delete
        </button>
        
        </td>
        </tr>
        <!-- start modal update -->
        <div class="modal fade" id="Modal${res[i]['id_categorie']}" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Ajouter Nouvelles Catégories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <input type="hedden" value="${res[i]['id_categorie']}" class="form-control" id="categoryid" name="categoryName" disabled>
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

/* =====  Update categorie ===== */

let index_row;
function getIndex(e)
{
  const index = e.currentTarget.closest('tr').dataset.index;
  index_row = index;
}
function update_categorie(e)
{
  const value_id = e.currentTarget.closest('.form_up').querySelector("#categoryid").value;
  const value_name = e.currentTarget.closest('.form_up').querySelector("#categoryName_up").value;
  const data = {
    id : value_id, 
    name : value_name
  };
  const req = new XMLHttpRequest();
  req.open("POST","update_Categorie");
  req.setRequestHeader("Content-type","Application/json");
  req.send(JSON.stringify(data));
  req.onreadystatechange = () => {
    if(req.status == 200 && req.readyState == 4)
    {
      const res = JSON.parse(req.responseText);
      if(res === true)
      {
        // Object.values(document.getElementsByClassName("categories")).filter((item) => item.dataset.index == index_row )[0].querySelector("#nameCategorie").textContent = value_name;
        const trcollection = document.getElementsByClassName("categories");
        const trfound = Object.values(trcollection).filter((item) => item.dataset.index == index_row ); 
        trfound[0].querySelector("#nameCategorie").textContent = value_name;
      }
    }
  }
}

/* =====  Delete categorie ===== */

function deleteRow(e)
{
const TRparent = e.currentTarget.closest("tr");
const idCategorie = TRparent.querySelector("#IDCategorie").textContent;
const req = new XMLHttpRequest();
req.open("POST","delet_categporie");
req.setRequestHeader("Content-type","Application/json");
req.send(JSON.stringify(idCategorie));
req.onreadystatechange = () => {
  if(req.status == 200 && req.readyState == 4)
  {
    const res = JSON.parse(req.responseText);
    if (res == true)
    {
      TRparent.remove();
    }
  }
}
}