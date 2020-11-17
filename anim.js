

function active_carte($nom) {
    var $idStr = $nom.id;
    $('#pergola').removeClass('active');
    $('#extension').removeClass('active');
    $('#cabane').removeClass('active');
    $('#mezzanine').removeClass('active');
    $('#plus').removeClass('active');
    $('#charpente').removeClass('active');
    $('#sauna').removeClass('active');
    $('#abris').removeClass('active');
    $('#terrasse').removeClass('active');
    $('.carousel_terrasse').css('display', 'none');
    $('.carousel_terrasse').slick('slickPause');
		$('.carousel_pergola').css('display', 'none');
    $('.carousel_pergola').slick('slickPause');
		$('.carousel_extension').css('display', 'none');
    $('.carousel_extension').slick('slickPause');
    $('.carousel_cabane').css('display', 'none');
    $('.carousel_cabane').slick('slickPause');
		$('.carousel_mezzanine').css('display', 'none');
    $('.carousel_mezzanine').slick('slickPause');
		$('.carousel_plus').css('display', 'none');
    $('.carousel_plus').slick('slickPause');
    $('.carousel_charpente').css('display', 'none');
    $('.carousel_charpente').slick('slickPause');
		$('.carousel_sauna').css('display', 'none');
    $('.carousel_sauna').slick('slickPause');
		$('.carousel_abris').css('display', 'none');
    $('.carousel_abris').slick('slickPause');
    $($nom).addClass('active');
    console.log($idStr);
    $(".carousel_"+$idStr).css('display', 'block');
    $(".carousel_"+$idStr).slick('refresh');
};
