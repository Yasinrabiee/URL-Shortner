$('#clipboard').click(function() {
	let content = $('#customLinkCreated').html();
	navigator.clipboard.writeText(content);
	$('#res').append(`
		<span class="badge bg-light-subtle py-2 border border-light-subtle text-light-emphasis">
			در کلیپ برد ذخیره شد.
		</span><br><br>
	`);
});