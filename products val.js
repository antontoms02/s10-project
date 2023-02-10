const titleEl = document.querySelector('#product_title');
const desE = document.querySelector('#description');
const year = document.querySelector('#purchased_year');
const price = document.querySelector('#product_price');

const form = document.querySelector('#signup');


const checktitle = () => {

    let valid = false;

    const min = 3,
        max = 20;

    const product_title = titleEl.value.trim();

    if (!isRequired(product_title)) {
        showError(titleEl, 'Product name cannot be blank.');
    } else if (!isBetween(product_title.length, min, max)) {
        showError(titleEl, 'Name must be between 3 and 10 characters.')
    }else if (!isNaN(product_title)) {
        showError(titleEl, 'Enter Charecter only')
    }else {
        showSuccess(titleEl);
        valid = true;
    }
    return valid;
};

const checkdes = () => {

    let valid = false;

    const min = 3,
        max = 20;

    const description = desE.value.trim();

    if (!isRequired(description)) {
        showError(desE, 'description cannot be blank.');
    } else if (!isBetween(description.length, min, max)) {
        showError(desE, 'description must be between 3 and 20 characters.')
    }else if (!isNaN(description)) {
        showError(desE, 'Enter Charecter only')
    }else {
        showSuccess(desE);
        valid = true;
    }
    return valid;
};



const checkSal= () => {
    let valid = false;
    const product_price = price.value.trim();
    if (!isRequired(product_price)) {
        showError(price, 'price cannot be blank.');
    } else if (isNaN(product_price)) {
        showError(price, 'price is not valid.')
    } else {
        showSuccess(price);
        valid = true;
    }
    return valid;
};

const checkqty= () => {
    let valid = false;
    const product_qty = qty.value.trim();
    if (!isRequired(product_qty)) {
        showError(qty, 'Qty cannot be blank.');
    } else if (isNaN(product_qty)) {
        showError(qty, 'Qty is not valid.')
    } else {
        showSuccess(qty);
        valid = true;
    }
    return valid;
};

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;


const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}


form.addEventListener("submit", function (e) {
    // prevent the form from submitting
  
   // validate fields
    let istitleValid = checktitle(),
        isdesValid = checkdes(),
        isqtyValid = checkqty(),
        isSalValid = checkSal();
    let isFormValid = istitleValid &&
    isdesValid &&
    isqtyValid &&
    isSalValid;

    // submit to the server if the form is valid
    if (isFormValid) 
    {
        form.submit();
        return true;
    }
    else
    {
        e.preventDefault();
        alert("please Enter Valid inputs")
        return false;
       
        
    }
});


const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'product_title':
            checktitle();
            break;
        case 'description':
            checkdes();
            break;
        case 'product_qty':
            checkqty();
            break; 
        case 'product_price':
            checkSal();
            break;   
    }
}));
