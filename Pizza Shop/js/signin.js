$(document).ready(function(){
    let loginForm = document.querySelector('.login-form-container');

    $('#close-login-btn').click(function(){
        window.close();
        $('#loginform').find('input').val('');
        $('#registerform').find('input').val('');
        $('.alert').text('Username');
        $('.alertpass').text('Password');
        $('.alertuname').text('Username');
        $('.usename').val('');
    });

    $('#create').click(function() {
        $('#loginform').hide();
        $('#registerform').removeAttr('hidden');
        $('#loginform').find('input').val('');
        $('.alert').text('Username');
        $('.alertpass').text('Password');
        $('.alertuname').text('Username');
        $('.usename').val('');
    });

    $('#forgot').click(function() {
        $('#loginform').hide();
        $('#rememberform').removeAttr('hidden');
    });

    $('#create-back-btn').click(function(){
        $('#registerform').attr('hidden', 'true');
        $('#loginform').show();
        $('#registerform').find('input').val('');
        $('.alert').text('Username');
    });

    $('#remember-back-btn').click(function(){
    $('#rememberform').attr('hidden', 'true');
    $('#loginform').show();
    });


});
