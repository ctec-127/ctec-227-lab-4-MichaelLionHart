function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var htmlPreview =
                '<img width="200" src="' + e.target.result + '" />' +
                '<p>' + input.files[0].name + '</p>';
            var wrapperZone = $(input).parent();
            var previewZone = $(input).parent().parent().find('.preview-zone');
            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

            $('#alert').remove();

            wrapperZone.removeClass('dragover');
            previewZone.removeClass('hidden');
            boxZone.empty();
            boxZone.append(htmlPreview);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
    $('#alert').remove();
}

$(".dropzone").change(function () {
    readFile(this);
});

$('.dropzone-wrapper').on('dragover', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function () {
    var boxZone = $(this).parents('.preview-zone').find('.box-body');
    var previewZone = $(this).parents('.preview-zone');
    var dropzone = $(this).parents('.form-group').find('.dropzone');
    boxZone.empty();
    previewZone.addClass('hidden');
    reset(dropzone);
});

// script.js

// function to show/hide password
function showPassword() {
    const passwordField = document.querySelector('#password')
    const showPassword = document.querySelector('#showPassword')

    if (showPassword.innerText == 'Show Password') {
        showPassword.innerText = 'Hide Password'
        passwordField.type = 'text'
    } else if (showPassword.innerText === 'Hide Password') {
        passwordField.type = 'password'
        showPassword.innerText = 'Show Password'
    }
}

// is the user logged in or not?
// fetch is a way in js to execute code behind the scenes of the browser
fetch('helper/is_logged_in.php')
    // once you receive a response, convert response to json
    .then(res => res.json())
    // then call anonymous function with that data you received
    .then(function (res) {
        // if value of status property that came back is yes
        if (res.status == 'yes') {
            // hide login button
            const login = document.querySelector('#login')
            login.style.display = 'none'
            // show logout button
            const logout = document.querySelector('#logout')
            logout.style.display = 'inline-block'

            // add event listener to logout button
            logout.addEventListener('click', function (e) {
                // prevent link from going where it normally goes
                e.preventDefault()
                // use fetch again to get info from logout_ajax.php
                fetch('helper/logout_ajax.php')
                    // once you receive a response, convert to json
                    .then(res => res.json())
                    .then(function (res) {
                        // if value of status property in logout_ajax.php is success
                        if (res.status == 'success') {
                            // show login button
                            login.style.display = 'inline-block'
                            // hide logout button
                            logout.style.display = 'none'
                            // add a message to the message div that user has been logged out
                            document.querySelector('#message').innerHTML = '<p>You have been logged out</p>'
                            // add welcome message to h1
                            document.querySelector('h1').innerText = 'Welcome to our Site!'
                        }
                    })
            })
        } else {
            document.querySelector('#login').style.display = 'inline-block';
            document.querySelector('#logout').style.display = 'none';
        }
    })
