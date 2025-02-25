document.addEventListener("DOMContentLoaded", function () {
    let voteForm = document.querySelector("form");

    if (voteForm) {
        voteForm.addEventListener("submit", function (event) {
            let confirmed = confirm("Are you sure you want to submit your vote?");
            if (!confirmed) {
                event.preventDefault();
            }
        });
    }
});
