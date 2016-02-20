
<div class="content-container">	
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
		<% if GalleryImages %>
			 <ul id="GalleryContent">
			        <% control GalleryImages %>
				        <li class="GalleryImage">
				            <a rel="shadowbox[$Top.URLSegment]" href="$Filename" title="$Title">$StripThumbnail</a>
				        </li>
		       		<% end_control %>
			</ul>
		<% end_if %>
	</article>
		$Form
		$PageComments
</div>
<% include SideBar %>
