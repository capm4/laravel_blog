$(document).ready(function () {

    // Create and destroy form for create comment to comment
    $('*[data-comment-id]').click(function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var commentID = $(event.target).data('comment-id');
        if($('*[data-form_commit_id]').data('form_commit_id') == commentID)
        {
            $("#form_create_commit_id_"+commentID).html('');
        }
        else {
            var url = '/comment/form-create';
            var method = 'POST';
            var data = {'commentId': commentID};
            console.log(data);
            $.ajax({
                url: url,
                type: method,
                data: data,
                success: function (data) {
                    $("#form_create_commit_id_"+commentID).append(data);
                },
                error: function (err) {
                    console.log(err)
                }
            })
        }
    });

    $("#CommitToPost").on('click','*[data-comment-id]',function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var commentID = $(event.target).data('comment-id');
        if($('*[data-form_commit_id]').data('form_commit_id') == commentID)
        {
            $("#form_create_commit_id_"+commentID).html('');
        }
        else {
            var url = '/comment/form-create';
            var method = 'POST';
            var data = {'commentId': commentID};
            console.log(data);
            $.ajax({
                url: url,
                type: method,
                data: data,
                success: function (data) {
                    $("#form_create_commit_id_"+commentID).append(data);
                },
                error: function (err) {
                    console.log(err)
                }
            })
        }

    });


    // Create comment to post
    $("#createCommitToPost").click(function (event) {
        $this = $(this);
        event.preventDefault();
        var url = $this.parent('form').attr('action');
        var method = $this.parent('form').attr('method');
        var data = $this.parent('form').serialize();
        var author = $this.parent('form').find("input[name=user]").val();
        var content = $this.parent('form').find("textarea[name=text]").val();
        $.ajax({
            url:url,
            type:method,
            data:data,
            success: function (data) {
                $('#CommitToPost').append(data);
                $this.parent('form').find("textarea[name=text]").val('');
            },
            error: function (err) {
                console.log(err)
            }
        });
    });


    // Update last user visit
    function func() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            /* the route pointing to the post function */
            url: '/ajax/updateUserLastVisit',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, do: 'updateUserLastVisit'},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) {
                console.log('here - update');
            },
            errors: function (error) {
                console.log(error);
            }
        });
    }
    setInterval(func,100000);
});
