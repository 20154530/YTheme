var baseurl = "http://" + document.domain + "/zb_users/plugin/yt_console";
if (document.domain == 'localhost')
  baseurl = "http://" + document.domain + ":24680/zb_users/plugin/yt_console";
$(function () {//DOM
  'use strict';
  $('dl dt').remove();
  $('.username').addClass('form_group_label');
  $('.password').addClass('form_group_label');
  $('.bg .checkbox>label').removeAttr('for');

  //add custome checkbox 
  $('.checkbox').append('<div id="rem_Toogle"><label for="chkRemember" id="chkStyle_Track"></label><label for="chkRemember" id="chkStyle_Thumb"></label></div>');
  //add logo
  $('.bg div.logo').prepend('<div id="imginfo"><label></label></div>');
  //add 
  $('.bg .login form').prepend('<dl id="dl_title">Login</dl>');

  //input state
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

  //bg state
}),
  +function (a) {//输入框动画
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
  +function () {//输入框绑定
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
  }(),
  +function () {//状态检查
    'use strict';
    $.ajax({
      url: baseurl + '/query.php',
      dataType: "text",
      type: "GET",
      data: { data: 'loginbg' },
      cache: false,
      async: true,
      success: function (txt) {
        let imginfo = txt.split(',');
        $('.bg').css('background-image', 'url(' + imginfo[0] + ')');
        $('div#imginfo label').html(imginfo[1]);
        $('div#imginfo').click(function () {
          window.open(imginfo[0], '_blank').location;
        });
      }
    });
  }();
