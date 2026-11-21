



document.getElementById("loginForm").onsubmit = function()

{

    var first = document.getElementById("first");

    var last = document.getElementById("last");

    var phone = document.getElementById("phone");

    var repID = document.getElementById("repID");

    var email = document.getElementById("email");

    var password = document.getElementById("password");

    var confirm = document.getElementById("confirm");

    var transaction = document.getElementById("transaction");

    if (!/^[A-Za-z]+([ '-][A-Za-z]+)*$/.test(first.value.trim()))

    {

        alert("Enter a valid first name");

        first.classList.add("Invalid");

        first.focus();

        return false;

    }

    if (!/^[A-Za-z]+([ '-][A-Za-z]+)*$/.test(last.value.trim()))

    {

        alert("Enter a valid last name");

        last.classList.add("Invalid");

        last.focus();

        return false;

    }

    if (password.value.length > 7 ||
        
        !/^[^A-Za-z0-9]/.test(password.value) ||

        !/[A-Z]/.test(password.value) ||

        !/[0-9]/.test(password.value))


    {

        alert("Enter valid password");

        password.classList.add("Invalid");

        password.focus();

        return false;

    }

    if (!/^[0-9]{4}$/.test(repID.value))

    {

        alert("The ID must contain 4 digits");

        repID.classList.add("Invalid");

        repID.focus();

        return false;

    }

    let phones = /^[0-9]{3}-[0-9]{3}-[0-9]{4}\s*ext\s*[0-9]+$/i;

    if (!phones.test(phone.value.trim()))

    {

        alert("Enter phone number and extension");

        phone.classList.add("Invalid");

        phone.focus();

        return false;

    }

    let emails = /^[^\s@]+@[^\s@]+\.[A-Za-z]{2,5}$/;

    if (confirm.checked && !emails.test(email.value.trim()))

    {

        alert("Enter a valid email address");

        email.classList.add("Invalid");

        email.focus();

        return false;

    }

    if (transaction.value == "")

    {

        alert("Choose a transaction");

        transaction.focus();

        return false;

    }

    return true;

    
};








