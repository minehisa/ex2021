(function () {
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('icon-user');
        if (btn) {
            btn.addEventListener('click', function(){
                this.classList.toggle('is-open');
            });
        }
    });
}());