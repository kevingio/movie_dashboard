$(document).ready(function () {
    $("#yt-search").on("submit", function (e) {
        e.preventDefault();
        $("#yt-search-results").html("");
        
        let apiKey = "AIzaSyBaNdfu7retuO3ALr-zshsCYTnyQ6mhKqw"
        let query = encodeURIComponent($("#query").val()).replace(/%20/g, "+");
        
        axios.get("https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=10&order=viewCount&q="+ query +"&key="+ apiKey).
        then((response) => {
            let results = response.data;
            $.each(results.items, function (index, item) {  
                let content = 
                '<div class="col-md-6">'
                    +'<iframe src="//www.youtube.com/embed/'+item.id.videoId+'" width="100%" height="400px" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>'
                    +'<p><strong>'+item.snippet.title+'</strong></p>'
                +'</div>'
                
                console.log(content);
                $("#yt-search-results").append(content);
            })
        })
    });    
});
