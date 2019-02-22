$(function () {//DOM
  'use strict';
  $('dl dt').remove();
  $('.username').addClass('form_group_label');
  $('.password').addClass('form_group_label');
  $('.bg .checkbox>label').removeAttr('for');

  //add custome checkbox 
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

  //add logo
  var loginlogo = document.createElement('dl');
  loginlogo.id = 'loginlogo';
  $('div.login>form').prepend(loginlogo);

  //add right side
  var frameholder = document.createElement('div');
  frameholder.id = 'frameholder';
  $('.bg .logo').prepend(frameholder);

  //按钮动画
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
  $(function () {//开启看板娘
    var baseurl = "http://" + document.domain + "/zb_users/plugin/yt_console";
    $.ajax({ url: baseurl + '/res/templetes/live2d.xml', dataType: "text", type: "GET", cache: true, async: false, success: function (xml) { $('body').prepend($(xml)[0]);} });
    $.ajax({ url: baseurl + '/res/js/live2d/jquery-ui.min.js', dataType: "script", cache: true, async: false });
    $.ajax({ url: baseurl + '/res/js/live2d/waifu-tips-ex.js', dataType: "script", cache: true, async: false });
    $.ajax({ url: baseurl + '/res/js/live2d/live2d.min.js', dataType: "script", cache: true, async: false });

    live2d_settings['hitokotoAPI'] = 'hitokoto.cn';
    live2d_settings['modelId'] = 1;
    live2d_settings['modelTexturesId'] = 84;
    live2d_settings['modelStorage'] = false;
    /* 在 initModel 前添加 */
    initModel(baseurl + '/res/json/waifu-tips.json');
  });
