/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );

	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
} )();


/* 评论框相关 */
zbp.plugin.unbind("comment.reply", "system");
zbp.plugin.on("comment.reply", "rokoPhotoLite",function(i) {
	$("#inpRevID").val(i);
	var p = $('#comment-'+i);
	var o = p.find(".comment-author .url").html();
	$("#reply-name").html(o);
    cancel = $("#cancel-comment-reply-link"),
    cancel.show();
	$("#reply-title").show();
    cancel.click(function() {
		$("#inpRevID").val(0);
		$("#reply-name").html("");
		$("#reply-title").hide();
        $(this).hide();
		window.location.hash = '#comment-'+i;
        return false;
    });
    try {
        $('#txaArticle').focus()
    } catch(e) {}
    return false
});
zbp.plugin.on("comment.postsuccess", "system",
function(formData, retString, textStatus, jqXhr) {
	var objSubmit = $("#inpId").parent("form").find(":submit");
	objSubmit.removeClass("loading").removeAttr("disabled").val(objSubmit.data("orig"));
	var data = $.parseJSON(retString);
	if (data.err.code !== 0) {
		alert(data.err.msg);
		throw "ERROR - " + data.err.msg
	}
	if (formData.replyid == "0") {
		$("#comment_list .commentlist").prepend(data.data.html);
	} else {
		$("#comment-"+formData.replyid+" .children").append(data.data.html);
	}
	location.hash = "#comment-" + data.data.ID;
	zbp.$("#txaArticle").val("");
	zbp.userinfo.saveFromHtml()
});
zbp.plugin.on("comment.postsuccess", "rokoPhotoLite",
function() {
    $("#cancel-comment-reply-link").click();
});
function c(p, o) {
    p = isNaN(p) ? $("#" + p).offset().top: p;
    $("body,html").animate({
        scrollTop: p
    },
    o ? 0 : 233);
    return false
}
zbp.plugin.on("comment.get", "system", function(postid, page) {
    $("#cancel-comment-reply-link").trigger("click");
    $.get(bloghost + "zb_system/cmd.php?act=getcmt&postid=" + postid + "&page=" + page,
    function(data) {
        $('#AjaxCommentBegin').nextUntil('#AjaxCommentEnd').remove();
        $("#comments_paginate, #comment_list").fadeOut("slow");
        var q = $("#comment_list").html();
        var p = $("#comments_paginate").html();
        $("#comment_list").html(q);
        $("#comments_paginate").html(p);
        c("comments");
        $("#comments_paginate, #comment_list").fadeIn("slow");
        $('#AjaxCommentBegin').after(data)
    })
});