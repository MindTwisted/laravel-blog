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
    let viewArea = document.querySelector('.homePage__mdAreaViewer');

    if (viewArea) {
        let markupContent = viewArea.innerHTML.trim();
        viewArea.innerHTML = marked(markupContent);
    }
}

function init() {
    markdownAreaViewer();
    markdownAreaEditor();
}

export default init;