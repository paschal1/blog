$('document').ready(function(){
    function fetch_comments(post_id){
        try{
            $.get(
    
                'app.php',
                {
                fetch_comment: true,
                post_id: post_id,
                },
                function(data){
                    $('.single_comment_area').html('');
                    data.comments.forEach(content => {
                        $('.single_comment_area').html(
                            
                            $('.single_comment_area').html() +
    
                            `
                                <div class="comment-content d-flex mb-3">
                                    <div class="comment-author">
                                        <img src="images/head_3.png" alt="author" class='img-fluid img-responsive'>
                                    </div>
                                    <div class="comment-meta mb-3">
                                        <a href="${content.web}" class="post-author"><b>${content.name}</b></a>
                                        <p class="lead">${content.body}</p>
                                    </div>
                                </div>
                            `
                        )
                    });
                    // console.log(data.comments);
                    
                // );
    
            });
        }
        catch(error){
            console.log(error);
        }
    }
    
    fetch_comments(post_id)
    
    
    $('.submit_comment').click(function(){
        
        var req = $('#submit_comment').serializeArray();
    
        try{
            $.ajax({
                type: 'get',
                url: 'app.php',
                data: req,
                success: function(res){
                    console.log(res);
                    fetch_comments(post_id);
                    // $('#submit_comment input, #submit_comment textarea').attr('disabled','disabled');
    
                    function clear_form(){
                        
                        $('#submit_comment input, #submit_comment textarea').val('');
                    }
                    
                    setInterval(() => {
                        clear_form();
                    }, 1000);
                }
            })
        }
        catch(err){
            console.log(err)
        }
    
        return false;
    })
    })