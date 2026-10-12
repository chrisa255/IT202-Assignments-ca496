const rep = [
    { firstName: "Dave", lastName: "Murray", password: "#Bjas3", repID: "5001", phone: "201-111-0001 ext 1", email: "dave@airmail.com" },

    { firstName: "Adrian", lastName: "Smith", password: "#Cjfd9", repID: "5002", phone: "201-222-0002 ext 2", email: "adrian@airmail.com" },

    { firstName: "Clive", lastName: "Burr", password: "$J09ds", repID: "5003", phone: "201-333-0003 ext 3", email: "clive@airmail.com" },

    { firstName: "Steve", lastName: "Harris", password: "$L34f0", repID: "5004", phone: "201-444-0004 ext 4", email: "steve@airmail.com" },

    { firstName: "Glenn", lastName: "Tipton", password: "@Nj023", repID: "5005", phone: "201-555-0005 ext 5", email: "glenn@airmail.com" },

    { firstName: "Rob", lastName: "Halford", password: "@4F923", repID: "5006", phone: "201-667-0006 ext 6", email: "rob@airmail.com" },

    { firstName: "Ian", lastName: "Hill", password: "@Dn39d", repID: "5007", phone: "201-777-0007 ext 7", email: "ian@airmail.com" },

    { firstName: "Paul", lastName: "Rodgers", password: "#Mdsj3", repID: "5008", phone: "201-888-0008 ext 8", email: "paul@airmail.com" },

    { firstName: "Bill", lastName: "Bruford", password: "#H9nd9", repID: "5009", phone: "201-999-0009 ext 9", email: "bill@airmail.com" },

    { firstName: "Neil", lastName: "Peart", password: "#W03md", repID: "5010", phone: "201-919-0010 ext 10", email: "neil@airmail.com" }
];

function validate() 
{
    let first = document.getElementById("first");

    let last = document.getElementById("last");

    let phone = document.getElementById("phone");

    let id = document.getElementById("repID");

    let email = document.getElementById("email");

    let password = document.getElementById("password");

    let confirm = document.getElementById("confirm");

    let transaction = document.getElementById("transaction");

    document.querySelectorAll(".Invalid").forEach(function(field) 

    {

        field.classList.remove("Invalid");

    });

    if (!/^[A-Za-z]+([ '-][A-Za-z]+)*$/.test(first.value.trim())) 
        {
        alert("Enter a valid first name");

        first.classList.add("Invalid");

        first.focus();

        return;
    }

    if (!/^[A-Za-z]+([ '-][A-Za-z]+)*$/.test(last.value.trim())) 
        {
        alert("Enter a valid last name");

        last.classList.add("Invalid");

        last.focus();

        return;
    }

    if (password.value.length > 7 ||

        !/^[^A-Za-z0-9]/.test(password.value) ||

        !/[A-Z]/.test(password.value) ||

        !/[0-9]/.test(password.value)) 

        {
        alert("Check for password requirements");

        password.classList.add("Invalid");

        password.focus();

        return;
        }

    if (!/^[0-9]{4}$/.test(id.value)) 
        {
        alert("The ID must contain 4 digits");

        id.classList.add("Invalid");

        id.focus();

        return;
        }

    let phones = /^[0-9]{3}-[0-9]{3}-[0-9]{4}\s*ext\s*[0-9]+$/i;

    if (!phones.test(phone.value.trim())) 
    {
        alert("Enter phone number and extension using ext (#)");

        phone.classList.add("Invalid");

        phone.focus();

        return;
    }

    let emails = /^[^\s@]+@[^\s@]+\.[A-Za-z]{2,5}$/;

    if (confirm.checked && !emails.test(email.value.trim())) 
        {
        alert("Enter a valid email address");

        email.classList.add("Invalid");

        email.focus();

        return;
    }

    if (transaction.value === "") 
        {
        alert("Choose a transaction");

        transaction.focus();

        return;
    }

    verify();
}

function verify() 
{
    let first = document.getElementById("first").value.trim();

    let last = document.getElementById("last").value.trim();

    let password = document.getElementById("password").value;

    let id = document.getElementById("repID").value;

    let transaction = document.getElementById("transaction").value;

    for (let i = 0; i < rep.length; i++) 
        {

        if (rep[i].firstName == first)
            {

            if (rep[i].lastName == last) 
                {

                if (rep[i].password == password) 
                    {

                    if (rep[i].repID == id) 
                    {

                        alert("Welcome, " + first + " " + last + "! Transaction: " + transaction);
                        
                        return true;
                    }
                }
            }
        }
    }

    alert("Account can not be found for " + first + " " + last);

    return false;
}


document.getElementById("loginForm").addEventListener("submit", function(event)

{
    event.preventDefault();

    validate();

});

document.getElementById("pw").addEventListener("click", function()

{
    let password = document.getElementById("password");

    if (password.type === "password") 
        {
        password.type = "text";
        
        this.textContent = "🔒";
        } 

    else 
        {
        password.type = "password";

        this.textContent = "👁";
        }

});

document.getElementById("loginForm").addEventListener("reset", function()

{
    document.querySelectorAll(".invalid").forEach(function(field) 

    {

        field.classList.remove("Invalid");

    });

    document.getElementById("pw").textContent = "👁";

});








