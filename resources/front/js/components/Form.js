import "../../scss/main.scss";
import UIkit from 'uikit';
import SlimSelect from 'slim-select'
import 'cropperjs/dist/cropper.css';
import Croppie from 'croppie';
import axios from 'axios';
import {
    dataURLToBlob
} from 'blob-util'


var basic = '';
$('.close_crop_modal').click(function () {
    $('.modal_crop_image').fadeOut(100, function () {
        $('.overlay_crop').fadeOut(100);
        basic.croppie('destroy');
    })
})

let files = null;
$('.custom__select[name="car"]').change(function (e) {
    if ($(this).val() != 2) {
        $('.show_selects').slideUp(100);
        return
    }
    $('.show_selects').slideDown(100);
})
$('.upload__image input').change(function (evt) {
    let file = evt.target.files;
    let f = file[0];
    if (!f.type.match('image.*')) {
        alert("Image only please....");
    }
    let reader = new FileReader();
    reader.onload = (function (theFile) {
        return function (e) {
            $('.modal_crop_image, .overlay_crop').fadeIn(100);
            basic = $('.append_crop_imgs').croppie({
                viewport: {
                    width: 300,
                    height: 400
                },
                showZoomer: false,
                enableResize: false,
            });
            basic.croppie('bind', {
                url: e.target.result,
            });
            $('.button_ok_cropie').on('click', function () {

                basic.croppie('result', {}).then(function (resp) {
                    $('.modal_crop_image, .overlay_crop').fadeOut(100);
                    $('.append_error_field_file').html('');
                    $('.append_image_loadeds').html('<img class="thumb" title="' + theFile.name + '" src="' + resp + '"  alt=""/>')

                    files = dataURLToBlob(resp);

                    basic.croppie('destroy');

                });
            });
        };
    })(f);
    reader.readAsDataURL(f);
});

$('.close_message_success').click(function () {
    $('.success_modal_send_form').fadeOut(100);
})

$('#user_form').submit(function (e) {
    e.preventDefault();

    $('label').removeClass('error');

    let btn = $(this).find('input[type="submit"]');
    btn.prop('disabled', true);


    let formData = new FormData(e.target);
    formData.set('photo', files);

    axios.post(this.getAttribute('action'), formData).then(r => {
        if (r.data.status == 1) {
            $('.uk-modal-close-outside').click();
            $('.success_modal_send_form').fadeIn(100);
            setTimeout(function () {
                $('.success_modal_send_form').fadeOut(100);
            }, 3000)
        }
    }).catch(error => {
        console.log(error);
    });

});



$('input[type="tel"]').mask("+38 999 999 99 99");
$('#formContact').submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: this.getAttribute('action'),
        data: $(this).serializeArray(),
        success: function (data) {
            $('#formContact')[0].reset();
            $('.success_modal_send_form').fadeIn(100);
            setTimeout(function () {
                $('.success_modal_send_form').fadeOut(100);
            }, 3000)
        },
        error: function (data) {
            console.log(data);
        }
    });
})

document.querySelectorAll(".custom__select").forEach(el => {
    new SlimSelect({
        select: el,
        settings: {
            showSearch: false,
        }
    })
});
