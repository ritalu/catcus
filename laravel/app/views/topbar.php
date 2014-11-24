<div class="menu hidden">
    <a href="/pets">pets</a>
    <a href="/store">store</a>
    <script>
        $(function() {
    		var url = "/profile/" + <?php echo json_encode($username)?>;  
    		$(".profileurl").attr("href", url);  
        });

    </script>
    <a class="profileurl" href=>profile</a>
    <a href="/settings">settings</a>
    <a href="javascript:logout()">log out</a>

</div>
<div class='topbar'></div>