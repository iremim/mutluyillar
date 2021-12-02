<?php
echo " 
<style>
footer {
	display: flex;
	justify-content: space-between;
	align-items: center;
	width: 100%;
	position: absolute;
	bottom: 0;
	flex-direction: row;
}
footer>a{
	text-decoration: none;
	padding: 15px;
	display: flex;
	justify-content: center;
	align-items: center;
	color: white;
}
</style>
<footer> 
    <a href='profil.php?id=$inLoggedUserID'><span class='material-icons'>account_circle</span></a>
    <a href='members.php'><span class='material-icons'>people</span></a>
    <a href='settings.php?id=$inLoggedUserID'><span class='material-icons'>settings</span></a>
</footer>";
?>

