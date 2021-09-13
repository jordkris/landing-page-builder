let passwordIds = ['#password1', '#password2', '#password3'];
passwordIds.forEach((passwordId) => {
    $(passwordId + '-eye').click(() => {
        let icon = passwordId + '-eye > span > i';
        if ($(icon).hasClass('mdi-eye')) {
            $(icon).removeClass('mdi-eye').addClass('mdi-eye-off');
            $(passwordId).attr('type', 'password');
        } else if ($(icon).hasClass('mdi-eye-off')) {
            $(icon).removeClass('mdi-eye-off').addClass('mdi-eye');
            $(passwordId).attr('type', 'text');
        }
    });
});