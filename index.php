<!DOCTYPE html>
<html>
<head>
	<title>Word Count</title>
</head>
<body>
	<form>
		<input type="file" id="docx-file" name="docx-file" />
		<button type="button" onclick="countWords()">Count Words</button>
	</form>
	<div id="word-count"></div>

	<script>
		function countWords() {
			// Get the uploaded file
			var fileInput = document.getElementById('docx-file');
			var file = fileInput.files[0];
			if (!file) {
				return;
			}

			// Create a FormData object to send the file to the server
			var formData = new FormData();
			formData.append('file', file);

			// Create an XMLHttpRequest object to send the file to the server
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'count_words.php', true);

			// Set the response type to JSON
			xhr.responseType = 'json';

			// Set up the callback function to handle the response
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
					var wordCount = xhr.response.wordCount;
					document.getElementById('word-count').innerHTML = 'Word count: ' + wordCount;
				}
			};

			// Send the form data to the server
			xhr.send(formData);
		}
	</script>
</body>
</html>
