$(function () {//开启看板娘
  'use strict';
  var baseurl = "http://" + document.domain + "/zb_users/plugin/yt_live2d";
  if(document.domain == 'localhost')//本地非80端口
    baseurl = "http://" + document.domain + ":24680/zb_users/plugin/yt_live2d";
  $.ajax({ url: baseurl + '/res/templetes/live2d.xml?v=1.0', dataType: "text", type: "GET", cache: true, async: false, success: function (xml) { $('body').prepend($(xml)[0]); } });
  $.ajax({ url: baseurl + '/res/js/live2d/jquery-ui.min.js', dataType: "script", cache: true, async: false });
  $.ajax({ url: baseurl + '/res/js/live2d/waifu-tips-ex.js?v=1.0', dataType: "script", cache: true, async: false });
  $.ajax({ url: baseurl + '/res/js/live2d/live2d.min.js', dataType: "script", cache: true, async: false });

  live2d_settings['hitokotoAPI'] = 'hitokoto.cn';
  live2d_settings['modelId'] = 1;
  live2d_settings['modelTexturesId'] = 51;
  live2d_settings['waifuEdgeSide'] = "right:80";
  live2d_settings['waifuSize'] = "320x304";
  live2d_settings['waifuTipsSize'] = "240x80";
  live2d_settings['modelStorage'] = false;
  /* 在 initModel 前添加 */
  initModel(baseurl + '/res/json/waifu-tips.json');
});