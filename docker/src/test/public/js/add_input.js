document.addEventListener('DOMContentLoaded', () => {
    const title_focus = document.getElementById('paper_title');
    const l_title_focus = document.getElementById('l_paper_title');
    const author_focus = document.getElementById('author_name');
    const l_author_focus = document.getElementById('l_author_name');
    const journal_focus = document.getElementById('journal_title');
    const l_journal_focus = document.getElementById('l_journal_title');
    const year_focus = document.getElementById('yearofpublic');
    const l_year_focus = document.getElementById('l_yearofpublic');
    const volume_focus = document.getElementById('volume');
    const l_volume_focus = document.getElementById('l_volume');
    const number_focus = document.getElementById('number');
    const l_number_focus = document.getElementById('l_number');
    const pages_focus = document.getElementById('pages');
    const l_pages_focus = document.getElementById('l_pages');
    const publisher_focus = document.getElementById('publisher');
    const l_publisher_focus = document.getElementById('l_publisher');

    focus_text_color = '#009900'
    /*focus_shadow_color = "2px 2px 2px #006400,-2px 2px 2px #006400,2px -2px 2px #006400,-2px -2px 2px #006400"*/
    blur_text_color = '#000000'

    title_focus.addEventListener('focus',() => {
        /*l_title_focus.style.color='red';*/
        l_title_focus.animate({
            color: focus_text_color,
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    title_focus.addEventListener('blur',() => {
        l_title_focus.animate({
            color: blur_text_color,
            textShadow: "none"
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    author_focus.addEventListener('focus',() => {
        l_author_focus.animate({
            color: focus_text_color,
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    author_focus.addEventListener('blur',() => {
        l_author_focus.animate({
            color: blur_text_color,
            textShadow: "none"
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    journal_focus.addEventListener('focus',() => {
        l_journal_focus.animate({
            color: focus_text_color,
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    journal_focus.addEventListener('blur',() => {
        l_journal_focus.animate({
            color: blur_text_color,
            textShadow: "none"
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    year_focus.addEventListener('focus',() => {
        l_year_focus.animate({
            color: focus_text_color,
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    year_focus.addEventListener('blur',() => {
        l_year_focus.animate({
            color: blur_text_color,
            textShadow: "none"
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    volume_focus.addEventListener('focus',() => {
        l_volume_focus.animate({
            color: focus_text_color,
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    volume_focus.addEventListener('blur',() => {
        l_volume_focus.animate({
            color: blur_text_color,
            textShadow: "none"
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    number_focus.addEventListener('focus',() => {
        l_number_focus.animate({
            color: focus_text_color,
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    number_focus.addEventListener('blur',() => {
        l_number_focus.animate({
            color: blur_text_color,
            textShadow: "none"
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    pages_focus.addEventListener('focus',() => {
        l_pages_focus.animate({
            color: focus_text_color,
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    pages_focus.addEventListener('blur',() => {
        l_pages_focus.animate({
            color: blur_text_color,
            textShadow: "none"
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    publisher_focus.addEventListener('focus',() => {
        l_publisher_focus.animate({
            color: focus_text_color,
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
    publisher_focus.addEventListener('blur',() => {
        l_publisher_focus.animate({
            color: blur_text_color,
            textShadow: "none"
        }, {
            duration: 200,
            fill: "forwards"
        });
    });
});