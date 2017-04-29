/**
 * Created by dramd on 1/13/2017.
 */

$(function () {
    $('#jstree').jstree({
        "core" : {
            "animation" : 1,
            "check_callback" : true,
            "themes" : { "stripes" : true },

        },
        "types" : {
            "#" : {
                "max_children" : 1,
                "max_depth" : 3,
                "valid_children" : ["root"]
            },
            "root" : {
                "icon" : "/static/3.3.3/assets/images/tree_icon.png",
                "valid_children" : ["default"]
            },
            "default" : {
                "valid_children" : ["default","file"]
            },
            "file" : {
                "icon" : "glyphicon glyphicon-file",
                "valid_children" : []
            }
        },
        "plugins" : [
            "contextmenu",  "search",
            "state", "types", "wholerow","massload"
        ]
    });
    var to = false;
    $('#search_tree').keyup(function () {
        if(to) { clearTimeout(to); }
        to = setTimeout(function () {
            var v = $('#search_tree').val();
            $('#jstree').jstree(true).search(v);
        }, 250);
    });
});