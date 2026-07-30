// validation.js

function clearErrors() {

    document.getElementById("nameError").innerHTML = "";
    document.getElementById("ageError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("confirmError").innerHTML = "";
    document.getElementById("genderError").innerHTML = "";
    document.getElementById("departmentError").innerHTML = "";
    document.getElementById("termsError").innerHTML = "";

}

function validateForm() {

    clearErrors();

    let isValid = true;

    // Get Values

    let fullname = document.getElementById("fullname").value.trim();
    let age = document.getElementById("age").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;
    let gender = document.getElementById("gender").value;
    let department = document.getElementById("department").value;
    let terms = document.getElementById("terms").checked;

    // ============================
    // 1. REQUIRED FIELD VALIDATION
    // ============================

    if(fullname === "")
    {
        document.getElementById("nameError").innerHTML =
        "Full Name is required";
        isValid = false;
    }

    if(age === "")
    {
        document.getElementById("ageError").innerHTML =
        "Age is required";
        isValid = false;
    }

    if(email === "")
    {
        document.getElementById("emailError").innerHTML =
        "Email is required";
        isValid = false;
    }

    if(phone === "")
    {
        document.getElementById("phoneError").innerHTML =
        "Phone Number is required";
        isValid = false;
    }

    if(username === "")
    {
        document.getElementById("usernameError").innerHTML =
        "Username is required";
        isValid = false;
    }

    if(password === "")
    {
        document.getElementById("passwordError").innerHTML =
        "Password is required";
        isValid = false;
    }

    if(confirmPassword === "")
    {
        document.getElementById("confirmError").innerHTML =
        "Confirm Password is required";
        isValid = false;
    }

    if(gender === "")
    {
        document.getElementById("genderError").innerHTML =
        "Select Gender";
        isValid = false;
    }

    if(department === "")
    {
        document.getElementById("departmentError").innerHTML =
        "Select Department";
        isValid = false;
    }

    if(!terms)
    {
        document.getElementById("termsError").innerHTML =
        "Accept Terms & Conditions";
        isValid = false;
    }

    // ============================
    // 2. RANGE VALIDATION
    // ============================

    if(age !== "")
    {
        if(age < 18 || age > 30)
        {
            document.getElementById("ageError").innerHTML =
            "Age should be between 18 and 30";
            isValid = false;
        }
    }

    // ============================
    // 3. COMPARE VALIDATION
    // ============================

    if(password !== "" && confirmPassword !== "")
    {
        if(password !== confirmPassword)
        {
            document.getElementById("confirmError").innerHTML =
            "Passwords do not match";
            isValid = false;
        }
    }

    // ============================
    // 4. REGULAR EXPRESSION
    // ============================

    // Email

    let emailPattern =
    /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    if(email !== "")
    {
        if(!emailPattern.test(email))
        {
            document.getElementById("emailError").innerHTML =
            "Enter a valid Email";
            isValid = false;
        }
    }

    // Phone

    let phonePattern =
    /^[0-9]{10}$/;

    if(phone !== "")
    {
        if(!phonePattern.test(phone))
        {
            document.getElementById("phoneError").innerHTML =
            "Phone Number should contain exactly 10 digits";
            isValid = false;
        }
    }

    // Password

    let passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&^#])[A-Za-z\d@$!%*?&^#]{8,}$/;

    if(password !== "")
    {
        if(!passwordPattern.test(password))
        {
            document.getElementById("passwordError").innerHTML =
            "Password must contain minimum 8 characters, uppercase, lowercase, number and special character";
            isValid = false;
        }
    }

    return isValid;

}