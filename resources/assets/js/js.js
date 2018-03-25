$(document).ready(function () {
    $(".createCommitToCommit").click(function (event) {
        $this = $(this);
        event.preventDefault();
        var url = $this.parent('form').attr('action');
        var method = $this.parent('form').attr('method');
        var data = $this.parent('form').serialize();
        var commitId = $this.parent('form').find("input[name=commentId]").val();
        console.log('commitId')
        console.log('here');
        $.ajax({
            url:url,
            type:method,
            data:data,
            success: function (data) {
                $('#CommitToCommit-'+commitId).append(data);
                console.log('commitId')
                $this.parent('form').find("textarea[name=text]").val('');
            },
            error: function (err) {
                console.log(err)
            }
        });
    });

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
