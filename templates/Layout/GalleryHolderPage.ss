<div class="content-container">	
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
	</article>
	
		<% if $Galleries %>
			<ul id="Galleries">
			<% loop $Galleries %>
				<li><h3>$Title</h3></li>
				<div id="GalleryPreview">
					<li id="CoverImage"><a href="$Link">$CoverImage.SetWidth(750)</a></li>
					<li><a href="$Link">View Gallery</a></li>
				</div>
			<% end_loop %>
			</ul>
		<% end_if %>
		
		$Form
		$PageComments
</div>
<% include SideBar %>