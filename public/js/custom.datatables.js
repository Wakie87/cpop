$.fn.dataTableExt.oApi.fnPagingInfo = function(a) {
    return {
        iStart: a._iDisplayStart,
        iEnd: a.fnDisplayEnd(),
        iLength: a._iDisplayLength,
        iTotal: a.fnRecordsTotal(),
        iFilteredTotal: a.fnRecordsDisplay(),
        iPage: a._iDisplayLength === -1 ? 0 : Math.ceil(a._iDisplayStart / a._iDisplayLength),
        iTotalPages: a._iDisplayLength === -1 ? 0 : Math.ceil(a.fnRecordsDisplay() / a._iDisplayLength)
    }
}
,
$.extend($.fn.dataTableExt.oPagination, {
    bootstrap_full_number: {
        fnInit: function(a, t, e) {
            var n = a.oLanguage.oPaginate
              , i = function(t) {
                t.preventDefault(),
                a.oApi._fnPageChange(a, t.data.action) && e(a)
            };
            $(t).append('<ul class="pagination"><li class="prev disabled"><a href="#" title="' + n.sFirst + '"><i class="fa fa-angle-double-left"></i></a></li><li class="prev disabled"><a href="#" title="' + n.sPrevious + '"><i class="fa fa-angle-left"></i></a></li><li class="next disabled"><a href="#" title="' + n.sNext + '"><i class="fa fa-angle-right"></i></a></li><li class="next disabled"><a href="#" title="' + n.sLast + '"><i class="fa fa-angle-double-right"></i></a></li></ul>');
            var s = $("a", t);
            $(s[0]).bind("click.DT", {
                action: "first"
            }, i),
            $(s[1]).bind("click.DT", {
                action: "previous"
            }, i),
            $(s[2]).bind("click.DT", {
                action: "next"
            }, i),
            $(s[3]).bind("click.DT", {
                action: "last"
            }, i)
        },
        fnUpdate: function(a, t) {
            var e, n, i, s, o, l = 5, r = a.oInstance.fnPagingInfo(), c = a.aanFeatures.p, d = Math.floor(l / 2);
            for (r.iTotalPages < l ? (s = 1,
            o = r.iTotalPages) : r.iPage <= d ? (s = 1,
            o = l) : r.iPage >= r.iTotalPages - d ? (s = r.iTotalPages - l + 1,
            o = r.iTotalPages) : (s = r.iPage - d + 1,
            o = s + l - 1),
            e = 0,
            iLen = c.length; e < iLen; e++) {
                for (r.iTotalPages <= 0 ? $(".pagination", c[e]).css("visibility", "hidden") : $(".pagination", c[e]).css("visibility", "visible"),
                $("li:gt(1)", c[e]).filter(":not(.next)").remove(),
                n = s; n <= o; n++)
                    i = n == r.iPage + 1 ? 'class="active"' : "",
                    $("<li " + i + '><a href="#">' + n + "</a></li>").insertBefore($("li.next:first", c[e])[0]).bind("click", function(e) {
                        e.preventDefault(),
                        a._iDisplayStart = (parseInt($("a", this).text(), 10) - 1) * r.iLength,
                        t(a)
                    });
                0 === r.iPage ? $("li.prev", c[e]).addClass("disabled") : $("li.prev", c[e]).removeClass("disabled"),
                r.iPage === r.iTotalPages - 1 || 0 === r.iTotalPages ? $("li.next", c[e]).addClass("disabled") : $("li.next", c[e]).removeClass("disabled")
            }
        }
    }
}),
$.extend($.fn.dataTableExt.oPagination, {
    bootstrap_extended: {
        fnInit: function(a, t, e) {
            var n = a.oLanguage.oPaginate
              , i = (a.oInstance.fnPagingInfo(),
            function(t) {
                t.preventDefault(),
                a.oApi._fnPageChange(a, t.data.action) && e(a)
            }
            );
            $(t).append('<div class="pagination-panel"> ' + n.page + ' <a href="#" class="btn btn-sm btn-default prev disabled" title="' + n.previous + '"><i class="fa fa-angle-left"></i></a><input type="text" class="pagination-panel-input form-control input-mini inline input-sm" maxlenght="5" style="text-align:center; margin: 0 5px; width: 45px !important;"><a href="#" class="btn btn-sm btn-default next disabled" title="' + n.next + '"><i class="fa fa-angle-right"></i></a> ' + n.pageOf + ' <span class="pagination-panel-total badge bold badge-info"></span></div>');
            var s = $("a", t);
            $(s[0]).bind("click.DT", {
                action: "previous"
            }, i),
            $(s[1]).bind("click.DT", {
                action: "next"
            }, i),
            $(".pagination-panel-input", t).bind("change.DT", function(t) {
                var n = a.oInstance.fnPagingInfo();
                t.preventDefault();
                var i = parseInt($(this).val());
                i > 0 && i <= n.iTotalPages ? a.oApi._fnPageChange(a, i - 1) && e(a) : $(this).val(n.iPage + 1)
            }),
            $(".pagination-panel-input", t).bind("keypress.DT", function(t) {
                var n = a.oInstance.fnPagingInfo();
                if (13 == t.which) {
                    var i = parseInt($(this).val());
                    i > 0 && i <= a.oInstance.fnPagingInfo().iTotalPages ? a.oApi._fnPageChange(a, i - 1) && e(a) : $(this).val(n.iPage + 1),
                    t.preventDefault()
                }
            })
        },
        fnUpdate: function(a, t) {
            var e, n, i, s, o, l = 5, r = a.oInstance.fnPagingInfo(), c = a.aanFeatures.p, d = Math.floor(l / 2);
            for (r.iTotalPages < l ? (s = 1,
            o = r.iTotalPages) : r.iPage <= d ? (s = 1,
            o = l) : r.iPage >= r.iTotalPages - d ? (s = r.iTotalPages - l + 1,
            o = r.iTotalPages) : (s = r.iPage - d + 1,
            o = s + l - 1),
            e = 0,
            iLen = c.length; e < iLen; e++) {
                var p = $(c[e]).parents(".dataTables_wrapper");
                for (r.iTotal <= 0 ? $(".dataTables_paginate, .dataTables_length", p).hide() : $(".dataTables_paginate, .dataTables_length", p).show(),
                r.iTotalPages <= 0 ? $(".dataTables_paginate, .dataTables_length .seperator", p).hide() : $(".dataTables_paginate, .dataTables_length .seperator", p).show(),
                $(".pagination-panel-total", c[e]).html(r.iTotalPages),
                $(".pagination-panel-input", c[e]).val(r.iPage + 1),
                $("li:gt(1)", c[e]).filter(":not(.next)").remove(),
                n = s; n <= o; n++)
                    i = n == r.iPage + 1 ? 'class="active"' : "",
                    $("<li " + i + '><a href="#">' + n + "</a></li>").insertBefore($("li.next:first", c[e])[0]).bind("click", function(e) {
                        e.preventDefault(),
                        a._iDisplayStart = (parseInt($("a", this).text(), 10) - 1) * r.iLength,
                        t(a)
                    });
                0 === r.iPage ? $("a.prev", c[e]).addClass("disabled") : $("a.prev", c[e]).removeClass("disabled"),
                r.iPage === r.iTotalPages - 1 || 0 === r.iTotalPages ? $("a.next", c[e]).addClass("disabled") : $("a.next", c[e]).removeClass("disabled")
            }
        }
    }
}),
function(a, t, e) {
    var n = function(a, e) {
        "use strict";
        a.extend(!0, e.defaults, {
            dom: "<'row'<'col-md-4 col-sm-12'<'pull-left'f>><'col-md-8 col-sm-12'<'table-group-actions pull-right'B>>r><'table-container't><'row'<'col-md-12 col-sm-12'pli>>",
            pagingType: "bootstrap_extended",
            buttons: [],
            renderer: "bootstrap",
            deferRender: !0,
            autoWidth: !1,
            pageLength: 10,
            language: {
                lengthMenu: "<span class='dt-length-style'><i class='fa fa-bars'></i> &nbsp;View &nbsp;&nbsp;_MENU_ &nbsp;records&nbsp;&nbsp; </span>",
                info: "<span class='dt-length-records'><i class='fa fa-globe'></i> &nbsp;Found&nbsp;<span class='badge bold badge-dt'>_TOTAL_</span>&nbsp;total records </span>",
                infoEmpty: "<span class='dt-length-records'>No records found to show</span>",
                emptyTable: "No data available in table",
                infoFiltered: "<span class=' '>(filtered from <span class='badge bold badge-dt'>_MAX_</span> total records)</span>",
                zeroRecords: "No matching records found",
                search: "<i class='fa fa-search'></i>",
                paginate: {
                    previous: "Prev",
                    next: "Next",
                    last: "Last",
                    first: "First",
                    page: "<span class=' '><i class='fa fa-eye'></i> &nbsp;Page&nbsp;&nbsp;</span>",
                    pageOf: "<span class=' '>&nbsp;of&nbsp;</span>"
                },
                sProcessing: "Please wait..."
            }
        }),
        a.extend(e.ext.classes, {
            sWrapper: "dataTables_wrapper dataTables_extended_wrapper form-inline dt-bootstrap ",
            sFilter: "dataTables_filter  form-group form-md-line-input no-margin",
            sInfo: "dataTables_info",
            sLength: "dataTables_length pull-left",
            sPaging: "dataTables_paginate pull-right paging_",
            sProcessing: "dataTables_processing",
            sFilterInput: "form-control input-small input-sm inline",
            sLengthSelect: "form-control input-sm input-xsmall inline"
        }),
        a.extend(!0, e.Buttons.defaults, {
            dom: {
                container: {
                    className: "dt-buttons btn-group uppercase"
                },
                button: {
                    className: "btn btn-default btn-dt-default uppercase"
                },
                collection: {
                    tag: "ul",
                    className: "dt-button-collection dropdown-menu",
                    button: {
                        tag: "li",
                        className: "dt-button uppercase"
                    },
                    buttonLiner: {
                        tag: "a",
                        className: ""
                    }
                }
            }
        }),
        e.ext.buttons.collection.text = function(a) {
            return a.i18n("buttons.collection", 'Collection <span class="caret"/>')
        }
        ,
        e.ext.renderer.pageButton.bootstrap = function(n, i, s, o, l, r) {
            var c, d, p, f = new e.Api(n), u = n.oClasses, g = n.oLanguage.oPaginate, b = 0, h = function(t, e) {
                var i, o, p, m, x = function(t) {
                    t.preventDefault(),
                    a(t.currentTarget).hasClass("disabled") || f.page(t.data.action).draw("page")
                };
                for (i = 0,
                o = e.length; i < o; i++)
                    if (m = e[i],
                    a.isArray(m))
                        h(t, m);
                    else {
                        switch (c = "",
                        d = "",
                        m) {
                        case "ellipsis":
                            c = "&hellip;",
                            d = "disabled";
                            break;
                        case "first":
                            c = g.sFirst,
                            d = m + (l > 0 ? "" : " disabled");
                            break;
                        case "previous":
                            c = g.sPrevious,
                            d = m + (l > 0 ? "" : " disabled");
                            break;
                        case "next":
                            c = g.sNext,
                            d = m + (l < r - 1 ? "" : " disabled");
                            break;
                        case "last":
                            c = g.sLast,
                            d = m + (l < r - 1 ? "" : " disabled");
                            break;
                        default:
                            c = m + 1,
                            d = l === m ? "active" : ""
                        }
                        c && (p = a("<li>", {
                            "class": u.sPageButton + " " + d,
                            id: 0 === s && "string" == typeof m ? n.sTableId + "_" + m : null
                        }).append(a("<a>", {
                            href: "#",
                            "aria-controls": n.sTableId,
                            "data-dt-idx": b,
                            tabindex: n.iTabIndex
                        }).html(c)).appendTo(t),
                        n.oApi._fnBindAction(p, {
                            action: m
                        }, x),
                        b++)
                    }
            };
            try {
                p = a(i).find(t.activeElement).data("dt-idx")
            } catch (m) {}
            h(a(i).empty().html('<ul class="pagination pagination-sm"/>').children("ul"), o),
            p && a(i).find("[data-dt-idx=" + p + "]").focus()
        }
    };
    "function" == typeof define && define.amd ? define(["jquery", "datatables"], n) : "object" == typeof exports ? n(require("jquery"), require("datatables")) : jQuery && n(jQuery, jQuery.fn.dataTable)
}(window, document);