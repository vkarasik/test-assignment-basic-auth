const formBtns = document.querySelectorAll('.btn_form');

formBtns.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    const formElem = e.target.parentElement;

    getData(formElem).then((data) => {
      if (data.status == 'login') {
        // Redirect to main page
        clearErrors();
        document.location = '/';
      } else if (data.status == 'error') {
        // Show validation errors
        const details = data.details;
        for (let prop in details) {
          const msg = formElem.querySelector(`.form__item_${prop} span`);
          msg.innerHTML = details[prop];
        }
      } else if (data.status == 'signup') {
        // Show success message
        clearErrors();
        const successMsg = formElem.querySelector('.form__success');
        successMsg.innerHTML =
          'Congrats! You\'ve signed up!<br> Please go to <a href="signin.php">login</a> page!';
      }
    });
  });
});

async function getData(formElem) {
  const formID = formElem.id;
  let response = await fetch(`../includes/${formID}.php`, {
    headers: {
      credentials: 'same-origin',
      'X-Requested-With': 'XMLHttpRequest'
    },
    body: new FormData(formElem),
    method: 'POST'
  });
  let result = await response.json();
  return result;
}

function clearErrors() {
  const formErrors = document.querySelectorAll('.form__err');
  formErrors.forEach((item) => (item.innerHTML = ''));
}
