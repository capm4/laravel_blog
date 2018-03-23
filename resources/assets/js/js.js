$(document).ready(function () {
    $("#createCommitToCommit").click(function (event) {
        $this = $(this);
        event.preventDefault();
        var url = $this.parent('form').attr('action');
        var method = $this.parent('form').attr('method');
        var data = $this.parent('form').serialize();
        var commitId = $this.parent('form').find("input[name=commentId]").val();
        console.log('here');
        $.ajax({
            url:url,
            type:method,
            data:data,
            success: function (data) {
                $('#CommitToCommit-'+commitId).append(data);
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

});