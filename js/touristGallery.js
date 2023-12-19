document.getElementById('yearFilter').addEventListener('change', function() {
    var selectedYear = this.value;
    var yearContainers = document.querySelectorAll('.gallery_container .year_container');

    for (var i = 0; i < yearContainers.length; i++) {
        var yearContainer = yearContainers[i];
        var year = yearContainer.getAttribute('data-year');

        if (selectedYear === 'all' || year === selectedYear) {
            yearContainer.style.display = 'block';
        } else {
            yearContainer.style.display = 'none';
        }
    }
});