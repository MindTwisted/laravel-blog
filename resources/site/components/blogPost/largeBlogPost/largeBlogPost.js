import marked from 'marked';

function initMarkdownAreaViewer() {
    let rawMarkdown = document.querySelector('.largeBlogPost__mdRaw');
    let viewArea = document.querySelector('.largeBlogPost__body .postBody');

    if (viewArea) {
        let markupContent = rawMarkdown.innerText.trim();
        viewArea.innerHTML = marked(markupContent);
    }
}

export default {
    initMarkdownAreaViewer
}