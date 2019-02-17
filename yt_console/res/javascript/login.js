$(function () {//DOM
  'use strict';
  $('dl dt').remove();
  $('.username').addClass('form_group_label');
  $('.password').addClass('form_group_label');
  $('.bg .checkbox>label').removeAttr('for');

  //
  var toogle = document.createElement('div');
  toogle.setAttribute("id", "rem_Toogle");
  var checktrack = document.createElement('label');
  checktrack.setAttribute("for", "chkRemember");
  checktrack.setAttribute("id", "chkStyle_Track");
  var checkthumb = document.createElement('label');
  checkthumb.setAttribute("for", "chkRemember");
  checkthumb.setAttribute("id", "chkStyle_Thumb");
  toogle.append(checktrack, checkthumb);
  $('.checkbox').append(toogle);

  $('.bg input#btnPost').mouseenter(function () {
    $(this).addClass("buttonEntered");
  }).mousedown(function () {
    $(this).addClass("buttonPressed");
  }).mouseup(function () {
    $(this).removeClass("buttonPressed");
  }).mouseleave(function () {
    $(this).removeClass("buttonEntered");
    $(this).removeClass("buttonPressed");
  });
}),
  +function (a) {
    'use strict';
    a.fn.floatingLabel = function (b) {
      var c = this.closest('.form_group_label');
      if (c.length) switch (b) {
        case 'focusin':
          c.addClass('control_focus');
          break;
        case 'focusout':
          c.removeClass('control_focus');
          break;
        default:
          this.val() ? c.addClass('control_highlight') :
            this.is('dd') &&
              '' !== $(this).find('input').val().replace(' ', '') ?
              c.addClass('control_highlight') :
              c.removeClass('control_highlight');
      }
      return this
    }
  }(jQuery),
  +function () {
    'use strict';
    $('.form_group_label').each(function () {
      $(this).floatingLabel('change')
    }),
      $(document).on('change', '.form_group_label', function () {
        $(this).floatingLabel('change')
      }),
      $(document).on('focusin', '.form_group_label', function () {
        $(this).floatingLabel('focusin')
      }),
      $(document).on('focusout', '.form_group_label', function () {
        $(this).floatingLabel('focusout')
      })
  }();