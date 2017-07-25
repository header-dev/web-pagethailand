$(function() {
    $('img').hide();
    $('img').each(function(i) {
        if (this.complete) {
            $(this).fadeIn();
        } else {
            $(this).load(function() {
                $(this).fadeIn(2000);
            });
        }
    });
    $('.img-clouddrive').on('input', function(e) {
        var str = $(this).val();
        if (str.length > 0) {
            // var n = str.search("d/");
            // var e = str.search("/view");
            // var res = str.slice(n, e);
            // var linkimg = "https://drive.google.com/uc?export=download&id=" + res.slice(2);
            var startId = str.search("id=");
            var imgid = str.slice(startId);
            var linkimg = "https://drive.google.com/uc?export=download&id=" + imgid.slice(3);
            $(this).val(linkimg);
            $(".img-clouddrive-view").html('<img src="' + linkimg + '" width = "500" height="450" class="img-responsive" alt="Responsive image">');
        }
    });
});