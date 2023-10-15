// This script enables the “Posts” and “Comments” menu tabs on the author page

const body = document.querySelector("body");

function setBodyClass(className) {
    const classesToRemove = ["clean_space_comments", "clean_space_posts"];
    classesToRemove.forEach(cls => {
        if (body.classList.contains(cls)) {
            body.classList.remove(cls);
        }
    });
    body.classList.add(className);
}

function click_author_posts() {
    setBodyClass("clean_space_posts");
}

function click_author_comments() {
    setBodyClass("clean_space_comments");
}
