<style>
.content {
    max-width: 500px;
    margin: auto;
}
IMG.displayed {
    display: block;
    margin-left: auto;
    margin-right: auto }

P { text-align: center }

P.blocktext {
    margin-left: auto;
    margin-right: auto;
    width: 8em
</style>

<html>
<body style="background-color:black">
	<div class="content">
		<div style="font-family:Calibri; font-size:30; color:white;">
			<IMG class="displayed" src="images\refresh 2.gif" alt="">
			<P class="blocktext">Please Wait...</P>
		</div>
	<?php
	header( "refresh:3;url=index.html" );
	?>
	
	</div>

</body>

</html>