<div class="content-container">
	<article>
		<h1>$Title</h1>

		<div class="content">$Content</div>

		<%-- Images by relation--%>
		<% if $Images %>
			<div class="gallery">
				<% loop $Images %>
					<div class="gallery-image">
						$Fill(630,320)
					</div>
				<% end_loop %>
			</div>
		<% end_if %>

	</article>
	$Form
	$PageComments
</div>
<% include SideBar %>
