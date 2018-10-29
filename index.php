<?php include_once('header.php')?>


<div class="container">
    <div class="postjuttu">
    
    </div>
</div>

<script>
    var start = 0;
    var limit = 6;
    var reachedMax = false;

    $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height())
            getPosts();
    });

    $(document).ready(function () {
        getPosts();
    });

    function getPosts() {
        console.log('asd');
        if (reachedMax)
            return;
            
        
        $.ajax({
            url: 'includes/getPosts.php',
            method: 'POST',
            data: {
                getData: 1,
                start: start,
                limit: limit
            },
            success: function(response) {
                
                if (response == "reachedMax") {
                    reachedMax = true;
                } else {
                    console.log(response);
                
                    start += limit;
                    $(".postjuttu").append(response);
                }
            }
        });
    }
</script>
<?php include_once('footer.php')?>