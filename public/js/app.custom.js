function pushNotification(a) {
    $.CMS.notifications++,
    swal({
        title: a.title,
        text: a.text,
        type: a.type
    });
    var t = "<li>";
    t += '<a href="#"><i class="fa ' + ("success" === a.type ? "fa-check-circle success" : "fa-close danger") + '"></i>' + a.text + "</a>",
    t += "</li>",
    $(".notifications-menu > ul.dropdown-menu > li.lists ul.menu").prepend(t),
    $(".notifications-menu > ul.dropdown-menu .header").html("You have " + $.CMS.notifications + " flash notifications"),
    $(".notifications-menu .notifications-menu-count").html($.CMS.notifications)
};