
function login() {
    alert('login working');
}

function test() {
    alert('Document ready');
}

function loginValidator() {

    var x = $("#email_u").val();
    var pass = $("#password_u").val();

    if (x === '' && pass === '') {
        alert("Both username and password must be filled out");
        return false;
    }
    else if (pass === '' && x !== '') {
        alert("Password must be filled out");
        return false;
    }
    else if (pass !== '' && x === '') {
        alert("Email must be filled out");
        return false;
    }

    return true;

}

function registerValidator() {

    var x = $("#email").val();
    var pass = $("#password").val();
    var fn = $("#firstname").val();

    if (x === '' && pass === '' && fn === '') {
        alert("Both username, password and first name must be filled out");
        return false;
    }
    else if (pass === '' && x !== '' && fn !== '') {
        alert("Password must be filled out");
        return false;
    }
    else if (pass !== '' && x === '' && fn !== '') {
        alert("Email must be filled out");
        return false;
    }

    else if (pass !== '' && x !== '' && fn === '') {
        alert("First name must be filled out");
        return false;
    }

    return true;

}


function signIn() {

    var validate = loginValidator();

    if(validate){
        var btn = $('#login_btn');
        btn.html("<img style='height: 30px;' src='images/loader.svg' alt='Loading...!' />");

        $.ajax({
            url : './process.php',
            method : 'POST',
            data : $("#login_form").serialize(),
            success : function(response){

                console.log(response);
                if(response === 'true'){
                    window.location.href = "dashboard.php";
                }
                else {
                    btn.html("LOGIN");
                    alert('Wrong email or password');
                }

            },
            error : function(er){
                console.log(er);
            }

        });

    }


}

function register() {

    if(registerValidator()){

        var btn = $('#register_btn');
        btn.html("<img style='height: 30px;' src='images/loader.svg' alt='Loading...!' />");


        $.ajax({
            url : './process.php',
            method : 'POST',
            data : $("#registration_form").serialize(),
            success : function(response){

                var res = JSON.parse(response);
                console.log(res);

                if(res['isFound'] === 'true'){
                    btn.html("REGISTER");
                    alert('User already register with this email, please use a different email and try registering again');
                }else if(res['isFound'] = 'false') {

                    alert(res['msg']);

                    var data = {email : res['email'], password : res['password'], login_user : 1};
                    my_login(data);

                }

            },
            error : function(er){
                btn.html("REGISTER");
            }

        });

    }


}

function my_login(data) {

    $.ajax({
        url : './process.php',
        method : 'POST',
        data : data,
        success : function(response){

            var res = JSON.parse(response);

            if(response === 'true'){
                window.location.href = "dashboard.php";
            }
            else {
                btn.html("LOGIN");
                alert(res['msg']);
            }

        },
        error : function(er){
            console.log(er);
        }
    });
}

function logout(){

    $.ajax({
        url : './process.php',
        method : 'POST',
        data : {logoutUser:1},
        success : function(response){
            console.log(response);
            window.location.href = "index.php";
            alert(JSON.parse(response['message']));
        }
    });


}