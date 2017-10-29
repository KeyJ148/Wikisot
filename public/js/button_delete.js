window.onload = function () {
    var button_delete = document.getElementById("delete-button");
    var answer = document.getElementById("delete-answer");
    var answer_no = document.getElementById("delete-answer-no");

    button_delete.addEventListener("click", function() {
        answer.removeAttribute("hidden");
    });

    answer_no.addEventListener("click", function() {
        answer.setAttribute("hidden", "");
    });
}




