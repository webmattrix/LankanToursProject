document.addEventListener('keydown', function (e) {
    // Check if the pressed key is F12 or Ctrl+Shift+I or Ctrl+Shift+J or Ctrl+Shift+C
    if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J' || e.key === 'C'))) {
        e.preventDefault(); // Prevent the default behavior
    }
});

document.addEventListener('contextmenu', function (event) {
    event.preventDefault(); // Prevent the default right-click context menu
    alert("Right Click - Script File")
});

