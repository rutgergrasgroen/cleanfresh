/*
Exemples : 
<a href="posts/2" data-method="delete" data-token="{{csrf_token()}}"> 
- Or, request confirmation in the process -
<a href="posts/2" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
*/


$(document).ready(function(){

    var siteurl = $('meta[name="_siteurl"]').attr('content');
    var token = $('meta[name="_token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    $('ol.sortable').nestedSortable({
        forcePlaceholderSize: true,
        handle: '.handle',
        helper: 'clone',
        items: 'li',
        opacity: .6,
        placeholder: 'placeholder',
        revert: 250,
        tabSize: 35,
        tolerance: 'pointer',
        toleranceElement: '> div',
        maxLevels: 6,
        isTree: true,
        expandOnHover: 700,
        startCollapsed: true,
        update: function () {
            order = $(this).nestedSortable('toArray', {startDepthCount: 0});

            $.ajax({

                type: 'POST',
                url: siteurl +'/admin/Pages/SaveOrder',
                data: {
                    'order': order
                },
                dataType: 'json',
                success: fixFolderIcons()

            });
        }

    }).disableSelection(); 

    $('.disclose').on('click', function() {
        $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
        $(this).children().toggleClass('fa-folder-open').toggleClass('fa-folder');
    });

    $('.status').on('click', function() {

        var id = $(this).closest('li').attr("data-id");
        var item = $(this);

        $.ajax({

            type: 'POST',
            url: siteurl +'/admin/Pages/SaveStatus',
            data: {
                'id': id
            },
            dataType: 'json',
            success: function(data) {

                if(data == 1) {
                    item.removeClass('btn-default').addClass('btn-info');
                } else {
                    item.removeClass('btn-info').addClass('btn-default');
                }
                
            }

        });

    });
 
});

function fixFolderIcons(){

    setTimeout(function(){

        $("ol.sortable .mjs-nestedSortable-leaf").children('div').children('.icon').removeClass('disclose').attr("disabled", true).children().removeClass('fa-folder-open').removeClass('fa-folder').addClass('fa-file-text-o');
        $("ol.sortable .mjs-nestedSortable-branch").children('div').children('.icon').addClass('disclose').removeAttr('disabled').children().removeClass('fa-file-text-o').not('.fa-folder').addClass('fa-folder-open');

    }, 500);

}
