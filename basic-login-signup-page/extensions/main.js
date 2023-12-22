document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });
    // //check if password and confirm password are the same
    // document.querySelector("#createAccount-submit").addEventListener('click', e => {
    //     //e.preventDefault();
    //     var passwd = document.querySelector("#createAccount #password").val();
    //     var coPasswd = document.querySelector("#createAccount #confirm-password").val();
    //     if (passwd == coPasswd) {
    //         return true;
    //     } else {
    //         alert("Password and Confirm Password must be the same");
    //         return false;
    //     }
    // });


    
});