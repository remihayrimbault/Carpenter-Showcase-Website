

function active_carte($nom) {
    $('#pergola').removeClass('active');
    $('#extension').removeClass('active');
    $('#cabane').removeClass('active');
    $('#mezzanine').removeClass('active');
    $('#plus').removeClass('active');
    $('#charpente').removeClass('active');
    $($nom).addClass('active');
};
