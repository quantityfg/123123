document.addEventListener("DOMContentLoaded", function() {
    const questions = document.querySelectorAll('.question');
    questions.forEach(question => {
    question.addEventListener('click', () => {
        // Find the answers related to this question
        const answers = question.querySelectorAll('.answer');

        answers.forEach(answer => {
            // Toggle the display property
            if (answer.style.display === 'none' || !answer.style.display) {
                answer.style.display = 'list-item';
            } else {
                answer.style.display = 'none';
            }
        });
        // Toggle the active class for the clicked question
        question.classList.toggle('active');
    });
});
});