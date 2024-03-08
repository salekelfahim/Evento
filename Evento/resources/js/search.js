
document.addEventListener("DOMContentLoaded", function () {
    var searchTitleInput = document.getElementById("search_title");
    var searchResultContainer = document.getElementById("search_result");

    searchTitleInput.addEventListener("keyup", function () {
        var title = searchTitleInput.value;

        $.ajax({
            type: 'GET',
            url: '/search/',
            data: {
                title_s: title
            },
            success: function (data) {
                searchResultContainer.innerHTML = data;
            },
            error: function (error) {
                console.error("Error during search:", error);
            }
        });
    });
});
