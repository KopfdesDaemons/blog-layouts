// This script enables the “Posts” and “Comments” menu tabs on the author page

const body = document.querySelector("body");

function setBodyClass(className) {
    const classesToRemove = ["blog_layouts_comments", "blog_layouts_posts"];
    classesToRemove.forEach(cls => {
        if (body.classList.contains(cls)) {
            body.classList.remove(cls);
        }
    });
    body.classList.add(className);
}

function click_author_posts() {
    setBodyClass("blog_layouts_posts");
}

function click_author_comments() {
    setBodyClass("blog_layouts_comments");
}
