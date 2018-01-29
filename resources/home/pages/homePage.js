import SimpleMDE from 'simplemde';
import marked from 'marked';

function markdownAreaEditor() {
    let markdownArea = document.querySelector('.homePage__mdAreaEditor');

    if (markdownArea) {
        new SimpleMDE({
            element: markdownArea
        })
    }
}

function markdownAreaViewer() {
    let rawMarkdown = document.querySelector('.homePage__mdAreaRaw');
    let viewArea = document.querySelector('.homePage__mdAreaViewer');

    if (viewArea) {
        let markupContent = rawMarkdown.innerText.trim();
        viewArea.innerHTML = marked(markupContent);
    }
}

function init() {
    markdownAreaViewer();
    markdownAreaEditor();
}

export default init;