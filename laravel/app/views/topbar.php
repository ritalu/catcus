
<?php 
    if ($loggedIn) {
?>
<div class="menu hidden">
    <a href="/pets">pets</a>
    <a href="/store">store</a>
    <a href="/profile">profile</a>
    <a href="/settings">settings</a>
</div>
<div class="topbar">
    <div class="downarrow">
       <div class="line1"></div>
       <div class="line2"></div>
    </div>
    <div class="userinfo">
        <a href="/profile/username">username</a>
        <a href="/store">125 coins</a>
    </div>
    <a href="/profile/username">
        <div class="profile" style="background:url(http://exmoorpet.com/wp-content/uploads/2012/08/cat.png) center center no-repeat white; background-size:cover"></div>
    </a>

    <div class="level">17</div>
    <div class="expbar">
        <div class="fill"></div>
        <div class="text">EXP: 20/120</div>
    </div>
</div>
?>
<?php 
    } else {
        echo "<div class='topbar'></div>";
    }
?>